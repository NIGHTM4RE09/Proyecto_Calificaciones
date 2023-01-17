<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use App\Models\Grupo;
use App\Models\Nivel;
use App\Models\User;
use Illuminate\Http\Request;

class GruposController extends Controller
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
    public function index($nivel, $ciclo)
    {
        $ciclo = Ciclo::find($ciclo);
        $grupo = Grupo::all()->where('level_id', $nivel);
        $nivel = Nivel::find($nivel);
        return view('grupos.index', compact('grupo', 'nivel', 'ciclo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nivel, $ciclo)
    {
        $ciclo = Ciclo::find($ciclo);
        $nivel = Nivel::find($nivel);
        return view('grupos.create', compact('ciclo', 'nivel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $ciclo, $nivel)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::create([
            'grupo' => $request['grupo'],
            'level_id' => $nivel->id
        ]);

        return redirect()->route('grupos.index', [$ciclo, $nivel]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function show($grupo, $ciclo, $nivel)
    {
        /* $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::find($grupo);
        //$user = User::all();
        $user = User::whereHas('roles', function ($query) {
            return $query->where('name', '=', 'Asesor');
        })->get();
        return view('grupos.asesor', compact('ciclo', 'nivel', 'grupo', 'user')); */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grupo $grupo)
    {
      /* $grupo->attach($request);
      
      return redirect()->route('alumnos.index'); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grupo $grupo)
    {
        $grupo->delete();

        return redirect()->back();
    }
}
