@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Editar hábitos de estudio del alumno(a) {{ $alumno->nombre }}</h2>
                </div>
            </div>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('habito.update', [$ciclo, $nivel, $grupo, $alumno, $habito]) }}" method="POST">
                        @csrf
                        @method('put')

                        <div class="form-group form-group-radios">
                            <label class="form-label" id="signup_v2-hablar">
                                ¿Suele hablar con ustedes de lo que le interesa o preocupa?
                            </label>
                            @if ($habito->intereses = 1)
                            <div class="radio">
                                <input id="signup_v2-hablar-si" name="intereses" data-validation="[NOTEMPTY]"
                                    data-validation-group="signup_v2-hablar"
                                    data-validation-message="Debes de seleccionar SI o NO" type="radio" value="1" checked>
                                <label for="signup_v2-hablar-si">Si</label>
                            </div>
                            <div class="radio">
                                <input id="signup_v2-hablar-no" name="intereses" data-validation-group="signup_v2-hablar"
                                    type="radio" value="0">
                                <label for="signup_v2-hablar-no">No</label>
                            </div>
                            @else
                            <div class="radio">
                                <input id="signup_v2-hablar-si" name="intereses" data-validation="[NOTEMPTY]"
                                    data-validation-group="signup_v2-hablar"
                                    data-validation-message="Debes de seleccionar SI o NO" type="radio" value="1">
                                <label for="signup_v2-hablar-si">Si</label>
                            </div>
                            <div class="radio">
                                <input id="signup_v2-hablar-no" name="intereses" data-validation-group="signup_v2-hablar"
                                    type="radio" value="0" checked>
                                <label for="signup_v2-hablar-no">No</label>
                            </div>
                            @endif
                        </div>

                        <div class="form-group form-group-radios">
                            <label class="form-label" id="signup_v2-estudio">
                                ¿Tiene un horario fijo para estudiar?
                            </label>
                            @if ($habito->horario = 1)
                                <div class="radio">
                                    <input id="signup_v2-estudio-si" name="horario" data-validation="[NOTEMPTY]"
                                        data-validation-group="signup_v2-estudio"
                                        data-validation-message="Debes de seleccionar SI o NO" type="radio" value="1"
                                        checked>
                                    <label for="signup_v2-estudio-si">Si</label>
                                </div>
                                <div class="radio">
                                    <input id="signup_v2-estudio-no" name="horario"
                                        data-validation-group="signup_v2-estudio" type="radio" value="0">
                                    <label for="signup_v2-estudio-no">No</label>
                                </div>
                            @else
                                <div class="radio">
                                    <input id="signup_v2-estudio-si" name="horario" data-validation="[NOTEMPTY]"
                                        data-validation-group="signup_v2-estudio"
                                        data-validation-message="Debes de seleccionar SI o NO" type="radio"
                                        value="1">
                                    <label for="signup_v2-estudio-si">Si</label>
                                </div>
                                <div class="radio">
                                    <input id="signup_v2-estudio-no" name="horario"
                                        data-validation-group="signup_v2-estudio" type="radio" value="0" checked>
                                    <label for="signup_v2-estudio-no">No</label>
                                </div>
                            @endif
                        </div>

                        <div class="form-group form-group-radios">
                            <label class="form-label" id="signup_v2-fijo">
                                Si tiene horario fijo, ¿lo cumple?
                            </label>
                            @if ($habito->horario_cumplido)
                            <div class="radio">
                                <input id="signup_v2-fijo-si" name="horario_cumplido" data-validation="[NOTEMPTY]"
                                    data-validation-group="signup_v2-fijo"
                                    data-validation-message="Debes de seleccionar SI o NO" type="radio" value="1" checked>
                                <label for="signup_v2-fijo-si">Si</label>
                            </div>
                            <div class="radio">
                                <input id="signup_v2-fijo-no" name="horario_cumplido" data-validation-group="signup_v2-fijo"
                                    type="radio" value="0">
                                <label for="signup_v2-fijo-no">No</label>
                            </div>
                            @else
                            <div class="radio">
                                <input id="signup_v2-fijo-si" name="horario_cumplido" data-validation="[NOTEMPTY]"
                                    data-validation-group="signup_v2-fijo"
                                    data-validation-message="Debes de seleccionar SI o NO" type="radio" value="1">
                                <label for="signup_v2-fijo-si">Si</label>
                            </div>
                            <div class="radio">
                                <input id="signup_v2-fijo-no" name="horario_cumplido" data-validation-group="signup_v2-fijo"
                                    type="radio" value="0" checked>
                                <label for="signup_v2-fijo-no">No</label>
                            </div>
                            @endif
                        </div>

                        <fieldset class="form-group">
                            <label class="form-label" for="time-mask-input">¿Cuántas horas semanales dedica al
                                estudio?</label>
                            <input type="datetime" name="horario_estudio" value="{{$habito->horario_estudio}}" class="form-control" id="time-mask-input">
                        </fieldset>

                        <div class="form-group form-group-radios">
                            <label class="form-label" id="signup_v2-tarea">
                                ¿Supervisa su trabajo (tareas)?
                            </label>
                            @if ($habito->tareas)
                            <div class="radio">
                                <input id="signup_v2-tarea-si" name="tareas" data-validation="[NOTEMPTY]"
                                    data-validation-group="signup_v2-tarea"
                                    data-validation-message="Debes de seleccionar SI o NO" type="radio" value="1" checked>
                                <label for="signup_v2-tarea-si">Si</label>
                            </div>
                            <div class="radio">
                                <input id="signup_v2-tarea-no" name="tareas" data-validation-group="signup_v2-tarea"
                                    type="radio" value="0">
                                <label for="signup_v2-tarea-no">No</label>
                            </div>
                            @else
                            <div class="radio">
                                <input id="signup_v2-tarea-si" name="tareas" data-validation="[NOTEMPTY]"
                                    data-validation-group="signup_v2-tarea"
                                    data-validation-message="Debes de seleccionar SI o NO" type="radio" value="1">
                                <label for="signup_v2-tarea-si">Si</label>
                            </div>
                            <div class="radio">
                                <input id="signup_v2-tarea-no" name="tareas" data-validation-group="signup_v2-tarea"
                                    type="radio" value="0" checked>
                                <label for="signup_v2-tarea-no">No</label>
                            </div>
                            @endif
                        </div>

                        <fieldset class="form-group">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a href="{{ route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]) }}"
                                class="btn btn-danger">
                                <span class="ladda-label">Cancelar</span>
                            </a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
