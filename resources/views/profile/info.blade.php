@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title" id="business-info"><u>Profile:</u></h3> 
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
             
            <form role="form" method="POST" action="{{ url("/profile") }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">	
                        <div class="row form-group">
                            <div class="col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>Name</label><em>*</em>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ? old('name'):$user->name }}">
                                @if ($errors->has('name'))
                                <span class="form-error">
                                    {{ $errors->first('name') }}
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6 {{ $errors->has('username') ? ' has-error' : '' }}">
                                <label>Username</label><em>*</em>
                                <input type="text" name="username" id="username" class="form-control" value="{{ old('username') ? old('username'):@$user->username }}" disabled>
                                @if ($errors->has('username'))
                                <span class="form-error">
                                    {{ $errors->first('username') }}
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6 {!! ($errors->has('email')) ? ' has-error' : '' !!}">
                                <label>Email</label><em>*</em>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ? old('email'):@$user->email }}">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    {{ $errors->first('email') }}
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

