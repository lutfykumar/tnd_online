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
								<form id="form-change-password" role="form" method="POST" action="{{url('password')}}" novalidate class="form-horizontal" autocomplete="off">
									<div class="col-md-9">
										<label for="current-password" class="col-sm-4 control-label">Password Lama</label>
										<div class="col-sm-7">
											<div class="form-group">
												<input type="hidden" name="_token" value="{{ csrf_token()}}">
												<input type="hidden" name="id" value="{{auth()->user()->id}}" placeholder="Password" >
												<input type="password" class="form-control" id="current-password" name="password_lama" required placeholder="Password" autocomplete="off">
											</div>
										</div>
										<label for="password" class="col-sm-4 control-label">Password</label>
										<div class="col-sm-7">
											<div class="form-group">
												<input type="password" class="form-control" id="password" name="password" required placeholder="Password" autocomplete="off">
											</div>
										</div>
										<label for="password_confirmation" class="col-sm-4 control-label">Password(again)</label>
										<div class="col-sm-7">
											<div class="form-group">
												<input type="password" class="form-control" id="password_confirmation" name="password_confirm" required placeholder="Re-enter Password" autocomplete="off">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-6 col-sm-4">
											<button type="submit" class="btn btn-primary">change password</button>
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