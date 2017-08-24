
window.onload = function() {
    // short timeout
    setTimeout(function() {
        $(document.body).scrollTop(0);
    }, 15);
};

var i = 0,
    x = 0,
    lastScrollTop = 0,
    myState = 0;

//scroll up or down
//$(window).scroll(function(event){
//    var st = $(this).scrollTop();
//    if (st > lastScrollTop){
//        // downscroll code
//    } else {
//        // upscroll code
//    }
//    lastScrollTop = st;
//});

// 星球、點旋轉function

//dotR = 72,
//    planetR = 1800;

//function dotRotate(){

//    var planetV= 'rotate('+planetR+'deg)',
//        dotV = 'rotate('+dotR+'deg)';

//    $('.the-dot').css("transform",dotV);
//    $('.landing-planet').css("transform",planetV);
//    planetR+=1800;
//    dotR+=72;
//    setTimeout(dotRotate,60000);
//}

// main function

$(document).imagesLoaded(function(){

    
    var w = $(window).width(),
        h = $('.landing-container').innerHeight(),
        landingBoxH = $('.landing-box').height(),
        landingPadding = ( (h - landingBoxH) / 2 ) + "px",
        paddingH = (h * 0.25)+"px";
   
    
    $('.landing-box').css('padding-top',landingPadding);
    $('.cut-wrapper').css('padding-top',paddingH);
    
    
    $('.landing-box,.cut-wrapper,.cut-2-wrapper').css("height",(h+"px"));
    //讓dot與星球轉
  //  dotRotate();
    
    //scroll function lock
    
    $('.main-container').on('scroll touchmove mousewheel', function(e){
        if ( w > 776){
            e.preventDefault();
            e.stopPropagation();
            return false;
        }
    })
    
    $('.lock-landing-box').on('scroll touchmove mousewheel', function(e){
        e.preventDefault();
        e.stopPropagation();
        return false;
    })

    
    //lock spcae
    
    $(document).on({
        keydown: function(e) {
            if (e.which === 32)
                return false;
        },
        change: function() {
            this.value = this.value.replace(/\s/g, "");
        }
    });
  
    
    //控制桌機才跑landing動畫
    if (w>776){
        floatItems();
        setInterval(floatItems, 2000);
        setTimeout(floatBack,11000)
    }
    else{
        return false;
    }
})

//物件往上飄動態
function floatItems(){
    $('.float-items').eq(i).css({
        "transform": "rotate(360deg)",
        "transition": "transform 11s"
    });
    $('.float-items').eq(i).animate({
        top: "-30%"
    },11000);
    if(i<7){
        i++
    }
    else{ 
        i=0
    }
}

// reset 物件
function floatBack(){
    setInterval(floatReset,2000)
}
function floatReset(){
    $('.float-items').eq(x).stop().css({
        "transform": "rotate(0deg)",
        "transition": "none",
        "top": "105%"
    });
    if(x<7){
        x++
    }
    else{  
        x=0
    }
}

//跳轉頁面


$(document).ready(function(){
    $('.gogo-btn').bind('click',function(){
       
        var menuState = $(this).attr('menuState'),
            WindowWidth = $(window).width();
        
        
        var w = $(window).width(),
            h = $('.landing-container').innerHeight(),
            paddingH = (h * 0.115)+"px";
        
        if(menuState==1){
            myState = 1
        }
        
        if(menuState==2){
            myState = 2
        }
        
        if(menuState==3){
            myState = 3
        }
        
        if(menuState==4){
            myState = 4;
            $('#countdown').fadeIn(700);
            $('#subscribe').fadeOut(0);
        }
        
        if(menuState==5){
            myState = 4;
            $('#countdown').fadeOut(700);
            $('#subscribe').delay(710).fadeIn(700);
        }
        
        if(menuState==undefined){
            myState == myState;
            myState ++;
        }
        
        
        var wheretoGo =( "#cut"+ myState),
            $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
        
        $body.animate({
            scrollTop: $(wheretoGo).offset().top
        }, 700);
        // 如果是cut1則跑
        if(wheretoGo=="#cut1" && WindowWidth>776){
            
            $('.float-items , .go-next').stop().fadeOut(300);
            $('.top-nav').delay(300).fadeIn(700);
            $('.cut-content').delay(550).fadeIn(1350);
            setTimeout(boxbox,1350);
            $('.goSubscribe-container').delay(3050).fadeIn(700);
        };
        
        if(wheretoGo=="#cut1" && WindowWidth<776){
            $('.lock-landing-box').css("display","none");
            $('.float-items , .go-next').stop().fadeOut(300);
            $('.top-nav').delay(300).fadeIn(700);
            $('.cut-content,.mobile-box').delay(550).fadeIn(1350);
        }
        
        if(wheretoGo=="#cut2"){
            $(this).fadeOut(700);
            $('#cut2').css('padding-top',paddingH);
            $('.footer-box').css("bottom","0px")
        }
        
       $(window).scroll(function(){
           var wS = $(window).scrollTop(),
               w1 = $('#cut1').offset().top - 300,
               w2 = $('#cut2').offset().top - 300;
           
            if(wS > w2){
                $('#cut2').css('padding-top',paddingH);
                $('.footer-box').css("bottom","0px")
            }
           if(wS<w2){
               
               $('.footer-box').css("bottom","-100px")
           }

       })
        
    });
    
    $('.goSubscribe-btn').click(function(){
        var w = $(window).width();
        if(w>776){
            $('.cut-content').css('opacity','0');
            $(this).fadeOut(700);
           boxContent(); 
        }
    });

    // countdown scribe toggle

    $('.free-experience').click(function(){
        var w = $(window).width();
        if(w>776){

            $('.countdown').fadeOut(700);
            $('#subscribe').delay(710).fadeIn(700);
            $('.footer').delay(1410).fadeIn(700);

        }
    });

    $('.free-xs-experience').click(function(){
        $('.countdown').fadeOut(700);
        $('#subscribe-xs').delay(700).fadeIn(700);
        $('.cut-wrapper').css("overflow","visible");
    });

    // lightbox fn

    $('.lightbox-cancel,.checked').click(function(){
        if ($("input[name='privacy']").is(":checked")){
            $('html').css("overflow","visible");
            $('.lightbox').fadeToggle(700);
            $('body').toggleClass('unscroll');

            setTimeout(htmlCSS,690);
        }
        if ($("input[name='privacy-mobile']").is(":checked")){
            $('.lightbox').fadeToggle(700);

        }
    });


});

function htmlCSS(){
    $('html').css("overflow","hidden");
}
// doll function
function dollToggle(par){
    $('.stepFirst').eq(par).addClass('showDolls');
    par++; // 累加數值
    if(par>3) return false;   // 跳脫點
    setTimeout('dollToggle('+par+')',500);  // 遞迴
}     

// box-box function

function boxbox(){
    $('.box-box').addClass('box-box-position');
    
}

function boxContent(){
    var w = $(window).width();

    if ( w < 1300 && w > 776 ){
        $('.left-box').addClass("rotate-left");
        $('.right-box').addClass("rotate-right");
        $('.subscribe-box').css('opacity',1);
        $('.box-box-position').css('top','-30px');
        setTimeout(light,1000);
    }
    else{
        $('.left-box').addClass("rotate-left");
        $('.right-box').addClass("rotate-right");
        $('.subscribe-box').css('opacity',1);
        $('.box-box-position').css('top','0px');
        setTimeout(light,1000);
    }

}

function light(){
    $('.light').css('width',"1020px");
    setTimeout(pig,600);
}

function pig(){
    $('.subscribe-box').css('bottom','0px');
}


// scroll lock


