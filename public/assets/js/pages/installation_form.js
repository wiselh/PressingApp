/*
 *  Document   : be_forms_wizard.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Form Wizard Page
 */

var BeFormWizard = function() {
    // Init Wizard defaults
    var initWizardDefaults = function(){
        jQuery.fn.bootstrapWizard.defaults.tabClass         = 'nav nav-tabs';
        jQuery.fn.bootstrapWizard.defaults.nextSelector     = '[data-wizard="next"]';
        jQuery.fn.bootstrapWizard.defaults.previousSelector = '[data-wizard="prev"]';
        jQuery.fn.bootstrapWizard.defaults.firstSelector    = '[data-wizard="first"]';
        jQuery.fn.bootstrapWizard.defaults.lastSelector     = '[data-wizard="lsat"]';
        jQuery.fn.bootstrapWizard.defaults.finishSelector   = '[data-wizard="finish"]';
        jQuery.fn.bootstrapWizard.defaults.backSelector     = '[data-wizard="back"]';
    };



    // Init wizards with validation, for more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard
    // and https://github.com/jzaefferer/jquery-validation
    var initWizardValidation = function(){
        // Get forms

        var formMaterial    = jQuery('.js-wizard-validation-material-form');

        // Prevent forms from submitting on enter key press
        formMaterial.add(formMaterial).on('keyup keypress', function (e) {
            var code = e.keyCode || e.which;

            if (code === 13) {
                e.preventDefault();
                return false;
            }
        });

        // Init form validation on material wizard form
        var validatorMaterial = formMaterial.validate({
            errorClass: 'invalid-feedback animated fadeInDown',
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
                //user
                'user_name': {
                    required: true
                },
                'username': {
                    required: true,
                    minlength: 4
                },
                'user_email': {
                    required: true,
                    email: true
                },
                'password': {
                    required: true,
                    minlength: 6
                },
                'confirm_password': {
                    required: true,
                    minlength: 6,
                    equalTo: '#password'
                },
                //society
                'societe_name': {
                    required: true
                },
                // 'societe_email': {
                //     required: true,
                //     email: true
                // },
                'societe_adresse': {
                    required: true
                },
                'societe_tele': {
                    required: true
                },
                'societe_ville': {
                    required: true
                }
                // 'societe_logo': {
                //     required: true
                // }

            },
            messages: {
                'username': {
                    required: "S'il vous plaît entrer le nom d'utilisateur",
                    minlength: 'Votre nom d\'utilisateur doit comporter au moins 4 caractères'
                },
                'password': {
                    required: 'S\'il vous plaît entrer le mot de pass',
                    minlength: 'Votre mot de pass doit comporter au moins 6 caractères'
                },
                'confirm_password': {
                    required: 'S\'il vous plaît confirmer le mot de passe',
                    equalTo: 'Entrez le même mot de passe que ci-dessus'
                },
                'user_name': 'S\'il vous plaît entrer votre nom',
                'user_email': 'S\'il vous plaît entrer votre email',
                'societe_name': 'S\'il vous plaît entrer le nom de la societe',
                // 'societe_email': 'S\'il vous plaît entrer l\'email de la societe',
                'societe_adresse': 'S\'il vous plaît entrer l\'adresse de la societe',
                'societe_tele': 'S\'il vous plaît entrer le telephone de la societe',
                'societe_ville': 'S\'il vous plaît entrer la ville de la societe'
                // 'societe_logo': 'S\'il vous plaît entrer le logo de la societe'

            }
        });

        // Init wizard with validation
        jQuery('.js-wizard-validation-material').bootstrapWizard({
            tabClass: '',

            onNext: function(tab, navigation, index) {
                if( !formMaterial.valid() ) {
                    validatorMaterial.focusInvalid();
                    return false;
                }
            },
            onTabClick: function(tab, navigation, index) {
                jQuery('a', navigation).blur();
		return false;
            }
        });
    };

    return {
        init: function () {
            // Init Wizard Defaults
            initWizardDefaults();

            // Init Form Validation Wizard
            initWizardValidation();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BeFormWizard.init(); });
