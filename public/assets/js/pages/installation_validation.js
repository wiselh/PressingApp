var InstallationForm = function() {
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

    // functions for validation
    jQuery.validator.addMethod("noSpace", function(value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "No space please and don't leave it empty");

    $.validator.addMethod('filesize', function(value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    });


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

    var initWizardValidation = function(){
        // Get forms
        var formMaterial    = jQuery('.global-form');

        // Init form validation on material wizard form
        var validatorMaterial = formMaterial.validate({
            errorClass: 'invalid-feedback animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');

                if(jQuery("#user_picture").is(e)){
                    $('.lbl-user-picture').css('color','#ef5350');
                    jQuery(e).closest('.form-group').removeClass('is-invalid');
                }
                if(jQuery("#societe_logo").is(e)){
                    jQuery(e).closest('.form-group').removeClass('is-invalid');
                    $('.lbl-logo-picture').css('color','#ef5350');
                }
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('is-invalid');
                jQuery(e).remove();
            },
            rules: {
                'username': {
                    required: true,
                    minlength: 4,
                    noSpace :true
                },
                'user_email': {
                    required: true,
                    email: true
                },
                'user_fullname': {
                    required: true
                },
                'password': {
                    required: true,
                    minlength: 6
                },
                'confirm_password': {
                    equalTo: '#password'
                },
                'user_picture': {
                    accept: "image/jpg,image/jpeg,image/png",
                    filesize: 2097152
                },
                //societe
                'societe_name': {
                    required: true
                },
                'societe_email': {
                    email: true
                },
                'societe_adresse': {
                    required: true
                },
                'societe_tele': {
                    required: true
                },
                'societe_city': {
                    required: true
                },
                'societe_logo': {
                    accept: "image/jpg,image/jpeg,image/png",
                    filesize: 2097152
                }
            },
            messages: {
                'username': {
                    required: "S'il vous plaît entrer le nom d'utilisateur",
                    minlength: 'Votre nom d\'utilisateur doit comporter au moins 4 caractères',
                    noSpace:'Pas d\'espace dans le nom d\'utilisateur'
                },
                'user_email':{
                    required:  'S\'il vous plaît entrer votre email',
                    email:  'S\'il vous plaît entrer l\'adresse email valid!'
                },
                'user_fullname':'S\'il vous plaît entrer votre nom complete',
                'password': {
                    required: 'S\'il vous plaît entrer le mot de pass',
                    minlength: 'Votre mot de pass doit comporter au moins 6 caractères'
                },
                'confirm_password': {
                    equalTo: 'Entrez le même mot de passe que ci-dessus'
                },
                'user_picture': {
                    accept : "Le fichier doit être au format JPG, JPEG ou PNG",
                    filesize :'Le fichier doit être moins de 2 Mb'
                },
                //societe
                'societe_name': 'S\'il vous plaît entrer le nom de la societe',
                'societe_email':{
                    email:'S\'il vous plaît entrer l\'adresse email valid!'
                },
                'societe_adresse': 'S\'il vous plaît entrer l\'adresse de la societe',
                'societe_tele': 'S\'il vous plaît entrer le telephone de la societe',
                'societe_city': 'S\'il vous plaît entrer la ville de la societe',
                'societe_logo':{
                    accept : "L'image de logo doit être au format JPG, JPEG ou PNG",
                    filesize :'L\'image logo doit être moins de 2 Mb'
                }

            }

        });

        // Init wizard with validation ?????
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

    var initImageUpload = function () {

        //     User Photo Profile
        if($('.global-form #user_picture').val()!=''){
            var filename = $('.global-form #user_picture').val().split('\\').pop();
            $(".global-form .filename").val(filename);

        }else $('.global-form .filename').val('No image selectionner');

        $(".global-form #user_picture").change(function(){
            var filename = $('.global-form #user_picture').val().split('\\').pop();
            $(".global-form .filename").val(filename);
        });

        //     Logo de la societe
        if($('.global-form #societe_logo').val()!=''){
            var filename_logo = $('.global-form #societe_logo').val().split('\\').pop();
            $(".global-form .filename-logo").val(filename_logo);

        }else $('.global-form .filename-logo').val('No image selectionner');

        $(".global-form #societe_logo").change(function(){
            var filename_logo = $('.global-form #societe_logo').val().split('\\').pop();
            $(".global-form .filename-logo").val(filename_logo);
        });
    };

    var initFillCityDropdownlist = function () {
        // cities
        var serviceArray = ["Rabat", "Ad Dakhla", "Agadir", "Al Hoceima", "Azilal", "Beni Mellal", "Ben Slimane",
            "Boujdour", "Boulemane", "Casablanca", "Chaouen", "El Jadida", "El Kelaa des Sraghna",
            "Er Rachidia", "Essaouira", "Es Smara", "Fes", "Figuig", "Guelmim", "Ifrane", "Kenitra",
            "Khemisset", "Khenifra", "Khouribga", "Laayoune", "Larache", "Marrakech", "Meknes", "Nador",
            "Ouarzazate", "Oujda", "Safi", "Settat", "Sidi Kacem", "Tanger", "Tan-Tan", "Taounate",
            "Taroudannt", "Tata", "Taza", "Tetouan", "Tiznit"];

        for (i = 0; i < serviceArray.length; i++) {
            var data = '<option value="' + serviceArray[i] + '">' + serviceArray[i] + '</option>';
            $('#societe_city').append(data);
        }
    };

    return {
        init: function () {
            // Init Wizard Defaults
            initWizardDefaults();

            // Init Form Simple Wizard
            initWizardSimple();

            // Init Form Validation Wizard
            initWizardValidation();

            // Init change name upload image
            initImageUpload();

            //fill cities dropdownlist
            initFillCityDropdownlist();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ InstallationForm.init(); });
