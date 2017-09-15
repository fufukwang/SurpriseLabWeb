$(function(){
    $('#contentBtn').bind('click',function(){
        var isSend = true;
        if($('input[name="name"]').val() == ''){
            $('input[name="name"]').parent().addClass('error');
            isSend = false;
        } else{
            $('input[name="name"]').parent().removeClass('error');            
        }

        if(!validateEmail($('input[name="email"]').val())){
            $('input[name="email"]').parent().addClass('error');
            isSend = false;
        } else{
            $('input[name="email"]').parent().removeClass('error');            
        }

        if($('textarea[name="notes"]').val() == ''){
            $('textarea[name="notes"]').parent().addClass('error');
            isSend = false;
        } else{
            $('textarea[name="notes"]').parent().removeClass('error');            
        }

        if(isSend){
            $('#contentForm').submit();
        }
    });
});
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}