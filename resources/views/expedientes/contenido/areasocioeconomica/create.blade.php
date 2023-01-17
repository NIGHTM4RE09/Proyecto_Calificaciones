@extends('layouts.cuerpo')

@section('contenido')

<header class="section-header">
    <div class="tbl">
        <div class="tbl-row">
            <div class="tbl-cell">
                <h2>Area socioeconómica</h2>
            </div>
        </div>
    </div>
</header>

<section class="card">
    <div class="card-block">
        <div class="row">
            <div class="col-md-12">
                <p class="card-text">Los datos recabados sólo se utilizarán estadísticamente, por ello lo invitamos a contestar
                    con la mayor veracidad posible.</p>

                <form action="{{route('area.store', [$ciclo, $nivel, $grupo, $alumno])}}" method="POST">
                    @csrf
                    <div class="form-group form-group-radios">
                        <label class="form-label" id="signup_v2-casa">
                            La casa de los padres es:
                        </label>
                        <div class="radio">
                            <input id="radio_1" name="casa_padres" type="radio"
                                value="Rentada">
                            <label for="radio_1">Rentada</label>
                        </div>
                        <div class="radio">
                            <input id="radio_2" name="casa_padres" type="radio"
                                value="Prestada">
                            <label for="radio_2">Prestada</label>
                        </div>
                        <div class="radio">
                            <input id="radio_3" name="casa_padres" type="radio"
                                value="Propia">
                            <label for="radio_3">Propia</label>
                        </div>
                    </div>

                    <fieldset class="form-group">
                        <label class="form-label">¿Con cuantas habitaciones cuenta la casa?</label>
                        <input name="habitaciones" type="number" class="form-control" data-validation="[NOTEMPTY]"
                            data-validation-message="Debe agregar una cantidad">
                    </fieldset>

                    <div class="form-group form-group-radios">
                        <label class="form-label" id="signup_v2-dormitorios">
                            ¿Cuenta con dormitorio propio?
                        </label>
                        <div class="radio">
                            <input id="radio_4" name="dormitorio" type="radio"
                                value="1">
                            <label for="radio_4">Si</label>
                        </div>
                        <div class="radio">
                            <input id="radio_5" name="dormitorio" type="radio"
                                value="0">
                            <label for="radio_5">No</label>
                        </div>
                    </div>

                    <fieldset class="form-group">
                        <label class="form-label">¿Con qué servicios cuenta la casa? (Luz, internet, drenaje, agua potable, pozo, losa, etc.)</label>
                        <textarea name="servicios" rows="4" class="form-control"></textarea>
                    </fieldset>

                    <fieldset class="form-group">
                        <label class="form-label">La suma de los ingresos mensuales de la familia es (un aproximado):</label>
                        <div class="input-group">
                            <div class="input-group-addon">$</div>
                            <input type="text" name="suma_ingresos" class="form-control" id="exampleInputAmount" placeholder="Monto total">
                            <div class="input-group-addon">.00</div>
                        </div>
                    </fieldset>

                    <fieldset class="form-group">
                        <label class="form-label">Los gastos escolares como pasajes, alimentos y materiales suman un promedio quincenal de:</label>
                        <div class="input-group">
                            <div class="input-group-addon">$</div>
                            <input type="text" name="gastos_escolares" class="form-control" id="exampleInputAmount" placeholder="Monto total">
                            <div class="input-group-addon">.00</div>
                        </div>
                    </fieldset>

                    <div class="form-group form-group-radios">
                        <label class="form-label" id="signup_v2-vaciones">
                            ¿Su familia sale a vacacionar?
                        </label>
                        <div class="radio">
                            <input id="radio_6" name="vacaciones" type="radio"
                                value="1">
                            <label for="radio_6">Si</label>
                        </div>
                        <div class="radio">
                            <input id="radio_7" name="vacaciones" type="radio"
                                value="0">
                            <label for="radio_7">No</label>
                        </div>
                    </div>

                    <div class="form-group form-group-radios">
                        <label class="form-label" id="signup_v2-cine">
                            ¿Van al cine?
                        </label>
                        <div class="radio">
                            <input id="radio_8" name="cine" type="radio"
                                value="1">
                            <label for="radio_8">Si</label>
                        </div>
                        <div class="radio">
                            <input id="radio_9" name="cine" type="radio"
                                value="0">
                            <label for="radio_9">No</label>
                        </div>
                    </div>

                    <div class="form-group form-group-radios">
                        <label class="form-label" id="signup_v2-teatro">
                            ¿Van al teatro?
                        </label>
                        <div class="radio">
                            <input id="radio_10" name="teatro" type="radio"
                                value="1">
                            <label for="radio_10">Si</label>
                        </div>
                        <div class="radio">
                            <input id="radio_11" name="teatro" type="radio"
                                value="0">
                            <label for="radio_11">No</label>
                        </div>
                    </div>

                    <fieldset class="form-group">
                        <label class="form-label">Describa otras actividades que realizan</label>
                        <textarea name="actividades" rows="4" class="form-control"></textarea>
                    </fieldset>

                    <div class="form-group form-group-radios">
                        <label class="form-label" id="signup_v2-teatro">
                            ¿Cuenta con algún tipo de beca?
                        </label>
                        <div class="radio">
                            <input id="radio_12" name="beca" onchange="javascript:showContent()" type="radio"
                                value="1">
                            <label for="radio_12">Si</label>
                        </div>
                        <div class="radio">
                            <input id="radio_13" name="beca" onchange="javascript:showContent()" type="radio"
                                value="0">
                            <label for="radio_13">No</label>
                        </div>
                    </div>

                    <div id="contenido" style="display: none;">
                        <fieldset class="form-group">
                            <label class="form-label">Si su respuesta fue "si", especifique que tipo de beca tiene</label>
                            <textarea name="tipo_beca" rows="4" class="form-control"></textarea>
                        </fieldset>
    
                        <fieldset class="form-group">
                            <label class="form-label">¿En qué es utilizado el recurso de la beca?</label>
                            <textarea name="recurso_beca" rows="4" class="form-control"></textarea>
                        </fieldset>
                    </div>

                    <fieldset class="form-group">
                        <button type="submit" class="btn btn-success">Agregar</button>
                        <a href="{{ route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]) }}" class="btn btn-danger">
                            <span class="ladda-label">Cancelar</span>
                        </a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection