<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script><script src="{{ asset('js/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/lib/tether/tether.min.js') }}"></script>
<script src="{{ asset('js/lib/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>

<script src="{{ asset('js/lib/input-mask/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/lib/input-mask/input-mask-init.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lib/jqueryui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lib/lobipanel/lobipanel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lib/match-height/jquery.matchHeight.min.js') }}"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    function showContent() {

        element = document.getElementById("contenido");
        radio1 = document.getElementById("radio_1");
        radio2 = document.getElementById("radio_2");
        radio12 = document.getElementById("radio_12");
        radio13 = document.getElementById("radio_13");

        if (radio1.checked) {
            element.style.display = 'block';
        } else {
            if (radio2.checked) {
                element.style.display = 'none';
            }
        }

        if (radio12.checked) {
            element.style.display = 'block';
        } else {
            if (radio13.checked) {
                element.style.display = 'none';
            }
        }

    }
</script>

<script src="{{ asset('js/lib/jquery-tag-editor/jquery.caret.min.js') }}"></script>
<script src="{{ asset('js/lib/jquery-tag-editor/jquery.tag-editor.min.js') }}"></script>
<script src="{{ asset('js/lib/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/lib/select2/select2.full.min.js') }}"></script>

<script>
    $(function() {
        $('#tags-editor-textarea').tagEditor();
    });
</script>

<script src="{{ asset('js/app.js') }}"></script>

{{-- js buttons --}}

<script src="{{ asset('js/lib/ladda-button/spin.min.js') }}"></script>
<script src="{{ asset('js/lib/ladda-button/ladda.min.js') }}"></script>
<script src="{{ asset('js/lib/ladda-button/ladda-button-init.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lib/jquery-contextmenu/jquery.contextMenu.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lib/jquery-contextmenu/jquery.ui.position.min.js') }}"></script>

{{-- /js buttons --}}

{{-- js form validation --}}

<script src="{{ asset('js/lib/html5-form-validation/jquery.validation.min.js') }}"></script>

<script>
    $(function() {
        /* ==========================================================================
         Validation
         ========================================================================== */

        $('#form-signin_v1').validate({
            submit: {
                settings: {
                    inputContainer: '.form-group'
                }
            }
        });

        $('#form-signin_v2').validate({
            submit: {
                settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-error-text-block',
                    display: 'block',
                    insertion: 'prepend'
                }
            }
        });

        $('#form-signup_v1').validate({
            submit: {
                settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-tooltip-error'
                }
            }
        });

        $('#form-signup_v2').validate({
            submit: {
                settings: {
                    inputContainer: '.form-group',
                    errorListClass: 'form-tooltip-error'
                }
            }
        });
    });
</script>

{{-- /js form validation --}}
{{-- js datepicker --}}

<script type="text/javascript" src="{{ asset('js/lib/moment/moment-with-locales.min.js') }}"></script>
<script type="text/javascript"
    src="{{ asset('js/lib/eonasdan-bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/lib/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
<script src="{{ asset('js/lib/clockpicker/bootstrap-clockpicker-init.js') }}"></script>
<script src="{{ asset('js/lib/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('js/lib/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script>
    $(function() {
        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        cb(moment().subtract(29, 'days'), moment());

        $('#daterange').daterangepicker({
            "timePicker": true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                    'month').endOf('month')]
            },
            "linkedCalendars": false,
            "autoUpdateInput": false,
            "alwaysShowCalendars": true,
            "showWeekNumbers": true,
            "showDropdowns": true,
            "showISOWeekNumbers": true
        });

        $('#daterange2').daterangepicker();

        $('#daterange3').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true
        });

        $('#daterange').on('show.daterangepicker', function(ev, picker) {
            /*$('.daterangepicker select').selectpicker({
            	size: 10
            });*/
        });

        /* ==========================================================================
         Datepicker
         ========================================================================== */

        $('.datetimepicker-1').datetimepicker({
            widgetPositioning: {
                horizontal: 'right'
            },
            debug: false
        });

        $('.datetimepicker-2').datetimepicker({
            widgetPositioning: {
                horizontal: 'right'
            },
            format: 'LT',
            debug: false
        });
    });
</script>

{{-- /js datepicker --}}

{{-- Js Table --}}

<script src="{{ asset('js/lib/datatables-net/datatables.min.js') }}"></script>
<script>
    $(function() {
        $('#example').DataTable({
            responsive: true
        });
    });
</script>

<script src="{{ asset('js/lib/bootstrap-table/bootstrap-table.js') }}"></script>
<script src="{{ asset('js/lib/bootstrap-table/bootstrap-table-mobile.min.js') }}"></script>
<script src="{{ asset('js/lib/bootstrap-table/bootstrap-table-mobile-init.js') }}"></script>

{{-- /Js Table --}}

{{-- Widgets --}}

<script src="{{ asset('js/lib/asPieProgress/jquery-asPieProgress.min.js') }}"></script>
<script src="{{ asset('js/lib/select2/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lib/match-height/jquery.matchHeight.min.js') }}"></script>
<script src="{{ asset('js/lib/slick-carousel/slick.min.js') }}"></script>

{{-- /Widgets --}}

{{-- Galeria --}}

<script src="{{ asset('js/lib/slick-carousel/slick.min.js') }}"></script>
<script>
    $(function() {
        $(".profile-card-slider").slick({
            slidesToShow: 1,
            adaptiveHeight: true,
            prevArrow: '<i class="slick-arrow font-icon-arrow-left"></i>',
            nextArrow: '<i class="slick-arrow font-icon-arrow-right"></i>'
        });

        var postsSlider = $(".posts-slider");

        postsSlider.slick({
            slidesToShow: 4,
            adaptiveHeight: true,
            arrows: false,
            responsive: [{
                    breakpoint: 1700,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 1350,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });

        $('.posts-slider-prev').click(function() {
            postsSlider.slick('slickPrev');
        });

        $('.posts-slider-next').click(function() {
            postsSlider.slick('slickNext');
        });

        /* ==========================================================================
         Recomendations slider
         ========================================================================== */

        var recomendationsSlider = $(".recomendations-slider");

        recomendationsSlider.slick({
            slidesToShow: 4,
            adaptiveHeight: true,
            arrows: false,
            responsive: [{
                    breakpoint: 1700,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 1350,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });

        $('.recomendations-slider-prev').click(function() {
            recomendationsSlider.slick('slickPrev');
        });

        $('.recomendations-slider-next').click(function() {
            recomendationsSlider.slick('slickNext');
        });
    });
</script>
<script src="{{ asset('js/lib/salvattore/salvattore.min.js') }}"></script>
<script src="{{ asset('js/lib/ion-range-slider/ion.rangeSlider.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".fancybox").fancybox({
            padding: 0,
            openEffect: 'none',
            closeEffect: 'none'
        });

        $("#range-slider-1").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });

        $("#range-slider-2").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });

        $("#range-slider-3").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });

        $("#range-slider-4").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });

    });
</script>

<script src="{{ asset('js/lib/salvattore/salvattore.min.js') }}"></script>
<script src="{{ asset('js/lib/ion-range-slider/ion.rangeSlider.js') }}"></script>
<script src="{{ asset('js/lib/fancybox/jquery.fancybox.pack.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".fancybox").fancybox({
            padding: 8,
            openEffect: 'elastic',
            closeEffect: 'fade'
        });

        $("#range-slider-1").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });

        $("#range-slider-2").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });

        $("#range-slider-3").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });

        $("#range-slider-4").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });

    });
</script>
{{-- /Galeria --}}