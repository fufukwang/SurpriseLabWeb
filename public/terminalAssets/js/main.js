$(function(){
    
    /* Loading動畫 */
    document.body.classList.add('render');
    setTimeout(function(){
        // Image Loading
        imagesLoaded(document.body, function(){
            document.body.classList.remove('loading');
        })
    }, 1000);
});