<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <title>Codebase - Bootstrap 4 Admin Template &amp; UI Framework</title>

    <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="assets/img/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon-180x180.png">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/codebase.min.css')}}">

{{--    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">--}}

    {{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />--}}
    {{--<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>--}}
    {{--<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>--}}


    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <!-- END Stylesheets -->
</head>
<body>
    <main id="main-container">
        <div class="content">
            <div class="block">
                <div class="block-content block-content-full">
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

            <button type="button" class="btn-block-option" onclick="Codebase.helpers('print-page');">
                <i class="si si-printer"></i> Print Invoice
            </button>
        </div>
    </main>
    <!-- END Main Container -->
    <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
    {{--<script src="{{asset('assets/js/core/popper.min.js')}}"></script>--}}
    {{--<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>--}}
    {{--<script src="{{asset('assets/js/core/jquery.slimscroll.min.js')}}"></script>--}}
    {{--<script src="{{asset('assets/js/core/jquery.scrollLock.min.js')}}"></script>--}}
    {{--<script src="{{asset('assets/js/core/jquery.appear.min.js')}}"></script>--}}
    {{--<script src="{{asset('assets/js/core/jquery.countTo.min.js')}}"></script>--}}
    {{--<script src="{{asset('assets/js/core/js.cookie.min.js')}}"></script>--}}
    {{--<script src="{{asset('assets/js/codebase.js')}}"></script>--}}



    {{--<!-- Page JS Plugins -->--}}
    <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script type="text/javascript">
        $(function () {
//            $.ajax({
//                url: "http://127.0.0.1:8000/statistics/datatableCommandes",
//                type:"GET",
//                dataType:'json',
//                success: function(data) {
//                    console.log(data);
//                    var html ="";
//                    for(var i =0 ;i<data.commandes.length;i++){
//                        html+="<tr>\n" +
//                            "                            <td class=\"text-center\" style=\"width: 10%;\">"+data.commandes[i].commande_num+"</td>\n" +
//                            "                            <td class=\"d-none d-sm-table-cell text-center\" style=\"width: 10%;\">"+data.commandes[i].id_client+"</td>\n" +
//                            "                            <td class=\"d-none d-sm-table-cell text-center\">"+data.commandes[i].commande_quantity+"</td>\n" +
//                            "                            <td class=\"d-none d-sm-table-cell text-center\">"+data.commandes[i].commande_montant+"</td>\n" +
//                            "                            <td class=\"d-none d-sm-table-cell text-center\">"+data.commandes[i].commande_date+"</td>\n" +
//                            "                            <td class=\"d-none d-sm-table-cell text-center\">"+data.commandes[i].commande_paid+"</td>\n" +
//                            "                            <td class=\"d-none d-sm-table-cell text-center\">"+data.commandes[i].commande_date_retrait+"</td>\n" +
//                            "                        </tr>";
//                    }
////                  html +="</tbody>";
//
//                  $('#my-table tbody').html(html);
//                },
//                error: function(data){
//                    alert('no');
//
//                }
//            });


                $('#my-table').DataTable({
                    iDisplayLength: 100,
                    processing: true,
                    serverSide: true,
                    ajax: '{{ url('/statistics/datatableCommandes') }}',
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

                {{--jQuery('#my-table').dataTable({--}}
                    {{--columnDefs: [],--}}
                    {{--pageLength: 5,--}}
                    {{--lengthMenu: [[5, 8, 15, 20], [5, 8, 15, 20]],--}}
                    {{--autoWidth: false,--}}
                    {{--processing: true,--}}
                    {{--serverSide: true,--}}
                    {{--searching: true,--}}
                    {{--ordering: true,--}}
{{--//                    ajax: "/statistics/datatableCommandes",--}}
                    {{--ajax: "{{route('getdata')}}",--}}
{{--//                    ajax:{--}}
{{--//                        url: "http://127.0.0.1:8000/statistics/datatableCommandes",--}}
{{--//                        type:"GET",--}}
{{--//                        dataType:'json',--}}
{{--//                        success: function(data) {--}}
{{--//                            alert('yes');--}}
{{--//                        }--}}
{{--//                    },--}}
                    {{--columns: [--}}
                        {{--{data: 'commande_num', name: 'commande_num'},--}}
                        {{--{data: 'id_client', name: 'id_client'},--}}
                        {{--{data: 'commande_quantity', name: 'commande_quantity'},--}}
                        {{--{data: 'commande_montant', name: 'commande_montant'},--}}
                        {{--{data: 'commande_date', name: 'commande_date'},--}}
                        {{--{data: 'commande_date_retrait', name: 'commande_date_retrait'},--}}
                        {{--{data: 'commande_paid', name: 'commande_paid'}--}}
                    {{--]--}}
                {{--});--}}
        });
        //    , orderable: true, searchable:true
    </script>
<!-- END Page Container -->

<!-- Codebase Core JS -->
{{----}}
</body>
</html>