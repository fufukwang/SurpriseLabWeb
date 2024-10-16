$(document).ready(function(){
    redirectme();
    var $body = $('body');
    if(location.pathname.indexOf('index.html')>0){
        var images = new Array()
        function preload() {
            for (i = 0; i < preload.arguments.length; i++) {
                images[i] = new Image()
                images[i].src = preload.arguments[i]
            }
        }
        preload(
            location.protocol+"//"+location.host+"/T41/images/landing-page/mobile1.png",
            location.protocol+"//"+location.host+"/T41/images/landing-page/mobile2.png",
            location.protocol+"//"+location.host+"/T41/images/landing-page/mobile3.png",
            location.protocol+"//"+location.host+"/T41/images/landing-page/mobile4.png",
            location.protocol+"//"+location.host+"/T41/images/landing-page/mobile5.png",
            location.protocol+"//"+location.host+"/T41/images/landing-page/mobile6.png"
        );
    }
    // 確認圖片讀完後
    $body.imagesLoaded(function(){
        // selector
        var $wrapper         = $('.wrapper'),
            $svg             = $wrapper.find('svg'),
            $indexBox        = $('.index-box'),
            $plateImgBox     = $('.index-box .plate-img-box'),
            $plateImg        = $plateImgBox.find('img'),
            $indexBtn        = $('#index-btn'),
            $indicatorDotBox = $('#indicator-dot'),
            $indicatorDot    = $indicatorDotBox.find('li'),
            $indicatorBtn    = $('.fa-angle-right,.fa-angle-left'),
            $SwitchPlateItem = $indexBox.add($svg),
            $navBg           = $('.nav-bg img'),
            $gifImg          = $('.gif-plate-img-box img'),
            $hamburgerBtn    = $('.hamburger-box'),
            $navBox          = $('.nav-box'),
            $contentBox      = $('.content-box'),
            $landingCut      = $('#landing-cut'),
            $lightboxTrigger = $('#light-trigger'),
            $lightboxCancel  = $('.lightbox-cancel'),
            $lightbox        = $('.lightbox');
        

        // value
        var _wrapperH       = $wrapper.outerHeight(),
            _wrapperW       = $wrapper.width(),
            _switching      = false,
            _autoPlay       = true;
        
        $hamburgerBtn.bind('click',function(){
            $(this).find('i').toggleClass('active');
            $navBox.fadeToggle(400);
        })
        

        $lightboxTrigger.bind('click',function(){
            $lightbox.fadeIn(500);
        })

        $lightboxCancel.bind('click',function(){
            $lightbox.fadeOut(500);
        })
        
        // Index function
        if($plateImg.length){
            // 確認現在是哪個theme
            var _nowVal  = parseInt($wrapper.attr('key')),
                _middleH = (_wrapperH - $plateImg.height())/2 - 15;
            //處理index物件位置
            $plateImg.css({
                "padding-top": (_middleH)
            });
            
            $indexBtn.css("margin-top",_wrapperH*0.78);
            
            //slider
            $indicatorBtn.bind('click',function(){
                var _thisValue = $(this).attr('val');
                WhitchPlate(_thisValue);
                _autoPlay = false;
            })
            
            $indicatorDot.bind('click',function(){
                var _thisValue = $(this).index()+1;
                SwitchPlate(_thisValue);
                _autoPlay = false;
            })
            
            setInterval(function(){
                if(!_autoPlay){
                    return;
                }
                WhitchPlate(1);
            },5000)
        }
        
        else{
            SwitchPlate(_nowVal);
        }
        
        // trigger welcome
        $indexBtn.bind('click',function(){
            $landingCut.fadeOut(500);
            $contentBox.fadeIn(500);

            _autoPlay = false;
        })
        
        
        // 計算是哪個盤子
        function WhitchPlate(val){
            var _nowVal  = parseInt($wrapper.attr('key')),
                _nextVal = _nowVal+parseInt(val);
            
            if(_nextVal == 0){
                _nextVal = 6;
            }
            
            if(_nextVal == 7){
                _nextVal = 1;
            }
            
            SwitchPlate(_nextVal);
        }
        // 換盤子啦
        function SwitchPlate(val){
            if(_switching == true){
                return;
            }
            _switching = true;
            $SwitchPlateItem.fadeOut(500,function(){
                $wrapper.removeAttr('id');
                $indicatorDot.removeAttr('class');
                $indicatorDot.eq(val-1).addClass('active');
                
                var _src = "/T41/images/landing-page/mobile"+val+".png",
                    _gifSrc = "/T41/images/landing-page/gif"+val+".gif",
                    _plateSrc = "/T41/images/welcome-page/half-palte"+val+".png";
                
                if(val == 1){ var _theme = "red-theme" }
                if(val == 2){ var _theme = "yellow-theme" }
                if(val == 3){ var _theme = "green-theme" }
                if(val == 4){ var _theme = "blue-theme" }
                if(val == 5){ var _theme = "orange-theme" }
                if(val == 6){ var _theme = "purple-theme" }

                $wrapper.attr({
                    'id':_theme,
                    'key':val
                });
                
                $plateImg.attr('src',_src);
                $navBg.attr('src',_plateSrc);
                $gifImg.attr('src',_gifSrc);
                
                $SwitchPlateItem.fadeIn(500);
                _switching = false;
            });
        }
    });  
      
});


function redirectme(){
    var width = $(window).width();
    if(width>768){
        if(location.pathname.indexOf('/m.en')>0){
            var href = location.pathname.replace('tableforone/m.en/','tableforone/en/');
        } else {
            var href = location.pathname.replace('tableforone/m/','tableforone/'); 
        }
        document.location.href = href;
    }
    if(/iPad/i.test(navigator.userAgent)) {   
        //getEvent();
    } 
}