var BeUIActivity = function() {

    // SweetAlert2, for more examples you can check out https://github.com/limonte/sweetalert2
    var sweetAlert2 = function(){
        // Set default properties
        swal.setDefaults({
            buttonsStyling: false,
            confirmButtonClass: 'btn btn-lg btn-alt-success m-5',
            cancelButtonClass: 'btn btn-lg btn-alt-danger m-5',
            inputClass: 'form-control'
        });

        jQuery('.btn-alt-danger').on('click', function(e){
            swal({
                title: 'Vous Êtes Sûr?',
                text: 'Vous ne pourrez pas récupérer cette Piece!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d26a5c',
                confirmButtonText: 'Oui, Supprimer!',
                html: false,
                preConfirm: function() {
                    return new Promise(function (resolve) {
                        setTimeout(function () {
                            resolve();
                        }, 50);
                    });
                }
            }).then(
                function (result) {
                    var id = $(e.currentTarget).data('id');
                    $.ajax({
                        url: "/vetements/delete/"+id,
                        type:"GET",
                        data:id,
                        success: function(data) {
                            swal('Supprimé!', 'l\'utilisateur a été supprimé.', 'success');
                            $(e.currentTarget).closest('.commande_item').remove();
                        },
                        error: function(data){
                            $errors = data.responseJSON;
                            swal('Oops...', 'Quelque chose s\'est mal passé!', 'error');
                        }
                    });
                }, function(dismiss) {
                    // dismiss can be 'cancel', 'overlay', 'esc' or 'timer'
                }
            );
        });
    };

    return {
        init: function() {

            sweetAlert2();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BeUIActivity.init(); });