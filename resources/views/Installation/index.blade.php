<!doctype html>
<!--[if lte IE 9]>     <html lang="en" class="no-focus lt-ie10 lt-ie10-msg"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en" class="no-focus"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <title>Installation</title>

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{asset('assets/img/favicons/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/img/favicons/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/img/favicons/apple-touch-icon-180x180.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Codebase framework -->
    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/codebase.min.css')}}">
    <script src="{{asset('assets/js/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery/jquery-3.3.1.js')}}"></script>
    <style>
        .maximum {
            background-color: #ff9a92;
            padding: 4px 10px;
            border-radius: 10px;
            color: white
        }
        .browse {
            background-color: #ebeef2;
        }
        .browse:hover {
            background-color: #c4c7cb;
        }
    </style>
</head>
<body>
<!-- Page Container -->
<div id="page-container">
    <!-- Main Container -->
    <main id="main-container row">
        <!-- Page Content -->
        <div class="content col-md-6 justify-content-center ">
            <!-- Validation Wizards -->
            <h1 class="text-center font-w700" style="margin-top: 50px;color:#646464">Installation</h1>
                <!-- Validation Wizard Material -->
                <div class="js-wizard-validation-material block">
                        <div class="progress rounded-0" data-wizard="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 30%; height: 8px;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <!-- Step Tabs -->
                        <ul class="nav nav-tabs nav-tabs-alt nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#wizard-validation-material-step1" data-toggle="tab">1. Personal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#wizard-validation-material-step2" data-toggle="tab">2. Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#wizard-validation-material-step3" data-toggle="tab">3. Extra</a>
                            </li>
                        </ul>
                        <!-- END Step Tabs -->

                        <!-- Form -->
                        <form class="global-form" enctype="multipart/form-data" action="/installation" method="post">
                            {{csrf_field()}}
                            <!-- Steps Content -->
                            <div class="block-content block-content-full tab-content" style="min-height: 267px;">
                                <!-- Step 1 -->
                                <div class="tab-pane active" id="wizard-validation-material-step1" role="tabpanel">
                                    <div class="form-group">
                                        <span style="font-size: 11px;color: red">*</span> : Champ
                                        obligatoire
                                    </div>
                                    <div class="form-group">
                                        <label for="user_picture" class="lbl-user-picture">Photo de Profile</label>
                                        <div class="input-group">
                                            <label class="input-group-btn">
                                        <span class="btn browse">
                                            Browse&hellip; <input type="file" style="opacity: 0;position: absolute"
                                                                  class="picture" id="user_picture" name="user_picture">
                                        </span>
                                            </label>
                                            <input type="text" class="form-control filename"
                                                   onfocus="this.blur()" style="background-color:#FFF !important" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="alert alert-info alert-dismissable" style="padding: 2px 5px;">
                                            <p class="mb-0">Taille maximale d'image : <b>2MB</b></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="user_fullname"
                                                   name="user_fullname">
                                            <label for="user_fullname">Nom Complete <span
                                                        style="color: red">*</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text"
                                                   id="user_adresse" name="user_adresse">
                                            <label for="user_adresse">Adresse <span
                                                        style="font-size: 11px;">(optionnel)</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="user_tele"
                                                   name="user_tele">
                                            <label for="user_tele">Telephone <span
                                                        style="font-size: 11px;">(optionnel)</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="username"
                                                   name="username">
                                            <label for="username">Nom d'utilisateur (login) <span
                                                        style="color: red">*</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="email" id="user_email"
                                                   name="user_email">
                                            <label for="user_email">Email <span
                                                        style="color: red">*</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="password"
                                                   id="password" name="password">
                                            <label for="password">Mot de pass <span
                                                        style="color: red">*</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="password"
                                                   id="confirm_password" name="confirm_password">
                                            <label for="confirm_password">Confirmer le Mot de pass
                                                <span style="color: red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Step 1 -->

                                <!-- Step 2 -->
                                <div class="tab-pane" id="wizard-validation-material-step2" role="tabpanel">
                                        <div class="form-group">
                                            <div class="form-material floating">
                                                <input class="form-control" type="text"
                                                       id="societe_name" name="societe_name">
                                                <label for="societe_name">Nom de Societe <span
                                                            style="color: red">*</span></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-material floating">
                                                <input class="form-control" type="text"
                                                       id="societe_adresse" name="societe_adresse">
                                                <label for="societe_adresse">Adresse de la Societe <span
                                                            style="color: red">*</span></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-material ">
                                                {{--<input class="form-control" type="text" id="societe_city" name="societe_city">--}}
                                                <label for="societe_city">Ville <span
                                                            style="color: red">*</span></label>
                                                <select name="societe_city" id="societe_city"
                                                        class="form-control">
                                                    <option value="">Choisez la Ville</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-material floating">
                                                <input class="form-control" type="text"
                                                       id="societe_tele" name="societe_tele">
                                                <label for="societe_tele">Telephone-Fax de la
                                                    Societe</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-material input-group floating">
                                                <input class="form-control" id="societe_email"
                                                       name="societe_email" type="email">
                                                <label for="societe_email">Email de la Societe <span
                                                            style="font-size: 11px">(optionnel)</span></label>
                                                <span class="input-group-addon">.example.com</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-material input-group floating">
                                                <input class="form-control" type="text"
                                                       id="societe_website" name="societe_website">
                                                <label for="societe_website">Site de la Societe</label>
                                                <span class="input-group-addon">https://exemple.com</span>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <label for="societe_logo" class="lbl-logo-picture">Logo de la Societe</label>
                                        <div class="input-group">
                                            <label class="input-group-btn">
                                                <span class="btn browse">
                                                    Browse&hellip; <input type="file" style="opacity: 0;position: absolute" id="societe_logo" name="societe_logo">
                                                </span>
                                            </label>
                                            <input type="text" class="form-control filename-logo"
                                                   onfocus="this.blur()" style="background-color:#FFF !important" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="alert alert-info alert-dismissable" style="padding: 2px 5px;">
                                            <p class="mb-0">Taille maximale d'image : <b>2MB</b></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Step 2 -->

                                <!-- Step 3 -->
                                <div class="tab-pane" id="wizard-validation-material-step3" role="tabpanel">
                                    <div class="form-group">
                                        <div class="form-material floating">
                                                            <textarea class="form-control" id="societe_description"
                                                                      name="societe_description"
                                                                      rows="4"></textarea>
                                            <label for="societe_description">À-propos <span
                                                        style="font-size: 11px;">(optionnel)</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text"
                                                   id="societe_cnss" name="societe_cnss">
                                            <label for="societe_cnss">CNSS <span
                                                        style="font-size: 11px;">(optionnel)</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="societe_rc"
                                                   name="societe_rc">
                                            <label for="societe_rc">RC <span
                                                        style="font-size: 11px;">(optionnel)</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text"
                                                   id="societe_pattent" name="societe_pattent">
                                            <label for="societe_pattent">Pattent <span
                                                        style="font-size: 11px;">(optionnel)</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="societe_if"
                                                   name="societe_if">
                                            <label for="societe_if">IF <span
                                                        style="font-size: 11px;">(optionnel)</span></label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-material floating">
                                            <input class="form-control" type="text" id="societe_ice"
                                                   name="societe_ice">
                                            <label for="societe_ice">ICE <span
                                                        style="font-size: 11px;">(optionnel)</span></label>
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
                                            <i class="fa fa-check mr-5"></i> Enregistrer
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- END Steps Navigation -->
                        </form>
                        <!-- END Form -->
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

<!-- Page JS Plugins -->
<script src="{{asset('assets/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-validation/additional-methods.min.js')}}"></script>

<!-- Page JS Code -->
<script src="{{asset('assets/js/pages/installation_validation.js')}}"></script>
<script type="text/javascript">
    $(function () {


        // enter key not allowed
        $('.global-form').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });

    });


</script>
</body>
</html>