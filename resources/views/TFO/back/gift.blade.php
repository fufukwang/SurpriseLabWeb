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
                                        <form  data-parsley-validate novalidate method="post" action="/TableForOne/order/{{ $order->id or 0}}/update" class="form-horizontal">
{!! csrf_field() !!}

                                            <div class="form-group">
                                                <label class="control-label col-sm-4">收禮人姓名</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="{{ $order->name or ''  }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">收禮人電話</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="{{ $order->name or ''  }}">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">寄送方式</label>
                                                <div class="col-sm-8">
                                                    <div class="radio radio-primary radio-inline"><input name="sendtype" value="EMail" id="none1" type="radio" checked><label for="none1">EMail</label></div>
                                                    <div class="radio radio-primary radio-inline"><input name="sendtype" value="in" id="none2" type="radio"><label for="none2">國內地址</label></div>
                                                    <div class="radio radio-primary radio-inline"><input name="sendtype" value="out" id="none3" type="radio" disabled><label for="none3">國外地址</label></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4"></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" value="{{ $order->name or ''  }}">
                                                </div>
                                            </div>




                                            <div class="form-group">
                                                <label class="control-label col-sm-4">邀請文字</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="manage" style="min-height:120px;">{{ $order->manage or '' }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">收禮人背景</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="manage" style="min-height:120px;">{{ $order->manage or '' }}</textarea>
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