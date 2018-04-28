<!DOCTYPE html>
<head>
    @include('Dark2.frontend._header')
</head>
<body>
    <div class="wrap">
       
        <!-- mobile menu -->
        @include('Dark2.frontend._menu',['key'=>'contact'])
     
      
        <!-- header -->
        
        <div class="header-contaier clearfix">
            @include('Dark2.frontend._m_menu',['key'=>'contact'])
        </div>
       
        <!-- landing cut -->
        <!-- first cut -->
        
        <div class="section-02 reservation-section">
            <div class="main-container">
                <div class="main-box rules-box">
                    <div class="main-container"><form action="/{{ config('setting.dark2.ptah') }}/contactstore" method="post" id="contentForm">
                        {!! csrf_field() !!}
                        <h1>
                            Contact
                        </h1>
                        <p>
                            02-27192960 <br>
                            <a href="mailto:service@surpriselab.com.tw">
                                service@surpriselab.com.tw
                            </a>
                        </p>
                        <br>
                        <table>
                            <tr>
                                <td>＊姓名</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="name" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="alert-wrap" id="name_err">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                        請輸入您的姓名
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>電話</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="tel">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                            </tr>
                            <tr>
                                <td>＊EMAIL</td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="email" name="email" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="alert-wrap" id="email_err">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                        請輸入正確電子信箱
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>備註</td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea name="notes" cols="30" rows="10" placeholder="" required></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="alert-wrap" id="notes_err">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                        請填寫您想對我們說的話
                                    </span>
                                </td>
                            </tr>
                        </table>

                        <a href="javascript:;" id="contentBtn">
                            <div class="btn btn-standard">
                                送出
                            </div>
                        </a>
                    </form></div>
                </div>
            </div>
        </div>   
        @include('Dark2.frontend._footer')
    </div>
<script type="text/javascript">
$(function(){
    $('#contentBtn').bind('click',function(){
        var isSend = true;
        if($('input[name="name"]').val() == ''){
            $('#name_err').addClass('alert-show');
            isSend = false;
        } else{
            $('#name_err').removeClass('alert-show');
        }

        if(!validateEmail($('input[name="email"]').val())){
            $('#email_err').addClass('alert-show');
            isSend = false;
        } else{
            $('#email_err').removeClass('alert-show');
        }

        if($('textarea[name="notes"]').val() == ''){
            $('#notes_err').addClass('alert-show');
            isSend = false;
        } else{
            $('#notes_err').removeClass('alert-show');
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
</script>
</body>
</html>