
$(document).imagesLoaded(function(){


    var w = $(window).width(),
        h = $('.logo-container').innerHeight(),
        landingBoxH = $('.main-logo').height(),
        sloganH = $('.main-slogan').height(),
        landingPadding = ( (h - landingBoxH) / 2 ) + "px",
        sloganPadding = ( (h - sloganH) / 2 ) + "px",
        paddingH = (h * 0.25)+"px";


    $('.main-logo').css('padding-top',landingPadding);
    $('.main-slogan').css('padding-top',sloganPadding);


})