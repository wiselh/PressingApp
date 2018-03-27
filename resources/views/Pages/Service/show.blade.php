@extends('main')

@section('page_style')
    <style>
        .btn-edit {
            color: #fff;
            background-color: #00acfc;
            border-color: #00acfc;
        }

        .btn-delete {
            color: #fff;
            background-color: #fb5953;
            border-color: #fb5953;
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.css')}}">
@endsection

@section('page_title')
    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Services</h1>
@endsection

@section('content')

    <div class="block" style="padding: 10px">
        <div class="row">
            <div class="col-md-6">
                <div class="block-header block-header-default col-md-12">
                    <h3 class="block-title">Créer Nouveau Service</h3>
                </div>
                <div class="block-content">
                    <div class="row justify-content-center py-20">
                        <div class="col-xl-12 col-md-12">
                            <form class="add-service-form" action="/services" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-12 col-form-label" for="service_name">Nom
                                            du Service <span class="text-danger">*</span></label>
                                        <div class="col-8">
                                            <input type="text" class="form-control" id="service_name"
                                                   name="service_name" placeholder="Entez le nom du service"
                                                   required>
                                        </div>
                                        <div class="col-4">
                                            <button type="submit" class="btn btn-alt-primary">Ajouter</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="form-group col-md-12">
                                <span class="text-danger">*</span> <label class="col-lg-4 col-form-label" for="date"> :
                                    Champ Obligatoire</label>
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
                            <th class="text-center" style="width: 10%;"></th>
                            <th>Nom du Service</th>
                            <th class="text-center" style="width: 20%">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1; ?>
                        @foreach($services as $service)
                            <tr>
                                <td class="text-center">
                                    {{$count}}
                                </td>
                                <td class="font-w600">{{$service->service_name}}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                    <span data-toggle="tooltip" title="Modifier">
                                        <button type="button" class="btn btn-sm btn-alt-primary" style="padding: 0 8px" data-toggle="modal"
                                                data-target="#modal-fromright"
                                                data-name="{{$service->service_name}}" data-id="{{$service->id_service}}">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </span>
                                    <form action="/services/{{$service->id_service}}" method="post">
                                        {{ method_field('DELETE') }}
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-sm btn-alt-danger" style="padding: 0 8px" data-toggle="tooltip"
                                                title="Delete">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>

                                    </div>
                                </td>
                            </tr>
                            <?php $count++; ?>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- From Right Modal -->
        <div class="modal fade" id="modal-fromright" tabindex="-1" role="dialog" aria-labelledby="modal-fromright"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-fromright" role="document">
                <div class="modal-content">
                    <form class="edit-service-form" method="post" action="/services">
                        {{ method_field('PUT') }}
                        {{csrf_field()}}
                        <div class="block block-themed block-transparent mb-0">
                            <div class="block-header bg-primary-dark">
                                <h3 class="block-title">Edit le Service</h3>
                                <div class="block-options">
                                    <button type="button" class="btn-block-option" data-dismiss="modal"
                                            aria-label="Close">
                                        <i class="si si-close"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="form-group col-md-12">
                                    <div class="row">
                                        <label class="col-md-6 col-sm-12 col-form-label" for="service_name">Nom du
                                            Categorie <span class="text-danger">*</span></label>
                                        <div class="col-md-6 col-sm-12 ">
                                            <input type="text" class="form-control" id="service_name"
                                                   name="service_name" required placeholder="Enter le nom du service..">
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

    <script type="text/javascript">
        $(function () {
            $('.btn-alt-primary').click(function () {
                var IdServ = $(this).data('id');
                var NameServ = $(this).data('name');
                $(".edit-service-form #service_name").val(NameServ);
                $(".edit-service-form").attr("action", "/services/" + IdServ);
            })
        });
        $('.btn-alt-danger').click(function () {
            swal('Succès', 'le service a été supprimé.!', 'success');
        });
    </script>
@endsection


