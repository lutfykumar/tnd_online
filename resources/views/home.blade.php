@extends('layouts.app')
@section('title', 'Home')
@push('after_style')
	<link type="text/css" rel="stylesheet" href="{{ asset('lib/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ asset('lib/dataTables/Responsive-2.2.3/css/responsive.bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('lib/sweetalert2/sweetalert2.min.css') }}">
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
						<table id="datatable" class="table table-striped table-bordered table-hover nowrap" width="100%">
							<thead class="text-primary">
							<tr>
								<th>Type</th>
								<th>Jadwal Start</th>
								<th>Jadwal Finish</th>
								<th>Training</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							
							</tbody>
						</table>
					@else
						<h3>Bukan Peserta</h3>
					@endif
				</div>
			</div>
		</section>
	</section>
@endsection
@section('after_script')
<script src="{{ asset('lib/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('lib/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('lib/dataTables/Responsive-2.2.3/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('lib/dataTables/Responsive-2.2.3/js/responsive.bootstrap.min.js') }}"></script>
<script>
    $('#datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('table.h.p') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'type', name: 'type', orderable: false, searchable: false},
            {data: 'date_from', name: 'date_from', orderable: false, searchable: false},
            {data: 'date_finish', name: 'date_finish', orderable: false, searchable: false},
            {data: 'training', name: 'training', orderable: false, searchable: false},
            {data: 'status', name: 'status', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
</script>
@endsection
