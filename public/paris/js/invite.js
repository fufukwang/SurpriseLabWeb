// 手機國碼
var data = PHONE_CODE.map(function(item){
    return {
        id: item.phoneCode,
        text: item.phoneCode + ' ' + item.countryNameTw
    }
});
var $select = $('#invite select#area_code');
$select.select2({
    data: data,
    placeholder: $select.data('placeholder'),
    minimumResultsForSearch: Infinity,
    dropdownParent: $select.closest('.input-group').find('.select-wrapper')
});
$select.val('+886').trigger('change');

$('#invite input[type=checkbox].required').on('change', function() {
    var disabled = false;
    // 必勾全勾按鈕才亮
    $('#invite input[type=checkbox].required').each(function(){
        if(!$(this).is(":checked")) {
            disabled = true;
        }
    });
    $('#invite .actions button').prop('disabled', disabled);
});

function onFormSubmit() {
    var allowNext = true;
    $('#invite .error').remove();

    // 檢查必填
    $('#invite input[type=text].required').each(function () {
        if($(this).val() === '') {
            var $inputGroup = $(this).closest('.input-group');
            if($inputGroup.find('.error').length === 0) {
                $inputGroup.append('<div class="error">此欄位為必填</div>');
            } else {
                $inputGroup.find('.error').text('此欄位為必填');
            }
            allowNext = false;
        }
    });

    // 檢查手機格式
    var phone = $('#invite input#phone').val();
    if( phone !== '' && !/^09\d{8}$/.test(phone) ) {
        var $inputGroup = $('#invite input#phone').closest('.input-group');
        if($inputGroup.find('.error').length === 0) {
            $inputGroup.append('<div class="error">手機格式錯誤</div>');
        } else {
            $inputGroup.find('.error').text('手機格式錯誤');
        }
        allowNext = false;
    }

    // 檢查Email格式
    var email = $('#invite input#email').val();
    if( email !== '' && !/(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/.test(email) ) {
        var $inputGroup = $('#invite input#email').closest('.input-group');
        if($inputGroup.find('.error').length === 0) {
            $inputGroup.append('<div class="error">Email格式錯誤</div>');
        } else {
            $inputGroup.find('.error').text('Email格式錯誤');
        }
        allowNext = false;
    }

    if(allowNext) {
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