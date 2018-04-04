<!doctype html>
<!--[if lte IE 9]>     <html lang="{{ app()->getLocale() }}" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="{{ app()->getLocale() }}" class="no-focus"> <!--<![endif]-->
<head>
    @include('Layouts.head')
    <style type="text/css">
        #page-container.page-header-modern #page-header > .content-header{
            padding-top: 0;
            padding-bottom: 0;
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
        .photo-profile,.photo-user-profile{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 35px;
            border: 1px dashed #575757;
            color: #575757;
            cursor: pointer;
        }
        /*necessary*/
        .photo-profile:hover,.photo-user-profile:hover{
            border: 1px dashed #42a5f5;
            color: #42a5f5;
        }
        .block-header,.block-header-default{
            background-color: #575757 !important;
            color: white !important;
        }
        .block-header h3,.block-header-default h3 {
            color: white
        }
        .cmd_span ,.earning{
            display: inline;
        }

    </style>
    <link rel="stylesheet" href="{{asset('assets/js/plugins/dropzonejs/min/dropzone.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">

</head>
<body>
<!-- Page Container -->
<div id="page-container" class="sidebar-mini sidebar-o sidebar-inverse side-scroll page-header-fixed page-header-glass page-header-inverse main-content-boxed">

@include('Layouts.profile')
@include('Layouts.header')

