@extends('layouts.cuerpo')

@section('contenido')

<header class="section-header">
    <div class="tbl">
        <div class="tbl-row">
            <div class="tbl-cell">
                <h2>Editar hijo {{$hijo->nombre}}</h2>
            </div>
        </div>
    </div>
</header>

<section class="card">
    <div class="card-block">
        <div class="row">
            <form action="{{route('hijos.update', [$ciclo, $nivel, $grupo, $alumno, $hijo])}}" method="POST">
                @csrf
                @method('put')

                <div class="col-12 col-md-4 col-lg-4">
                    <fieldset class="form-group">
                        <label class="form-label">Nombre completo</label>
                        <input name="nombre" type="text"
                            class="form-control" data-validation="[NOTEMPTY]"
                            data-validation-message="Debes agregar un nombre" value="{{$hijo->nombre}}">
                    </fieldset>
                </div>

                <div class="col-12 col-md-2 col-lg-2">
                    <fieldset class="form-group">
                        <label class="form-label">Edad</label>
                        <input name="edad" type="number"
                            class="form-control" data-validation="[NOTEMPTY]"
                            data-validation-message="Debes agregar una edad" value="{{$hijo->edad}}">
                    </fieldset>
                </div>

                <div class="col-12 col-md-4 col-lg-4">
                    <fieldset class="form-group">
                        <label class="form-label">Nivel de estudios</label>
                        <select name="estudios" id="select" class="form-control"
                            data-validation="[NOTEMPTY]" data-validation-message="Este campo no debe ir vacio">
                            <option value="{{$hijo->estudios}}">{{$hijo->estudios}}</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>
                            <option value="Preparatoria">Preparatoria</option>
                            <option value="Licenciatura">Licenciatura</option>
                            <option value="Maestria/Posgrado">Maestria/Posgrado</option>
                            <option value="Ninguno">Ninguno</option>
                        </select>
                    </fieldset>
                </div>

                <div class="form-group form-group-radios col-12 col-md-2 col-lg-2">
                    <label class="form-label" id="signup_v2-vive">
                        ¿Vive en casa?
                    </label>
                    @if ($hijo->vive_casa = 1)
                    <div class="radio">
                        <input id="signup_v2-vive-si" name="vive_casa" data-validation="[NOTEMPTY]"
                            data-validation-group="signup_v2-vive"
                            data-validation-message="Debes de seleccionar SI o NO" type="radio"
                            value="{{$hijo->vive_casa}}" checked>
                        <label for="signup_v2-vive-si">Si</label>
                    </div>
                    <div class="radio">
                        <input id="signup_v2-vive-no" name="vive_casa"
                            data-validation-group="signup_v2-vive" type="radio" value="0">
                        <label for="signup_v2-vive-no">No</label>
                    </div>
                    @else
                    <div class="radio">
                        <input id="signup_v2-vive-si" name="vive_casa" data-validation="[NOTEMPTY]"
                            data-validation-group="signup_v2-vive"
                            data-validation-message="Debes de seleccionar SI o NO" type="radio"
                            value="1">
                        <label for="signup_v2-vive-si">Si</label>
                    </div>
                    <div class="radio">
                        <input id="signup_v2-vive-no" name="vive_casa"
                            data-validation-group="signup_v2-vive" type="radio" value="{{$hijo->vive_casa}}" checked>
                        <label for="signup_v2-vive-no">No</label>
                    </div>
                    @endif
                </div>

                <div class="col-12 col-md-12 col-lg-12">
                    <fieldset class="form-group">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a href="{{ route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]) }}" class="btn btn-danger">
                            <span class="ladda-label">Cancelar</span>
                        </a>
                    </fieldset>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection