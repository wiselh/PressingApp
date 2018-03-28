var BePagesDashboard = function() {
    // Chart.js Charts, for more examples you can check out http://www.chartjs.org/docs
    var initDashboardChartJS = function (data) {
        // Set Global Chart.js configuration
        Chart.defaults.global.defaultFontColor              = '#555555';
        Chart.defaults.scale.gridLines.color                = "transparent";
        Chart.defaults.scale.gridLines.zeroLineColor        = "transparent";
        Chart.defaults.scale.display                        = false;
        Chart.defaults.scale.ticks.beginAtZero              = true;
        Chart.defaults.global.elements.line.borderWidth     = 2;
        Chart.defaults.global.elements.point.radius         = 5;
        Chart.defaults.global.elements.point.hoverRadius    = 7;
        Chart.defaults.global.tooltips.cornerRadius         = 3;
        Chart.defaults.global.legend.display                = false;

        // Chart Containers
        var chartDashboardLinesCon  = jQuery('.js-chartjs-dashboard-lines');
        var chartDashboardLinesCon2 = jQuery('.js-chartjs-dashboard-lines2');

        // Chart Variables
        var chartDashboardLines, chartDashboardLines2;

        // Lines Charts Data
        var chartDashboardLinesData = {
            labels: ['LUN', 'MAR', 'MER', 'JEU', 'VEN', 'SAM', 'DIM'],
            datasets: [
                {
                    label: 'Cette Semaine',
                    fill: true,
                    backgroundColor: 'rgba(66,165,245,.25)',
                    borderColor: 'rgba(66,165,245,1)',
                    pointBackgroundColor: 'rgba(66,165,245,1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(66,165,245,1)',
                    data: [data.days[0], data.days[1],
                            data.days[2], data.days[3],
                            data.days[4], data.days[5], data.days[6]]
                }
            ]
        };

        var chartDashboardLinesOptions = {
            scales: {
                yAxes: [{
                    ticks: {
                        suggestedMax: 50
                    }
                }]
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItems, data) {
                        return ' ' + tooltipItems.yLabel + ' Commandes';
                    }
                }
            }
        };

        var chartDashboardLinesData2 = {
            labels: ['LUN', 'MAR', 'MER', 'JEU', 'VEN', 'SAM', 'DIM'],
            datasets: [
                {
                    label: 'Cette Semaine',
                    fill: true,
                    backgroundColor: 'rgba(156,204,101,.25)',
                    borderColor: 'rgba(156,204,101,1)',
                    pointBackgroundColor: 'rgba(156,204,101,1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(156,204,101,1)',
                    data: [data.revenu[0], data.revenu[1],
                        data.revenu[2], data.revenu[3],
                        data.revenu[4], data.revenu[5], data.revenu[6]]
                }
            ]
        };

        var chartDashboardLinesOptions2 = {
            scales: {
                yAxes: [{
                    ticks: {
                        suggestedMax: 480
                    }
                }]
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItems, data) {
                        return  tooltipItems.yLabel+' DH ' ;
                    }
                }
            }
        };

        // Init Charts
        if ( chartDashboardLinesCon.length ) {
            chartDashboardLines  = new Chart(chartDashboardLinesCon, { type: 'line', data: chartDashboardLinesData, options: chartDashboardLinesOptions });
        }

        if ( chartDashboardLinesCon2.length ) {
            chartDashboardLines2 = new Chart(chartDashboardLinesCon2, { type: 'line', data: chartDashboardLinesData2, options: chartDashboardLinesOptions2 });
        }
    };

    return {
        init: function () {
            // Init Chart.js Charts
            $.ajax({
                url: "/date",
                type:"GET",
                success: function(data) {
                    initDashboardChartJS(data);
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
jQuery(function(){ BePagesDashboard.init(); });