<!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-image bg-image-bottom" style="background-image: url({{asset('assets/img/photos/photo34@2x.jpg')}});">
            <div class="bg-primary-dark-op">
                <div class="content content-top text-center overflow-hidden">
                    <div class="pt-25 pb-10">
                        <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Services</h1>
                        <h2 class="h4 font-w400 text-white-op invisible" data-toggle="appear" data-class="animated fadeInUp">Bienvenue dans votre panneau personnalisé!</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Breadcrumb -->
        <div class="bg-body-light border-b">
            <div class="content py-5 text-center">
                <nav class="breadcrumb bg-body-light mb-0">
                    <a class="breadcrumb-item" href="#">Dashboard</a>
                    <span class="breadcrumb-item active">Statistiques</span>
                </nav>
            </div>
        </div>
        <!-- END Breadcrumb -->

        <div class="content">
            <!-- Statistics -->
            <!-- CountTo ([data-toggle="countTo"] is initialized in Codebase() -> uiHelperCoreAppearCountTo()) -->
            <!-- For more info and examples you can check out https://github.com/mhuggins/jquery-countTo -->
            <div class="content-heading">
                <div class="dropdown float-right">
                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" id="ecom-dashboard-stats-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Aujourd'hui
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" style="min-width: 16rem;" aria-labelledby="ecom-dashboard-stats-drop">
                        <a class="dropdown-item  option" data-name="day">
                            <i class="fa fa-fw fa-calendar mr-5"></i>Aujourd'hui
                        </a>
                        <a class="dropdown-item option" data-name="week">
                            <i class="fa fa-fw fa-calendar mr-5"></i>Cette Semaine
                        </a>
                        <a class="dropdown-item option" data-name="month">
                            <i class="fa fa-fw fa-calendar mr-5"></i>Ce Mois
                        </a>
                        <a class="dropdown-item option" data-name="year">
                            <i class="fa fa-fw fa-calendar mr-5"></i>Cette Année
                        </a>
                        <div class="dropdown-divider" ></div>
                        <a class="dropdown-item option" data-name="lifetime">
                            <i class="fa fa-fw fa-circle-o mr-5"></i>Toujours
                        </a>
                        <div class="dropdown-item ">
                            <div class="input-daterange input-group" data-date-format="yyyy-mm-dd"
                                 data-week-start="1" data-autoclose="true" data-today-highlight="true">
                                <input type="text" class="form-control" id="date1" style="font-size: 11px;"
                                       name="example-daterange1" placeholder="From" data-week-start="1"
                                       data-autoclose="true" data-today-highlight="true">
                                <span class="input-group-addon font-w600">à</span>
                                <input type="text" class="form-control" id="date2" style="font-size: 11px;"
                                       name="example-daterange2" placeholder="To" data-week-start="1"
                                       data-autoclose="true" data-today-highlight="true">
                            </div>
                            <div><button class="getStatisticsBetweenTwoDates btn btn-sm btn-alt-default">Search</button></div>
                        </div>
                    </div>
                </div>
                Statistics
            </div>

            <div class="row gutters-tiny">
                <div class="col-md-6 col-xl-3">
                    <a class="block block-rounded block-transparent bg-gd-elegance" href="javascript:void(0)">
                        <div class="block-content block-content-full block-sticky-options">
                            <div class="block-options">
                                <div class="block-options-item">
                                    <i class="fa fa-area-chart text-white-op"></i>
                                </div>
                            </div>
                            <div class="py-20 text-center">
                                <span class="font-size-h2 font-w700 mb-0 text-white cmd_span"><div class="font-size-h2 font-w700 mb-0 text-white  earning money"  data-toggle="countTo" data-to="{{$earning}}" data-after="">0</div>DH</span>
                                <div class="font-size-sm font-w600 text-uppercase text-white-op">Gains <i class="fa fa-money"></i> DH</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a class="block block-rounded block-transparent bg-gd-dusk" href="#">
                        <div class="block-content block-content-full block-sticky-options">
                            <div class="block-options">
                                <div class="block-options-item">
                                    <i class="fa fa-archive text-white-op"></i>
                                </div>
                            </div>
                            <div class="py-20 text-center">
                                <div class="font-size-h2 font-w700 mb-0 text-white commandes" data-toggle="countTo" data-to="{{$commandes_counter}}">0</div>
                                <div class="font-size-sm font-w600 text-uppercase text-white-op">Commandes</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a class="block block-rounded block-transparent bg-gd-sea" href="javascript:void(0)">
                        <div class="block-content block-content-full block-sticky-options">
                            <div class="block-options">
                                <div class="block-options-item">
                                    <i class="fa fa-users text-white-op"></i>
                                </div>
                            </div>
                            <div class="py-20 text-center">
                                <div class="font-size-h2 font-w700 mb-0 text-white clients" data-toggle="countTo" data-to="{{$client_counter}}">0</div>
                                <div class="font-size-sm font-w600 text-uppercase text-white-op">Clients</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-3">
                    <a class="block block-rounded block-transparent bg-gd-aqua" href="javascript:void(0)">
                        <div class="block-content block-content-full block-sticky-options">
                            <div class="block-options">
                                <div class="block-options-item">
                                    <i class="fa fa-cart-arrow-down text-white-op"></i>
                                </div>
                            </div>
                            <div class="py-20 text-center">
                                <div class="font-size-h2 font-w700 mb-0 text-white">5.6%</div>
                                <div class="font-size-sm font-w600 text-uppercase text-white-op">Conversion</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="content-heading">
                Graphique du Commandes
            </div>
            {{--commandes graph--}}
            <div class="row gutters-tiny">
                <div class="col-xl-12">
                    <!-- Lines Chart -->
                    <div class="block">
                        <div class="row">
                            <div class="block-content block-content-full text-center col-6">
                                <!-- Lines Chart Container -->
                                <canvas class="js-commandes-week"></canvas>
                                <input type="hidden" class="chart-days-data">
                                <input type="hidden" class="chart-lastDays-data">
                            </div>
                            <div class="block-content block-content-full text-center col-6">
                                <!-- Lines Chart Container -->
                                <canvas class="js-commandes-year"></canvas>
                                <input type="hidden" class="chart-months-data">
                                <input type="hidden" class="chart-lastMonths-data">
                            </div>
                        </div>
                    </div>
                    <!-- END Lines Chart -->
                </div>
            </div>
            <div class="content-heading">
                Graphique du Revenu
            </div>
            {{--Renevu graph--}}
            <div class="row gutters-tiny">
                <div class="col-xl-12">
                    <!-- Lines Chart -->
                    <div class="block">
                        <div class="row">
                            <div class="block-content block-content-full text-center col-6">
                                <!-- Lines Chart Container -->
                                <canvas class="js-revenu-week"></canvas>
                                <input type="hidden" class="chart-revenu-days-data">
                                <input type="hidden" class="chart-revenu-lastDays-data">

                            </div>
                            <div class="block-content block-content-full text-center col-6">
                                <!-- Lines Chart Container -->
                                <canvas class="js-revenu-year"></canvas>
                                <input type="hidden" class="chart-revenu-months-data">
                                <input type="hidden" class="chart-revenu-lastMonths-data">
                            </div>
                        </div>
                    </div>
                    <!-- END Lines Chart -->
                </div>
            </div>

            <!-- Dynamic Table Full -->
            <div class="content-heading">
                <div class="dropdown float-right">
                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" id="ecom-dashboard-stats-drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Aujourd'hui
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" style="min-width: 16rem;" aria-labelledby="ecom-dashboard-stats-drop">
                        <a class="dropdown-item  datatable-option" data-name="day">
                            <i class="fa fa-fw fa-calendar mr-5"></i>Aujourd'hui
                        </a>
                        <a class="dropdown-item datatable-option" data-name="week">
                            <i class="fa fa-fw fa-calendar mr-5"></i>Cette Semaine
                        </a>
                        <a class="dropdown-item datatable-option" data-name="month">
                            <i class="fa fa-fw fa-calendar mr-5"></i>Ce Mois
                        </a>
                        <a class="dropdown-item datatable-option" data-name="year">
                            <i class="fa fa-fw fa-calendar mr-5"></i>Cette Année
                        </a>
                        <div class="dropdown-divider" ></div>
                        <a class="dropdown-item datatable-option" data-name="lifetime">
                            <i class="fa fa-fw fa-circle-o mr-5"></i>Toujours
                        </a>
                        <div class="dropdown-item ">
                            <div class="input-daterange input-group" data-date-format="yyyy-mm-dd"
                                 data-week-start="1" data-autoclose="true" data-today-highlight="true">
                                <input type="text" class="form-control" id="date3" style="font-size: 11px;"
                                       name="example-daterange1" placeholder="From" data-week-start="1"
                                       data-autoclose="true" data-today-highlight="true">
                                <span class="input-group-addon font-w600">à</span>
                                <input type="text" class="form-control" id="date4" style="font-size: 11px;"
                                       name="example-daterange2" placeholder="To" data-week-start="1"
                                       data-autoclose="true" data-today-highlight="true">
                            </div>
                            <div><button class="getStatisticsBetweenTwoDates btn btn-sm btn-alt-default">Search</button></div>
                        </div>
                    </div>
                </div>
                Commandes
            </div>
            <div class="block">
                <div class="block-content block-content-full">
                    <div class="table-responsive">
                    <table id="my-table" class="table table-bordered table-striped table-vcenter ">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10%;">NO°</th>
                                <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Client</th>
                                <th class="d-none d-sm-table-cell text-center">Quantity</th>
                                <th class="d-none d-sm-table-cell text-center">Montant Total</th>
                                <th class="d-none d-sm-table-cell text-center">Date de Facture</th>
                                <th class="d-none d-sm-table-cell text-center">Date de Retrait</th>
                                <th class="d-none d-sm-table-cell text-center">Paiments</th>
                            </tr>
                        </thead>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="modal fade" id="modal-popout" tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Terms &amp; Conditions</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        Text
                    </div>
                </div>
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>--}}
                    {{--<button type="button" class="btn btn-alt-success" data-dismiss="modal">--}}
                    {{--<i class="fa fa-check"></i> Perfect--}}
                    {{--</button>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-popout2" tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
        <div class="modal-dialog modal-dialog-popout" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Terms &amp; Conditions</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        Text
                    </div>
                </div>
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>--}}
                    {{--<button type="button" class="btn btn-alt-success" data-dismiss="modal">--}}
                    {{--<i class="fa fa-check"></i> Perfect--}}
                    {{--</button>--}}
                </div>
            </div>
        </div>
    </div>
    <button>{{asset(Route('getdata'))}}</button>
    <!-- END Main Container -->
    @include('Layouts.footer')
