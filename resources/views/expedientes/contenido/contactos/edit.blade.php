@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Crear contacto para el alumno</h2>
                </div>
            </div>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <div class="row">
                <form class="{{ route('contacto.update', [$ciclo, $nivel, $grupo, $alumno, $contactos]) }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="col-12 col-md-6 col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label">Nombre completo del contacto</label>
                            <input name="nombre" type="text" class="form-control" data-validation="[NOTEMPTY]"
                                data-validation-message="Debes agregar un nombre" value="{{$contactos->nombre}}">
                        </fieldset>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label" for="phone-with-code-area-mask-input">Número de teléfono</label>
                            <input name="telefono" type="text" class="form-control" id="phone-with-code-area-mask-input" data-validation="[NOTEMPTY]"
                            data-validation-message="Debes agregar un número de teléfono" value="{{$contactos->telefono}}">
                        </fieldset>
                    </div>

                    <div class="form-group form-group-radios col-12">
                        <label class="form-label" id="signup_v2-recoger">
                            ¿Puede recoger al alumno?<span class="color-red">*</span>
                        </label>
                        @if ($contactos->recoger == 1)
                        <div class="radio">
                            <input id="signup_v2-recoger-si" name="recoger" data-validation="[NOTEMPTY]"
                                data-validation-group="signup_v2-recoger"
                                data-validation-message="Debes de seleccionar SI o NO" type="radio"
                                value="1" checked>
                            <label for="signup_v2-recoger-si">Si</label>
                        </div>
                        <div class="radio">
                            <input id="signup_v2-recoger-no" name="recoger"
                                data-validation-group="signup_v2-recoger" type="radio" value="0">
                            <label for="signup_v2-recoger-no">No</label>
                        </div>
                        @else
                        <div class="radio">
                            <input id="signup_v2-recoger-si" name="recoger" data-validation="[NOTEMPTY]"
                                data-validation-group="signup_v2-recoger"
                                data-validation-message="Debes de seleccionar SI o NO" type="radio"
                                value="1">
                            <label for="signup_v2-recoger-si">Si</label>
                        </div>
                        <div class="radio">
                            <input id="signup_v2-recoger-no" name="recoger"
                                data-validation-group="signup_v2-recoger" type="radio" value="0" checked>
                            <label for="signup_v2-recoger-no">No</label>
                        </div>
                        @endif
                    </div>

                    <div class="col-12">
                        <fieldset class="form-group">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a href="{{ route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]) }}" class="btn btn-danger">
                                <span class="ladda-label">Cancelar</span>
                            </a>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection