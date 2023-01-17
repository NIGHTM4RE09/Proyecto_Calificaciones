@extends('layouts.cuerpo')

@section('contenido')
    {{-- Style image preview --}}
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
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
                    <form action="{{ route('planeaciones.store' /*  Auth::user()->id */) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6">
                                <div class="image-wrapper">
                                    <img id="picture" src="{{ asset('img/planeacion.jpg') }}" class="img-thumbnail"
                                        alt="imagen_planeacion">
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6">
                                <fieldset class="form-group">
                                    <input name="planeacion" id="file" class="form-control" type="file"
                                        accept="image/*">
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
    <section class="box-typical">
        <header class="box-typical-header-sm text-center">
            Mis Planeaciones
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
                @if (Auth::user()->id == $planeacion->user_id)
                    <div class="slide">
                        <article class="post-announce">
                            <div class="post-announce-pic image-wrapper">
                                <a class="fancybox" rel="gall-1" href="{{ Storage::url($planeacion->planeacion) }}">
                                    <img src="{{ Storage::url($planeacion->planeacion) }}" alt="">
                                </a>
                            </div>
                            <div class="post-announce-title">
                                Nivel: {{ $planeacion->nivel_academico }}
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


    @if (Auth::user()->hasRole('Director') || Auth::user()->hasRole('Administrador'))
        <section class="box-typical">
            <header class="box-typical-header-sm text-center">
                Planeaciones Primaria
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
                    @if ($planeacion->nivel_academico == 'Primaria')
                        <div class="slide">
                            <article class="post-announce">
                                <div class="post-announce-pic image-wrapper">
                                    <a class="fancybox" rel="gall-2" href="{{ Storage::url($planeacion->planeacion) }}">
                                        <img src="{{ Storage::url($planeacion->planeacion) }}" alt="">
                                    </a>
                                </div>
                                <div class="post-announce-title">
                                    @foreach ($user as $item)
                                        @if ($item->id == $planeacion->user_id)
                                            Docente: {{ $item->name }}
                                        @endif
                                    @endforeach
                                    <br>
                                    Nivel: {{ $planeacion->nivel_academico }}

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
                                    <a class="fancybox" rel="gall-2" href="{{ Storage::url($planeacion->planeacion) }}">
                                        <img src="{{ Storage::url($planeacion->planeacion) }}" alt="">
                                    </a>
                                </div>
                                <div class="post-announce-title">
                                    @foreach ($user as $item)
                                        @if ($item->id == $planeacion->user_id)
                                            Docente: {{ $item->name }}
                                        @endif
                                    @endforeach
                                    <br>
                                    Nivel: {{ $planeacion->nivel_academico }}
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
                                        <img src="{{ Storage::url($planeacion->planeacion) }}" alt="">
                                    </a>
                                </div>
                                <div class="post-announce-title">
                                    @foreach ($user as $item)
                                        @if ($item->id == $planeacion->user_id)
                                            Docente: {{ $item->name }}
                                        @endif
                                    @endforeach
                                    <br>
                                    Nivel: {{ $planeacion->nivel_academico }}
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
    @endif

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