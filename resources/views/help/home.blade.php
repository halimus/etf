@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title" id="business-info"><u>Help:</u></h3> 
        </div>
        
        <div class="col-md-12">
            
            @if(Session::has('notif'))
            <div class="errors alert alert-{{ Session::get('notif_type') }} alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('notif') }}</p>
            </div>
            @endif
            
            <form method="POST" action="{{ url('/chart/')}}" id="form_chart">
                {{ csrf_field() }}
                <h3 style="margin-bottom:20px">Switch to the chart you like to use:</h3> 
                <div class="btn-group" id="status" data-toggle="buttons">
                    
                    <label class="btn btn-default btn-on btn-lg @if(Auth::user()->chart_id == 1) active @endif">
                    <input type="radio" value="1" name="chart_id" class="chart_id" @if(Auth::user()->chart_id == 1) checked @endif>Highcharts</label>
                    
                    <label class="btn btn-default btn-off btn-lg @if (Auth::user()->chart_id == 2) active @endif">
                    <input type="radio" value="2" name="chart_id" class="chart_id" @if(Auth::user()->chart_id == 2) checked @endif>amCharts</label>
                    
                </div>
                <div class="row form-group" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <button class="btn btn-default" type="submit">Save</button>
                    </div>
                </div> 
            </form>
            
        </div>
        
    </div>
</div>
@endsection
