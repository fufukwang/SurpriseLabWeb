<!DOCTYPE html>
<head>
    <title>
        Table For One
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="/T41/style/css/bootstrap.min.css">
    @include('TFO.front._head')
</head>
<body>
    <div class="wrapper" id="red-theme" key="1">    
        @include('TFO.front._logo')
        
        <div class="main-box">
            @include('TFO.front._nav')
            <div class="content-box align-left">
                



                <div id="step1">
                    <ul class="step-box mg-b-lg">
                        <li class="active">1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                    </ul>
                    <div class="table-box">
                        <h4>
                            線上訂位 pre-book & 線上預付 pre-pay <br>
                            A: 880 元 | 五道料理 <br>
                            B: 1050 元 | 五道料理 + 佐餐飲乙杯
                        </h4>
                        <p class="mg-b-lg">
                            *B套餐之佐餐飲，可任選酒水單上飲品乙杯<br> 
                            *以上價格均已含服務費<br> 
                            *每人用餐時間為90分鐘<br> 
                            *選擇日期、填寫資料、線上預付，即完成訂位服務
                        </p>
                        <h4>
                            <input type="checkbox" id="agrenRule"> 我已詳讀並遵守一<a href="rules.html" target="_blank"><span class="lightbox-trigger">人餐桌訂位與用餐規則</a></span>。
                            <span class="alerter"><i class="fa fa-exclamation-triangle "></i> 請確認您已閱讀訂位與用餐規則</span>
                        </h4>
                        <a href="javascript:;" id="goStep2">
                            <div class="standard-btn btn mg-auto">
                                立即訂位
                            </div>
                        </a>
                    </div>
                </div>



                <div id="step2">
                    <ul class="step-box mg-b-lg">
                        <li>1</li>
                        <li class="active">2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                    </ul>
                    <table class="reservation-table">
                        <tr>
                            <td>
                                人數
                            </td>
                            <td>
                                ONE
                            </td>
                        </tr>
                        <tr>
                            <td>日期</td>
                            <td>
                                <div class="form-group">
                                    <div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                        <input class="form-control" id="day" size="14" type="text" value="">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                    <input type="hidden" id="dtp_input2" value="" /><br/>
                                </div>
                                <span class="alerter"><i class="fa fa-exclamation-triangle "></i> 請選擇日期</span>
                            </td>
                        </tr>
                        <tr>
                            <td>時段</td>
                            <td>
                                <select name="datepart" id="datepart">
                                    <option value="">請先選擇日期</option>
                                </select>
                                <span class="alerter"><i class="fa fa-exclamation-triangle "></i> 請選擇時段</span>
                            </td>
                        </tr>
                        <tr>
                            <td>時間</td>
                            <td>
                                <select name="id" id="id">
                                    <option value="">請先選擇時段</option>
                                </select>
                                <span class="alerter"><i class="fa fa-exclamation-triangle "></i> 請選擇時間</span>
                            </td>
                        </tr>
                        
                    </table>
                    <div class="btn-box">
                        <a href="javascript:;" id="backStep1">
                            <div class="standard-btn btn">
                                上一步
                            </div>    
                        </a>
                        <a href="javascript:;" id="goStep3">
                            <div class="standard-btn theme-btn btn">
                                下一步
                            </div>    
                        </a>
                    </div>
                </div>




                <!-- step 3-->
                <div id="step3">
                    <ul class="step-box mg-b-lg">
                        <li>1</li>
                        <li>2</li>
                        <li class="active">3</li>
                        <li>4</li>
                        <li>5</li>
                    </ul>
                    <form action="/TableForOne/generateOrder" method="post" id="reservationForm">
                    {!! csrf_field() !!}
                    <input type="hidden" name="pro_id" id="pro_id">
                    <input type="hidden" name="item" id="item">
                    <table class="reservation-table">
                        <tr>
                            <td>
                                ＊姓名
                            </td>
                            <td>
                                <input type="text" name="name">
                                <span class="alerter"><i class="fa fa-exclamation-triangle "></i> 請填入姓名</span>
                            </td>
                        </tr>
                        <tr>
                            <td>＊電話</td>
                            <td class="">
                                <input type="text" name="tel">
                                <span class="alerter"><i class="fa fa-exclamation-triangle "></i> 請填入電話</span>
                            </td>
                        </tr>
                        <tr>
                            <td>＊E-mail</td>
                            <td class="">
                                <input type="text" name="email">
                                <span class="alerter"><i class="fa fa-exclamation-triangle "></i> 請填入E-mail</span>
                            </td>
                        </tr>
                        <tr>
                            <td>＊用餐選擇</td>
                            <td class="">
                                <input type="radio" value="H" name="meal"> <span class="radio-span">葷</span>
                                <input type="radio" value="V" name="meal"> <span class="radio-span">素</span>
                                <span class="alerter"><i class="fa fa-exclamation-triangle "></i> 請選擇餐點</span>
                            </td>
                        </tr>
                        <tr>
                            <td>＊套餐選擇</td>
                            <td> 
                                <input type="radio" value="money" name="SelSet"> <span class="radio-span" id="money_item"><span id="money"></span>元 五道料理</span><br>
                                <input type="radio" value="wine" name="SelSet"> <span class="radio-span" id="wine_item"><span id="wine"></span>元 五道料理與佐餐酒乙杯</span>
                                <span class="alerter"><i class="fa fa-exclamation-triangle "></i> 請選擇套餐</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">備註</td>
                            <td> 
                                <textarea name="notes" cols="30" rows="10" placeholder="過敏、特殊飲食限制。 
ex: 因宗教因素不吃牛、豬。
                                
                                "></textarea>
                            </td>
                        </tr>
                    </table>
                    <h4 class="align-left privacy-check">
                        <input type="checkbox" id="aggPrive"> 我已閱讀並遵守<a href="#" id="light-trigger"><span class="lightbox-trigger">隱私條款</span></a></span>。
                    <span class="alerter"><i class="fa fa-exclamation-triangle "></i> 請確認您已閱讀訂位與用餐規則</span>
                    </h4>
                    
                    <div class="btn-box">
                        <a href="javascript:;" id="backStep2">
                            <div class="standard-btn btn">
                                上一步
                            </div>    
                        </a>
                        <a href="javascript:;" id="goStep4">
                            <div class="standard-btn theme-btn btn">
                                下一步
                            </div>    
                        </a>
                    </div>
                </div>



                <!-- step 4 -->
                <div id="step4">
                    <ul class="step-box mg-b-lg">
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li class="active">4</li>
                        <li>5</li>
                    </ul>
                    <table class="reservation-table">
                        <tr>
                            <td>
                                姓名
                            </td>
                            <td>
                                ｜<span id="nameText"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>電話</td>
                            <td class="">
                                ｜<span id="telText"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td class="error">
                                ｜<span id="emailText"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>用餐選擇</td>
                            <td class="">
                                ｜<span id="mealText"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>套餐選擇</td>
                            <td> 
                                ｜<span id="itemText"></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">備註</td>
                            <td> 
                                ｜<span id="notesText"></span>
                            </td>
                        </tr>
                    </table>
                    
                    <div class="btn-box">
                        <a href="javascript:;" id="backStep3">
                            <div class="standard-btn btn">
                                上一步
                            </div>    
                        </a>
                        <a href="javascript:;" id="goPay">
                            <div class="standard-btn theme-btn btn">
                                付款
                            </div>    
                        </a>
                    </div>
                </div>




                <span class="copyright align-center">
                    copyright © 2017 驚喜製造
                </span>
            </div>
        </div>
        
        <!-- -->
        
        <div class="menu-box"></div>
        <div class="main-content"></div>
        
    </div>
    <!--lightbox-->
    <div class="lightbox">
        <div class="lightbox-container">
            <div class="lightbox-header">
                驚喜製造有限公司隱私條款
            </div>
            <div class="lightbox-content">
                <p>
                    「驚喜電子報」由驚喜製造有限公司提供。「驚喜電子報」非常重視讀者的隱私權，因此制訂了隱私權保護政策，訂閱者可參考下列隱私權保護政策的內容。當您按下「我已閱讀並同意隱私條款」按鈕時，既表示您閱讀並同意以下條款，並願意以電子文件之方式行使法律所賦予同意之權利，並具有書面同意之效果。
                </p>
                <h1>
                    壹、個人資料之安全
                </h1>

                <p>
                    保護消費者的個人隱私是「驚喜電子報」重要的經營理念，在未經讀者同意之下，「驚喜電子報」絕不會將消費者的個人資料提供予任何與本網站服務無關之第三人。請妥善保密讀者本人的網路密碼及個人資料，不要將任何個人資料，尤其是網路密碼提供給任何人。在讀者使用完本網站所提供的各項服務功能後，務必記得登出帳戶，若讀者是與他人共享電腦或使用公共電腦，切記要關閉瀏覽器視窗。
                </p>

                <h1>
                    貳、個人資料的利用
                </h1>
                <p> 
                    一 、「驚喜電子報」所取得的個人資料，僅用在「驚喜電子報」及其委任處理營業相關事務之第三人間，為進行聯合銷售交互運用予揭露外，不會再向任何其他第三人揭露、出售或轉讓。
                </p>
                <p>
                    二、利用之目的例示如下：
                    <br><br>
                    (1) 不定時提供宣傳廣告或行銷等各種電子雜誌等資訊，透過電子郵件來提供與服務有關之資訊。<br><br>
                    (2) 回覆讀者之詢問：針對會員透過電子郵件向「驚喜電子報」所提出之詢問進行回覆。<br><br>
                    (3) 其他業務附隨之事項：附隨於上述 (1)(2)之利用目的而為「驚喜電子報」 提供服務所必要之使用。<br><br>
                    (4) 其他：
                    提供個別服務時，亦可能於上述規定之目的以外，利用個人資料。此時將在該個別服務之網頁載明其要旨。

                </p>
                <h1>
                    三、資料安全
                </h1>
                <p>
                    為保障讀者的隱私及安全，讀者的「驚喜電子報」將盡力以合理之技術及程序，保障所有個人資料之安全。
                </p>
                <h2>
                    【 資訊安全聲明 】
                </h2>


                <h1>壹、個人資料查詢或更正的方式</h1>

                <p>
                    一、訂閱者對於其個人資料，有查詢及閱覽、補充或更正、停止電腦處理及利用、刪除等需求時，可以與「驚喜電子報」連絡，「驚喜電子報」將迅速進行處理。
                </p>

                <p>
                    二、 Cookie <br>
                    為了便利訂閱者使用，「驚喜電子報」會使用cookie技術，以便於提供訂閱者所需要的服務；cookie是網站伺服器用來和訂閱者瀏覽器進行溝通的一種技術，它可能在訂閱者的電腦中隨機儲存字串，用以辨識區別使用者。
                </p>
                <h1>貳、隱私權保護政策修訂</h1>    
                <p>
                    隨著市場環境的改變本公司 有權不定時修訂網站政策。訂閱者應隨時注意更新之訊息，假若訂閱者對「驚喜電子報」隱私權聲明、或與個人資料有關之相關事項有任何疑問，可以利用電子郵件與「驚喜電子報」聯絡。
                </p>    
            </div>

            <div class="lightbox-cancel-container">
                <div class="btn privacy-link lightbox-cancel">
                    我瞭解了！
                </div>
            </div>
        </div>
    </div>
