$(function(){
    $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#goStep2').bind('click',function(){
        $('#step1').hide();
        $('.gift-card-main img').removeClass('active');
        $('#step2').show();
        fbq('track', 'ViewContent');
    });
    /* step 2 */
    $('#backStep1').bind('click',function(){
        $('#step2').hide();
        $('#step1').show(); 
        var $Img = $('.gift-card-main img'),
            _ImgLength = $Img.length;
        countdownToShow($Img,_ImgLength);
    });
    $('#goStep3').bind('click',function(){
        if($('#agrenRule').prop('checked')){
            $('#agrenRule').parent().removeClass('error');
            $('#step2').hide();
            $('#step3').show(); 
            fbq('track', 'AddToCart');
        } else {
            $('#agrenRule').parent().addClass('error');
        }
    });

    /* step 3 */
    $('#backStep2').bind('click',function(){ $('#step3').hide();$('#step2').show(); });
    $('#goStep4').bind('click',function(){
        var goNext = true;
        if($('input[name="btel"]').val() == ''){
            $('input[name="btel"]').parent().addClass('error');
            goNext = false;
        } else{
            $('input[name="btel"]').parent().removeClass('error');            
        }
        if($('input[name="bname"]').val() == ''){
            $('input[name="bname"]').parent().addClass('error');
            goNext = false;
        } else{
            $('input[name="bname"]').parent().removeClass('error');            
        }
        if(!validateEmail($('input[name="bemail"]').val())){
            $('input[name="bemail"]').parent().addClass('error');
            goNext = false;
        } else{
            $('input[name="bemail"]').parent().removeClass('error');            
        }

        if($('input[name="rtel"]').val() == ''){
            $('input[name="rtel"]').parent().addClass('error');
            goNext = false;
        } else{
            $('input[name="rtel"]').parent().removeClass('error');            
        }
        if($('input[name="rname"]').val() == ''){
            $('input[name="rname"]').parent().addClass('error');
            goNext = false;
        } else{
            $('input[name="rname"]').parent().removeClass('error');            
        }
        if(!validateEmail($('input[name="remail"]').val())){
            $('input[name="remail"]').parent().addClass('error');
            goNext = false;
        } else{
            $('input[name="remail"]').parent().removeClass('error');            
        }

        // 寄送方式
        if($('input[name="sendtype"]:checked').length==0){
            $('.sendtypeth').addClass('error');
            goNext = false;
        } else {
            if($('input[name="sendtype"]:checked').val()=='國內郵寄' && $('input[name="inaddress"]').val() == ''){
                $('input[name="inaddress"]').parent().addClass('error');
                goNext = false;
            } else {
                $('input[name="inaddress"]').parent().removeClass('error');
            }
            if($('input[name="sendtype"]:checked').val()=='國外郵寄' && $('input[name="outaddress"]').val() == ''){
                $('input[name="outaddress"]').parent().addClass('error');
                goNext = false;
            } else {
                $('input[name="outaddress"]').parent().removeClass('error');
            }
            $('.sendtypeth').removeClass('error');
        }

        if($('#agreePrev').prop('checked')){
            $('#agreePrev').parent().removeClass('error');
        } else {
            $('#agreePrev').parent().addClass('error');
            goNext = false;
        }


        if(goNext){
            $('#btelSpan').text($('input[name="btel"]').val());
            $('#bnameSpan').text($('input[name="bname"]').val());
            $('#bemailSpan').text($('input[name="bemail"]').val());
            $('#rtelSpan').text($('input[name="rtel"]').val());
            $('#rnameSpan').text($('input[name="rname"]').val());
            $('#remailSpan').text($('input[name="remail"]').val());
            var sendtypeVal = $('input[name="sendtype"]:checked').val();
            if(sendtypeVal == '國內郵寄' || sendtypeVal == '國外郵寄' || sendtypeVal == '到店自取'){
                $('#prevCard').show();
            } else {
                $('#prevCard').hide();
            }
            if(sendtypeVal == '國內郵寄'){
                sendtypeVal += ' '+$('input[name="inaddress"]').val();
            } else if(sendtypeVal == '國外郵寄'){
                sendtypeVal += ' '+$('input[name="outaddress"]').val();
            }
            $('#sendtypeSpan').text(sendtypeVal);
            $('#InvitationTextSpan').text($('textarea[name="InvitationText"]').val());

            $('#step3').hide();
            $('#step4').show();
            fbq('track', 'AddPaymentInfo');
        }
    });
    /* step 4 */
    $('#backStep3').bind('click',function(){ $('#step4').hide();$('#step3').show(); });
    $('#goPay').bind('click',function(){
        $.blockUI();
        fbq('track', 'InitiateCheckout');
        $('#giftcardForm').submit();
    });

    // 初始化
    $('#step2,#step3,#step4').hide();
    var $Img = $('.gift-card-main img'),
        _ImgLength = $Img.length;
    countdownToShow($Img,_ImgLength);
});
function countdownToShow($Img,_ImgLength){
    var Len =  $Img.length;
    setTimeout(function(){
        $Img.eq(Len-_ImgLength).addClass('active');
        _ImgLength--;
        if(_ImgLength>0) countdownToShow($Img,_ImgLength);
    },550);
}
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}