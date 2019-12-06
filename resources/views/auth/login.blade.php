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

	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Forgot Password ?</h4>
				</div>
				<form id="form_reset_link" method="POST" role="form" action="{{ route('password.email') }}">
					{{ csrf_field() }}
					<div class="modal-body">
						<p>Enter your e-mail address below to reset your password.</p>
						<input type="email" id="email_reset" name="email" placeholder="Email Karyawan (contoh : xxx@lnk.co.id)" autocomplete="off" class="form-control placeholder-no-fix">
					</div>
					<div class="modal-footer">
						<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
						<button class="btn btn-modal" type="button" id="btn_reset_link">Send Password Reset Link</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-body text-center">
					<div class="loader">
						<i class="fa fa-circle-o-notch fa-spin fa-2x"></i> <span
							style="font-size: 16px;font-weight: 600;">Loading....</span>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@push('after_script')
	<script type="text/javascript">
		$(function(){
			$('#btn_reset_link').on("click", function (event) {
				event.preventDefault();
				if ($('#email_reset').val() == "") {
					alert("Please fill required field");
				} else {
					var me = $('#form_reset_link'),
							email = $('#email_reset').val();
							url = me.attr('action'),
							title = me.attr('title'),
							csrf_token = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
						url: url,
						type: "POST",
						data: {
							email : email,
							'_method': 'POST',
							'_token': csrf_token
						},
						beforeSend: function () {
							$("#loadMe").modal({
								backdrop: "static", //remove ability to close modal with click
								keyboard: false, //remove option to close with keyboard
								show: true //Display loader!
							});
						},
						success: function (data) {
							$('#myModal').modal('hide');
							$("#loadMe").modal('hide');
							swal({
								type: 'success',
								icon: 'success',
								title: 'Reset Link Success Send',
								showConfirmButton: false,
								timer: 1500
							})
						},
						error: function (xhr) {
							$('#myModal').modal('hide');
							$("#loadMe").modal('hide');
							swal({
								type: 'error',
								title: 'Oops...',
								text: 'Something went wrong!',
								showConfirmButton: false,
								timer: 1000
							});
						}
					});
				}
			});
		});
	</script>
@endpush
