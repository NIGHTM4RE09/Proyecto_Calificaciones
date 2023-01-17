@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Roles de usuarios</h2>
                </div>
            </div>
        </div>
    </header>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-4">
            <div class="form-group">
                <a href="{{ route('roles.create') }}" class="btn btn-inline btn-success ladda-button">
                    <span class="ladda-label">Agregar</span>
                </a>
            </div>
        </div>
    </div>
    <section class="card">
        <div class="card-block">
            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Rol</th>
                        <th>Fecha de creación</th>
                        <th>Fecha de actualización</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Rol</th>
                        <th>Fecha de creación</th>
                        <th>Fecha de actualización</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($rol as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <form action="{{ route('roles.destroy', $item) }}" method="POST">
                                    
                                    @csrf 
                                    @method('delete')
                                    <a title="editar" href="{{ route('roles.show', $item) }}"
                                        class="btn btn-inline btn-info btn-sm ladda-button" data-size="s">
                                        <span class="ladda-label">
                                            <i class="fa fa-edit"></i>
                                        </span>
                                    </a>
                                    <button title="eliminar" type="submit"
                                        class="btn btn-inline btn-danger btn-sm ladda-button"
                                        data-size="s">
                                        <span class="ladda-label">
                                            <i class="fa fa-trash"></i>
                                        </span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection