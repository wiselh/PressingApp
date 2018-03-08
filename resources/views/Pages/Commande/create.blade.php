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
        </style>

        {{--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>--}}
        {{--<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>--}}



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
                                <form class="js-validation-bootstrap" action="/commandes" method="post">
                                        {{csrf_field()}}
                                        <div class="col-md-12 col-md-offset-6">
                                                <div class="row">
                                                        <div class="block-header sous-block-header-default header-block col-md-12">
                                                                <h3 class="block-title">Client</h3>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                                <label class="col-lg-12 col-form-label" for="client_name">Nom du Client <span class="text-danger">*</span></label>
                                                                <div class="col-lg-12">
                                                                        <input type="text" class="form-control" id="client_name" name="client_name" placeholder="Enter a username..">
                                                                </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                                <label class="col-lg-12 col-form-label" for="client_tele">Telephone du Client <span style="font-size: 11px">(optionnel)</span></label>
                                                                <div class="col-lg-12">
                                                                        <input type="text" class="form-control" id="client_tele" name="client_tele" placeholder="212-999-0000">
                                                                </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                                <label class="col-lg-12 col-form-label" for="client_adresse">Adresse du Client <span style="font-size: 11px">(optionnel)</span> </label>
                                                                <div class="col-lg-12">
                                                                        <input type="text" class="form-control" id="client_adresse" name="client_adresse" placeholder="Entrer l'adresse..">
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="row" id="vetements">
                                                        <div class="block-header sous-block-header-default header-block col-md-12">
                                                                <h3 class="block-title">Vetement</h3>
                                                        </div>
                                                        <div class="row col-md-12" id="myvet" >
                                                                <div class="form-group col-md-2 col-lg-2 col-sm-12">
                                                                        <label class="col-lg-12 col-form-label" for="categorie">Categorie <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-12">
                                                                                <select class="js-select2 form-control" id="categorie" name="categorie[]" style="width: 100%;" data-placeholder="Choose one..">
                                                                                        <option>Categories : </option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                                                        @foreach( $categories as $categorie)
                                                                                            <option value="{{$categorie->id_categorie}}">{{$categorie->categorie_name}}</option>
                                                                                        @endforeach
                                                                                </select>
                                                                        </div>
                                                                </div>
                                                                <div class="form-group col-md-2 col-lg-2 col-sm-12">
                                                                        <label class="col-lg-12 col-form-label" for="service">Type de Service <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-12">
                                                                                <select class="js-select2 form-control" id="service" name="service[]" style="width: 100%;" data-placeholder="Choose one..">
                                                                                        <option>Services :</option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                                                        @foreach($services as $service)
                                                                                                <option value="{{$service->id_service}}">{{$service->service_name}}</option>
                                                                                        @endforeach
                                                                                </select>
                                                                        </div>
                                                                </div>
                                                                {{--<div class="form-group col-md-2 col-lg-2 col-sm-12">--}}
                                                                        {{--<label class="col-lg-12 col-form-label" for="vetement_color">Color Principal</label>--}}
                                                                        {{--<div class="col-lg-12">--}}
                                                                                {{--<input type="text" class="form-control" id="vetement_color" name="vetement_color[]" placeholder="Entrer la couleur de piece">--}}
                                                                        {{--</div>--}}
                                                                {{--</div>--}}
                                                                <div class="form-group col-md-4 col-lg-4 col-sm-12">
                                                                        <label class="col-lg-12 col-form-label" for="vetement_description">Description <span style="font-size: 11px">(optionnel)</span></label>
                                                                        <div class="col-lg-12">
                                                                                <textarea class="form-control" rows="1" name="vetement_description" placeholder="Entrer la description de pièce"></textarea>
                                                                        </div>
                                                                </div>
                                                                <div class="form-group col-md-2 col-lg-2 col-sm-12">
                                                                        <label class="col-lg-12 col-form-label" for="vetement_price">Prix Unit <span class="text-danger">*</span></label>
                                                                        <div class="col-lg-12">
                                                                                <input type="text" class="form-control vetement_price" id="vetement_price" name="vetement_price[]" placeholder="10.60DH">
                                                                        </div>
                                                                </div>
                                                                <div class="form-group col-md-2 col-lg-2 col-sm-12">
                                                                        <label class="col-lg-12 col-form-label" for="vetement_quantity">Quantity</label>
                                                                        <div class="col-lg-12">
                                                                                <input type="number" min="1" class="form-control vetement_quantity" id="vetement_quantity" name="vetement_quantity[]" value="1"  placeholder="Entrer la quantity">
                                                                        </div>
                                                                        <input type="hidden" class="total_price" name="vetement_total[]">
                                                                </div>
                                                        </div>
                                                        <div class="container" id="add_button">
                                                                <div class="col-md-12 col-lg-12">
                                                                        <div  class="pull-right" ><b><span id="montant">Montant Total:  </span></b></div>
                                                                        <div class="pull-left" >
                                                                                <button id="add" type="button" class="btn btn-alt-secondary btn-sm" > <i class="fa fa-plus-circle"></i> Autre Pièce</button>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="row">
                                                        <div class="block-header sous-block-header-default header-block col-md-12">
                                                                <h3 class="block-title">Service</h3>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                                <label class="col-lg-4 col-form-label" for="commande_paid">Payé? <span class="text-danger">*</span></label>
                                                                <div class="col-lg-8">
                                                                        <label class="css-control css-control-sm css-control-primary css-radio" >
                                                                                <input class="css-control-input" name="commande_paid" id="commande_paid"  type="radio" value="oui">
                                                                                <span class="css-control-indicator"></span> Oui
                                                                        </label>
                                                                        <label class="css-control css-control-sm css-control-primary css-radio" >
                                                                                <input class="css-control-input" name="commande_paid" type="radio" id="commande_paid" value="no">
                                                                                <span class="css-control-indicator"></span> No
                                                                        </label>
                                                                </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                                <label class="col-lg-4 col-form-label" for="commande_date_retrait">Date de Retrait <span class="text-danger">*</span></label>
                                                                <div class="col-lg-8">
                                                                        <input type="date" class="form-control" id="commande_date_retrait" name="commande_date_retrait">
                                                                </div>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                                <div class="col-lg-12 ml-auto">
                                                                        <button type="submit" class="btn btn-alt-primary pull-right">Valider la Commande</button>
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
<!-- Bootstrap Forms Validation -->

@endsection

@section('page_script')
        <!-- Page JS Plugins -->
        <script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/jquery-validation/additional-methods.min.js')}}"></script>

        <!-- Page JS Code -->
        <script src="{{asset('assets/js/pages/add_commande_validation.js')}}"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                //clone
                $("#add").click(function() {
                    $('#vetements #myvet:last').clone(true).insertBefore('#add_button');
                    $('#vetements #myvet').last().find('input:text').val('');
                    $('#vetements #myvet').last().find('#vetement_quantity').val('1');
                    return false;
                });
                //calcul total price
                $('#vetement_quantity,#vetement_price').bind('keyup change' , function () {
                    var textValue1 = $(this).closest('#myvet').find('.vetement_price').val();
                    var textValue2 = $(this).closest('#myvet').find('.vetement_quantity').val();
                    $(this).closest('#myvet').find('.total_price').val(textValue1 * textValue2);

                    var sum = 0;
                    $(".total_price").each(function () {
                        sum += +$(this).val();
                    });

                    $("#montant").html('Montant Total: ' +sum);
                });
            });
        </script>
@endsection


