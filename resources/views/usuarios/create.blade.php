@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Crear Usuario</h2>
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
                <form action="{{ route('usuarios.store') }}" method="POST">

                    @csrf

                    <div class="col-12 col-md-6 col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label">Nombre completo</label>
                            <input name="name" type="text" class="form-control" data-validation="[NOTEMPTY]"
                                data-validation-message="Debes agregar un nombre" required>
                        </fieldset>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label">Correo electrónico</label>
                            <input name="email" type="text" class="form-control" data-validation="[NOTEMPTY]"
                                data-validation-message="Debes agregar un correo" required>
                        </fieldset>
                    </div>

                    <div class="col-12 col-md-2 col-lg-2">
                        <label class="form-label" id="signup_v2-rol">
                            Seleccione Rol: <span class="color-red">*</span>
                        </label>
                    </div>

                    <div class="col-12 col-md-2 col-lg-2">
                        <div class="radio">
                            <input id="administrador" name="rol" data-validation="[NOTEMPTY]"
                                data-validation-group="rol"
                                data-validation-message="Debes de seleccionar un rol" type="radio"
                                value="Administrador">
                            <label for="administrador">Administrador</label>
                        </div>
                    </div>

                    <div class="col-12 col-md-2 col-lg-2">
                        <div class="radio">
                            <input id="maestro" name="rol" data-validation-group="rol"
                                type="radio" value="Maestro">
                            <label for="maestro">Maestro</label>
                        </div>
                    </div>

                    <div class="col-12 col-md-2 col-lg-2">
                        <div class="radio">
                            <input id="asesor" name="rol" data-validation-group="rol"
                                type="radio" value="Asesor">
                            <label for="asesor">Asesor</label>
                        </div>
                    </div>

                    <div class="col-12 col-md-2 col-lg-2">
                        <div class="radio">
                            <input id="director" name="rol" data-validation-group="rol"
                                type="radio" value="Director">
                            <label for="director">Director</label>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label">Contraseña</label>
                            <input id="password" name="password" type="password" class="form-control"
                                data-validation="[NOTEMPTY]" data-validation-message="Debes ingresar una contraseña"
                                required>
                        </fieldset>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label">Confirmar contraseña</label>
                            <input id="password-confirm" name="password_confirmation" type="password" class="form-control"
                                data-validation="[NOTEMPTY]" data-validation-message="Debes ingresar una contraseña"
                                required autocomplete="new-password">
                        </fieldset>
                    </div>

                    <div class="col-12 col-md-12 col-lg-12">
                        <fieldset class="form-group">
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <a href="{{ route('usuarios.index') }}" class="btn btn-danger">
                                <span class="ladda-label">Cancelar</span>
                            </a>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
