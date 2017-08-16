@extends('layouts.auth')

@section('content')
<div id="main">
    <div id="wrapper" class="Center-Container">
        <div id="page-content-wrapper">
            <div id="page-content" >
                <div class="container">
                    <div class="col">
                        <div class="col-md-6 col-sm-offset-3 box">

                            @if($errors->any()) 
                            <ul class="errors alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif

                            <div id="loginbox" style="" class="mainbox">                    
                                <div class="panel panel-primary" >
                                    <div class="panel-heading" style="height: 40px;">
                                        <div class="panel-title pull-left">Test Assignment - Reset Password</div>
                                    </div>     
                                    <div style="padding-top:40px" class="panel-body" >
                                        <form method="POST" action="{{ route('password.email') }}" class="form-horizontal" role="form">    
                                            {{ csrf_field() }}
                                            
                                            <div class="input-group" style="margin-bottom: 25px">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email address" required>                                        
                                            </div>
                                            
                                            <div class="form-group" style="margin-top:10px" >
                                                <div class="col-sm-12 controls">
                                                    <button type="submit" class="btn btn-primary">Reset</button>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-md-12 control">
                                                    <div style="border-top: 1px solid#888; padding-top:15px;font-size:95%" >
                                                        <a href="{{ url('/login')}}">Back to Login</a>
                                                    </div>
                                                </div>
                                            </div> 
                                            
                                        </form>     
                                    </div>                     
                                </div>  
                            </div>
                        </div>

                    </div>
                </div>
            </div><!-- #page-content -->
        </div><!-- #page-content-wrapper -->
    </div><!-- #wrapper -->
</div><!-- #main -->
@endsection
