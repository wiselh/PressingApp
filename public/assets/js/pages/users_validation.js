// Init form validation on material wizard form
$(function() {

    jQuery.validator.addMethod("noSpace", function(value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "No space please and don't leave it empty");

    // var myfunction = function () {
    //     if($('#picture').val() != '')
    //     {
    //         var path = $('#picture').val();
    //         var ext = path.split('.').pop();
    //         var pic_name = '';
    //         var username = $('#username').val();
    //
    //         if (username == "") pic_name = 'username';
    //         else pic_name = username;
    //
    //         $('#photo-name-user').html(pic_name + '.' + ext);
    //     }
    //     else $('#photo-name-user').html("Uploader Photo de Profile");
    // };
    //
    // $('#picture').change(function (){
    //     myfunction();
    //     $('#username').keyup(function(){
    //         myfunction();
    //     });
    // });

    $('.photo-user-profile').click(function(){ $('#picture').trigger('click'); });

    $.validator.addMethod('filesize', function(value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    });

    $('.add-user-form').validate({
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
            ignore: "",
            rules: {
                'fullname': {
                    required: true,
                    minlength: 4
                },
                'username': {
                    required: true,
                    minlength: 4,
                    noSpace: true
                },
                'email': {
                    required: true,
                    email: true
                },
                'password': {
                    required: true,
                    minlength: 6
                },
                'password_confirmation': {
                    required: true,
                    equalTo: '#password'
                },
                'permission': {
                    required: true
                },
                'picture': {
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
                'password': {
                    required: 'S\'il vous plaît entrer le mot de pass',
                    minlength: 'Votre mot de pass doit comporter au moins 6 caractères'
                },
                'password_confirmation': {
                    required: 'S\'il vous plaît confirmer le mot de pass',
                    equalTo:'Entrez le même mot de passe que ci-dessus'
                },
                'fullname': {
                    required: "S'il vous plaît entrer votre nom",
                    minlength: 'Votre nom d\'utilisateur doit comporter au moins 4 caractères'
                },
                'email': {
                    required: "S'il vous plaît entrer votre email",
                    email: 'Votre email m\'est pas valid'
                },
                'permission': {
                    required: "S'il vous plaît entrer les permission pour cet utilisateur"
                },
                'picture' : {
                    accept : "Le fichier doit être au format JPG, JPEG ou PNG",
                    filesize :'Le fichier doit être moins de 2 Mb'
                }
            },
            submitHandler: function(e) {
                $.ajax({
                    url: "/users",
                    type:'POST',
                    data:$('.add-user-form').serialize(),
                    success: function(data) {
                       $(document).ajaxStop(function(){
                           window.location.reload();
                       });
                    },
                    error: function(data){
                        $errors = data.responseJSON;
                        $.each( $errors, function( key, value ) {
                            $('#'+key).parents('.form-group').removeClass('is-invalid');
                            $('#'+key).parents('.form-group').find('.invalid-feedback').remove();
                            $('#'+key).parents('.form-group').addClass('is-invalid');
                            $('#'+key).parents('.form-group').append('<div class="invalid-feedback animated fadeInDown">'+value+'</div>');
                        });
                    }
                });
            }
        });

    // user picture
    if($('#picture').val()!=''){
        var filename = $('#picture').val().split('\\').pop();
        $(".filename").val(filename);

    }else $('.filename').val('No image selectionner');

    $("#picture").change(function(){
        var filename = $('#picture').val().split('\\').pop();
        $(".filename").val(filename);

    });
});