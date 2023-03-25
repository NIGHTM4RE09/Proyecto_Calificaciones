@extends('layouts.cuerpo')

@section('contenido')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h2>Calificaciones del alumno: {{ $alumno->nombre }}</h2>
                </div>
            </div>
        </div>
    </header>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <a href="{{ route('alumnos.index', [$ciclo, $nivel, $grupo]) }}" class="btn btn-danger">
                    <span class="ladda-label">Regresar al grupo completo</span>
                </a>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
            <section class="card">
                <div class="card-block">
                    <form action="{{ route('mes.store', [$ciclo, $nivel, $grupo, $alumno]) }}" method="post">
                        @csrf

                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="">Seleccione mes a crear</label>
                                <select class="form-control" name="mes" id="">
                                    <option selected>No ha seleccionado ningún mes</option>
                                    <option value="Enero">Enero</option>
                                    <option value="Febrero">Febrero</option>
                                    <option value="Marzo">Marzo</option>
                                    <option value="Abril">Abril</option>
                                    <option value="Mayo">Mayo</option>
                                    <option value="Junio">Junio</option>
                                    <option value="Julio">Julio</option>
                                    <option value="Agosto">Agosto</option>
                                    <option value="Septiembre">Septiembre</option>
                                    <option value="Octubre">Octubre</option>
                                    <option value="Noviembre">Noviembre</option>
                                    <option value="Diciembre">Diciembre</option>
                                </select>
                            </div>

                            <div class="col-12 text-center">
                                <button class="btn btn-success" type="submit">Crear</button>
                            </div>

                        </div>

                    </form>
                </div>
            </section>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
            <section class="card">
                <div class="card-block">
                    <form action="{{ route('calificaciones.store', [$ciclo, $nivel, $grupo, $alumno]) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-7 col-lg-7 mb-3">
                                <label class="form-label" for="">Seleccione materia</label>
                                <select class="form-control" name="materia" id="">
                                    <option selected>No ha seleccionado ninguna materia</option>
                                    @foreach ($materia as $item)
                                        <option value="{{ $item->id }}">{{ $item->materia }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-7 col-lg-7 mb-3">
                                <label class="form-label" for="">Seleccione mes</label>
                                <select class="form-control" name="mes" id="">
                                    <option selected>No ha seleccionado ningún mes</option>
                                    @foreach ($meses as $item)
                                        <option value="{{ $item->id }}">{{ $item->mes }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-5 col-lg-5 mb-3">
                                <label for="" class="form-label">Calificación</label>
                                <input type="number" class="form-control" name="note" step="0.1" min="0"
                                    max="10">
                            </div>
                            <div class="col-12 text-center">
                                <button class="btn btn-success" type="submit">Asignar calificación</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <section class="card" id="tabla">
        <div class="card-block row">
            <form action="{{route('calificaciones.update', [$ciclo, $nivel, $grupo, $alumno, $notas])}}" method="post">
                @csrf
                @method('put')
                <div class="table-responsive col-12">
                    <table class="table table-bordered border-3" id="tabla" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">Materia/Mes</th>
                                @foreach ($meses as $mes)
                                    <th scope="col">{{ $mes->mes }}</th>
                                @endforeach
                                <th scope="col">Promedio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promedio as $item)
                                <tr>
                                    <th>{{ $item['materia']->materia }}</th>
                                    @foreach ($item['note'] as $nota)
                                        <td class="@if ($nota->note >= 9 && $nota->note <= 10) bg-success
                                            @elseif ($nota->note >= 7 && $nota->note < 9)
                                            bg-warning
                                            @else
                                            bg-danger
                                        @endif"> <input type="number" class="form-control-plaintext form-control" name="note[{{ $nota->id }}]" step="0.1" min="0"
                                        max="10" value="{{ $nota->note }}"></td>
                                    @endforeach
                                    @if (is_null($item['avg']))
                                        
                                    @else
                                    <th class="@if (number_format($item['avg'], 2) >= 9 && number_format($item['avg'], 2) <= 10) bg-success
                                        @elseif (number_format($item['avg'], 2) >= 7 && number_format($item['avg'], 2) < 9)
                                        bg-warning
                                        @else
                                        bg-danger
                                    @endif">{{ number_format($item['avg'], 2) }}</th>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12 py-3 text-right">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </section>
@endsection
