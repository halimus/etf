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
            
            <form method="POST" action="{{ url('/change_password') }}" role="form" >
                {{ csrf_field() }}
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row form-group">
                            <div class="col-md-6 {{ $errors->has('current_password') ? ' has-error' : '' }}">
                                <label>Old Password</label><em>*</em>
                                <input type="password" name="current_password" id="current_password" class="form-control" value="">
                                @if ($errors->has('current_password'))
                                <span class="form-error">
                                    {{ $errors->first('current_password') }}
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label>New Password</label><em>*</em>
                                <input type="password" name="password" id="password" class="form-control" value="">
                                @if ($errors->has('password'))
                                <span class="form-error">
                                    {{ $errors->first('password') }}
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label>Confirm Password</label><em>*</em>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="">
                                @if ($errors->has('password'))
                                <span class="form-error">
                                    {{ $errors->first('password_confirmation') }}
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-custom" type="submit">Update</button>
                            </div>
                        </div>

                    </div>   
                </div>
           </form>
           
        </div>

    </div>
</div>
@endsection


