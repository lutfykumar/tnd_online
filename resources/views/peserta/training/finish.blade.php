@extends('layouts.app')
@section('title', 'Finish Training Online')
@section('after_style')

@endsection
@section('content')
    <section id="main-content" style="margin-left:0;">
    <section class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Training {{ $schedule->training->nama_training }} - Finish
                            <span class="tools pull-right">
                              <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="text-center">
                                <h3>Terimakasih atas partisipasi rekan-rekan dalam mengikuti training.</h3>
                                <h3>Hasil Training sebagai berikut:</h3>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-6">
                    <section class="panel">
                        <header class="panel-heading">
                            Training {{ $schedule->training->nama_training }} - Pretest
                            <span class="tools pull-right">
                              <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="text-center">
                                <h3>Nilai Pretest Anda, </h3>
                                @if ($nilaiPretest != null)
                                    @if ($nilaiPretest < 60)
                                        <h3 class="text-danger">{{ $nilaiPretest }} | Buruk </h3>
                                    @else
                                        <h3 class="text-danger">{{ $nilaiPretest }} | Baik </h3>
                                    @endif
                                @else
                                    <h3 class="text-danger">Belum Ada | <a href="{{ route('h.training.pretest', $schedule->id) }}" class="btn btn-success btn-flat btn-sm">Pretest Sekarang</a></h3>

                                @endif
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-6">
                    <section class="panel">
                        <header class="panel-heading">
                            Training {{ $schedule->training->nama_training }} - Post test
                            <span class="tools pull-right">
                              <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="text-center">
                                <h3>Nilai Post test Anda, </h3>
                                @if ($nilaiPostest != null)
                                    @if ($nilaiPostest < 60)
                                        <h3 class="text-danger">{{ $nilaiPostest }} | Buruk </h3>
                                    @else
                                        <h3 class="text-danger">{{ $nilaiPostest }} | Baik </h3>
                                    @endif
                                @else
                                    <h3 class="text-danger">Belum Ada | <a href="{{ route('h.training.postest', $schedule->id) }}" class="btn btn-success btn-flat btn-sm">Postest Sekarang</a></h3>
                                @endif
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-12">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4">
                                    <div class="ba" style="padding: 10px 0px 0px 0px;">
                                        <a href="{{ route('h.schedule') }}" class="btn btn-success btn-flat btn-block">Tutup Training</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    </section>
@endsection
@section('after_script')

@endsection