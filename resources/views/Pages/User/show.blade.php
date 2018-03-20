@extends('Pages.main')

@section('page_style')
    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <style type="text/css">
        th{
            font-size: 10px;
        }
        .btn-edit{
            color: #fff;
            background-color: #00acfc;
            border-color: #00acfc;
            padding: 0px 8px;
        }
        .btn-delete{
            color: #fff;
            background-color: #fb5953;
            border-color: #fb5953;
            padding: 0px 8px;
        }
        .upload-btn-wrapper input[type=file] {
            font-size: 20px;
            position: absolute;
            left: 0;
            bottom: 0;
            opacity: 0;
            cursor: pointer;
        }
        .btn-block-option{
            cursor: pointer;
        }

        /*.error-lbl-color,.error-lbl2-color{*/
            /*color: #ef5350;*/
        /*}*/
        /*.error-border-color,.error-border2-color{*/
            /*border-bottom: 1px solid #ef5350;*/
        /*}*/
        .optionnel{
            font-size: 11px;
        }
        .browse {
            background-color: #dcdfe3;
        }
        .browse:hover {
            background-color: #ebeef2;
        }

    </style>
    <link rel="stylesheet" href="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.css')}}">
@endsection

@section('content')
<!-- All Users -->
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title"><i class="fa fa-fw fa-users font-size-default mr-5"></i> Tous Les Clients</h3>
        <button type="button" class="btn btn-alt-info ml-auto" data-toggle="modal" data-target="#modal-large">Ajouter Un Utilisateur</button>
    </div>
    <div class="block-content block-content-full">
        <table class="table table-bordered table-responsive table-striped table-vcenter js-dataTable-full mytable">
            <thead>
            <tr>
                <th class="text-center" style="width: 5%;">ID</th>
                <th class="d-none d-sm-table-cell" style="width: 5%;">Photo</th>
                <th class="d-none d-sm-table-cell" style="width: 15%;">Nom Complete</th>
                <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Adresse</th>
                <th class="d-none d-sm-table-cell" style="width: 10%;">Telephone</th>
                <th class="d-none d-sm-table-cell" style="width: 10%;">Nom de l'Utilisateur</th>
                <th class="d-none d-sm-table-cell"  style="width: 20%;" >Email</th>
                <th class="text-center" style="width: 5%;">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="mycells">
                    <td class="text-center">{{$user->id}}</td>
                    <td class="text-center picture"><img class="img-avatar img-avatar32" src="{{asset($user->picture)}}" alt="{{$user->fullname}}" ></td>
                    <td class="font-w400 fullname">{{$user->fullname}}</td>
                    <td class="d-none d-sm-table-cell text-center adresse">{{$user->adresse}}</td>
                    <td class="d-none d-sm-table-cell text-center tele">{{$user->tele}}</td>
                    <td class="font-w400 username">{{$user->username}}</td>
                    <td class="font-w400 email">{{$user->email}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-edit" data-toggle="modal" data-id="{{$user->id}}" title="Edit" data-target="#modal-fromright">
                                <i class="fa fa-pencil"></i>
                            </button>
                            @if($user->id!=1)
                                <button type="button" data-id="{{$user->id}}" class="js-swal-confirm btn btn-sm btn-delete">
                                    <i class="fa fa-times"></i>
                                </button>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- End All Users -->

<!-- Add Users -->
<div class="block">
    <div class="modal" id="modal-large" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form class="add-user-form" action="/users" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Ajouter Nouvel Utilisateur</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="fullname" name="fullname" value="{{old('fullname')}}">
                                        <label for="fullname">Nom - Prenom <span style="color: red">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="adresse" name="adresse" value="{{old('adresse')}}">
                                        <label for="adresse">Adresse personnel <span class="optionnel">(optionnel)</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="tele" name="tele" value="{{old('tele')}}">
                                        <label for="tele">Telephone <span class="optionnel">(optionnel)</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group username-group">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text" id="username" name="username" value="{{old('username')}}">
                                        <label for="username" id="username-lbl">Nom d'Utilisateur <span style="color: red">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group email-group">
                                    <div class="form-material floating">
                                        <input class="form-control" type="text"  id="email" name="email" value="{{old('email')}}">
                                        <label for="email" id="email-lbl">Adresse Email <span style="color: red">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-material floating">
                                        <input class="form-control" type="password" id="password" name="password">
                                        <label for="password">Mot de pass<span style="color: red">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-material floating">
                                        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
                                        <label for="password_confirmation">Confirme le mot de pass<span style="color: red">*</span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <label for="permission">Permissions<span style="font-size: 11px;">(optionnel)</span></label>
                                    <select name="permission"  class="form-control" id="permission">
                                        <option value=""></option>
                                        <option value="admin">Admin</option>
                                        <option value="">Gestion Users</option>
                                        <option value="">Gestion Du Commandes</option>
                                        <option value="">Gestion Du Services</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="form-group row">
                                    <label class="">Photo de Profile</label>
                                    <div class="input-group">
                                        <label class="input-group-btn">
                                            <span class="btn browse">
                                                Browse&hellip; <input type="file" style="display: none;" class="picture" id="picture" name="picture">
                                            </span>
                                        </label>
                                        <input type="text" class="form-control filename"
                                               onfocus="this.blur()" style="background-color:#FFF !important" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-alt-success" type="submit" id="submit_btn" >
                            <i class="fa fa-check"></i> Ajouter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Large Modal -->
</div>
<!-- End Add Users Block -->

<!-- Edit Users -->
<div class="block">
    <div class="modal fade" id="modal-fromright" tabindex="-1" role="dialog" aria-labelledby="modal-fromright" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-fromright" role="document">
            <div class="modal-content">
                <form class="edit-user-form"  method="POST" enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Edit l'utilisateur</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content row">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="form-group row">
                                <div class="col-4"><img class="profile"  width="80px" style="border-radius: 100px;" alt="No Image"></div>
                                <div class="col-8">
                                    <label class="">Changer la Photo de Profile</label>
                                    <div class="input-group">
                                        <label class="input-group-btn">
                                            <span class="btn browse">
                                                Browse&hellip; <input type="file" style="display: none;" class="picture" id="picture" name="picture">
                                            </span>
                                        </label>
                                        <input type="text" class="form-control filename"
                                               onfocus="this.blur()" style="background-color:#FFF !important" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="fullname" name="fullname" value="{{old('fullname')}}">
                                    <label for="fullname">Nom - Prenom <span style="color: red">*</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="adresse" name="adresse" value="{{old('adresse')}}">
                                    <label for="adresse">Adresse personnel <span class="optionnel">(optionnel)</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="tele" name="tele" value="{{old('tele')}}">
                                    <label for="tele">Telephone <span class="optionnel">(optionnel)</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group username-group">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="username-edit" name="username" value="{{old('username')}}">
                                    <label for="username" id="username-lbl">Nom d'Utilisateur <span style="color: red">*</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group email-group">
                                <div class="form-material">
                                    <input class="form-control" type="text"  id="email-edit" name="email" value="{{old('email')}}">
                                    <label for="email" id="email-lbl">Adresse Email <span style="color: red">*</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="form-material">
                                    <input class="form-control" type="password" id="password-edit" name="password">
                                    <label for="password">Mot de pass<span style="color: red">*</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="form-material">
                                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
                                    <label for="password_confirmation">Confirme le mot de pass<span style="color: red">*</span></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label for="permission">Permissions<span style="font-size: 11px;">(optionnel)</span></label>
                                <select name="permission"  class="form-control" id="permission">
                                    <option value=""></option>
                                    <option value="admin">Admin</option>
                                    <option value="">Gestion Users</option>
                                    <option value="">Gestion Du Commandes</option>
                                    <option value="">Gestion Du Services</option>
                                </select>
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
    <script src="{{('assets/js/pages/users_validation.js')}}"></script>

    <script src="{{asset('assets/js/plugins/sweetalert2/es6-promise.auto.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/users_delete.js')}}"></script>
    <script>
        jQuery(function () {
            // Init page helpers (BS Notify Plugin)
            Codebase.helpers('notify');
        });
    </script>
@endsection


