@extends('layouts.cuerpo')

@section('contenido')
    {{-- Style image preview --}}
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper embed {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
    {{-- /Style image preview --}}
    <section class="card">
        <div class="card-block">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('planeaciones.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="image-wrapper">
                                    <embed id="picture" class="img-thumbnail" src="{{ asset('docs/formato.pdf') }}"
                                        type="application/pdf">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <fieldset class="form-group">
                                    <input name="planeacion" id="file" class="form-control" type="file"
                                        accept="application/pdf">
                                </fieldset>

                                <fieldset class="form-group">
                                    <label class="form-label">Seleccione nivel acádemico</label>
                                    <select name="nivel_academico" class="form-control">
                                        <option value="">No has seleccionado ningún nivel</option>
                                        <option value="Primaria">Primaria</option>
                                        <option value="Secundaria">Secundaria</option>
                                        <option value="Preparatoria">Preparatoria</option>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label class="form-label">Seleccione Grado</label>
                                    <select name="grado" class="form-control">
                                        <option value="">No has seleccionado ningún grado</option>
                                        <option value="1°">1°</option>
                                        <option value="2°">2°</option>
                                        <option value="3°">3°</option>
                                        <option value="4°">4°</option>
                                        <option value="5°">5°</option>
                                        <option value="6°">6°</option>
                                        <option value="1° semestre">1° semestre</option>
                                        <option value="2° semestre">2° semestre</option>
                                        <option value="3° semestre">3° semestre</option>
                                        <option value="4° semestre">4° semestre</option>
                                        <option value="5° semestre">5° semestre</option>
                                        <option value="6° semestre">6° semestre</option>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group">
                                    <label class="form-label">Semana de la Planeación</label>
                                    <div class='input-group date'>
                                        <input id="daterange2" name="semana" type="text" class="form-control">
                                        <span class="input-group-addon">
                                            <i class="font-icon font-icon-calend"></i>
                                        </span>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group">
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--.row-->
        </div>
    </section>
    <section class="tabs-section">
        <div class="tabs-section-nav tabs-section-nav-inline">
            <ul class="nav" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#tabs-4-tab-1" role="tab" data-toggle="tab">
                        Mis planeaciones
                    </a>
                </li>
                @if (Auth::user()->hasRole('Director') || Auth::user()->hasRole('Administrador'))
                    <li class="nav-item">
                        <a class="nav-link" href="#tabs-4-tab-2" role="tab" data-toggle="tab">
                            Planeaciones Primaria
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tabs-4-tab-3" role="tab" data-toggle="tab">
                            Planeaciones Secundaria
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tabs-4-tab-4" role="tab" data-toggle="tab">
                            Planeaciones Preparatoria
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <!--.tabs-section-nav-->

        <div class="tab-content" style="height: 330px; overflow-y: scroll;">
            <div role="tabpanel" class="tab-pane fade in active files-manager" id="tabs-4-tab-1">
                <div class="files-manager-content">
                    <div class="row">
                        @foreach ($planeaciones as $planeacion)
                            @if (Auth::user()->id == $planeacion->user_id)
                                <div class="col-12 col-md-4 col-lg-3">
                                    <a href="{{ Storage::url($planeacion->planeacion) }}" target="_blank"
                                        rel="noreferrer noopener">
                                        <div class="card border-warning fm-file" style="width: 15rem;">
                                            <img src="{{ asset('img/file-pdf.png') }}" class="rounded mx-auto d-block py-2"
                                                alt="pdf">
                                            <div class="card-body">
                                                <p class="card-text">Nivel: {{ $planeacion->nivel_academico }}</p>
                                                <p class="card-text">Grado: {{ $planeacion->grado }}</p>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">Semana del : {{ $planeacion->semana }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!--.tab-pane-->
            <div role="tabpanel" class="tab-pane fade files-manager" id="tabs-4-tab-2">
                <div class="files-manager-content">
                    <div class="row">
                        @foreach ($planeaciones as $planeacion)
                            @if ($planeacion->nivel_academico == 'Primaria')
                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="card border-warning fm-file" style="width: 15rem;">
                                        <img src="{{ asset('img/file-pdf.png') }}" class="rounded mx-auto d-block py-2"
                                            alt="pdf">
                                        <div class="card-body">
                                            <h5 class="card-tittle">
                                                @foreach ($user as $item)
                                                    @if ($item->id == $planeacion->user_id)
                                                        Docente: {{ $item->name }}
                                                    @endif
                                                @endforeach
                                            </h5>
                                            <p class="card-text">Nivel: {{ $planeacion->nivel_academico }}</p>
                                            <p class="card-text">Grado: {{ $planeacion->grado }}</p>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">Semana del : {{ $planeacion->semana }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!--.tab-pane-->
            <div role="tabpanel" class="tab-pane fade files-manager" id="tabs-4-tab-3">
                <div class="files-manager-content">
                    <div class="row">
                        @foreach ($planeaciones as $planeacion)
                            @if ($planeacion->nivel_academico == 'Secundaria')
                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="card border-warning fm-file" style="width: 15rem;">
                                        <img src="{{ asset('img/file-pdf.png') }}" class="rounded mx-auto d-block py-2"
                                            alt="pdf">
                                        <div class="card-body">
                                            <h5 class="card-tittle">
                                                @foreach ($user as $item)
                                                    @if ($item->id == $planeacion->user_id)
                                                        Docente: {{ $item->name }}
                                                    @endif
                                                @endforeach
                                            </h5>
                                            <p class="card-text">Nivel: {{ $planeacion->nivel_academico }}</p>
                                            <p class="card-text">Grado: {{ $planeacion->grado }}</p>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">Semana del : {{ $planeacion->semana }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!--.tab-pane-->
            <div role="tabpanel" class="tab-pane fade files-manager" id="tabs-4-tab-4">
                <div class="files-manager-content">
                    <div class="row">
                        @foreach ($planeaciones as $planeacion)
                            @if ($planeacion->nivel_academico == 'Preparatoria')
                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="card border-warning fm-file" style="width: 15rem;">
                                        <img src="{{ asset('img/file-pdf.png') }}" class="rounded mx-auto d-block py-2"
                                            alt="pdf">
                                        <div class="card-body">
                                            <h5 class="card-tittle">
                                                @foreach ($user as $item)
                                                    @if ($item->id == $planeacion->user_id)
                                                        Docente: {{ $item->name }}
                                                    @endif
                                                @endforeach
                                            </h5>
                                            <p class="card-text">Nivel: {{ $planeacion->nivel_academico }}</p>
                                            <p class="card-text">Grado: {{ $planeacion->grado }}</p>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">Semana del : {{ $planeacion->semana }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <!--.tab-pane-->
        </div>
        <!--.tab-content-->
    </section>
    <!--.tabs-section-->
    {{-- @if (Auth::user()->hasRole('Director') || Auth::user()->hasRole('Administrador'))
        <section class="box-typical">
            <header class="box-typical-header-sm text-center">
                Planeaciones Secundaria
                <div class="slider-arrs">
                    <button type="button" class="posts-slider-prev">
                        <i class="font-icon font-icon-arrow-left"></i>
                    </button>
                    <button type="button" class="posts-slider-next">
                        <i class="font-icon font-icon-arrow-right"></i>
                    </button>
                </div>
            </header>
            <div class="posts-slider">
                @foreach ($planeaciones as $planeacion)
                    @if ($planeacion->nivel_academico == 'Secundaria')
                        <div class="slide">
                            <article class="post-announce">
                                <div class="post-announce-pic image-wrapper">
                                    <a class="fancybox" rel="gall-2"
                                        href="{{ Storage::url($planeacion->planeacion) }}">
                                        <img src="{{ asset('img/file-pdf.png') }}" alt="" width="10px"
                                            height="10px">
                                    </a>
                                </div>
                                <div class="post-announce-title">
                                    @foreach ($user as $item)
                                        @if ($item->id == $planeacion->user_id)
                                            Docente: {{ $item->name }}
                                        @endif
                                    @endforeach
                                    <br>
                                    Nivel: {{ $planeacion->nivel_academico }} Grado: {{ $planeacion->grado }}
                                </div>
                                <div class="post-announce-date">Semana del : {{ $planeacion->semana }}</div>
                            </article>
                        </div>
                    @endif
                @endforeach
                <!--.slide-->
            </div>
            <!--.posts-slider-->
        </section>
        <!--.box-typical-->
        <section class="box-typical">
            <header class="box-typical-header-sm text-center">
                Planeaciones Preparatoria
                <div class="slider-arrs">
                    <button type="button" class="posts-slider-prev">
                        <i class="font-icon font-icon-arrow-left"></i>
                    </button>
                    <button type="button" class="posts-slider-next">
                        <i class="font-icon font-icon-arrow-right"></i>
                    </button>
                </div>
            </header>
            <div class="posts-slider">
                @foreach ($planeaciones as $planeacion)
                    @if ($planeacion->nivel_academico == 'Preparatoria')
                        <div class="slide">
                            <article class="post-announce">
                                <div class="post-announce-pic image-wrapper">
                                    <a class="fancybox" rel="gall-2"
                                        href="{{ Storage::url($planeacion->planeacion) }}">
                                        <img src="{{ asset('img/file-pdf.png') }}" alt="">
                                    </a>
                                </div>
                                <div class="post-announce-title">
                                    @foreach ($user as $item)
                                        @if ($item->id == $planeacion->user_id)
                                            Docente: {{ $item->name }}
                                        @endif
                                    @endforeach
                                    <br>
                                    Nivel: {{ $planeacion->nivel_academico }} Grado: {{ $planeacion->grado }}
                                </div>
                                <div class="post-announce-date">Semana del : {{ $planeacion->semana }}</div>
                            </article>
                        </div>
                    @endif
                @endforeach
                <!--.slide-->
            </div>
            <!--.posts-slider-->
        </section>
        <!--.box-typical-->
    @endif --}}

    <script type="text/javascript">
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>
@endsection
