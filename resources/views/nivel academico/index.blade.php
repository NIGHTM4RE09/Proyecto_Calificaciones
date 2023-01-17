@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Niveles académicos del Ciclo Escolar {{$ciclo->ciclo_escolar}}</h2>
                </div>
            </div>
        </div>
    </header>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="form-group">
                @can('Crear Nivel Académico')
                <a href="{{ route('nivel-academico.create', $ciclo) }}" class="btn btn-inline btn-success ladda-button">
                    <span class="ladda-label">Nuevo nivel académico</span>
                </a>
                @endcan
                <a href="{{ route('ciclo-escolar.index') }}" class="btn btn-inline btn-danger ladd-button">
                    <span class="ladda-label">Regresar</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row card-user-grid">
        @foreach ($nivel as $item)
            <div class="col-6 col-md-6 col-lg-3">
                <article class="card-user box-typical">
                    <div class="card-user-photo">
                        <a href="{{route('grupos.index', [$ciclo, $item])}}">
                            <img src="{{ asset('img/carp.png') }}" alt="">
                        </a>
                    </div>
                    <div class="card-user-name">{{ $item->nivel }}</div>
                    @can('Eliminar Nivel Académico')
                    <form action="{{ route('nivel-academico.destroy', $item) }}" method="post">
                        @csrf
                        @method('delete')
                        {{-- <a href="{{ route('grupos.index', [$ciclo, $item]) }}" class="btn btn-rounded">Ver grupos</a> --}}
                        <button title="eliminar" type="submit" class="btn btn-danger" data-size="s">
                            <span class="ladda-label">
                                <i class="fa fa-trash"></i>
                            </span>
                        </button>
                    </form>
                    @endcan
                </article>
                <!--.card-user-->
            </div>
        @endforeach
    </div>
@endsection