<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <title>Installation</title>

    <meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{asset('assets/img/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/img/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/favicons/apple-touch-icon-180x180.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Codebase framework -->
    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/codebase.min.css')}}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="{{asset('assets/css/themes/flat.min.css')}}"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <style type="text/css" rel="stylesheet">
        .maximum{
            background-color: #f34349;
            padding: 4px 10px;
            border-radius: 10px;
            color: white
        }
        #review{
            cursor: pointer;
            border-radius: 100px;
            width: 100px;
            height: 100px;
            position:absolute;
            top:0;
            left:0;
            right:0;
            bottom:0;
            margin:auto;
        }
        #review:hover{
            opacity: 0.5;
        }
        .logo-div{
            position: relative;
            height: 100%;
            width:100%;
        }
    </style>

    <!-- END Stylesheets -->
</head>
<body>
<!-- Page Container -->
<div id="page-container" class="main-content-boxed">
    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="bg-gd-dusk">
            <div class="hero-static content content-full bg-white invisible" data-toggle="appear">
                <!-- Header -->
                <div class="py-30 px-5 text-center">
                    <h2 class="h4 font-w700 text-muted mt-20 mb-10">Installation</h2>
                </div>
                <!-- END Header -->

                <!-- Sign In Form -->
                <div class="row justify-content-center px-5">
                    <div class="col-sm-7 col-md-7 col-xl-7">
                        <!-- Page Content -->
                        <div class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Validation Wizard Material -->
                                    <div class="js-wizard-validation-material block">
                                        <!-- Step Tabs -->
                                        <ul class="nav nav-tabs nav-tabs-alt nav-fill" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#wizard-validation-material-step1" data-toggle="tab">1. Utilisateur Informations</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#wizard-validation-material-step2" data-toggle="tab">2. Societe Informations</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#wizard-validation-material-step3" data-toggle="tab">3. Autre Informations</a>
                                            </li>
                                        </ul>
                                        <!-- END Step Tabs -->

                                        <!-- Form -->
                                        <form class="js-wizard-validation-material-form" enctype="multipart/form-data" action="/installation" method="post">
                                                {{csrf_field()}}
                                            <!-- Steps Content -->
                                            <div class="block-content block-content-full tab-content" style="min-height: 267px;">
                                                <!-- Step 1 -->
                                                <div class="tab-pane active" id="wizard-validation-material-step1" role="tabpanel">
                                                    <div class="form-group">
                                                        <span style="font-size: 11px;color: red">*</span> : Champ obligatoire
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                            <h6 style="line-height: 1.5;color: #575757;">Logo <span style="font-size: 11px;">(optionnel)</span></h6>

                                                            <div class="form-material logo-div">
                                                                    <input  type="file" id="user_picture" name="user_picture" style="display: none">
                                                                    <img id="review" src="#"/>
                                                            </div>
                                                            <span class="pull-right maximum">Maximum 2Mb </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            <input class="form-control" type="text" id="user_name" name="user_name">
                                                            <label for="user_name">Nom Complete <span style="color: red">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            <input class="form-control" type="text" id="user_adresse" name="user_adresse">
                                                            <label for="user_adresse">Adresse <span style="font-size: 11px;">(optionnel)</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            <input class="form-control" type="text" id="user_tele" name="user_tele">
                                                            <label for="user_tele">Telephone <span style="font-size: 11px;">(optionnel)</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            <input class="form-control" type="text" id="username" name="username">
                                                            <label for="username">Nom d'utilisateur <span style="color: red">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            <input class="form-control" type="email" id="user_email" name="user_email">
                                                            <label for="user_email">Email <span style="color: red">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            <input class="form-control" type="password" id="password" name="password">
                                                            <label for="password">Mot de pass <span style="color: red">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            <input class="form-control" type="password" id="confirm_password" name="confirm_password">
                                                            <label for="confirm_password">Confirmer le Mot de pass <span style="color: red">*</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END Step 1 -->

                                                <!-- Step 2 -->
                                                <div class="tab-pane" id="wizard-validation-material-step2" role="tabpanel">
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            <input class="form-control" type="text" id="societe_name" name="societe_name">
                                                            <label for="societe_name">Nom de Societe <span style="color: red">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            <input class="form-control" type="text" id="societe_adresse" name="societe_adresse">
                                                            <label for="societe_adresse">Adresse de la Societe <span style="color: red">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            {{--<input class="form-control" type="text" id="societe_city" name="societe_city">--}}
                                                            <label for="societe_city">Ville <span style="color: red">*</span></label>
                                                            <select name="societe_city" id="societe_city" class="form-control">
                                                                <option>Choisez la Ville</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            <input class="form-control" type="text" id="societe_tele" name="societe_tele">
                                                            <label for="societe_tele">Telephone-Fax de la Societe <span style="color: red">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            <input class="form-control" type="text" id="societe_email" name="societe_email">
                                                            <label for="societe_email">Email de la Societe <span style="color: red">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            <input class="form-control" type="text" id="societe_website" name="societe_website">
                                                            <label for="societe_website">Site de la Societe<span style="color: red">*</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            <h6 style="line-height: 1.5;color: #575757;">Logo de la Societe<span style="color: red">*</span></h6>
                                                            <input  type="file" id="societe_logo" name="societe_logo">
                                                            <span style="background-color: #f3a8a0;padding: 4px 10px;">Maximum 2Mb</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END Step 2 -->

                                                <!-- Step 3 -->
                                                <div class="tab-pane" id="wizard-validation-material-step3" role="tabpanel">
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            <textarea class="form-control" id="societe_description" name="societe_description" rows="4"></textarea>
                                                            <label for="societe_description">Description <span style="font-size: 11px;">(optionnel)</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            <input class="form-control" type="text" id="societe_cnss" name="societe_cnss">
                                                            <label for="societe_cnss">CNSS <span style="font-size: 11px;">(optionnel)</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            <input class="form-control" type="text" id="societe_rc" name="societe_rc">
                                                            <label for="societe_rc">RC <span style="font-size: 11px;">(optionnel)</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            <input class="form-control" type="text" id="societe_pattent" name="societe_pattent">
                                                            <label for="societe_pattent">Pattent <span style="font-size: 11px;">(optionnel)</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            <input class="form-control" type="text" id="societe_if" name="societe_if">
                                                            <label for="societe_if">IF <span style="font-size: 11px;">(optionnel)</span></label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-material floating">
                                                            <input class="form-control" type="text" id="societe_ice" name="societe_ice">
                                                            <label for="societe_ice">ICE <span style="font-size: 11px;">(optionnel)</span></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END Step 3 -->
                                            </div>
                                            <!-- END Steps Content -->

                                            <!-- Steps Navigation -->
                                            <div class="block-content block-content-sm block-content-full bg-body-light">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <button type="button" class="btn btn-alt-secondary" data-wizard="prev">
                                                            <i class="fa fa-angle-left mr-5"></i> Précédent
                                                        </button>
                                                    </div>
                                                    <div class="col-6 text-right">
                                                        <button type="button" class="btn btn-alt-secondary" data-wizard="next">
                                                            Suivant <i class="fa fa-angle-right ml-5"></i>
                                                        </button>
                                                        <button type="submit" class="btn btn-alt-primary d-none" data-wizard="finish">
                                                            <i class="fa fa-check mr-5"></i> Valider
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END Steps Navigation -->
                                        </form>
                                        <!-- END Form -->
                                    </div>
                                    <!-- END Validation Wizard 2 -->
                                </div>
                            </div>
                            <!-- END Validation Wizards -->
                        </div>
                        <!-- END Page Content -->
                    </div>
                </div>
                <!-- END Sign In Form -->
            </div>
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->

