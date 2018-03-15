@extends('Pages.main')

@section('page_style')
        <style type="text/css">
        .sous-block-header-default{
                background-color: #f4f5f6 !important;
                border-radius: 5px;
                margin: 4px 0;
        }
        #add_button{
                margin: 0;
                padding: 0;
        }
        .error-block{
                margin-left: 20px;
        }
        .new-client{
                display: flex;
                align-items: center;
                justify-content: center;
        }
        </style>
        <link rel="stylesheet" href="{{asset('assets/js/plugins/select2/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/js/plugins/select2/select2-bootstrap.min.css')}}">




@endsection

@section('content')

<!-- Bootstrap Forms Validation -->
<h2 class="content-heading">Créer Nouveau Commande</h2>
<div class="block">
        {{--<div class="block-header block-header-default col-md-12">--}}
                {{--<h3 class="block-title">Créer Nouveau Commande</h3>--}}
        {{--</div>--}}
        <div class="block-content">
                <div class="row justify-content-center py-20">
                        <div class="col-xl-12 col-md-12">
                                <!-- jQuery Validation (.js-validation-bootstrap class is initialized in js/pages/be_forms_validation.js) -->
                                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form class="add_commande_form js-validation-bootstrap" action="/commandes" method="post">
                                        {{csrf_field()}}
                                        <div class="col-md-12 col-md-offset-6">
                                                <div class="row client">
                                                        <div class="block-header sous-block-header-default header-block col-md-12">
                                                                <h3 class="block-title">Client</h3>
                                                        </div>
                                                        <div class="col-md-4">
                                                                <div class="block row">
                                                                        <label class="col-md-12 col-form-label" for="client">Clients <span class="text-danger">*</span></label>
                                                                        <div class="col-md-8">
                                                                                <select class="form-control" id="client" name="client" style="width: 100%;" data-placeholder="Choisez le Client..">
                                                                                        <option value="">Choisez le Client</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                                                        <option value="oui">Client 1</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                                                        @foreach( $clients as $client)
                                                                                                <option value="{{$client->id_client}}">{{$client->client_name}}</option>
                                                                                        @endforeach
                                                                                </select>
                                                                        </div>
                                                                        <div class="col-md-4 new-client">
                                                                                <button type="button" class="btn btn-alt-success" id="clickme">
                                                                                        <span id="toggle-btn"> Nouveau</span>
                                                                                </button>
                                                                                <button type="button" class="btn btn-alt-default" id="clickme2" style="display: none">
                                                                                        <span id="toggle-btn"> Fermer</span>
                                                                                </button>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="col-md-8 row new-client-block animated bounceOutRight" style="display: none">
                                                                <div class="col-md-4">
                                                                        <div class="block form-group">
                                                                                <label class="col-lg-12 col-form-label" for="client_name">Nom <span class="text-danger">*</span></label>
                                                                                <div class="col-lg-12 input-group">
                                                                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                                                        <input type="text"  class="form-control" id="client_name" name="client_name" placeholder="Enter le Nom..">
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                        <div class="block form-group">
                                                                                <label class="col-lg-12 col-form-label" for="client_tele">Telephone <span style="font-size: 11px">(optionnel)</span></label>
                                                                                <div class="col-lg-12 input-group">
                                                                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                                                                        <input type="text" class="form-control" id="client_tele" name="client_tele" placeholder="212-999-0000">
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                        <div class="block form-group">
                                                                                <label class="col-lg-12 col-form-label" for="client_adresse">Adresse <span style="font-size: 11px">(optionnel)</span> </label>
                                                                                <div class="col-lg-12 input-group">
                                                                                        <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                                                                        <input type="text" class="form-control" id="client_adresse" name="client_adresse" placeholder="Entrer l'adresse..">
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <input type="hidden" id="check_client" name="check_client">
                                                </div>
                                                <div class="row" id="vetements">
                                                        <div class="col-md-12">
                                                                <div class="block row">
                                                                        <div class="block-header sous-block-header-default header-block col-md-12">
                                                                                <h3 class="block-title">Vetement</h3>
                                                                        </div>
                                                                        <div class="row col-md-12" id="vetement">
                                                                                <div class="col-md-3">
                                                                                        <div class="form-group">
                                                                                                <label class="col-lg-12 col-form-label" for="categorie">Categorie <span class="text-danger">*</span></label>
                                                                                                <div class="col-lg-12">
                                                                                                        <select class="form-control" id="categorie" name="categorie[]"
                                                                                                                style="width: 100%;" data-placeholder="Choisez la Categorie..">
                                                                                                                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                                                                                @foreach( $categories as $categorie)
                                                                                                                        <option value="{{$categorie->id_categorie}}">{{$categorie->categorie_name}}</option>
                                                                                                                @endforeach
                                                                                                        </select>
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                                <label class="col-lg-12 col-form-label" for="service">Type de Service <span class="text-danger">*</span></label>
                                                                                                <div class="col-lg-12">
                                                                                                        <select class="form-control" id="service" name="service[]"
                                                                                                                style="width: 100%;" data-placeholder="Choisez le Service..">
                                                                                                                <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                                                                                @foreach($services as $service)
                                                                                                                        <option value="{{$service->id_service}}">{{$service->service_name}}</option>
                                                                                                                @endforeach
                                                                                                        </select>
                                                                                                </div>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                                <label class="col-lg-12 col-form-label" for="vetement_libelle">Libelle <span class="text-danger">*</span></label>
                                                                                                <div class="col-lg-12 input-group">
                                                                                                        <span class="input-group-addon"><i class="si si-tag"></i></span>
                                                                                                        <input type="text" class="form-control" id="vetement_libelle" name="vetement_libelle" placeholder="Entrer le nome du piece..">
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                                <label class="col-lg-12 col-form-label" for="vetement_description">
                                                                                                        Description <span style="font-size: 11px">(optionnel)</span>
                                                                                                </label>
                                                                                                <div class="col-lg-12">
                                                                                                <textarea class="form-control" rows="2" id="vetement_description"
                                                                                                          name="vetement_description"
                                                                                                          placeholder="Entrer la description de pièce"></textarea>
                                                                                                </div>
                                                                                        </div>

                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                        <div class="form-group">
                                                                                                <label class="col-lg-12 col-form-label" for="vetement_price">
                                                                                                        Prix Unit <span class="text-danger">*</span>
                                                                                                </label>
                                                                                                <div class="col-lg-12 input-group">
                                                                                                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                                                                                        <input type="text" class="form-control vetement_price" id="vetement_price"
                                                                                                               name="vetement_price[]" placeholder="10.60DH">
                                                                                                </div>
                                                                                        </div>
                                                                                        <div class="form-group ">
                                                                                                <label class="col-lg-12 col-form-label" for="vetement_quantity">Quantity</label>
                                                                                                <div class="col-lg-12 input-group">
                                                                                                        <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                                                                                                        <input type="number" min="1" class="form-control vetement_quantity"
                                                                                                               id="vetement_quantity" name="vetement_quantity[]" value="1"
                                                                                                               placeholder="Entrer la quantity">
                                                                                                </div>
                                                                                                <input type="hidden" class="total_price" name="vetement_total[]">
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="col-md-12" id="add_button">
                                                                <div class="block row">
                                                                        <div class="col-md-3">
                                                                                <button id="add" type="button" class="btn btn-alt-secondary btn-sm" >
                                                                                        <i class="fa fa-plus-circle"></i> Autre Pièce
                                                                                </button>
                                                                        </div>
                                                                        <div class="col-md-2 ml-auto">
                                                                                <b><span id="montant">Montant Total:0</span>DH</b>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="block-header sous-block-header-default header-block col-md-12">
                                                                <h3 class="block-title">Service</h3>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-md-2 col-sm-6">
                                                                <div class="block">
                                                                        <div class="form-group">
                                                                                <label class="col-12 col-form-label" for="paid">Payé? <span class="text-danger">*</span></label>
                                                                                <label class="css-control css-control-sm css-control-primary css-radio" >
                                                                                        <input class="css-control-input" name="paid" id="paid"  type="radio" value="oui">
                                                                                        <span class="css-control-indicator"></span> Oui
                                                                                </label>
                                                                                <label class="css-control css-control-sm css-control-primary css-radio" >
                                                                                        <input class="css-control-input" name="paid" type="radio" id="notpaid" value="no">
                                                                                        <span class="css-control-indicator"></span> No
                                                                                </label>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 payment-mode"  >
                                                                <div class="block row">
                                                                        <div class="form-group col-6">
                                                                                <label class="col-12 col-form-label" for="payment_mode">Mode de Paiment <span class="text-danger">*</span></label>
                                                                                <select class="form-control" id="payment_mode" name="payment_mode"
                                                                                        style="width: 100%;" data-placeholder="Choisez le Service..">
                                                                                        <option value=""></option>
                                                                                        <option>Espèce</option>
                                                                                        <option>Chèque</option>
                                                                                        <option>Chèque et Espèce</option>
                                                                                        <option>Partiel</option>
                                                                                </select>
                                                                        </div>
                                                                        <div class="form-group col-6">
                                                                                <label class="col-12 col-form-label" for="payment_paid">Montant à payée<span class="text-danger">*</span></label>
                                                                                <div class="input-group">
                                                                                        <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                                                                        <input type="text" class="form-control payment_paid" id="payment_paid" style="cursor: pointer"
                                                                                               name="payment_paid" placeholder="10.60DH">
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-12 ml-auto">
                                                                <div class="block">
                                                                        <div class="form-group">
                                                                                <label class="col-form-label" for="commande_date_retrait">Date de Retrait <span class="text-danger">*</span></label>
                                                                                <div class="input-group">
                                                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                                        <input type="date" class="form-control" id="commande_date_retrait" name="commande_date_retrait">
                                                                                </div>
                                                                        </div>

                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="row text-center">
                                                        <div class="col-lg-3 ml-auto">
                                                                <button type="submit" class="btn btn-alt-primary">Valider la Commande</button>
                                                        </div>
                                                </div>
                                        </div>
                                </form>
                                <div class="form-group col-md-12">
                                        <span class="text-danger">*</span> <label> : Champ Obligatoire</label>
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

        <!-- Page JS Code -->
        <script src="{{asset('assets/js/pages/add_commande_validation.js')}}"></script>
        <script src="{{asset('assets/js/pages/add_commande_validation2.js')}}"></script>

@endsection


