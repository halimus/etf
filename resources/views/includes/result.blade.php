<div class="row" style="margin-bottom: 120px; border: 0px solid red; height: 100%;">
    <div class="col-md-12" style="margin-top: 10px; border: 0px solid silver;">
        <h3>ETF Name: {{ @$etf->etf_name }}</h3>
        <p><strong>Description:</strong> {{ @$etf->description }}</p> 
        <p><strong>As of:</strong> {{ Carbon\Carbon::parse(@$etf->etf_date)->format('m/d/Y') }}</p>  
    </div>

    @if(count($holdings))
    <div class="col-md-12" style="margin-top: 10px; border: 0px solid silver;">
        <h4 class="bloc" rel="1">
            <strong>1-Fund Top Holdings:</strong>
            <i class="fa fa-minus"></i>
        </h4>
        <div class="row bloc_1">
            <div class="col-md-4" style="border: 0px dotted green;"> 
                <table id="datatable" class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th style="width:80px;">Weight</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                           $holdings_data = ''; // data for the chart
                           foreach ($holdings as $holding) {
                                echo '
                                <tr>
                                    <td>'.$holding->holding_name.'</td>
                                    <td>'.$holding->weight.' %</td>
                                </tr>';
                                
                                $holdings_data.="['$holding->holding_name', $holding->weight],";
                           }
                        ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-success btn-sm" id="export1">Export to CSV</button>
            </div>
            <div class="col-md-8">
                <div id="holding_chart"></div>
            </div>
        </div>      
    </div>
    @endif


    @if(count($sectors))
    <div class="col-md-12" style="margin-top: 10px; border: 0px solid silver;">
        <h4 class="bloc" rel="2">
            <strong>2-Fund Sector Allocation:</strong>
            <i class="fa fa-minus"></i>
        </h4> 
        <div class="row bloc_2">
            <div class="col-md-4" style="border: 0px dotted green;"> 
                <table id="datatable" class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th style="width:80px;">Weight</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                           $sectors_data = ''; // data for the sector
                           foreach ($sectors as $sector) {
                                echo '
                                <tr>
                                    <td>'.$sector->sector_name.'</td>
                                    <td>'.$sector->weight.' %</td>
                                </tr>';
                                $sectors_data.="{name: '$sector->sector_name', y: $sector->weight},"; 
                           }
                        ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-success btn-sm" id="export2">Export to CSV</button>
            </div>
            <div class="col-md-8" style="border: 0px dotted green;">
                <div id="sector_chart"></div>
            </div>
        </div>      
    </div>
    @endif


    @if(count($countrys))
    <div class="col-md-12" style="margin-top: 10px; border: 0px solid silver;">
        <h4 class="bloc" rel="3">
            <strong>3-Fund Country Weights:</strong>
            <i class="fa fa-minus"></i>
        </h4>
        <div class="row bloc_3">
            <div class="col-md-4" style="border: 0px dotted green;"> 
                <table id="datatable" class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th style="width:80px;">Weight</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                           $country_data = ''; // data for the country
                           foreach ($countrys as $country) {
                                echo '
                                <tr>
                                    <td>'.$country->country_name.'</td>
                                    <td>'.$country->weight.' %</td>
                                </tr>';
                                
                                $country_data.="{name: '$country->country_name', y: $country->weight},"; 
                           }
                        ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-success btn-sm" id="export3">Export to CSV</button>
            </div>
            <div class="col-md-8" style="border: 0px dotted green;">
                <div id="country_chart"></div>
            </div>
        </div>      
    </div>
    @endif
        
</div>

@push('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

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
@endpush
