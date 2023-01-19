@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Editar Ocio y tiempo libre del alumno</h2>
                </div>
            </div>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <div class="row">
                <form action="{{ route('hobbies.update', [$ciclo, $nivel, $grupo, $alumno, $hobbie]) }}" method="POST">
                    @csrf
                    @method('put')

                    <fieldset class="form-group col-12">
                        <label class="form-label">¿Qué hace su hijo durante las horas libres?</label>
                        <textarea class="form-control" name="horas_libres" data-validation="[NOTEMPTY]" data-validation-message="Debe completar este campo"
                            rows="4">{{$hobbie->horas_libres}}</textarea>
                    </fieldset>

                    <fieldset class="form-group col-12">
                        <label class="form-label">¿Cómo ocupa el tiempo libre en familia? (televisión, afición común,
                            excursiones, juegos, conversar, etc.)</label>
                        <textarea name="tiempo_libre" rows="4" class="form-control" data-validation="[NOTEMPTY]"
                            data-validation-message="Debe completar este campo">{{$hobbie->tiempo_libre}}</textarea>
                    </fieldset>

                    <fieldset class="form-group col-12">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                        <a href="{{ route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]) }}" class="btn btn-danger">
                            <span class="ladda-label">Cancelar</span>
                        </a>
                    </fieldset>
                </form>
            </div>
        </div>
    </section>
@endsection