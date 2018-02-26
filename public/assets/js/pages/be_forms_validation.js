/*
 *  Document   : be_forms_validation.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Form Validation Page
 */

var BeFormValidation = function() {
    // Init Bootstrap Forms Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationBootstrap = function(){
        jQuery('.js-validation-bootstrap').validate({
            ignore: [],
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid');
                jQuery(e).remove();
            },
            rules: {
                'nom': {
                    required: true,
                    minlength: 3
                },
                // 'adresse': {
                //     required: true
                // },
                // 'tele': {
                //     required: true
                // },
                'categorie': {
                    required: true
                },
                'type': {
                    required: true
                },
                'paye': {
                    required: true
                },
                'couleur': {
                    required: true
                },
                'date_retrait': {
                    required: true
                },
                'prix': {
                    required: true
                }
            },
            messages: {
                'nom': {
                    required: 'Please enter a username',
                    minlength:'minimum 4 characters '
                },
                'adresse': 'Please enter a valid email address',
                'type': 'Please select a value!',
                'categorie': 'categorie',
                'couleur': 'couleur!',
                'tele': 'tele',
                'prix': 'prix',
                'paye': '! Choisez Oui ou Non',
                'date_retrait': 'date'
            }
        });
    };



    return {
        init: function () {
            // Init Bootstrap Forms Validation
            initValidationBootstrap();

            // Init Validation on Select2 change
            jQuery('.js-select2').on('change', function(){
                jQuery(this).valid();
            });
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BeFormValidation.init(); });
