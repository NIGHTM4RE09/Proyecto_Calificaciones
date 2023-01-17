@extends('layouts.login.login')

@section('contenido')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <form class="sign-box" action="{{ route('login') }}" method="POST">
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
            <input id="email" name="email" type="text"  class="form-control @error('email') is-invalid @enderror" placeholder="usuario@carp.com" value="{{ old('email') }}" />
        </div>
        <div class="form-group">
            <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" />
        </div>
        {{-- <div class="form-group">
            <div class="checkbox float-left">
                <input type="checkbox" id="signed-in" />
                <label for="signed-in">Keep me signed in</label>
            </div>
            <div class="float-right reset">
                <a href="reset-password.html">Reset Password</a>
            </div>
        </div> --}}
        <button type="submit" class="btn btn-rounded">Iniciar sesión</button>
        {{-- <p class="sign-note">New to our website? <a href="sign-up.html">Sign up</a></p>
        <!--<button type="button" class="close">
            <span aria-hidden="true">&times;</span>
        </button>--> --}}
    </form>
@endsection
