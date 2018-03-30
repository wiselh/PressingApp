var BeCompCharts = function() {
    // Chart.js Charts, for more examples you can check out http://www.chartjs.org/docs
    var initCommandesGraph = function () {
        // Set Global Chart.js configuration
        Chart.defaults.global.defaultFontColor              = '#555555';
        Chart.defaults.scale.gridLines.color                = "rgba(0,0,0,.04)";
        Chart.defaults.scale.gridLines.zeroLineColor        = "rgba(0,0,0,.1)";
        Chart.defaults.scale.ticks.beginAtZero              = true;
        Chart.defaults.global.elements.line.borderWidth     = 2;
        Chart.defaults.global.elements.point.radius         = 5;
        Chart.defaults.global.elements.point.hoverRadius    = 7;
        Chart.defaults.global.tooltips.cornerRadius         = 3;
        Chart.defaults.global.legend.labels.boxWidth        = 12;

        // Get Chart Containers
        var chartLinesCon  = jQuery('.js-commandes-week');
        var chartLinesCon2  = jQuery('.js-commandes-year');
        var daysData  = jQuery('.chart-days-data').val();
        var lastDaysData  = jQuery('.chart-lastDays-data').val();
        var monthsData  = jQuery('.chart-months-data').val();
        var lastMonthsData  = jQuery('.chart-lastMonths-data').val();
        var commandesDay = daysData.split(",");
        var commandesLastDay = lastDaysData.split(",");
        var commandesMonth = monthsData.split(",");
        var commandesLastMonth = lastMonthsData.split(",");

        // Set Chart and Chart Data variables
        var chartLines,chartLines2;
        var weekCommandesData,yearCommandesData;

        // Lines/Bar/Radar Chart Data
        weekCommandesData = {
            labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
            datasets: [
                {
                    label: 'Cette Semaine',
                    fill: true,
                    backgroundColor: 'rgba(66,165,245,.75)',
                    borderColor: 'rgba(66,165,245,1)',
                    pointBackgroundColor: 'rgba(66,165,245,1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(66,165,245,1)',
                    data: [commandesDay[0],commandesDay[1],commandesDay[2],commandesDay[3],commandesDay[4],commandesDay[5],commandesDay[6]]

                },
                {
                    label: 'Semaine Dernière',
                    fill: true,
                    backgroundColor: 'rgba(66,165,245,.25)',
                    borderColor: 'rgba(66,165,245,1)',
                    pointBackgroundColor: 'rgba(66,165,245,1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(66,165,245,1)',
                    data: [commandesLastDay[0],commandesLastDay[1],commandesLastDay[2],commandesLastDay[3],commandesLastDay[4],commandesLastDay[5],commandesLastDay[6]]
                }
            ]
        };
        yearCommandesData = {
            labels: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul','Aou','Sep','Oct','Nov','Dec'],
            datasets: [
                {
                    label: 'Cette Année '+commandesMonth[0],
                    fill: true,
                    backgroundColor: 'rgba(190,44,212,.75)',
                    borderColor: 'rgba(190,44,212,1)',
                    pointBackgroundColor: 'rgba(190,44,212,1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(190,44,212,1)',
                    data: [commandesMonth[1],commandesMonth[2],commandesMonth[3],commandesMonth[4],commandesMonth[5],commandesMonth[6],commandesMonth[7],commandesMonth[8],commandesMonth[9],commandesMonth[10],commandesMonth[11],commandesMonth[12]]
                },
                {
                    label: 'Année Dernière '+commandesLastMonth[0],
                    fill: true,
                    backgroundColor: 'rgba(190,44,212,.25)',
                    borderColor: 'rgba(190,44,212,1)',
                    pointBackgroundColor: 'rgba(190,44,212,1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(190,44,212,1)',
                    data: [commandesLastMonth[1],commandesLastMonth[2],commandesLastMonth[3],commandesLastMonth[4],commandesLastMonth[5],commandesLastMonth[6],commandesLastMonth[7],commandesLastMonth[8],commandesLastMonth[9],commandesLastMonth[10],commandesLastMonth[11],commandesLastMonth[12]]
                }
            ]
        };


        // Init Charts
        if ( chartLinesCon.length ) {
            chartLines = new Chart(chartLinesCon, { type: 'line', data: weekCommandesData,options:{
                tooltips: {
                    enabled: true,
                    mode: 'single',
                    callbacks: {
                        label: function(tooltipItems, data) {
                            return  tooltipItems.yLabel + " Commandes";
                        }
                    }
                }

            } });
        }
        if ( chartLinesCon2.length ) {
            chartLines2 = new Chart(chartLinesCon2, { type: 'line', data: yearCommandesData,options:{
                tooltips: {
                    enabled: true,
                    mode: 'single',
                    callbacks: {
                        label: function(tooltipItems, data) {
                            return tooltipItems.yLabel + " Commandes";
                        }
                    }
                }

            } });
        }

    };
    var initRevenuGraph = function () {
        // Set Global Chart.js configuration
        Chart.defaults.global.defaultFontColor              = '#555555';
        Chart.defaults.scale.gridLines.color                = "rgba(0,0,0,.04)";
        Chart.defaults.scale.gridLines.zeroLineColor        = "rgba(0,0,0,.1)";
        Chart.defaults.scale.ticks.beginAtZero              = true;
        Chart.defaults.global.elements.line.borderWidth     = 2;
        Chart.defaults.global.elements.point.radius         = 5;
        Chart.defaults.global.elements.point.hoverRadius    = 7;
        Chart.defaults.global.tooltips.cornerRadius         = 3;
        Chart.defaults.global.legend.labels.boxWidth        = 12;

        // Get Chart Containers
        var chartLinesCon  = jQuery('.js-revenu-week');
        var chartLinesCon2  = jQuery('.js-revenu-year');

        var daysData  = jQuery('.chart-revenu-days-data').val();
        var lastDaysData  = jQuery('.chart-revenu-lastDays-data').val();
        var monthsData  = jQuery('.chart-revenu-months-data').val();
        var lastMonthsData  = jQuery('.chart-revenu-lastMonths-data').val();

        var revenuDay = daysData.split(",");
        var revenuLastDay = lastDaysData.split(",");
        var revenuMonth = monthsData.split(",");
        var revenuLastMonth = lastMonthsData.split(",");

        // Set Chart and Chart Data variables
        var chartLines,chartLines2;
        var weekRevenuData,yearRevenuData;

        // Lines/Bar/Radar Chart Data
        weekRevenuData = {
            labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
            datasets: [
                {
                    label: 'Cette Semaine',
                    fill: true,
                    backgroundColor: 'rgba(66,165,245,.75)',
                    borderColor: 'rgba(66,165,245,1)',
                    pointBackgroundColor: 'rgba(66,165,245,1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(66,165,245,1)',
                    data: [revenuDay[0],revenuDay[1],revenuDay[2],revenuDay[3],revenuDay[4],revenuDay[5],revenuDay[6]]

                },
                {
                    label: 'Semaine Dernière',
                    fill: true,
                    backgroundColor: 'rgba(66,165,245,.25)',
                    borderColor: 'rgba(66,165,245,1)',
                    pointBackgroundColor: 'rgba(66,165,245,1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(66,165,245,1)',
                    data: [revenuLastDay[0],revenuLastDay[1],revenuLastDay[2],revenuLastDay[3],revenuLastDay[4],revenuLastDay[5],revenuLastDay[6]]
                }
            ]
        };
        yearRevenuData = {
            labels: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul','Aou','Sep','Oct','Nov','Dec'],
            datasets: [
                {
                    label: 'Cette Année '+revenuMonth[0],
                    fill: true,
                    backgroundColor: 'rgba(190,44,212,.75)',
                    borderColor: 'rgba(190,44,212,1)',
                    pointBackgroundColor: 'rgba(190,44,212,1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(190,44,212,1)',
                    data: [revenuMonth[1],revenuMonth[2],revenuMonth[3],revenuMonth[4],revenuMonth[5],revenuMonth[6],revenuMonth[7],revenuMonth[8],revenuMonth[9],revenuMonth[10],revenuMonth[11],revenuMonth[12]]
                },
                {
                    label: 'Année Dernière '+revenuLastMonth[0],
                    fill: true,
                    backgroundColor: 'rgba(190,44,212,.25)',
                    borderColor: 'rgba(190,44,212,1)',
                    pointBackgroundColor: 'rgba(190,44,212,1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(190,44,212,1)',
                    data: [revenuLastMonth[1],revenuLastMonth[2],revenuLastMonth[3],revenuLastMonth[4],revenuLastMonth[5],revenuLastMonth[6],revenuLastMonth[7],revenuLastMonth[8],revenuLastMonth[9],revenuLastMonth[10],revenuLastMonth[11],revenuLastMonth[12]]
                }
            ]
        };


        // Init Charts
        if ( chartLinesCon.length ) {
            chartLines = new Chart(chartLinesCon, { type: 'line', data: weekRevenuData,options:{
                tooltips: {
                    enabled: true,
                    mode: 'single',
                    callbacks: {
                        label: function(tooltipItems, data) {
                            return  tooltipItems.yLabel + " DH";
                        }
                    }
                }

            } });
        }
        if ( chartLinesCon2.length ) {
            chartLines2 = new Chart(chartLinesCon2, { type: 'line', data: yearRevenuData,options:{
                tooltips: {
                    enabled: true,
                    mode: 'single',
                    callbacks: {
                        label: function(tooltipItems, data) {
                            return tooltipItems.yLabel + " DH";
                        }
                    }
                }

            } });
        }

    };
    return {
        init: function () {

            //ajax
            $.ajax({
                // url: "/statistics/graph-of-week",
                url: "/statistics/statisticsGraph",
                type:"GET",
                success: function(result) {

                    // console.log(result);
                    jQuery('.chart-days-data').val(result.days);
                    jQuery('.chart-lastDays-data').val(result.lastDays);
                    jQuery('.chart-months-data').val(result.months);
                    jQuery('.chart-lastMonths-data').val(result.lastMonths);

                    jQuery('.chart-revenu-days-data').val(result.revenuDays);
                    jQuery('.chart-revenu-lastDays-data').val(result.revenuLastDays);
                    jQuery('.chart-revenu-months-data').val(result.revenuMonths);
                    jQuery('.chart-revenu-lastMonths-data').val(result.revenuLastMonths);

                },
                error: function(data){
                    alert('no');
                    console.log(data);
                }
            });
            // Init Chart.js Charts
            initCommandesGraph();
            initRevenuGraph();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BeCompCharts.init(); });