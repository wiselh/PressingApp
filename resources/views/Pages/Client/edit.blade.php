@extends('Pages.main')

@section('page_style')

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">
@endsection

@section('content')

    <!-- Dynamic Table Full -->
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Tous Les Clients</h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
            <form class="js-validation-bootstrap" action="/clients/{{$client->id_client}}" method="post">
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
                        {{ method_field('PUT') }}
                        {{csrf_field()}}
                        <tr>
                            <td class="text-center">{{$client->id_client}}</td>
                            <td class="text-center"><input type="text" class="form-control" id="nom" name="nom" placeholder="Enter le nom.." required  value="{{$client->client_name}}"></td>
                            <td class="d-none d-sm-table-cell text-center">
                                <textarea name="adresse" class="form-control">
                                        {{$client->client_adresse}}
                                </textarea>
                            </td>
                            <td class="text-center"><input type="text" class="form-control" id="tele" name="tele" placeholder="Enter le numero de telephone"  value="{{$client->client_tele}}"></td></td>
                            <td class="text-center">
                                <input type="submit" class="btn btn-success" value="Modifier">
                            </td>
                        </tr>

                </tbody>
            </table>
            </form>
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


