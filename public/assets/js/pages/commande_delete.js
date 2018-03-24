/*
 *  Document   : be_ui_activity.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Activity Page
 */

var BeUIActivity = function() {

    var deleteCommande = function(){

        jQuery('.btn-delete').on('click', function(e){
            swal({
                title: 'Vous Êtes Sûr?',
                text: 'Vous ne pourrez pas récupérer cette commande!',
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
                        url: "/commande/delete/"+id,
                        type:"GET",
                        data:id,
                        success: function(data) {
                            swal('Supprimé!', 'le client a été supprimé.', 'success');
                            location.reload();
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

            deleteCommande();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BeUIActivity.init(); });