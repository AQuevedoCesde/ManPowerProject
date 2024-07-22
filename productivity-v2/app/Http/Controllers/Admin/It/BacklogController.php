<?php

namespace App\Http\Controllers\Admin\It;

use App\Models\User;
use Inertia\Inertia;
use App\Models\BklArea;
use App\Models\BklRole;
use App\Models\BklType;
use App\Models\BklProject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backlog\StorePostRequest;
use App\Models\BklProgress;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class BacklogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = BklProject::with(['user', 'bklPriority', 'bklState'])->orderBy('id')->get();
        $progress = BklProgress::with(['bklProject'])->orderBy('created_at', 'desc')->get();
        return Inertia::render('Backlog/Index', [
            'filters' => [
                'search' => $request->only(['search'])
            ],
            'projects' => $projects,
            'progress'=> $progress

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Backlog/Create', [
            'users' => User::orderBy('name')->get(),
            'roles' => BklRole::orderBy('name')->get(),
            'areas' => BklArea::orderBy('id')->get(),
            'types' => BklType::orderBy('name')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        
        // $this->authorize('create', new BklProject());
        $data = $request->validated();
        $project = BklProject::create($data);
        return redirect()->route('it.backlog.index', $project->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BklProject $project)
    {
            //bklManagement.bklArea
        return Inertia::render('Backlog/Edit', [
            'project' => $project->loadMissing('user', 'bklPriority', 'bklRole', 'bklManagement.bklArea', 'bklState', 'bklType'),
            'users' => User::orderBy('name')->get(),
            'areas' => BklArea::orderBy('id')->get(),
            'roles' => BklRole::orderBy('name')->get(),
            'types' => BklType::orderBy('name')->get(),
            'states' => BklArea::orderBy('name')->get()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BklProject $project)
    {

        $project->delete();

        return redirect()->route('it.backlog.index')->with('message', '¡La eliminación del proyecto se ha completado con éxito! El proyecto se ha eliminado del sistema correctamente.');
    }
}
