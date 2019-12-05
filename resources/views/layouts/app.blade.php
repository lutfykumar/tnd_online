<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} :: @yield('title')</title>

	<link rel="shortcut icon" href="{{url('tnd/images/logo.ico')}}" type="image/x-icon">
	<link rel="icon" href="{{url('tnd/images/logo.ico')}}" type="image/x-icon">

    @stack('before_style')
    @yield('before_style')
    <link href="{{asset('tnd/bs3/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('tnd/toast/jquery.toast.min.css')}}" rel="stylesheet">
    <link href="{{asset('tnd/css/bootstrap-reset.css')}}" rel="stylesheet">
    <link href="{{asset('tnd/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />

    <link href="{{asset('tnd/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('tnd/css/style-responsive.css')}}" rel="stylesheet" />
    @stack('after_style')
    @yield('after_style')
</head>
<body class="full-width">
	<section id="container" class="hr-menu">
		<header class="header fixed-top">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle hr-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="fa fa-bars"></span>
				</button>

				<div class="brand ">
					<a href="{{route('h.schedule')}}" class="logo">
						<img src="{{asset('tnd/images/logo-1.png')}}" width="100%" alt="">
					</a>
				</div>

				@include($level.'.sidebar')
				<div class="top-nav hr-top-nav">
					<ul class="nav pull-right top-menu">
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<img alt="" src="{{asset('tnd/images/avatar.png')}}">
								<span class="username">{{auth()->user()->karyawan->nama }}</span>
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu extended logout">
								<li><a href="{{url('profile')}}"><i class=" fa fa-suitcase"></i>Profile</a></li>
								<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-key"></i> Log Out</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
									</form>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</header>

		@yield('sidebar')
		@yield('content')

	</section>
	@stack('before_script')
	@yield('before_script')
	<script src="{{asset('tnd/js/jquery.js')}}"></script>
	<script src="{{asset('tnd/js/jquery/dist/jquery.min.js')}}"></script>
	<script src="{{asset('tnd/bs3/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('tnd/js/hover-dropdown.js')}}"  type="text/javascript" ></script>
	<script src="{{asset('tnd/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js')}}"></script>
	<script src="{{asset('tnd/js/jquery.nicescroll.js')}}"></script>
	<script src="{{asset('tnd/toast/jquery.toast.min.js')}}"></script>
	<script src="{{asset('tnd/js/scripts.js')}}"></script>
	<script>
      $(document).ready(function(){
          // $('.nav a[href="{{ Request::url() }}"]').removeClass('active');
          $('.nav a[href="{{ Request::url() }}"]').parent().closest('li').addClass('active');

      });
	</script>
	@stack('after_script')
	@yield('after_script')
	{!! Toastr::message() !!}
</body>
</html>
