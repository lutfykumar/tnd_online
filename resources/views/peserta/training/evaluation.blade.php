@extends('layouts.app')
@section('title', 'Evaluation Training')
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
                            Training {{ $schedule->training->nama_training }} - Evaluasi Training
                            <span class="tools pull-right">
                              <a href="javascript:;" class="fa fa-chevron-down"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <form role="form" method="POST" action="{{ route('h.training.evaluation.store', $schedule->id) }}">
                                <input type="hidden" value="{{ $training_id }}" name="training_id">
                                <input type="hidden" value="{{ $karyawan_id }}" name="karyawan_id">
                                <input type="hidden" value="{{ $pesertaAct_id }}" name="peserta_act_id">
                                {{--<input type="hidden" value="{{ $schedule->id }}" name="schedule_id">--}}
                                {{ csrf_field() }}

                                    <div class="form-group" style="border-bottom: 1px solid; padding: 10px; font-size: 15px">
                                        @php
                                            $label = 'Pemahaman saya atas materi training ini?';
                                            $fieldA = '1';
                                            $fieldB = '1';
                                            $fieldC = '1';
                                            $fieldD = '1';
                                            $fieldE = '1';

                                            $labelA = 'Sangat Kurang';
                                            $labelB = 'Kurang';
                                            $labelC = 'Cukup';
                                            $labelD = 'Bagus';
                                            $labelE = 'Sangat Bagus';
                                        @endphp
                                        <label for="" class="control-label"> 1 . {{ $label }}</label>
                                        <div class="row" style="margin-left: 10px">
                                            <div class="col-md-2">
                                                <input type="radio" value="1" id="{{ $fieldA }}" class="flat-green" name="jawaban1">
                                                @if ($errors->has($fieldA))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first($fieldA) }}</strong>
                                                </span>
                                                @endif
                                                <label for="{{ $fieldA }}" class="a">{{ $labelA }}</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="radio" value="2" id="{{ $fieldB }}" class="flat-green" name="jawaban1">
                                                @if ($errors->has($fieldB))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first($fieldB) }}</strong>
                                                </span>
                                                @endif
                                                <label for="{{ $fieldB }}" class="a">{{ $labelB }}</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="radio" value="3" id="{{ $fieldC }}" class="flat-green" name="jawaban1">
                                                @if ($errors->has($fieldC))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first($fieldC) }}</strong>
                                                </span>
                                                @endif
                                                <label for="{{ $fieldC }}" class="a">{{ $labelC }}</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="radio" value="4" id="{{ $fieldD }}" class="flat-green" name="jawaban1">
                                                @if ($errors->has($fieldD))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first($fieldD) }}</strong>
                                                </span>
                                                @endif
                                                <label for="{{ $fieldD }}" class="a">{{ $labelD }}</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="radio" value="4" id="{{ $fieldE }}" class="flat-green" name="jawaban1">
                                                @if ($errors->has($fieldE))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first($fieldE) }}</strong>
                                                </span>
                                                @endif
                                                <label for="{{ $fieldE }}" class="a">{{ $labelE }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="border-bottom: 1px solid; padding: 0px 10px 10px 10px; font-size: 15px">
                                        @php
                                            $label = 'Manfaat Training ini untuk mendukung pekerjaan saya?';
                                            $fieldA = '2';
                                            $fieldB = '2';
                                            $fieldC = '2';
                                            $fieldD = '2';
                                            $fieldE = '2';

                                            $labelA = 'Sangat Kurang';
                                            $labelB = 'Kurang';
                                            $labelC = 'Cukup';
                                            $labelD = 'Bagus';
                                            $labelE = 'Sangat Bagus';
                                        @endphp
                                        <label for="" class="control-label"> 2 . {{ $label }}</label>
                                        <div class="row" style="margin-left: 10px">
                                            <div class="col-md-2">
                                                <input type="radio" value="1" id="{{ $fieldA }}" class="flat-green" name="jawaban2">
                                                @if ($errors->has($fieldA))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first($fieldA) }}</strong>
                                                </span>
                                                @endif
                                                <label for="{{ $fieldA }}" class="a">{{ $labelA }}</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="radio" value="2" id="{{ $fieldB }}" class="flat-green" name="jawaban2">
                                                @if ($errors->has($fieldB))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first($fieldB) }}</strong>
                                                </span>
                                                @endif
                                                <label for="{{ $fieldB }}" class="a">{{ $labelB }}</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="radio" value="3" id="{{ $fieldC }}" class="flat-green" name="jawaban2">
                                                @if ($errors->has($fieldC))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first($fieldC) }}</strong>
                                                </span>
                                                @endif
                                                <label for="{{ $fieldC }}" class="a">{{ $labelC }}</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="radio" value="4" id="{{ $fieldD }}" class="flat-green" name="jawaban2">
                                                @if ($errors->has($fieldD))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first($fieldD) }}</strong>
                                                </span>
                                                @endif
                                                <label for="{{ $fieldD }}" class="a">{{ $labelD }}</label>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="radio" value="4" id="{{ $fieldE }}" class="flat-green" name="jawaban2">
                                                @if ($errors->has($fieldE))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first($fieldE) }}</strong>
                                                </span>
                                                @endif
                                                <label for="{{ $fieldE }}" class="a">{{ $labelE }}</label>
                                            </div>
                                        </div>
                                    </div>
                                <div class="form-group" style="border-bottom: 1px solid; padding: 0px 10px 10px 10px; font-size: 15px">
                                    @php
                                        $label = 'Penyajian Materi Pelatihan?';
                                        $fieldA = '3';
                                        $fieldB = '3';
                                        $fieldC = '3';
                                        $fieldD = '3';
                                        $fieldE = '3';

                                        $labelA = 'Sangat Kurang';
                                        $labelB = 'Kurang';
                                        $labelC = 'Cukup';
                                        $labelD = 'Bagus';
                                        $labelE = 'Sangat Bagus';
                                    @endphp
                                    <label for="" class="control-label"> 3 . {{ $label }}</label>
                                    <div class="row" style="margin-left: 10px">
                                        <div class="col-md-2">
                                            <input type="radio" value="1" id="{{ $fieldA }}" class="flat-green" name="jawaban3">
                                            @if ($errors->has($fieldA))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldA) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldA }}" class="a">{{ $labelA }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="2" id="{{ $fieldB }}" class="flat-green" name="jawaban3">
                                            @if ($errors->has($fieldB))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldB) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldB }}" class="a">{{ $labelB }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="3" id="{{ $fieldC }}" class="flat-green" name="jawaban3">
                                            @if ($errors->has($fieldC))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldC) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldC }}" class="a">{{ $labelC }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldD }}" class="flat-green" name="jawaban3">
                                            @if ($errors->has($fieldD))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldD) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldD }}" class="a">{{ $labelD }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldE }}" class="flat-green" name="jawaban3">
                                            @if ($errors->has($fieldE))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldE) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldE }}" class="a">{{ $labelE }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="border-bottom: 1px solid; padding: 0px 10px 10px 10px; font-size: 15px">
                                    @php
                                        $label = 'Kesesuaian materi pelatihan dengan yang diharapkan?';
                                        $fieldA = '4';
                                        $fieldB = '4';
                                        $fieldC = '4';
                                        $fieldD = '4';
                                        $fieldE = '4';

                                        $labelA = 'Sangat Kurang';
                                        $labelB = 'Kurang';
                                        $labelC = 'Cukup';
                                        $labelD = 'Bagus';
                                        $labelE = 'Sangat Bagus';
                                    @endphp
                                    <label for="" class="control-label"> 4 . {{ $label }}</label>
                                    <div class="row" style="margin-left: 10px">
                                        <div class="col-md-2">
                                            <input type="radio" value="1" id="{{ $fieldA }}" class="flat-green" name="jawaban4">
                                            @if ($errors->has($fieldA))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldA) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldA }}" class="a">{{ $labelA }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="2" id="{{ $fieldB }}" class="flat-green" name="jawaban4">
                                            @if ($errors->has($fieldB))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldB) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldB }}" class="a">{{ $labelB }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="3" id="{{ $fieldC }}" class="flat-green" name="jawaban4">
                                            @if ($errors->has($fieldC))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldC) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldC }}" class="a">{{ $labelC }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldD }}" class="flat-green" name="jawaban4">
                                            @if ($errors->has($fieldD))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldD) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldD }}" class="a">{{ $labelD }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldE }}" class="flat-green" name="jawaban4">
                                            @if ($errors->has($fieldE))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldE) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldE }}" class="a">{{ $labelE }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="border-bottom: 1px solid; padding: 0px 10px 10px 10px; font-size: 15px">
                                    @php
                                        $label = 'Fasilitas & Sarana pendukung pelatihan?';
                                        $fieldA = '5';
                                        $fieldB = '5';
                                        $fieldC = '5';
                                        $fieldD = '5';
                                        $fieldE = '5';

                                        $labelA = 'Sangat Kurang';
                                        $labelB = 'Kurang';
                                        $labelC = 'Cukup';
                                        $labelD = 'Bagus';
                                        $labelE = 'Sangat Bagus';
                                    @endphp
                                    <label for="" class="control-label"> 5 . {{ $label }}</label>
                                    <div class="row" style="margin-left: 10px">
                                        <div class="col-md-2">
                                            <input type="radio" value="1" id="{{ $fieldA }}" class="flat-green" name="jawaban5">
                                            @if ($errors->has($fieldA))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldA) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldA }}" class="a">{{ $labelA }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="2" id="{{ $fieldB }}" class="flat-green" name="jawaban5">
                                            @if ($errors->has($fieldB))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldB) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldB }}" class="a">{{ $labelB }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="3" id="{{ $fieldC }}" class="flat-green" name="jawaban5">
                                            @if ($errors->has($fieldC))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldC) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldC }}" class="a">{{ $labelC }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldD }}" class="flat-green" name="jawaban5">
                                            @if ($errors->has($fieldD))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldD) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldD }}" class="a">{{ $labelD }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldE }}" class="flat-green" name="jawaban5">
                                            @if ($errors->has($fieldE))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldE) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldE }}" class="a">{{ $labelE }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="border-bottom: 1px solid; padding: 0px 10px 10px 10px; font-size: 15px">
                                    @php
                                        $label = 'Pemahaman dan penguasaan materi dari instruktur?';
                                        $fieldA = '6';
                                        $fieldB = '6';
                                        $fieldC = '6';
                                        $fieldD = '6';
                                        $fieldE = '6';

                                        $labelA = 'Sangat Kurang';
                                        $labelB = 'Kurang';
                                        $labelC = 'Cukup';
                                        $labelD = 'Bagus';
                                        $labelE = 'Sangat Bagus';
                                    @endphp
                                    <label for="" class="control-label"> 6 . {{ $label }}</label>
                                    <div class="row" style="margin-left: 10px">
                                        <div class="col-md-2">
                                            <input type="radio" value="1" id="{{ $fieldA }}" class="flat-green" name="jawaban6">
                                            @if ($errors->has($fieldA))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldA) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldA }}" class="a">{{ $labelA }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="2" id="{{ $fieldB }}" class="flat-green" name="jawaban6">
                                            @if ($errors->has($fieldB))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldB) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldB }}" class="a">{{ $labelB }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="3" id="{{ $fieldC }}" class="flat-green" name="jawaban6">
                                            @if ($errors->has($fieldC))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldC) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldC }}" class="a">{{ $labelC }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldD }}" class="flat-green" name="jawaban6">
                                            @if ($errors->has($fieldD))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldD) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldD }}" class="a">{{ $labelD }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldE }}" class="flat-green" name="jawaban6">
                                            @if ($errors->has($fieldE))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldE) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldE }}" class="a">{{ $labelE }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="border-bottom: 1px solid; padding: 0px 10px 10px 10px; font-size: 15px">
                                    @php
                                        $label = 'Kejelasan dan sistematika dalam menyampaikan materi?';
                                        $fieldA = '7';
                                        $fieldB = '7';
                                        $fieldC = '7';
                                        $fieldD = '7';
                                        $fieldE = '7';

                                        $labelA = 'Sangat Kurang';
                                        $labelB = 'Kurang';
                                        $labelC = 'Cukup';
                                        $labelD = 'Bagus';
                                        $labelE = 'Sangat Bagus';
                                    @endphp
                                    <label for="" class="control-label"> 7 . {{ $label }}</label>
                                    <div class="row" style="margin-left: 10px">
                                        <div class="col-md-2">
                                            <input type="radio" value="1" id="{{ $fieldA }}" class="flat-green" name="jawaban7">
                                            @if ($errors->has($fieldA))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldA) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldA }}" class="a">{{ $labelA }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="2" id="{{ $fieldB }}" class="flat-green" name="jawaban7">
                                            @if ($errors->has($fieldB))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldB) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldB }}" class="a">{{ $labelB }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="3" id="{{ $fieldC }}" class="flat-green" name="jawaban7">
                                            @if ($errors->has($fieldC))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldC) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldC }}" class="a">{{ $labelC }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldD }}" class="flat-green" name="jawaban7">
                                            @if ($errors->has($fieldD))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldD) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldD }}" class="a">{{ $labelD }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldE }}" class="flat-green" name="jawaban7">
                                            @if ($errors->has($fieldE))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldE) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldE }}" class="a">{{ $labelE }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="border-bottom: 1px solid; padding: 0px 10px 10px 10px; font-size: 15px">
                                    @php
                                        $label = 'Kemampuan instruktur memahami dan menjawab peranyaan?';
                                        $fieldA = '8';
                                        $fieldB = '8';
                                        $fieldC = '8';
                                        $fieldD = '8';
                                        $fieldE = '8';

                                        $labelA = 'Sangat Kurang';
                                        $labelB = 'Kurang';
                                        $labelC = 'Cukup';
                                        $labelD = 'Bagus';
                                        $labelE = 'Sangat Bagus';
                                    @endphp
                                    <label for="" class="control-label"> 8 . {{ $label }}</label>
                                    <div class="row" style="margin-left: 10px">
                                        <div class="col-md-2">
                                            <input type="radio" value="1" id="{{ $fieldA }}" class="flat-green" name="jawaban8">
                                            @if ($errors->has($fieldA))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldA) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldA }}" class="a">{{ $labelA }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="2" id="{{ $fieldB }}" class="flat-green" name="jawaban8">
                                            @if ($errors->has($fieldB))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldB) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldB }}" class="a">{{ $labelB }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="3" id="{{ $fieldC }}" class="flat-green" name="jawaban8">
                                            @if ($errors->has($fieldC))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldC) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldC }}" class="a">{{ $labelC }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldD }}" class="flat-green" name="jawaban8">
                                            @if ($errors->has($fieldD))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldD) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldD }}" class="a">{{ $labelD }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldE }}" class="flat-green" name="jawaban8">
                                            @if ($errors->has($fieldE))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldE) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldE }}" class="a">{{ $labelE }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="border-bottom: 1px solid; padding: 0px 10px 10px 10px; font-size: 15px">
                                    @php
                                        $label = 'Sikap dan antusiasme instruktur dalam mengajar?';
                                        $fieldA = '9';
                                        $fieldB = '9';
                                        $fieldC = '9';
                                        $fieldD = '9';
                                        $fieldE = '9';

                                        $labelA = 'Sangat Kurang';
                                        $labelB = 'Kurang';
                                        $labelC = 'Cukup';
                                        $labelD = 'Bagus';
                                        $labelE = 'Sangat Bagus';
                                    @endphp
                                    <label for="" class="control-label"> 9 . {{ $label }}</label>
                                    <div class="row" style="margin-left: 10px">
                                        <div class="col-md-2">
                                            <input type="radio" value="1" id="{{ $fieldA }}" class="flat-green" name="jawaban9">
                                            @if ($errors->has($fieldA))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldA) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldA }}" class="a">{{ $labelA }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="2" id="{{ $fieldB }}" class="flat-green" name="jawaban9">
                                            @if ($errors->has($fieldB))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldB) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldB }}" class="a">{{ $labelB }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="3" id="{{ $fieldC }}" class="flat-green" name="jawaban9">
                                            @if ($errors->has($fieldC))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldC) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldC }}" class="a">{{ $labelC }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldD }}" class="flat-green" name="jawaban9">
                                            @if ($errors->has($fieldD))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldD) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldD }}" class="a">{{ $labelD }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldE }}" class="flat-green" name="jawaban9">
                                            @if ($errors->has($fieldE))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldE) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldE }}" class="a">{{ $labelE }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="border-bottom: 1px solid; padding: 0px 10px 10px 10px; font-size: 15px">
                                    @php
                                        $label = 'Penguasaan instruktur dengan media pembelajaran?';
                                        $fieldA = '10';
                                        $fieldB = '10';
                                        $fieldC = '10';
                                        $fieldD = '10';
                                        $fieldE = '10';

                                        $labelA = 'Sangat Kurang';
                                        $labelB = 'Kurang';
                                        $labelC = 'Cukup';
                                        $labelD = 'Bagus';
                                        $labelE = 'Sangat Bagus';
                                    @endphp
                                    <label for="" class="control-label"> 10 . {{ $label }}</label>
                                    <div class="row" style="margin-left: 10px">
                                        <div class="col-md-2">
                                            <input type="radio" value="1" id="{{ $fieldA }}" class="flat-green" name="jawaban10">
                                            @if ($errors->has($fieldA))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldA) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldA }}" class="a">{{ $labelA }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="2" id="{{ $fieldB }}" class="flat-green" name="jawaban10">
                                            @if ($errors->has($fieldB))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldB) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldB }}" class="a">{{ $labelB }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="3" id="{{ $fieldC }}" class="flat-green" name="jawaban10">
                                            @if ($errors->has($fieldC))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldC) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldC }}" class="a">{{ $labelC }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldD }}" class="flat-green" name="jawaban10">
                                            @if ($errors->has($fieldD))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldD) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldD }}" class="a">{{ $labelD }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldE }}" class="flat-green" name="jawaban10">
                                            @if ($errors->has($fieldE))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldE) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldE }}" class="a">{{ $labelE }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="border-bottom: 1px solid; padding: 0px 10px 10px 10px; font-size: 15px">
                                    @php
                                        $label = 'Interaksi instruktur dengan peserta?';
                                        $fieldA = '11';
                                        $fieldB = '11';
                                        $fieldC = '11';
                                        $fieldD = '11';
                                        $fieldE = '11';

                                        $labelA = 'Sangat Kurang';
                                        $labelB = 'Kurang';
                                        $labelC = 'Cukup';
                                        $labelD = 'Bagus';
                                        $labelE = 'Sangat Bagus';
                                    @endphp
                                    <label for="" class="control-label"> 11 . {{ $label }}</label>
                                    <div class="row" style="margin-left: 10px">
                                        <div class="col-md-2">
                                            <input type="radio" value="1" id="{{ $fieldA }}" class="flat-green" name="jawaban11">
                                            @if ($errors->has($fieldA))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldA) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldA }}" class="a">{{ $labelA }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="2" id="{{ $fieldB }}" class="flat-green" name="jawaban11">
                                            @if ($errors->has($fieldB))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldB) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldB }}" class="a">{{ $labelB }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="3" id="{{ $fieldC }}" class="flat-green" name="jawaban11">
                                            @if ($errors->has($fieldC))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldC) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldC }}" class="a">{{ $labelC }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldD }}" class="flat-green" name="jawaban11">
                                            @if ($errors->has($fieldD))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldD) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldD }}" class="a">{{ $labelD }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldE }}" class="flat-green" name="jawaban11">
                                            @if ($errors->has($fieldE))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldE) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldE }}" class="a">{{ $labelE }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="border-bottom: 1px solid; padding: 0px 10px 10px 10px; font-size: 15px">
                                    @php
                                        $label = 'Pemanfaatan waktu pelatian (time management)?';
                                        $fieldA = '12';
                                        $fieldB = '12';
                                        $fieldC = '12';
                                        $fieldD = '12';
                                        $fieldE = '12';

                                        $labelA = 'Sangat Kurang';
                                        $labelB = 'Kurang';
                                        $labelC = 'Cukup';
                                        $labelD = 'Bagus';
                                        $labelE = 'Sangat Bagus';
                                    @endphp
                                    <label for="" class="control-label"> 12 . {{ $label }}</label>
                                    <div class="row" style="margin-left: 10px">
                                        <div class="col-md-2">
                                            <input type="radio" value="1" id="{{ $fieldA }}" class="flat-green" name="jawaban12">
                                            @if ($errors->has($fieldA))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldA) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldA }}" class="a">{{ $labelA }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="2" id="{{ $fieldB }}" class="flat-green" name="jawaban12">
                                            @if ($errors->has($fieldB))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldB) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldB }}" class="a">{{ $labelB }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="3" id="{{ $fieldC }}" class="flat-green" name="jawaban12">
                                            @if ($errors->has($fieldC))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldC) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldC }}" class="a">{{ $labelC }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldD }}" class="flat-green" name="jawaban12">
                                            @if ($errors->has($fieldD))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldD) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldD }}" class="a">{{ $labelD }}</label>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" value="4" id="{{ $fieldE }}" class="flat-green" name="jawaban12">
                                            @if ($errors->has($fieldE))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first($fieldE) }}</strong>
                                                </span>
                                            @endif
                                            <label for="{{ $fieldE }}" class="a">{{ $labelE }}</label>
                                        </div>
                                    </div>
                                </div>


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