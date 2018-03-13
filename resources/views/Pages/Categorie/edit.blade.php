@extends('Pages.main')

@section('page_style')
    <style>
        .btn{
            margin: 1px;
        }
    </style>

@endsection

@section('content')


<!-- Bootstrap Forms Validation -->
{{--<h2 class="content-heading">Bootstrap Forms</h2>--}}
<div class="block">
    <div class="row">
        <div class="col-md-12">
            <div class="block-header block-header-default col-md-12">
                <h3 class="block-title">Modifie La Categorie</h3>
            </div>
            <div class="block-content">
                <div class="row justify-content-center py-20">
                    <div class="col-xl-12 col-md-6">
                        <!-- jQuery Validation (.js-validation-bootstrap class is initialized in js/pages/be_forms_validation.js) -->
                        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form class="js-validation-bootstrap" action="/categories/{{$categorie->id_categorie}}" method="post">
                            {{ method_field('PUT') }}
                            {{csrf_field()}}
                            <div class="form-group col-md-12">
                                <div class="row">
                                    <label class="col-md-2 col-sm-12 col-form-label" for="categorie_name">Nom du Categorie <span class="text-danger">*</span></label>
                                    <div class="col-md-6 col-sm-12 ">
                                        <input type="text" class="form-control" id="categorie_name" name="categorie_name" required placeholder="Enter le de categorie.." value="{{$categorie->categorie_name}}">
                                    </div>
                                    <div class="col-md-3 col-sm-12 input-group">
                                        <button type="submit" class="btn btn-alt-primary" data-toggle="tooltip" title="Modifier">Modifier</button>
                                        <a href="/categories"><button type="button" title="Annuler" data-toggle="tooltip" class="btn btn-alt-default">Annuler</button></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="form-group col-md-12">
                             <label><span class="text-danger">*</span> : Champ Obligatoire</label>
                        </div>
                    </div>
                </div>

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


