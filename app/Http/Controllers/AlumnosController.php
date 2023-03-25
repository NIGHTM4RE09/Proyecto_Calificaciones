<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Ciclo;
use App\Models\Grupo;
use App\Models\Materia;
use App\Models\Nivel;
use App\Models\User;
use Illuminate\Http\Request;

class AlumnosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ciclo, $nivel, $grupo)
    {
        $ciclo = Ciclo::find($ciclo);
        $nivel = Nivel::find($nivel);
        $alumno = Alumno::all()->where('group_id', $grupo);
        $grupo = Grupo::find($grupo);
        $user = User::find($grupo->user_id);
        return view('alumnos.index', compact('alumno', 'nivel', 'grupo', 'ciclo', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($ciclo, $nivel, $grupo)
    {
        $ciclo = Ciclo::find($ciclo);
        $nivel = Nivel::find($nivel);
        $grupo = Grupo::find($grupo);
        return view('alumnos.create', compact('nivel', 'grupo', 'ciclo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $ciclo,  $nivel, $grupo)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::create([
            'nombre' => $request['nombre'],
            'group_id' => $grupo->id
        ]);

        return redirect()->route('alumnos.index', [$ciclo, $nivel, $grupo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        $alumno->update($request->all());

        return redirect()->route('alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();

        return redirect()->back();
    }

    public function asesor($ciclo, $nivel, $grupo)
    {
        $ciclo = Ciclo::find($ciclo);
        $nivel = Nivel::find($nivel);
        $grupo = Grupo::find($grupo);
        $user = User::whereHas('roles', function ($query) {
            return $query->where('name', '=', 'Asesor');
        })->get();

        return view('grupos.asesor', compact('nivel', 'grupo', 'ciclo', 'user'));
    }

    public function asignar(Request $request, $ciclo,  $nivel, $grupo)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $user = User::findOrFail($request->user_id);

        $user->grupo()->save($grupo);

        return redirect()->route('alumnos.index', [$ciclo, $nivel, $grupo]);
    }

    public function materias($ciclo, $nivel, $grupo)
    {
        $ciclo = Ciclo::find($ciclo);
        $nivel = Nivel::find($nivel);
        $materias = Materia::all()->where('group_id', $grupo);
        $grupo = Grupo::find($grupo);

        return view('grupos.materias', compact('nivel', 'grupo', 'ciclo', 'materias'));
    }

    public function asignarm(Request $request, $ciclo,  $nivel, $grupo)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $materia = Materia::create([
            'materia' => $request['materia'],
            'group_id' => $grupo->id
        ]);
        
        return redirect()->back();
    }

    public function destroym(Materia $materia)
    {
        $materia->delete();

        return redirect()->back();
    }
}
