@extends('Pages.main')

@section('page_style')

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <style type="text/css">
        .btn-secondary{
            padding: 0px 8px;
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
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full mytable">
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
{{--                    <td class="text-center">{{$facture->id_commande}}</td>--}}
                    <td class="text-center">{{$facture->num_commande}}</td>
                    <td class="font-w600">{{$facture->nom}}</td>
                    <td class="font-w600">{{$facture->tele}}</td>
                    <td class="font-w600">{{$facture->date_commande}}</td>
                    <td class="font-w600">{{$facture->date_retrait}}</td>
                    <td class="font-w600">{{$facture->quantity}}</td>
                    <td class="font-w600">{{$facture->montant_commande}}</td>
                    <td class="font-w600">{{$facture->paye_commande}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="/clients/{{$facture->id_client}}">
                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </button>
                            </a>
                            <form action="/clients/{{$facture->id_client}}" method="post">
                                {{ method_field('DELETE') }}
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                            <a href="/pdf/{{$facture->id_client}}" class="btn btn-default btn-sm">PDF</a>

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


