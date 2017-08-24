@extends('frontend.layout')


@section('content')      
        <!-- first cut -->
         
        <div class="section-02 people-section">
           
            <div class="people-nav" style="margin-bottom: 60px;">
                <ul>
                    <li class="after-arrow">
                        <div>1</div>
                        <span># 無光晚餐</span>
                    </li>
                    <li class="after-arrow">
                        <div>2</div>
                        <span style="margin-top:-10px;">
                            {!! trans('front.people.two') !!}
                        </span>
                    </li>
                    <li>
                        <div>3</div>
                        <span>
                            {{ trans('front.people.three') }}
                        </span>
                    </li>
                </ul>
            </div>
            <div class="tagboard-embed" tgb-slug="無光晚餐/273851" tgb-layout="waterfall" tgb-feed-type="default" tgb-inverted="true" tgb-post-count="50" tgb-mobile-count="5" tgb-toolbar="none" tgb-animation-type="fade" tgb-hashtag-color="b28247" tgb-font-color="c1c1c1" fixed-height="true"></div>
            <script src="https://static.tagboard.com/public/js/embedAdvanced.js"></script>
           <div style="min-height:460px;">
               
           </div>
            
            
        </div>     
@endsection