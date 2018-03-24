/*
 *  Document   : be_ui_activity.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Activity Page
 */

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

        // Init an example confirm alert on button click
        jQuery('.btn-alt-danger').on('click', function(e){
            swal({
                title: 'Vous Êtes Sûr?',
                text: 'Vous ne pourrez pas récupérer ce client!',
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
                        url: "/clients/delete/"+id,
                        type:"GET",
                        data:id,
                        success: function(data) {
                            swal('Supprimé!', 'le client a été supprimé.', 'success');
                            $(e.currentTarget).closest('.clients').remove();
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
        jQuery('.delete_checked').on('click', function (e) {
            var AllIds = [];
            $("#checkbox_delete:checked").each(function() {
                AllIds.push($(this).attr('data-id'));
            });
            if(AllIds.length <=0)
            {
                    swal('', 'Sélectionné les clients!', 'warning');
            }
            else {
                swal({
                    title: 'Vous Êtes Sûr?',
                    text: 'Vous ne pourrez pas récupérer ces '+AllIds.length+' clients!',
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
                        var data =  AllIds ;
                        $.ajax({
                            url: "/deleteChecked",
                            type:"get",
                            data: {id:data},
                            success: function(data) {
                                swal('Supprimé!', 'le client a été supprimé.', 'success');
                                // $.each(AllIds,function (index,value) {
                                //         $('*[data-id="'+value+'"]').closest('.client_row').remove();
                                // });
                                location.reload();
                            },
                            error: function(data){
                                // $errors = data.sresponseJSON;
                                swal('Oops...', 'Quelque chose s\'est mal passé!', 'error');
                            }
                        });
                    }, function(dismiss) {
                        // dismiss can be 'cancel', 'overlay', 'esc' or 'timer'
                    }
                )}
            });
    };

    return {
        init: function() {
            // Init SweetAlert2
            sweetAlert2();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BeUIActivity.init(); });