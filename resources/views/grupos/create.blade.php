@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Nuevo grupo para {{$nivel->nivel}}</h2>
                </div>
            </div>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6">
                    <form action="{{route('grupos.store', [$ciclo, $nivel])}}" method="POST">

                        @csrf

                        <fieldset class="form-group">
                            <label for="select" class="form-label">Seleccione grado escolar</label>
                            <select name="grupo" id="grupo" class="form-control" data-validation="[NOTEMPTY]"
                                data-validation-message="Este campo no debe ir vacio">
                                <option value="">No ha seleccionado ningún grado</option>
                                <option value="1° Grado">1° Grado</option>
                                <option value="2° Grado">2° Grado</option>
                                <option value="3° Grado">3° Grado</option>
                                <option value="4° Grado">4° Grado</option>
                                <option value="5° Grado">5° Grado</option>
                                <option value="6° Grado">6° Grado</option>
                                <option value="1° Semestre">1° Semestre</option>
                                <option value="2° Semestre">2° Semestre</option>
                                <option value="3° Semestre">3° Semestre</option>
                                <option value="4° Semestre">4° Semestre</option>
                                <option value="5° Semestre">5° Semestre</option>
                                <option value="6° Semestre">6° Semestre</option>
                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <a href="{{ route('grupos.index', [$ciclo, $nivel]) }}" class="btn btn-danger">
                                <span class="ladda-label">Cancelar</span>
                            </a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection