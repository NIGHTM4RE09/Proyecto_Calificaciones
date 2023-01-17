@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Editar usuario: {{$usuario->name}} </h2>
                </div>
            </div>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <form action="{{route('usuarios.update', $usuario)}}" method="POST">

                        @csrf
                        @method('put')

                        <fieldset class="form-group">
                            <label class="form-label">Nombre completo</label>
                            <input name="name" value="{{$usuario->name}}" type="text" class="form-control @error('name') is-invalid @enderror" data-validation="[NOTEMPTY]"
                                data-validation-message="Debes agregar un nombre">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </fieldset>

                        <fieldset class="form-group">
                            <label class="form-label">Contraseña</label>
                            <input id="password" name="password" type="password" class="form-control" placeholder="Ingrese nueva contraseña"
                                data-validation="[NOTEMPTY]" data-validation-message="Debes ingresar una contraseña">
                        </fieldset>

                        <fieldset class="form-group">
                            <label class="form-label">Confirmar contraseña</label>
                            <input id="password-confirm" name="password_confirmation" type="password" class="form-control" placeholder="Repita nueva contraseña"
                                data-validation="[NOTEMPTY]" data-validation-message="Debes ingresar una contraseña" autocomplete="new-password">
                        </fieldset>

                        <fieldset class="form-group">
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <a href="javascript:history.back()" class="btn btn-danger">
                                <span class="ladda-label">Cancelar</span>
                            </a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection