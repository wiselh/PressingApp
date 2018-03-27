@extends('main')

@section('page_style')
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.css')}}">
@endsection

@section('page_title')
<h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Dashboard</h1>
@endsection

@section('content')

    <div class="row invisible" data-toggle="appear">
        <!-- Row #2 -->
        <div class="col-md-6">
            <div class="block">
                <div class="block-header bg-primary-lighter">
                    <h3 class="block-title">
                        Sales <small>This week</small>
                    </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option">
                            <i class="si si-wrench"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <div class="pull-all pt-30">
                        <!-- Lines Chart Container -->
                        <canvas class="js-chartjs-dashboard-lines"></canvas>
                    </div>
                </div>
                <div class="block-content">
                    <div class="row items-push text-center">
                        <div class="col-12 col-sm-4">
                            <div class="font-w600 text-success">
                                <i class="fa fa-caret-up"></i> +6%
                            </div>
                            <div class="font-size-h4 font-w600">35.2</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Average</div>
                        </div>
                        <div class="col-6 col-sm-4">
                            <div class="font-w600 text-success">
                                <i class="fa fa-caret-up"></i> +14%
                            </div>
                            <div class="font-size-h4 font-w600">960</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">This Month</div>
                        </div>
                        <div class="col-6 col-sm-4">
                            <div class="font-w600 text-danger">
                                <i class="fa fa-caret-down"></i> -1%
                            </div>
                            <div class="font-size-h4 font-w600">263</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">This Week</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="block">
                <div class="block-header bg-earth-lighter">
                    <h3 class="block-title">
                        Earnings <small>This week</small>
                    </h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                            <i class="si si-refresh"></i>
                        </button>
                        <button type="button" class="btn-block-option">
                            <i class="si si-wrench"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content block-content-full">
                    <div class="pull-all pt-30">
                        <!-- Lines Chart Container -->
                        <canvas class="js-chartjs-dashboard-lines2"></canvas>
                    </div>
                </div>
                <div class="block-content bg-white">
                    <div class="row items-push text-center">
                        <div class="col-6 col-sm-4">
                            <div class="font-w600 text-success">
                                <i class="fa fa-caret-up"></i> +8%
                            </div>
                            <div class="font-size-h4 font-w600">$ 8,200</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">This Month</div>
                        </div>
                        <div class="col-6 col-sm-4">
                            <div class="font-w600 text-danger">
                                <i class="fa fa-caret-down"></i> -9%
                            </div>
                            <div class="font-size-h4 font-w600">$ 1,318</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">This Week</div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="font-w600 text-success">
                                <i class="fa fa-caret-up"></i> +39%
                            </div>
                            <div class="font-size-h4 font-w600">$ 4,850</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Balance</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Row #2 -->
    </div>

@endsection

@section('page_script')
    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-validation/additional-methods.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{asset('assets/js/pages/be_tables_datatables.js')}}"></script>
    <script src="{{asset('assets/js/pages/users_validation.js')}}"></script>

    <script src="{{asset('assets/js/plugins/sweetalert2/es6-promise.auto.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/users_delete.js')}}"></script>
    <script>
        jQuery(function () {
            // Init page helpers (BS Notify Plugin)
            Codebase.helpers('notify');
        });
    </script>
@endsection


