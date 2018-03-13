@extends('Pages.main')

@section('page_style')
    <style>
        .btn-edit{
            color: #fff;
            background-color: #00acfc;
            border-color: #00acfc;
        }
        .btn-delete{
            color: #fff;
            background-color: #fb5953;
            border-color: #fb5953;
        }
    </style>

@endsection

@section('content')

    <!-- Bootstrap Forms Validation -->
    {{--<h2 class="content-heading">Bootstrap Forms</h2>--}}
    <div class="block">
        <div class="row">
            <div class="col-md-6">
                <div class="block-header block-header-default col-md-12">
                    <h3 class="block-title">Créer Nouveau Categorie</h3>
                </div>
                <div class="block-content">
                    <div class="row justify-content-center py-20">
                        <div class="col-xl-12 col-md-12">
                            <!-- jQuery Validation (.js-validation-bootstrap class is initialized in js/pages/be_forms_validation.js) -->
                            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-bootstrap" action="/categories" method="post">
                                {{csrf_field()}}

                                <div class="col-md-12 col-md-offset-6">
                                    <div class="row">
                                        {{--<div class="block-header block-header-default col-md-12 col-md-12" style="margin-bottom: 10px;">--}}
                                            {{--<h3 class="block-title">Categorie</h3>--}}
                                        {{--</div>--}}
                                        <div class="form-group col-md-12">
                                            <div class="row">
                                                <label class="col-md-4 col-sm-12 col-form-label" for="nom">Nom du Categorie <span class="text-danger">*</span></label>
                                                <div class="col-md-6 col-sm-12 ">
                                                    <input type="text" class="form-control" id="categorie_name" name="categorie_name" placeholder="Entez le nom du categorie" required>
                                                </div>
                                                <div class="col-md-2 col-sm-12 ">
                                                    <button type="submit" class="btn btn-alt-primary">Ajouter</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="form-group col-md-12">
                                <span class="text-danger">*</span> <label class="col-lg-4 col-form-label" for="date"> : Champ Obligatoire</label>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Tous Les Categories</h3>
                </div>
                <div class="block-content">
                    <table class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 10%;">ID</th>
                            <th>Nom Categorie</th>
                            <th class="text-center" style="width: 20%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $categorie)
                        <tr>
                            <td class="text-center">
                                {{$categorie->id_categorie}}
                            </td>
                            <td class="font-w600">{{$categorie->categorie_name}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="/categories/{{$categorie->id_categorie}}">
                                        <button type="button" class="btn btn-sm btn-edit" data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </a>
                                    <form action="/categories/{{$categorie->id_categorie}}" method="post">
                                        {{ method_field('DELETE') }}
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-sm btn-delete" data-toggle="tooltip" title="Delete">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- Bootstrap Forms Validation -->

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


