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
        
        <div class="col-md-12" style="border: 0px solid silver;margin-top: 10px;min-height: 100px;">
            
            
            
            
            
            
            
            
        </div>
         
    </div>
</div>
@endsection