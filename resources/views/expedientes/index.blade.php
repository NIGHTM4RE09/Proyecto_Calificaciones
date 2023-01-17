@extends('layouts.cuerpo')

@section('contenido')
    <a href="{{ route('alumnos.index', [$ciclo, $nivel, $grupo]) }}" class="btn btn-inline btn-success ladda-button"
        data-size="s">
        <span class="ladda-label">
            Regresar a lista de alumnos
        </span>
    </a>
    <section class="card card-orange">
        <header class="card-header card-header-xxl">
            Expediente del alumno(a): {{ $alumno->nombre }}
        </header>
        <div class="card-block">
            <div class="row">
                <h2 class="text-center"><strong>Datos del Tutor</strong></h2>

                @foreach ($tutor as $item)
                    <dt class="col-sm-2">Nombre del tutor:</dt>
                    <dd class="col-sm-9">{{ $item->nombre }}</dd>

                    <dt class="col-sm-2">Domicilio:</dt>
                    <dd class="col-sm-9">{{ $item->domicilio }}</dd>

                    <dt class="col-sm-2">Profesión:</dt>
                    <dd class="col-sm-9">{{ $item->profesion }}</dd>

                    <dt class="col-sm-2">Número de contacto:</dt>
                    <dd class="col-sm-9">
                        <p class="card-text"><span id="phone-with-code-area-mask-input">{{ $item->telefono }}</span>
                        </p>
                    </dd>
                @endforeach

                <div class="col-12 text-center">
                    @foreach ($tutor as $item)
                        <fieldset class="form-group">
                            <a href="{{ route('tutor.edit', [$ciclo, $nivel, $grupo, $alumno, $item]) }}"
                                class="btn btn-info btn-inline" data-size="s">
                                <span class="ladda-label">
                                    <i class="fa fa-edit"></i>
                                    Editar tutor
                                </span>
                            </a>
                            <form action="{{-- {{ route('contactos.destroy', ) }} --}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-inline" data-size="s">
                                    <span class="ladda-label">
                                        <i class="fa fa-trash"></i>
                                        Eliminar
                                    </span>
                                </button>
                            </form>
                        </fieldset>
                    @endforeach
                    @if ($tutor->isEmpty())
                        <a href="{{ route('tutor.create', [$ciclo, $nivel, $grupo, $alumno]) }}"
                            class="btn btn-inline btn-success ladda-button">
                            <span class="ladda-label">Agregar tutor</span>
                        </a>
                    @else
                    @endif
                </div>

                <h2 class="text-center"><strong>Datos familiares</strong></h2>

                <div class=" col-12 table-responsive">
                    <table class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">Parentesco</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Vive</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Domicilio</th>
                                <th scope="col">Estudios</th>
                                <th scope="col">Profesión</th>
                                <th scope="col">Horario laboral</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($alumno->padres as $item)
                                <tr>
                                    <td>{{ $item->parentesco }}</td>
                                    <td>{{ $item->nombre }}</td>
                                    <td>@if ($item->vive == 1)Si @else No @endif</p></td>
                                    <td>{{ $item->edad }}</td>
                                    <td>{{ $item->domicilio }}</td>
                                    <td>{{ $item->estudios }}</td>
                                    <td>{{ $item->profesion }}</td>
                                    <td>{{ $item->horario_laboral }}</td>
                                    <td>
                                        <a title="editar"
                                            href="{{ route('padres.edit', [$ciclo, $nivel, $grupo, $alumno, $item]) }}"
                                            class="btn btn-inline btn-info btn-sm ladda-button" data-size="s">
                                            <span class="ladda-label">
                                                <i class="fa fa-edit"></i>
                                            </span>
                                        </a>
                                        <form
                                            action="{{ route('padres.destroy', [$ciclo, $nivel, $grupo, $alumno, $item]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button title="eliminar" type="submit"
                                                class="btn btn-inline btn-danger btn-sm ladda-button" data-size="s">
                                                <span class="ladda-label">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-12 text-center py-2">
                    <div class="form-group">
                        <a href="{{ route('padres.create', [$ciclo, $nivel, $grupo, $alumno]) }}"
                            class="btn btn-inline btn-success ladda-button">
                            <span class="ladda-label">Agregar padre o madre</span>
                        </a>
                    </div>
                </div>

                <h2 class="text-center"><strong>Hijos</strong></h2>

                <div class="col-12 table-responsive">
                    <table class="table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Estudios</th>
                                <th scope="col">¿Vive en casa?</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alumno->hijos as $item)
                                <tr>
                                    <td>{{ $item->nombre }}</td>
                                    <td>{{ $item->edad }}</td>
                                    <td>{{ $item->estudios }}</td>
                                    <td>
                                        @if ($item->vive == 1)
                                            Si
                                        @else
                                            No
                                        @endif
                                        </p>
                                    </td>
                                    <td>
                                        <a title="editar"
                                            href="{{ route('hijos.edit', [$ciclo, $nivel, $grupo, $alumno, $item]) }}"
                                            class="btn btn-inline btn-info btn-sm ladda-button" data-size="s">
                                            <span class="ladda-label">
                                                <i class="fa fa-edit"></i>
                                            </span>
                                        </a>
                                        <form action="{{ route('hijos.destroy', [$ciclo, $nivel, $grupo, $alumno, $item]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button title="eliminar" type="submit"
                                                class="btn btn-inline btn-danger btn-sm ladda-button" data-size="s">
                                                <span class="ladda-label">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-12 text-center py-2">
                    <div class="form-group">
                        <a href="{{ route('hijos.create', [$ciclo, $nivel, $grupo, $alumno]) }}"
                            class="btn btn-inline btn-success ladda-button">
                            <span class="ladda-label">Agregar hijos</span>
                        </a>
                    </div>
                </div>

                <h2 class="text-center">FAMILIARES QUE VIVAN EN CASA</h2>

                <div class="col-12 table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Estudios</th>
                                <th scope="col">Parentesco</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alumno->families as $item)
                                <tr>
                                    <td>{{ $item->nombre }}</td>
                                    <td>{{ $item->edad }}</td>
                                    <td>{{ $item->estudios }}</td>
                                    <td>{{ $item->parentesco }}</td>
                                    <td>
                                        <a title="editar"
                                            href="{{ route('familiares.edit', [$ciclo, $nivel, $grupo, $alumno, $item]) }}"
                                            class="btn btn-inline btn-info btn-sm ladda-button" data-size="s">
                                            <span class="ladda-label">
                                                <i class="fa fa-edit"></i>
                                            </span>
                                        </a>
                                        <form
                                            action="{{ route('familiares.destroy', [$ciclo, $nivel, $grupo, $alumno, $item]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button title="eliminar" type="submit"
                                                class="btn btn-inline btn-danger btn-sm ladda-button" data-size="s">
                                                <span class="ladda-label">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-12 text-center py-2">
                    <div class="form-group">
                        <a href="{{ route('familiares.create', [$ciclo, $nivel, $grupo, $alumno]) }}"
                            class="btn btn-inline btn-success ladda-button">
                            <span class="ladda-label">Agregar familiares</span>
                        </a>
                    </div>
                </div>

                <h2 class="text-center">Datos del alumno</h2>

                <div class="col-12 table-responsive">
                    <table class="table">
                        <tbody>
                            @foreach ($datos as $dato)
                                <tr>
                                    <th scope="col">Fecha de nacimiento</th>
                                    <td>{{ $dato->fecha_nacimiento }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">CURP</th>
                                    <td>{{ $dato->curp }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Tipo de sangre</th>
                                    <td>{{ $dato->tipo_sangre }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Situación familiar</th>
                                    <td>{{ $dato->situacion_familiar }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Relaciones familiares</th>
                                    <td>{{ $dato->relacion_familiar }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Personalidad del alumno</th>
                                    <td>{{ $dato->personalidad }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Descripción breve de como es el alumno</th>
                                    <td>{{ $dato->descripcion }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Enfermedades o padecimientos</th>
                                    <td>{{ $dato->enfermedades }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Alergias</th>
                                    <td>{{ $dato->alergias }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Deficiencias o dificultades</th>
                                    <td>{{ $dato->deficiencias }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">¿Suele presentar faltas de asistencia al centro por estas situaciones?</th>
                                    <td>
                                        @if ($dato->faltas == 1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-12 text-center py-2">
                    <div class="form-group">
                        @foreach ($datos as $item)
                            <a href="{{ route('datos.edit', [$ciclo, $nivel, $grupo, $alumno, $item]) }}"
                                class="btn btn-inline btn-info ladda-button" data-size="s">
                                <span class="ladda-label">
                                    <i class="fa fa-edit"></i>
                                    Editar datos del alumno
                                </span>
                            </a>
                            <form action="{{ route('datos.destroy', [$ciclo, $nivel, $grupo, $alumno, $item]) }}"
                                method="POST">
                                @csrf
                                @method('delete')
                                <button title="eliminar" type="submit" class="btn btn-inline btn-danger ladda-button"
                                    data-size="s">
                                    <span class="ladda-label">
                                        <i class="fa fa-trash"></i>
                                        Eliminar
                                    </span>
                                </button>
                            </form>
                        @endforeach
                        @if ($datos->isEmpty())
                            <a href="{{ route('datos.create', [$ciclo, $nivel, $grupo, $alumno]) }}"
                                class="btn btn-inline btn-success ladda-button">
                                <span class="ladda-label">Agregar datos del alumno</span>
                            </a>
                        @endif
                    </div>
                </div>

                <h2 class="text-center">Hábitos de estudio</h2>

                <div class="col-12 table-responsive">
                    <table class="table">
                        <tbody>
                            @foreach ($habito as $item)
                                <tr>
                                    <th scope="col">¿Suele hablar con ustedes de lo que le interesa o preocupa?</th>
                                    <td>
                                        @if ($item->intereses == 1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">¿Tiene un horario fijo para estudiar?</th>
                                    <td>
                                        @if ($item->horario == 1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                                @if ($item->horario == 1)
                                    <tr>
                                        <th scope="col">Si tiene horario fijo, ¿lo cumple?</th>
                                        <td>
                                            @if ($item->horario_cumplido == 1)
                                                Si
                                            @else
                                                No
                                            @endif
                                        </td>
                                        < </tr>
                                @endif
                                <tr>
                                    <th scope="col">¿Cuántas horas semanales dedica al estudio?</th>
                                    <td>{{ $item->horario_estudio }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">¿Supervisa su trabajo (tareas)?</th>
                                    <td>
                                        @if ($item->tareas == 1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="col-12 text-center py-2">
                    <div class="form-group">
                        @foreach ($habito as $item)
                            <a href="{{ route('habito.edit', [$ciclo, $nivel, $grupo, $alumno, $item]) }}"
                                class="btn btn-inline btn-info ladda-button" data-size="s">
                                <span class="ladda-label">
                                    <i class="fa fa-edit"></i>
                                    Editar habitos de estudio
                                </span>
                            </a>
                            <form action="{{ route('habito.destroy', [$ciclo, $nivel, $grupo, $alumno, $item]) }}"
                                method="POST">
                                @csrf
                                @method('delete')
                                <button title="eliminar" type="submit" class="btn btn-inline btn-danger ladda-button"
                                    data-size="s">
                                    <span class="ladda-label">
                                        <i class="fa fa-trash"></i>
                                        Eliminar
                                    </span>
                                </button>
                            </form>
                        @endforeach
                        @if ($habito->isEmpty())
                            <a href="{{ route('habito.create', [$ciclo, $nivel, $grupo, $alumno]) }}"
                                class="btn btn-inline btn-success ladda-button">
                                <span class="ladda-label">Agregar hábitos de estudio</span>
                            </a>
                        @endif
                    </div>
                </div>

                <h2 class="text-center">Ocio y tiempo libre</h2>

                @foreach ($hobbies as $item)
                    <dt class="col-sm-3">¿Qué hace su hijo durante las horas libres?</dt>
                    <dd class="col-sm-6">{{ $item->horas_libres }}</dd>

                    <dt class="col-sm-3">¿Cómo ocupa el tiempo libre en familia? (televisión, afición común, excursiones, juegos, conversar, etc.)</dt>
                    <dd class="col-sm-6">{{ $item->tiempo_libre }}</dd>
                @endforeach

                <div class="col-md-12 text-center py-2">
                    <div class="form-group">
                        @foreach ($hobbies as $item)
                            <a href="{{ route('hobbies.edit', [$ciclo, $nivel, $grupo, $alumno, $item]) }}"
                                class="btn btn-inline btn-info ladda-button" data-size="s">
                                <span class="ladda-label">
                                    <i class="fa fa-edit"></i>
                                    Editar ocios y tiempo libre
                                </span>
                            </a>
                            <form action="{{ route('hobbies.destroy', [$ciclo, $nivel, $grupo, $alumno, $item]) }}"
                                method="POST">
                                @csrf
                                @method('delete')
                                <button title="eliminar" type="submit" class="btn btn-inline btn-danger ladda-button"
                                    data-size="s">
                                    <span class="ladda-label">
                                        <i class="fa fa-trash"></i>
                                        Eliminar
                                    </span>
                                </button>
                            </form>
                        @endforeach
                        @if ($hobbies->isEmpty())
                            <a href="{{ route('hobbies.create', [$ciclo, $nivel, $grupo, $alumno]) }}"
                                class="btn btn-inline btn-success ladda-button">
                                <span class="ladda-label">Agregar ocios y tiempo libre</span>
                            </a>
                        @endif
                    </div>
                </div>

                <h1 class="text-center">Valoración de la conducta de su hijo/a</h1>

                <h2 class="text-center">Ámbito escolar</h2>

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
                            @foreach ($ambitoescolar as $item)
                                <tr>
                                    <td>Con relación a sus compañeros</td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->compañeros == 'Excelente')
                                                <input id="radio_1" name="compañeros" type="radio" checked>
                                            @else
                                                <input id="radio_1" name="compañeros" type="radio" disabled>
                                            @endif
                                            <label for="radio_1"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->compañeros == 'Bueno')
                                                <input id="radio_2" name="compañeros" type="radio" checked>
                                            @else
                                                <input id="radio_2" name="compañeros" type="radio" disabled>
                                            @endif
                                            <label for="radio_2"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->compañeros == 'Normal')
                                                <input id="radio_3" name="compañeros" type="radio" checked>
                                            @else
                                                <input id="radio_3" name="compañeros" type="radio" disabled>
                                            @endif
                                            <label for="radio_3"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->compañeros == 'Regular')
                                                <input id="radio_4" name="compañeros" type="radio" checked>
                                            @else
                                                <input id="radio_4" name="compañeros" type="radio" disabled>
                                            @endif
                                            <label for="radio_4"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->compañeros == 'Malo')
                                                <input id="radio_5" name="compañeros" type="radio" checked>
                                            @else
                                                <input id="radio_5" name="compañeros" type="radio" disabled>
                                            @endif
                                            <label for="radio_5"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Con relación al profesorado</td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->profesorado == 'Excelente')
                                                <input id="radio_6" name="profesorado" type="radio" checked>
                                            @else
                                                <input id="radio_6" name="profesorado" type="radio" disabled>
                                            @endif
                                            <label for="radio_6"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->profesorado == 'Bueno')
                                                <input id="radio_7" name="profesorado" type="radio" checked>
                                            @else
                                                <input id="radio_7" name="profesorado" type="radio" disabled>
                                            @endif
                                            <label for="radio_7"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->profesorado == 'Normal')
                                                <input id="radio_8" name="profesorado" type="radio" checked>
                                            @else
                                                <input id="radio_8" name="profesorado" type="radio" disabled>
                                            @endif
                                            <label for="radio_8"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->profesorado == 'Regular')
                                                <input id="radio_9" name="profesorado" type="radio" checked>
                                            @else
                                                <input id="radio_9" name="profesorado" type="radio" disabled>
                                            @endif
                                            <label for="radio_9"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->profesorado == 'Malo')
                                                <input id="radio_10" name="profesorado" type="radio" checked>
                                            @else
                                                <input id="radio_10" name="profesorado" type="radio" disabled>
                                            @endif
                                            <label for="radio_10"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Con relación a las instalaciones y materiales del aula</td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->aula == 'Excelente')
                                                <input id="radio_11" name="aula" type="radio" checked>
                                            @else
                                                <input id="radio_11" name="aula" type="radio" disabled>
                                            @endif
                                            <label for="radio_11"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->aula == 'Bueno')
                                                <input id="radio_12" name="aula" type="radio" checked>
                                            @else
                                                <input id="radio_12" name="aula" type="radio" disabled>
                                            @endif
                                            <label for="radio_12"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->aula == 'Normal')
                                                <input id="radio_13" name="aula" type="radio" checked>
                                            @else
                                                <input id="radio_13" name="aula" type="radio" disabled>
                                            @endif
                                            <label for="radio_13"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->aula == 'Regular')
                                                <input id="radio_14" name="aula" type="radio" checked>
                                            @else
                                                <input id="radio_14" name="aula" type="radio" disabled>
                                            @endif
                                            <label for="radio_14"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->aula == 'Malo')
                                                <input id="radio_15" name="aula" type="radio" checked>
                                            @else
                                                <input id="radio_15" name="aula" type="radio" disabled>
                                            @endif
                                            <label for="radio_15"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Con relación a las normas de convivencia de la clase</td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->convivenvia == 'Excelente')
                                                <input id="radio_16" name="convivencia" type="radio" checked>
                                            @else
                                                <input id="radio_16" name="convivencia" type="radio" disabled>
                                            @endif
                                            <label for="radio_16"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->convivencia == 'Bueno')
                                                <input id="radio_17" name="convivencia" type="radio" checked>
                                            @else
                                                <input id="radio_17" name="convivencia" type="radio" disabled>
                                            @endif
                                            <label for="radio_17"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->convivencia == 'Normal')
                                                <input id="radio_18" name="convivencia" type="radio" checked>
                                            @else
                                                <input id="radio_18" name="convivencia" type="radio" disabled>
                                            @endif
                                            <label for="radio_18"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->convivencia == 'Regular')
                                                <input id="radio_19" name="convivencia" type="radio" checked>
                                            @else
                                                <input id="radio_19" name="convivencia" type="radio" disabled>
                                            @endif
                                            <label for="radio_19"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->convivencia == 'Malo')
                                                <input id="radio_20" name="convivencia" type="radio" checked>
                                            @else
                                                <input id="radio_20" name="convivencia" type="radio" disabled>
                                            @endif
                                            <label for="radio_20"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Con relación a la realización de las tareas escolares</td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->tareas == 'Excelente')
                                                <input id="radio_21" name="tareas" type="radio" checked>
                                            @else
                                                <input id="radio_21" name="tareas" type="radio" disabled>
                                            @endif
                                            <label for="radio_21"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->tareas == 'Bueno')
                                                <input id="radio_22" name="tareas" type="radio" checked>
                                            @else
                                                <input id="radio_22" name="tareas" type="radio" disabled>
                                            @endif
                                            <label for="radio_22"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->tareas == 'Normal')
                                                <input id="radio_23" name="tareas" type="radio" checked>
                                            @else
                                                <input id="radio_23" name="tareas" type="radio" disabled>
                                            @endif
                                            <label for="radio_23"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->tareas == 'Regular')
                                                <input id="radio_24" name="tareas" type="radio" checked>
                                            @else
                                                <input id="radio_24" name="tareas" type="radio" disabled>
                                            @endif
                                            <label for="radio_24"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->tareas == 'Malo')
                                                <input id="radio_25" name="tareas" type="radio" checked>
                                            @else
                                                <input id="radio_25" name="tareas" type="radio" disabled>
                                            @endif
                                            <label for="radio_25"></label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-12 text-center py-2">
                    <div class="form-group">
                        @foreach ($ambitoescolar as $item)
                            <a href="{{ route('ambitoescolar.edit', [$ciclo, $nivel, $grupo, $alumno, $item]) }}"
                                class="btn btn-inline btn-info ladda-button" data-size="s">
                                <span class="ladda-label">
                                    <i class="fa fa-edit"></i>
                                    Editar ámbito escolar
                                </span>
                            </a>
                            <form action="{{ route('ambitoescolar.destroy', [$ciclo, $nivel, $grupo, $alumno, $item]) }}"
                                method="POST">
                                @csrf
                                @method('delete')
                                <button title="eliminar" type="submit" class="btn btn-inline btn-danger ladda-button"
                                    data-size="s">
                                    <span class="ladda-label">
                                        <i class="fa fa-trash"></i>
                                        Eliminar
                                    </span>
                                </button>
                            </form>
                        @endforeach
                        @if ($ambitoescolar->isEmpty())
                            <a href="{{ route('ambitoescolar.create', [$ciclo, $nivel, $grupo, $alumno]) }}"
                                class="btn btn-inline btn-success ladda-button">
                                <span class="ladda-label">Calificar ámbito escolar</span>
                            </a>
                        @endif
                    </div>
                </div>

                <h2 class="text-center">Ámbito familiar</h2>

                <div class="col-12 table-responsive">
                    <table class="table table-bordered table-hover">
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
                            @foreach ($ambitofamiliar as $item)
                                <tr>
                                    <td>Con relación a su padre</td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->padre == 'Excelente')
                                                <input id="radio_26" name="padre" type="radio" checked>
                                            @else
                                                <input id="radio_26" name="padre" type="radio" disabled>
                                            @endif
                                            <label for="radio_26"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->padre == 'Bueno')
                                                <input id="radio_27" name="padre" type="radio" checked>
                                            @else
                                                <input id="radio_27" name="padre" type="radio" disabled>
                                            @endif
                                            <label for="radio_27"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->padre == 'Normal')
                                                <input id="radio_28" name="padre" type="radio" checked>
                                            @else
                                                <input id="radio_28" name="padre" type="radio" disabled>
                                            @endif
                                            <label for="radio_28"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->padre == 'Regular')
                                                <input id="radio_29" name="padre" type="radio" checked>
                                            @else
                                                <input id="radio_29" name="padre" type="radio" disabled>
                                            @endif
                                            <label for="radio_29"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->padre == 'Malo')
                                                <input id="radio_30" name="padre" type="radio" checked>
                                            @else
                                                <input id="radio_30" name="padre" type="radio" disabled>
                                            @endif
                                            <label for="radio_30"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Con relación a su madre</td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->madre == 'Excelente')
                                                <input id="radio_31" name="madre" type="radio" checked>
                                            @else
                                                <input id="radio_31" name="madre" type="radio" disabled>
                                            @endif
                                            <label for="radio_31"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->madre == 'Bueno')
                                                <input id="radio_32" name="madre" type="radio" checked>
                                            @else
                                                <input id="radio_32" name="madre" type="radio" disabled>
                                            @endif
                                            <label for="radio_32"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->madre == 'Normal')
                                                <input id="radio_33" name="madre" type="radio" checked>
                                            @else
                                                <input id="radio_33" name="madre" type="radio" disabled>
                                            @endif
                                            <label for="radio_33"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->madre == 'Regular')
                                                <input id="radio_34" name="madre" type="radio" checked>
                                            @else
                                                <input id="radio_34" name="madre" type="radio" disabled>
                                            @endif
                                            <label for="radio_34"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->madre == 'Malo')
                                                <input id="radio_35" name="madre" type="radio" checked>
                                            @else
                                                <input id="radio_35" name="madre" type="radio" disabled>
                                            @endif
                                            <label for="radio_35"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Con relación al cumplimiento de las responsabilidades que tenga asignadas</td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->responsabilidades == 'Excelente')
                                                <input id="radio_36" name="responsabilidades" type="radio" checked>
                                            @else
                                                <input id="radio_36" name="responsabilidades" type="radio" disabled>
                                            @endif
                                            <label for="radio_36"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->responsabilidades == 'Bueno')
                                                <input id="radio_37" name="responsabilidades" type="radio" checked>
                                            @else
                                                <input id="radio_37" name="responsabilidades" type="radio">
                                            @endif
                                            <label for="radio_37"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->responsabilidades == 'Normal')
                                                <input id="radio_38" name="responsabilidades" type="radio" checked>
                                            @else
                                                <input id="radio_38" name="responsabilidades" type="radio" disabled>
                                            @endif
                                            <label for="radio_38"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->responsabilidades == 'Regular')
                                                <input id="radio_39" name="responsabilidades" type="radio" checked>
                                            @else
                                                <input id="radio_39" name="responsabilidades" type="radio" disabled>
                                            @endif
                                            <label for="radio_39"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->responsabilidades == 'Malo')
                                                <input id="radio_40" name="responsabilidades" type="radio" checked>
                                            @else
                                                <input id="radio_40" name="responsabilidades" type="radio" disabled>
                                            @endif
                                            <label for="radio_40"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Con relación a las normas de convivencia establecidas</td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->normas == 'Excelente')
                                                <input id="radio_41" name="normas" type="radio" checked>
                                            @else
                                                <input id="radio_41" name="normas" type="radio" disabled>
                                            @endif
                                            <label for="radio_41"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->normas == 'Bueno')
                                                <input id="radio_42" name="normas" type="radio" checked>
                                            @else
                                                <input id="radio_42" name="normas" type="radio" disabled>
                                            @endif
                                            <label for="radio_42"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->normas == 'Normal')
                                                <input id="radio_43" name="normas" type="radio" checked>
                                            @else
                                                <input id="radio_43" name="normas" type="radio" disabled>
                                            @endif
                                            <label for="radio_43"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->normas == 'Regular')
                                                <input id="radio_44" name="normas" type="radio" checked>
                                            @else
                                                <input id="radio_44" name="normas" type="radio" disabled>
                                            @endif
                                            <label for="radio_44"></label>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="radio">
                                            @if ($item->normas == 'Malo')
                                                <input id="radio_45" name="normas" type="radio" checked>
                                            @else
                                                <input id="radio_45" name="normas" type="radio" disabled>
                                            @endif
                                            <label for="radio_45"></label>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-12 text-center py-2">
                    <div class="form-group">
                        @foreach ($ambitofamiliar as $item)
                            <a href="{{route('ambitofamiliar.edit', [$ciclo, $nivel, $grupo, $alumno, $item])}}" class="btn btn-inline btn-info ladda-button" data-size="s">
                                <span class="ladda-label">
                                    <i class="fa fa-edit"></i>
                                    Editar ámbito familiar
                                </span>
                            </a>
                            <form action="{{-- {{ route('contactos.destroy', ) }} --}}" method="POST">
                                @csrf
                                @method('delete')
                                <button title="eliminar" type="submit" class="btn btn-inline btn-danger ladda-button"
                                    data-size="s">
                                    <span class="ladda-label">
                                        <i class="fa fa-trash"></i>
                                        Eliminar
                                    </span>
                                </button>
                            </form>
                        @endforeach
                        @if ($ambitofamiliar->isEmpty())
                            <a href="{{ route('ambitofamiliar.create', [$ciclo, $nivel, $grupo, $alumno]) }}"
                                class="btn btn-inline btn-success ladda-button">
                                <span class="ladda-label">Calificar ámbito familiar</span>
                            </a>
                        @endif
                    </div>
                </div>

                <h2 class="text-center">Area Socioeconómica</h2>

                <div class="col-12 table-responsive">
                    <table class="table">
                        <tbody>
                            @foreach ($area as $item)
                                <tr>
                                    <th scope="col">La casa de los padres es:</th>
                                    <td>{{ $item->casa_padres }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Habitaciones con las que cuenta la casa:</th>
                                    <td>{{ $item->habitaciones }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Cuenta con dormitorio propio:</th>
                                    <td>
                                        @if ($item->dormitorio == 1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Servicios con los que cuenta la casa de los padres:</th>
                                    <td>{{ $item->servicios }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">La suma de los ingresos mensuales de la familia es:</th>
                                    <td>${{ $item->suma_ingresos }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">Los gastos escolares como pasajes, alimentos y materiales suman un promedio quincenal de:</th>
                                    <td>${{ $item->gastos_escolares }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">En su familia salen a vacacionar:</th>
                                    <td>
                                        @if ($item->vaciones == 1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Van al cine:</th>
                                    <td>
                                        @if ($item->cine == 1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">Van al teatro:</th>
                                    <td>
                                        @if ($item->teatro == 1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col">¿Qué otras actividades realizan?</th>
                                    <td>{{ $item->actividades }}</td>
                                </tr>
                                <tr>
                                    <th scope="col">¿Cuenta con algún tipo de beca?</th>
                                    <td>
                                        @if ($item->beca == 1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </td>
                                </tr>
                                @if ($item->beca == 1)

                                    <tr>
                                        <th scope="col">Si su respuesta fue "si", especifique qué tipo de beca tiene:</th>
                                        <td>{{ $item->tipo_beca }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col">En que es utilizado el recurso de la beca:</th>
                                        <td>{{ $item->recurso_beca }}</td>
                                    </tr>
                                @else
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <div class="col-12 text-center py-2">
                    <div class="form-group">
                        @foreach ($area as $item)
                            <a href="{{-- {{route('contacto.edit')}} --}}" class="btn btn-inline btn-info ladda-button" data-size="s">
                                <span class="ladda-label">
                                    <i class="fa fa-edit"></i>
                                    Editar area socioeconómica
                                </span>
                            </a>
                            <form action="{{-- {{ route('contactos.destroy', ) }} --}}" method="POST">
                                @csrf
                                @method('delete')
                                <button title="eliminar" type="submit" class="btn btn-inline btn-danger ladda-button"
                                    data-size="s">
                                    <span class="ladda-label">
                                        <i class="fa fa-trash"></i>
                                        Eliminar
                                    </span>
                                </button>
                            </form>
                        @endforeach
                        @if ($area->isEmpty())
                            <a href="{{ route('area.create', [$ciclo, $nivel, $grupo, $alumno]) }}"
                                class="btn btn-inline btn-success ladda-button">
                                <span class="ladda-label">Agregar area socioeconómica</span>
                            </a>
                        @endif
                    </div>
                </div>

                <h2 class="text-center">Contactos de emergencia</h2>

                <div class="col-12 table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nombre del contacto</th>
                                <th scope="col">Número de teléfono</th>
                                <th scope="col">¿Puede recoger al alumno?</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alumno->contactos as $item)
                                <tr>
                                    <td>{{ $item->nombre }}</td>
                                    <td>{{ $item->telefono }}</td>
                                    <td>
                                        @if ($item->recoger == 1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>
                                        <a title="editar" href="{{-- {{ route('contactos.show') }} --}}"
                                            class="btn btn-inline btn-info btn-sm ladda-button" data-size="s">
                                            <span class="ladda-label">
                                                <i class="fa fa-edit"></i>
                                            </span>
                                        </a>
                                        <form action="{{-- {{ route('contactos.destroy', ) }} --}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button title="eliminar" type="submit"
                                                class="btn btn-inline btn-danger btn-sm ladda-button" data-size="s">
                                                <span class="ladda-label">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12 text-center py-2">
                    <div class="form-group">
                        <a href="{{ route('contacto.create', [$ciclo, $nivel, $grupo, $alumno]) }}"
                            class="btn btn-inline btn-success ladda-button">
                            <span class="ladda-label">Agregar contacto</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection