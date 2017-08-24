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

dotR = 72,
planetR = 1800;

function dotRotate(){
    
    var planetV= 'rotate('+planetR+'deg)',
        dotV = 'rotate('+dotR+'deg)';
    
    $('.the-dot').css("transform",dotV);
    $('.landing-planet').css("transform",planetV);
    planetR+=1800;
    dotR+=72;
    setTimeout(dotRotate,58000);
}

// main function

$(document).imagesLoaded(function(){

    
    var w = $(window).width(),
        h = $('.landing-container').innerHeight(),
        landingBoxH = $('.landing-box').height(),
        landingPadding = ( (h - landingBoxH) / 2 ) + "px",
        paddingH = (h * 0.225)+"px";
   
    
    $('.landing-box').css('padding-top',landingPadding);
    $('.cut-wrapper').css('padding-top',paddingH);
    
    
    $('.landing-box,.cut-wrapper,.cut-2-wrapper').css("height",(h+"px"));
    //讓dot與星球轉
    dotRotate();
    
})


