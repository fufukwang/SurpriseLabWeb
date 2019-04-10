$(function(){
    $.get('https://surpriselab.backme.tw/api/projects/1011.json?token=15171aa66ababafd4464a1c194b66102',function(data){
        var item  = data.rewards;
        var sum   = 0;
        var pcent = 2200
        for(var i=0;item.length>i;i++){
            if(parseInt(item[i].quantity_limit) > 0){
                var quantity_limit = parseInt(item[i].quantity_limit);
                $('#limit_'+item[i].id).text(quantity_limit);
                var count = parseInt(item[i].pledged_count) + parseInt(item[i].wait_pledged_count);
                $('#count_'+item[i].id).text(quantity_limit - count);
                if((quantity_limit - count) == 0){
                    /*
                    $('#a_'+item[i].id).parent().block({
                        message: '<h2>Sold Out</h2>',
                        overlayCSS:{
                            backgroundColor: '#000', 
                            opacity:         0.1, 
                            cursor:          'not-allowed'
                        },
                        css:{
                            border:"none",
                            color:"red",
                            backgroundColor:"none",
                            width:"80%"
                        }
                    });
                    */
                    //$('#a_'+item[i].id+' img').css({"-webkit-filter":"grayscale(1)"});
                    $('#a_'+item[i].id+' img').attr("src",'/d2one/images/soldout-ticket.png');
                    $('#a_'+item[i].id).bind('click',function(){
                        alert('限量已完售!!');
                        return false;
                    });
                }
            }
            var item_count = parseInt(item[i].pledged_count);
            switch(item[i].id){
                case 6101: item_count *= 2; break;
                case 6102: item_count *= 2; break;
                case 6103: item_count *= 4; break;
                case 6104: item_count *= 2; break;
            }
            sum += item_count;
        }

        var percent = parseInt((sum / pcent) * 100);
        $('.percent').text( percent );
        if(percent>100) percent = 100;
        $('.bar').css("width",percent+"%");
        $('.tickets').text( sum );
        var now  = new Date();
        var day  = new Date(data.end_date);
        var days = Math.ceil( (day.getTime()-now.getTime())/(24*60*60*1000) );
        if(days<0) days = 0;
        $('.days').text(days);
        

    },'json');
});