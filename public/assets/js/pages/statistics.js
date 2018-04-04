var StatisticsData = function() {
    // Chart.js Charts, for more examples you can check out http://www.chartjs.org/docs
    var initHeaderData = function (data) {
//     $('.option').click(function (e) {
//         e.preventDefault();
//         var value =$(e.currentTarget).data('name');
//         $.ajax({
//             url: "/statistics/period/"+value,
//             type:"GET",
//             data:value,
//             success: function(data) {
//                 console.log(data.period);
//                 $(".money").countTo({
//                     from: 0,
//                     to: data.money,
//                     speed: 600,
//                     refreshInterval: 50
//                 });
//                 $(".commandes").countTo({
//                     from: 0,
//                     to: data.commandes_nbr,
//                     speed: 600,
//                     refreshInterval: 50
//                 });
//                 $(".clients").countTo({
//                     from: 0,
//                     to: data.clients_nbr,
//                     speed: 600,
//                     refreshInterval: 50
//                 });
// //
//             },
//             error: function(data){
//                 $errors = data.responseJSON;
//                 console.log("error "+data);
// //                                         swal('Oops...', 'Quelque chose s\'est mal passé!', 'error');
//             }
//         });
//
//
//
//     });
//     $('.getStatisticsBetweenTwoDates').click(function (e) {
//                 e.preventDefault();
//                 var date1 =$('#date1').val();
//                 var date2 =$('#date2').val();
//
//                 $.ajax({
//                     url: "/statistics/between",
//                     type:"GET",
//                     data:{
//                         date1: date1,
//                         date2: date2
//                     },
//                     success: function(data) {
//                         console.log(data);
//                         $(".money").countTo({
//                             from: 0,
//                             to: data.money,
//                             speed: 600,
//                             refreshInterval: 50
//                         });
//                         $(".commandes").countTo({
//                             from: 0,
//                             to: data.commandes_nbr,
//                             speed: 600,
//                             refreshInterval: 50
//                         });
//                         $(".clients").countTo({
//                             from: 0,
//                             to: data.clients_nbr,
//                             speed: 600,
//                             refreshInterval: 50
//                         });
//                         $('#ecom-dashboard-stats-drop').html(data.period);
//
//                     },
//                     error: function(data){
//                         swal('error');
//                         $errors = data.responseJSON;
//                         console.log("error "+data);
// //                                         swal('Oops...', 'Quelque chose s\'est mal passé!', 'error');
//                     }
//                 });
//
//             });

    };
    // var initTableData = function () {};
    return {
        init: function () {

            // ajax
            $.ajax({
                url: "/statistics/tableCommandes????",
                type:"GET",
                success: function(result) {

                    console.log(result);
                    // jQuery('.chart-days-data').val(result.days);
                    initHeaderData(result);

                },
                error: function(data){
                    alert('no');
                    console.log(data);
                }
            });
            // Init Chart.js Charts

            // initHeaderData();
            // initTableData();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ StatisticsData.init(); });