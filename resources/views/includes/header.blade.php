<nav class="navbar navbar-default navbar-custom navbar-fixed-top-" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/')}}">Test Assignment</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="{{ url('/')}}">Home</a></li>
            <li><a href="{{ url('/etf')}}">ETFs</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/users')}}">Manage Users</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/about')}}">About the software</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="divider-vertical"></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/change_password')}}">Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/logout')}}">Sign out</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>