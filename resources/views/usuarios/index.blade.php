@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Usuarios</h2>
                </div>
            </div>
        </div>
    </header>

    @can('Crear Usuarios')
        <div class="row">
            <div class="col-4 col-md-6 col-sm-12">
                <div class="form-group">
                    <a href="{{ route('usuarios.create') }}" class="btn btn-inline btn-success ladda-button">
                        <span class="ladda-label">Agregar</span>
                    </a>
                </div>
            </div>
        </div>
    @endcan
    <section class="card">
        <div class="card-block">
            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Nombre Completo</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nombre Completo</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($user as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                @foreach ($item->getRoleNames() as $rol)
                                    {{ $rol }}
                                @endforeach
                            </td>
                            <td>
                                <form action="{{ route('usuarios.destroy', $item) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    @can('Editar Usuarios')
                                        <a title="editar" href="{{ route('usuarios.show', $item) }}"
                                            class="btn btn-inline btn-info btn-sm ladda-button" data-size="s">
                                            <span class="ladda-label">
                                                <i class="fa fa-edit"></i>
                                            </span>
                                        </a>
                                    @endcan
                                    @can('Asignar Rol')
                                        <a title="rol" href="{{ route('rol', $item) }}"
                                            class="btn btn-inline btn-success btn-sm ladda-button" data-size="s">
                                            <span class="ladda-label">
                                                <i class="fa fa-user-secret"></i>
                                            </span>
                                        </a>
                                    @endcan
                                    @can('Eliminar Usuario')
                                        @if (Auth::user()->id != $item->id)
                                            <button title="eliminar" type="submit"
                                                class="btn btn-inline btn-danger btn-sm ladda-button" data-size="s">
                                                <span class="ladda-label">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </button>
                                        @endif
                                    @endcan
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection