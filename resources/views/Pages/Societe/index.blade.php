@extends('main')

@section('page_title')
    <h1 class="font-w700 text-white mb-10 invisible" data-toggle="appear" data-class="animated fadeInUp">Profile de la Societe</h1>
@endsection

@section('page_style')
    <!-- Stylesheets -->
    <style type="text/css">
        .form-material label,.invalid-feedback{
            margin-left: 16px;
        }
        .form-control{
            padding-bottom: 5px;
        }

        .label_logo{
            font-size: 1rem;
            font-weight: 600;
            /*margin-left: 16px;*/
        }
        #logo_location .alert{
            font-size: 11px;
        }
        #societe_logo{
            opacity: 0;
            position: absolute;

        }
        .form-control[readonly] {
            background-color: #fdfeff;
            border-right: none;
        }
        .browse{
            width: 25%;
            color: #575757;
            background-color: #e9ecef;
            border: 1px solid #dcdfe3;
            border-radius: 0 .25rem .25rem 0;
        }
        #logo_name{
            width: 60%;
            margin: 0 0 auto
        }


    </style>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
@endsection

@section('content')

    <div class="block">
        <div class="block-content block-content-full">
            <!-- Societe -->
            <div class="block pull-r-l">
                <div class="block-content">
                    <form action="/societe/{{$societe->id_societe}}" method="post" enctype="multipart/form-data" class="societe-form">
                        {{ method_field('PUT') }}
                        {{csrf_field()}}
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Profile</h3>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="row" style="margin-left: 16px;" >
                                <label class="label_logo col-12" style="margin-left: 0">Changer Logo de Societe</label>
                                <input type="text" onfocus="this.blur()" readonly class="form-control" id="logo_name">
                                <label class="btn browse"  for="societe_logo" >Browse</label>
                                <input id="societe_logo" type="file" style="display: none" hidden>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="form-material floating col-12">
                                <input class="form-control" type="text" id="societe_name" value="{{$societe->societe_name}}" name="societe_name">
                                <label for="societe_name">Nom de la Societe <span style="color: red">*</span></label>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="form-material floating col-12">
                                <input class="form-control" type="text" id="societe_adresse" value="{{$societe->societe_adresse}}" name="societe_adresse">
                                <label for="societe_adresse">Adresse de la Societe <span style="color: red">*</span></label>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="form-material floating col-12">
                                <input class="form-control" type="text" id="societe_city" value="{{$societe->societe_city}}" name="societe_city">
                                <label for="societe_city">Location de la Societe <span style="color: red">*</span></label>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="form-material floating col-12">
                                <input class="form-control" type="text" id="societe_tele" value="{{$societe->societe_tele}}" name="societe_tele">
                                <label for="societe_tele">Telephone/Fax de la Societe <span style="font-size: 11px">(optionnel)</span></label>
                            </div>
                        </div>

                        <div class="form-group col-md-4 col-sm-12">
                            <div class="form-material input-group floating">
                                <input class="form-control" id="societe_email" name="societe_email" type="email">
                                <label for="societe_email">Adresse Email <span style="font-size: 11px">(optionnel)</span></label>
                                <span class="input-group-addon">.example.com</span>
                            </div>
                        </div>
                        </div>
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Autre Informations</h3>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="form-material floating col-12">
                                <textarea class="form-control" rows="2" id="societe_description" name="societe_description">{{$societe->societe_description}}</textarea>
                                <label for="societe_description">Description de la Societe <span style="font-size: 11px">(optionnel)</span></label>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="form-material floating col-12">
                                <input class="form-control" type="text" id="societe_cnss" value="{{$societe->societe_cnss}}" name="societe_cnss">
                                <label for="societe_cnss">CNSS de la Societe <span style="font-size: 11px">(optionnel)</span></label>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="form-material floating col-12">
                                <input class="form-control" type="text" id="societe_rc" value="{{$societe->societe_rc}}" name="societe_rc">
                                <label for="societe_rc">RC de la Societe <span style="font-size: 11px">(optionnel)</span></label>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="form-material floating col-12">
                                <input class="form-control" type="text" id="societe_pattent" value="{{$societe->societe_pattent}}" name="societe_pattent">
                                <label for="societe_pattent">Pattent de la Societe <span style="font-size: 11px">(optionnel)</span></label>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="form-material floating col-12">
                                <input class="form-control" type="text" id="societe_if" value="{{$societe->societe_if}}" name="societe_if">
                                <label for="societe_if">IF de la Societe <span style="font-size: 11px">(optionnel)</span></label>
                            </div>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <div class="form-material floating col-12">
                                <input class="form-control" type="text" id="societe_ice" value="{{$societe->societe_ice}}" name="societe_ice">
                                <label for="societe_ice">ICE de la Societe <span style="font-size: 11px">(optionnel)</span></label>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="container">
                            <input type="submit" value="Enregistrer" class="btn btn-alt-success pull-right ">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Profile -->
        </div>
        <!-- END Side Content -->
    </div>
    <!-- END Dynamic Table Full -->

@endsection

@section('page_script')
    <!-- Page JS Plugins -->
    <script src="{{asset('assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-validation/additional-methods.min.js')}}"></script>

    <script src="{{asset('assets/js/pages/societe_profile_validation.js')}}"></script>
@endsection


