@extends('layouts.layout')
@section('css')
 <style>
     .v_video_detail {
        width: 70%;
        border: none;
        height: 300px;                                                           
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
     .wizard > .content > .body {
         padding: 0px !important;
     }
     .wizard > .actions {
        padding-top: 10px;
     }
     .wizard > .steps .number {
         display: none !important;
     }
     .wizard > .steps a {
         text-transform: capitalize;
     }
     #wizard {
        margin: 10px 5px !important;
    }
    .video-testimonial-block { position: relative; width: auto; height: 240px; overflow: hidden;}
    .video-testimonial-block .video-thumbnail { height: 100%; width: 100%; position: absolute; z-index: 1; background-size: cover; top: 0; left: 0; }
    .video-testimonial-block .video { }
    .video-testimonial-block .video iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0px; }
    /* .video-testimonial-block .video-play { position: absolute; z-index: 2; top: 50%; left: 50%; margin-left: -40px; margin-top: -18px; text-decoration: none; } */
    .video-testimonial-block .play { position: absolute; z-index: 2; top: 50%; left: 50%; margin-left: -25px; margin-top: -25px; text-decoration: none; font-size: 55px; color: #f4f4f4}
    .video-testimonial-block .video-play::before { content: "\f144"; font: normal normal normal 14px/1; font-family: 'Font Awesome\ 5 Free'; font-weight: 900; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; font-size: 50px; color: #b3b5bc; }
    .video-testimonial-block .video-play:hover::before { color: #172651; }
    .video-testimonial-block .play:hover::before { color: #172651; }
    #modal_v .modal-body {
        padding: 0px !important;
    }
 </style>
@endsection
@section('content')
    <section id="main-content" style="margin-left:0;">
    <section class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-10 col-md-offset-1">
                <section class="panel">
                        <header class="panel-heading text-center">
                            <div class="video-title">{{ $categories->pluck('name')->first() }}</div>
                        </header>
                         <div class="panel-body">
                            <div id="wizard" class="">
                                @php
                                 $no =1;
                                @endphp
                                @if($videos->count() > 0)
                                    @foreach($videos as $video)
                                    <h2 class="text-capitalize">Video {{$no++ }} - {{ $video->name}}</h2>
                                    <section>
                                        <div class="video-testimonial-block">
                                        <div class="video-thumbnail"><img src="
                                            {{url('storage/video/images/'.$video->image)}}" alt="{{ $video->slug}}" class="img-fluid img-responsive">
                                        </div>

                                    <a href="{{route('h.learning.view', $video->id)}}" type="button" class="play" data-toggle="modal" data-target="#modal_v" title="{{$video->name}}"><i class="fa fa-play-circle-o"></i></a>
                                        </div>
                                    </section>
                                    <input type="hidden" value="{{$video->id}}" name="video_id">
                                @endforeach
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
                    <div aria-hidden="true" aria-labelledby="video" role="dialog" tabindex="-1" id="modal_v" class="modal fade">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    {{-- <div class="modal-header">
                                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                        <h4 class="modal-title" id="m_title">Nama Video</h4>
                                    </div> --}}
                                    <div class="modal-body" id="m_body">
                                        {{-- <div class="content_v">
                                            <iframe width="100%" height="400" src="https://www.youtube.com/embed/8iEgci-npU8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div> --}}
                                    </div>
                                    {{-- <div class="modal-footer">
                                        <div class="pull-right">
                                            <div class="title">Posted By : User</div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    </section>
@endsection
@section('js')
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