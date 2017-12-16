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
                                    <h4 class="m-t-0 header-title"><b>禮物卡</b></h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-8">

                                    <div class="p-20">
                                        <form  data-parsley-validate novalidate method="post" action="/TableForOne/gift/{{ $gift->id or 0}}/update" class="form-horizontal">
{!! csrf_field() !!}
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">送禮人姓名</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="bname" value="{{ $gift->bname or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">送禮人電話</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="btel" value="{{ $gift->btel or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">送禮人信箱</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="bemail" value="{{ $gift->bemail or ''  }}">
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="form-group">
                                                <label class="control-label col-sm-4">收禮人姓名</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="rname" value="{{ $gift->rname or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">收禮人電話</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="rtel" value="{{ $gift->rtel or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">收禮人信箱</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="remail" value="{{ $gift->remail or ''  }}">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">寄送方式</label>
                                                <div class="col-sm-8">
                                                    <div class="radio radio-primary radio-inline"><input name="sendtype" value="Email" id="none1" type="radio" @if(!isset($gift->sendtype)) checked @elseif($gift->sendtype=='Email') checked @endif><label for="none1">EMail</label></div>
                                                    <div class="radio radio-primary radio-inline"><input name="sendtype" value="到店自取" id="none4" type="radio" @if(isset($gift->sendtype) && $gift->sendtype=='到店自取') checked @endif><label for="none4">到店自取</label></div>
                                                    <div class="radio radio-primary radio-inline"><input name="sendtype" value="國內郵寄" id="none2" type="radio" @if(isset($gift->sendtype) && $gift->sendtype=='國內郵寄') checked @endif><label for="none2">國內郵寄</label></div>
                                                    <div class="radio radio-primary radio-inline"><input name="sendtype" value="國外郵寄" id="none3" type="radio" @if(isset($gift->sendtype) && $gift->sendtype=='國外郵寄') checked @endif><label for="none3">國外郵寄</label></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">地址</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="address" value="{{ $gift->address or ''  }}">
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <label class="control-label col-sm-4">邀請文字</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="InvitationText" style="min-height:120px;">{{ $gift->InvitationText or '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">附註欄位</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="manage" style="min-height:120px;">{{ $gift->manage or '' }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-4">是否寄送</label>
                                                <div class="col-sm-8">
                                                    <div class="radio radio-primary radio-inline"><input name="send" value="1" id="send1" type="radio" @if(!isset($gift->send)) checked @elseif($gift->send===1) checked @endif><label for="send1">已寄送</label></div>
                                                    <div class="radio radio-primary radio-inline"><input name="send" value="0" id="send2" type="radio" @if(isset($gift->send) && $gift->send===0) checked @endif><label for="send2">尚未寄送</label></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">是否付款</label>
                                                <div class="col-sm-8">
                                                    <div class="radio radio-primary radio-inline"><input name="paystatus" value="1" id="send3" type="radio" @if(!isset($gift->paystatus)) checked @elseif($gift->paystatus===1) checked @endif><label for="send3">已付款</label></div>
                                                    <div class="radio radio-primary radio-inline"><input name="paystatus" value="-1" id="send5" type="radio" @if(isset($gift->paystatus) && $gift->paystatus===-1) checked @endif><label for="send5">已取消</label></div>
                                                    <div class="radio radio-primary radio-inline"><input name="paystatus" value="0" id="send4" type="radio" @if(isset($gift->paystatus) && $gift->paystatus===0) checked @endif><label for="send4">尚未付款</label></div>
                                                </div>
                                            </div>


                                            
                                            <div align="right">
                                                <button type="submit" class="btn btn-primary btn-custom waves-effect w-md waves-light m-b-5">送出</button>
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

        <script>
        $(function(){

        });



        </script>



    </body>
</html>