@extends('frontend.layout')


@section('content')

        <div class="section-02 event-section">
            <div class="main-container" style="padding: 20px 15px;">
                <a href="https://surpriselab.typeform.com/to/ptbLEa" target="_blank">
                    <div class="event-box3">
                        {!! trans('front.events.chinese-single-title') !!}
                    </div>
                </a>
                <a href="event_chinese-valentine.html">
                    <div class="event-box2">
                        {!! trans('front.events.chinese-valentine-title') !!}
                    </div>
                </a>
                <a href="event.html">
                    <div class="event-box">
                        {!! trans('front.events.title') !!}
                    </div>
                </a>
            </div>


        </div>
@endsection