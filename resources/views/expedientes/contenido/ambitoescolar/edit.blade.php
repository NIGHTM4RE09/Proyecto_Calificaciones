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
                    <form action="{{route('ambitoescolar.update', [$ciclo, $nivel, $grupo, $alumno, $ambito])}}" method="POST">
                        @csrf
                        @method('put')
                        
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Excelente</th>
                                    <th>Bueno</th>
                                    <th>Normal</th>
                                    <th>Regular</th>
                                    <th>Malo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Con relación a sus compañeros</td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_1" name="compañeros" type="radio" value="Excelente" @if ($hambito->compañeros == "Excelente")
                                            checked
                                        @endif>
                                            <label for="radio_1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_2" name="compañeros" type="radio" value="Bueno" @if ($hambito->compañeros == "Bueno")
                                            checked
                                        @endif>
                                            <label for="radio_2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_3" name="compañeros" type="radio" value="Normal" @if ($hambito->compañeros == "Normal")
                                            checked
                                        @endif>
                                            <label for="radio_3"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_4" name="compañeros" type="radio" value="Regular" @if ($hambito->compañeros == "Regular")
                                            checked
                                        @endif>
                                            <label for="radio_4"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_5" name="compañeros" type="radio" value="Malo" @if ($hambito->compañeros == "Malo")
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
                                            <input id="radio_6" name="profesorado" type="radio" value="Excelente" @if ($hambito->profesorado == "Excelente")
                                            checked
                                        @endif>
                                            <label for="radio_6"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_7" name="profesorado" type="radio" value="Bueno" @if ($hambito->profesorado == "Bueno")
                                            checked
                                        @endif>
                                            <label for="radio_7"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_8" name="profesorado" type="radio" value="Normal" @if ($hambito->profesorado == "Normal")
                                            checked
                                        @endif>
                                            <label for="radio_8"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_9" name="profesorado" type="radio" value="Regular" @if ($hambito->profesorado == "Regular")
                                            checked
                                        @endif>
                                            <label for="radio_9"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_10" name="profesorado" type="radio" value="Malo" @if ($hambito->profesorado == "Malo")
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
                                            <input id="radio_11" name="aula" type="radio" value="Excelente" @if ($hambito->aula == "Excelente")
                                            checked
                                        @endif>
                                            <label for="radio_11"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_12" name="aula" type="radio" value="Bueno" @if ($hambito->aula == "Bueno")
                                                checked
                                            @endif>
                                            <label for="radio_12"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_13" name="aula" type="radio" value="Normal" @if ($hambito->aula == "Normal")
                                                checked
                                            @endif>
                                            <label for="radio_13"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_14" name="aula" type="radio" value="Regular" @if ($hambito->aula == "Regular")
                                                checked
                                            @endif>
                                            <label for="radio_14"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_15" name="aula" type="radio" value="Malo" @if ($hambito->aula == "Malo")
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
                                            <input id="radio_16" name="convivencia" type="radio" value="Excelente" @if ($hambito->convivencia == "Excelente")
                                                checked
                                            @endif>
                                            <label for="radio_16"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_17" name="convivencia" type="radio" value="Bueno" @if ($hambito->convivencia == "Bueno")
                                                checked
                                            @endif>
                                            <label for="radio_17"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_18" name="convivencia" type="radio" value="Normal" @if ($hambito->convivencia == "Normal")
                                                checked
                                            @endif>
                                            <label for="radio_18"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_19" name="convivencia" type="radio" value="Regular" @if ($hambito->convivencia == "Regular")
                                                checked
                                            @endif>
                                            <label for="radio_19"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_20" name="convivencia" type="radio" value="Malo" @if ($hambito->convivencia == "Malo")
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
                                            <input id="radio_21" name="tareas" type="radio" value="Excelente" @if ($hambito->tareas == "Excelente")
                                                checked
                                            @endif>
                                            <label for="radio_21"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_22" name="tareas" type="radio" value="Bueno" @if ($hambito->tareas == "Bueno")
                                                checked
                                            @endif>
                                            <label for="radio_22"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_23" name="tareas" type="radio" value="Normal" @if ($hambito->tareas == "Normal")
                                                checked
                                            @endif>
                                            <label for="radio_23"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_24" name="tareas" type="radio" value="Regular" @if ($hambito->tareas == "Regular")
                                                checked
                                            @endif>
                                            <label for="radio_24"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            <input id="radio_25" name="tareas" type="radio" value="Malo" @if ($hambito->tareas == "Malo")
                                                checked
                                            @endif>
                                            <label for="radio_25"></label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <fieldset class="form-group">
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