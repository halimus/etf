@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title" id="business-info"><u>ETF:</u></h3> 
        </div>

        <div class="col-md-12">
            @if(count(@$etf))
                @include('includes.result')
            @endif
        </div>
        
    </div>
</div>
@endsection

