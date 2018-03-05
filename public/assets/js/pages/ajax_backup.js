

$(document).ready(function() {

    $(".btn-submit").click(function(e){

        e.preventDefault();
        var _token = $("input[name='_token']").val();
        var user_username = $("input[name='user_username']").val();
        var user_email = $("input[name='user_email']").val();
        //                var user_fullname = $("input[name='user_fullname']").val();
            //                var user_tele = $("input[name='user_tele']").val();
            //                var user_adresse = $("input[name='user_adresse']").val();
            //                var user_password = $("input[name='user_password']").val();
            //                var user_picture = $("input[name='user_picture']").val();
            //                var user_permission = $("input[name='user_permission']").val();


            $.ajax({

            url: "/users",

            type:'POST',

            data: {
                _token:_token,
                username:user_username,
                email:user_email
                //                        password:user_password,
                    //                        fullname:user_fullname,
                    //                        tele:user_tele,
                    //                        adresse:user_adresse,
                    //                        picture:user_picture,
                    //                        admin:user_permission
                    },

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

// second one works fine
/*
 *  Document   : be_forms_wizard.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Form Wizard Page
 */
// Init form validation on material wizard form
$(function() {

    jQuery.validator.addMethod("noSpace", function(value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "No space please and don't leave it empty");

    $('.btn-submit').click(function (e) {
        var myfunction = function () {
            if($('#user_picture').val() != '')
            {
                var path = $('#user_picture').val();
                var ext = path.split('.').pop();
                var pic_name = '';
                var username = $('#user_username').val();

                if (username == "") pic_name = 'username';
                else pic_name = username;

                $('.btn-upload').text(pic_name + '.' + ext);
            }
            else $('.btn-upload').text("Uploader Photo de Profile");
        };

        $('#user_picture').change(function (){
            myfunction();
            $('#user_username').keyup(function(){
                myfunction();
            });
        });

        $('.add-user-form').validate({
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function (error, e) {
                jQuery(e).parents('.form-group').append(error);
            },
            highlight: function (e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
            },
            success: function (e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid');
                jQuery(e).remove();
            },
            rules: {
                'user_fullname': {
                    required: true,
                    minlength: 4

                },
                'user_username': {
                    required: true,
                    minlength: 4,
                    noSpace: true
                },
                'user_email': {
                    required: true,
                    email: true
                },
                'user_password': {
                    required: true,
                    minlength: 6
                },
                'user_confirm_password': {
                    required: true,
                    minlength: 6,
                    equalTo: '#user_password'

                }
            },
            messages: {
                'user_username': {
                    required: "S'il vous plaît entrer le nom d'utilisateur",
                    minlength: 'Votre nom d\'utilisateur doit comporter au moins 4 caractères',
                    noSpace:'Pas d\'espace dans le nom d\'utilisateur'
                },
                'user_password': {
                    required: 'S\'il vous plaît entrer le mot de pass',
                    minlength: 'Votre mot de pass doit comporter au moins 6 caractères'
                },
                'user_confirm_password': {
                    required: 'S\'il vous plaît confirmer le mot de pass',
                    equalTo:'Entrez le même mot de passe que ci-dessus'

                },
                'user_fullname': {
                    required: "S'il vous plaît entrer votre nom",
                    minlength: 'Votre nom d\'utilisateur doit comporter au moins 4 caractères'
                },
                'user_email': {
                    required: "S'il vous plaît entrer votre email",
                    email: 'Votre email m\'est pas valid'
                }

            }
        });

        if(!$(".add-user-form").valid()) return;

        e.preventDefault();
        var _token = $("input[name='_token']").val();
        var user_username = $("input[name='user_username']").val();
        var user_email = $("input[name='user_email']").val();
        // var user_fullname = $("input[name='user_fullname']").val();
        // var user_tele = $("input[name='user_tele']").val();
        // var user_adresse = $("input[name='user_adresse']").val();
        // var user_password = $("input[name='user_password']").val();
        // var user_picture = $("input[name='user_picture']").val();
        // var user_permission = $("input[name='user_permission']").val();

        $.ajax({

            url: "/users",

            type:'POST',

            data: {
                _token:_token,
                username:user_username,
                email:user_email
                //                        password:user_password,
                //                        fullname:user_fullname,
                //                        tele:user_tele,
                //                        adresse:user_adresse,
                //                        picture:user_picture,
                //                        admin:user_permission
            },

            success: function(data) {

                if(!$.isEmptyObject(data.error)){
                    // printErrorMsg(data.error);
                    email_error ='The email has already been taken.';
                    username_error ='The username has already been taken.';
                    $( ".error-block " ).remove();
                    $.each( data.error, function( key, value ) {

                        if(value==username_error){
                            $("#user_username").addClass( "error-border-color" );
                            $(".username-group label").addClass( "error-lbl-color" );
                            $(".username-group").append('<div class="error-block animated fadeInDown" style="color: #ef5350">Nom d\'utilisateur est déjà exist.</div>');
                        }
                        if(value==email_error){
                            $("#user_email").addClass( "error-border2-color" );
                            $(".email-group label").addClass( "error-lbl2-color" );
                            $(".email-group").append('<div class="error-block animated fadeInDown" style="color: #ef5350">Adresse email est déjà exist.</div>');
                        }
                        //remove error class
                        if(value!=username_error){
                            $("#user_email").removeClass( "error-border-color" );
                            $("#email-lbl").removeClass( "error-lbl-color" );
                        }
                        if(value!=email_error){
                            $("#user_email").removeClass( "error-border2-color" );
                            $("#email-lbl").removeClass( "error-lbl2-color" );
                        }

                    });
                }

            }

        });


        // });
        // function printErrorMsg (msg) {
        //
        //     $(".print-error-msg").find("ul").html('');
        //
        //     $(".print-error-msg").css('display','block');
        //
        //     $.each( msg, function( key, value ) {
        //
        //         $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        //
        //     });
        //
        // }
        // }
    });











});