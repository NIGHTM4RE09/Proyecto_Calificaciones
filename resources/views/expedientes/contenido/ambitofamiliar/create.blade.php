@extends('layouts.cuerpo')

@section('contenido')

<header class="section-header">
    <div class="tbl">
        <div class="tbl-row">
            <div class="tbl-cell">
                <h2>Ambito familiar</h2>
            </div>
        </div>
    </div>
</header>
<section class="card">
    <div class="card-block">
        <div class="row">
            <form action="{{route('ambitofamiliar.create' , [$ciclo, $nivel, $grupo, $alumno])}}" method="POST">
                @csrf

                <div class="col-12 table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col">Excelente</th>
                                <th scope="col">Bueno</th>
                                <th scope="col">Normal</th>
                                <th scope="col">Regular</th>
                                <th scope="col">Malo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Con relación a su padre</td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_26" name="padre" type="radio" value="Excelente">
                                        <label for="radio_26"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_27" name="padre" type="radio" value="Bueno">
                                        <label for="radio_27"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_28" name="padre" type="radio" value="Normal">
                                        <label for="radio_28"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_29" name="padre" type="radio" value="Regular">
                                        <label for="radio_29"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_30" name="padre" type="radio" value="Malo">
                                        <label for="radio_30"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Con relación a su madre</td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_31" name="madre" type="radio" value="Excelente">
                                        <label for="radio_31"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_32" name="madre" type="radio" value="Bueno">
                                        <label for="radio_32"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_33" name="madre" type="radio" value="Normal">
                                        <label for="radio_33"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_34" name="madre" type="radio" value="Regular">
                                        <label for="radio_34"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_35" name="madre" type="radio" value="Malo">
                                        <label for="radio_35"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Con relación al cumplimiento de las responsabilidades que tenga asignadas</td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_36" name="responsabilidades" type="radio" value="Excelente">
                                        <label for="radio_36"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_37" name="responsabilidades" type="radio" value="Bueno">
                                        <label for="radio_37"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_38" name="responsabilidades" type="radio" value="Normal">
                                        <label for="radio_38"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_39" name="responsabilidades" type="radio" value="Regular">
                                        <label for="radio_39"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_40" name="responsabilidades" type="radio" value="Malo">
                                        <label for="radio_40"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Con relación a las normas de convivencia establecidas</td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_41" name="normas" type="radio" value="Excelente">
                                        <label for="radio_41"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_42" name="normas" type="radio" value="Bueno">
                                        <label for="radio_42"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_43" name="normas" type="radio" value="Normal">
                                        <label for="radio_43"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_44" name="normas" type="radio" value="Regular">
                                        <label for="radio_44"></label>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="radio">
                                        <input id="radio_45" name="normas" type="radio" value="Malo">
                                        <label for="radio_45"></label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <fieldset class="form-group col-12 py-2">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="{{ route('expediente.index', [$ciclo, $nivel, $grupo, $alumno]) }}" class="btn btn-danger">
                        <span class="ladda-label">Cancelar</span>
                    </a>
                </fieldset>
            </form>
        </div>
    </div>
</section>
@endsection