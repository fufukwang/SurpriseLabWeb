@include('backstage.header',['title' => '落日轉運站訂單列表'])
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
                                    <h4 class="m-t-0 header-title"><b>落日轉運站訂單列表</b></h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-8">

                                    <div class="p-20">
                                        <form  data-parsley-validate novalidate method="post" action="/terminal/order/{{ $order->id or 0}}/update" class="form-horizontal">
                                            <input type="hidden" name="qxx" value="{{ Request::getQueryString() }}">
{!! csrf_field() !!}

                                            <div class="form-group">
                                                <label class="control-label col-sm-4">票種</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="plan" disabled>
                                                        <option value="train"@if(isset($order->plan) && $order->plan=='train') selected @endif>微醺列車 The Great Tipsy : The Next Stop</option>
                                                        <option value="flight"@if(isset($order->plan) && $order->plan=='flight') selected @endif>FLIGHT 無光飛航</option>
                                                        <option value="boat"@if(isset($order->plan) && $order->plan=='boat') selected @endif>Boat for ONE 單人船票</option>
                                                        <option value="A"@if(isset($order->plan) && $order->plan=='A') selected @endif>套票 A</option>
                                                        <option value="B"@if(isset($order->plan) && $order->plan=='B') selected @endif>套票 B</option>
                                                    </select>
                                                    <span style="color:red">*方案不提供修改(價格不同)</span>
                                                </div>
                                            </div>
                                            @foreach(DB::table('terminal_pro_order')->select('terminal_pro_order.id','ticket_type','day','day_parts','rang_start','rang_end')->leftJoin('terminalpro', 'terminalpro.id', '=', 'terminal_pro_order.pro_id')->where('order_id',$order->id)->get() as $row)
                                            <div class="form-group hide-form-{{ $row->ticket_type }}">
                                                <label class="control-label col-sm-4">
                                                    @if($row->ticket_type == 'boat') Boat for ONE 單人船票 @endif
                                                    @if($row->ticket_type == 'train') 微醺列車 The Great Tipsy : The Next Stop @endif
                                                    @if($row->ticket_type == 'flight') FLIGHT 無光飛航 @endif
                                                </label>
                                                <div class="col-sm-8">
                                                    <div class="input-group mb-3">
                                                      <input type="text" class="form-control" value="{{ $row->day or ''  }} {{ $row->day_parts or ''  }} {{ substr($row->rang_start,0,5)  }} ~ {{ substr($row->rang_end,0,5)  }}" readonly>
                                                      <div class="input-group-btn">
                                                        <button class="btn btn-info change-pro-bnt" data-type="{{ $row->ticket_type }}" type="button">更改場次</button>
                                                      </div>
                                                    </div>


                                                    <!-- <input type="text" class="form-control" name="yo" readonly value="{{ $row->day or ''  }} {{ $row->day_parts or ''  }} {{ substr($row->rang_start,0,5)  }} ~ {{ substr($row->rang_end,0,5)  }}"> -->
                                                </div>
                                            </div>
                                            <input type="hidden" name="{{$row->ticket_type}}-id" value="{{ $row->id }}">
                                            <input type="hidden" name="{{$row->ticket_type}}-store" value="">
                                            @endforeach


                                            <div class="form-group train">
                                                <label class="control-label col-sm-4">微醺列車 The Great Tipsy : The Next Stop</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="train">
                                                        @foreach($train as $row)
                                                        <option value="{{ $row->id }}"@if(isset($pro->id) && $pro->id==$row->id) selected @endif>{{ $row->day }} {{ $row->day_parts }} {{ substr($row->rang_start,0,5) }} ~ {{ substr($row->rang_end,0,5) }} (剩餘 {{$row->sites}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group flight">
                                                <label class="control-label col-sm-4">FLIGHT 無光飛航</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="flight">
                                                        @foreach($flight as $row)
                                                        <option value="{{ $row->id }}"@if(isset($pro->id) && $pro->id==$row->id) selected @endif>{{ $row->day }} {{ $row->day_parts }} {{ substr($row->rang_start,0,5) }} ~ {{ substr($row->rang_end,0,5) }} (剩餘 {{$row->sites}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group boat">
                                                <label class="control-label col-sm-4">Boat for ONE 單人船票</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="boat">
                                                        @foreach($boat as $row)
                                                        <option value="{{ $row->id }}"@if(isset($pro->id) && $pro->id==$row->id) selected @endif>{{ $row->day }} {{ $row->day_parts }} {{ substr($row->rang_start,0,5) }} ~ {{ substr($row->rang_end,0,5) }} (剩餘 {{$row->sites}})</option>
                                                        @endforeach
                                                    </select>
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
                                                <label class="control-label col-sm-4">微醺列車參加人數</label>
                                                <div class="col-sm-8">
                                                    <select name="num_t" id="num_t" class="form-control">
                                                        @for($i=0;$i<=$order->pople;$i++)
                                                        <option value="{{ $i }}"@if(isset($order->num_t) && $order->num_t==$i) selected @endif>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">FLIGHT參加人數</label>
                                                <div class="col-sm-8">
                                                    <select name="num_f" id="num_f" class="form-control">
                                                        @for($i=0;$i<=$order->pople;$i++)
                                                        <option value="{{ $i }}"@if(isset($order->num_f) && $order->num_f==$i) selected @endif>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group">
                                                <label class="control-label col-sm-4">船參加人數</label>
                                                <div class="col-sm-8">
                                                    <select name="num_b" id="num_b" class="form-control">
                                                        @for($i=0;$i<=$order->pople;$i++)
                                                        <option value="{{ $i }}"@if(isset($order->num_b) && $order->num_b==$i) selected @endif>{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div> -->
                                            <div class="form-group boat">
                                                <label class="control-label col-sm-4">素食</label>
                                                <div class="col-sm-8">
                                                    <select name="vegetarian" id="vegetarian" class="form-control">
                                                        @for($i=0;$i<=$order->pople;$i++)
                                                        <option value="{{ $i }}"@if(isset($order->vegetarian) && $order->vegetarian==$i) selected @endif>{{ $i }}</option>
                                                        @endfor
                                                    </select>
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
                                                    <select name="pay_type" id="pay_type" class="form-control">
                                                        <option value="後台編輯"@if(isset($order->pay_type) && $order->pay_type=='後台編輯') selected @endif>後台編輯</option>
                                                        <option value="信用卡"@if(isset($order->pay_type) && $order->pay_type=='信用卡') selected @endif>信用卡</option>
                                                        <!-- <option value="現場付款"@if(isset($order->pay_type) && $order->pay_type=='現場付款') selected @endif>現場付款</option> -->
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
                                                    <select name="edit_type" class="form-control">
                                                        <option value="後台編輯"@if(isset($order->edit_type) && $order->edit_type=='後台編輯') selected @endif>後台編輯</option>
                                                        <option value="藍新快速"@if(isset($order->edit_type) && $order->edit_type=='藍新快速') selected @endif>藍新快速</option>
                                                        <option value="自行匯款"@if(isset($order->edit_type) && $order->edit_type=='自行匯款') selected @endif>自行匯款</option>
                                                        <option value="公關位"@if(isset($order->edit_type) && $order->edit_type=='公關位') selected @endif>公關位</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group back_control part_control">
                                                <label class="control-label col-sm-4">金額</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="money" id="money" value="{{ $order->money or 0 }}" required>
                                                    <small class="text-warning">單人金額:
                                                    @if($order->plan == 'train') 1250 X 1  = 1250 @endif
                                                    @if($order->plan == 'flight') 500 X 1  = 500 @endif
                                                    @if($order->plan == 'boat') 800 X 1  = 800 @endif
                                                    @if($order->plan == 'A') 1650 X 1  = 1650 @endif
                                                    @if($order->plan == 'B') 2400 X 1  = 2400 @endif
                                                    </small>
                                                </div>
                                            </div>


                                            
                                            
                                            <div align="right">
                                                <button type="button" class="btn btn-danger btn-custom waves-effect w-md waves-light m-b-5 ref_money">退款</button>
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
            /*
$('.change_day').bind('click',function(){
    $('select[name=plan]').trigger('change');
    $('.hideByChange').hide();
    $('select[name=boat]').prop('disabled',false);
    $('select[name=train]').prop('disabled',false);
    $('select[name=flight]').prop('disabled',false);
});
*/
            $('.ref_money').bind('click',function(){
                $('.ref_input').show();
            })
$('.change-pro-bnt').bind('click',function(){
    var type = $(this).data('type');
    $('.hide-form-'+type).hide();
    $('input[name='+type+'-store]').val('1');
    $('.'+type).show();
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
$('input[name=refund]').bind('blur keyup change',function(){
    $('#handling_fee').val(Math.round($(this).val() * $('select[name=handling]').val() / 100));
});
$('select[name=handling]').bind('change',function(){
    $('#handling_fee').val(Math.round($(this).val() * $('input[name=refund]').val() / 100));
});


$('#pay_type').bind('change',function(){
    const type = $(this).val();
    if(type == '後台編輯'){
        $('.back_control').show();
    } else {
        $('.back_control').hide();
        if($('#pay_type').val() == '已付款(部分退款)') $('.part_control').show();
    }
});
$('#pay_type').trigger('change');


$('select[name=plan]').bind('change',function(){
    var val = $(this).val()
    $('.boat,.train,.flight').hide();
    if(val == 'boat'){ $('.boat').show(); }
    if(val == 'train'){ $('.train').show(); }
    if(val == 'flight'){ $('.flight').show(); }
    if(val == 'A'){ $('.train,.flight').show(); }
    if(val == 'B'){ $('.boat,.train,.flight').show(); }
});
// $('select[name=plan]').trigger('change');
$('.boat,.train,.flight').hide();


$('select[name=pay_status]').bind('change',function(){
    const status = $(this).val();
    if(status == '已付款(部分退款)'){
        $('.part_control').show();
    } else {
        $('.part_control').hide();
        if($('#pay_type').val() == '後台編輯') $('.back_control').show();
    }
});
$('select[name=pay_status],select[name=handling]').trigger('change');
@if($order->refund == 0) $('.ref_input').hide(); @endif
        });



        </script>



    </body>
</html>