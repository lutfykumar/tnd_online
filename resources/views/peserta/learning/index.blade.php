@extends('layouts.layout')
@section('css')
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
    .video-total {
        font-size: 16px;
        color: #030303;
        font-weight: 600;
        padding-top: 3px;
        text-transform: uppercase;
     }
    .video-testimonial-block { position: relative; width: auto; height: 250px; overflow: hidden;}
    .video-testimonial-block .video-thumbnail { height: 100%; width: 100%; position: absolute; z-index: 1; background-size: cover; top: 0; left: 0; }
    .video-testimonial-block .video { }
    .video-testimonial-block .video iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0px; }
    /* .video-testimonial-block .video-play { position: absolute; z-index: 2; top: 50%; left: 50%; margin-left: -40px; margin-top: -18px; text-decoration: none; } */
    .video-testimonial-block .play { position: absolute; z-index: 2; top: 50%; left: 50%; margin-left: -25px; margin-top: -25px; text-decoration: none; font-size: 55px; color: #f4f4f4}
    .video-testimonial-block .video-play::before { content: "\f144"; font: normal normal normal 14px/1; font-family: 'Font Awesome\ 5 Free'; font-weight: 900; font-size: inherit; text-rendering: auto; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; font-size: 50px; color: #b3b5bc; }
    .video-testimonial-block .video-play:hover::before { color: #172651; }
    .video-testimonial-block .play:hover::before { color: #172651; }
 </style>
@endsection
@section('content')
    <section id="main-content" style="margin-left:0;">
    <section class="wrapper">
        <div class="container-fluid">
            <div class="row">
                @foreach ($model as $cat)
                    <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="video-testimonial-block">
                            <div class="video-thumbnail"><img src="@if ($cat->categories->image == 'default.png')
                               http://placekitten.com/450/300
                            @else
                                {{ asset('storage/video/category/'. $cat->categories->image) }}
                            @endif " alt="{{$cat->slug }}" class="img-fluid img-responsive"></div>
                                        {{-- <div class="video">
                                            <iframe src="https://www.youtube.com/embed/KEiAVv1UNac" allowfullscreen>
                                            </iframe>
                                        </div> --}}
                                    <a href="{{ url('e-learning/'. $cat->video_category_id .'/'. $cat->user_id .'/'. $cat->akses .'')}}" type="button" class="play"><i class="fa fa-play-circle-o"></i></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="video-title">
                                {{ $cat->categories->name }}
                            </div>
                            {{-- <div class="video-total">
                                Total video {{ $cat->videos->count() }}
                            </div> --}}
                        </div>
                        {{-- <div class="panel-footer">
                        <a href="{{ route('h.learning.detail', $cat->slug)}}" type="button" class="btn btn-success btn-xs btn-flat">Lihat Video</a>
                            <a type="button" class="btn btn-info btn-xs btn-flat">Share</a>
                            <button class="btn btn-danger btn-xs btn-flat pull-right"><i class="fa fa-heart-o"></i></button>
                        </div> --}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    </section>
@endsection
@section('js')
    <script>
//    $(function() {

//        $(".play").on('click', function(e) {
//         e.preventDefault(); 
//         var vidWrap = $(this).parent(),
//             // iframe = vidWrap.find('.video iframe'),
//             iframeSrc = iframe.attr('src'),
//             iframePlay = iframeSrc += "?autoplay=1";
//         vidWrap.children('.video-thumbnail').fadeOut();
//         vidWrap.children('.play').fadeOut();
//         // vidWrap.find('.video iframe').attr('src', iframePlay);
//         });
        

//     });
    </script>
@endsection