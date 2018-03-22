// Init form validation on material wizard form
$(function() {

    //validation for Add piece
    $('.add-piece-form').validate({
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
                'categorie' :{
                    required : true
                },
                'service' :{
                    required : true
                },
                'libelle' : {
                    required : true
                },
                'price' : {
                    required : true
                }
            },
            messages:{
                'categorie' : 'S\'il vous plaît entrer la categorie du pièce!',
                'service' : 'S\'il vous plaît entrer le service pour cette pièce!',
                'price' : 'S\'il vous plaît entrer le prix du pièce!',
                'libelle' : 'S\'il vous plaît entrer le nom du pièce!'
            }
        });

    // validation for Edit users
    $('.edit-piece-form-form').validate({
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
            'categorie' :{
                required : true
            },
            'service' :{
                required : true
            },
            'libelle' : {
                required : true
            },
            'price' : {
                required : true
            }
        },
        messages:{
            'categorie' : 'S\'il vous plaît entrer la categorie du pièce!',
            'service' : 'S\'il vous plaît entrer le service pour cette pièce!',
            'price' : 'S\'il vous plaît entrer le prix du pièce!',
            'libelle' : 'S\'il vous plaît entrer le nom du pièce!'
        }

    });

    // get data from table to modal
    $('.btn-edit-modal').click(function () {
        $('.edit-piece-form').find('#add-item').removeAttr('data-id');
        $('.edit-piece-form').find("select#categorie").val('');
        $('.edit-piece-form').find("select#service").val('');
        $('.edit-piece-form').find("#description").val('');
        $('.edit-piece-form').find('#libelle').val('');
        $('.edit-piece-form').find('#price').val('');
        $('.edit-piece-form').find('#quantity').val('1');

        var id = $(this).data('id');
        var categorie = $(this).closest('.commande_item').find('.categorie').html();
        var service = $(this).closest('.commande_item').find('.service').html();
        var libelle = $(this).closest('.commande_item').find('.libelle').html();
        var description = $(this).closest('.commande_item').find('.description').html();
        var price = $(this).closest('.commande_item').find('.price').html();
        var quantity = $(this).closest('.commande_item').find('.quantity').html();

        $('.edit-piece-form').attr('action','/vetements/'+id);
        $('.edit-piece-form').find("select#categorie").val(categorie);
        $('.edit-piece-form').find("select#service").val(service);
        $('.edit-piece-form').find('#libelle').val(libelle);
        $('.edit-piece-form').find('#description').val(description);
        $('.edit-piece-form').find('#price').val(price);
        $('.edit-piece-form').find('#quantity').val(quantity);
    });
});
