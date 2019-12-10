@extends('layouts.app')
@section('title', 'Profile')
@push('after_style')
	<style>

	</style>
@endpush
@section('content')
	<section id="main-content" style="margin-left:0;">
		<section class="wrapper">

			<div class="col-md-6">
				<section class="panel">
					<header class="panel-heading tab-bg-dark-navy-blue ">
						<ul class="nav nav-tabs">
							<li class="active">
								<a data-toggle="tab" href="#profile">Profile</a>
							</li>
							<li class="">
								<a data-toggle="tab" href="#setting">Setting</a>
							</li>
						</ul>
					</header>
					<div class="panel-body">
						<div class="tab-content tasi-tab">
							<div id="setting" class="tab-pane">
								<form method="POST" action="{{ route('password.change') }}" role="form" class="form-horizontal" style="padding: 15px">
									{{ csrf_field() }}
									{{ method_field('PATCH') }}
									<div class="row">
										<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
											<label for="old_password">Old Password : </label>
										</div>
										<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
											<div class="form-group">
												<div class="form-line">
													<input type="password" id="old_password" class="form-control" placeholder="Enter your old password" name="old_password">
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
											<label for="password">New Password : </label>
										</div>
										<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
											<div class="form-group">
												<div class="form-line">
													<input type="password" id="password" class="form-control" placeholder="Enter your new password" name="password">
												</div>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
											<label for="confirm_password">Confirm Password : </label>
										</div>
										<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
											<div class="form-group">
												<div class="form-line">
													<input type="password" id="confirm_password" class="form-control" placeholder="Enter your new password again" name="password_confirmation">
												</div>
											</div>
										</div>
									</div>
									
									
									
									<div class="row">
										<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
											<button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
										</div>
									</div>
								</form>
							</div>
							<div id="profile" class="tab-pane active">
								<div class="tab-content">
									<div class="panel-body profile-information">
										<div class="col-md-4">
											<div class="profile-pic text-center">
												<img src="{{asset('tnd/images/avatar.png')}}" alt=""/>
											</div>
										</div>
										<div class="col-md-7">
											<div class="profile-desk">
												<h1>{{auth()->user()->karyawan->nama }}</h1>
												@if(auth()->user()->level_id == 1)
													<span class="text-muted">Online</span>
												@else
													<span class="text-muted">Peserta</span>
												@endif
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			@if (count($errors) > 0)
				<div class="col-md-6">
					<div class="alert alert-danger">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				</div>
			@endif
			@if (session('error'))
				<div class="col-md-6">
					<div class="alert alert-danger fade in">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						<strong>Error!</strong> {{ session('error') }}
					</div>
				</div>
			@endif
		</section>
	</section>
@endsection