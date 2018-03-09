@extends('Pages.main')

@section('page_style')

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <style type="text/css">
        .btn{
            padding: 0px 8px;
        }
        th{
            text-transform: none !important;
            font-size: 13px;
        }
        .badge{
            padding: 5px 10px 5px 10px;
        }
    </style>
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
                    <th class="text-center" style="width: 10%;">Numero du Commande</th>
                    <th class="d-none d-sm-table-cell">Nom du Client</th>
                    <th class="text-center">Telephone du Client</th>
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
                    <td class="font-w600 text-center">{{$facture->client_tele}}</td>
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
                            <form action="/impression/{{$facture->id_commande}}" method="post">
                                {{ method_field('DELETE') }}
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-alt-danger mr-5 mb-5">
                                    <i class="fa fa-times mr-5"></i>Delete
                                </button>
                            </form>
                            <a href="/impression/{{$facture->id_commande}}">

                                <button type="button" class="btn btn-alt-info mr-5 mb-5">
                                    <i class="fa fa-upload mr-5"></i>Impression
                                </button>
                            </a>


                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full -->

@endsection

@section('page_script')
    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-validation/additional-methods.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{('assets/js/pages/be_tables_datatables.js')}}"></script>

@endsection


