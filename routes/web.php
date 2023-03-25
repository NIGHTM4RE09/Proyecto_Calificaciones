<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CalificacionesController;
use App\Http\Controllers\CicloController;
use App\Http\Controllers\ExpedientesController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\InstallerController;
use App\Http\Controllers\MesesController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {

    Route::get('storage-link', function () {
        Artisan::call('storage:link');
        return view('inicio.index');
    });

    Route::get('/', [InicioController::class, 'index'])->name('inicio');
    
    Route::prefix('AdminCarp')->group(function () {
        
        
        Route::resource('usuarios', UsuariosController::class)->except([
            'show', 'edit', 'update'
        ])->middleware('can:Usuarios');

        Route::get('usuarios/{usuario}', [UsuariosController::class, 'show'])->middleware('can:Editar Usuarios')->name('usuarios.show');
        Route::get('usuarios/{usuario}/editar', [UsuariosController::class, 'edit'])->middleware('can:Editar Usuarios')->name('usuarios.edit');
        Route::put('usuarios/{usuario}', [UsuariosController::class, 'update'])->middleware('can:Editar Usuarios')->name('usuarios.update');

        Route::get('asignar-rol/{rol}', [UsuariosController::class, 'rol'])->middleware('can:Asignar Rol')->name('rol');
        Route::post('asignar-rol/{rol}', [UsuariosController::class, 'asignar'])->middleware('can:Asignar Rol')->name('asignar');
        
        Route::resource('ciclo-escolar.nivel-academico.grupos.alumnos', AlumnosController::class)->middleware('can:Ciclo')->names([
            'index' => 'alumnos.index',
            'create' => 'alumnos.create',
            'store' => 'alumnos.store',
            'show' => 'alumnos.show',
            'edit' => 'alumnos.edit',
            'update' => 'alumnos.update',
            'destroy' => 'alumnos.destroy'
        ])->shallow();

        Route::prefix('ciclo-escolar/{ciclo_escolar}/nivel-academico/{nivel_academico}/grupos/{grupo}/alumnos/')->group(function () {

            Route::get('asignar-asesor', [AlumnosController::class, 'asesor'])->middleware('can:Asesor')->name('asesor');
            Route::post('asignar-asesor', [AlumnosController::class, 'asignar'])->middleware('can:Asesor')->name('asignar.asesor');
        
            Route::get('asignar-materias', [AlumnosController::class, 'materias'])->name('materias');
            Route::post('asignar-materias', [AlumnosController::class, 'asignarm'])->name('asignar.materias');
        });

        Route::delete('eliminar/{materia}', [AlumnosController::class, 'destroym'])->name('eliminar.materia');


        Route::resource('planeaciones', PlanningController::class)->parameters([
            'planeaciones' => 'planeacion'
        ])->middleware('can:Planeaciones');
    
        Route::resource('roles', RolesController::class)->middleware('can:Roles');
        Route::resource('ciclo-escolar', CicloController::class)->middleware('can:Ciclo');

        Route::resource('ciclo-escolar.nivel-academico', NivelController::class)->names([
            'index' => 'nivel-academico.index',
            'create' => 'nivel-academico.create',
            'store' => 'nivel-academico.store',
            'show' => 'nivel-academico.show',
            'edit' => 'nivel-academico.edit',
            'update' => 'nivel-academico.update',
            'destroy' => 'nivel-academico.destroy'
        ])->shallow()->middleware('can:Nivel Académico');

        Route::prefix('ciclo-escolar/{ciclo_escolar}/nivel-academico/{nivel_academico}/grupos/{grupo}/alumnos/{alumno}/')->group(function () {
            Route::resource('calificaciones', CalificacionesController::class)->parameters([
                'calificaciones' => 'calificacion'
            ])->shallow()->middleware('can:Calificaciones');

            Route::resource('mes', MesesController::class)->shallow()->middleware('can:Calificaciones');
        });
        
        Route::resource('ciclo-escolar.nivel-academico.grupos', GruposController::class)->names([
            'index' => 'grupos.index',
            'create' => 'grupos.create',
            'store' => 'grupos.store',
            'show' => 'grupos.show',
            'edit' => 'grupos.edit',
            'update' => 'grupos.update',
            'destroy' => 'grupos.destroy'
        ])->shallow()->middleware('can:Grado');
        
        Route::prefix('ciclo-escolar/{ciclo_escolar}/nivel-academico/{nivel_academico}/grupos/{grupo}/alumnos/{alumno}/expediente')->group(function () {
            
            Route::get('/', [ExpedientesController::class, 'index'])->middleware('can:Expediente Alumno')->name('expediente.index');
            
            Route::get('agregar/tutor', [ExpedientesController::class, 'tutor'])->middleware('can:Expediente Alumno')->name('tutor.create');
            Route::post('agregar/tutor', [ExpedientesController::class, 'tcreate'])->middleware('can:Expediente Alumno')->name('tutor.store');
            Route::get('editar/tutor/{tutor}', [ExpedientesController::class, 'tedit'])->middleware('can:Expediente Alumno')->name('tutor.edit');
            Route::put('editar/tutor/{tutor}', [ExpedientesController::class, 'tupdate'])->middleware('can:Expediente Alumno')->name('tutor.update');
            
            Route::get('agregar/ambito-escolar', [ExpedientesController::class, 'ambitoescolar'])->middleware('can:Expediente Alumno')->name('ambitoescolar.create');
            Route::post('agregar/ambito-escolar', [ExpedientesController::class, 'aecreate'])->middleware('can:Expediente Alumno')->name('ambitoescolar.store');
            Route::get('editar/ambito-escolar/{ambito}', [ExpedientesController::class, 'aeedit'])->middleware('can:Expediente Alumno')->name('ambitoescolar.edit');
            Route::put('editar/ambito-escolar/{ambito}', [ExpedientesController::class, 'aeupdate'])->middleware('can:Expediente Alumno')->name('ambitoescolar.update');
            Route::delete('eliminar/ambito-escolar/{ambito}', [ExpedientesController::class, 'aedestroy'])->middleware('can:Expediente Alumno')->name('ambitoescolar.destroy');

            Route::get('agregar/ambito-familiar', [ExpedientesController::class, 'ambitofamiliar'])->middleware('can:Expediente Alumno')->name('ambitofamiliar.create');
            Route::post('agregar/ambito-familiar', [ExpedientesController::class, 'afcreate'])->middleware('can:Expediente Alumno')->name('ambitofamiliar.store');
            Route::get('editar/ambito-familiar/{ambitof}', [ExpedientesController::class, 'afedit'])->middleware('can:Expediente Alumno')->name('ambitofamiliar.edit');
            Route::put('editar/ambito-familiar/{ambitof}', [ExpedientesController::class, 'afupdate'])->middleware('can:Expediente Alumno')->name('ambitofamiliar.update');
            Route::delete('eliminar/ambito-familiar/{ambitof}', [ExpedientesController::class, 'afdestroy'])->middleware('can:Expediente Alumno')->name('ambitofamiliar.destroy');
            
            Route::get('agregar/area-socioeconomica', [ExpedientesController::class, 'areasocioeconomica'])->middleware('can:Expediente Alumno')->name('area.create');
            Route::post('agregar/area-socioeconomica', [ExpedientesController::class, 'acreate'])->middleware('can:Expediente Alumno')->name('area.store');
            Route::get('editar/area-socioeconomica/{area}', [ExpedientesController::class, 'aedit'])->middleware('can:Expediente Alumno')->name('area.edit');
            Route::put('editar/area-socioeconomica/{area}', [ExpedientesController::class, 'aupdate'])->middleware('can:Expediente Alumno')->name('area.update');
            Route::delete('eliminar/area-socioeconomica/{area}', [ExpedientesController::class, 'adestroy'])->middleware('can:Expediente Alumno')->name('area.destroy');
            
            Route::get('agregar/contacto', [ExpedientesController::class, 'contacto'])->middleware('can:Expediente Alumno')->name('contacto.create');
            Route::post('agregar/contacto', [ExpedientesController::class, 'ccreate'])->middleware('can:Expediente Alumno')->name('contacto.store');
            Route::get('editar/contacto/{contacto}', [ExpedientesController::class, 'cedit'])->middleware('can:Expediente Alumno')->name('contacto.edit');
            Route::put('editar/contacto/{contacto}', [ExpedientesController::class, 'cupdate'])->middleware('can:Expediente Alumno')->name('contacto.update');
            Route::delete('eliminar/contacto/{contacto}', [ExpedientesController::class, 'cdestroy'])->middleware('can:Expediente Alumno')->name('contacto.destroy');
            
            Route::get('crear/datos-alumno', [ExpedientesController::class, 'datosalumno'])->middleware('can:Expediente Alumno')->name('datos.create');
            Route::post('crear/datos-alumno', [ExpedientesController::class, 'dcreate'])->middleware('can:Expediente Alumno')->name('datos.store');
            Route::get('editar/datos-alumno/{dato}', [ExpedientesController::class, 'dedit'])->middleware('can:Expediente Alumno')->name('datos.edit');
            Route::put('editar/datos-alumno/{dato}', [ExpedientesController::class, 'dupdate'])->middleware('can:Expediente Alumno')->name('datos.update');
            Route::delete('eliminar/datos-alumno/{dato}', [ExpedientesController::class, 'ddestroy'])->middleware('can:Expediente Alumno')->name('datos.destroy');
            
            Route::get('crear/familiares', [ExpedientesController::class, 'familiares'])->middleware('can:Expediente Alumno')->name('familiares.create');
            Route::post('crear/familiares', [ExpedientesController::class, 'fcreate'])->middleware('can:Expediente Alumno')->name('familiares.store');
            Route::get('editar/familiares/{family}', [ExpedientesController::class, 'fedit'])->middleware('can:Expediente Alumno')->name('familiares.edit');
            Route::put('editar/familiares/{family}', [ExpedientesController::class, 'fupdate'])->middleware('can:Expediente Alumno')->name('familiares.update');
            Route::delete('eliminar/familiares/{family}', [ExpedientesController::class, 'fdestroy'])->middleware('can:Expediente Alumno')->name('familiares.destroy');
            
            Route::get('agregar/habito-de-estudio', [ExpedientesController::class, 'habitoestudio'])->middleware('can:Expediente Alumno')->name('habito.create');
            Route::post('agregar/habito-de-estudio', [ExpedientesController::class, 'hcreate'])->middleware('can:Expediente Alumno')->name('habito.store');
            Route::get('editar/habito-de-estudio/{habito}', [ExpedientesController::class, 'hedit'])->middleware('can:Expediente Alumno')->name('habito.edit');
            Route::put('editar/habito-de-estudio/{habito}', [ExpedientesController::class, 'hupdate'])->middleware('can:Expediente Alumno')->name('habito.update');
            Route::delete('eliminar/habito-de-estudio/{habito}', [ExpedientesController::class, 'hdestroy'])->middleware('can:Expediente Alumno')->name('habito.destroy');
            
            Route::get('agregar/hijos', [ExpedientesController::class, 'hijos'])->middleware('can:Expediente Alumno')->name('hijos.create');
            Route::post('agregar/hijos', [ExpedientesController::class, 'hjcreate'])->middleware('can:Expediente Alumno')->name('hijos.store');
            Route::get('editar/hijos/{hijo}', [ExpedientesController::class, 'hjedit'])->middleware('can:Expediente Alumno')->name('hijos.edit');
            Route::put('editar/hijos/{hijo}', [ExpedientesController::class, 'hjupdate'])->middleware('can:Expediente Alumno')->name('hijos.update');
            Route::delete('eliminar/hijo/{hijo}', [ExpedientesController::class, 'hjdestroy'])->middleware('can:Expediente Alumno')->name('hijos.destroy');

            Route::get('agregar/hobbies', [ExpedientesController::class, 'hobbies'])->middleware('can:Expediente Alumno')->name('hobbies.create');
            Route::post('agregar/hobbies', [ExpedientesController::class, 'hobbiecreate'])->middleware('can:Expediente Alumno')->name('hobbies.store');
            Route::get('editar/hobbies/{hobbie}', [ExpedientesController::class, 'hobbieedit'])->middleware('can:Expediente Alumno')->name('hobbies.edit');
            Route::put('editar/hobbies/{hobbie}', [ExpedientesController::class, 'hobbieupdate'])->middleware('can:Expediente Alumno')->name('hobbies.update');
            Route::delete('eliminar/hobbies/{hobbie}', [ExpedientesController::class, 'hobbiedestroy'])->middleware('can:Expediente Alumno')->name('hobbies.destroy');

            Route::get('agregar/padres', [ExpedientesController::class, 'padres'])->middleware('can:Expediente Alumno')->name('padres.create');
            Route::post('agregar/padres', [ExpedientesController::class, 'pcreate'])->middleware('can:Expediente Alumno')->name('padres.store');
            Route::get('editar/padres/{padre}', [ExpedientesController::class, 'pedit'])->middleware('can:Expediente Alumno')->name('padres.edit');
            Route::put('editar/padres/{padre}', [ExpedientesController::class, 'pupdate'])->middleware('can:Expediente Alumno')->name('padres.update');
            Route::delete('eliminar/padre/{padre}', [ExpedientesController::class, 'pdestroy'])->middleware('can:Expediente Alumno')->name('padres.destroy');
    
        });
        
    }); 
});

Auth::routes(["register" => false]);

Route::get('instalar', [InstallerController::class, 'instalador']);

Route::get('meses', [MesesController::class, 'meses']);

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */

//9934002922 francisco