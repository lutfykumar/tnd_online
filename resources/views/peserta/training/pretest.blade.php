@extends('layouts.app')
@section('title', 'Pre Test Online')
@section('after_style')
    <link href="{{ asset('tnd/iCheck/all.css') }}" rel="stylesheet" type="text/css">
    <style>
        .training-img{
            position: relative;
            width: auto;
            height: auto;
            overflow: hidden;
        }
        .training-img .img-responsive {
            margin: 0 auto;
        }
        .panel-footer .subm {
            width: 200px;
        }
        .a {
            font-size: 12px;
        }
    </style>
@endsection
@section('content')
    <section id="main-content" style="margin-left:0;">
    <section class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Training {{ $schedule->training->nama_training }} - Pretest
                            <span class="tools pull-right">
                              <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <form role="form" method="POST" action="{{ route('h.training.pretest.store', $schedule->id) }}">
                                <input type="hidden" value="{{ $schedule->id }}" name="schedule_id">
                                {{ csrf_field() }}
                                @foreach($schedule->training->soal->shuffle() as $key=>$v)
                                    <input type="hidden" value="{{$v->id}}" name="nomer_soal[]">
                                    <div class="form-group{{ $errors->has('jawaban') ? ' has-error' : '' }}" style="border-bottom: 1px solid; padding: 10px; font-size: 15px">
                                        @php
                                            $no = $key + 1;
                                            $label = $v->soal;
                                            $fieldA = 'pilihan_a';
                                            $fieldB = 'pilihan_b';
                                            $fieldC = 'pilihan_c';
                                            $fieldD = 'pilihan_d';
                                        @endphp
                                        {{--<label class="col-md-1 control-label"></label>--}}
                                        <label for="" class="control-label">{{ $no }} . {{ $label }}</label>
                                        <div class="row" style="margin-left: 10px">
                                            <div class="col-md-3">
                                                <input type="radio" value="1" id="{{ $fieldA }}" class="flat-green" name="jawaban{{$v->id}}">
                                                @if ($errors->has($fieldA))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first($fieldA) }}</strong>
                                                </span>
                                                @endif
                                                <label for="{{ $fieldA }}" class="a">{{ $v->pilihan_a }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" value="2" id="{{ $fieldB }}" class="flat-green" name="jawaban{{$v->id}}">
                                                @if ($errors->has($fieldB))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first($fieldB) }}</strong>
                                                </span>
                                                @endif
                                                <label for="{{ $fieldB }}" class="a">{{ $v->pilihan_b }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" value="3" id="{{ $fieldC }}" class="flat-green" name="jawaban{{$v->id}}">
                                                @if ($errors->has($fieldC))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first($fieldC) }}</strong>
                                                </span>
                                                @endif
                                                <label for="{{ $fieldC }}" class="a">{{ $v->pilihan_c }}</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" value="4" id="{{ $fieldD }}" class="flat-green" name="jawaban{{$v->id}}">
                                                @if ($errors->has($fieldD))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first($fieldD) }}</strong>
                                                </span>
                                                @endif
                                                <label for="{{ $fieldD }}" class="a">{{ $v->pilihan_d }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-sm btn-flat" style="width: 250px">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    </section>
@endsection
@section('after_script')
    <script src="{{ asset('tnd/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function() {
            $('input[type="radio"].flat-green').iCheck({
                radioClass: 'iradio_flat-green'
            })
            $('input[type="radio"].flat-red').iCheck({
                radioClass: 'iradio_flat-red'
            });

        });
        $(document).on('click', 'input[type="checkbox"]', function() {
            $('input[type="checkbox"]').not(this).prop('checked', false);
        });
    </script>
@endsection