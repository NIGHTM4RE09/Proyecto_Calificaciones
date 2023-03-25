@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Materias del grupo de {{ $grupo->grupo }} de {{ $nivel->nivel }}</h2>
                </div>
            </div>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 mb-3">
                    <form action="{{ route('asignar.materias', [$ciclo, $nivel, $grupo]) }}" method="POST">

                        @csrf
                        <fieldset class="form-group">
                            <label for="select" class="form-label">Escriba el nombre correcto de la materia</label>
                            <input type="text" class="form-control" name="materia">
                        </fieldset>

                        <fieldset class="form-group">
                            <button type="submit" class="btn btn-success">Agregar materia</button>
                            <a href="{{ route('alumnos.index', [$ciclo, $nivel, $grupo]) }}" class="btn btn-danger">
                                <span class="ladda-label">Regresar</span>
                            </a>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="row">
                @foreach ($materias as $item)
                <div class="col-12 col-md-3 col-lg-3 mb-3 mb-sm-0">
                    <div class="card text-center">
                        <div class="card-header text-bg-success">
                            {{$item->materia}}
                          </div>
                        <div class="card-body">
                            <form action="{{ route('eliminar.materia', $item) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button title="eliminar" type="submit"
                                    class="btn btn-inline btn-danger btn-sm ladda-button" data-size="s">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
