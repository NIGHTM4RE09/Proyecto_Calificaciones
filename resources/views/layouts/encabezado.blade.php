<header class="site-header">
    <div class="container-fluid">
        <h1 class="site-logo-text">CARP</h1>
        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>
        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">
                    <div class="dropdown user-menu">
                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('img/avatar-sign.png') }}" alt="">
                            {{-- <h6>{{Auth::user()->name}}</h6> --}}
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                            <a class="dropdown-item" href="{{route('usuarios.show', Auth::user()->id)}}"><span
                                    class="font-icon glyphicon glyphicon-user"></span>Perfil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"><span
                                    class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                <!--.site-header-shown-->
            </div>
            <!--site-header-content-in-->
        </div>
        <!--.site-header-content-->
    </div>
    <!--.container-fluid-->
</header>
<!--.site-header-->