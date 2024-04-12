@include('backstage.header',['title' => '無光晚餐S3訂單列表'])
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
                                    <h4 class="m-t-0 header-title"><b>無光晚餐S3訂單列表</b></h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-8">

                                    <div class="p-20">
                                        <form  data-parsley-validate novalidate method="post" action="/dark3/order/{{ $order->id or 0}}/update" class="form-horizontal">
                                            <input type="hidden" name="qxx" value="{{ Request::getQueryString() }}">
{!! csrf_field() !!}
                                            <div class="form-group hpro_id">
                                                <label class="control-label col-sm-4">日期</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="{{ $order->day or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group hpro_id">
                                                <label class="control-label col-sm-4">時段</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="{{ $order->day_parts or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group hpro_id">
                                                <label class="control-label col-sm-4">區間</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="{{ substr($order->rang_start,0,5)  }} ~ {{ substr($order->rang_end,0,5)  }}">
                                                </div>
                                            </div>

                                            <div class="form-group spro_id" style="display: none;">
                                                <label class="control-label col-sm-4">日期</label>
                                                <div class="col-sm-8">
                                                    <select name="pro_id" class="form-control" disabled="true">
@foreach($pro as $row)<option value="{{ $row->id }}" data-sites="{{ $row->sites }}">{{ $row->day }} {{ substr($row->rang_start,0,5)  }} ~ {{ substr($row->rang_end,0,5)  }} (剩餘座位數 {{ $row->sites }})</option>@endforeach
                                                    </select>
                                                    <span style="color:red">*不會再次驗證座位是否足夠請警慎使用</span>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-sm-4">姓名</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="name" required value="{{ $order->name or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">電話</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="tel" required value="{{ $order->tel or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">EMail</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control" name="email" value="{{ $order->email or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">統編(發票使用)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" maxlength="10" class="form-control" name="tax_id" value="{{ $order->tax_id or ''  }}" placeholder="統編(發票使用)">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">公司名稱(發票使用)</label>
                                                <div class="col-sm-8">
                                                    <input type="text" maxlength="50" class="form-control" name="tax_name" value="{{ $order->tax_name or ''  }}" placeholder="公司名稱(發票使用)">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-4">訂單號碼</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="{{ $order->sn or '請留白系統會自動生成' }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">人數</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="people" value="{{ $order->pople or ''  }}" max="36" min="0" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">英文服務</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="need_english" value="{{ $order->need_english or ''  }}" max="36" min="0" required>
                                                </div>
                                            </div>
                                            {{--
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">素食</label>
                                                <div class="col-sm-8">
                                                    <select name="vegetarian" id="vegetarian" class="form-control">
                                                        @for($i=0;$i<=$order->pople;$i++)
                                                        <option value="{{ $i }}"@if(isset($order->vegetarian) && $order->vegetarian==$i) selected @endif>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            --}}
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">葷食</label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="meat_eat" id="meat_eat" class="form-control" value="{{ $order->meat_eat or '' }}">
                                                </div>
                                                <label class="control-label col-sm-4">素食</label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="vegetarian" id="vegetarian" class="form-control" value="{{ $order->vegetarian or '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">葷食/不吃牛肉</label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="no_beef" id="no_beef" class="form-control" value="{{ $order->no_beef or '' }}">
                                                </div>
                                                <label class="control-label col-sm-4">素食/不吃堅果</label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="no_nut_v" id="no_nut_v" class="form-control" value="{{ $order->no_nut_v or '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">葷食/不吃豬肉</label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="no_pork" id="no_pork" class="form-control" value="{{ $order->no_pork or '' }}">
                                                </div>
                                                <label class="control-label col-sm-4">素食/酒精過敏</label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="no_alcohol_v" id="no_alcohol_v" class="form-control" value="{{ $order->no_alcohol_v or '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">葷食/不吃堅果</label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="no_nut_m" id="no_nut_m" class="form-control" value="{{ $order->no_nut_m or '' }}">
                                                </div>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">葷食/甲殼類過敏</label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="no_shell" id="no_shell" class="form-control" value="{{ $order->no_shell or '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">葷食/所有海鮮過敏/不吃</label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="no_fish" id="no_fish" class="form-control" value="{{ $order->no_fish or '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">葷食/酒精過敏</label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="no_alcohol" id="no_alcohol" class="form-control" value="{{ $order->no_alcohol or '' }}">
                                                </div>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">葷食/不吃羊肉</label>
                                                <div class="col-sm-2">
                                                    <input type="number" name="no_lamb" id="no_lamb" class="form-control" value="{{ $order->no_lamb or '' }}">
                                                </div>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">備註</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" readonly style="min-height:120px;">{{ $order->notes or '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">付款方式</label>
                                                <div class="col-sm-8">
                                                    <select name="pay_type" id="pay_type" class="form-control" data-edit_type="{{ $order->edit_type or '' }}">
                                                        <option value="後台編輯"@if(isset($order->pay_type) && $order->pay_type=='後台編輯') selected @endif>後台編輯</option>
                                                        <option value="信用卡"@if(isset($order->pay_type) && $order->pay_type=='信用卡') selected @endif>信用卡</option>
                                                        <!-- <option value="現場付款"@if(isset($order->pay_type) && $order->pay_type=='現場付款') selected @endif>現場付款</option> -->
                                                        <option value="合作販售"@if(isset($order->pay_type) && $order->pay_type=='合作販售') selected @endif>合作販售</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">付款狀態</label>
                                                <div class="col-sm-8">
                                                    <select name="pay_status" class="form-control">
                                                        <option value="未完成"@if(isset($order->pay_status) && $order->pay_status=='未完成') selected @endif>未完成</option>
                                                        <option value="已付款"@if(isset($order->pay_status) && $order->pay_status=='已付款') selected @endif>已付款</option>
                                                        <option value="已付款(部分退款)"@if(isset($order->pay_status) && $order->pay_status=='已付款(部分退款)') selected @endif>已付款(部分退款)</option>
                                                        <option value="取消訂位"@if(isset($order->pay_status) && $order->pay_status=='取消訂位') selected @endif>取消訂位</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">管理</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="manage" style="min-height:120px;">{{ $order->manage or '' }}</textarea>
                                                </div>
                                            </div>




                                            <div class="form-group back_control">
                                                <label class="control-label col-sm-4">XLS顯示</label>
                                                <div class="col-sm-8">
                                                    <select name="edit_type" class="form-control" data-json="{{ json_encode($cooperate) }}">
                                                        <option value="後台編輯"@if(isset($order->edit_type) && $order->edit_type=='後台編輯') selected @endif>後台編輯</option>
                                                        <option value="藍新快速"@if(isset($order->edit_type) && $order->edit_type=='藍新快速') selected @endif>藍新快速</option>
                                                        <option value="自行匯款"@if(isset($order->edit_type) && $order->edit_type=='自行匯款') selected @endif>自行匯款</option>
                                                        <option value="現場購票"@if(isset($order->edit_type) && $order->edit_type=='現場購票') selected @endif>現場購票</option>
                                                        <option value="公關位"@if(isset($order->edit_type) && $order->edit_type=='公關位') selected @endif>公關位</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group back_control part_control">
                                                <label class="control-label col-sm-4">金額</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="money" id="money" value="{{ $order->money or 0 }}" required>
                                                    <small class="text-warning">單人金額:{{ $order->cash }} X 1 X 10%服務費 = {{ $order->cash *  1.1 }}</small>
                                                </div>
                                            </div>


                                            
                                            
                                            <div align="right">
                                                <button type="button" class="btn btn-danger btn-custom waves-effect w-md waves-light m-b-5 ref_money">退款</button>
                                                <button type="button" class="btn btn-info btn-custom waves-effect w-md waves-light m-b-5 change_day">我要改期</button>
                                                <button type="submit" class="btn btn-primary btn-custom waves-effect w-md waves-light m-b-5">送出</button>
                                            </div>

                                            <div class="form-group ref_input">
                                                <label class="control-label col-sm-4">退款金額</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="refund" class="form-control" value="{{ $order->refund ?? 0 }}">
                                                </div>
                                            </div>
                                            <div class="form-group ref_input">
                                                <label class="control-label col-sm-4">取消人數</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="cut">
                                                        @for ($i = 0; $i <= $order->pople; $i++)
                                                        <option value="{{ $i }}"@if($order->cut==$i) selected @endif>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group ref_input">
                                                <label class="control-label col-sm-4">手續費%數</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="handling">
                                                        @for ($i = 0; $i <= 100; $i++)
                                                        <option value="{{ $i }}"@if($order->handling==$i) selected @endif>{{ $i }} %</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group ref_input">
                                                <label class="control-label col-sm-4">手續費金額</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" id="handling_fee" readonly value="">
                                                    <span class="text-warning">手續費金額計算公式；退款金額 X 手續費%數</span>
                                                </div>
                                            </div>
                                        
@if(isset($order->result) && $order->result!='')<?php $res = json_decode($order->result,true); ?>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">回傳交易時間</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="{{ $res['data']['Result']['PayTime'] or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">交易結果</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="{{ $res['data']['Message'] or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">藍新交易序號</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="{{ $res['data']['Result']['TradeNo'] or ''  }}">
                                                </div>
                                            </div>
@endif  
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

        <script>
        $(function(){
$('.change_day').bind('click',function(){
    $('.hpro_id').hide();
    $('.spro_id').show();
    $('select[name=pro_id]').prop('disabled',false);
});
$('form').bind('submit',function(){
    if(!$('select[name=pro_id]').prop('disabled')){
        var sites = $('select[name=pro_id] option:selected').data('sites');
        var people = $('input[name=people]').val();
        if(people > sites){
            alert('座位數不足無法修改場次');
            return false;
        }
    }
});



$('#pay_type').bind('change',function(){
    const type = $(this).val();
    const edit_type = $(this).data('edit_type');
    var etp = $('select[name=edit_type]');
    if(type == '後台編輯'){
        etp.html('');
        if(edit_type == '後台編輯'){ etp.append('<option value="後台編輯" selected>後台編輯</option>'); } else { etp.append('<option value="後台編輯">後台編輯</option>'); }
        if(edit_type == '藍新快速'){ etp.append('<option value="藍新快速" selected>藍新快速</option>'); } else { etp.append('<option value="藍新快速">藍新快速</option>'); }
        if(edit_type == '自行匯款'){ etp.append('<option value="自行匯款" selected>自行匯款</option>'); } else { etp.append('<option value="自行匯款">自行匯款</option>'); }
        if(edit_type == '現場購票'){ etp.append('<option value="現場購票" selected>現場購票</option>'); } else { etp.append('<option value="現場購票">現場購票</option>'); }
        if(edit_type == '公關位'){ etp.append('<option value="公關位" selected>公關位</option>'); } else { etp.append('<option value="公關位">公關位</option>'); }
        $('.back_control').show();
    } else if(type == '合作販售'){
        etp.html('');
        var json = etp.data('json');
        if(json != ''){
            $.each( json, function( key, value ) {
                if(edit_type == value.edit_type){ etp.append('<option value="'+value.edit_type+'" selected>'+value.edit_type+'</option>'); } else { etp.append('<option value="Line Pay">'+value.edit_type+'</option>'); }
            });
            $('.back_control').show();    
        }
    } else {
        $('.back_control').hide();
        if($('#pay_type').val() == '已付款(部分退款)') $('.part_control').show();
    }
});
$('#pay_type').trigger('change');



$('select[name=pay_status]').bind('change',function(){
    const status = $(this).val();
    if(status == '已付款(部分退款)'){
        $('.part_control').show();
    } else {
        $('.part_control').hide();
        if($('#pay_type').val() == '後台編輯') $('.back_control').show();
    }
});
// $('select[name=pay_status],select[name=handling]').trigger('change');
$('.ref_money').bind('click',function(){
    $('.ref_input').show();
})
$('input[name=refund]').bind('blur keyup change',function(){
    $('#handling_fee').val(Math.round($(this).val() * $('select[name=handling]').val() / 100));
});
$('select[name=handling]').bind('change',function(){
    $('#handling_fee').val(Math.round($(this).val() * $('input[name=refund]').val() / 100));
});
$('select[name=pay_status],select[name=handling]').trigger('change');
@if($order->refund == 0) $('.ref_input').hide(); @endif
        });



        </script>



    </body>
</html>