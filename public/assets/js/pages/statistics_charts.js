var BeCompCharts = function() {
    // Chart.js Charts, for more examples you can check out http://www.chartjs.org/docs
    var initCommandesGraph = function (result) {
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
                    data: [result.days[0],result.days[1],result.days[2],result.days[3],result.days[4],result.days[5],result.days[6]]

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
                    data: [result.lastDays[0],result.lastDays[1],result.lastDays[2],result.lastDays[3],result.lastDays[4],result.lastDays[5],result.lastDays[6]]
                }
            ]
        };
        yearCommandesData = {
            labels: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul','Aou','Sep','Oct','Nov','Dec'],
            datasets: [
                {
                    label: 'Cette Année '+result.months[0],
                    fill: true,
                    backgroundColor: 'rgba(190,44,212,.75)',
                    borderColor: 'rgba(190,44,212,1)',
                    pointBackgroundColor: 'rgba(190,44,212,1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(190,44,212,1)',
                    data: [result.months[1],result.months[2],result.months[3],result.months[4],result.months[5],
                        result.months[6],result.months[7],result.months[8],result.months[9],result.months[10],
                        result.months[11],result.months[12]]
                },
                {
                    label: 'Année Dernière '+result.lastMonths[0],
                    fill: true,
                    backgroundColor: 'rgba(190,44,212,.25)',
                    borderColor: 'rgba(190,44,212,1)',
                    pointBackgroundColor: 'rgba(190,44,212,1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(190,44,212,1)',
                    data: [result.lastMonths[1],result.lastMonths[2],result.lastMonths[3],result.lastMonths[4],
                        result.lastMonths[5],result.lastMonths[6],result.lastMonths[7],result.lastMonths[8],
                        result.lastMonths[9],result.lastMonths[10],result.lastMonths[11],result.lastMonths[12]]
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
    var initRevenuGraph = function (result) {
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
                    data: [result.revenuDays[0],result.revenuDays[1],result.revenuDays[2],
                        result.revenuDays[3],result.revenuDays[4],result.revenuDays[5],result.revenuDays[6]]

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
                    data: [result.revenuLastDays[0],result.revenuLastDays[1],result.revenuLastDays[2],
                        result.revenuLastDays[3],result.revenuLastDays[4],result.revenuLastDays[5],result.revenuLastDays[6]]
                }
            ]
        };
        yearRevenuData = {
            labels: ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul','Aou','Sep','Oct','Nov','Dec'],
            datasets: [
                {
                    label: 'Cette Année '+result.revenuMonths[0],
                    fill: true,
                    backgroundColor: 'rgba(190,44,212,.75)',
                    borderColor: 'rgba(190,44,212,1)',
                    pointBackgroundColor: 'rgba(190,44,212,1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(190,44,212,1)',
                    data: [result.revenuMonths[1],result.revenuMonths[2],result.revenuMonths[3],result.revenuMonths[4],
                        result.revenuMonths[5],result.revenuMonths[6],result.revenuMonths[7],result.revenuMonths[8],
                        result.revenuMonths[9],result.revenuMonths[10],result.revenuMonths[11],result.revenuMonths[12]]
                },
                {
                    label: 'Année Dernière '+result.revenuLastMonths[0],
                    fill: true,
                    backgroundColor: 'rgba(190,44,212,.25)',
                    borderColor: 'rgba(190,44,212,1)',
                    pointBackgroundColor: 'rgba(190,44,212,1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(190,44,212,1)',
                    data: [result.revenuLastMonths[1],result.revenuLastMonths[2],result.revenuLastMonths[3],
                        result.revenuLastMonths[4],result.revenuLastMonths[5],result.revenuLastMonths[6],
                        result.revenuLastMonths[7],result.revenuLastMonths[8],result.revenuLastMonths[9],
                        result.revenuLastMonths[10],result.revenuLastMonths[11],result.revenuLastMonths[12]]
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
                url: "/statistics/statisticsGraph",
                type:"GET",
                success: function(result) {
                    console.log('yes');

                    initCommandesGraph(result);
                    initRevenuGraph(result);
                },
                error: function(data){
                    alert('no');
                    console.log(data);
                }
            });

        }
    };
}();

// Initialize when page loads
jQuery(function(){ BeCompCharts.init(); });