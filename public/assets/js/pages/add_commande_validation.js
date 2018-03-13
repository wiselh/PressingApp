var BeFormValidation = function() {
    // Init Bootstrap Forms Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation
    var initValidationBootstrap = function(){
        jQuery('.add_commande_form').validate({
            ignore: [],
            errorClass: 'invalid-feedback animated fadeInDown error-block',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group').append(error);
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
                'commande_date_retrait': {
                    required: true
                },
                'commande_paid': {
                    required: true
                },
                'vetement_price[]': {
                    required: true
                },
                'service[]': {
                    required: true
                },
                'categorie[]': {
                    required: true
                }
            },
            messages: {
                'client_name': {
                    required: 'Le champ Nom est obligatoire.',
                    minlength:'Minimum 4 characters.    '
                },
                'service[]': 'Le champ Type de service est obligatoire.',
                'categorie[]': 'Le champ Categorie est obligatoire.',
                'vetement_price[]': 'Le champ Prix est obligatoire.',
                'commande_paid': 'Choisez Oui ou Non.',
                'commande_date_retrait': 'Le champ Date de Retrait est obligatoire.'
            }

        });
    };



    return {
        init: function () {
            // Init Bootstrap Forms Validation
            initValidationBootstrap();

            // Init Validation on Select2 change
            // jQuery('.js-select2').on('change', function(){
            //     jQuery(this).valid();
            // });
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BeFormValidation.init(); });
