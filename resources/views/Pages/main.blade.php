<!doctype html>
<!--[if lte IE 9]>     <html lang="{{ app()->getLocale() }}" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="{{ app()->getLocale() }}" class="no-focus"> <!--<![endif]-->
    <head>
        @include('Layouts.head')
        @yield('page_style')
        <style type="text/css">
            #page-container.page-header-modern #page-header > .content-header{
                padding-top: 0px;
                padding-bottom: 0px;
            }
            #page-container.page-header-modern #page-header {
                background-color: #fff;
                box-shadow: none !important;
            }
            header{
                background-color: white;
            }
            .ribbon-crystal{
                border-radius: 10px;
            }
            .block{
                border-radius: 8px;
            }
            a.block{
                background-color: transparent;
            }
            a.block i,a.block p {
                display: inline-block;
            }
        </style>
    </head>
    <body>
    <!-- Page Container -->
    {{--<div id="page-container" class="side-scroll page-header-modern main-content-boxed">--}}
    <div id="page-container" class="sidebar-inverse side-scroll page-header-fixed side-trans-enabled">

            @include('Layouts.profile')
            @include('Layouts.header')

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <div class="row gutters-tiny invisible" data-toggle="appear">
                        <!-- Row #1 -->
                        <div class="col-6 col-md-4 col-xl-2">
                            <a class="block text-center" href="/commandes">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                                    {{--<p class="mt-5">--}}
                                        <i class="si si-book-open  text-white-op"></i>
                                    {{--</p>--}}
                                    <p class="font-w600 text-white">Ajouter</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-2">
                            <a class="block text-center" href="/factures">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">
                                    <div class="ribbon-box">{{$nbr_factures}}</div>
                                    {{--<p class="mt-5">--}}
                                        <i class="si si-bubbles text-white-op"></i>
                                    {{--</p>--}}
                                    <p class="font-w600 text-white">Commandes</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-2">
                            <a class="block text-center" href="/users">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                                    <div class="ribbon-box">{{$nbr_factures}}</div>
                                    {{--<p class="mt-5">--}}
                                        {{--<i class="si si-book-open fa-3x text-white-op"></i>--}}
                                    {{--</p>--}}
                                    <p class="font-w600 text-white">Users</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-2">
                            <a class="block text-center" href="/services">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">
                                    <div class="ribbon-box">{{$nbr_factures}}</div>
                                    {{--<p class="mt-5">--}}
                                        {{--<i class="si si-bubbles fa-3x text-white-op"></i>--}}
                                    {{--</p>--}}
                                    <p class="font-w600 text-white">Services</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-2">
                            <a class="block text-center" href="/categories">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                                    <div class="ribbon-box">{{$nbr_factures}}</div>
                                    {{--<p class="mt-5">--}}
                                        {{--<i class="si si-book-open fa-3x text-white-op"></i>--}}
                                    {{--</p>--}}
                                    <p class="font-w600 text-white">Categories</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4 col-xl-2">
                            <a class="block text-center" href="/users">
                                <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">
                                    <div class="ribbon-box">{{$nbr_factures}}</div>
                                    {{--<p class="mt-5">--}}
                                        {{--<i class="si si-bubbles fa-3x text-white-op"></i>--}}
                                    {{--</p>--}}
                                    <p class="font-w600 text-white">Utilisateurs</p>
                                </div>
                            </a>
                        </div>
                        <!-- END Row #1 -->
                    </div>
                    @yield('content')
                </div>
            </main>

            <!-- END Main Container -->
            @include('Layouts.footer')
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
        <script src="{{asset('assets/js/pages/profile_validation.js')}}"></script>

        @yield('page_script')
    </body>
</html>