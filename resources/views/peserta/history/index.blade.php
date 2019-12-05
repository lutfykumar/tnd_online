@extends('layouts.app')
@section('title', 'Training History')
@section('after_style')
    <link type="text/css" rel="stylesheet" href="{{ asset('tnd/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('tnd/dataTables/Responsive-2.2.3/css/responsive.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('tnd/sweetalert2/sweetalert2.min.css') }}">
    <style>
    
    </style>
@endsection
@section('content')
    <section id="main-content" style="margin-left:0;">
    <section class="wrapper">
        <section class="panel panel-default">
                <div class="panel-body" style="background-color: #fff;">
                    <div class="row">
                        <div class="col-md-12">
                @if(Auth::check())
                    <table id="datatable" class="table table-striped table-bordered table-hover nowrap" width="100%">
                        <thead class="text-primary">
                        <tr>
                            <th>Type</th>
                            <th>Jadwal Start</th>
                            <th>Jadwal Finish</th>
                            <th>Training</th>
                            <th>Status</th>
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
                </div>
        </section>
    </section>
    </section>
@endsection
@section('after_script')
    <script src="{{ asset('tnd/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('tnd/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('tnd/dataTables/Responsive-2.2.3/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('tnd/dataTables/Responsive-2.2.3/js/responsive.bootstrap.min.js') }}"></script>
    <script>
        $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('table.h.h') }}",
            columns: [
                {data: 'type', name: 'type', orderable: false, searchable: false},
                {data: 'date_from', name: 'date_from', orderable: false, searchable: false},
                {data: 'date_finish', name: 'date_finish', orderable: false, searchable: false},
                {data: 'training', name: 'training', orderable: false, searchable: false},
                {data: 'status', name: 'status', orderable: false, searchable: false}
            ]
        });
    </script>
@endsection