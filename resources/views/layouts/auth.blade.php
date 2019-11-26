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
<body class="login-body">
	<div class="container">
		@if (session('success'))
			<div class="alert alert-success fade in" id="tes">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>Selamat!</strong> {{ session('success') }}
			</div>
		@endif
		@if (session('error'))
			<div class="alert alert-danger fade in" id="tes">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				<strong>Sorry!</strong> {{ session('error') }}
			</div>
		@endif
			@yield('content')
	</div>
	<footer class="footer-section">
		<div class="text-center">
			Copyright  &copy; 2017 MIS PT. Lautan Natural Krimerindo
		</div>
	</footer>

    {{--<div id="app">--}}
        {{--<nav class="navbar navbar-default navbar-static-top">--}}
            {{--<div class="container">--}}
                {{--<div class="navbar-header">--}}

                    {{--<!-- Collapsed Hamburger -->--}}
                    {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">--}}
                        {{--<span class="sr-only">Toggle Navigation</span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                    {{--</button>--}}

                    {{--<!-- Branding Image -->--}}
                    {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                        {{--{{ config('app.name', 'Laravel') }}--}}
                    {{--</a>--}}
                {{--</div>--}}

                {{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
                    {{--<!-- Left Side Of Navbar -->--}}
                    {{--<ul class="nav navbar-nav">--}}
                        {{--&nbsp;--}}
                    {{--</ul>--}}

                    {{--<!-- Right Side Of Navbar -->--}}
                    {{--<ul class="nav navbar-nav navbar-right">--}}
                        {{--<!-- Authentication Links -->--}}
                        {{--@guest--}}
                            {{--<li><a href="{{ route('login') }}">Login</a></li>--}}
                            {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
                        {{--@else--}}
                            {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>--}}
                                    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                                {{--</a>--}}

                                {{--<ul class="dropdown-menu">--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ route('logout') }}"--}}
                                            {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                            {{--Logout--}}
                                        {{--</a>--}}

                                        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                            {{--{{ csrf_field() }}--}}
                                        {{--</form>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--@endguest--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</nav>--}}

        {{--@yield('content')--}}
    {{--</div>--}}

	@stack('before_script')
	@yield('before_script')
	<script src="{{asset('tnd/js/jquery.js')}}"></script>
	<script src="{{asset('tnd/js/jquery/dist/jquery.min.js')}}"></script>
	<script src="{{asset('tnd/bs3/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('tnd/toast/jquery.toast.min.js')}}"></script>
	<script>
      $(document).ready (function(){
          $(".alert-danger").fadeTo(6000, 100).slideUp(500, function(){
              $("#tes").slideUp("slow");
          });

      });
	</script>
	@stack('after_script')
	@yield('after_script')
	{!! Toastr::message() !!}
</body>
</html>
