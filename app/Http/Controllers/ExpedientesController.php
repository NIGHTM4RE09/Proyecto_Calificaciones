<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Area;
use App\Models\Ciclo;
use App\Models\Contacto;
use App\Models\Dato;
use App\Models\Familia;
use App\Models\Family;
use App\Models\Grupo;
use App\Models\Habito;
use App\Models\Hijo;
use App\Models\Hobbie;
use App\Models\Nivel;
use App\Models\Padre;
use App\Models\School;
use App\Models\Tutor;
use Illuminate\Http\Request;

class ExpedientesController extends Controller
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
    public function index($ciclo, $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::find($ciclo);
        $nivel = Nivel::find($nivel);
        $grupo = Grupo::find($grupo);
        $tutor = Tutor::all()->where('alumno_id', $alumno);
        $datos = Dato::all()->where('alumno_id', $alumno);
        $habito = Habito::all()->where('alumno_id',$alumno);
        $hobbies = Hobbie::all()->where('alumno_id', $alumno);
        $area = Area::all()->where('alumno_id', $alumno);
        $ambitoescolar = School::all()->where('alumno_id', $alumno);
        $ambitofamiliar = Familia::all()->where('alumno_id', $alumno);
        $alumno = Alumno::find($alumno);
        return view('expedientes.index', compact('ciclo', 'nivel', 'grupo', 'alumno', 'tutor', 'datos', 'habito', 'hobbies', 'area', 'ambitoescolar', 'ambitofamiliar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Funciones del tutor del alumno

    public function tutor($ciclo, $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::find($ciclo);
        $nivel = Nivel::find($nivel);
        $grupo = Grupo::find($grupo);
        $alumno = Alumno::find($alumno);
        return view('expedientes.contenido.tutores.create', compact('ciclo', 'nivel', 'grupo', 'alumno'));
    }

    public function tcreate(Request $request, $ciclo,  $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);
        $tutor = Tutor::create([
            'nombre' => $request['nombre'],
            'domicilio' => $request['domicilio'],
            'profesion' => $request['profesion'],
            'telefono' => $request['telefono'],
            'alumno_id' => $alumno->id
        ]);

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function tedit($ciclo, $nivel, $grupo, $alumno, $tutor)
    {
        $tutor = Tutor::findOrFail($tutor); 
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);
        return view('expedientes.contenido.tutores.edit', compact('ciclo', 'nivel', 'grupo', 'alumno', 'tutor'));
    }

    public function tupdate(Request $request, $ciclo,  $nivel, $grupo, $alumno, $tutor)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $tutor = Tutor::findOrFail($tutor); 

        $tutor->update($request->all());

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);

    }

    public function tdestroy($ciclo, $nivel, $grupo, $alumno, $tutor)
    {

        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $tutor = Tutor::find($tutor)->delete();
    
        return redirect()->back();
    }

    //Funciones del ambito escolar del alumno

    public function ambitoescolar($ciclo, $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::find($ciclo);
        $nivel = Nivel::find($nivel);
        $grupo = Grupo::find($grupo);
        $alumno = Alumno::find($alumno);
        return view('expedientes.contenido.ambitoescolar.create', compact('nivel', 'grupo', 'alumno', 'ciclo'));
    }

    public function aecreate(Request $request, $ciclo,  $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);
        $ambito = School::create([
            'compañeros' => $request['compañeros'],
            'profesorado' => $request['profesorado'],
            'aula' => $request['aula'],
            'convivencia' => $request['convivencia'],
            'tareas' => $request['tareas'],
            'alumno_id' => $alumno->id
        ]);

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function aeedit($ciclo, $nivel, $grupo, $alumno, $ambito)
    {
        $ambitoescolar = School::findOrFail($ambito); 
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        return view('expedientes.contenido.ambitoescolar.edit', compact('ciclo', 'nivel', 'grupo', 'alumno', 'ambitoescolar'));
    }

    public function aeupdate(Request $request, $ciclo, $nivel, $grupo, $alumno, $ambito)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $hambito = School::findOrFail($ambito); 

        $hambito->update($request->all());

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function aedestroy($ciclo, $nivel, $grupo, $alumno, $ambito)
    {

        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $ambitos = School::find($ambito)->delete();
    
        return redirect()->back();
    }

    //Funciones del ambito familiar del alumno

    public function ambitofamiliar($ciclo, $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::find($ciclo);
        $nivel = Nivel::find($nivel);
        $grupo = Grupo::find($grupo);
        $alumno = Alumno::find($alumno);
        return view('expedientes.contenido.ambitofamiliar.create', compact('ciclo', 'nivel', 'grupo', 'alumno'));
    }

    public function afcreate(Request $request, $ciclo,  $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);
        $ambitofamiliar = Familia::create([
            'padre' => $request['padre'],
            'madre' => $request['madre'],
            'responsabilidades' => $request['responsabilidades'],
            'normas' => $request['normas'],
            'alumno_id' => $alumno->id
        ]);

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function afedit($ciclo, $nivel, $grupo, $alumno, $ambitof)
    {
        $ambitofamiliar = Familia::findOrFail($ambitof); 
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        return view('expedientes.contenido.ambitofamiliar.edit', compact('ciclo', 'nivel', 'grupo', 'alumno', 'ambitofamiliar'));
    }

    public function afupdate(Request $request, $ciclo, $nivel, $grupo, $alumno, $ambitof)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $ambito = Familia::findOrFail($ambitof); 

        $ambito->update($request->all());

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function afdestroy($ciclo, $nivel, $grupo, $alumno, $ambitof)
    {

        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $ambitos = Familia::find($ambitof)->delete();
    
        return redirect()->back();
    }

    // Funciones del areasocioeconomica del alumno

    public function areasocioeconomica($ciclo, $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::find($ciclo);
        $nivel = Nivel::find($nivel);
        $grupo = Grupo::find($grupo);
        $alumno = Alumno::find($alumno);
        return view('expedientes.contenido.areasocioeconomica.create', compact('ciclo', 'nivel', 'grupo', 'alumno'));
    }

    public function acreate(Request $request, $ciclo,  $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);
        $area = Area::create([
            'casa_padres' => $request['casa_padres'],
            'habitaciones' => $request['habitaciones'],
            'dormitorio' => $request['dormitorio'],
            'servicios' => $request['servicios'],
            'suma_ingresos' => $request['suma_ingresos'],
            'gastos_escolares' => $request['gastos_escolares'],
            'vacaciones' => $request['vacaciones'],
            'cine' => $request['cine'],
            'teatro' => $request['teatro'],
            'actividades' => $request['actividades'],
            'beca' => $request['beca'],
            'tipo_beca' => $request['tipo_beca'],
            'recurso_beca' => $request['recurso_beca'],
            'alumno_id' => $alumno->id
        ]);

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function aedit($ciclo, $nivel, $grupo, $alumno, $area)
    {
        $areas = Area::findOrFail($area); 
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        return view('expedientes.contenido.areasocioeconomica.edit', compact('ciclo', 'nivel', 'grupo', 'alumno', 'areas'));
    }

    public function aupdate(Request $request, $ciclo, $nivel, $grupo, $alumno, $area)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $areas = Area::findOrFail($area); 

        $areas->update($request->all());

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function adestroy($ciclo, $nivel, $grupo, $alumno, $area)
    {

        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $areas = Area::find($area)->delete();
    
        return redirect()->back();
    }

    //Funciones de los contactos del alumno

    public function contacto($ciclo, $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::find($ciclo);
        $nivel = Nivel::find($nivel);
        $grupo = Grupo::find($grupo);
        $alumno = Alumno::find($alumno);
        return view('expedientes.contenido.contactos.create', compact('ciclo', 'nivel', 'grupo', 'alumno'));
    }

    public function ccreate(Request $request, $ciclo,  $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);
        $contacto = Contacto::create([
            'nombre' => $request['nombre'],
            'telefono' => $request['telefono'],
            'recoger' => $request['recoger'],
        ]);

        $alumno->contactos()->attach($contacto->id);

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function cedit($ciclo, $nivel, $grupo, $alumno, $contacto)
    {
        $contactos = Contacto::findOrFail($contacto); 
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        return view('expedientes.contenido.contactos.edit', compact('ciclo', 'nivel', 'grupo', 'alumno', 'contactos'));
    }

    public function cupdate(Request $request, $ciclo, $nivel, $grupo, $alumno, $contacto)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $contactos = Contacto::findOrFail($contacto); 

        $contactos->update($request->all());

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function cdestroy($ciclo, $nivel, $grupo, $alumno, $contacto)
    {

        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $contactos = Contacto::find($contacto)->delete();
    
        return redirect()->back();
    }

    //Funciones de los datos de los alumnos

    public function datosalumno($ciclo, $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::find($ciclo);
        $nivel = Nivel::find($nivel);
        $grupo = Grupo::find($grupo);
        $alumno = Alumno::find($alumno);
        return view('expedientes.contenido.datosalumno.create', compact('ciclo', 'nivel', 'grupo', 'alumno'));
    }

    public function dcreate(Request $request, $ciclo,  $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);
        $dato = Dato::create([
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'curp' => $request['curp'],
            'tipo_sangre' => $request['tipo_sangre'],
            'situacion_familiar' => $request['situacion_familiar'],
            'relacion_familiar' => $request['relacion_familiar'],
            'personalidad' => $request['personalidad'],
            'descripcion' => $request['descripcion'],
            'enfermedades' => $request['enfermedades'],
            'alergias' => $request['alergias'],
            'deficiencias' => $request['deficiencias'],
            'atencion' => $request['atencion'],
            'faltas' => $request['faltas'],
            'alumno_id' => $alumno->id
        ]);

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function dedit($ciclo, $nivel, $grupo, $alumno, $dato)
    {
        $dato = Dato::findOrFail($dato); 
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        return view('expedientes.contenido.datosalumno.edit', compact('ciclo', 'nivel', 'grupo', 'alumno', 'dato'));
    }

    public function dupdate(Request $request, $ciclo, $nivel, $grupo, $alumno, $dato)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $dato = Dato::findOrFail($dato); 

        $dato->update($request->all());

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function ddestroy($ciclo, $nivel, $grupo, $alumno, $dato)
    {

        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $datos = Dato::find($dato)->delete();
    
        return redirect()->back();
    }

    //Funciones de familiares que viven en casa

    public function familiares($ciclo, $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::find($ciclo);
        $nivel = Nivel::find($nivel);
        $grupo = Grupo::find($grupo);
        $alumno = Alumno::find($alumno);
        return view('expedientes.contenido.familiares.create', compact('ciclo', 'nivel', 'grupo', 'alumno'));
    }

    public function fcreate(Request $request, $ciclo,  $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);
        $family = Family::create([
            'nombre' => $request['nombre'],
            'edad' => $request['edad'],
            'estudios' => $request['estudios'],
            'parentesco' => $request['parentesco'],
        ]);

        $alumno->families()->attach($family->id);

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function fedit($ciclo, $nivel, $grupo, $alumno, $family)
    {
        $family = Family::findOrFail($family); 
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        return view('expedientes.contenido.familiares.edit', compact('ciclo', 'nivel', 'grupo', 'alumno', 'family'));
    }

    public function fupdate(Request $request, $ciclo, $nivel, $grupo, $alumno, $family)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $family = Family::findOrFail($family); 

        $family->update($request->all());

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function fdestroy($ciclo,  $nivel, $grupo, $alumno, $family)
    {

        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $families = Family::find($family)->delete();
    
        return redirect()->back();
    }

    //Funciones de habito de estudio

    public function habitoestudio($ciclo, $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::find($ciclo);
        $nivel = Nivel::find($nivel);
        $grupo = Grupo::find($grupo);
        $alumno = Alumno::find($alumno);
        return view('expedientes.contenido.habitosestudio.create', compact('ciclo', 'nivel', 'grupo', 'alumno'));
    }

    public function hcreate(Request $request, $ciclo,  $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);
        $habito = Habito::create([
            'intereses' => $request['intereses'],
            'horario' => $request['horario'],
            'horario_cumplido' => $request['horario_cumplido'],
            'horario_estudio' => $request['horario_estudio'],
            'tareas' => $request['tareas'],
            'alumno_id' => $alumno->id
        ]);

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function hedit($ciclo, $nivel, $grupo, $alumno, $habito)
    {
        $habito = Habito::findOrFail($habito); 
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        return view('expedientes.contenido.habitosestudio.edit', compact('ciclo', 'nivel', 'grupo', 'alumno', 'habito'));
    }

    public function hupdate(Request $request, $ciclo, $nivel, $grupo, $alumno, $habito)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $habito = Habito::findOrFail($habito); 

        $habito->update($request->all());

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function hdestroy($ciclo,  $nivel, $grupo, $alumno, $habito)
    {

        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $habitos = Habito::find($habito)->delete();
    
        return redirect()->back();
    }

    //Funciones de hijos

    public function hijos($ciclo, $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::find($ciclo);
        $nivel = Nivel::find($nivel);
        $grupo = Grupo::find($grupo);
        $alumno = Alumno::find($alumno);
        return view('expedientes.contenido.hijos.create', compact('ciclo', 'nivel', 'grupo', 'alumno'));
    }

    public function hjcreate(Request $request, $ciclo,  $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);
        $hijo = Hijo::create([
            'nombre' => $request['nombre'],
            'edad' => $request['edad'],
            'estudios' => $request['estudios'],
            'vive_casa' => $request['vive_casa'],
        ]);

        $alumno->hijos()->attach($hijo->id);

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function hjedit($ciclo, $nivel, $grupo, $alumno, $hijo)
    {
        $hijo = Hijo::findOrFail($hijo); 
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        return view('expedientes.contenido.hijos.edit', compact('ciclo', 'nivel', 'grupo', 'alumno', 'hijo'));
    }

    public function hjupdate(Request $request, $ciclo, $nivel, $grupo, $alumno, $hijo)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $hijo = Hijo::findOrFail($hijo); 

        $hijo->update($request->all());

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function hjdestroy($ciclo,  $nivel, $grupo, $alumno, $hijo)
    {

        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $hijos = Hijo::find($hijo)->delete();
    
        return redirect()->back();
    }

    //Funciones de hobbies

    public function hobbies($ciclo, $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::find($ciclo);
        $nivel = Nivel::find($nivel);
        $grupo = Grupo::find($grupo);
        $alumno = Alumno::find($alumno);
        return view('expedientes.contenido.hobbies.create', compact('ciclo', 'nivel', 'grupo', 'alumno'));
    }

    public function hobbiecreate(Request $request, $ciclo,  $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);
        $hobbie = Hobbie::create([
            'horas_libres' => $request['horas_libres'],
            'tiempo_libre' => $request['tiempo_libre'],
            'alumno_id' => $alumno->id
        ]);

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function hobbieedit($ciclo, $nivel, $grupo, $alumno, $hobbie)
    {
        $hobbie = Hobbie::findOrFail($hobbie); 
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        return view('expedientes.contenido.hobbies.edit', compact('ciclo', 'nivel', 'grupo', 'alumno', 'hobbie'));
    }

    public function hobbieupdate(Request $request, $ciclo, $nivel, $grupo, $alumno, $hobbie)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $hobbie = Hobbie::findOrFail($hobbie); 

        $hobbie->update($request->all());

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function hobbiedestroy($ciclo, $nivel, $grupo, $alumno, $hobbie)
    {

        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $hobbie = Hobbie::find($hobbie)->delete();
    
        return redirect()->back();
    }

    //Funciones de padres.

    public function padres($ciclo, $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::find($ciclo);
        $nivel = Nivel::find($nivel);
        $grupo = Grupo::find($grupo);
        $alumno = Alumno::find($alumno);
        return view('expedientes.contenido.padres.create', compact('ciclo', 'nivel', 'grupo', 'alumno'));
    }

    public function pcreate(Request $request, $ciclo,  $nivel, $grupo, $alumno)
    {
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);
        $padre = Padre::create([
            'parentesco' => $request['parentesco'],
            'nombre' => $request['nombre'],
            'vive' => $request['vive'],
            'edad' => $request['edad'],
            'domicilio' => $request['domicilio'],
            'estudios' => $request['estudios'],
            'profesion' => $request['profesion'],
            'horario_laboral' => $request['horario_laboral'],
        ]);

        $alumno->padres()->attach($padre->id);


        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);
    }

    public function pedit($ciclo, $nivel, $grupo, $alumno, $padre)
    {
        $padre = Padre::findOrFail($padre); 
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        return view('expedientes.contenido.padres.edit', compact('ciclo', 'nivel', 'grupo', 'alumno', 'padre'));
    }

    public function pupdate(Request $request, $ciclo,  $nivel, $grupo, $alumno, $padre) {
        
        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $padre = Padre::findOrFail($padre);

        $padre->update($request->all());

        return redirect()->route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]);

    }

    public function pdestroy($ciclo,  $nivel, $grupo, $alumno, $padre)
    {

        $ciclo = Ciclo::findOrFail($ciclo);
        $nivel = Nivel::findOrFail($nivel);
        $grupo = Grupo::findOrFail($grupo);
        $alumno = Alumno::findOrFail($alumno);

        $padres = Padre::find($padre)->delete();
    
        return redirect()->back();
    }


}
