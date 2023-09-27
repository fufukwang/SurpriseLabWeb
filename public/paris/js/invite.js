// 手機國碼
var data = PHONE_CODE.map(function(item){
    return {
        id: item.phoneCode,
        text: item.phoneCode + ' ' + item.countryNameTw
    }
});
var $select = $('#invite select.code');
$select.select2({
    data: data,
    placeholder: $select.data('placeholder'),
    minimumResultsForSearch: Infinity,
    dropdownParent: $select.closest('.input-group').find('.select-wrapper')
});
$select.val('+886').trigger('change');

function disableGoNext() {
    var disabled = false;

    $('#invite input[type=text].required').each(function(){
        if($(this).val() == '') {
            disabled = true;
        }
    });

    $('#invite input[type=checkbox].required').each(function(){
        if(!$(this).is(":checked")) {
            disabled = true;
        }
    });

    return disabled;
}

$('#invite input[type=text].required').on('keyup', function() {
    $('#invite .actions button').prop('disabled', disableGoNext());
});

$('#invite input[type=checkbox].required').on('change', function() {
    $('#invite .actions button').prop('disabled', disableGoNext());
});

function onFormSubmit() {
    if(!disableGoNext()){
        $.post('/lebaldeparis/Team/SlaveStore',function(data){
            // 檢查資料
            var postData = true;
            // 檢查電話
            if($('#phone').val().length != 10){
                $('.phoneErr').show();
                postData = false;
            } else {
                $('.phoneErr').hide();
            }
            // 檢查信箱
            if(! /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test($('#email').val())){
                $('.emailErr').show();
                postData = false;
            } else {
                $('.emailErr').hide();
            }
            if(postData){
                $.blockUI();
                var obj = {
                    'id': $('#id').val(),
                    'sn': $('#sn').val(),
                    'name': $('#name').val(),
                    'tel': $('#phone').val(),
                    'email': $('#email').val(),
                };
                $.post('/lebaldeparis/Team/SlaveStore',obj,function(data){
                    if(data.success==true){
                        $('html,body').animate({scrollTop: 0}, 300);
                        $('#invite').hide();
                        $('#invite-success').fadeIn();
                    } else {
                        var message = '可使用通知數量已滿!';
                        if(typeof data.message != 'undefined') message = data.message;
                        alert(message);
                        window.location.reload(true);
                        console.log('失敗')
                    }
                    $.unblockUI();
                },'json').fail(function() {
                    alert('服務繁忙中請稍後在試!');
                    window.location.reload(true);
                    console.log('錯誤')
                    $.unblockUI();
                });
            }
        },'json');
    }
    return false;
}

$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

MicroModal.init({
    openTrigger: 'data-custom-open',
    closeTrigger: 'data-custom-close',
    disableFocus: true,
    disableScroll: true,
    awaitOpenAnimation: true,
    awaitCloseAnimation: true,
    debugMode: true
});