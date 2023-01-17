<!DOCTYPE html>
<html lang="en">

@include('layouts.head')

<body class="with-side-menu dark-theme">

    @include('layouts.encabezado')

    @include('layouts.menu')

    <div class="page-content">
        <div class="container-fluid">
            @yield('contenido')
        </div>
        <!--.container-fluid-->
    </div>
    <!--.page-content-->
    @include('layouts.scripts')
    
</body>

</html>
