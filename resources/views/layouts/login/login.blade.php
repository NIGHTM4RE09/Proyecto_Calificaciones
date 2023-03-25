<!DOCTYPE html>
<html>

@include('layouts.login.head')

<body>
    <section class="vh-100 color">
        <div class="container py-1 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block py-5">
                                <img src="{{asset('img/carp.gif')}}" alt="" width="400px">
                            </div>
                            @yield('contenido')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.login.scripts')
</body>

</html>
