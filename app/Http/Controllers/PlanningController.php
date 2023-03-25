<?php

namespace App\Http\Controllers;

use App\Models\Planning;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PlanningController extends Controller
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
    public function index()
    {
        $user = User::all();
        $planeaciones = Planning::all();
        return view('planeaciones.index', compact('planeaciones', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->all(); 
        
        if ($request->file('planeacion')) {

            $file = $request->file('planeacion');

            $nombre = "Planeacion_".$request->grado."_".$request->nivel_academico."_".$request->semana.".".$file->guessExtension();

            $url = $file->storeAs('planeaciones', $nombre);

            $planeacion = Planning::create([
                'nivel_academico' => $data['nivel_academico'],
                'planeacion' => $url,
                'grado' => $data['grado'],
                'semana' => $data['semana'],
                'user_id' => Auth::user()->id,
            ]);
            
        }
        return redirect()->route('planeaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Planning  $planning
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Planning  $planning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Planning $planning)
    {
        //
    }
}
