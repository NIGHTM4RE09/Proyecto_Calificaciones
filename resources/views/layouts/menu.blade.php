<div class="mobile-menu-left-overlay"></div>
<nav class="side-menu">
    <div class="side-menu-avatar">
        <div class="avatar-preview avatar-preview-100">
            <img src="{{ asset('img/carp.png') }}" alt="">
        </div>
    </div>
    <ul class="side-menu-list">
        <li class="brown">
            <a href="{{ route('inicio') }}">
                <i class="font-icon font-icon-home"></i>
                <span class="lbl">Inicio</span>
            </a>
        </li>
        @can('Usuarios')
            <li class="green">
                <a href="{{ route('usuarios.index') }}">
                    <i class="font-icon font-icon-user"></i>
                    <span class="lbl">Usuarios</span>
                </a>
            </li>
        @endcan
        @can('Roles')
            <li class="green">
                <a href="{{ route('roles.index') }}">
                    <i class="font-icon font-icon-notebook-bird"></i>
                    <span class="lbl">Roles</span>
                </a>
            </li>
        @endcan
        <li class="blue">
            <a href="{{ route('ciclo-escolar.index') }}">
                <i class="font-icon font-icon-users"></i>
                <span class="lbl">Alumnos</span>
            </a>
        </li>
        <li class="orange-red with-sub">
            <a href="{{ route('planeaciones.index') }}">
                <i class="font-icon font-icon-calend"></i>
                <span class="lbl">Planeaciones</span>
            </a>
        </li>
    </ul>
</nav>
<!--.side-menu-->