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
    <link rel="stylesheet" href="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.css')}}">

@endsection

@section('content')

    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Tous Les Clients</h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter js-dataTable-full mytable">
                <thead>
                <tr>
                    <th class="text-center" style="width: 10%;">ID</th>
                    <th class="d-none d-sm-table-cell">Nom</th>
                    <th class="text-center">Adresse</th>
                    <th class="d-none d-sm-table-cell" style="width: 20%;">Telephone</th>
                    <th class="text-center" style="width: 15%;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                <tr class="clients">
                    <td class="text-center">{{$client->id_client}}</td>
                    <td class="font-w600">{{$client->client_name}}</td>
                    <td class="d-none d-sm-table-cell text-center">
                        @if($client->client_adresse=='')
                            -
                            @else
                            {{$client->client_adresse}}
                        @endif
                    </td>
                    <td class="d-none d-sm-table-cell text-center">
                        @if($client->client_tele=='')
                            -
                        @else
                            {{$client->client_tele}}
                        @endif
                    </td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-edit" data-toggle="modal"
                                    data-id="{{$client->id_client}}"
                                    data-name="{{$client->client_name}}"
                                    data-tele="{{$client->client_tele}}"
                                    data-adresse="{{$client->client_adresse}}" title="Edit" data-target="#modal-fromright">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button type="button" data-id="{{$client->id_client}}" class="btn btn-sm btn-delete">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full -->

    <!-- Edit Users -->
    <div class="block">
        <div class="modal fade" id="modal-fromright" tabindex="-1" role="dialog" aria-labelledby="modal-fromright" aria-hidden="true">
            <div class="modal-dialog  modal-dialog-fromright" role="document">
                <div class="modal-content">
                    <form class="edit-client-form" action="/clients" method="POST">
                        {{ method_field('PUT') }}
                        {{csrf_field()}}
                        <div class="block block-themed block-transparent mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Edit Client</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                        <i class="si si-close"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="form-material">
                                            <input class="form-control" type="text" id="fullname" name="fullname" value="{{old('fullname')}}">
                                            <label for="fullname">Nom et Prenom <span style="color: red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="form-material">
                                            <input class="form-control" type="text" id="adresse" name="adresse" value="{{old('adresse')}}">
                                            <label for="adresse">Adresse personnel <span class="optionnel">(optionnel)</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="form-material">
                                            <input class="form-control" type="text" id="tele" name="tele" value="{{old('tele')}}">
                                            <label for="tele">Telephone <span class="optionnel">(optionnel)</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-alt-success" id="add" >
                                <i class="fa fa-check"></i> Enregister
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Edit User Block -->
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

    <script src="{{asset('assets/js/plugins/sweetalert2/es6-promise.auto.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/clients_delete.js')}}"></script>
    <script src="{{('assets/js/pages/clients_validation.js')}}"></script>

@endsection


