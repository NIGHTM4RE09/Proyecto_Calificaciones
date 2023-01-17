<script src="{{ asset('js/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/lib/tether/tether.min.js') }}"></script>
<script src="{{ asset('js/lib/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lib/match-height/jquery.matchHeight.min.js') }}"></script>
<script>
    $(function() {
        $('.page-center').matchHeight({
            target: $('html')
        });

        $(window).resize(function() {
            setTimeout(function() {
                $('.page-center').matchHeight({
                    remove: true
                });
                $('.page-center').matchHeight({
                    target: $('html')
                });
            }, 100);
        });
    });
</script>
<script src="{{ asset('js/app.js') }}"></script>
