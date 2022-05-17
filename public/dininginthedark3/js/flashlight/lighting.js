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
        
    // 光的位置
    $('.light-lg').css({
        left:  x,
        top:   y
    });
    
    // 字的shadow
    $('.shadow').css('top',shadowY);
    $('.shadow').css('right',shadowX);
    
});

$(document).imagesLoaded(function(){
    $('html,body').addClass('loaded');
});