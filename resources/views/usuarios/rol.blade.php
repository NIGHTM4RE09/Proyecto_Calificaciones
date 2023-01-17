@extends('layouts.cuerpo')

@section('contenido')

<header class="section-header">
    <div class="tbl">
        <div class="tbl-row">
            <div class="tbl-cell">
                <h2>Cambiar rol a: {{$user->name}}</h2>
            </div>
        </div>
    </div>
</header>

    <section class="card">
        <div class="card-block">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('asignar', $user)}}" method="post">
                        @csrf
                        <fieldset class="form-group">
                            <label class="form-label">Seleccione el rol</label>
                            <select class="bootstrap-select" name="roles[]">
                                @foreach ($rol as $item)
                                <option
                                    {{ in_array($item->id,$user->roles()->pluck('roles.id')->all())? 'selected="selected"': '' }}
                                    id="role_{{ $item->id }}" value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <button type="submit" class="btn btn-success">Actualizar rol</button>
                            <a href="{{ route('usuarios.index') }}" class="btn btn-danger">
                                <span class="ladda-label">Cancelar</span>
                            </a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection