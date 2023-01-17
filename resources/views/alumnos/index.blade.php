@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Lista de Alumnos del {{ $grupo->grupo }} de {{ $nivel->nivel }}</h2>
                </div>
            </div>
        </div>
    </header>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="form-group">
                @can('Crear Alumno')
                    <a href="{{ route('alumnos.create', [$ciclo, $nivel, $grupo]) }}"
                        class="btn btn-inline btn-success ladda-button">
                        <span class="ladda-label">Agregar alumno</span>
                    </a>
                @endcan
                <a href="{{ route('grupos.index', [$ciclo, $nivel, $grupo]) }}"
                    class="btn btn-inline btn-danger ladd-button">
                    <span class="ladda-label">Regresar</span>
                </a>
            </div>
        </div>
    </div>
    <section class="card">
        <div class="card-block">
            <div class="col col-md-6 col-lg-6">
                @if ($grupo->user_id == null)
                    @can('Asesor')
                        <a href="{{ route('asesor', [$ciclo, $nivel, $grupo]) }}"
                            class="btn btn-inline btn-success ladda-button">
                            <span class="ladda-label">Asignar asesor</span>
                        </a>
                    @endcan
                @else
                    <h3>Asesor: Mtr. {{ $user->name }}</h3>
                    @can('Asesor')
                        <div class="col col-md-6 col-lg-4">
                            <a href="{{ route('asesor', [$ciclo, $nivel, $grupo]) }}"
                                class="btn btn-inline btn-primarys ladda-button">
                                <span class="ladda-label">Cambiar asesor</span>
                            </a>
                        </div>
                    @endcan
                @endif
            </div>
            <div class="col col-md-12 col-lg-12">
                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nombre Completo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombre Completo</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($alumno as $item)
                            <tr>
                                <td>{{ $item->nombre }}</td>
                                <td>
                                    <form action="{{ route('alumnos.destroy', $item) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <a title="calificaciones" href="{{ route('ups') }}{{-- {{ route('calificaciones.index', [$ciclo, $nivel, $grupo, $item]) }} --}}"
                                            class="btn btn-inline btn-sm btn-primary text-center">
                                            <span class="ladda-label">
                                                <i class="fa fa-calendar-check-o"></i>
                                            </span>
                                        </a>
                                        @can('Expediente Alumno')
                                            <a title="Expediente"
                                                href="{{ route('expediente.index', [$ciclo, $nivel, $grupo, $item]) }}"
                                                class="btn btn-inline btn-sm btn-warning text-center">
                                                <span class="ladda-label">
                                                    <i class="fa fa-book"></i>
                                                </span>
                                            </a>
                                        @endcan
                                        @can('Editar Alumno')
                                            <a title="editar" href="{{ route('alumnos.edit', $item) }}"
                                                class="btn btn-inline btn-info btn-sm ladda-button" data-size="s">
                                                <span class="ladda-label">
                                                    <i class="fa fa-edit"></i>
                                                </span>
                                            </a>
                                        @endcan
                                        @can('Eliminar Alumno')
                                            <button title="eliminar" type="submit"
                                                class="btn btn-inline btn-danger btn-sm ladda-button" data-size="s">
                                                <span class="ladda-label">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection