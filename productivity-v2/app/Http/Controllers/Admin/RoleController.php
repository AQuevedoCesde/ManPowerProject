<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\StoreRequest;
use App\Http\Requests\Roles\UpdateRequest;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', new Role);

        $roles = Role::orderBy('created_at', 'desc')
            ->paginate(10);

        return Inertia::render('Roles/Index', [
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new Role);

        return Inertia::render('Roles/Create', [
            'permissions' => Permission::all()
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
        $this->authorize('create', new Role);

        $data = $request->validated();

        $role = Role::create([
            'name' => $data['name'],
            'display_name' => $data['display_name'],
        ]);

        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('roles.index')->with('message', '¡Rol creado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $this->authorize('view', $role);

        return Inertia::render('Roles/Show', [
            'role' => $role->load('permissions'),
            'permissions' => Permission::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);

        return Inertia::render('Roles/Edit', [
            'role' => $role->load('permissions'),
            'permissions' => Permission::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Role $role)
    {
        $this->authorize('update', $role);

        $data = $request->validated();

        $role->update($data);
        $role->permissions()->detach();

        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('roles.index')->with('message', '¡Actualización del rol completada con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        if ($role->id == 1) {
            return redirect()->back()->withErrors([
                'message' => '¡El rol no puede ser eliminado!!'
            ]);
        }

        $role->permissions()->detach();
        $role->delete();

        return redirect()->route('roles.index')->with('message', '¡Rol eliminado exitosamente!');
    }
}
