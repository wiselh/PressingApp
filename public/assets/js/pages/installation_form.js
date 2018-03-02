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

    // Init simple wizard, for more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard
    var initWizardSimple = function(){
        jQuery('.js-wizard-simple').bootstrapWizard({
            onTabShow: function(tab, navigation, index) {
                var percent = ((index + 1) / navigation.find('li').length) * 100;

                // Get progress bar
                var progress = navigation.parents('.block').find('[data-wizard="progress"] > .progress-bar');

                // Update progress bar if there is one
                if (progress.length) {
                    progress.css({ width: percent + 1 + '%' });
                }
            }
        });
    };

    // Init wizards with validation, for more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard
    // and https://github.com/jzaefferer/jquery-validation
    var initWizardValidation = function(){
        // Get forms
        var formClassic     = jQuery('.js-wizard-validation-classic-form');
        var formMaterial    = jQuery('.js-wizard-validation-material-form');

        // Prevent forms from submitting on enter key press
        formClassic.add(formMaterial).on('keyup keypress', function (e) {
            var code = e.keyCode || e.which;

            if (code === 13) {
                e.preventDefault();
                return false;
            }
        });

        // Init form validation on classic wizard form
        // var validatorClassic = formClassic.validate({
        //     errorClass: 'invalid-feedback animated fadeInDown',
        //     errorElement: 'div',
        //     errorPlacement: function(error, e) {
        //         jQuery(e).parents('.form-group').append(error);
        //     },
        //     highlight: function(e) {
        //         jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
        //     },
        //     success: function(e) {
        //         jQuery(e).closest('.form-group').removeClass('is-invalid');
        //         jQuery(e).remove();
        //     },
        //     rules: {
        //         //user
        //         'user_name': {
        //             required: true
        //         },
        //         'username': {
        //             required: true,
        //             minlength: 4
        //         },
        //         'user_adresse': {
        //             required: true
        //         },
        //         'user_email': {
        //             required: true,
        //             email: true
        //         },
        //         'password': {
        //             required: true,
        //             minlength: 6
        //         },
        //         //society
        //         'societe_nom': {
        //             required: true
        //         },
        //         'societe_email': {
        //             required: true,
        //             email: true
        //         },
        //         'societe_adresse': {
        //             required: true
        //         },
        //         'societe_tele': {
        //             required: true
        //         },
        //         'ville': {
        //             required: true
        //         },
        //         'logo': {
        //             required: true
        //         }
        //
        //     },
        //     messages: {
        //         'username': {
        //             required: 'Please enter a hakimmmmm',
        //             minlength: 'Your firtname must consist of at least 2 characters'
        //         },
        //         'password': {
        //             required: 'svp entrer le mot de pass',
        //             minlength: 'minimum 6 caracteres'
        //         },
        //         'user_name': 'Please enter a valid email address',
        //         'user_adresse': 'S\'il vous plaît entrer le mot de pass',
        //         'user_email': 'S\'il vous plaît entrer le mot de pass',
        //         'societe_nom': 'S\'il vous plaît entrer le mot de pass',
        //         'societe_email': 'S\'il vous plaît entrer le mot de pass',
        //         'societe_adresse': 'S\'il vous plaît entrer le mot de pass',
        //         'societe_tele': 'S\'il vous plaît entrer le mot de pass',
        //         'ville': 'S\'il vous plaît entrer le mot de pass',
        //         'logo': 'S\'il vous plaît entrer le mot de pass'
        //
        //     }
        // });

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
                'user_adresse': {
                    required: true
                },
                'user_tele': {
                    required: true
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
                'societe_email': {
                    required: true,
                    email: true
                },
                'societe_adresse': {
                    required: true
                },
                'societe_tele': {
                    required: true
                },
                'ville': {
                    required: true
                },
                'logo': {
                    required: true
                }

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
                'user_adresse': 'S\'il vous plaît entrer votre adresse',
                'user_email': 'S\'il vous plaît entrer votre email',
                'user_tele': 'S\'il vous plaît entrer votre telephone',
                'societe_name': 'S\'il vous plaît entrer le nom de la societe',
                'societe_email': 'S\'il vous plaît entrer l\'email de la societe',
                'societe_adresse': 'S\'il vous plaît entrer l\'adresse de la societe',
                'societe_tele': 'S\'il vous plaît entrer le telephone de la societe',
                'societe_ville': 'S\'il vous plaît entrer la ville de la societe',
                'societe_logo': 'S\'il vous plaît entrer le logo de la societe'

            }
        });

        // Init classic wizard with validation
        jQuery('.js-wizard-validation-classic').bootstrapWizard({
            tabClass: '',
            onTabShow: function(tab, navigation, index) {
                var percent = ((index + 1) / navigation.find('li').length) * 100;

                // Get progress bar
                var progress = navigation.parents('.block').find('[data-wizard="progress"] > .progress-bar');

                // Update progress bar if there is one
                if (progress.length) {
                    progress.css({ width: percent + 1 + '%' });
                }
            },
            onNext: function(tab, navigation, index) {
                if( !formClassic.valid() ) {
                    validatorClassic.focusInvalid();
                    return false;
                }
            },
            onTabClick: function(tab, navigation, index) {
                jQuery('a', navigation).blur();
		return false;
            }
        });

        // Init wizard with validation
        jQuery('.js-wizard-validation-material').bootstrapWizard({
            tabClass: '',
            onTabShow: function(tab, navigation, index) {
                var percent = ((index + 1) / navigation.find('li').length) * 100;

                // Get progress bar
                var progress = navigation.parents('.block').find('[data-wizard="progress"] > .progress-bar');

                // Update progress bar if there is one
                if (progress.length) {
                    progress.css({ width: percent + 1 + '%' });
                }
            },
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

            // Init Form Simple Wizard
            // initWizardSimple();

            // Init Form Validation Wizard
            initWizardValidation();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BeFormWizard.init(); });
