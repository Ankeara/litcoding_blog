<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Lit Coder &mdash; KH</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/modules/weather-icon/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ url('assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ url('assets/modules/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ url('assets/modules/codemirror/theme/duotone-dark.css') }}">
    <link rel="stylesheet" href="{{ url('assets/modules/jquery-selectric/selectric.css') }}">

    {{-- library of text editor like microsoft word --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css"
        integrity="sha512-Fm8kRNVGCBZn0sPmwJbVXlqfJmPC13zRsMElZenX6v721g/H7OukJd8XzDEBRQ2FSATK8xNF9UYvzsCtUpfeJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- library of text editor like microsoft word --}}
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            @yield('navbar_admin')
            @yield('sidebar_admin')

            <!-- Main Content -->
            <div class="main-content">
                @yield('main_admin')
            </div>
            @yield('footer_admin')
        </div>
    </div>


    <!-- General JS Scripts -->
    <script src="{{ url('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ url('assets/modules/popper.js') }}"></script>
    <script src="{{ url('assets/modules/tooltip.js') }}"></script>
    <script src="{{ url('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ url('assets/modules/moment.min.js') }}"></script>
    <script src="{{ url('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ url('assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ url('assets/modules/chart.min.js') }}"></script>
    <script src="{{ url('assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ url('assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ url('assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ url('assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ url('assets/js/page/forms-advanced-forms.js') }}"></script>
    <script src="{{ url('assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ url('assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ url('assets/modules/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ url('assets/modules/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ url('assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

    {{-- library of text editor like microsoft word --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js"
        integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- library of text editor like microsoft word --}}
    <!-- Page Specific JS File -->
    <script src="{{ url('assets/js/page/index-0.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ url('assets/js/scripts.js') }}"></script>
    <script src="{{ url('assets/js/custom.js') }}"></script>

    @yield('customJS')
    <script>
        $('.textarea').trumbowyg();
    </script>

</body>

</html>
