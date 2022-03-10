@include('backstage.header',['title' => '微醺大飯店：1980s 特殊場設定'])
<!-- =======================
===== START PAGE ======
======================= -->

        <div class="wrapper">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h4 class="m-t-0 header-title"><b>微醺大飯店：1980s 特殊場設定</b></h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-8">

                                    <div class="p-20">
                                        <form data-parsley-validate novalidate class="form-horizontal">
                                            <div class="form-group hpro_id">
                                                <label class="control-label col-sm-4">六人沉醉票最大數量</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="t6_max_number" value="{{ $data['t6']['number'] or ''  }}">
                                                </div>
                                            </div>
                                            <div align="right">
                                                <button type="button" class="btn btn-info btn-custom waves-effect w-md waves-light m-b-5 t6_setting_button">修改六人沉醉票最大數量</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="p-20">
                                        <form data-parsley-validate novalidate class="form-horizontal">
                                            <div class="form-group hpro_id">
                                                <label class="control-label col-sm-4">單人自在票金額</label>
                                                <div class="col-sm-8">
                                                    <input type="currency" data-type="currency" class="form-control" id="t1_money" value="{{ $data['money'][0]['money'] or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group hpro_id">
                                                <label class="control-label col-sm-4">雙人共享票金額</label>
                                                <div class="col-sm-8">
                                                    <input type="currency" data-type="currency" class="form-control" id="t2_money" value="{{ $data['money'][1]['money'] or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group hpro_id">
                                                <label class="control-label col-sm-4">六人沉醉票金額</label>
                                                <div class="col-sm-8">
                                                    <input type="currency" data-type="currency" class="form-control" id="t6_money" value="{{ $data['money'][2]['money'] or ''  }}">
                                                </div>
                                            </div>
                                            
                                            <div align="right">
                                                <button type="button" class="btn btn-info btn-custom waves-effect w-md waves-light m-b-5 sp_money_button">修改票價金額</button>
                                            </div>
                                        </form>







                                    </div>



                                </div>



                            </div>
                        </div>
                    </div>
                </div>








                <!-- end row -->
                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                2016 © Minton.
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->

            </div> <!-- end container -->
        </div>
        <!-- End wrapper -->

@include('backstage.jquery')
<link href="/backstage/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="/backstage/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="/backstage/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">


        <script src="/backstage/plugins/switchery/switchery.min.js"></script>
        <script src="/backstage/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script type="text/javascript" src="/backstage/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="/backstage/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="/backstage/plugins/select2/select2.min.js" type="text/javascript"></script>
        <script src="/backstage/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="/backstage/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>

        <script src="/backstage/plugins/moment/moment.js"></script>
        <script src="/backstage/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <!--<script src="/backstage/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <script src="/backstage/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="/backstage/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
--><link rel="stylesheet" type="text/css" href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/build/css/bootstrap-datetimepicker.css">
    
      <script type="text/javascript" src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/v4.0.0/src/js/bootstrap-datetimepicker.js"></script>
        <script src="/backstage/js/jquery.core.js"></script>
        <script src="/backstage/js/jquery.app.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
 <!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script type="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-touchspin/3.1.2/jquery.bootstrap-touchspin.min.js"></script>
<!-- Notification js -->
        <script src="/backstage/plugins/notifyjs/dist/notify.min.js"></script>
        <script src="/backstage/plugins/notifications/notify-metro.js"></script>
        <script>
        $(function(){
// 六人沉醉票修改
$('.t6_setting_button').bind('click',function(){
    let t6_number = $('#t6_max_number').val();
    if(t6_number!='' && !isNaN(t6_number)){
        let myObj = {
            slug: 'tgt2_sp_t6',
            number: t6_number
        }
        $.post('/thegreattipsyS2/setting/store',myObj,function(data){
            if(Boolean.parse(data.success)){
                $.Notification.notify('success','bottom left','已更新', '六人沉醉票最大數量已更新');
            } else {
                $.Notification.notify('error','bottom left','錯誤', '儲存失敗請檢查資料是否有誤');
            }
        },'json');
    } else {
        $.Notification.notify('error','bottom left','錯誤', '六人沉醉票最大數量請輸入數字');
        return false;
    }
    
});
// 特別場次票券金額修改
$('.sp_money_button').bind('click',function(){
    let t1_money = $('#t1_money').val().replace('$','').replace(',','');
    let t2_money = $('#t2_money').val().replace('$','').replace(',','');
    let t6_money = $('#t6_money').val().replace('$','').replace(',','');
    if(t1_money!='' && !isNaN(t1_money) && t2_money!='' && !isNaN(t2_money) && t6_money!='' && !isNaN(t6_money)){
        let myObj = {
            slug: 'tgt2_sp_money',
            t1_money: t1_money,
            t2_money: t2_money,
            t6_money: t6_money,
        }
        $.post('/thegreattipsyS2/setting/store',myObj,function(data){
            if(Boolean.parse(data.success)){
                $.Notification.notify('success','bottom left','已更新', '票價金額已更新');
            } else {
                $.Notification.notify('error','bottom left','錯誤', '儲存失敗請檢查資料是否有誤');
            }
        },'json');
    } else {
        $.Notification.notify('error','bottom left','錯誤', '票價金額輸入有誤');
        return false;
    }





});
$('input[type="currency"]').blur();
        });
var currencyInput = document.querySelector('input[type="currency"]')
var currency = 'TWD' // https://www.currency-iso.org/dam/downloads/lists/list_one.xml

 // format inital value
onBlur({target:currencyInput})
/*
// bind event listeners
currencyInput.addEventListener('focus', onFocus)
currencyInput.addEventListener('blur', onBlur)
*/

$('input[type="currency"]').bind('focus',onFocus);
$('input[type="currency"]').bind('blur',onBlur);

function localStringToNumber( s ){
  return Number(String(s).replace(/[^0-9.-]+/g,""))
}

function onFocus(e){
  var value = e.target.value;
  e.target.value = value ? localStringToNumber(value) : ''
}

function onBlur(e){
  var value = e.target.value

  var options = {
      maximumFractionDigits : 0,
      currency              : currency,
      style                 : "currency",
      currencyDisplay       : "symbol"
  }
  
  e.target.value = value 
    ? localStringToNumber(value).toLocaleString(undefined, options)
    : ''
}




        </script>



    </body>
</html>