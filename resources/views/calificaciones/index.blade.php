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
                <a href="{{ route('alumnos.index', [$ciclo, $nivel, $grupo]) }}" class="btn btn-inline btn-danger ladd-button">
                    <span class="ladda-label">Regresar al grupo completo</span>
                </a>
            </div>
        </div>
    </div>

    <section class="card" id="tabla">
        <div class="card-block">
            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Mes</th>
                        <th>Español</th>
                        <th>Matematicas</th>
                        <th>Historia</th>
                        <th>Promedio General</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Mes</th>
                        <th>Español</th>
                        <th>Matematicas</th>
                        <th>Historia</th>
                        <th>Promedio General</th>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <th><input type="text" name="mes" id="" class="form-control"></th>
                        <td><input type="number" name="calificacion" id="" class="form-control"></td>
                        <td><input type="number" name="calificacion" id="" class="form-control"></td>
                        <td><input type="number" name="calificacion" id="" class="form-control"></td>
                        <td><input type="text" class="form-control" disabled value="8.5"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
    {{-- <script>
        const select = document.getElementById('select');

        function ocultarTabla() {
            document.getElementById(`tabla`).style.display = 'none';
        }

        select.addEventListener('change', () => {
            ocultarTabla();
            if (select.value > 0) {
                //document.getElementById(`subrubros-${rubros.value}`).style.display = 'block';
                document.getElementById(`tabla`).style.display = 'block';
            }
        });

        ocultarTabla();
    </script> --}}
@endsection