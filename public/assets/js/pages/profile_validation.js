// Init form validation on material wizard form
$(function() {

    jQuery.validator.addMethod("noSpace", function(value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "No space please and don't leave it empty");

    $('.profile-form').validate({
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
            'profile_fullname': {
                required: true
            },
            'profile_username': {
                required: true,
                minlength: 4,
                noSpace: true
            },
            'profile_email': {
                required: true,
                email: true
            }
        },
        messages: {
            'profile_username': {
                required: "S'il vous plaît entrer le nom d'utilisateur",
                minlength: 'Votre nom d\'utilisateur doit comporter au moins 4 caractères',
                noSpace:'Pas d\'espace dans le nom d\'utilisateur'
            },
            'profile_fullname': 'S\'il vous plaît entrer votre nom',
            'profile_email': 'S\'il vous plaît entrer votre email'

        }
    });
    $('.password-form').validate({
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
                'profile_password': {
                    required: true,
                    minlength: 6
                },
                'profile_confirm_password': {
                    minlength: 6,
                    equalTo: '#profile_password'

                }
            },
            messages: {
                'profile_password': {
                    // required: 'S\'il vous plaît entrer le mot de pass',
                    minlength: 'Votre mot de pass doit comporter au moins 6 caractères'
                },
                'profile_confirm_password': {
                    equalTo:'Entrez le même mot de passe que ci-dessus'

                }
            }
        });
    });









