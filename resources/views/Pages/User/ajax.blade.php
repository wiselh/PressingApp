@extends('Pages.main')

@section('page_style')

    <!-- Stylesheets -->
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.css')}}">
    <style type="text/css">
        th{
            font-size: 10px;
        }
        .btn-secondary-delete {
            padding: 0px 8px;
            color: #fefefe;
            background-color: #ff413e;
            border-color: #ff413e;
            margin: 1px;
            cursor: pointer;
        }
        .btn-secondary-edit {
            padding: 0px 8px;
            color: #fefefe;
            background-color: #367cff;
            border-color: #367cff;
            margin: 1px;
            cursor: pointer;
        }
        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;

        }

        .btn-upload {
            border: 2px solid gray;
            color: gray;
            background-color: white;
            padding: 8px 10px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
        }

        .upload-btn-wrapper input[type=file] {
            font-size: 20px;
            position: absolute;
            left: 0;
            bottom: 0;
            opacity: 0;
            cursor: pointer;
        }
    </style>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

@endsection

@section('content')


<div class="container">

    <h2>Laravel Ajax Validation</h2>


    <div class="alert alert-danger print-error-msg" style="display:none">

        <ul></ul>

    </div>




        <div class="col-xl-12 col-md-12">
            <!-- jQuery Validation (.js-validation-bootstrap class is initialized in js/pages/be_forms_validation.js) -->
            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
            <form>
                {{csrf_field()}}
                <div class="col-md-12 col-md-offset-6">
                    <div class="row"><span style="color: red">* </span> : Champ obligatoire</div>
                    <div class="row">
                        <div class="form-group col-md-3 col-sm-12">
                            <div class="form-material floating">
                                <input class="form-control" type="text" id="user_fullname" name="user_fullname">
                                <label for="user_fullname">Nom - Prenom <span style="color: red">*</span></label>
                            </div>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <div class="form-material floating">
                                <input class="form-control" type="text" id="user_adresse" name="user_adresse">
                                <label for="user_adresse">Adresse personnel</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <div class="form-material floating">
                                <input class="form-control" type="text" id="user_tele" name="user_tele">
                                <label for="user_tele">Telephone</label>
                            </div>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <div class="form-material floating">
                                <input class="form-control" type="text" id="user_username" name="user_username">
                                <label for="user_username">Nom d'Utilisateur <span style="color: red">*</span></label>
                            </div>
                        </div>
                        <div class="form-group col-md-3 col-sm-12">
                            <div class="form-material floating">
                                <input class="form-control" type="text" id="user_email" name="user_email">
                                <label for="user_email">Adresse Email <span style="color: red">*</span></label>
                            </div>
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
                        <div class="form-group col-md-3 col-sm-12">
                            <div class="upload-btn-wrapper form-material">
                                <button class="btn-upload" type="button">Uploader Photo de Profile</button>
                                <input type="file" name="user_picture" id="user_picture" />
                            </div>
                        </div>
                        <div class="form-group col-md-6 col-sm-12 pull-left">
                            <div class="form-material floating">
                                <div class="block">
                                    {{--<div class="block-header block-header-default">--}}
                                    <h6 class="block-title">Administration Permission</h6>
                                    {{--</div>--}}
                                    <div class="block-content">
                                        <div class="row no-gutters items-push">
                                            <div class="col-6">
                                                <label class="css-control css-control-primary css-radio">
                                                    <input class="css-control-input" name="user_permission" value="oui" type="radio">
                                                    <span class="css-control-indicator"></span> Yes
                                                </label>
                                                <label class="css-control css-control-primary css-radio">
                                                    <input class="css-control-input" name="user_permission" value="no" checked="" type="radio">
                                                    <span class="css-control-indicator"></span> No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">

                            <button class="btn btn-success btn-submit">Submit</button>

                        </div>

                    </div>
                </div>
            </form>
            <div class="alert alert-danger print-error-msg" style="display:none">

                <ul>

                </ul>

            </div>
            <script type="text/javascript">


                $(document).ready(function() {

                    $(".btn-submit").click(function(e){

                        e.preventDefault();


                        var _token = $("input[name='_token']").val();
                        var user_username = $("input[name='user_username']").val();
                        var user_email = $("input[name='user_email']").val();
                        var user_fullname = $("input[name='user_fullname']").val();
                        var user_tele = $("input[name='user_tele']").val();
                        var user_adresse = $("input[name='user_adresse']").val();
                        var user_password = $("input[name='user_password']").val();
                        var user_picture = $("input[name='user_picture']").val();
                        var user_permission = $("input[name='user_permission']").val();


                        $.ajax({

                            url: "/users",

                            type:'POST',

                            data: {_token:_token,
                                username:user_username,
                                email:user_email,
                                password:user_password,
                                fullname:user_fullname,
                                tele:user_tele,
                                adresse:user_adresse,
                                picture:user_picture,
                                admin:user_permission},

                            success: function(data) {

                                if($.isEmptyObject(data.error)){

                                    printErrorMsg(data.success);


                                }else{

                                    printErrorMsg(data.error);

                                }

                            }

                        });


                    });


                    function printErrorMsg (msg) {

                        $(".print-error-msg").find("ul").html('');

                        $(".print-error-msg").css('display','block');

                        $.each( msg, function( key, value ) {

                            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');

                        });

                    }

                });


            </script>
        </div>



</div>


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


@endsection


