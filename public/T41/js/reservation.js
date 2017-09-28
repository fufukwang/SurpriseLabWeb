$(function(){
    $(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#goStep2').bind('click',function(){
        if($('#agrenRule').prop('checked')){
            $('#agrenRule').parent().removeClass('error');
            $('#step1').hide();
            $.post('/tableforone/getRoomData',{act:'getDayByDefault'},function(data){
                var elbdate = [];
                for(i=0;i<data.length;i++) elbdate.push(data[i].day);
                $('.form_date').datetimepicker({
                    locale:'zh-TW',
                    format:'YYYY-MM-DD',
                    showTodayButton:true,
                    enabledDates:elbdate
                }).on('dp.change',function(e){
                    var $day = e.date.format('YYYY-MM-DD');
                    $.post('/tableforone/getRoomData',{act:'getDatepartByDay',day:$day},function(data){
                        var html = '<option value="">請選擇時段</option>';
                        for(i=0;i<data.length;i++) html += '<option value="'+data[i].dayparts+'">'+data[i].dayparts+'</option>';
                        $('#datepart').html(html);
                        $('#datepart').data('day',$day);
                    },'json');
                    $('#id').html('<option value="">請先選擇時段</option>');
                });
                $('#step2').show();
                fbq('track', 'AddToCart');
            },'json');
            
        } else{
            $('#agrenRule').parent().addClass('error');
        }
    });
    /* step 2 */
    $('#backStep1').bind('click',function(){ $('#step2').hide();$('#step1').show(); });
    $('#goStep3').bind('click',function(){
        if($('#day').val() == ''){ $('#day').parent().parent().parent().addClass('error'); } else{ $('#day').parent().parent().parent().removeClass('error'); }
        if($('#datepart').val() == ''){ $('#datepart').parent().addClass('error'); } else { $('#datepart').parent().removeClass('error'); }

        if($('#id').val() == ''){ $('#id').parent().addClass('error'); } else { $('#id').parent().removeClass('error'); $('#step2').hide(); $('#step3').show(); }

    });

    $('#datepart').bind('change',function(){
        var $day = $(this).data('day');
        var $val = $(this).val();
        $.post('/tableforone/getRoomData',{act:'getIDByDatepart',day:$day,dayparts:$val},function(data){
            var html = '<option value="">請選擇時段</option>';
            for(i=0;i<data.length;i++){
                var disable = '';
                var text    = '';
                if(data[i].site>0){
                    disable = '';
                    text    = '';
                } else {
                    disable = 'disabled';
                    text    = ' (額滿)';
                }
                html += '<option value="'+data[i].id+'" data-money="'+data[i].money+'" data-wine="'+data[i].wine+'" '+disable+'>'+data[i].rangstart.substring(0,5)+' ~ '+data[i].rangend.substring(0,5)+text+'</option>';
            }
            $('#id').html(html);
        },'json');
    });
    $('#id').bind('change',function(){
        var item = $('#id option:selected');
        $('#money').text(item.data('money'));
        $('#wine').text(parseInt(item.data('money')) +parseInt(item.data('wine')));
    });

    /* step 3 */
    $('#backStep2').bind('click',function(){ $('#step3').hide();$('#step2').show(); });
    $('#goStep4').bind('click',function(){
        var goNext = true;
        if($('input[name="name"]').val() == ''){
            $('input[name="name"]').parent().addClass('error');
            goNext = false;
        } else{
            $('input[name="name"]').parent().removeClass('error');            
        }
        if($('input[name="tel"]').val() == ''){
            $('input[name="tel"]').parent().addClass('error');
            goNext = false;
        } else{
            $('input[name="tel"]').parent().removeClass('error');            
        }

        if(!validateEmail($('input[name="email"]').val())){
            $('input[name="email"]').parent().addClass('error');
            goNext = false;
        } else{
            $('input[name="email"]').parent().removeClass('error');            
        }

        if($('input[name=meal]:checked').length>0){
            $('input[name="meal"]').parent().removeClass('error');            
        } else {
            $('input[name="meal"]').parent().addClass('error');
            goNext = false;
        }
        if($('input[name=SelSet]:checked').length>0){
            $('input[name="SelSet"]').parent().removeClass('error');
        } else {
            $('input[name="SelSet"]').parent().addClass('error');
            goNext = false;
        }
        if($('#aggPrive').prop('checked')){
            $('#aggPrive').parent().removeClass('error');
        } else {
            $('#aggPrive').parent().addClass('error');
            goNext = false;
        }


        if(goNext){
            $('#nameText').text($('input[name="name"]').val());
            $('#telText').text($('input[name="tel"]').val());
            $('#emailText').text($('input[name="email"]').val());

            $('#mealText').text($('input[name=meal]:checked').val()=='H' ? '葷食' : '素食');
            var item = $('#'+$('input[name=SelSet]:checked').val()+'_item').text();
            $('#itemText').text(item);
            $('#item').val(item);
            $('#notesText').text($('textarea[name="notes"]').val());
            $('#step3').hide();
            $('#step4').show();
            fbq('track', 'AddPaymentInfo');

        }
    });
    /* step 4 */
    $('#backStep3').bind('click',function(){ $('#step4').hide();$('#step3').show(); });
    $('#goPay').bind('click',function(){
        $('#pro_id').val($('#id').val());
        $.blockUI();
        fbq('track', 'InitiateCheckout');
        $('#reservationForm').submit();
    });
    // 剛開啟關閉
    $('#step2,#step3,#step4').hide();
    
});
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}