<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Ciclo;
use App\Models\Grade;
use App\Models\Grupo;
use App\Models\Materia;
use App\Models\Month;
use App\Models\Nivel;
use App\Models\Note;
use Illuminate\Http\Request;

class CalificacionesController extends Controller
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
    public function index($nivel, $grupo, $ciclo, $alumno)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $materia = Materia::all()->where('group_id', $grupo);
        $grupo = Grupo::findOrFail($grupo);
        $meses = Month::all();
        $alumno = Alumno::findOrFail($alumno);

        $promedio = collect();
        
        foreach ($materia as $item) {
            $notas = $alumno->notes()->where('materia_id', $item->id)->orderBy('month_id', 'asc')->get();
            $avg = $notas->avg('note');
            $promedio->push(['materia' => $item, 'note' => $notas, 'avg' => $avg]);
        }
        
        return view('calificaciones.index', compact('nivel', 'grupo', 'alumno', 'ciclo', 'meses', 'materia', 'promedio', 'notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $ciclo, $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $nota = Note::create([
            'note' => $request['note'],
            'month_id' => $request['mes'],
            'alumno_id' => $alumno->id,
            'materia_id' => $request['materia']
        ]);

        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ciclo, $nivel, $grupo, $alumno, $notas)
    {
        $data = $request->get('note', []);

        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $nota = Note::where('alumno_id', $alumno->id)->update(['note' => $request->note]);

        return $data;


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calificacion  $calificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
