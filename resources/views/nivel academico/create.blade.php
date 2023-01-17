@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Nuevo nivel académico</h2>
                </div>
            </div>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6">
                    <form action="{{route('nivel-academico.store', $ciclo)}}" method="post">
                        @csrf
                        
                        <fieldset class="form-group">
                            <label class="form-label">Seleccione nivel académico</label>
                            <select name="nivel" id="select" class="form-control" data-validation="[NOTEMPTY]"
                                data-validation-message="Este campo no debe ir vacio">
                                <option value="">No ha seleccionado ningún nivel académico</option>
                                <option value="Preescolar">Preescolar</option>
                                <option value="Primaria">Primaria</option>
                                <option value="Secundaria">Secundaria</option>
                                <option value="Preparatoria">Preparatoria</option>
                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <a href="{{ route('nivel-academico.index', $ciclo) }}" class="btn btn-danger">
                                <span class="ladda-label">Cancelar</span>
                            </a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection