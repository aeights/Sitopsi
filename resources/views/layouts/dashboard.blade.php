
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sitopsis</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <!-- Datatable -->
    <link href="{{ asset('/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
</head>

<body>
    @if (Session::has('message'))
    <div class="alert alert-primary alert-dismissible fade show position-absolute m-3" style="z-index: 10">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        {{ session('message') }}
    </div>
    @endif
    @if($errors->any())
    <div class="alert alert-primary alert-dismissible fade show position-absolute m-3" style="z-index: 10">
        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
        </button>
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    </div>
    @endif
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        @include('partials.navbar')
        @include('partials.header')
        @include('partials.sidebar')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            @yield('content')
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        @include('partials.footer')
    </div>

    <!-- Required vendors -->
    <script src="{{ asset('/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('/js/custom.min.js') }}"></script>


    <!-- Vectormap -->
    <script src="{{ asset('/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('/vendor/morris/morris.min.js') }}"></script>


    <script src="{{ asset('/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <script src="{{ asset('/vendor/gaugeJS/dist/gauge.min.js') }}"></script>

    <!--  flot-chart js -->
    <script src="{{ asset('/vendor/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('/vendor/flot/jquery.flot.resize.js') }}"></script>

    <!-- Owl Carousel -->
    <script src="{{ asset('/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <!-- Counter Up -->
    <script src="{{ asset('/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>


    <script src="{{ asset('/js/dashboard/dashboard-1.js') }}"></script>

       <!-- Datatable -->
    <script src="{{ asset('/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/plugins-init/datatables.init.js') }}"></script>

    @stack('script')
</body>

</html>