<!DOCTYPE html>
<html lang="en">
<head>
	<title>Daily Manager</title>


	<!-- Bootstrap CSS -->
	<link href="{{ url('css/app.css') }}" rel="stylesheet" type="text/css" />

	<!-- Custom CSS -->
	<link href="{{ url('css/sb-admin.css') }}" rel="stylesheet">

	<!-- Morris Charts CSS -->
	<link href="{{ url('css/plugins/morris.css') }}" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />

	<!-- Bootstrap File Input -->
	<link href="{{ url('css/fileinput.min.css') }}" rel="stylesheet" type="text/css" />


</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			{{--<div class="navbar-header">--}}
				{{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">--}}
					{{--<span class="sr-only">Toggle Navigation</span>--}}
					{{--<span class="icon-bar"></span>--}}
					{{--<span class="icon-bar"></span>--}}
					{{--<span class="icon-bar"></span>--}}
				{{--</button>--}}
				{{--<a class="navbar-brand" href="#">Laravel</a>--}}
			{{--</div>--}}

			<div class="collapse navbar-collapse" id="navbar">
				{{--<ul class="nav navbar-nav">--}}
					{{--<li><a href="{{ url('/') }}">Welcome</a></li>--}}
				{{--</ul>--}}

				<ul class="nav navbar-nav navbar-right">
					@if(auth()->guest())
						@if(!Request::is('auth/login'))
							<li><a href="{{ url('/auth/login') }}">Login</a></li>
						@endif
						@if(!Request::is('auth/register'))
							<li><a href="{{ url('/auth/register') }}">Realizar Cadastro</a></li>
						@endif
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
