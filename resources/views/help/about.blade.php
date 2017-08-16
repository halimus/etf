@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title" id="business-info"><u>About:</u></h3> 
        </div>

        <div class="col-md-12">
            <p style="line-height: 32px;">
                This application is created for a Test Assignment purpose.<br>
                <strong>Version:</strong> 1.0.0<br>
                <strong>Author:</strong> Halim Lardjane<br>
                <strong>Email:</strong> halim.lardjane@gmail.com<br>
                <strong>Website:</strong> <a href="http://halim.lardjane.com/" target="_blank">http://halim.lardjane.com/</a><br> 
            </p>
            
            <p style="margin-top: 40px">
                <strong><u>Technologies used:</u></strong>
            </p>
            <ul style="line-height:32px">
                <li><a href="https://laravel.com/" target="_blank">PHP Laravel Framework (5.4)</a></li>
                <li><a href="http://getbootstrap.com/" target="_blank">CSS Bootstrap</a></li>
                <li><a href="https://jquery.com/" target="_blank">jQuery</a></li>
                <li><a href="https://www.highcharts.com/" target="_blank">Highcharts</a></li>
            </ul>
            
        </div>
        
    </div>
</div>
@endsection
