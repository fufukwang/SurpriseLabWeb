@include('backstage.header')
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
                                    <h4 class="m-t-0 header-title"><b>訂單內容</b></h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-8">

                                    <div class="p-20">
                                        <form  data-parsley-validate novalidate method="post" action="/dark2/order/{{ $order->id or 0}}/update" class="form-horizontal">
                                            <input type="hidden" name="qxx" value="{{ Request::getQueryString() }}">
{!! csrf_field() !!}
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">日期</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="{{ $order->day or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">時段</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="{{ $order->dayparts or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">區間</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="{{ substr($order->rangstart,0,5)  }} ~ {{ substr($order->rangend,0,5)  }}">
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
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="tel" readonly value="{{ $order->tel or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">EMail</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="email" readonly value="{{ $order->email or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">訂單號碼</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="{{ $order->sn or '請留白系統會自動生成' }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">主餐</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="@if(isset($order->meal)) @if($order->mv!=''){{implode(",",json_decode($order->mv))}}@else @if($order->meal=='V')素@else 葷 @endif @endif @endif">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">人數</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="{{ $order->pople or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">訂餐類型</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="{{ $order->item or '' }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">備註</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" readonly style="min-height:120px;">{{ $order->notes or '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">故事</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" readonly style="min-height:120px;">{{ $order->story or '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">付款方式</label>
                                                <div class="col-sm-8">
                                                    <select name="paytype" class="form-control">
                                                        <option value="後台編輯"@if(isset($order->paytype) && $order->paytype=='後台編輯') selected @endif>後台編輯</option>
                                                        <option value="信用卡"@if(isset($order->paytype) && $order->paytype=='信用卡') selected @endif>信用卡</option>
                                                        <option value="現場付款"@if(isset($order->paytype) && $order->paytype=='現場付款') selected @endif>現場付款</option>
                                                        <option value="禮物卡"@if(isset($order->paytype) && $order->paytype=='禮物卡') selected @endif>禮物卡</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">付款狀態</label>
                                                <div class="col-sm-8">
                                                    <select name="paystatus" class="form-control">
                                                        <option value="未完成"@if(isset($order->paystatus) && $order->paystatus=='未完成') selected @endif>未完成</option>
                                                        <option value="已付款"@if(isset($order->paystatus) && $order->paystatus=='已付款') selected @endif>已付款</option>
                                                        <option value="取消訂位"@if(isset($order->paystatus) && $order->paystatus=='取消訂位') selected @endif>取消訂位</option>
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

        });



        </script>



    </body>
</html>