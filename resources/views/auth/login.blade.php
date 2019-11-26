@extends('layouts.auth')
@section('title', 'Login')
@push('after_style')
	<style>
		#username{
			text-transform: uppercase;
		}
		.btn-modal {
			background: #1fb5ac;
			color: #fff;
		}
		.btn-modal:hover {
			background: #1fb5ac;
			color: #fff;
		}
		.modal-header {
			background: #1fb5ac;
			color: #fff;
		}
		.modal-body {
			background: #eaeaec;
		}
		.modal-footer {
			margin-top: 0px;
		}
	</style>
@endpush
@section('content')
	<form class="form-signin" method="POST" action="{{ route('login.do') }}">
		{{ csrf_field() }}
		<h2 class="form-signin-heading">Sign in Training System</h2>
		<div class="login-wrap">
			<div class="user-login-info">
				<input type="text" name="username" id="username" class="form-control" placeholder="NIK Karyawan" required autofocus autocomplete="off" >
				<input type="password" name="password" id="password" class="form-control" placeholder="PASSWORD" required autocomplete="off">
			</div>
			<label class="checkbox">
				<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><span style="color: #1fb5ac;">Remember me</span>
				<span class="pull-right">
					<a data-toggle="modal" href="#myModal"> Forgot Password?</a>
				</span>
			</label>
			<button class="btn btn-lg btn-login btn-block" type="submit"> <i class="fa fa-user"></i> Sign in</button>
		</div>
	</form>

	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Forgot Password ?</h4>
				</div>
				<div class="modal-body">
					<p>Enter your e-mail address below to reset your password.</p>
					<input type="text" name="email" placeholder="Email Karyawan (contoh : xxx@lnk.co.id)" autocomplete="off" class="form-control placeholder-no-fix">
				</div>
				<div class="modal-footer">
					<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
					<button class="btn btn-modal" type="button">Submit</button>
				</div>
			</div>
		</div>
	</div>
@endsection