</div>
{{--<script>--}}
    {{--location.load();--}}
{{--</script>--}}
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
<script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/chartjs/Chart.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<!-- Page JS Code -->
<script src="{{asset('assets/js/pages/statistics_charts.js')}}"></script>
{{--<script src="{{asset('assets/js/pages/be_tables_datatables.js')}}"></script>--}}

<script src="{{asset('assets/js/pages/profile_validation.js')}}"></script>

{{--<script src="{{asset('assets/js/pages/statisticssd.js')}}"></script>--}}
<script type="text/javascript">
    $(function () {
        jQuery('#my-table').dataTable({
            columnDefs: [],
            pageLength: 5,
            lengthMenu: [[5, 8, 15, 20], [5, 8, 15, 20]],
            autoWidth: false,
            processing: true,
            serverSide: true,
            searching: true,
            ordering: true,
//            ajax: "http://127.0.0.1:8000/statistics/datatableCommandes",
            ajax: "{{asset(Route('getdata'))}}",
            columns: [
                {data: 'commande_num', name: 'commande_num'},
                {data: 'id_client', name: 'id_client'},
                {data: 'commande_quantity', name: 'commande_quantity'},
                {data: 'commande_montant', name: 'commande_montant'},
                {data: 'commande_date', name: 'commande_date'},
                {data: 'commande_date_retrait', name: 'commande_date_retrait'},
                {data: 'commande_paid', name: 'commande_paid'}
            ]
        });


    });

//    , orderable: true, searchable:true
</script>

</body>
</html>



