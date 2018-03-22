// Init form validation on material wizard form
$(function() {

    $('.btn-alt-primary').click(function () {
        var id = $(this).data('id');
        var fullname = $(this).data('name');
        var tele = $(this).data('tele');
        var adresse = $(this).data('adresse');
        // alert(id);
        $('.edit-client-form').find('#fullname').val(fullname);
        $('.edit-client-form').attr('action','/clients/'+id);
        $('.edit-client-form').find('#adresse').val(adresse);
        $('.edit-client-form').find('#tele').val(tele);

    });

    //validation for Add users
    $('.edit-client-form').validate({
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
                'fullname': {
                    required: true,
                    minlength: 4
                }
            },
            messages: {
                'fullname': {
                    required: "S'il vous plaît entrer le nom du client",
                    minlength: 'Votre nom du client doit comporter au moins 4 caractères'
                }
            }

        });
});
