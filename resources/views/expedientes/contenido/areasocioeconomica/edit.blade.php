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
            <div class="col-12">
                <p class="card-text">Los datos recabados sólo se utilizarán estadísticamente, por ello lo invitamos a contestar
                    con la mayor veracidad posible.</p>
            </div>

            <form action="{{route('area.update', [$ciclo, $nivel, $grupo, $alumno, $areas])}}" method="POST">
                @csrf
                @method('put')
                <div class="form-group form-group-radios col-12 col-md-3 col-lg-3 py-2">
                    <label class="form-label" id="signup_v2-casa">
                        La casa de los padres es:
                    </label>
                    @if ($areas->casa_padres == "Rentada")
                        <div class="radio">
                            <input id="radio_1" name="casa_padres" type="radio"
                                value="Rentada" checked>
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
                    @elseif ($areas->casa_padres == "Prestada")
                        <div class="radio">
                            <input id="radio_1" name="casa_padres" type="radio"
                                value="Rentada">
                            <label for="radio_1">Rentada</label>
                        </div>
                        <div class="radio">
                            <input id="radio_2" name="casa_padres" type="radio"
                                value="Prestada" checked>
                            <label for="radio_2">Prestada</label>
                        </div>
                        <div class="radio">
                            <input id="radio_3" name="casa_padres" type="radio"
                                value="Propia">
                            <label for="radio_3">Propia</label>
                        </div>
                    @else
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
                                value="Propia" checked>
                            <label for="radio_3">Propia</label>
                        </div>
                    @endif
                </div>

                <div class="col-12 col-md-3 col-lg-3 py-2">
                    <fieldset class="form-group">
                        <label class="form-label">¿Con cuantas habitaciones cuenta la casa?</label>
                        <input name="habitaciones" type="number" class="form-control" data-validation="[NOTEMPTY]"
                            data-validation-message="Debe agregar una cantidad" value="{{$areas->habitaciones}}">
                    </fieldset>
                </div>

                <div class="form-group form-group-radios col-12 col-md-6 col-lg-6 py-2">
                    <label class="form-label" id="signup_v2-dormitorios">
                        ¿Cuenta con dormitorio propio?
                    </label>
                    @switch($areas->dormitorio)
                        @case(1)
                        <div class="radio">
                            <input id="radio_4" name="dormitorio" type="radio"
                                value="1" checked>
                            <label for="radio_4">Si</label>
                        </div>
                        <div class="radio">
                            <input id="radio_5" name="dormitorio" type="radio"
                                value="0">
                            <label for="radio_5">No</label>
                        </div>
                            @break
                        @case(0)
                        <div class="radio">
                            <input id="radio_4" name="dormitorio" type="radio"
                                value="1">
                            <label for="radio_4">Si</label>
                        </div>
                        <div class="radio">
                            <input id="radio_5" name="dormitorio" type="radio"
                                value="0" checked>
                            <label for="radio_5">No</label>
                        </div>
                            @break
                        @default
                            
                    @endswitch
                </div>

                <div class="col-12 col-md-12 col-lg-12">
                    <fieldset class="form-group">
                        <label class="form-label">¿Con qué servicios cuenta la casa? (Luz, internet, drenaje, agua potable, pozo, losa, etc.)</label>
                        <textarea name="servicios" rows="4" class="form-control">{{$areas->servicios}}</textarea>
                    </fieldset>
                </div>

                <div class="col-12 col-md-3 col-lg-3">
                    <fieldset class="form-group">
                        <label class="form-label">La suma de los ingresos mensuales de la familia es (un aproximado):</label>
                        <div class="input-group">
                            <div class="input-group-addon">$</div>
                            <input type="text" name="suma_ingresos" class="form-control" id="exampleInputAmount" placeholder="Monto total" value="{{$areas->suma_ingresos}}">
                            <div class="input-group-addon">.00</div>
                        </div>
                    </fieldset>
                </div>

                <div class="col-12 col-md-4 col-lg-4">
                    <fieldset class="form-group">
                        <label class="form-label">Los gastos escolares como pasajes, alimentos y materiales suman un promedio quincenal de:</label>
                        <div class="input-group">
                            <div class="input-group-addon">$</div>
                            <input type="text" name="gastos_escolares" class="form-control" id="exampleInputAmount" placeholder="Monto total" value="{{$areas->gastos_escolares}}">
                            <div class="input-group-addon">.00</div>
                        </div>
                    </fieldset>
                </div>

                <div class="form-group form-group-radios col-12 col-md-3 col-lg-3">
                    <label class="form-label" id="signup_v2-vaciones">
                        ¿Su familia sale a vacacionar?
                    </label>
                    @switch($areas->vacaciones)
                        @case(1)
                        <div class="radio">
                            <input id="radio_6" name="vacaciones" type="radio"
                                value="1" checked>
                            <label for="radio_6">Si</label>
                        </div>
                        <div class="radio">
                            <input id="radio_7" name="vacaciones" type="radio"
                                value="0">
                            <label for="radio_7">No</label>
                        </div>
                            @break
                        @case(0)
                        <div class="radio">
                            <input id="radio_6" name="vacaciones" type="radio"
                                value="1">
                            <label for="radio_6">Si</label>
                        </div>
                        <div class="radio">
                            <input id="radio_7" name="vacaciones" type="radio"
                                value="0" checked>
                            <label for="radio_7">No</label>
                        </div>
                            @break
                        @default
                    @endswitch
                </div>

                <div class="form-group form-group-radios col-12 col-md-2 col-lg-2">
                    <label class="form-label" id="signup_v2-cine">
                        ¿Van al cine?
                    </label>
                    @switch($areas->cine)
                        @case(1)
                        <div class="radio">
                            <input id="radio_8" name="cine" type="radio"
                                value="1" checked>
                            <label for="radio_8">Si</label>
                        </div>
                        <div class="radio">
                            <input id="radio_9" name="cine" type="radio"
                                value="0">
                            <label for="radio_9">No</label>
                        </div>
                            @break
                        @case(0)
                        <div class="radio">
                            <input id="radio_8" name="cine" type="radio"
                                value="1">
                            <label for="radio_8">Si</label>
                        </div>
                        <div class="radio">
                            <input id="radio_9" name="cine" type="radio"
                                value="0" checked>
                            <label for="radio_9">No</label>
                        </div>
                            @break
                        @default
                    @endswitch
                </div>

                <div class="form-group form-group-radios col-12 col-md-2 col-lg-2">
                    <label class="form-label" id="signup_v2-teatro">
                        ¿Van al teatro?
                    </label>
                    @switch($areas->teatro)
                        @case(1)
                        <div class="radio">
                            <input id="radio_10" name="teatro" type="radio"
                                value="1" checked>
                            <label for="radio_10">Si</label>
                        </div>
                        <div class="radio">
                            <input id="radio_11" name="teatro" type="radio"
                                value="0">
                            <label for="radio_11">No</label>
                        </div>
                            @break
                        @case(0)
                        <div class="radio">
                            <input id="radio_10" name="teatro" type="radio"
                                value="1">
                            <label for="radio_10">Si</label>
                        </div>
                        <div class="radio">
                            <input id="radio_11" name="teatro" type="radio"
                                value="0" checked>
                            <label for="radio_11">No</label>
                        </div>
                            @break
                        @default
                            
                    @endswitch
                </div>

                <div class="col-12 col-md-6 col-lg-6">
                    <fieldset class="form-group">
                        <label class="form-label">Describa otras actividades que realizan</label>
                        <textarea name="actividades" rows="4" class="form-control">{{$areas->actividades}}</textarea>
                    </fieldset>
                </div>

                <div class="form-group form-group-radios col-12 col-md-3 col-lg-3">
                    <label class="form-label" id="signup_v2-teatro">
                        ¿Cuenta con algún tipo de beca?
                    </label>
                    @switch($areas->beca)
                        @case(1)
                        <div class="radio">
                            <input id="radio_12" name="beca" onchange="javascript:showContent()" type="radio"
                                value="1" checked>
                            <label for="radio_12">Si</label>
                        </div>
                        <div class="radio">
                            <input id="radio_13" name="beca" onchange="javascript:showContent()" type="radio"
                                value="0">
                            <label for="radio_13">No</label>
                        </div>
                            @break
                        @case(0)
                        <div class="radio">
                            <input id="radio_12" name="beca" onchange="javascript:showContent()" type="radio"
                                value="1">
                            <label for="radio_12">Si</label>
                        </div>
                        <div class="radio">
                            <input id="radio_13" name="beca" onchange="javascript:showContent()" type="radio"
                                value="0" checked>
                            <label for="radio_13">No</label>
                        </div>
                            @break
                        @default
                            
                    @endswitch
                </div>

                <div id="contenido" style="display: none;">
                    <div class="col-12 col-md-6 col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label">Si su respuesta fue "si", especifique que tipo de beca tiene</label>
                            <textarea name="tipo_beca" rows="4" class="form-control">{{$areas->tipo_beca}}</textarea>
                        </fieldset>
                    </div>

                    <div class="col-12 col-md-6 col-lg-6">
                        <fieldset class="form-group">
                            <label class="form-label">¿En qué es utilizado el recurso de la beca?</label>
                            <textarea name="recurso_beca" rows="4" class="form-control">{{$areas->recurso_beca}}</textarea>
                        </fieldset>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-12">
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