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
            <div class="row">
                @if ($grupo->user_id == null)
                    @can('Asesor')
                        <div class="col col-md-6 col-lg-6">
                            <a href="{{ route('asesor', [$ciclo, $nivel, $grupo]) }}" class="btn btn-success">
                                <span class="ladda-label">Asignar asesor</span>
                            </a>
                        </div>
                    @endcan
                @else
                    <div class="col-12">
                        <h3>Asesor: Mtr. {{ $user->name }}</h3>
                    </div>
                    @can('Asesor')
                        <div class="col-12 col-md-6 col-lg-6 form-group">
                            <a href="{{ route('asesor', [$ciclo, $nivel, $grupo]) }}" class="btn btn-primary btn-inline">
                                <span class="ladda-label">Cambiar asesor</span>
                            </a>
                            <a href="{{ route('materias', [$ciclo, $nivel, $grupo]) }}" class="btn btn-warning btn-inline">
                                <span class="ladda-label">Asignar materias al grupo</span>
                            </a>
                        </div>
                    @endcan
                @endif
            </div>
        </div>
    </section>

    <section class="card">
        <div class="card-block">
            <div class="row">
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
                                        <a title="calificaciones"
                                            href="{{ route('calificaciones.index', [$ciclo, $nivel, $grupo, $item->id]) }}"
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
                                            <form action="{{ route('alumnos.destroy', $item) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button title="eliminar" type="submit"
                                                    class="btn btn-inline btn-danger btn-sm ladda-button" data-size="s">
                                                    <span class="ladda-label">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
