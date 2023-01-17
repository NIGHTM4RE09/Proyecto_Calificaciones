@extends('layouts.cuerpo')

@section('contenido')

<header class="section-header">
    <div class="tbl">
        <div class="tbl-row">
            <div class="tbl-cell">
                <h2>Editar al familiar {{$family->nombre}}</h2>
            </div>
        </div>
    </div>
</header>

<section class="card">
    <div class="card-block">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('familiares.update', [$ciclo, $nivel, $grupo, $alumno, $family])}}" method="POST">
                    @csrf
                    @method('put')

                    <fieldset class="form-group">
                        <label class="form-label">Nombre completo</label>
                        <input name="nombre" type="text"
                            class="form-control" data-validation="[NOTEMPTY]"
                            data-validation-message="Debes agregar un nombre" value="{{$family->nombre}}">
                    </fieldset>

                    <fieldset class="form-group">
                        <label class="form-label">Edad</label>
                        <input name="edad" type="number"
                            class="form-control" data-validation="[NOTEMPTY]"
                            data-validation-message="Debes agregar una edad" value="{{$family->edad}}">
                    </fieldset>

                    <fieldset class="form-group">
                        <label class="form-label">Nivel de estudios</label>
                        <select name="estudios" id="select" class="form-control"
                            data-validation="[NOTEMPTY]" data-validation-message="Este campo no debe ir vacio">
                            <option value="{{$family->estudios}}">{{$family->estudios}}</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>
                            <option value="Preparatoria">Preparatoria</option>
                            <option value="Licenciatura">Licenciatura</option>
                            <option value="Maestria/Posgrado">Maestria/Posgrado</option>
                            <option value="Ninguno">Ninguno</option>
                        </select>
                    </fieldset>

                    <fieldset class="form-group">
                        <label class="form-label">Parentesco</label>
                        <input name="parentesco" type="text"
                            class="form-control" data-validation="[NOTEMPTY]"
                            data-validation-message="Debes agregar un parentesco" value="{{$family->parentesco}}">
                    </fieldset>

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