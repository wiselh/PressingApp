@extends('Pages.index')
@section('content')

<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="content">
        <div class="row gutters-tiny invisible" data-toggle="appear">
            <!-- Row #1 -->
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block text-center" href="javascript:void(0)">
                    <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-dusk">
                        <div class="ribbon-box">750</div>
                        <p class="mt-5">
                            <i class="si si-book-open fa-3x text-white-op"></i>
                        </p>
                        <p class="font-w600 text-white">Articles</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block text-center" href="javascript:void(0)">
                    <div class="block-content bg-gd-primary">
                        <p class="mt-5">
                            <i class="si si-plus fa-3x text-white-op"></i>
                        </p>
                        <p class="font-w600 text-white">New Article</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block text-center" href="be_pages_forum_categories.html">
                    <div class="block-content ribbon ribbon-bookmark ribbon-crystal ribbon-left bg-gd-sea">
                        <div class="ribbon-box">16</div>
                        <p class="mt-5">
                            <i class="si si-bubbles fa-3x text-white-op"></i>
                        </p>
                        <p class="font-w600 text-white">Comments</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block text-center" href="be_pages_generic_search.html">
                    <div class="block-content bg-gd-lake">
                        <p class="mt-5">
                            <i class="si si-magnifier fa-3x text-white-op"></i>
                        </p>
                        <p class="font-w600 text-white">Search</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block text-center" href="be_comp_charts.html">
                    <div class="block-content bg-gd-emerald">
                        <p class="mt-5">
                            <i class="si si-bar-chart fa-3x text-white-op"></i>
                        </p>
                        <p class="font-w600 text-white">Statistics</p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-md-4 col-xl-2">
                <a class="block text-center" href="javascript:void(0)">
                    <div class="block-content bg-gd-corporate">
                        <p class="mt-5">
                            <i class="si si-settings fa-3x text-white-op"></i>
                        </p>
                        <p class="font-w600 text-white">Settings</p>
                    </div>
                </a>
            </div>
            <!-- END Row #1 -->
        </div>

        <div class="row gutters-tiny invisible" data-toggle="appear">
            <!-- Row #3 -->
            <div class="col-xl-12 d-flex align-items-stretch" >

            </div>

            <!-- END Row #3 -->
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

@endsection


@section('page_script')
    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/chartjs/Chart.bundle.min.js')}}"></script>
    <!-- Page JS Code -->
    <script src="{{asset('assets/js/pages/be_pages_dashboard.js')}}"></script>
@endsection