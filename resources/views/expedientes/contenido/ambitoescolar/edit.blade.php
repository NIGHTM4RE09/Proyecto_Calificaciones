@extends('layouts.cuerpo')

@section('contenido')
<header class="section-header">
    <div class="tbl">
        <div class="tbl-row">
            <div class="tbl-cell">
                <h2>Editar Ambito escolar</h2>
            </div>
        </div>
    </div>
</header>    
<section class="card">
        <div class="card-block">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('ambitoescolar.update', [$ciclo, $nivel, $grupo, $alumno, $ambitoescolar])}}" method="POST">
                        @csrf
                        @method('put')
                        
                        <div class="col-12 table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th scope="col">Excelente</th>
                                        <th scope="col">Bueno</th>
                                        <th scope="col">Normal</th>
                                        <th scope="col">Regular</th>
                                        <th scope="col">Malo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Con relación a sus compañeros</td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_1" name="compañeros" type="radio" value="Excelente" @if ($ambitoescolar->compañeros == "Excelente")
                                                checked
                                            @endif>
                                                <label for="radio_1"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_2" name="compañeros" type="radio" value="Bueno" @if ($ambitoescolar->compañeros == "Bueno")
                                                checked
                                            @endif>
                                                <label for="radio_2"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_3" name="compañeros" type="radio" value="Normal" @if ($ambitoescolar->compañeros == "Normal")
                                                checked
                                            @endif>
                                                <label for="radio_3"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_4" name="compañeros" type="radio" value="Regular" @if ($ambitoescolar->compañeros == "Regular")
                                                checked
                                            @endif>
                                                <label for="radio_4"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_5" name="compañeros" type="radio" value="Malo" @if ($ambitoescolar->compañeros == "Malo")
                                                checked
                                            @endif>
                                                <label for="radio_5"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Con relación al profesorado</td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_6" name="profesorado" type="radio" value="Excelente" @if ($ambitoescolar->profesorado == "Excelente")
                                                checked
                                            @endif>
                                                <label for="radio_6"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_7" name="profesorado" type="radio" value="Bueno" @if ($ambitoescolar->profesorado == "Bueno")
                                                checked
                                            @endif>
                                                <label for="radio_7"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_8" name="profesorado" type="radio" value="Normal" @if ($ambitoescolar->profesorado == "Normal")
                                                checked
                                            @endif>
                                                <label for="radio_8"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_9" name="profesorado" type="radio" value="Regular" @if ($ambitoescolar->profesorado == "Regular")
                                                checked
                                            @endif>
                                                <label for="radio_9"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_10" name="profesorado" type="radio" value="Malo" @if ($ambitoescolar->profesorado == "Malo")
                                                checked
                                            @endif>
                                                <label for="radio_10"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Con relación a las instalaciones y materiales del aula</td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_11" name="aula" type="radio" value="Excelente" @if ($ambitoescolar->aula == "Excelente")
                                                checked
                                            @endif>
                                                <label for="radio_11"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_12" name="aula" type="radio" value="Bueno" @if ($ambitoescolar->aula == "Bueno")
                                                    checked
                                                @endif>
                                                <label for="radio_12"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_13" name="aula" type="radio" value="Normal" @if ($ambitoescolar->aula == "Normal")
                                                    checked
                                                @endif>
                                                <label for="radio_13"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_14" name="aula" type="radio" value="Regular" @if ($ambitoescolar->aula == "Regular")
                                                    checked
                                                @endif>
                                                <label for="radio_14"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_15" name="aula" type="radio" value="Malo" @if ($ambitoescolar->aula == "Malo")
                                                    checked
                                                @endif>
                                                <label for="radio_15"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Con relación a las normas de convivencia de la clase</td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_16" name="convivencia" type="radio" value="Excelente" @if ($ambitoescolar->convivencia == "Excelente")
                                                    checked
                                                @endif>
                                                <label for="radio_16"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_17" name="convivencia" type="radio" value="Bueno" @if ($ambitoescolar->convivencia == "Bueno")
                                                    checked
                                                @endif>
                                                <label for="radio_17"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_18" name="convivencia" type="radio" value="Normal" @if ($ambitoescolar->convivencia == "Normal")
                                                    checked
                                                @endif>
                                                <label for="radio_18"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_19" name="convivencia" type="radio" value="Regular" @if ($ambitoescolar->convivencia == "Regular")
                                                    checked
                                                @endif>
                                                <label for="radio_19"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_20" name="convivencia" type="radio" value="Malo" @if ($ambitoescolar->convivencia == "Malo")
                                                    checked
                                                @endif>
                                                <label for="radio_20"></label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Con relación a la realización de las tareas escolares</td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_21" name="tareas" type="radio" value="Excelente" @if ($ambitoescolar->tareas == "Excelente")
                                                    checked
                                                @endif>
                                                <label for="radio_21"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_22" name="tareas" type="radio" value="Bueno" @if ($ambitoescolar->tareas == "Bueno")
                                                    checked
                                                @endif>
                                                <label for="radio_22"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_23" name="tareas" type="radio" value="Normal" @if ($ambitoescolar->tareas == "Normal")
                                                    checked
                                                @endif>
                                                <label for="radio_23"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_24" name="tareas" type="radio" value="Regular" @if ($ambitoescolar->tareas == "Regular")
                                                    checked
                                                @endif>
                                                <label for="radio_24"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="radio">
                                                <input id="radio_25" name="tareas" type="radio" value="Malo" @if ($ambitoescolar->tareas == "Malo")
                                                    checked
                                                @endif>
                                                <label for="radio_25"></label>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <fieldset class="form-group py-2">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a href="{{ route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]) }}" class="btn btn-danger">
                                <span class="ladda-label">Cancelar</span>
                            </a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection