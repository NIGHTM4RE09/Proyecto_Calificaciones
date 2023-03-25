@extends('layouts.cuerpo')

@section('contenido')
    <div class="row justify-content-center align-items-center g-3 text-center">
        <div class="col-sm-5 col-md-4 col-lg-12">
            <img src="{{ asset('img/carp.png') }}" class="rounded mx-auto" width="auto" height="300px"
                alt="logo_carp">
        </div>
        <section class="col-12 col-md-8 col-lg-8 card">
            <div class="card-block row">
                <div clas="col-12 border">
                    <figure class="text-start">
                        <blockquote class="blockquote">
                            <p>Sistema web desarrollado para uso exclusivo del Colegio Agustín Ruíz de la Peña,
                                el cuál servirá de apoyo para labores internas de los docentes y directivos.
                            </p>
                            <p>
                                El sistema implementa un control de usuarios para todos los maestros, los cuales les
                                permitirá subir sus planeaciones y llevar un control del alumnado en cuestion de información
                                y de sus calificaciones.
                            </p>
                        </blockquote>
                    </figure>
                </div>
            </div>
        </section>
    </div>
@endsection
