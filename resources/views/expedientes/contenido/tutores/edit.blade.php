@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Editar Tutor</h2>
                </div>
            </div>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <div class="row">
                <form action="{{ route('tutor.update', [$ciclo, $nivel, $grupo, $alumno, $tutor]) }}" method="POST">
                    @csrf
                    @method('put')

                    <div class="col-12 col-md-6 col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label">Nombre completo:</label>
                            <input name="nombre" value="{{ $tutor->nombre }}" type="text" class="form-control"
                                data-validation="[NOTEMPTY]" data-validation-message="Debes agregar un nombre">
                        </fieldset>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label">Domicilio:</label>
                            <input name="domicilio" value="{{ $tutor->domicilio }}" type="text" class="form-control"
                                data-validation="[NOTEMPTY]" data-validation-message="Debes agregar un domicilio">
                        </fieldset>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label">Profesión:</label>
                            <input name="profesion" value="{{ $tutor->profesion }}" type="text" class="form-control"
                                data-validation="[NOTEMPTY]" data-validation-message="Debes agregar una ocupación">
                        </fieldset>
                    </div>

                    <div class="col-12 col-md-4 col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="phone-with-code-area-mask-input">Número de teléfono:</label>
                            <input name="telefono" value="{{ $tutor->telefono }}" type="text" class="form-control"
                                id="phone-with-code-area-mask-input" data-validation="[NOTEMPTY]"
                                data-validation-message="Debes agregar un número de teléfono">
                        </fieldset>
                    </div>

                    <div class="col-12 col-md-12 col-lg-12">
                        <fieldset class="form-group">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a href="{{ route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]) }}"
                                class="btn btn-danger">
                                <span class="ladda-label">Cancelar</span>
                            </a>
                        </fieldset>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection