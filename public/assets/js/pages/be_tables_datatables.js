/*
 *  Document   : be_tables_datatables.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Tables Datatables Page
 */

var BeTableDatatables = function() {
    // Override a few DataTable defaults, for more examples you can check out https://www.datatables.net/
    var exDataTable = function() {
        jQuery.extend( jQuery.fn.dataTable.ext.classes, {
            sWrapper: "dataTables_wrapper dt-bootstrap4"
        });
    };

    var initCommandesDataTable = function() {
        jQuery('#my-table').dataTable({
            columnDefs: [],
            pageLength: 5,
            lengthMenu: [[5, 8, 15, 20], [5, 8, 15, 20]],
            autoWidth: false,
            processing: true,
            serverSide: true,
            ajax: "http://127.0.0.1:8000/statistics/datatableCommandes",
            columns: [
                {data: 'commande_num', name: 'commande_num'},
                {data: 'id_client', name: 'id_client'},
                {data: 'commande_quantity', name: 'commande_quantity'},
                {data: 'commande_montant', name: 'commande_montant'},
                {data: 'commande_date', name: 'commande_date'},
                {data: 'commande_date_retrait', name: 'commande_date_retrait'},
                {data: 'commande_paid', name: 'commande_paid'}
            ]
        });
    };


    return {
        init: function() {
            // Override a few DataTable defaults
            exDataTable();

            // Init Datatables
            initCommandesDataTable();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BeTableDatatables.init(); });