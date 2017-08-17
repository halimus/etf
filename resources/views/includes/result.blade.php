<div class="row" style="margin-bottom: 120px; border: 0px solid red; height: 100%;">
    <div class="col-md-12" style="margin-top: 10px; border: 0px solid silver;">
        <h3>ETF Name: {{ @$etf->etf_name }}</h3>
        <p><strong>Description:</strong> {{ @$etf->description }}</p> 
        <p><strong>As of:</strong> {{ Carbon\Carbon::parse(@$etf->etf_date)->format('m/d/Y') }}</p>  
    </div>

    @if(count($holdings))
    <div class="col-md-12" style="margin-top: 10px; border: 0px solid silver;">
        <h4 class="bloc" rel="1">
            <strong>1- Fund Top Holdings:</strong>
            <i class="fa fa-minus"></i>
        </h4>
        <div class="row bloc_1">
            <div class="col-md-4"> 
                <table id="table_1" class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th style="width:80px;">Weight</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                           $i=0;
                           $holdings_data = ''; // data for the chart
                           foreach ($holdings as $holding) {
                                echo '
                                <tr>
                                    <td>'.$holding->holding_name.'</td>
                                    <td>'.$holding->weight.' %</td>
                                </tr>';
                                
                                if(Auth::user()->chart_id==2){ //data for amCharts
                                    $i++;
                                    $color = App\Helpers\Tools::getColor($i);
                                    $holdings_data .='{"holding": "'.$holding->holding_name.'", "weight": '.$holding->weight.',"color": "'.$color.'" },';
                                }
                                else{ ////data for Highchars 
                                    $holdings_data.='["'.$holding->holding_name.'", '.$holding->weight.'],';
                                } 
                           }
                        ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-success btn-sm export" rel="1">Export to CSV</button>
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
            <strong>2- Fund Sector Allocation:</strong>
            <i class="fa fa-minus"></i>
        </h4> 
        <div class="row bloc_2">
            <div class="col-md-4" style="border: 0px dotted green;"> 
                <table id="table_2" class="table table-bordered table-hover" cellspacing="0" width="100%">
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
                                if(Auth::user()->chart_id==2){ //data for amCharts
                                    $sectors_data .='{"sector": "'.$sector->sector_name.'", "weight": '.$sector->weight.'},';
                                }
                                else{ ////data for Highchars 
                                    $sectors_data.='{name: "'.$sector->sector_name.'", y: '.$sector->weight.'},'; 
                                } 
                           }
                           if(Auth::user()->chart_id==2){
                                $increase_height_css_class = ' increase_x1';
                           }
                        ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-success btn-sm export" rel="2">Export to CSV</button>
            </div>
            <div class="col-md-8{{ @$increase_height_css_class }}">
                <div id="sector_chart"></div>
            </div>
        </div>      
    </div>
    @endif


    @if(count($countrys))
    <div class="col-md-12" style="margin-top: 10px; border: 0px solid silver;">
        <h4 class="bloc" rel="3">
            <strong>3- Fund Country Weights:</strong>
            <i class="fa fa-minus"></i>
        </h4>
        <div class="row bloc_3">
            <div class="col-md-4" style="border: 0px dotted green;"> 
                <table id="table_3" class="table table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th style="width:80px;">Weight</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                           $country_data = ''; // data for the country                          
                           $nbr_country = count($countrys);
                           foreach ($countrys as $country) {
                                echo '
                                <tr>
                                    <td>'.$country->country_name.'</td>
                                    <td>'.$country->weight.' %</td>
                                </tr>';
                                if(Auth::user()->chart_id==2){ //data for amCharts
                                    $country_data .='{"country": "'.$country->country_name.'", "weight": '.$country->weight.'},';
                                }
                                else{ ////data for Highchars 
                                    $country_data.='{name: "'.$country->country_name.'", y: '.$country->weight.'},';
                                }
                           }
                           
                            if(Auth::user()->chart_id==2){
                               if($nbr_country<=18) $increase_height_css_class = ' increase_x1';
                               elseif($nbr_country< 23) $increase_height_css_class = ' increase_x2';
                               else $increase_height_css_class = ' increase_x3';
                            }
                        ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-success btn-sm export" rel="3">Export to CSV</button>
            </div>
            <div class="col-md-8{{ @$increase_height_css_class }}">
                <div id="country_chart"></div>
            </div>
        </div>      
    </div>
    @endif
        
</div>

@push('scripts')

    @if(Auth::user()->chart_id == 2)
        @include('includes.chart.amcharts')
    @else
        @include('includes.chart.highcharts')
    @endif
    
    <script>
        /**
        * Export to CSV file
        */
       $(function () {
           $(".export").click(function () {
               var id = $(this).attr('rel');
               $("#table_" + id).tableToCSV();
           });
       });
    </script>

@endpush
