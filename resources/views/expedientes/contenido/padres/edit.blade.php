@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Editar información @if ($padre->parentesco == 'Padre')
                            del Padre: {{ $padre->nombre }}
                        @else
                            de la Madre: {{ $padre->nombre }}
                        @endif
                    </h2>
                </div>
            </div>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <div class="row">
                <form action="{{ route('padres.update', [$ciclo, $nivel, $grupo, $alumno, $padre]) }}" method="post">
                    @csrf

                    @method('put')

                    <fieldset class="form-group col-12 col-md-4 col-lg-4">
                        <label for="select" class="form-label">Seleccione si es el padre o la madre</label>
                        <select name="parentesco" id="select" class="form-control" data-validation="[NOTEMPTY]"
                            data-validation-message="Este campo no debe ir vacio">
                            <option value="{{ $padre->parentesco }}">{{ $padre->parentesco }}</option>
                            @if ($padre->parentesco == 'Padre')
                                <option value="Madre">Madre</option>
                            @endif
                            @if ($padre->parentesco == 'Madre')
                                <option value="Madre">Padre</option>
                            @endif
                        </select>
                    </fieldset>

                    <fieldset class="form-group col-12 col-md-4 col-lg-4">
                        <label class="form-label">Nombre Completo del padre o de la madre</label>
                        <input name="nombre" value="{{ $padre->nombre }}" type="text" class="form-control"
                            data-validation="[NOTEMPTY]" data-validation-message="Debes agregar un nombre">
                    </fieldset>

                    <div class="form-group form-group-radios col-12 col-md-2 col-lg-2">
                        <label class="form-label" id="signup_v2-vive">
                            Vive:
                        </label>
                        <div class="radio">
                            @switch($padre->vive)
                                @case(1)
                                    <input id="radio_1" name="vive" onchange="javascript:showContent()" type="radio"
                                        value="1" checked>
                                    <label for="radio_1">Si</label>
                                    <input id="radio_2" name="vive" onchange="javascript:showContent()" type="radio"
                                        value="0">
                                    <label for="radio_2">No</label>
                                @break

                                @case(0)
                                    <input id="radio_1" name="vive" onchange="javascript:showContent()" type="radio"
                                        value="1">
                                    <label for="radio_1">Si</label>
                                    <input id="radio_2" name="vive" onchange="javascript:showContent()" type="radio"
                                        value="0" checked>
                                    <label for="radio_2">No</label>
                                @break

                                @default
                            @endswitch
                        </div>

                        <div id="contenido" style="display: none;">
                            <fieldset class="form-group col-12 col-md-2 col-lg-2">
                                <label class="form-label">Edad:</label>
                                <input name="edad" value="{{ $padre->edad }}" type="number" class="form-control">
                            </fieldset>

                            <fieldset class="form-group col-12 col-md-6 col-lg-6">
                                <label class="form-label">Domicilio:</label>
                                <input name="domicilio" value="{{ $padre->domicilio }}" type="text" class="form-control"
                                    data-validation="[NOTEMPTY]" data-validation-message="Debes agregar una domicilio">
                            </fieldset>

                            <fieldset class="form-group col-12 col-md-4 col-lg-4">
                                <label class="form-label">Estudios:</label>
                                <select name="estudios" id="select" class="form-control">
                                    <option value="{{ $padre->estudios }}">{{ $padre->estudios }}</option>
                                    <option value="Primaria">Primaria</option>
                                    <option value="Secundaria">Secundaria</option>
                                    <option value="Preparatoria">Preparatoria</option>
                                    <option value="Licenciatura">Licenciatura</option>
                                    <option value="Maestria/Posgrado">Maestria/Posgrado</option>
                                    <option value="Ninguno">Ninguno</option>
                                </select>
                            </fieldset>

                            <fieldset class="form-group col-12 col-md-4 col-lg-4">
                                <label class="form-label">Profesión:</label>
                                <input name="profesion" value="{{ $padre->profesion }}" type="text"
                                    class="form-control">
                            </fieldset>

                            <fieldset class="form-group col-12 col-md-8 col-lg-8">
                                <label class="form-label">Horario laboral:</label>
                                <textarea name="horario_laboral" rows="4" class="form-control" placeholder="Ejemplo: Lunes: 08:30 am a 06:30 pm">{{ $padre->horario_laboral }}</textarea>
                            </fieldset>
                        </div>

                        <fieldset class="form-group col-12">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <a href="{{ route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]) }}"
                                class="btn btn-danger">
                                <span class="ladda-label">Cancelar</span>
                            </a>
                        </fieldset>
                </form>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        function showContent() {

            element = document.getElementById("contenido");
            radio1 = document.getElementById("radio_1");
            radio2 = document.getElementById("radio_2");

            if (radio1.checked) {
                element.style.display = 'block';
            } else {
                if (radio2.checked) {
                    element.style.display = 'none';
                }
            }



        }
    </script>
@endsection