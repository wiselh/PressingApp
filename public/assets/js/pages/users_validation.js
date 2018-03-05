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

        var myfunction = function () {
            if($('#user_picture').val() != '')
            {
                var path = $('#user_picture').val();
                var ext = path.split('.').pop();
                var pic_name = '';
                var username = $('#username').val();

                if (username == "") pic_name = 'username';
                else pic_name = username;

                $('.btn-upload').text(pic_name + '.' + ext);
            }
            else $('.btn-upload').text("Uploader Photo de Profile");
        };

        $('#user_picture').change(function (){
            myfunction();
            $('#username').keyup(function(){
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
                'username': {
                    required: true,
                    minlength: 4,
                    noSpace: true
                },
                'email': {
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
                'username': {
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
                'email': {
                    required: "S'il vous plaît entrer votre email",
                    email: 'Votre email m\'est pas valid'
                }

            }
        });

    $('#username').focusout(function () {
        $('.username-group').removeClass('is-invalid');
        $('#user_username-error').remove();
    });
    $('#email').focusout(function () {
        $('.email-group').removeClass('is-invalid');
        $('#user_email-error').remove();
    });

});