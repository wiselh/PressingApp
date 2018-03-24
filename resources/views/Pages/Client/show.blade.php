@extends('Pages.main')

@section('page_style')

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.css')}}">

    <style type="text/css">
        .btn-edit {
            color: #fff;
            background-color: #00acfc;
            border-color: #00acfc;
            padding: 0 8px;
        }

        .btn-delete {
            color: #fff;
            background-color: #fb5953;
            border-color: #fb5953;
            padding: 0 8px;
        }
    </style>

@endsection

@section('content')

    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Tous Les Clients</h3>
        </div>
        <div class="block-content block-content-full">
            <table class="js-table-checkable js-dataTable-full table table-hover table-responsive">
                <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">
                        <label class="css-control css-control-primary css-checkbox py-0">
                            <input type="checkbox" class="css-control-input" id="check-all" name="check-all">
                            <span class="css-control-indicator"></span>
                        </label>
                    </th>
                    <th class="text-center">Nom</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Telephone</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 40%;">Adresse</th>
                    <th class="d-none d-sm-table-cell text-center" style="width: 50px;">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr class="client_row">
                        <td class="text-center">
                            <label class="css-control css-control-primary css-checkbox">
                                <input type="checkbox" class="css-control-input" id="checkbox_delete" name="checkbox_delete"
                                       data-id="{{$client->id_client}}">
                                <span class="css-control-indicator"></span>
                            </label>
                        </td>
                        <td class="text-center">
                            <p class="font-w600 mb-10">{{$client->client_name}}</p>
                        </td>
                        <td class="d-none d-sm-table-cell text-center">
                            {{$client->client_tele}}
                        </td>
                        <td class="d-none d-sm-table-cell text-center">
                            <em class="text-muted">{{$client->client_adresse}}</em>
                        </td>
                        <td class="d-none d-sm-table-cell text-center">
                            <div class="input-group">
                                <span data-toggle="tooltip" title="Modifier">
                                    <button type="button" class="btn btn-sm btn-alt-primary" style="padding: 0 8px" data-toggle="modal"
                                            data-id="{{$client->id_client}}"
                                            data-name="{{$client->client_name}}"
                                            data-tele="{{$client->client_tele}}"
                                            data-adresse="{{$client->client_adresse}}"
                                            data-target="#modal-fromright">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </span>
                                <button type="button" data-id="{{$client->id_client}}" style="padding: 0 8px" class="btn btn-sm btn-alt-danger">
                                    <i class="fa fa-times"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td>
                        <button style="padding: 0 8px;" class="delete_checked btn btn-alt-danger bt-sm" type="button">Delete</button>
                    </td>
                </tr>
                </tfoot>
            </table>
            <script>
                jQuery(function () {
                    // Init page helpers (Table Tools helper)
                    Codebase.helpers('table-tools');
                });
            </script>
        </div>
    </div>
    <!-- END Table  -->

    <!-- Edit Users -->
    <div class="block">
        <div class="modal fade" id="modal-fromright" tabindex="-1" role="dialog" aria-labelledby="modal-fromright"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-fromright" role="document">
                <div class="modal-content">
                    <form class="edit-client-form" method="POST">
                        {{ method_field('PUT') }}
                        {{csrf_field()}}
                        <div class="block block-themed block-transparent mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Edit Client</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-dismiss="modal"
                                            aria-label="Close">
                                        <i class="si si-close"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="form-material">
                                            <input class="form-control" type="text" id="fullname" name="fullname"
                                                   value="{{old('fullname')}}">
                                            <label for="fullname">Nom et Prenom <span
                                                        style="color: red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="form-material">
                                            <input class="form-control" type="text" id="adresse" name="adresse"
                                                   value="{{old('adresse')}}">
                                            <label for="adresse">Adresse personnel <span
                                                        class="optionnel">(optionnel)</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="form-material">
                                            <input class="form-control" type="text" id="tele" name="tele"
                                                   value="{{old('tele')}}">
                                            <label for="tele">Telephone <span
                                                        class="optionnel">(optionnel)</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-alt-success">
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
    <script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-validation/additional-methods.min.js')}}"></script>

    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{asset('assets/js/pages/be_tables_datatables.js')}}"></script>

    <script src="{{asset('assets/js/plugins/sweetalert2/es6-promise.auto.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>

    <script src="{{asset('assets/js/pages/clients_delete.js')}}"></script>
    <script src="{{asset('assets/js/pages/clients_validation.js')}}"></script>

@endsection


