@extends('layouts.cuerpo')

@section('contenido')

<header class="section-header">
    <div class="tbl">
        <div class="tbl-row">
            <div class="tbl-cell">
                <h2>Datos del alumno(a): {{$alumno->nombre}}</h2>
            </div>
        </div>
    </div>
</header>

    <section class="card">
        <div class="card-block">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('datos.store', [$ciclo, $nivel, $grupo, $alumno])}}" method="post">
                        @csrf

                        <fieldset class="form-group">
                            <label class="form-label">Fecha de nacimiento:</label>
                            <div class='input-group date'>
                                <input id="daterange3" name="fecha_nacimiento" type="text" value="" class="form-control"
                                    data-validation-message="Debes agregar una fecha">
                                <span class="input-group-addon">
                                    <i class="font-icon font-icon-calend"></i>
                                </span>
                            </div>
                            <small class="text-muted">Formato de fecha: Mes/Día/Año</small>
                        </fieldset>

                        <fieldset class="form-group">
                            <label class="form-label">CURP:</label>
                            <input style="text-transform:uppercase;" name="curp" type="text"
                                class="form-control" data-validation="[NOTEMPTY]"
                                data-validation-message="Debes agregar una CURP">
                        </fieldset>

                        <fieldset class="form-group">
                            <label class="form-label">Seleccione tipo de sangre</label>
                            <select name="tipo_sangre" id="select" class="form-control"
                                data-validation="[NOTEMPTY]" data-validation-message="Este campo no debe ir vacio">
                                <option value="">No ha seleccionado ningún tipo de sangre</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <label class="form-label">Situación familiar</label>
                            <textarea name="situacion_familiar" rows="4" class="form-control"></textarea>
                        </fieldset>

                        <fieldset class="form-group">
                            <label class="form-label">Relaciones familiares</label>
                            <textarea name="relacion_familiar" rows="4" class="form-control"></textarea>
                        </fieldset>

                        <fieldset class="form-group">
                            <label class="form-label">Personalidad del alumno</label>
                            <textarea name="personalidad" rows="4" class="form-control"></textarea>
                        </fieldset>

                        <fieldset class="form-group">
                            <label class="form-label">Descripción breve de como es el alumno</label>
                            <textarea name="descripcion" rows="4" class="form-control"></textarea>
                        </fieldset>

                        <fieldset class="form-group">
                            <label class="form-label">Enfermedades o padecimientos:</label>
                            <textarea name="enfermedades" rows="4" class="form-control"></textarea>
                        </fieldset>

                        <fieldset class="form-group">
                            <label class="form-label">Alergias:</label>
                            <textarea name="alergias" rows="4" class="form-control"></textarea>
                        </fieldset>

                        <fieldset class="form-group">
                            <label class="form-label">Deficiencias o dificultades:</label>
                            <textarea name="deficiencias" rows="4" class="form-control"></textarea>
                        </fieldset>

                        <fieldset class="form-group">
                            <label class="form-label">Atenciones especiales:</label>
                            <textarea name="atencion" rows="4" class="form-control"></textarea>
                        </fieldset>

                        <div class="form-group form-group-radios">
                            <label class="form-label" id="signup_v2-faltas">
                                ¿Suele presentar faltas de asistencia al centro por estas situaciones?
                            </label>
                            <div class="radio">
                                <input id="signup_v2-faltas-si" name="faltas" data-validation="[NOTEMPTY]"
                                    data-validation-group="signup_v2-faltas"
                                    data-validation-message="Debes de seleccionar SI o NO" type="radio"
                                    value="1">
                                <label for="signup_v2-faltas-si">Si</label>
                            </div>
                            <div class="radio">
                                <input id="signup_v2-faltas-no" name="faltas"
                                    data-validation-group="signup_v2-faltas" type="radio" value="0">
                                <label for="signup_v2-faltas-no">No</label>
                            </div>
                        </div>

                        <fieldset class="form-group">
                            <button type="submit" class="btn btn-success">Guardar</button>
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