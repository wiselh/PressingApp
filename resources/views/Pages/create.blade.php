@extends('Pages.main')

@section('page_style')


@endsection

@section('content')

        <!-- Bootstrap Forms Validation -->
        {{--<h2 class="content-heading">Bootstrap Forms</h2>--}}
        <div class="block">
                <div class="block-header block-header-default">
                        <h3 class="block-title">Créer Nouveau Commande</h3>
                </div>
                <div class="block-content">
                        <div class="row justify-content-center py-20">
                                <div class="col-xl-6">
                                        <!-- jQuery Validation (.js-validation-bootstrap class is initialized in js/pages/be_forms_validation.js) -->
                                        <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                        <form class="js-validation-bootstrap" action="" method="post">
                                                <div class="block-header block-header-default">
                                                        <h3 class="block-title">Client</h3>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-username">Nom du Client <span class="text-danger">*</span></label>
                                                        <div class="col-lg-8">
                                                                <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Enter a username..">
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-phoneus">Telephone du Client</label>
                                                        <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="" name="phone" placeholder="212-999-0000">
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-adress">Adresse du Client </label>
                                                        <div class="col-lg-8">
                                                                <input type="text" class="form-control" id="val-adress" name="val-password" placeholder="Choose a safe one..">
                                                        </div>
                                                </div>
                                                <div class="block-header block-header-default">
                                                        <h3 class="block-title">Vetement</h3>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-select2">Categorie<span class="text-danger">*</span></label>
                                                        <div class="col-lg-8">
                                                                <select class="js-select2 form-control" id="val-select2" name="val-select2" style="width: 100%;" data-placeholder="Choose one..">
                                                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                                        <option value="html">HTML</option>
                                                                        <option value="css">CSS</option>
                                                                        <option value="javascript">JavaScript</option>
                                                                        <option value="angular">Angular</option>
                                                                        <option value="angular">React</option>
                                                                        <option value="vuejs">Vue.js</option>
                                                                        <option value="ruby">Ruby</option>
                                                                        <option value="php">PHP</option>
                                                                        <option value="asp">ASP.NET</option>
                                                                        <option value="python">Python</option>
                                                                        <option value="mysql">MySQL</option>
                                                                </select>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-color">Color Principal </label>
                                                        <div class="col-lg-8">
                                                                <input type="text" class="form-control" id="color" name="val-password" placeholder="couleur de piece">
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-select2">Type de Service<span class="text-danger">*</span></label>
                                                        <div class="col-lg-8">
                                                                <select class="js-select2 form-control" id="val-select2" name="val-select2" style="width: 100%;" data-placeholder="Choose one..">
                                                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                                        <option value="">Type 1</option>
                                                                        <option value="">Type 2</option>
                                                                        <option value="">Type 3</option>
                                                                        <option value="">Type 4</option>
                                                                </select>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-currency">Prix de Piece <span class="text-danger">*</span></label>
                                                        <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="val-currency" name="val-currency" placeholder="$21.60">
                                                        </div>
                                                </div>
                                                <div class="block-header block-header-default">
                                                        <h3 class="block-title">Service</h3>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-select2">Payés? <span class="text-danger">*</span></label>
                                                        <div class="col-lg-8">
                                                                <select class="js-select2 form-control" id="val-select2" name="val-select2" style="width: 100%;" data-placeholder="Choose one..">
                                                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                                        <option value="no">No</option>
                                                                        <option value="yes">Oui</option>

                                                                </select>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="date">Date de Retrait <span class="text-danger">*</span></label>
                                                        <div class="col-lg-8">
                                                                <input type="date" class="form-control" id="date" name="date_retrait" placeholder="couleur de piece">
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                        <div class="col-lg-8 ml-auto">
                                                                <button type="submit" class="btn btn-alt-primary">Ajouter</button>
                                                        </div>
                                                </div>
                                        </form>
                                        <div class="form-group row">
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
@endsection


