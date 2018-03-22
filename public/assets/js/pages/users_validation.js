// Init form validation on material wizard form
$(function() {

    // functions for validation
    jQuery.validator.addMethod("noSpace", function(value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "No space please and don't leave it empty");

    $.validator.addMethod('filesize', function(value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    });

    // add user picture
    if($('.add-user-form #picture').val()!=''){
        var filename = $('.add-user-form #picture').val().split('\\').pop();
        $(".add-user-form .filename").val(filename);

    }else $('.add-user-form .filename').val('No image selectionner');

    $(".add-user-form #picture").change(function(){
        var filename = $('.add-user-form #picture').val().split('\\').pop();
        $(".add-user-form .filename").val(filename);
    });

    // edit user picture
    if($('.edit-user-form #picture').val()!=''){
        var filename_edit = $('.edit-user-form #picture').val().split('\\').pop();
        $(".edit-user-form .filename").val(filename_edit);

    }else $('.edit-user-form .filename').val('No image selectionner');

    $(".edit-user-form #picture").change(function(){
        var filename_edit = $('.edit-user-form #picture').val().split('\\').pop();
        $(".edit-user-form .filename").val(filename_edit);
    });


    //validation for Add users
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
                       // $(document).ajaxStop(function(){
                       //     window.location.reload();
                       // });
                        alert('Success');
                    },
                    error: function(data){
                        $errors = data.responseJSON;
                        $.each( $errors, function( key, value ) {
                            $('#'+key).parents('.add-user-form .form-group').removeClass('is-invalid');
                            $('#'+key).parents('.add-user-form .form-group').find('.invalid-feedback').remove();
                            $('#'+key).parents('.add-user-form .form-group').addClass('is-invalid');
                            $('#'+key).parents('.add-user-form .form-group').append('<div class="invalid-feedback animated fadeInDown">'+value+'</div>');
                        });
                    }
                });
            }
        });
    //validation for Edit users
    $('.edit-user-form').validate({
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
                equalTo: '#password-edit'
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
            var id = $('.edit-user-form').find('#add').data('id');
            $.ajax({
                url: "/users/update/"+id,
                type:"POST",
                data:$('.edit-user-form').serialize(),
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
                        $('#'+key+'-edit').parents('.edit-user-form .form-group').removeClass('is-invalid');
                        $('#'+key+'-edit').parents('.edit-user-form .form-group').find('.invalid-feedback').remove();
                        $('#'+key+'-edit').parents('.edit-user-form .form-group').addClass('is-invalid');
                        $('#'+key+'-edit').parents('.edit-user-form .form-group').append('<div class="invalid-feedback animated fadeInDown">'+value+'</div>');

                    });
                }
            });
        }
    });

    // get data from table to modal
    $('.btn-alt-primary').click(function () {
        $('.edit-user-form').find('#add').removeAttr('data-id');
        $('.edit-user-form').find('.profile').removeAttr('src');
        $('.edit-user-form').find('#username-edit').val('');
        $('.edit-user-form').find('#email-edit').val('');
        $('.edit-user-form').find('#fullname').val('');
        $('.edit-user-form').find('#adresse').val('');
        $('.edit-user-form').find('#tele').val('');
//      $('.edit-user-form').find('#permission').removeAttr("selected");
        $('.edit-user-form').find('#password-edit').val('');
        $('.edit-user-form').find('#password_confirmation').val('');
        var id = $(this).data('id');
        var username = $(this).closest('.mycells').find('.username').html();
        var email = $(this).closest('.mycells').find('.email').html();
        var fullname = $(this).closest('.mycells').find('.fullname').html();
        var adresse = $(this).closest('.mycells').find('.adresse').html();
        var tele = $(this).closest('.mycells').find('.tele').html();
        var picture = $('.mycells img').attr('src');
        $('.edit-user-form').attr('action','/users/update/'+id);
        $('.edit-user-form').find('#add').attr('data-id',id);
        $('.edit-user-form').find('.profile').attr('src',picture);
        $('.edit-user-form').find('#username-edit').val(username);
        $('.edit-user-form').find('#email-edit').val(email);
        $('.edit-user-form').find('#fullname').val(fullname);
        $('.edit-user-form').find('#adresse').val(adresse);
        $('.edit-user-form').find('#tele').val(tele);
    });
});
