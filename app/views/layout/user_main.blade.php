<html>
	<head>
		<title> User  Page </title>
		{{ HTML::style('bootstrap.css')}}
	</head>
		<body>
	 	<nav class="navbar navbar-inverse">
	        <div class="container-fluid">
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	            	<ul class="nav navbar-nav navbar-right">
	            		<li ><a href="{{ route('logout') }}">Logout</a></li>  
	            	</ul>
	                <ul class="nav navbar-nav navbar-left">
	                	<li class="active"><a href="{{ route('index') }}">Simple User Maintenance</a></li>
	 				    @if(Auth::id() == 1)
	                        <li><a href="{{ route('showusers') }}">Show Users</a></li>
	                    @else
	                    	<li><a href="{{ route('showprofile') }}">Show Profile</a></li>
	                    @endif
	                </ul>
	            </div>
	        </div>
	    </nav>
		<div class="col-md-6 col-md-offset-3">
			@yield('contents')
		</div>
	</body>
</html>