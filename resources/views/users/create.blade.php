@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title" id="business-info"><u>Create User:</u>
                <span class="right-menu"><a href="{{ url('/users/')}}"><i class="fa fa-list"></i> Users List</a></span>
            </h3> 
        </div>

        <div class="col-md-12">
            
            @include('includes.notification')
              
            <form method="POST" action="{{ url('/users/create') }}"> 
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-12">	
                        <div class="row form-group">
                            <div class="col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label>Name</label><em>*</em>
                                <input type="text" name="name" id="username" class="form-control" value="{{ old('name') ? old('name'):@$user->name }}">
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
                                <input type="text" name="username" id="username" class="form-control" value="{{ old('username') ? old('username'):@$user->username }}">
                                @if ($errors->has('username'))
                                <span class="form-error">
                                    {{ $errors->first('username') }}
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6 {!! ($errors->has('email')) ? ' has-error' : '' !!}">
                                <label>Email Address</label><em>*</em>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ? old('email'):@$user->email }}">
                                @if ($errors->has('email'))
                                <span class="help-block">
                                    {{ $errors->first('email') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6 {!! ($errors->has('password')) ? ' has-error' : '' !!}">
                                <label>Password</label><em>*</em>
                                <input type="password" name="password" id="password" class="form-control" value="{{ old('password')}}">
                                @if ($errors->has('password'))
                                <span class="help-block">
                                    {{ $errors->first('password') }}
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6 {!! ($errors->has('password_confirmation')) ? ' has-error' : '' !!}">
                                <label>Confirm Password</label><em>*</em>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="{{ old('password_confirmation')}}">
                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    {{ $errors->first('password_confirmation') }}
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <button class="btn btn-primary btn-custom" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>
@endsection


