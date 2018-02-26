@extends('Pages.main')

@section('page_style')
        <style type="text/css">
        #paye-error{
                background-color: rgba(255, 11, 0, 0.67);
                color: white;
                padding: 5px;
                border-radius: 4px;
                width: 50%;
        }
        .header-block{
                background-color: #a8dad9;
                border-radius: 5px;
                margin: 4px 0px;
        }
        </style>

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.js"></script>



@endsection

@section('content')

<!-- Bootstrap Forms Validation -->
{{--<h2 class="content-heading">Bootstrap Forms</h2>--}}
<div class="block">
        <div class="block-header block-header-default col-md-12">
                <h3 class="block-title">Créer Nouveau Commande</h3>
        </div>
        <div class="block-content">
                <div class="row justify-content-center py-20">
                        <div class="col-xl-12 col-md-12">
                                <!-- jQuery Validation (.js-validation-bootstrap class is initialized in js/pages/be_forms_validation.js) -->
                                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form class="js-validation-bootstrap" action="/factures" method="post">
                                        {{csrf_field()}}

                                        <div class="col-md-12 col-md-offset-6">
                                                <div class="row">
                                                        <div class="block-header block-header-default header-block col-md-12">
                                                                <h3 class="block-title">Client</h3>
                                                        </div>
                                                        <div class="form-group col-md-6 ">
                                                                <label class="col-lg-4 col-form-label" for="nom">Nom du Client <span class="text-danger">*</span></label>
                                                                <div class="col-lg-8">
                                                                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter a username..">
                                                                </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                                <label class="col-lg-4 col-form-label" for="tele">Telephone du Client</label>
                                                                <div class="col-lg-6">
                                                                        <input type="text" class="form-control" id="tele" name="tele" placeholder="212-999-0000">
                                                                </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                                <label class="col-lg-4 col-form-label" for="adresse">Adresse du Client </label>
                                                                <div class="col-lg-8">
                                                                        <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Choose a safe one..">
                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="row" id="vetements">
                                                        <div class="block-header block-header-default header-block col-md-12">
                                                                <h3 class="block-title">Vetement</h3>
                                                        </div>
                                                        <div class="container" id="myvet" >
                                                                <div class="col-md-12">
                                                                        <div class="row">
                                                                                <div class="form-group col-md-3 col-lg-3">
                                                                                        <label class="col-lg-12 col-form-label" for="categorie">Categorie<span class="text-danger">*</span></label>
                                                                                        <div class="col-lg-12">
                                                                                                <select class="js-select2 form-control" id="categorie" name="categorie[]" style="width: 100%;" data-placeholder="Choose one..">
                                                                                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                                                                        @foreach( $categories as $categorie)
                                                                                                                <option value="{{$categorie->id_categorie}}">{{$categorie->nom_categorie}}</option>
                                                                                                        @endforeach
                                                                                                </select>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 col-lg-3">
                                                                                        <label class="col-lg-12 col-form-label" for="couleur">Color Principal </label>
                                                                                        <div class="col-lg-12">
                                                                                                <input type="text" class="form-control" id="couleur" name="couleur[]" placeholder="couleur de piece">
                                                                                        </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 col-lg-3">
                                                                                        <label class="col-lg-12 col-form-label" for="type">Type de Service<span class="text-danger">*</span></label>
                                                                                        <div class="col-lg-12">
                                                                                                <select class="js-select2 form-control" id="type" name="type[]" style="width: 100%;" data-placeholder="Choose one..">
                                                                                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                                                                       @foreach( $services as $service)
                                                                                                        <option value="{{$service->id_service}}">{{$service->nom_service}}</option>
                                                                                                        @endforeach
                                                                                                </select>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3 col-lg-3">
                                                                                <label class="col-lg-12 col-form-label" for="Prix">Prix de Piece <span class="text-danger">*</span></label>
                                                                                <div class="col-lg-12">
                                                                                        <input type="text" class="form-control prix" id="prix" name="prix[]" placeholder="10.60DH">
                                                                                </div>
                                                                        </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="container" id="add_button">
                                                                <div class="col-md-12 col-lg-12">
                                                                        <div  class="pull-right" ><b><span id="montant">Montant Total:  </span></b></div>
                                                                        <div class="pull-left" >
                                                                                <button id="add" type="button" class="btn btn-alt-secondary btn-sm" >Ajouter une Piece</button>
                                                                        </div>

                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="row">
                                                        <div class="block-header block-header-default header-block col-md-12">
                                                                <h3 class="block-title">Service</h3>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                                <label class="col-lg-4 col-form-label" for="paye">Payés? <span class="text-danger">*</span></label>
                                                                <div class="col-lg-8">
                                                                        <label class="css-control css-control-sm css-control-primary css-radio" >
                                                                                <input class="css-control-input" name="paye" id="paye"  type="radio">
                                                                                <span class="css-control-indicator"></span> Oui
                                                                        </label>
                                                                        <label class="css-control css-control-sm css-control-primary css-radio" >
                                                                                <input class="css-control-input" name="paye" type="radio" id="paye">
                                                                                <span class="css-control-indicator"></span> Non
                                                                        </label>

                                                                </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                                <label class="col-lg-4 col-form-label" for="date_retrait">Date de Retrait <span class="text-danger">*</span></label>
                                                                <div class="col-lg-8">
                                                                        <input type="date" class="form-control" id="date_retrait" name="date_retrait" placeholder="couleur de piece">
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
        <script src="{{asset('assets/js/pages/be_forms_validation.js')}}"></script>


        <script type="text/javascript">
            $(document).ready(function() {
                $("#add").click(function() {
                    $('#vetements #myvet:last').clone(true).insertBefore('#add_button');
                    $('#vetements #myvet').last().find('input:text').val('');
                    return false;
                });

            });
//            $(document).ready(function() {
//
//
//                });




            $(document).ready(function() {
                $('.prix').keyup(function () {
                    var sum = 0;
                    $('.prix').each(function() {
                        sum += Number($(this).val());
                    });
                    $('#montant').html("Montant Total: "+sum+"DH");
                })});
        </script>
@endsection


