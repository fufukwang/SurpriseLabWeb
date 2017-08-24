@extends('frontend.layout')


@section('content')
<div class="section-02">
            <div class="main-container main-even-container">
                <div class="main-box">
                    {!! trans('front.chef.menu') !!}
                    {!! trans('front.chef.standard') !!}
                </div>
            </div>
            <!--div class="main-container">
                <<div class="main-box hidden-xs">
                    <p>{!! trans('front.chef.section') !!}</p>
                    <h2 class="mg-top-45" style="color: #a67c52;">
                        {{ trans('front.chef.name') }}
                    </h2>
                </div>-->

                <!--<div style="margin-top:75px;" class="flex-row-box chef-flex">
                    <div class="chef-photo">
                        <img src="/images/chef-bnw.jpg" alt="" height="240">
                    </div>
                    <div class="chef-info visible-xs">
                        <h2 class="mg-top-45" style="color: #a67c52;">
                            {!! trans('front.chef.name2') !!}
                        </h2>
                    </div>
                    <div class="chef-info">{!! trans('front.chef.exp') !!}</div>
                </div>>
            </div-->
            <!--<div class="main-container main-even-container">
                <div class="main-box">
                    <img class="hidden-xs" src="/images/cut3_about/menu.png" alt="">
                    <img class="visible-xs" src="/images/cut3_about/munu-phone.png" alt="">
                </div>
            </div>-->
        </div>

@endsection