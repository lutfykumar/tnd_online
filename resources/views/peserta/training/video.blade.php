@extends('layouts.app')
@section('title', 'Video Elearning')
@section('after_style')
    <link href="{{asset('tnd/multi/css/multi-select.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('tnd/css/jquery.steps.css?1')}}">
    <style>
        .v_video {
            width: 100%;
            border: none;
            height: 200px;
        }
        .video-title {
            font-size: 16px;
            color: #030303;
            font-weight: 600;
            text-transform: uppercase;
        }
        .video-total {
            font-size: 16px;
            color: #030303;
            font-weight: 600;
            padding-top: 3px;
            text-transform: uppercase;
        }
        .wizard, .tabcontrol {
            padding-top: 10px;
        }
        .video-testimonial-block { position: relative; width: auto; height: 200px; overflow: hidden;}
        .video-testimonial-block .video-thumbnail { height: 100%; width: 100%; position: absolute; z-index: 1; background-size: cover; top: 0; left: 0; }
        .video-testimonial-block .video { }
        .video-testimonial-block .video iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0px; }
        /* .video-testimonial-block .video-play { position: absolute; z-index: 2; top: 50%; left: 50%; margin-left: -40px; margin-top: -18px; text-decoration: none; } */
        .video-testimonial-block .play { position: absolute; z-index: 2; top: 50%; left: 50%; margin-left: -25px; margin-top: -25px; text-decoration: none; font-size: 55px; color: #1fb5ad}
        .video-testimonial-block .video-play::before { content: "\f144"; font: normal normal normal 14px/1; font-family: 'Font Awesome\ 5 Free'; font-weight: 900; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; font-size: 50px; color: #b3b5bc; }
        .video-testimonial-block .video-play:hover::before { color: #172651; }
        .video-testimonial-block .play:hover::before { color: #172651; }

        .video-thumbnail .img-responsive {
            margin: 0 auto;
            padding-top: 15px;
        }
    </style>
@endsection
@section('content')
    <section id="main-content" style="margin-left:0;">
    <section class="wrapper">
        <div class="container-fluid">
            <div class="row">
                {{--<div class="col-md-4">--}}
                    {{--<section class="panel">--}}
                        {{--<header class="panel-heading">--}}
                            {{--Training {{ $schedule->training->nama_training }} - Pretest--}}
                            {{--<span class="tools pull-right">--}}
                              {{--<a href="javascript:;" class="fa fa-chevron-down"></a>--}}
                             {{--</span>--}}
                        {{--</header>--}}
                        {{--<div class="panel-body">--}}
                            {{--<div class="text-center">--}}
                                {{--<h3>Nilai Pretest Anda, </h3>--}}
                                {{--@if ($nilaiPretest != null)--}}
                                    {{--@if ($nilaiPretest < 60)--}}
                                        {{--<h3 class="text-danger">{{ $nilaiPretest }} | Buruk </h3>--}}
                                    {{--@else--}}
                                        {{--<h3 class="text-danger">{{ $nilaiPretest }} | Baik </h3>--}}
                                    {{--@endif--}}
                                {{--@else--}}
                                    {{--<h3 class="text-danger">Belum Ada | <a href="{{ route('h.training.pretest', $schedule->id) }}" class="btn btn-success btn-flat btn-sm">Pretest Sekarang</a></h3>--}}

                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</section>--}}
                {{--</div>--}}
                {{--<div class="col-md-4">--}}
                    {{--<section class="panel">--}}
                        {{--<header class="panel-heading">--}}
                            {{--Training {{ $schedule->training->nama_training }} - Protest--}}
                            {{--<span class="tools pull-right">--}}
                              {{--<a href="javascript:;" class="fa fa-chevron-down"></a>--}}
                             {{--</span>--}}
                        {{--</header>--}}
                        {{--<div class="panel-body">--}}
                            {{--<div class="text-center">--}}
                                {{--<h3>Nilai Postest Anda, </h3>--}}
                                {{--@if ($nilaiPostest != null)--}}
                                    {{--@if ($nilaiPostest < 60)--}}
                                        {{--<h3 class="text-danger">{{ $nilaiPostest }} | Buruk </h3>--}}
                                    {{--@else--}}
                                        {{--<h3 class="text-danger">{{ $nilaiPostest }} | Baik </h3>--}}
                                    {{--@endif--}}
                                {{--@else--}}
                                    {{--<h3 class="text-danger">Belum Ada | <a href="{{ route('h.training.postest', $schedule->id) }}" class="btn btn-success btn-flat btn-sm">Postest Sekarang</a></h3>--}}

                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</section>--}}
                {{--</div>--}}
                {{--<div class="col-md-4">--}}
                    {{--<section class="panel">--}}
                        {{--<header class="panel-heading">--}}
                            {{--Training {{ $schedule->training->nama_training }} - Evaluation--}}
                            {{--<span class="tools pull-right">--}}
                              {{--<a href="javascript:;" class="fa fa-chevron-down"></a>--}}
                             {{--</span>--}}
                        {{--</header>--}}
                        {{--<div class="panel-body">--}}
                            {{--<div class="text-center">--}}
                                {{--<h3 class="text-danger">Jangan Lupa Mengisi Evaluasi Training</h3>--}}
                                {{--<a href="{{ route('h.training.evaluation', $schedule->id) }}" class="btn btn-success btn-flat btn-sm">Evaluasi Sekarang</a>--}}
                                {{--<h3>Nilai Postest Anda, </h3>--}}
                                {{--@if ($nilaiPostest != null)--}}
                                {{--@if ($nilaiPostest < 60)--}}
                                {{--<h3 class="text-danger">{{ $nilaiPostest }} | Buruk </h3>--}}
                                {{--@else--}}
                                {{--<h3 class="text-danger">{{ $nilaiPostest }} | Baik </h3>--}}
                                {{--@endif--}}
                                {{--@else--}}
                                {{--<h3 class="text-danger">Belum Ada | <a href="{{ route('h.training.postest', $schedule->id) }}" class="btn btn-success btn-flat btn-sm">Postest Sekarang</a></h3>--}}

                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</section>--}}
                {{--</div>--}}

                <div class="col-sm-10 col-md-offset-1">
                    <section class="panel">
                        <header class="panel-heading text-center">
                            <div class="video-title">{{ $schedule->training->pluck('nama_training')->first() }}</div>
                        </header>
                        <div class="panel-body">
                            <div id="wizard" class="">
                                @php
                                    $no =1;
                                @endphp
                                @if($schedule->training->video->count() > 0)
                                    @foreach($schedule->training->video as $video)
                                        <h2 class="text-capitalize">Video {{$no++ }} - {{ $video->name}}</h2>
                                        <section>
                                            <div class="video-testimonial-block">
                                                <div class="video-thumbnail">
                                                    <img src="{{url('/img/lnk.png')}}" alt="{{ $video->slug}}" class="img-fluid img-responsive">
                                                </div>
                                                <a href="{{route('h.training.view', $video->id)}}" type="button" class="play" data-toggle="modal" data-target="#modal_v" title="{{$video->name}}"><i class="fa fa-play-circle-o"></i></a>
                                            </div>
                                        </section>
                                        <input type="hidden" value="{{$video->id}}" name="video_id">
                                    @endforeach
                                        @if ($nilaiPostest != 0)
                                            @if ($nilaiPostest < 60)
                                                <h2 class="text-capitalize">Post Test</h2>
                                                <section>
                                                    <div class="video-title text-center">
                                                        <h3>Nilai Postest Anda, </h3>
                                                        <h3 class="text-danger">{{ $nilaiPostest }} | Buruk </h3>
                                                    </div>
                                                </section>
                                            @else
                                                <h2 class="text-capitalize">Post Test</h2>
                                                <section>
                                                    <div class="video-title text-center">
                                                        <h3>Nilai Postest Anda, </h3>
                                                        <h3 class="text-danger">{{ $nilaiPostest }} | Baik </h3>
                                                    </div>
                                                </section>
                                            @endif
                                        @else
                                            <h2 class="text-capitalize">Post Test</h2>
                                            <section>
                                                <div class="video-title text-center">
                                                    <h4 class="text-danger">Silahkan Melakukan Post Test dengan Menekan tombol <br>(Post Test Sekarang)</h4>
                                                </div>
                                                <div class="text-center">
                                                    <a href="{{ route('h.training.postest', $schedule->id) }}" class="btn btn-success btn-flat btn-success btn-block">Post Test Sekarang</a>
                                                </div>
                                            </section>
                                        @endif
                                @else
                                    <div class="blo4 p-b-63 p-t-30">
                                        <h2 class="text-center"><strong>Sorry, No Videos Found :(</strong></h2>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-12">
                    <div aria-hidden="true" aria-labelledby="video" role="dialog" tabindex="-1" id="modal_v" class="modal fade" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header" id="modal-header">
                                    <button aria-hidden="true" data-dismiss="modal" class="close" style="margin-top: -10px" type="button">×</button>
                                </div>

                                <div class="modal-body" id="m_body" style="padding: 0px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </section>
@endsection
@section('after_script')
    <script src="{{asset('tnd/js/jquery-steps/jquery.steps.js') }}"></script>
    <script>
        $(function() {
            $("#wizard").steps({
                headerTag: "h2",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                stepsOrientation: "vertical",

                /* Templates */
                // titleTemplate: '<span class="number">#index#.</span> #title#',
                // loadingTemplate: '<span class="spinner"></span> #Loading#',
                labels: {
                    cancel: "Cancel",
                    current: "current step:",
                    pagination: "Pagination",
                    finish: "Finish",
                    next: "Next",
                    previous: "Previous",
                    loading: "Loading ..."
                }

            });
            // $('#modal_v').on('hidden.bs.modal', function (e) {
            // $('#modal_v iframe').attr("src", $("#modal_v iframe").attr("src"));
            // });
            // $(".play").on('click', function(e) {
            // e.preventDefault(); 
            // $('#modal_v').on('hidden.bs.modal', function (e) {
            // $('#modal_v iframe').attr("src", $("#modal_v iframe").attr("src"));
            // });
            // function showData(id) {
            //     URL:
            // }
            // });
        });
        $('body').on('click', '.play', function (event) {
            event.preventDefault();

            var me = $(this),
                url = me.attr('href'),
                title = me.attr('title');

            $('#m_title').text(title);

            $.ajax({
                url: url,
                dataType: 'html',
                success: function (response) {
                    $('#m_body').html(response);
                }
            });

            $('#modal_v').modal('show');
        });
    </script>
@endsection