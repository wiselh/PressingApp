<!doctype html>

<!--[if lte IE 9]>     <html lang="{{ app()->getLocale() }}" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="{{ app()->getLocale() }}" class="no-focus"> <!--<![endif]-->
    <head>
        @include('Layouts.head')
    </head>
    <body>
    <!-- Page Container -->
        <div id="page-container" class="sidebar-o sidebar-inverse side-scroll page-header-fixed main-content-narrow">

            @include('Layouts.sidebar')
            @include('Layouts.header')

            @yield('content')

        </div>

        <!-- Codebase Core JS -->
        <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
        <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/core/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('assets/js/core/jquery.scrollLock.min.js')}}"></script>
        <script src="{{asset('assets/js/core/jquery.appear.min.js')}}"></script>
        <script src="{{asset('assets/js/core/jquery.countTo.min.js')}}"></script>
        <script src="{{asset('assets/js/core/js.cookie.min.js')}}"></script>
        <script src="{{asset('assets/js/codebase.js')}}"></script>

        <!-- Page JS Plugins -->
        <script src="{{asset('assets/js/plugins/chartjs/Chart.bundle.min.js')}}"></script>

        <!-- Page JS Code -->
        <script src="{{asset('assets/js/pages/be_pages_dashboard.js')}}"></script>
    </body>
</html>