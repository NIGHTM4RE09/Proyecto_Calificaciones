<!DOCTYPE html>
<html>

@include('layouts.login.head')

<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                @yield('contenido')
            </div>
        </div>
    </div>
    <!--.page-center-->

    @include('layouts.login.scripts')
</body>

</html>
