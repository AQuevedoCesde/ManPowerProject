<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Ldap\User as UserLdap;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Users\AdldapUser;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\Users\StoreRequest;
use App\Http\Requests\Users\UpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', new User);

        $users = User::with('roles')
            ->when($request->input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Users/Index', [
            'users' => $users,
            'filters' => [
                'search' => $request->only(['search'])
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new User);

        return Inertia::render('Users/Create', [
            'permissions' => Permission::all(),
            'roles' => Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create', new User);

        $data = $request->validated();
        $data['password'] = Hash::make(Str::random(16));

        $user = User::create($data);
        $user->syncRoles(isset($data['roles']) ? $data['roles'] : []);
        $user->syncPermissions(isset($data['permissions']) ? $data['permissions'] : []);

        return redirect()->route('users.index')->with('message', '¡Usuario creado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', $user);

        return Inertia::render('Users/Show', [
            'user' => $user->load('roles', 'permissions'),
            'permissions' => Permission::all(),
            'roles' => Role::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        return Inertia::render('Users/Edit', [
            'user' => $user->load('roles', 'permissions'),
            'permissions' => Permission::all(),
            'roles' => Role::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {
        $this->authorize('update', $user);

        $data = $request->validated();

        $user->update($data);
        $user->syncRoles(isset($data['roles']) ? $data['roles'] : []);
        $user->syncPermissions(isset($data['permissions']) ? $data['permissions'] : []);

        return redirect()->route('users.index')->with('message', '¡Usuario actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        $user->delete();

        return redirect()->route('users.index')->with('message', '¡Usuario eliminado con éxito! El usuario ha sido eliminado del sistema.');
    }

    /**
     * Get user data from adldap
     */
    public function adldapInfo(AdldapUser $request)
    {
        $this->authorize('create', new User);

        try {
            $data = $request->validated();
            $user = UserLdap::where('mail', '=', $data['email'])->get();

            if (!$user->isEmpty()) {
                return response()->json([
                    'email' => $user[0]['userprincipalname'][0],
                    'name' => $user[0]['displayname'][0],
                ], 200);
            }
            return response()->json([
                'message' => 'No se encontró el usuario en el Active Directory.'
            ], 200);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 500);
        }
    }
}
