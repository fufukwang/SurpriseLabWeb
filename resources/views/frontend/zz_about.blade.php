@extends('frontend.layout')


@section('content')
        <div class="section-02">
            <div class="main-container hidden-xs">
                <h1>{{ trans('front.about.section1title') }}</h1>
                <p>{!! trans('front.about.section1notes') !!}</p>
                <!-- bg1 & 2 -->
                <img class="bgs bg-knife2" src="/images/cut3_about/cut2-knife2.png" alt="">
                <img class="bgs bg-folk1" src="/images/cut3_about/cut2-folk1.png" alt="">
                
            </div>
            <div class="main-container main-even-container hidden-xs">
                <h1>{{ trans('front.about.section2title') }}</h1>
                <p>{!! trans('front.about.section2notes') !!}</p>
                <!-- bg3-->
                <img class="bgs bg-spoon" src="/images/cut3_about/cut2-spoon.png" alt="">
                
            </div>
            <div class="main-container">
                <h1 style="margin-bottom:45px;">{{ trans('front.about.steptitle') }}</h1>
                <div class="about-step-box">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="about-step">
                                <div class="step-number">
                                    1
                                </div>
                                <div>
                                    <img src="/images/cut3-about/process1.png" alt="">
                                    <p>{{ trans('front.about.step1') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-step">
                                <div class="step-number">
                                    2
                                </div>
                                <div>
                                    <img src="/images/cut3-about/process2.png" alt="">
                                    <p>{{ trans('front.about.step2') }}</p>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-step">
                                <div class="step-number">
                                    3
                                </div>
                                <div>
                                    <img src="/images/cut3-about/process3.png" alt="">
                                    <p>{{ trans('front.about.step3') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-step">
                                <div class="step-number">
                                    4
                                </div>
                                <div>
                                    <img src="/images/cut3-about/process4.png" alt="">
                                    <p>{{ trans('front.about.step4') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- bg4 & 5-->
                <img class="bgs bg-folk2 hidden-xs" src="/images/cut3_about/cut2-folk2.png" alt="">
                <img class="bgs bg-knife1 hidden-xs" src="/images/cut3_about/cut2-knife1.png" alt="">
            </div>
            <div class="main-container main-even-container">
                {!! trans('front.about.eventfooter') !!}
                <!-- bg3-->
                <img class="bgs bg-spoon2 visible-xs" src="/images/cut3_about/cut2-spoon.png" alt="">
            </div>
        </div>

@endsection