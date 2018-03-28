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
            /*background: linear-gradient(135deg,#2095f3 0,#26c6da 100%) !important;*/
            background-color: #343a40 !important;
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
                        <a class="dropdown-item  option" data-name="day" href="/commandes">
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

            <script type="text/javascript">
                $(function () {
                    Codebase.helpers(['datepicker']);

                    $('.option').click(function (e) {
                        e.preventDefault();
                        var value =$(e.currentTarget).data('name');
                        $.ajax({
                            url: "/statistics/period/"+value,
                            type:"GET",
                            data:value,
                            success: function(data) {
                                console.log(data.period);
                                $(".money").countTo({
                                    from: 0,
                                    to: data.money,
                                    speed: 600,
                                    refreshInterval: 50
                                });
                                $(".commandes").countTo({
                                    from: 0,
                                    to: data.commandes_nbr,
                                    speed: 600,
                                    refreshInterval: 50
                                });
                                $(".clients").countTo({
                                    from: 0,
                                    to: data.clients_nbr,
                                    speed: 600,
                                    refreshInterval: 50
                                });
//                                        $('.mytable').dataTable().fnClearTable();
//                                        for(var i = 1; i <= data.commandes_nbr; i++) {
//                                            // You could also use an ajax property on the data table initialization
//                                            $('.mytable').dataTable().fnAddData( [
//                                                data.commandes[i].commande_num,
//                                                data.commandes[i].client_name,
//                                                data.commandes[i].commande_date,
//                                                data.commandes[i].commande_quantity,
//                                                data.commandes[i].commande_montant,
//                                                data.commandes[i].commande_paid
//                                            ]);
//                                        }
                                $('#ecom-dashboard-stats-drop').html(data.period);
//                                         $('.mytable').dataTable().fnClearTable();
//                                         $('.mytable').dataTable().fnAddData(data);
//                                         $('.mytable').dataTable().fnDraw();
                            },
                            error: function(data){
                                $errors = data.responseJSON;
                                console.log("error "+data);
//                                         swal('Oops...', 'Quelque chose s\'est mal passé!', 'error');
                            }
                        });



                    });
                    $('.getStatisticsBetweenTwoDates').click(function (e) {
                        e.preventDefault();
                        var date1 =$('#date1').val();
                        var date2 =$('#date2').val();

                        $.ajax({
                            url: "/statistics/between",
                            type:"GET",
                            data:{
                                date1: date1,
                                date2: date2
                            },
                            success: function(data) {
                                console.log(data);
                                $(".money").countTo({
                                    from: 0,
                                    to: data.money,
                                    speed: 600,
                                    refreshInterval: 50
                                });
                                $(".commandes").countTo({
                                    from: 0,
                                    to: data.commandes_nbr,
                                    speed: 600,
                                    refreshInterval: 50
                                });
                                $(".clients").countTo({
                                    from: 0,
                                    to: data.clients_nbr,
                                    speed: 600,
                                    refreshInterval: 50
                                });
                                $('#ecom-dashboard-stats-drop').html(data.period);

//                                        $('.mytable').dataTable().fnClearTable();
//                                        for(var i = 1; i < 10; i++) {
//                                            // You could also use an ajax property on the data table initialization
//                                            $('.mytable').dataTable().fnAddData( [
//                                                'hakim',
//                                                'hakim',
//                                                'hasa',
//                                                'hakim',
//                                                'hakim',
//                                                'hakim'
//                                            ]);
//                                        }
                            },
                            error: function(data){
                                swal('error');
                                $errors = data.responseJSON;
                                console.log("error "+data);
//                                         swal('Oops...', 'Quelque chose s\'est mal passé!', 'error');
                            }
                        });

                    });

                });


            </script>

            <div class="row gutters-tiny">
                <!-- Earnings -->
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
                <!-- END Earnings -->

                <!-- Orders -->
                <div class="col-md-6 col-xl-3">
                    <a class="block block-rounded block-transparent bg-gd-dusk" href="be_pages_ecom_orders.html">
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
                <!-- END Orders -->

                <!-- New Customers -->
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
                <!-- END New Customers -->

                <!-- Conversion Rate -->
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
                <!-- END Conversion Rate -->
            </div>
            <!-- END Statistics -->

            <!-- Latest Orders and Top Products -->
            <div class="row gutters-tiny">
                <!-- Latest Orders -->
                <div class="col-xl-12">
                    <h2 class="content-heading">Latest Orders</h2>
                    <div class="block block-rounded">
                        <div class="block-content">
                            <table class="table table-borderless table-hover table-striped  js-dataTable-full mytable">
                                <thead>
                                <tr>
                                    {{--<th class="text-center" style="width: 10%;">ID</th>--}}
                                    <th class="d-none d-sm-table-cell text-center" style="width: 10%;">NO°</th>
                                    <th class="d-none d-sm-table-cell text-center">Nom du Client</th>
                                    <th class="d-none d-sm-table-cell text-center">Date de Facture</th>
                                    <th class="d-none d-sm-table-cell text-center">Nombre de Pieces</th>
                                    <th class="d-none d-sm-table-cell text-center">Montant Total</th>
                                    <th class="d-none d-sm-table-cell text-center">Status</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="d-none d-sm-table-cell text-center">Test</td>
                                    <td class="d-none d-sm-table-cell text-center">Test</td>
                                    <td class="d-none d-sm-table-cell text-center">Test</td>
                                    <td class="d-none d-sm-table-cell text-center">Test</td>
                                    <td class="d-none d-sm-table-cell text-center">Test</td>
                                    <td class="d-none d-sm-table-cell text-center">Test</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END Latest Orders -->
            </div>
            <!-- END Latest Orders and Top Products -->
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
</body>
</html>