</body>
<style type="text/css">
.bootstrap-datetimepicker-widget table td.disabled,.bootstrap-datetimepicker-widget table td.disabled:hover{color:#CCCCCC;}
.bootstrap-datetimepicker-widget table td {color:block;font-weight: bold;}
</style>
<script src="/T41/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
<script type="text/javascript">
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
            $.post('/TableForOne/getRoomData',{act:'getDayByDefault'},function(data){
                var elbdate = [];
                for(i=0;i<data.length;i++) elbdate.push(data[i].day);
                $('.form_date').datetimepicker({
                    locale:'zh-TW',
                    format:'YYYY-MM-DD',
                    showTodayButton:true,
                    enabledDates:elbdate
                }).on('dp.change',function(e){
                    var $day = e.date.format('YYYY-MM-DD');
                    $.post('/TableForOne/getRoomData',{act:'getDatepartByDay',day:$day},function(data){
                        var html = '<option value="">請選擇時段</option>';
                        for(i=0;i<data.length;i++) html += '<option value="'+data[i].dayparts+'">'+data[i].dayparts+'</option>';
                        $('#datepart').html(html);
                        $('#datepart').data('day',$day);
                    },'json');
                    $('#id').html('<option value="">請先選擇時段</option>');
                });
                $('#step2').show();
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
        $.post('/TableForOne/getRoomData',{act:'getIDByDatepart',day:$day,dayparts:$val},function(data){
            var html = '<option value="">請選擇時段</option>';
            for(i=0;i<data.length;i++) html += '<option value="'+data[i].id+'" data-money="'+data[i].money+'" data-wine="'+data[i].wine+'">'+data[i].rangstart.substring(0,5)+' ~ '+data[i].rangend.substring(0,5)+'</option>';
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
        }
    });
    /* step 4 */
    $('#backStep3').bind('click',function(){ $('#step4').hide();$('#step3').show(); });
    $('#goPay').bind('click',function(){
        $('#pro_id').val($('#id').val());
        $.blockUI();
        $('#reservationForm').submit();
    });
    // 剛開啟關閉
    $('#step2,#step3,#step4').hide();
    
});
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
</script>
</html>