@extends('main')

@section('page_style')
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.css')}}">

    <style type="text/css">
        th{
            font-size: 10px;
        }
        .btn-table{
            padding: 0 8px;
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
        .optionnel{
            font-size: 11px;
        }
        .browse {
            background-color: #dcdfe3;
        }
        .browse:hover {
            background-color: #ebeef2;
        }
        .add-permissions-content table td, .add-permissions-content .table th {
            padding: 5px;
        }
        .edit-permissions-content table td, .edit-permissions-content .table th {
            padding: 5px;
        }
        /*.add-permissions-content table,.edit-permissions-content table{*/
            /*border-left: 1px solid #eaecee;*/
            /*border-right: 1px solid #eaecee;*/
            /*border-bottom: 1px solid #eaecee;*/
        /*}*/

    </style>
@endsection
@section('page_title')
    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Utilisateurs</h1>
@endsection
@section('content')
<!-- All Users -->
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title"><i class="fa fa-fw fa-users font-size-default mr-5"></i>Tous Les Clients</h3>
        <button type="button" class="btn btn-alt-default ml-auto" data-toggle="modal" data-target="#modal-large">Ajouter un Utilisateur</button>
    </div>
    <div class="block-content block-content-full">
        <div class="table-responsive">
            <table class="table table-hover js-dataTable-full mytable">
            <thead style="color: #fff;background-color: #212529;border-color: #32383e;">
            <tr>
                <th class="d-none d-sm-table-cell text-center" style="width: 5%;">Photo</th>
                <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Nom Complete</th>
                <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Adresse</th>
                <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Telephone</th>
                <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Nom de l'Utilisateur</th>
                <th class="d-none d-sm-table-cell text-center"  style="width: 20%;" >Email</th>
                <th class="text-center" style="width: 5%;">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="mycells">
                    <td class="text-center picture"><img class="img-avatar img-avatar32" src="{{asset($user->picture)}}" alt="{{$user->fullname}}" ></td>
                    <td class="font-w400 text-center fullname">{{$user->fullname}}</td>
                    <td class="d-none d-sm-table-cell text-center adresse">{{$user->adresse}}</td>
                    <td class="d-none d-sm-table-cell text-center tele">{{$user->tele}}</td>
                    <td class="font-w400 text-center username">{{$user->username}}</td>
                    <td class="font-w400 text-center email">{{$user->email}}</td>
                    <td class="text-center">
                        <div class="btn-group">
                            @if($user->id!=1)
                                <button type="button" class="btn btn-sm btn-alt-primary btn-table" data-toggle="modal" data-id="{{$user->id}}" title="Edit" data-target="#modal-fromright">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <button type="button" data-id="{{$user->id}}" class="js-swal-confirm btn-table btn btn-sm btn-alt-danger">
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
                        <div class="block-content">
                            <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active add-profile" href="#btabs-alt-static-profile">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link add-permissions" href="#btabs-alt-static-permission">Permissions</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active add-profile-content" id="btabs-alt-static-profile" role="tabpanel">
                                    <div class="row">
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
                                <div class="tab-pane add-permissions-content" id="btabs-alt-static-permission" role="tabpanel">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-vcenter">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Section</th>
                                                    <th class="text-center">Vue</th>
                                                    <th class="text-center">Ajouter</th>
                                                    <th class="text-center">Modifier</th>
                                                    <th class="text-center">Supprimer</th>
                                                </tr>
                                            </thead>
                                            <tbody class="add-user-block">
                                                <tr class="add-user-row">
                                                    <td class="font-w600">Utilisateurs</td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="user_per_view" value="1" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="user_per_add" value="2" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="user_per_update" value="3" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="user_per_delete" value="4" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr class="add-client-row">
                                                    <td class="font-w600">Clients</td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="client_per_view" value="5" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="client_per_add" value="6" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="client_per_update" value="7" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="client_per_delete" value="8" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr class="add-categorie-row">
                                                    <td class="font-w600">Categories</td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="categorie_per_view" value="9" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="categorie_per_add" value="10" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="categorie_per_update" value="11" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="categorie_per_delete" value="12" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr class="add-service-row">
                                                    <td class="font-w600">Services</td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="service_per_view" value="13" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="service_per_add" value="14" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="service_per_update" value="15" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="service_per_delete" value="16" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr class="add-commande-row">
                                                    <td class="font-w600">Commandes</td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="commande_per_view" value="17" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="commande_per_add" value="18" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="commande_per_update" value="19" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="commande_per_delete" value="20" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr class="add-societe-row">
                                                    <td class="font-w600">Societe</td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="societe_per_view" value="21" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td class="font-w600 text-center">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="societe_per_update" value="22" type="checkbox">
                                                            <span class="css-control-indicator"></span>
                                                        </label>
                                                    </td>
                                                    <td class="font-w600 text-center"></td>
                                                    <td class="font-w600 text-center"></td>
                                                </tr>
                                                <tr class="add-statistic-row">
                                                    <td class="font-w600">Statistics</td>
                                                    <td colspan="4" class="font-w600">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="client_per_view" value="23" type="checkbox">
                                                            <span class="css-control-indicator"></span>Voir les <b>Statistics</b>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr class="add-facture-row">
                                                    <td class="font-w600">Facture</td>
                                                    <td colspan="4" class="font-w600">
                                                        <label class="css-control css-control-success css-checkbox">
                                                            <input class="css-control-input" name="permission[]"
                                                                   id="facture_per_view" value="24" type="checkbox">
                                                            <span class="css-control-indicator"></span>Imprimer la <b>Facture</b>
                                                        </label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                            <button class="btn btn-alt-success" type="submit" id="submit_btn">
                                <i class="fa fa-check"></i> Ajouter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
                        <div class="block-content">
                            <ul class="nav nav-tabs nav-tabs-alt" data-toggle="tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active edit-profile" href="#btabs-alt-static-edit-profile">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link edit-permissions" href="#btabs-alt-static-edit-permission">Permissions</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active edit-profile-content" id="btabs-alt-static-edit-profile" role="tabpanel">
                                    <div class="row block-content" >
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <div class="form-group row">
                                                <div class="col-4"><img class="profile"  width="50px" height="50px" style="border-radius: 100px;" alt="No Image"></div>
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
                                    </div>
                                </div>
                                <div class="tab-pane add-permissions-content" id="btabs-alt-static-edit-permission" role="tabpanel">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-vcenter">
                                                <thead>
                                                    <tr>
                                                        <th>Section</th>
                                                        <th>Vue</th>
                                                        <th>Ajouter</th>
                                                        <th>Modifier</th>
                                                        <th>Supprimer</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="edit-user-block">
                                                    <tr class="edit-user-row">
                                                        <td class="font-w600">Utilisateurs</td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="user_per_view" value="1" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="user_per_add" value="2" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="user_per_update" value="3" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="user_per_delete" value="4" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="edit-client-row">
                                                        <td class="font-w600">Clients</td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="client_per_view" value="5" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="client_per_add" value="6" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="client_per_update" value="7" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="client_per_delete" value="8" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="edit-categorie-row">
                                                        <td class="font-w600">Categories</td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="categorie_per_view" value="9" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="categorie_per_add" value="10" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="categorie_per_update" value="11" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="categorie_per_delete" value="12" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="edit-service-row">
                                                        <td class="font-w600">Services</td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="service_per_view" value="13" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="service_per_add" value="14" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="service_per_update" value="15" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="service_per_delete" value="16" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="edit-commande-row">
                                                        <td class="font-w600">Commandes</td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="commande_per_view" value="17" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="commande_per_add" value="18" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="commande_per_update" value="19" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="commande_per_delete" value="20" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="edit-societe-row">
                                                        <td class="font-w600">Societe</td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="societe_per_view" value="21" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="societe_per_update" value="22" type="checkbox">
                                                                <span class="css-control-indicator"></span>
                                                            </label>
                                                        </td>
                                                        <td class="font-w600"></td>
                                                        <td class="font-w600"></td>
                                                    </tr>
                                                    <tr class="edit-statistic-row">
                                                        <td class="font-w600">Statistics</td>
                                                        <td colspan="4" class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="client_per_view" value="23" type="checkbox">
                                                                <span class="css-control-indicator"></span>Voir les statistics
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <tr class="edit-facture-row">
                                                        <td class="font-w600">Facture</td>
                                                        <td colspan="4" class="font-w600">
                                                            <label class="css-control css-control-success css-checkbox">
                                                                <input class="css-control-input" name="permission[]"
                                                                       id="facture_per_view" value="24" type="checkbox">
                                                                <span class="css-control-indicator"></span>Imprimer la facture
                                                            </label>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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
    <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{asset('assets/js/pages/be_tables_datatables.js')}}"></script>
    <script src="{{asset('assets/js/pages/users_validation.js')}}"></script>

    <script src="{{asset('assets/js/plugins/sweetalert2/es6-promise.auto.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/users_delete.js')}}"></script>
    <script type="text/javascript">
        $(function () {
            Codebase.helpers('notify');
        });
    </script>

@endsection


