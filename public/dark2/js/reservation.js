var coupon = [];
var discount = '';
$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var showdate = [];
    $('.date_tr').hide();
    // 第一步
    $('#first-btn').bind('click',function(){
        console.log('');
        if($('#agree').prop('checked')){
            $('#agree-error').hide();
            ChangeSectionNav('second','first',1);
        } else {
            $('#agree-error').show();
        }
    });
    // 第二步
    $('#second-btn-back').bind('click',function(){
        ChangeSectionNav('first','second',0);
    });
    $('#second-btn').bind('click',function(){
        // 驗證選項
        var GoNext = 0;
        if($('#Pople').val()==0){
            $('#PopleAlert').show(); GoNext++;
        } else {
            $('#PopleAlert').hide();
        }
        if($('#pro_id').val()==0 || $('#pro_id option:selected').data('pople')<$('#Pople').val() || $('#pro_id').val()==null){
            $('#pro_idAlert').show(); GoNext++;
        } else {
            $('#pro_idAlert').hide();
        }
        if(GoNext==0){
            // creat table 
            var html = '<tr><td></td><th>葷食</th><th>素食</th></tr>';
            for(i=0;i<$('#Pople').val();i++){
                var Num = i+1;
                html += '<tr><td>顧客'+Num+'</td><th><input id="Pople_H'+Num+'" name="Pople['+Num+']" checked value="Hunsi" type="radio"><label for="Pople_H'+Num+'"><span></span></label></th><th><input id="Pople_V'+Num+'" name="Pople['+Num+']" type="radio" value="Vegetarian"><label for="Pople_V'+Num+'"><span></span></label></th></tr>';
            }
            $('#MealTable').html(html);
            ChangeSectionNav('third','second',2);
        }
    });

    // 第三步
    $('#third-btn-back').bind('click',function(){
        ChangeSectionNav('second','third',1);
    });
    $('#third-btn').bind('click',function(){
        // 驗證資料
        var GoNext = 0;
        if($('#Name').val()==''){ $('#NameAlert').show(); GoNext++; } else { $('#NameAlert').hide(); }
        if(validateTel($('#Tel').val())){ $('#TelAlert').show(); GoNext++; } else { $('#TelAlert').hide(); }
        if(!validateEmail($('#EMail').val())){ $('#EMailAlert').show(); GoNext++; } else { $('#EMailAlert').hide(); }
        if(!$('#privatecheck').prop('checked')){ $('#PrivateAlert').show(); GoNext++; } else { $('#PrivateAlert').hide(); }
        if(GoNext==0){
            $('#PopCheck').text($('#Pople').val());
            $('#ADayCheck').text($('#ADay').val());
            $('#STimeCheck').text($('#pro_id option:selected').text());
            $('#NameCheck').text($('#Name').val());
            $('#TelCheck').text($('#Tel').val());
            $('#EMailCheck').text($('#EMail').val());
            var text = '';
            for(i=0;i<$('input[value=Hunsi]').length;i++){
                text += text=='' ? '' : '/';
                var tmpval = i + 1;
                if($('#Pople_H'+tmpval).prop('checked')){
                    text += '葷食';
                } else {
                    text += '素食';
                }
            }
            $('#MealCheck').text(text);
            $('#NotesCheck').text($('#Notes').val());
            var money = $('#pro_id option:selected').data('money') * $('#Pople').val();
            var cash  = $('#pro_id option:selected').data('cash') * $('#Pople').val();
            $('#MoneyView').text(cash);
            $('#CardView').text(money);
            $('#MoneyView').data('money',cash).data('cut1',0).data('cut2',0);
            $('#CardView').data('money',money).data('cut1',0).data('cut2',0);
            coupon = [];
            discount = '';
            $('#discountList').text('');
            $('#couponList').html('');
            ChangeSectionNav('fourth','third',3);
        }
    });

    // 第四步
    $('#fourth-btn-back').bind('click',function(){
        ChangeSectionNav('third','fourth',2);
    });
    $('#fourth-btn-onsite').bind('click',function(){
        // 送出資料
        SendOrderData('onsite','');
    });
    $('#fourth-btn-online').bind('click',function(){
        // 轉到金流
        //SendOrderData('online');
        $('.lightbox2pay').fadeToggle(700);
    });
    $('#fourth-btn-zero').bind('click',function(){
        var money = $('#MoneyView').data('money') - $('#MoneyView').data('cut1') - $('#MoneyView').data('cut2');
        if( Math.max(money,0) === 0 ){
            SendOrderData('onsite','');
        } else {
            alert('僅能以劃位碼劃位!');
        }
    });


    //$('#first-section').val();
    $('#SurePay').bind('click',function(){
        TPDirect.card.getPrime(function(result) {
            if (result.status !== 0) {
                alert('卡片資料有誤!無法取得認證!');
                console.log('getPrime error');
                return false;
            }
            var prime = result.card.prime
            console.log('getPrime success');
            $('.lightbox2pay').fadeToggle(700);
            SendOrderData('online',prime);
        })
    });
    $('#CanalPay').bind('click',function(){
        $('.lightbox2pay').fadeToggle(700);
    });
    $('#CouponBtn').bind('click',function(){
        $.blockUI();
        var code = $('#code').val().toLowerCase();
        if($('#MoneyView').text()==0){
            alert('已不需要使用優惠券!');
            $.unblockUI();
            return false;
        }
        if(code!=''){
            var cut = 0;
            switch(code){
                case 'dininginthedarks1': cut = 200; discount = 'dininginthedarks1'; break;
                case 'tableforone41': cut = 200; discount = 'tableforone41'; break;
                case 'gqinthedark': cut = 100; discount = 'gqinthedark'; break;
                case 'juksyinthedark': cut = 100; discount = 'juksyinthedark'; break;
                case 'vogueinthedark': cut = 100; discount = 'vogueinthedark'; break;
                case 'sdinthedark': cut = 100; discount = 'sdinthedark'; break;
            }
            if($('#MoneyView').data('cut2') == 0 || cut>0) $('#MoneyView,#CardView').data('cut2',cut);
            changeMoneyView();
            if(discount != '' && cut > 0){
                $('#discountList').text('折扣碼:'+discount+'折扣 ' +cut+ ' 元');
            }
            if(cut==0){
                code = code.toUpperCase();
                $.get('/dininginthedark2/GetAjaxData',{'act':'CheckCoupon','code':code,'coupon':coupon},function(data){
                    if(data.success == 'Y'){
                        coupon.push(code);
                        var money = $('#pro_id option:selected').data('money') * (coupon.length * 2);
                        var cash  = $('#pro_id option:selected').data('cash') * (coupon.length * 2);
                        $('#MoneyView').data('cut1',cash);
                        $('#CardView').data('cut1',money);
                        changeMoneyView();
                        var num  = $('#couponList').find('br').length + 1;
                        var wine = '';
                        if(data.wine>0) wine = '(含調飲)';
                        $('#couponList').append('優惠序號'+ num +':'+code+'雙人套票'+wine+'<br>');
            
                    } else {
                        alert('優惠碼 '+code+' 無法使用!');
                    }
                },'json');
            }
            $('#code').val('');
        } else {
            alert('請輸入優惠碼!');
        }
        $.unblockUI();
    });












    $('#dayparts').bind('change',function(){
        var val = $(this).val();
        var day = $(this).data('day');
        $.get('/dininginthedark2/GetAjaxData',{'act':'getBydartpart','dayparts':val,'day':day,'pople':$('#Pople').val()},function(data){
            var nowdata = [];
            spday = [],oneday = [];
            $('#pro_id option').remove();
            $('#pro_id').append('<option value="">請選擇時段</option>');    
            for(i=0;i<data.length;i++){
                var disable = '';
                var fulltxt = '';
                /*
                if(parseInt(data[i].Pople)<parseInt($("#Pople").val())){
                    disable = 'disabled';
                    fulltxt = '(額滿)';
                }*/
                $('#pro_id').append('<option value="'+data[i].id+'" data-cash="'+data[i].cash+'" data-money="'+data[i].money+'" '+disable+'>'+data[i].rangstart.substr(0,5)+'-'+data[i].rangend.substr(0,5)+' '+fulltxt+'</option>');

            }

        },'json');
    });

    $('#pro_id').bind('change',function(){
        if($('#pro_id option:selected').data('pople')>$('#Pople').val()){
            $('#pro_idAlert').hide();
        }
    });


    TPDirect.setupSDK('12098', 'app_kglJZrJS8ltbzL22jO8jZ4LJAoJtx1Siqz8UcqRDJOmu3TnnfSUBLVhKRxWm', 'production');
    TPDirect.card.setup({
        fields: {
            number: {
                // css selector
                element: '#card-number',
                placeholder: '**** **** **** ****'
            },
            expirationDate: {
                // DOM object
                element: document.getElementById('card-expiration-date'),
                placeholder: 'MM / YY'
            },
            ccv: {
                element: '#card-ccv',
                placeholder: 'ccv'
            }
        },
        styles: {
            // Style all elements
            'input': {
                'color': 'gray'
            },
            // Styling ccv field
            'input.cvc': {
                // 'font-size': '16px'
            },
            // Styling expiration-date field
            'input.expiration-date': {
                // 'font-size': '16px'
            },
            // Styling card-number field
            'input.card-number': {
                // 'font-size': '16px'
            },
            // style focus state
            ':focus': {
                // 'color': 'black'
            },
            // style valid state
            '.valid': {
                'color': 'green'
            },
            // style invalid state
            '.invalid': {
                'color': 'red'
            },
            // Media queries
            // Note that these apply to the iframe, not the root window.
            '@media screen and (max-width: 400px)': {
                'input': {
                    'color': 'orange'
                }
            }
        }
    });

});
function SendOrderData(Pay,prime){
    $.blockUI();
    var Meal = [];
    for(i=0;i<$('input[value=Hunsi]').length;i++){
        var tmpval = i + 1;
        Meal[i] = $('#Pople_H'+tmpval).prop('checked') ? '葷' : '素';
    }
    var obj = {
        'name'  : $('#Name').val(),
        'tel'   : $('#Tel').val(),
        'email' : $('#EMail').val(),
        'notes' : $('#Notes').val(),
        'pro_id': $('#pro_id').val(),
        'Pople' : $('#Pople').val(),
        'prime' : prime,
        'Meal'  : Meal,
        'Pay'   : Pay,
        'coupon': coupon,
        'Lng'   : '',
        'discount':discount,
    };
    $.post('/dininginthedark2/ReOrderData',obj,function(data){
        if(data.success==true){
            ChangeSectionNav('done','fourth',4); 
        } else {
            alert('信用卡付款未成功，請重新操作一次。');
            window.location.reload(true);
            //$.unblockUI();
        }
        $.unblockUI();
    },'json').fail(function() {
        alert('服務繁忙中請稍後在試!');
        window.location.reload(true);
        $.unblockUI();
    }).always(function() {
        
    });
}



function changeMoneyView(){
    var money = $('#MoneyView').data('money') - $('#MoneyView').data('cut1') - $('#MoneyView').data('cut2');
    $('#MoneyView').text(Math.max(money,0));
    var money = $('#CardView').data('money') - $('#CardView').data('cut1') - $('#CardView').data('cut2');
    $('#CardView').text(Math.max(money,0));
    if($('#MoneyView').text() == 0){
        $('#fourth-btn-online').hide();
        $('#fourth-btn-onsite').html('<div class="btn btn-standard btn-pay" style="height:54px;line-height:39px">完成劃位</div>');
    }
}

function ChangeSectionNav(show,hide,nav){
    $('.reservation-nav ul li').removeClass('active');
    $('.reservation-nav ul li:eq('+nav+')').addClass('active');
    $('#'+hide+'-section').hide();
    $('#'+show+'-section').show();
}
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
function validateTel(tel){
    if(tel==''){ return true; } else if(tel.length<9){ return true; } else if(tel.length>12) { return true; } else { return false; }
}