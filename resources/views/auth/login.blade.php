@extends('layouts.login.login')

@section('contenido')
    {{-- <form class="sign-box" action="{{ route('login') }}" method="POST">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="sign-avatar">
            <img src="{{ asset('img/carp.png') }}" alt="">
        </div>
        <header class="sign-title">Colegio Agustín Ruíz de la Peña</header>
        <div class="form-group">
            <input id="email" name="email" type="text" class="form-control @error('email') is-invalid @enderror"
                placeholder="usuario@carp.com" value="{{ old('email') }}" />
        </div>
        <div class="form-group">
            <input id="password" name="password" type="password"
                class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" />
        </div>
        
        <button type="submit" class="btn btn-rounded">Iniciar sesión</button>
        
    </form> --}}

    <div class="col-md-6 col-lg-7 d-flex align-items-center">
        <div class="card-body p-4 p-lg-5 text-black">

            <form action="{{ route('login') }}" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="d-flex align-items-center mb-3 pb-1">
                    <img class="img-fluid d-block rounded" src="{{ asset('img/carp.png') }}"
                        alt="carp" width="50px" height="50px">
                    <span class="h4 fw-bold mb-0 px-3">Colegio Agustin Ruíz de la Peña</span>
                </div>

                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicia sesión con
                    tu cuenta</h5>

                <div class="form-outline mb-4">
                    <input type="email" id="form2Example17" name="email"
                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                        value="{{ old('email') }}" />
                    <label class="form-label" for="form2Example17">Correo electrónico</label>
                </div>

                <div class="form-outline mb-4">
                    <input type="password" id="form2Example27" name="password"
                        class="form-control form-control-lg @error('password') is-invalid @enderror" />
                    <label class="form-label" for="form2Example27">Contraseña</label>
                </div>

                <div class="pt-1 mb-4">
                    <button class="btn btn-lg btn-block color" type="submit">Inicar
                        sesión</button>
                </div>
            </form>

        </div>
    </div>
@endsection