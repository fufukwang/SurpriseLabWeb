@include('backstage.header',['title' => '明日俱樂部訂單列表'])
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
                                    <h4 class="m-t-0 header-title"><b>明日俱樂部訂單列表</b></h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-8">

                                    <div class="p-20">
                                        <form  data-parsley-validate novalidate method="post" action="/clubtomorrow/order/{{ $order->id or 0}}/update" class="form-horizontal">
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
@foreach($pro as $row)<option value="{{ $row->id }}">{{ $row->day }} {{ substr($row->rang_start,0,5)  }} ~ {{ substr($row->rang_end,0,5)  }} (剩餘座位數 {{ $row->sites }})</option>@endforeach
                                                    </select>
                                                    <span style="color:red">*不會再次驗證座位是否足夠請警慎使用</span>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-sm-4">姓名</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="name" readonly value="{{ $order->name or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">電話</label>
                                                <div class="col-sm-3">
                                                    <select name="dial_code" class="form-control">
<option value="+886"@if(isset($order->dial_code) && $order->dial_code=='+886') selected @endif>+886</option>
<option value="+86"@if(isset($order->dial_code) && $order->dial_code=='+86') selected @endif>+86</option>
<option value="+852"@if(isset($order->dial_code) && $order->dial_code=='+852') selected @endif>+852</option>
<option value="+853"@if(isset($order->dial_code) && $order->dial_code=='+853') selected @endif>+853</option>
<option value="+60"@if(isset($order->dial_code) && $order->dial_code=='+60') selected @endif>+60</option>
<option value="+65"@if(isset($order->dial_code) && $order->dial_code=='+65') selected @endif>+65</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" name="tel" value="{{ $order->tel or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">EMail</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control" name="email" value="{{ $order->email or ''  }}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-4">素食</label>
                                                <div class="col-sm-8">
                                                    <select name="vegetarian" class="form-control">
@for($i=0;$i<$order->pople;$i++)<option value="{{$i}}"@if($order->vegetarian==$i) selected @endif>{{$i}} 位</option>@endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">不酒</label>
                                                <div class="col-sm-8">
                                                    <select name="no_alcohol" class="form-control">
@for($i=0;$i<$order->pople;$i++)<option value="{{$i}}"@if($order->no_alcohol==$i) selected @endif>{{$i}} 位</option>@endfor
                                                    </select>
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
                                                    <input type="text" class="form-control" readonly value="{{ $order->pople or ''  }}">
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
                                                    <select name="pay_type" class="form-control">
                                                        <option value="後台編輯"@if(isset($order->pay_type) && $order->pay_type=='後台編輯') selected @endif>後台編輯</option>
                                                        <option value="信用卡"@if(isset($order->pay_type) && $order->pay_type=='信用卡') selected @endif>信用卡</option>
                                                        <option value="現場付款"@if(isset($order->pay_type) && $order->pay_type=='現場付款') selected @endif>現場付款</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">付款狀態</label>
                                                <div class="col-sm-8">
                                                    <select name="pay_status" class="form-control">
                                                        <option value="未完成"@if(isset($order->pay_status) && $order->pay_status=='未完成') selected @endif>未完成</option>
                                                        <option value="已付款"@if(isset($order->pay_status) && $order->pay_status=='已付款') selected @endif>已付款</option>
                                                        <option value="取消訂位"@if(isset($order->pay_status) && $order->pay_status=='取消訂位') selected @endif>取消訂位</option>
                                                        <option value="更改場次"@if(isset($order->pay_status) && $order->pay_status=='更改場次') selected @endif>更改場次</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">管理</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="manage" style="min-height:120px;">{{ $order->manage or '' }}</textarea>
                                                </div>
                                            </div>




                                            
                                            <div align="right">
                                                <button type="button" class="btn btn-info btn-custom waves-effect w-md waves-light m-b-5 change_day">我要改期</button>
                                                <button type="submit" class="btn btn-primary btn-custom waves-effect w-md waves-light m-b-5">送出</button>
                                            </div>
                                        
@if(isset($order->result) && $order->result!='')<?php $res = json_decode($order->result,true); ?>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">回傳交易時間</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="{{ $res['TradeDate'] or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">交易結果</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="{{ $res['RtnMsg'] or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">綠界交易序號</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="{{ $res['TradeNo'] or ''  }}">
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
        });



        </script>



    </body>
</html>