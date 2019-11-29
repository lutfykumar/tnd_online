@extends('layouts.app')
@section('title', 'Post Test Online')
@section('after_style')

@endsection
@section('content')
    <section id="main-content" style="margin-left:0;">
    <section class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
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
                                    <h3 class="text-danger">Belum Ada | <a href="{{ route('h.training.postest.update', $schedule->id) }}" class="btn btn-success btn-flat btn-sm">Pretest Sekarang</a></h3>
                                @endif
                            </div>
                        </div>
                        <div class="panel-footer" style="background-color: #ffffff">
                            <div class="text-center">
                                <a href="{{ route('h.training.video', $schedule->id) }}" class="btn btn-success btn-block btn-flat">
                                    Lanjut
                                </a>
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