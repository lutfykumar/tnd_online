@extends('layouts.app')
@section('title', 'Home')
@push('after_style')
	<style>
		.v_video {
			width: 100%;
			border: none;
			height: 200px;
		}
		.panel-heading {
			padding: 3px 3px !important;
		}
		.video-title {
			font-size: 16px;
			color: #030303;
			font-weight: 600;
			padding: 10px 0px;
			text-transform: uppercase;
		}
		.video-thumbnail .img-responsive {
			margin: 0 auto;
		}
	</style>
@endpush
@section('content')
	<section id="main-content" style="margin-left:0;">
		<section class="wrapper">
			<div class="container-fluid">
				<div class="row">
					@if(Auth::check())
						@foreach($model->schedules as $item)
							@if ($item != null)
								@foreach ($sche as $v)
									@if ($v->id == $item->id)
										@if ($today < $v->date_finish)
											@foreach($hasil as $ha)
												@if ($v->id == $ha->schedule_id && $ha->status == false)
													@if ($v->count() > 0 )
														<div class="col-md-3">
															<div class="panel panel-default">
																<div class="panel-heading">
																	<div class="video-testimonial-block">
																		<div class="video-thumbnail"><img src="{{url('/img/lnk.png')}}" alt="lnk" class="img-fluid img-responsive"></div>
																	</div>
																</div>
																<div class="panel-body" style="padding: 0px 5px 0px 5px !important;">
																	<div class="video-title">
																		{{ $v->training->nama_training }}
																	</div>
																	<div class="text-center text-danger">
																		Expired Date :
																		{{ $v->date_from->format('d M Y') }}
																		-
																		{{ $v->date_finish->format('d M Y') }}
																	</div>
																</div>
																<div class="panel-footer" style="background-color: #ffffff">
																	<a href="{{ route('h.training.pretest', $v->id) }}" type="button" class="btn btn-success btn-block btn-xs btn-flat">Ikuti Training</a>
																</div>
															</div>
														</div>
													@else
														<div class="col-md-6 col-md-offset-3">
															<div class="title">
																<h2 class="text-center"><strong>Sorry, No Training Found :(</strong></h2>
															</div>
														</div>
													@endif
												@endif
												{{--@if ($v->id == $ha->schedule_id && $ha->status == true)--}}
														{{--<div class="col-md-6 col-md-offset-3">--}}
															{{--<div class="title">--}}
																{{--<h2 class="text-center"><strong>Sorry, Training Sudah Di ikuti :(</strong></h2>--}}
															{{--</div>--}}
														{{--</div>--}}
												{{--@endif--}}
											@endforeach
										@else
											<div class="col-md-6 col-md-offset-3">
												<div class="title">
													<h2 class="text-center"><strong>Sorry, Training Sudah Expired :(</strong></h2>
												</div>
											</div>
										@endif
									@endif
								@endforeach
							@else
								<div class="col-md-6 col-md-offset-3">
									<div class="title">
										<h2 class="text-center"><strong>Sorry, No Training Found :(</strong></h2>
									</div>
								</div>
							@endif
							
						@endforeach
					
					@else
						<h3>Bukan Peserta</h3>
					@endif
				</div>
			</div>
		</section>
	</section>
@endsection
