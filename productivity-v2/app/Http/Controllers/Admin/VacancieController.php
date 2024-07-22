<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\State;
use App\Models\Vacancy;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Vacancies\StoreRequest;
use App\Http\Requests\Vacancies\UpdateRequest;

class VacancieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', new Vacancy);

        $user = Auth::user();

        $vancacies = Vacancy::with('city', 'status', 'category')
            ->when($request->input('search'), function ($query, $search) {
                $query->where('position', 'like', "%{$search}%");
            })
            ->when($user->hasRole(['reclutador']), function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Vacancies/Vacancies', [
            'vacancies' => $vancacies,
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
        $this->authorize('create', new Vacancy);

        return Inertia::render('Vacancies/Create', [
            'categories' => Category::orderBy('name')->get(),
            'states' => State::orderBy('name', 'asc')->get()
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
        $this->authorize('create', new Vacancy());

        $data = $request->validated();
        $vacancy = Vacancy::create($data);

        return redirect()->route("vacancy.social", $vacancy->id)->with('message', '¡Vacante creada con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        $this->authorize('view', $vacancy);

        // $vacancyData = $vacancy->loadMissing('city', 'city.state', 'status', 'vacancyImages', 'category', 'user', 'vacancyImages.status');
        // dd($vacancyData->vacancyImages[0]->url);

        return Inertia::render('Vacancies/Show', [
            'vacancy' => $vacancy->loadMissing('city', 'city.state', 'status', 'vacancyImages', 'category', 'user', 'vacancyImages.status')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        $this->authorize('update', $vacancy);

        return Inertia::render('Vacancies/Edit', [
            'vacancy' => $vacancy->loadMissing('city', 'city.state', 'status', 'category'),
            'categories' => Category::all(),
            'states' => State::orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Vacancy $vacancy)
    {
        $this->authorize('update', $vacancy);

        $data = $request->validated();
        $vacancy->update($data);

        return redirect()->route('vacancies.index')->with('message', '¡Actualización de la vacante completada con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        $this->authorize('delete', $vacancy);

        $vacancy->vacancyImages()->delete();
        $vacancy->delete();

        return redirect()->route('vacancies.index')->with('message', '¡La eliminación de la vacante se ha completado con éxito! La vacante se ha eliminado del sistema correctamente.');
    }
}
