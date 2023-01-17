@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Agregar asesor al Grupo de  {{$grupo->grupo}}</h2>
                </div>
            </div>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <form action="{{route('asignar.asesor', [$ciclo, $nivel, $grupo])}}" method="POST">

                        @csrf
                        <fieldset class="form-group">
                            <label for="select" class="form-label">Seleccione asesor del grupo</label>
                            <select name="user_id" id="grupo" class="form-control" data-validation="[NOTEMPTY]"
                                data-validation-message="Este campo no debe ir vacio">
                                <option value="">No ha seleccionado ningún asesor</option>
                                @foreach ($user as $item)
                                    <option value="{{$item->id}}">{{$item->name}} | @foreach ($item->getRoleNames() as $rol)
                                        {{$rol}}
                                    @endforeach</option>
                                @endforeach
                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <button type="submit" class="btn btn-success">Asignar Asesor</button>
                            <a href="{{ route('alumnos.index', [$ciclo, $nivel, $grupo]) }}" class="btn btn-danger">
                                <span class="ladda-label">Cancelar</span>
                            </a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection