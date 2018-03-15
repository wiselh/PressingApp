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

    <div class="block" style="padding: 10px">
        <div class="row">
            <div class="col-md-6">
                <div class="block-header block-header-default col-md-12">
                    <h3 class="block-title">Créer Nouveau Service</h3>
                </div>
                <div class="block-content">
                    <div class="row justify-content-center py-20">
                        <div class="col-xl-12 col-md-12">
                            <!-- jQuery Validation (.js-validation-bootstrap class is initialized in js/pages/be_forms_validation.js) -->
                            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <form class="js-validation-bootstrap" action="/services" method="post">
                                {{csrf_field()}}

                                <div class="col-md-12 col-md-offset-6">
                                    <div class="row">
                                        {{--<div class="block-header block-header-default col-md-12 col-md-12" style="margin-bottom: 10px;">--}}
                                            {{--<h3 class="block-title">Categorie</h3>--}}
                                        {{--</div>--}}
                                        <div class="form-group col-md-12">
                                            <div class="row">
                                                <label class="col-md-4 col-sm-12 col-form-label" for="service_name">Nom du Service <span class="text-danger">*</span></label>
                                                <div class="col-md-6 col-sm-12 ">
                                                    <input type="text" class="form-control" id="service_name" name="service_name" placeholder="Entez le nom du categorie" required>
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
                    <h3 class="block-title">Tous Les Services</h3>
                </div>
                <div class="block-content">
                    <table class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 10%;">ID</th>
                            <th>Nom du Service</th>
                            <th class="text-center" style="width: 20%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $service)
                        <tr>
                            <td class="text-center">
                                {{$service->id_service}}
                            </td>
                            <td class="font-w600">{{$service->service_name}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-edit" data-toggle="modal" data-target="#modal-fromright"
                                            data-name="{{$service->service_name}}" data-id="{{$service->id_service}}">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <form action="/services/{{$service->id_service}}" method="post">
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
        <!-- From Right Modal -->
        <div class="modal fade" id="modal-fromright" tabindex="-1" role="dialog" aria-labelledby="modal-fromright" aria-hidden="true">
            <div class="modal-dialog modal-dialog-fromright" role="document">
                <div class="modal-content">
                    <form class="js-validation-bootstrap" method="post">
                        <div class="block block-themed block-transparent mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Edit le Service</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                        <i class="si si-close"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                {{ method_field('PUT') }}
                                {{csrf_field()}}
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <label class="col-md-6 col-sm-12 col-form-label" for="categorie_name">Nom du Categorie <span class="text-danger">*</span></label>
                                        <div class="col-md-6 col-sm-12 ">
                                            <input type="text" class="form-control" id="service_name" name="service_name" required placeholder="Enter le nom du service.." >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label><span class="text-danger">*</span> : Champ Obligatoire</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-alt-success">
                                <i class="fa fa-check"></i> Enregister
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END From Right Modal -->
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

    <script type="text/javascript">
        $(function () {
            $('.btn-edit').click(function () {
                var IdServ = $(this).data('id');
                var NameServ = $(this).data('name');
                $(".js-validation-bootstrap #service_name").val(NameServ);
                $(".js-validation-bootstrap ").attr("action", "/services/"+IdServ);
            })
        });
    </script>
@endsection


