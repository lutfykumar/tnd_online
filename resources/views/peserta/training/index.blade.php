@extends('layouts.layout')
@section('css')
    <style>
        .training-img{
            position: relative;
            width: auto;
            height: auto;
            overflow: hidden;
        }
        .panel-body {
            padding: 0px !important;
        }
    </style>
@endsection
@section('content')
    <section id="main-content" style="margin-left:0;">
    <section class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <section class="panel panel-primary">
                        <div class="panel-body">
                            <div class="training-img">
                                <img class="img-fluid img-responsive" src="http://placekitten.com/450/300" alt="">
                            </div>
                        </div>
                        <div class="panel-footer" style="background-color: #fff; border-top: 2px solid #428bca;">
                            Training name
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    </section>
@endsection
@section('js')
@endsection