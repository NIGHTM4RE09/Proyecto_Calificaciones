@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Nuevo ciclo escolar</h2>
                </div>
            </div>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <form action="{{route('ciclo-escolar.store')}}" method="POST">
                        @csrf
                        
                        <fieldset class="form-group">
                            <label class="form-label">Escriba el ciclo escolar</label>
                            <input name="ciclo_escolar" type="text" class="form-control" data-validation="[NOTEMPTY]"
                            data-validation-message="Debes agregar información" placeholder="Ejemplo: 2022-2023" required>
                        </fieldset>

                        <fieldset class="form-group">
                            <button type="submit" class="btn btn-success">Guardar</button>
                            <a href="{{ route('ciclo-escolar.index') }}" class="btn btn-danger">
                                <span class="ladda-label">Cancelar</span>
                            </a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection