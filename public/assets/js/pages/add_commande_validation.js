var BeFormValidation = function() {
    // Init Bootstrap Forms Validation, for more examples you can check out https://github.com/jzaefferer/jquery-validation

    var initFormValidation = function(){
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
                    required:{
                        depends: function(element){
                            if($('#old_client').val()==''){
                                return true;
                            }
                        }
                    },
                    minlength: 4
                },
                'payment_paid': {
                    required: '#paid[value="oui"]:checked'
                },
                'payment_mode': {
                    required: '#paid[value="oui"]:checked'
                }
            },
            messages: {
                'client_name': {
                    required: 'Le champ Nom est obligatoire.',
                    minlength:'Minimum 4 characters.    '
                },
                'payment_paid': 'Le champ Montant est obligatoire..',
                'payment_mode': 'Choisez le mode de paiement.'

            },
            submitHandler: function(e) {
                $.ajax({
                    url: "/commandes",
                    type:"POST",
                    data:$('.add_commande_form').serialize(),
                    success: function(data) {
                        // $(document).ajaxStop(function(){
                        //     window.location.reload();
                        // });
                        alert('Success');
                    },
                    error: function(data){
                        $errors = data.responseJSON;
                        $.each( $errors, function( key, value ) {
                            console.log(key +' ==> '+ value);
                            var field = key.split('.');
                            if(field.length>1)
                                fieldname = '#'+field[0]+'\\.'+field[1];
                            else
                                fieldname = '#'+field[0];

                            $(fieldname).parents('.add_commande_form .form-group').removeClass('is-invalid').addClass('is-invalid');
                            $(fieldname).parents('.add_commande_form .form-group').find('.col-form-label').css('color','#ef5350');
                            $(fieldname).parents('.add_commande_form .form-group').find('.invalid-feedback').remove();
                            $(fieldname).parents('.add_commande_form .form-group')
                                .append('<div class="invalid-feedback animated fadeInDown">'+value+'</div>');
                        });
                    }
                });
            }

        });
    };
    var initCloneArticle = function () {
    var id = 1;
        //clone
        $("#add").click(function() {
            $('#pieces #piece:last-child').clone(true).insertAfter('#pieces #piece:last-child');
            $('#pieces #piece:last-child').attr('data-id',id);

            $('#pieces #piece:last-child').last().find('input:text').val('');
            $('#pieces #piece:last-child').last().find('.categorie').attr('id','categorie.'+id);
            $('#pieces #piece:last-child').last().find('.service').attr('id','service.'+id);
            $('#pieces #piece:last-child').last().find('.libelle').attr('id','libelle.'+id);
            $('#pieces #piece:last-child').last().find('.price').attr('id','price.'+id);
            $('#pieces #piece:last-child').last().find('.remove').attr('id','remove.'+id);
            $('#pieces #piece:last-child').last().find('#description').val('');
            $('#pieces #piece:last-child').last().find('#quantity').val('1');
            id++;
            return false;
        });

         // remove item
        $('.remove').click(function () {
            if(!$(this).closest('#piece').is($('#remove\\.0').closest('#piece')))
                $(this).closest('#piece').remove();
        });
    };
    var initCalculatePrice = function () {
        // total price calculate
        $('.quantity,.price').bind('keyup change' , function () {
            var textValue1 = $(this).closest('#piece').find('.price').val();
            var textValue2 = $(this).closest('#piece').find('.quantity').val();
            $(this).closest('#piece').find('.total_price').val(textValue1 * textValue2);
            var sum = 0;
            $(".total_price").each(function () {
                sum += +$(this).val();
            });
            $("#montant").html('Montant Total: ' +sum);
        });
    };
    var initCheckPaymentMode = function () {
        // check payment mode
        if($("input[type='radio']:checked").val()=='oui'){
            $('#payment_mode').prop('disabled', false);
            $('#payment_paid').prop('disabled', false);
            }else{
            $('#payment_mode').prop('disabled', true);
            $('#payment_paid').prop('disabled', true);
        }
        $("input[type='radio']").change(function () {
            if($("input[type='radio']:checked").val()=='oui'){
                $('#payment_mode').prop('disabled', false);
                $('#payment_paid').prop('disabled', false);
                // $('#payment_mode').css('cursor','inherit');
                // $('#payment_paid').css('cursor','no-inherit');

            }else{
                $('#payment_mode').prop('disabled', true);
                $('#payment_paid').prop('disabled', true);
                // $('#payment_mode').css('cursor','no-drop');
                // $('#payment_paid').css('cursor','no-drop');
            }
        });
    };
    var initCheckClient = function () {
        // check if is old client or new one
        if($('#old_clientclient').val()!='')$('#check_client').val('old');
        else $('#check_client').val('new');

        // set inputs empty when we the client is selected
        $('#old_client').change(function () {
            if($('#old_client').val()!=''){
                $('#client_name').prop('disabled', true);
                $('#client_tele').prop('disabled', true);
                $('#client_adresse').prop('disabled', true);
                $('#client_name').val('');
                $('#client_tele').val('');
                $('#client_adresse').val('');
                $(this).closest('.client').find('.form-group').removeClass('is-invalid');
                $('#check_client').val('old');

            }else {
                $('#client_name').prop('disabled', false);
                $('#client_tele').prop('disabled', false);
                $('#client_adresse').prop('disabled', false);
                $('#check_client').val('new');
            }

        });

        // show and hide client form
        // $('#close-new-client-form').click(function () {
        //     $('#close-new-client-form').css('display','none');
        //     $('#add-new-client').css('display','inherit');
        //     $('.new-client-block').toggleClass("bounceOutRight bounceInRight");
        // });
        // $('#add-new-client').click(function () {
        //     $('#close-new-client-form').css('display','inherit');
        //     $('#add-new-client').css('display','none');
        //     $('#old_clientclient').val('').trigger('change');
        //     $('.new-client-block').css('display','inherit');
        //     $('.new-client-block').toggleClass("bounceInRight bounceOutRight");
        // });
    };
    var initOtherStuff = function () {

        $('.form-control').each(function () {
            $(this).change(function() {

                if($(this).val()!='')
                {
                    $(this).parents('.add_commande_form .form-group').removeClass('is-invalid');
                    $(fieldname).parents('.add_commande_form .form-group').find('.col-form-label').css('color','#575757');
                    $(this).parents('.add_commande_form .form-group').find('.invalid-feedback').remove();
                }
            });
        });
    };

    return {
        init: function () {
            // Init Forms Validation
            initFormValidation();

            initCloneArticle();

            initCalculatePrice();

            initCheckPaymentMode();

            initCheckClient();

            initOtherStuff();

            // Init Validation on Select2 change
            // jQuery('.js-select2').on('change', function(){
            //     jQuery(this).valid();
            // });
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BeFormValidation.init(); });