<!-- Codebase Core JS -->
<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/core/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/js/core/jquery.scrollLock.min.js')}}"></script>
<script src="{{asset('assets/js/core/jquery.appear.min.js')}}"></script>
<script src="{{asset('assets/js/core/jquery.countTo.min.js')}}"></script>
<script src="{{asset('assets/js/core/js.cookie.min.js')}}"></script>
<script src="{{asset('assets/js/codebase.js')}}"></script>

{{--<!-- Page JS Plugins -->--}}
{{--<script src="{{asset('sets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>--}}

{{--<!-- Page JS Code -->--}}
{{--<script src="{{asset('sets/js/pages/op_auth_signin.js')}}"></script>--}}

<!-- Page JS Plugins -->
<script src="{{asset('assets/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<!-- Page JS Code -->
<script src="{{asset('assets/js/pages/installation_form.js')}}"></script>
<script type="text/javascript">
    var serviceArray= ["Rabat","Ad Dakhla","Agadir","Al Hoceima","Azilal","Beni Mellal","Ben Slimane",
                        "Boujdour","Boulemane","Casablanca","Chaouen","El Jadida","El Kelaa des Sraghna",
                        "Er Rachidia","Essaouira","Es Smara","Fes","Figuig","Guelmim","Ifrane","Kenitra",
                        "Khemisset","Khenifra","Khouribga","Laayoune","Larache","Marrakech","Meknes","Nador",
                        "Ouarzazate","Oujda","Safi","Settat","Sidi Kacem","Tanger","Tan-Tan","Taounate",
                        "Taroudannt","Tata","Taza","Tetouan","Tiznit"];

    for (i = 0; i < serviceArray.length; i++) {
        var data = '<option value="'+serviceArray[i]+'">' + serviceArray[i] + '</option>';
        $('#societe_city').append(data);
    }
    //photos
    if($('#user_picture').val()!=''){
        readURL($('#user_picture').get( 0 ));
    }
    else $('#review').attr('src','{{asset("assets/img/avatars/avatar0.jpg")}}');

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#review').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#user_picture").change(function(){
        readURL(this);
    });

    $('#review').click(function(){ $('#user_picture').trigger('click'); });
    

</script>
</body>
</html>