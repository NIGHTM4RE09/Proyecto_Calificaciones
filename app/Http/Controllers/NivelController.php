<?php

namespace App\Http\Controllers;

use App\Models\Ciclo;
use App\Models\Nivel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NivelController extends Controller
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
    public function index($ciclo)
    {
        $nivel = Nivel::all()->where('ciclo_id', $ciclo);
        $ciclo = Ciclo::find($ciclo);
        return view('nivel academico.index', compact('nivel', 'ciclo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($ciclo)
    {
        $ciclo = Ciclo::find($ciclo);
        return view('nivel academico.create', compact('ciclo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $ciclo)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::create([
            'nivel' => $request['nivel'],
            'ciclo_id' => $ciclo->id
        ]);

        return redirect()->route('nivel-academico.index', $ciclo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nivel  $nivel
     * @return \Illuminate\Http\Response
     */
    public function destroy($nivel)
    {
        $nivel = Nivel::findOrFail($nivel);
        $nivel->delete();

        return redirect()->back();
    }
}
