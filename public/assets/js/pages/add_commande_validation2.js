$(function () {
    //clone
    $("#add").click(function() {
        $('#vetements #vetement:last').clone(true).insertBefore('#add_button');
        $('#vetements #vetement').last().find('input:text').val('');
        $('#vetements #vetement').last().find('#vetement_description').val('');
        $('#vetements #vetement').last().find('#vetement_quantity').val('1');
        return false;
    });
    // total price calculate
    $('#vetement_quantity,#vetement_price').bind('keyup change' , function () {
        var textValue1 = $(this).closest('#vetement').find('.vetement_price').val();
        var textValue2 = $(this).closest('#vetement').find('.vetement_quantity').val();
        $(this).closest('#vetement').find('.total_price').val(textValue1 * textValue2);

        var sum = 0;
        $(".total_price").each(function () {
            sum += +$(this).val();
        });

        $("#montant").html('Montant Total: ' +sum);
    });

    // $('#categorie').change(function() {
    //     if($(this).val()!='')
    //     {
    //         $( "div:has(#categorie)").removeClass('is-invalid');
    //     }
    // });
    // $('#service').change(function() {
    //     if($(this).val()!='')
    //     {
    //         $( "div:has(#service)").removeClass('is-invalid');
    //     }
    // });

    // jQuery(function () {
    //     // Init page helpers (Select2 plugin)
    //     Codebase.helpers('select2');
    // });

    // $('#vetement_price').each(function() {
    //     if($(this).closest('#vetement').find('.vetement_price').val(''))
    //         $(this).css('border','1px solid red');
    // });

// check payment mode

    if($("input[type='radio']:checked").val()=='oui'){
        $('#payment_mode').prop('disabled', false);
        $('#payment_paid').prop('disabled', false);
        $('#payment_mode').css('cursor','inherit');
        $('#payment_paid').css('cursor','inherit');
    }else{
        $('#payment_mode').prop('disabled', true);
        $('#payment_paid').prop('disabled', true);
        $('#payment_mode').css('cursor','no-drop');
        $('#payment_paid').css('cursor','no-drop');
    }
    $("input[type='radio']").change(function () {
        if($("input[type='radio']:checked").val()=='oui'){
            $('#payment_mode').prop('disabled', false);
            $('#payment_paid').prop('disabled', false);
            $('#payment_mode').css('cursor','inherit');
            $('#payment_paid').css('cursor','no-inherit');

        }else{
            $('#payment_mode').prop('disabled', true);
            $('#payment_paid').prop('disabled', true);
            $('#payment_mode').css('cursor','no-drop');
            $('#payment_paid').css('cursor','no-drop');
        }
    });



    // set inputs empty when we the client is selected

    $('#client').change(function () {
        if($('#client').val()!=''){
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

    // check if is old client or new one
    if($('#client').val()!='')$('#check_client').val('old');
    else $('#check_client').val('new');



    // show and hide client form

    $('#clickme2').click(function () {

        $('#clickme2').css('display','none');
        $('#clickme').css('display','inherit');
        $('.new-client-block').toggleClass("bounceOutRight bounceInRight");


    });
    $('#clickme').click(function () {

        $('#clickme2').css('display','inherit');
        $('#clickme').css('display','none');

        $('#client').val('').trigger('change');

        $('.new-client-block').css('display','inherit');
        $('.new-client-block').toggleClass("bounceInRight bounceOutRight");

        console.log($("#client").val());
    });

});

