@extends('main')

@section('page_style')

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.css')}}">

    <style type="text/css">
        .btn{
            padding: 0 8px;
        }
        th {
            text-transform: none !important;
            font-size: 13px;
        }

        .badge {
            padding: 5px 10px 5px 10px;
        }

        .modal {
            text-align: center;
            padding: 0!important;
        }

        .modal:before {
            content: '';
            display: inline-block;
            height: 100%;
            vertical-align: middle;
            margin-right: -4px;
        }

        .modal-dialog {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
        }
    </style>
@endsection

@section('page_title')
    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Les Commandes Non Valide</h1>
@endsection

@section('content')
    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Tous Les Commandes</h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-responsive table-striped table-vcenter js-dataTable-full mytable">
                <thead>
                <tr>
                    {{--<th class="text-center" style="width: 10%;">ID</th>--}}
                    <th class="text-center" style="width: 10%;">NO°</th>
                    <th class="d-none d-sm-table-cell">Nom du Client</th>
                    {{--<th class="text-center">Telephone du Client</th>--}}
                    <th class="text-center">Date de Facture</th>
                    <th class="text-center">Date de Retrait</th>
                    <th class="text-center">Nombre de Pieces</th>
                    <th class="text-center">Montant Total</th>
                    <th class="text-center">Payer</th>
                    <th class="text-center" style="width: 15%;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($factures as $facture)
                    <tr>
                        <td class="font-w600 text-center ">{{$facture->commande_num}}</td>
                        <td class="font-w600 text-center">{{$facture->client_name}}</td>
                        {{--<td class="font-w600 text-center">{{$facture->client_tele}}</td>--}}
                        <td class="font-w600 text-center">{{date("d-m-Y",strtotime($facture->commande_date))}}</td>
                        <td class="font-w600 text-center">{{date("d-m-Y",strtotime($facture->commande_date_retrait))}}</td>
                        <td class="font-w600 text-center">{{$facture->commande_quantity}}</td>
                        <td class="font-w600 text-center">{{$facture->commande_montant}}DH (TTC)</td>
                        <td class="font-w600 text-center">
                            @if($facture->commande_paid=='oui')
                                <span class="badge badge-success">Oui</span>
                            @else
                                <span class="badge badge-danger">No</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="/commandes/{{$facture->id_commande}}">
                                    <button type="button" class="btn btn-sm btn-table btn-alt-primary" data-toggle="tooltip" title="Edit"
                                            data-id="{{$facture->id_commande}}">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </a>
                                <form action="/commandes/{{$facture->id_commande}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button type="button" class="btn btn-sm btn-table btn-alt-success btn-delete" data-toggle="tooltip" title="Valider"
                                            data-id="{{$facture->id_commande}}">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </form>
                                <span data-toggle="tooltip" title="Impression">
                                    <button type="button" class="btn btn-sm btn-table btn-alt-warning"  data-toggle="modal"
                                            data-target="#modal-normal"
                                            data-id="{{$facture->id_commande}}">
                                        <i class="fa fa-upload" ></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    {{--Impression--}}
    <div class="modal" id="modal-normal"  tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Impression</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12 ">
                                <button type="button" class="btn btn-alt-info mr-5 mb-5">
                                    Ticket <i class="fa fa-print"></i>
                                </button>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <button type="button" class="btn btn-alt-info mr-5 mb-5" >
                                    Code Bar <i class="fa fa-barcode"></i>
                                </button>
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <button type="button" class="btn btn-alt-info mr-5 mb-5" onclick="Codebase.helpers('print-page');">
                                    Facture <i class="fa fa-print"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        Pressing 2018
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page_script')
    <!-- Page JS Plugins -->
{{--    <script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>--}}
    <script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-validation/additional-methods.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{asset('assets/js/pages/be_tables_datatables.js')}}"></script>
    <script src="{{asset('assets/js/pages/commande_delete.js')}}"></script>

    <!-- sweetalert2-->
    <script src="{{asset('assets/js/plugins/sweetalert2/es6-promise.auto.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>


@endsection


