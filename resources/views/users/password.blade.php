@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title" id="business-info"><u>Change Password:</u></h3> 
        </div>

        <div class="col-md-12">
            
            @if($errors->any()) 
            <ul class="errors alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            
            @if(Session::has('notif'))
            <div class="errors alert alert-{{ Session::get('notif_type') }} alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p>{{ Session::get('notif') }}</p>
            </div>
            @endif
            
           

        </div>

    </div>
</div>
@endsection


