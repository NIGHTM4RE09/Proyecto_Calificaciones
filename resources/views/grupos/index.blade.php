@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Grados académicos de {{ $nivel->nivel }}</h2>
                </div>
            </div>
        </div>
    </header>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="form-group">
                @can('Crear Grado')
                    <a href="{{ route('grupos.create', [$ciclo, $nivel]) }}" class="btn btn-inline btn-success ladda-button">
                        <span class="ladda-label">Nuevo Grupo</span>
                    </a>
                @endcan
                <a href="{{ route('nivel-academico.index', [$ciclo, $nivel]) }}"
                    class="btn btn-inline btn-danger ladd-button">
                    <span class="ladda-label">Regresar</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row card-user-grid">
        @foreach ($grupo as $item)
            <div class="col-6 col-md-6 col-lg-3">
                <article class="card-user box-typical">
                    <div class="card-user-photo">
                        <a href="{{ route('alumnos.index', [$ciclo, $nivel, $item]) }}">
                            <img src="{{ asset('img/carp.png') }}" alt=""></a>
                    </div>
                    <div class="card-user-name">{{ $item->grupo }}</div>

                    @can('Eliminar Grado')
                        <form action="{{ route('grupos.destroy', $item) }}" method="POST">
                            @csrf
                            @method('delete')
                            {{-- <a href="{{ route('alumnos.index', [$ciclo, $nivel, $item]) }}" class="btn btn-rounded">Ver
                            alumnos</a> --}}
                            <button title="eliminar" type="submit" class="btn btn-danger" data-size="s">
                                <span class="ladda-label">
                                    <i class="fa fa-trash"></i>
                                </span>
                            </button>
                        </form>
                    @endcan
                </article>
            </div>
        @endforeach
    </div>
@endsection