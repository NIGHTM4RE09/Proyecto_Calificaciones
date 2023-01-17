@extends('layouts.cuerpo')

@section('contenido')
<header class="section-header">
    <div class="tbl">
        <div class="tbl-row">
            <div class="tbl-cell">
                <h2>Editar Rol de usuario</h2>
            </div>
        </div>
    </div>
</header>

<section class="card">
    <div class="card-block">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('roles.store', $item)}}" method="POST">

                    @csrf
                    @method('put')

                    <fieldset class="form-group">
                        <label class="form-label">Nombre del rol</label>
                        <input name="rol" type="text" class="form-control" data-validation="[NOTEMPTY]"
                            data-validation-message="Debes agregar un rol" value="" required>
                    </fieldset>

                    <fieldset class="form-group">
                        <button type="submit" class="btn btn-success">Guardar</button>
                        <a href="{{ route('roles.index') }}" class="btn btn-danger">
                            <span class="ladda-label">Cancelar</span>
                        </a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection