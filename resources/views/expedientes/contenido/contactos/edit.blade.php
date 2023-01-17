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
                <div class="col-12 col-md-6 col-lg-6">
                    <form class="{{ route(/* '.update', [$ciclo, $nivel, $grupo, $alumno, $tutor] */) }}" method="POST">

                        <fieldset class="form-group">
                            <label class="form-label">Nombre completo del contacto</label>
                            <input name="signin_v2[name]" type="text" class="form-control" data-validation="[NOTEMPTY]"
                                data-validation-message="Debes agregar un nombre">
                        </fieldset>

                        <fieldset class="form-group">
                            <label class="form-label" for="phone-with-code-area-mask-input">Número de teléfono</label>
                            <input name="signin_v2[name]" type="text" class="form-control" id="phone-with-code-area-mask-input" data-validation="[NOTEMPTY]"
                            data-validation-message="Debes agregar un número de teléfono">
                        </fieldset>

                        <div class="form-group form-group-radios">
                            <label class="form-label" id="signup_v2-recoger">
                                ¿Puede recoger al alumno?<span class="color-red">*</span>
                            </label>
                            <div class="radio">
                                <input id="signup_v2-recoger-si" name="signup_v2[recoger]" data-validation="[NOTEMPTY]"
                                    data-validation-group="signup_v2-recoger"
                                    data-validation-message="Debes de seleccionar SI o NO" type="radio"
                                    value="Si">
                                <label for="signup_v2-recoger-si">Si</label>
                            </div>
                            <div class="radio">
                                <input id="signup_v2-recoger-no" name="signup_v2[recoger]"
                                    data-validation-group="signup_v2-recoger" type="radio" value="No">
                                <label for="signup_v2-recoger-no">No</label>
                            </div>
                        </div>

                        <fieldset class="form-group">
                            <button type="submit" class="btn btn-success">Agregar</button>
                            <a href="{{ route('expediente.index') }}" class="btn btn-danger">
                                <span class="ladda-label">Cancelar</span>
                            </a>
                        </fieldset>
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection