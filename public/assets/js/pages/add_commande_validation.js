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
                'date_retrait': {
                    required: true
                },
                'paye': {
                    required: true
                },
                'categorie[]': {
                    required: true
                },
                'prix[]': {
                    required: true
                },
                'service[]': {
                    required: true
                }
            },
            messages: {
                'nom': {
                    required: 'Le champ Nom est obligatoire.',
                    minlength:'minimum 4 characters '
                },
                'service[]': 'Le champ Type de service est obligatoire.',
                'categorie[]': 'Le champ Categorie est obligatoire.',
                'prix[]': 'Le champ Prix est obligatoire.',
                'paye': '! Choisez Oui ou Non',
                'date_retrait': 'Le champ Date de Retrait est obligatoire.'
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
