@extends('layouts.auth')

@section('content')

<div id="main">
    <div id="wrapper" class="Center-Container">
        <div id="page-content-wrapper">
            <div id="page-content" >
                <div class="container">
                    <div class="col">
                        <div class="col-md-6 col-sm-offset-3 box">

                            <?php if(isset($this->notif) and !empty($this->notif)){ ?>
                            <div class="alert alert-<?php  ?> alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <?php echo $this->notif['msg']; ?>
                            </div>
                            <?php } ?>

                            <div id="loginbox" style="" class="mainbox">                    
                                <div class="panel panel-primary" >
                                    <div class="panel-heading" style="height: 40px;">
                                        <div class="panel-title pull-left">Test Assignment - Reset Password</div>
                                    </div>     
                                    <div style="padding-top:40px" class="panel-body" >
                                        <form method="POST" action="login" class="form-horizontal" role="form">
                                            <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input type="email" class="form-control" id="email" name="email" value="<?php echo @$_POST['email'];?>" placeholder="Email address" required>                                        
                                            </div>
                                            <div style="margin-top:10px" class="form-group">
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
