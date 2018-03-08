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
                'client_name': {
                    required: true,
                    minlength: 3
                },
                'vetement_date_retrait': {
                    required: true
                },
                'vetement_paid': {
                    required: true
                },
                'categorie[]': {
                    required: true
                },
                'vetement_price[]': {
                    required: true
                },
                'service[]': {
                    required: true
                }
            },
            messages: {
                'client_name': {
                    required: 'Le champ Nom est obligatoire.',
                    minlength:'minimum 4 characters '
                },
                'service[]': 'Le champ Type de service est obligatoire.',
                'categorie[]': 'Le champ Categorie est obligatoire.',
                'vetement_price[]': 'Le champ Prix est obligatoire.',
                'vetement_paid': 'Choisez Oui ou Non.',
                'vetement_date_retrait': 'Le champ Date de Retrait est obligatoire.'
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
