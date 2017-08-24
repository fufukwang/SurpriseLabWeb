@extends('frontend.layout')


@section('content')

<div class="section-02 rules-section">
           
            <div class="hidden-xs rules-nav">
                <ul>
                    <li rules="0">{{ trans('front.rules.role1title') }}</li>
                    <li rules="1">{{ trans('front.rules.role2title') }}</li>
                    <li rules="2">{{ trans('front.rules.role3title') }}</li>
                    <li rules="3">{{ trans('front.rules.role4title') }}</li>
                </ul>
            </div>
           
            <div class="main-container">
                <h1>{{ trans('front.rules.role1title') }}</h1>
                <hr>
                {!! trans('front.rules.role1section') !!}
            </div>
            <div class="main-container">
                <h1>{{ trans('front.rules.role2title') }}</h1>
                <hr>
                {!! trans('front.rules.role2section') !!}
            </div>
            <div class="main-container">
                <h1>{{ trans('front.rules.role3title') }}</h1>
                <hr>
                {!! trans('front.rules.role3section') !!}
            </div>
            <div class="main-container">
                <h1>{{ trans('front.rules.role4title') }}</h1>
                <hr>
                {!! trans('front.rules.role4section') !!}
                <!--a href="reservation.html">
                    <div class="btn btn-standard">
                        立即訂位
                    </div>
                </a-->
               
            </div>
            
        </div>

@endsection