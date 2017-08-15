@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title" id="business-info"><u>Home:</u></h3> 
        </div>
        <div class="col-md-6 col-md-offset-3">
            <form role="form" id="form-search" method="POST" action="{{ url('/') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="input-group">
                        <input  type="text" id="search"  name="search" class="form-control" placeholder="Search ETF..." value="DGT" required>
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                                <i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
                            </button>
                        </span>
                    </div>
                </div>
            </form>
            @if(Session::has('notif'))
            <div class="errors alert alert-{{ Session::get('notif_type') }} alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('notif') }}</p>
            </div>
            @endif
        </div>
    </div>    
        
    @if(count(@$etf))
    <div class="row" style="margin-bottom: 120px; border: 0px solid red; height: 100%;">

        <div class="col-md-12" style="margin-top: 10px; border: 0px solid silver;">
            <h3>ETF Name: {{ @$etf->etf_name }}</h3>
            <p><strong>Description:</strong> {{ @$etf->description }}</p>  
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
                            @foreach($holdings as $holding) 
                            <tr>
                                <td>{{ $holding->holding_name }}</td>
                                <td>{{ $holding->weight }} %</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-8" style="border: 1px dotted green;">
                    Top Holding Bar Chart
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
                            @foreach($sectors as $sector) 
                            <tr>
                                <td>{{ $sector->sector_name }}</td>
                                <td>{{ $sector->weight }} %</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-8" style="border: 1px dotted green;">
                    Sectors Pie Chart
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
                            @foreach($countrys as $country) 
                            <tr>
                                <td>{{ $country->country_name }}</td>
                                <td>{{ $sector->weight }} %</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-8" style="border: 1px dotted green;">
                    Country Pie Chart
                </div>
            </div>      
        </div>
        @endif

    </div>
    @endif
         
</div>
@endsection