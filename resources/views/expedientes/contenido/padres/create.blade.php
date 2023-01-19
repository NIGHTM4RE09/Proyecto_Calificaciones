@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Información de los Padres</h2>
                </div>
            </div>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <div class="row">
                <form action="{{route('padres.store', [$ciclo, $nivel, $grupo, $alumno])}}" method="post">
                    @csrf

                    <fieldset class="form-group col-12 col-md-4 col-lg-4">
                        <label for="select" class="form-label">Seleccione si es el padre o la madre</label>
                        <select name="parentesco" id="select" class="form-control" data-validation="[NOTEMPTY]"
                            data-validation-message="Este campo no debe ir vacio">
                            <option value="">No ha seleccionado ninguna opción</option>
                            <option value="Padre">Padre</option>
                            <option value="Madre">Madre</option>
                        </select>
                    </fieldset>

                    <fieldset class="form-group col-12 col-md-4 col-lg-4">
                        <label class="form-label">Nombre Completo del padre o de la madre</label>
                        <input name="nombre" type="text" class="form-control" data-validation="[NOTEMPTY]"
                            data-validation-message="Debes agregar un nombre">
                    </fieldset>

                    <div class="form-group form-group-radios col-12 col-md-2 col-lg-2">
                        <label class="form-label" id="signup_v2-vive">Vive:</label>
                        <div class="radio">
                            <input id="radio_1" name="vive" onchange="javascript:showContent()" type="radio"
                                value="1">
                            <label for="radio_1">Si</label>
                            <input id="radio_2" name="vive" onchange="javascript:showContent()" type="radio"
                                value="0">
                            <label for="radio_2">No</label>
                        </div>
                    </div>

                    <div id="contenido" style="display: none;">
                        <fieldset class="form-group col-12 col-md-2 col-lg-2">
                            <label class="form-label">Edad:</label>
                            <input name="edad" type="number" class="form-control">
                        </fieldset>

                        <fieldset class="form-group col-12 col-md-6 col-lg-6">
                            <label class="form-label">Domicilio:</label>
                            <input name="domicilio" type="text" class="form-control" data-validation="[NOTEMPTY]"
                                data-validation-message="Debes agregar una domicilio">
                        </fieldset>

                        <fieldset class="form-group col-12 col-md-4 col-lg-4">
                            <label class="form-label">Estudios:</label>
                            <select name="estudios" id="select" class="form-control">
                                <option value="">No ha seleccionado ningún nivel de estudio</option>
                                <option value="Primaria">Primaria</option>
                                <option value="Secundaria">Secundaria</option>
                                <option value="Preparatoria">Preparatoria</option>
                                <option value="Licenciatura">Licenciatura</option>
                                <option value="Maestria/Posgrado">Maestria/Posgrado</option>
                                <option value="Ninguno">Ninguno</option>
                            </select>
                        </fieldset>

                        <fieldset class="form-group col-12 col-md-4 col-lg-4">
                            <label class="form-label">Profesión:</label>
                            <input name="profesion" type="text" class="form-control">
                        </fieldset>

                        <fieldset class="form-group col-12 col-md-8 col-lg-8">
                            <label class="form-label">Horario laboral:</label>
                            <textarea name="horario_laboral" rows="4" class="form-control" placeholder="Ejemplo: Lunes: 08:30 am a 06:30 pm"></textarea>
                        </fieldset>
                    </div>

                    <fieldset class="form-group col-12">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a href="{{ route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]) }}" class="btn btn-danger">
                            <span class="ladda-label">Cancelar</span>
                        </a>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>
@endsection