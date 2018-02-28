@extends('Pages.main')

@section('page_style')

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="assets/js/plugins/datatables/dataTables.bootstrap4.min.css">
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
                    <th class="text-center" style="width: 10%;">Numero du Commande</th>
                    <th class="d-none d-sm-table-cell">Nom Client</th>
                    <th class="text-center">Telephone</th>
                    <th class="text-center">Nombre de Pieces</th>
                    <th class="text-center">Payer</th>
                    <th class="text-center">Date de Facture</th>
                    <th class="text-center">Date de Retrait</th>
                    <th class="text-center" style="width: 15%;">Valider</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                <tr>
                    <td class="text-center">{{$client->id_client}}</td>
                    <td class="font-w600">{{$client->nom}}</td>
                    <td class="d-none d-sm-table-cell text-center">
                        @if($client->adresse=='')
                            -
                            @else
                            {{$client->adresse}}
                        @endif
                    </td>
                    <td class="d-none d-sm-table-cell text-center">
                        @if($client->tel=='')
                            -
                        @else
                            {{$client->tel}}
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="/clients/{{$client->id_client}}">
                                <button type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </button>
                            </a>
                            <form action="/clients/{{$client->id_client}}" method="post">
                                {{ method_field('DELETE') }}
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            </form>
                            <a href="/pdf/{{$client->id_client}}" class="btn btn-default btn-sm">PDF</a>

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


