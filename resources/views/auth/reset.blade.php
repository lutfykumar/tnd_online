@extends('layouts.auth')
@section('title', 'Reset Password')
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
	<form class="form-signin" method="POST" action="{{ route('password.update') }}">
		{{ csrf_field() }}
		{{ method_field('PATCH') }}
		<h2 class="form-signin-heading">Reset Password Peserta</h2>
		<div class="login-wrap">
			<div class="user-login-info">
				<input type="hidden" name="token" value="{{ $token }}">
				{{--<input type="email" name="email" id="email" class="form-control" value="{{ $email or old('email') }}" disabled>--}}
				<input type="password" name="password" id="password" class="form-control" placeholder="PASSWORD" required autocomplete="off">
				<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="CONFIRM PASSWORD" required autocomplete="off">
			</div>
			<button class="btn btn-lg btn-login btn-block" type="submit"> <i class="fa fa-key"></i> Submit</button>
		</div>
	</form>
@endsection
@push('after_script')
	<script type="text/javascript">
	
	</script>
@endpush
