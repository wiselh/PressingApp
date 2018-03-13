@extends('Pages.main')

@section('page_style')


@endsection

@section('content')

    <!-- Bootstrap Forms Validation -->
    {{--<h2 class="content-heading">Bootstrap Forms</h2>--}}

    <div class="block" style="padding: 10px">
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Pieces</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th>Categorie</th>
                                <th class="d-none d-sm-table-cell">Service</th>
                                <th class="d-none d-sm-table-cell">Description</th>
                                <th class="d-none d-sm-table-cell">Prix Unit (DH)</th>
                                <th class="d-none d-sm-table-cell">Quantity</th>
                                <th class="d-none d-sm-table-cell">Montant Total (DH TTC)</th>
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  $count = 1 ?>
                            @foreach($vetements as $vetement)
                            <tr>
                                <th class="text-center" scope="row">{{$count}}</th>
                                @foreach ($categories as $categorie)
                                    @if($categorie->id_categorie==$vetement->id_categorie)
                                        <td>{{$categorie->categorie_name}}</td>
                                    @endif
                                @endforeach
                                @foreach ($services as $service)
                                    @if($service->id_service==$vetement->id_service)
                                        <td>{{$service->service_name}}</td>
                                    @endif
                                @endforeach
                                <td>{{$vetement->vetement_description}}</td>
                                <td>{{$vetement->vetement_price}}</td>
                                <td>{{$vetement->vetement_quantity}}</td>
                                <td>{{$vetement->vetement_total}}</td>
                                {{--<td class="d-none d-sm-table-cell">--}}
                                    {{--<span class="badge badge-warning">Trial</span>--}}
                                {{--</td>--}}
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Delete">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php  $count++; ?>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
    @if ($errors->any())
        <div class="block pull-r-l" style="margin: 10px 0;">
            @else
                <div class="block pull-r-l block-mode-hidden" style="margin: 10px 0;">
                    @endif
                    <div class="block-header block-header-default ">
                        <h3 class="block-title" data-toggle="block-option" >
                            <i class="fa fa-fw fa-user font-size-default mr-5"></i>Ajouter une nouveau Piece
                        </h3>
                        <div class="block-options">
                            <button type="button" style="color: white" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="block-content block-content-full">
                            <div class="row justify-content-center py-20">
                                <div class="col-xl-12 col-md-12">
                                    <form class="add-user-form" action="/users" method="post">
                                        {{csrf_field()}}
                                        <div class="col-md-12 col-md-offset-6">
                                            <div class="row"><span style="color: red">* </span> : Champ obligatoire</div>
                                            <div class="row">
                                                <div class="form-group col-md-3 col-sm-12">
                                                    <div class="form-material floating">
                                                        <input class="form-control" type="text" id="user_fullname" name="user_fullname" value="{{old('user_fullname')}}">
                                                        <label for="user_fullname">Nom - Prenom <span style="color: red">*</span></label>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3 col-sm-12">
                                                    <div class="form-material floating">
                                                        <input class="form-control" type="text" id="user_adresse" name="user_adresse" value="{{old('user_adresse')}}">
                                                        <label for="user_adresse">Adresse personnel <span class="optionnel">(optionnel)</span></label>
                                                    </div>

                                                </div>
                                                <div class="form-group col-md-3 col-sm-12">
                                                    <div class="form-material floating">
                                                        <input class="form-control" type="text" id="user_tele" name="user_tele" value="{{old('user_tele')}}">
                                                        <label for="user_tele">Telephone <span class="optionnel">(optionnel)</span></label>
                                                    </div>
                                                </div>
                                                @if ($errors->has('username'))
                                                    <div class="form-group col-md-3 col-sm-12 username-group is-invalid">
                                                        @else
                                                            <div class="form-group col-md-3 col-sm-12 username-group">
                                                                @endif
                                                                <div class="form-material floating">
                                                                    <input class="form-control" type="text" id="username" name="username" value="{{old('username')}}">
                                                                    <label for="username" id="username-lbl">Nom d'Utilisateur <span style="color: red">*</span></label>
                                                                </div>
                                                                @if ($errors->has('username')&& $errors->first('username')!= '' )
                                                                    <div id="er_username-error" style="color: #ef5350" class="animated fadeInDown">
                                                                        {{ $errors->first('username') }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            @if ($errors->has('email'))
                                                                <div class="form-group col-md-3 col-sm-12 email-group is-invalid">
                                                                    @else
                                                                        <div class="form-group col-md-3 col-sm-12 email-group">
                                                                            @endif
                                                                            <div class="form-material floating">
                                                                                <input class="form-control" type="text"  id="email" name="email" value="{{old('email')}}">
                                                                                <label for="email" id="email-lbl">Adresse Email <span style="color: red">*</span></label>
                                                                            </div>
                                                                            @if ($errors->has('email'))
                                                                                <div id="user_email-error" style="color: #ef5350" class="animated fadeInDown">
                                                                                    {{ $errors->first('email') }}
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-group col-md-3 col-sm-12">
                                                                            <div class="form-material floating">
                                                                                <input class="form-control" type="text" id="user_password" name="user_password">
                                                                                <label for="user_password">Mot de pass<span style="color: red">*</span></label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-3 col-sm-12">
                                                                            <div class="form-material floating">
                                                                                <input class="form-control" type="text" id="user_confirm_password" name="user_confirm_password">
                                                                                <label for="user_confirm_password">Confirme le mot de pass<span style="color: red">*</span></label>
                                                                            </div>
                                                                        </div>
                                                                        {{--<div class="form-group col-md-3 col-sm-12">--}}
                                                                        {{--<div class="upload-btn-wrapper form-material">--}}
                                                                        {{--<button class="btn-upload" type="button">Uploader Photo de Profile</button>--}}
                                                                        {{--<input type="file" name="user_picture" id="user_picture" />--}}
                                                                        {{--</div>--}}
                                                                        {{--</div>--}}
                                                                        <div class="form-group col-md-3 col-sm-12">
                                                                            <label for="profile_picture">Photo de Profile <span style="font-size: 11px;">(optionnel)</span></label>
                                                                            <input type="file" id="user_picture" name="user_picture" style="display: none">
                                                                            <div class="col-md-12 text-center photo-user-profile">
                                            <span >
                                                <b id="photo-name-user">Click to upload</b>
                                            </span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-12 col-sm-12">
                                                                            <div class="form-material">
                                                                                <div class="block">
                                                                                    <h6 class="block-title">Administration Permission</h6>
                                                                                    <div class="block-content">
                                                                                        <div class="row no-gutters items-push">
                                                                                            <div class="col-1">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-6">
                                                                                                        <label class="css-control css-control-primary css-radio">
                                                                                                            <input class="css-control-input" name="user_permission" value="oui" type="radio">
                                                                                                            <span class="css-control-indicator"></span> Yes
                                                                                                        </label>
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <label class="css-control css-control-primary css-radio">
                                                                                                            <input class="css-control-input" name="user_permission" value="no" checked="" type="radio">
                                                                                                            <span class="css-control-indicator"></span> No
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-11 ">
                                                                                                <button class="btn btn-success btn-submit pull-right" type="submit">Submit</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <!-- Bootstrap Forms Validation -->
    {{--<div class="row " id="vetements">--}}
        {{--<div class="block-header sous-block-header-default header-block col-md-12">--}}
            {{--<h3 class="block-title">Vetement</h3>--}}
        {{--</div>--}}
        {{--<div class="row col-md-12" id="vetement">--}}
            {{--<div class="col-md-3">--}}
                {{--<div class="form-group">--}}
                    {{--<label class="col-lg-12 col-form-label" for="categorie">Categorie <span class="text-danger">*</span></label>--}}
                    {{--<div class="col-lg-12">--}}
                        {{--<select class="form-control" id="categorie" name="categorie[]"--}}
                                {{--style="width: 100%;" data-placeholder="Choisez la Categorie..">--}}
                            {{--<option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->--}}
                            {{--@foreach( $categories as $categorie)--}}
                                {{--<option value="{{$categorie->id_categorie}}">{{$categorie->categorie_name}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label class="col-lg-12 col-form-label" for="service">Type de Service <span class="text-danger">*</span></label>--}}
                    {{--<div class="col-lg-12">--}}
                        {{--<select class="form-control" id="service" name="service[]"--}}
                                {{--style="width: 100%;" data-placeholder="Choisez le Service..">--}}
                            {{--<option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->--}}
                            {{--@foreach($services as $service)--}}
                                {{--<option value="{{$service->id_service}}">{{$service->service_name}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-6">--}}
                {{--<div class="form-group">--}}
                    {{--<label class="col-lg-12 col-form-label" for="vetement_description">--}}
                        {{--Description <span style="font-size: 11px">(optionnel)</span>--}}
                    {{--</label>--}}
                    {{--<div class="col-lg-12">--}}
                                                                                        {{--<textarea class="form-control" rows="4" id="vetement_description"--}}
                                                                                                  {{--name="vetement_description"--}}
                                                                                                  {{--placeholder="Entrer la description de pièce"></textarea>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-3">--}}
                {{--<div class="form-group ">--}}
                    {{--<label class="col-lg-12 col-form-label" for="vetement_price">--}}
                        {{--Prix Unit <span class="text-danger">*</span>--}}
                    {{--</label>--}}
                    {{--<div class="col-lg-12 input-group">--}}
                        {{--<span class="input-group-addon"><i class="fa fa-money"></i></span>--}}
                        {{--<input type="text" class="form-control vetement_price" id="vetement_price"--}}
                               {{--name="vetement_price[]" placeholder="10.60DH">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group ">--}}
                    {{--<label class="col-lg-12 col-form-label" for="vetement_quantity">Quantity</label>--}}
                    {{--<div class="col-lg-12 input-group">--}}
                        {{--<span class="input-group-addon"><i class="fa fa-archive"></i></span>--}}
                        {{--<input type="number" min="1" class="form-control vetement_quantity"--}}
                               {{--id="vetement_quantity" name="vetement_quantity[]" value="1"--}}
                               {{--placeholder="Entrer la quantity">--}}
                    {{--</div>--}}
                    {{--<input type="hidden" class="total_price" name="vetement_total[]">--}}
                {{--</div>--}}
            {{--</div>--}}


            {{--<div class="form-group col-md-2 col-lg-2 col-sm-12">--}}
            {{--<label class="col-lg-12 col-form-label" for="vetement_color">Color Principal</label>--}}
            {{--<div class="col-lg-12">--}}
            {{--<input type="text" class="form-control" id="vetement_color" name="vetement_color[]" placeholder="Entrer la couleur de piece">--}}
            {{--</div>--}}
            {{--</div>--}}


        {{--</div>--}}
        {{--<div class="container" id="add_button">--}}
            {{--<div class="col-md-12 col-lg-12">--}}
                {{--<div  class="pull-right" ><b><span id="montant">Montant Total:  </span></b></div>--}}
                {{--<div class="pull-left" >--}}
                    {{--<button id="add" type="button" class="btn btn-alt-secondary btn-sm" > <i class="fa fa-plus-circle"></i> Autre Pièce</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection

@section('page_script')

@endsection


