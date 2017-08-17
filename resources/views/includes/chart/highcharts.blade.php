<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="{{ asset('js/jquery.tabletoCSV.js') }}" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
    // holding_chart
    Highcharts.chart('holding_chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Fund Top Holdings'
        },
        subtitle: {
            text: 'DGT'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Weight (%)'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Weight: <b>{point.y:.2f} %</b>'
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'holding',
            //color: '#81B33B',
            data: [<?php echo $holdings_data;?>],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.2f}', // two decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '12px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
    
    // sector_chart
    Highcharts.chart('sector_chart', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Fund Sector Allocation'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.2f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Sector',
            colorByPoint: true,
            data: [<?php echo $sectors_data;?>]
        }]
    });
    
    <?php if(!empty($country_data)){ ?>
    // country_chart
    Highcharts.chart('country_chart', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Fund Sector Allocation'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false,
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Sector',
            colorByPoint: true,
            data: [<?php echo $country_data;?>]
        }]
    });
    <?php } ?>

</script>
