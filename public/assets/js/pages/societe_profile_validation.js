// Init form validation on material wizard form
$(function() {

    $('.browse').click(function(){ $('#societe_logo').trigger('click'); });
    $('#logo_name').click(function(){ $('#societe_logo').trigger('click'); });
    // Societe Logo
    if($('#societe_logo').val()!=''){
        var filename = $('#societe_logo').val().split('\\').pop();
        $("#logo_name").val(filename);

    }else $('#logo_name').val('No image selectionner');

    $("#societe_logo").change(function(){
        var filename = $('#societe_logo').val().split('\\').pop();
        $("#logo_name").val(filename);

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









