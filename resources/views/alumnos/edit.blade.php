@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Editar alumno</h2>
                </div>
            </div>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{route('alumnos.update', $alumno)}}" method="POST">
                        @csrf
                        @method('put')
                        <fieldset class="form-group">
                            <label class="form-label">Nombre completo del alumno</label>
                            <input value="{{$alumno->nombre}}" name="nombre" type="text" class="form-control" data-validation="[NOTEMPTY]"
                                data-validation-message="Debes agregar un nombre" placeholder="Apellido P Apellido M Nombre(s)">
                        </fieldset>

                        <fieldset class="form-group">
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <a href="javascript:history.back()" class="btn btn-danger">
                                <span class="ladda-label">Cancelar</span>
                            </a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection