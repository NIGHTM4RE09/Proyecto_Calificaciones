@extends('layouts.cuerpo')

@section('contenido')

<header class="section-header">
    <div class="tbl">
        <div class="tbl-row">
            <div class="tbl-cell">
                <h2>Familiares</h2>
            </div>
        </div>
    </div>
</header>

<section class="card">
    <div class="card-block">
        <div class="row">
            <form action="{{route('familiares.store', [$ciclo, $nivel, $grupo, $alumno])}}" method="POST">
                @csrf

                <fieldset class="form-group col-12 col-md-4 col-lg-4">
                    <label class="form-label">Nombre completo</label>
                    <input name="nombre" type="text"
                        class="form-control" data-validation="[NOTEMPTY]"
                        data-validation-message="Debes agregar un nombre">
                </fieldset>

                <fieldset class="form-group col-12 col-md-2 col-lg-2">
                    <label class="form-label">Edad</label>
                    <input name="edad" type="number"
                        class="form-control" data-validation="[NOTEMPTY]"
                        data-validation-message="Debes agregar una edad">
                </fieldset>

                <fieldset class="form-group col-12 col-md-4 col-lg-4">
                    <label class="form-label">Nivel de estudios</label>
                    <select name="estudios" id="select" class="form-control"
                        data-validation="[NOTEMPTY]" data-validation-message="Este campo no debe ir vacio">
                        <option value="">No ha seleccionado ningún nivel de estudio</option>
                        <option value="Primaria">Primaria</option>
                        <option value="Secundaria">Secundaria</option>
                        <option value="Preparatoria">Preparatoria</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Maestria/Posgrado">Maestria/Posgrado</option>
                        <option value="Ninguno">Ninguno</option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-12 col-md-2 col-lg-2">
                    <label class="form-label">Parentesco</label>
                    <input name="parentesco" type="text"
                        class="form-control" data-validation="[NOTEMPTY]"
                        data-validation-message="Debes agregar un parentesco">
                </fieldset>

                <fieldset class="form-group col-12 col-md-12 col-lg-12">
                    <button type="submit" class="btn btn-success">Agregar</button>
                    <a href="{{ route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]) }}" class="btn btn-danger">
                        <span class="ladda-label">Cancelar</span>
                    </a>
                </fieldset>
            </form>
        </div>
    </div>
</section>
@endsection