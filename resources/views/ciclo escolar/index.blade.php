@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Ciclo Escolar</h2>
                </div>
            </div>
        </div>
    </header>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                @can('Crear Ciclo')
                    <a href="{{ route('ciclo-escolar.create') }}" class="btn btn-inline btn-success ladda-button">
                        <span class="ladda-label">Nuevo ciclo escolar</span>
                    </a>
                @endcan
            </div>
        </div>
    </div>
    <div class="row card-user-grid">
        @foreach ($ciclo as $item)
            <div class="col-6 col-md-4 col-lg-3">
                <article class="card-user box-typical">
                    <div class="card-user-photo">
                        <a href="{{ route('nivel-academico.index', $item) }}">
                            <img src="{{ asset('img/carp.png') }}" alt="">
                        </a>
                    </div>
                    <div class="card-user-name">{{ $item->ciclo_escolar }}</div>
                    @can('Eliminar Ciclo')
                        <form action="{{ route('ciclo-escolar.destroy', $item) }}" method="post">
                            @csrf
                            @method('delete')
                            {{-- <a href="{{ route('nivel-academico.index', $item) }}" class="btn btn-rounded">Ingresar</a> --}}
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