@extends('frontend.layout')


@section('content')

        <div class="section-02 event-section">
            <div class="main-container">
                <div class="event-box2">
                    {!! trans('front.events.chinese-valentine-title') !!}
                </div>
                <div class="event-text-box">
                    {!! trans('front.events.chinese-valentine-content') !!} 
                    <div style="text-align: center;margin-top: 30px;"><a href="reservation.html"><div class="btn btn-standard">馬上訂位</div></a></div>
                </div>
            </div>


        </div>
@endsection
