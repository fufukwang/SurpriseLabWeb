$.getScript("imagesLoaded");
// landing bg fn
$(document).on('mousemove', function(e){
    
    // 抓滑鼠與螢幕中心位置
    var x = e.pageX,
        y = e.pageY,
        centerX = $(window).width(),
        centerY = $(window).height(),
        marginX = (x - centerX) / 70,
        marginY = (y - centerY) / 70,
        shadowX = marginX * 2.5 + 7,
        shadowY = -marginY * 2.5;
    
//    console.log(x,y);
    
    // 光的位置
    $('.light-lg').css({
        left:  x,
        top:   y
    });
        
    
    // 背景的位置
    $('.folks').css('margin-top',marginY);
    $('.folks').css('margin-left',marginX);
    
    // 字的shadow
    $('.shadow').css('top',shadowY);
    $('.shadow').css('right',shadowX);
    
});


// landing click fn
$(document).ready(function(){
    $('.landing-btn').click(function(){
        $('.section-01').fadeOut(500);
        setTimeout(ShowBg,850);
    })
})

// menu dropdown fn
$(document).ready(function(){
    $('.dropdown').click(function(){
        $(this).toggleClass('show-ul');
    })
    
    $('.mobile-menu-btn').click(function(){
        $('.mobile-menu').fadeToggle(700);
        return false
    })
})


// about scroll fn
$(document).ready(function(){
    $(window).scroll(function(){
        var nowScroll = $(window).scrollTop(),
            nowValue = nowScroll/3.5;
        
        $('.bgs').css('margin-top',nowValue);
    })
})


startValue = 0;


// landing fn
//function ShowBg(){
//    var i = startValue,
//        _w = $(window).width(),
//        showItem = ".show-"+i;
//    
//    if(_w < 776 ){
//        i=5;
//    }
//    
//    $(showItem).addClass('showup');
//    startValue++;
//    if (i>4){
//        $('.wrap').addClass('active');
//        $('.main-slogan i').addClass('show')
//        return false;  
//    } 
//    
//    setTimeout(ShowBg,1);   
//}
//ShowBg();

// rules function 
$(document).ready(function(){
    $('.rules-nav li').click(function(){
        var  cutNumber = $(this).attr('rules'),
             wheretoGo = $('.main-container').eq(cutNumber),
             $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
        
        $body.animate({
            scrollTop: $(wheretoGo).offset().top
        }, 700);
    });
    $('.mask-box .fa-angle-down').click(function(){
        var wheretoGo = $('.new-about'),
            $body = $('.mask-box');

        $body.animate({
            scrollTop: $(wheretoGo).offset().top - 80
        }, 700);
    });

})


// privacy light box )
$(document).ready(function(){

    $('.privacy-link').click(function(){

        $('.lightbox').fadeToggle(700);
        
        return false;
    });
});


$(document).imagesLoaded(function(){
    $('html,body').addClass('loaded');
});


 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-75329055-2', 'auto');
  ga('send', 'pageview');