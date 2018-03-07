// Init form validation on material wizard form
$(function() {

    var warning = '<div class="alert alert-warning"> <strong>Warning!</strong> No Image sélectionner.</div>';
    $("#logo_location").html(warning);

    $('#societe_logo').change(function () {
        if($("#societe_logo").val()==''){
            $("#logo_location").html(warning);
        }
        else {
            var filename = $('#societe_logo').val().split('\\').pop();
            var success = '<div class="alert alert-success"> <strong>Success!</strong> Image '+filename+' a été sélectionner .</div>';
            $("#logo_location").html(success);
        }
    });

    $('.societe-form').validate({
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
            'societe_name': {
                required: true
            },
            'societe_adresse': {
                required: true,
                minlength: 4
            },
            'societe_city': {
                required: true
            }
        },
        messages: {
            'societe_name':"S'il vous plaît entrer le nom de Societe",
            'societe_adresse': 'S\'il vous plaît entrer l\'adresse de la Societe',
            'societe_city': 'S\'il vous plaît entrer la ville de la Societe'
        }
    });
    });









