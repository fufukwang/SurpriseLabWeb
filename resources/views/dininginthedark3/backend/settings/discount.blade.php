@include('backstage.header',['title' => '無光晚餐S3 折扣設定'])
<!-- =======================
===== START PAGE ======
======================= -->

        <div class="wrapper">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">

                            <div class="row">
                                <div class="col-lg-6">
                                    <h4 class="m-t-0 header-title"><b>一般場直購折扣設定</b></h4>



                                    <div class="table-responsive" data-pattern="priority-columns">
                                    <div class="sticky-table-header fixed-solution" style="width: auto;">
                                    <table id="pay-table" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>流水號</th>
                                                <th>折扣碼(不分大小寫)</th>
                                                <th>折抵金額</th>
                                                <th>限制數量(0無限制)</th>
                                                <th>可使用折扣金額(0無限制)</th>
                                                <th>功能</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data['pay'] as $key => $row)
                                            <tr id="tr_{{ $key+1 }}">
                                                <td>{{ $key+1 }}</td>
                                                <td><input type="text" class="form-control" placeholder="折扣碼" maxlength="20" value="{{ $row['code'] or '' }}"></td>
                                                <td><input type="number" class="form-control" placeholder="折抵金額" min="1" max="1000" value="{{ $row['money'] or '' }}"></td>
                                                <td><input type="number" class="form-control" placeholder="限制數量(0無限制)" value="{{ $row['number'] or 0 }}"></td>
                                                <td><input type="number" class="form-control" placeholder="可使用折扣金額(0無限制)" value="{{ $row['satisfy'] or 0 }}"></td>
                                                <td><button class="btn btn-danger btn-xs remove-pay-discount" data-id="{{ $key+1 }}"><i class="fa fa-remove"></i></button></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5"><button type="button" class="btn btn-default btn-lg btn-block pay-add-new">新增一筆</button></th>
                                            </tr>
                                        </tfoot>
                                    </table>


                                    </div></div>
                                    <div align="right">
                                        <button type="button" class="btn btn-info btn-custom waves-effect w-md waves-light m-b-5 pay-discuount-store">送出一般場直購折扣設定</button>
                                    </div>
                                </div>





                                <div class="col-lg-6">
                                    <h4 class="m-t-0 header-title"><b>特殊場次直購折扣設定</b></h4>



                                    <div class="table-responsive" data-pattern="priority-columns">
                                    <div class="sticky-table-header fixed-solution" style="width: auto;">
                                    <table id="sp-table" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>流水號</th>
                                                <th>折扣碼(不分大小寫)</th>
                                                <th>折抵金額</th>
                                                <th>限制數量(0無限制)</th>
                                                <th>可使用折扣金額(0無限制)</th>
                                                <th>功能</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data['sp'] as $key => $row)
                                            <tr id="tr_{{ $key+1 }}">
                                                <td>{{ $key+1 }}</td>
                                                <td><input type="text" class="form-control" placeholder="折扣碼" maxlength="20" value="{{ $row['code'] or '' }}"></td>
                                                <td><input type="number" class="form-control" placeholder="折抵金額" min="1" max="1000" value="{{ $row['money'] or '' }}"></td>
                                                <td><input type="number" class="form-control" placeholder="限制數量(0無限制)" value="{{ $row['number'] or 0 }}"></td>
                                                <td><input type="number" class="form-control" placeholder="可使用折扣金額(0無限制)" value="{{ $row['satisfy'] or 0 }}"></td>
                                                <td><button class="btn btn-danger btn-xs remove-sp-discount" data-id="{{ $key+1 }}"><i class="fa fa-remove"></i></button></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5"><button type="button" class="btn btn-default btn-lg btn-block sp-add-new">新增一筆</button></th>
                                            </tr>
                                        </tfoot>
                                    </table>


                                    </div></div>
                                    <div align="right">
                                        <button type="button" class="btn btn-info btn-custom waves-effect w-md waves-light m-b-5 sp-discuount-store">送出特殊場次直購折扣設定</button>
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
let pay_num = {{ count($data['pay']) }};
let spe_num = {{ count($data['sp']) }};

        $(function(){
// 直購
// 新增一筆
$('.pay-add-new').bind('click',function(){
    pay_num++;
    $('#pay-table tbody').append('<tr id="tr_'+pay_num+'"><td>'+pay_num+'</td>'+
        '<td><input type="text" class="form-control" placeholder="折扣碼" maxlength="20"></td>'+
        '<td><input type="number" class="form-control" placeholder="折抵金額" min="1" max="1000"></td>'+
        '<td><input type="number" class="form-control" placeholder="限制數量(0無限制)"></td>'+
        '<td><input type="number" class="form-control" placeholder="可使用折扣金額(0無限制)"></td>'+
        '<td><button class="btn btn-danger btn-xs remove-pay-discount" data-id="'+pay_num+'"><i class="fa fa-remove"></i></button></td>'+
    '</tr>');
});
// 刪除一筆
$('#pay-table tbody').on('click','tr td .remove-pay-discount',function(){
    let id = $(this).data('id');
    $('#tr_'+id).remove();
});
// 送出儲存
$('.pay-discuount-store').bind('click',function(){
    let message = '';
    let obj = [];
    $('#pay-table tbody tr').each(function(){
        let id = $(this).find('td').eq(0).text();
        let input_code  = $(this).find('input').eq(0).val();
        let input_money = $(this).find('input').eq(1).val();
        let input_num   = $(this).find('input').eq(2).val();
        let input_max   = $(this).find('input').eq(3).val();
        // 驗證資料正確
        if(input_code == '' || checkCode(input_code)) message += '流水號 '+id+' 折扣碼有誤<br>';
        if(input_money == '' || isNaN(input_money)) message += '流水號 '+id+' 折抵金額有誤<br>';
        if(input_num == '' || isNaN(input_num)) message += '流水號 '+id+' 限制數量有誤<br>';
        if(input_max == '' || isNaN(input_max)) message += '流水號 '+id+' 金額數字有誤<br>';
        obj.push({code: input_code,money: input_money,number: input_num,satisfy: input_max});
    });




    if(message == ''){
        let myObj = {
            slug: 'dark3_pay_discount',
            obj: JSON.stringify(obj)
        }
        $.post('/dark3/setting/store',myObj,function(data){
            if(Boolean.parse(data.success)){
                $.Notification.notify('success','bottom left','已更新', '一般場直購折扣設定已更新');
            } else {
                $.Notification.notify('error','bottom left','錯誤', '儲存失敗請檢查資料是否有誤');
            }
        },'json');
    } else {
        $.Notification.notify('error','bottom left','一般場直購折扣設定錯誤', message);
    }

});












// 特殊場
// 新增一筆
$('.sp-add-new').bind('click',function(){
    spe_num++;
    $('#sp-table tbody').append('<tr id="tr_'+spe_num+'"><td>'+spe_num+'</td>'+
        '<td><input type="text" class="form-control" placeholder="折扣碼" maxlength="20"></td>'+
        '<td><input type="number" class="form-control" placeholder="折抵金額" min="1" max="1000"></td>'+
        '<td><input type="number" class="form-control" placeholder="限制數量(0無限制)"></td>'+
        '<td><input type="number" class="form-control" placeholder="可使用折扣金額(0無限制)"></td>'+
        '<td><button class="btn btn-danger btn-xs remove-sp-discount" data-id="'+spe_num+'"><i class="fa fa-remove"></i></button></td>'+
    '</tr>');
});
// 刪除一筆
$('#sp-table tbody').on('click','tr td .remove-sp-discount',function(){
    let id = $(this).data('id');
    $('#tr_'+id).remove();
});
// 送出儲存
$('.sp-discuount-store').bind('click',function(){
    let message = '';
    let obj = [];
    $('#sp-table tbody tr').each(function(){
        let id = $(this).find('td').eq(0).text();
        let input_code  = $(this).find('input').eq(0).val();
        let input_money = $(this).find('input').eq(1).val();
        let input_num   = $(this).find('input').eq(2).val();
        let input_max   = $(this).find('input').eq(3).val();
        // 驗證資料正確
        if(input_code == '' || checkCode(input_code)) message += '流水號 '+id+' 折扣碼有誤<br>';
        if(input_money == '' || isNaN(input_money)) message += '流水號 '+id+' 折抵金額有誤<br>';
        if(input_num == '' || isNaN(input_num)) message += '流水號 '+id+' 限制數量有誤<br>';
        if(input_max == '' || isNaN(input_max)) message += '流水號 '+id+' 金額數字有誤<br>';
        obj.push({code: input_code,money: input_money,number: input_num,satisfy: input_max});
    });




    if(message == ''){
        let myObj = {
            slug: 'dark3_sp_discount',
            obj: JSON.stringify(obj)
        }
        $.post('/dark3/setting/store',myObj,function(data){
            if(Boolean.parse(data.success)){
                $.Notification.notify('success','bottom left','已更新', '一般場直購折扣設定已更新');
            } else {
                $.Notification.notify('error','bottom left','錯誤', '儲存失敗請檢查資料是否有誤');
            }
        },'json');
    } else {
        $.Notification.notify('error','bottom left','一般場直購折扣設定錯誤', message);
    }

});





        });
function checkCode(text){
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    if (!regex.test(text)) return true;
    else return false;
}


        </script>



    </body>
</html>