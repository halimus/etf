@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title" id="business-info"><u>Home:</u></h3> 
        </div>

        <div class="col-md-6 col-md-offset-3">
            <form role="form" id="form-search">
                <div class="form-group">
                    <div class="input-group">
                        <input id="1" class="form-control" type="text" name="search" placeholder="Search ETF..." required/>
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                                <i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
                            </button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="col-md-12" style="border: 1px solid red;margin-top: 10px;min-height: 100px;">
            
            
            
        </div>
        
        


    </div>
</div>
@endsection