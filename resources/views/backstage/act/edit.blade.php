@include('backstage.header')
<!-- =======================
===== START PAGE ======
======================= -->

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">活動編輯</h4>
                    </div>
                </div>
                <!-- Page-Title -->

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="p-20">
                                        <form  data-parsley-validate novalidate method="post" action="/actstore">
                            {!! csrf_field() !!}
                                        <input type="hidden" name="AID" value="{{ $act->AID or 0 }}">
                                            <div class="form-group">
                                                <label class="control-label">日期</label>
                                                <div class="input-group" id="datepicker">
                                                    <input name="ADay" type="text" class="form-control" placeholder="yyyy-mm-dd" value="{{ isset($act->ADay) ? $act->ADay->format('Y-m-d') : Carbon\Carbon::today()->format('Y-m-d')  }}">
                                                    <span class="input-group-addon bg-primary b-0 text-white"><i class="ion-calendar"></i></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="control-label">人數</label>
                                                <input id="Pop" type="number" class="form-control" value="{{ $act->Pop or 20 }}" name="Pop">
                                            </div>
                                            
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="checkbox1" type="checkbox" name="One" value="1" @if(!empty($act->One) && $act->One) checked @endif >
                                                    <label for="checkbox1">
                                                        一人訂位
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="checkbox2" type="checkbox" name="Sp" value="1" @if(!empty($act->Sp) && $act->Sp) checked @endif>
                                                    <label for="checkbox2">
                                                        特別場次
                                                    </label>
                                                </div>
                                            </div>
                                        </div>




                                            <div class="col-md-6" style="padding-left: 0px;">
                                                    <label>開始時間</label>
                                                    <div class="input-group m-b-15">

                                                        <div class="bootstrap-timepicker">
                                                            <input name="STime" type="text" value="{{ $act->STime or '18:00' }}" class="form-control timepicker">
                                                        </div>
                                                        <span class="input-group-addon bg-primary b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
                                                    </div><!-- input-group -->
                                            </div>
                                            <div class="col-md-6" style="padding-right: 0px;padding-bottom: 15px;">
                                                    <label>結束時間</label>
                                                    <div class="input-group m-b-15">

                                                        <div class="bootstrap-timepicker">
                                                            <input name="ETime" type="text" value="{{ $act->ETime or '20:00' }}" class="form-control timepicker">
                                                        </div>
                                                        <span class="input-group-addon bg-primary b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
                                                    </div><!-- input-group -->
                                            </div>
                                            <div class="col-md-6" style="padding-left: 0px;">
                                                    <label>刷卡金額</label>
                                                    <div class="input-group m-b-15">
                                                        <div class="bootstrap-timepicker">
                                                            <input name="Card" id="Card" type="text" value="{{ $act->Card or '1500' }}" class="form-control" readonly>
                                                        </div>
                                                    </div><!-- input-group -->
                                            </div>
                                            <div class="col-md-6" style="padding-left: 0px;">
                                                    <label>現金金額</label>
                                                    <div class="input-group m-b-15">
                                                        <div class="bootstrap-timepicker">
                                                            <input name="Money" id="Money" type="text" value="{{ $act->Money or '2000' }}" class="form-control" readonly>
                                                        </div>
                                                    </div><!-- input-group -->
                                            </div>
                                            <div class="col-md-6" style="padding-left: 0px;">不含10%服務費</div>
                                            <span class="input-group-btn">
                                            @if(!empty($act->ADay) && $act->ADay->timestamp+86400<time())
                                                <button style="background-color: #7266ba !important;border: 1px solid #7266ba !important;" type="button" class="btn waves-effect waves-light btn-primary">Submit(時間已過無法修改)</button>
                                            @else
                                                <button style="background-color: #7266ba !important;border: 1px solid #7266ba !important;" type="submit" class="btn waves-effect waves-light btn-primary">Submit</button>
                                                @if(!empty($act->AID) && App\model\orderlist::where('Status','SUCCESS')->where('AID',$act->AID)->sum('Pople')>0)
                                                    <span>已有人員報名~僅提供人數欄位修改</span>
                                                @endif
                                            @endif
                                            </span>
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

        <script>
        $(function(){
            // Time Picker
            jQuery('.timepicker').timepicker({
                showMeridian : false
            });

$("#datepicker").datetimepicker({
    "format": "YYYY-MM-DD",
    "minDate":'{{ Carbon\Carbon::today()->format('Y-m-d') }}',
    "maxDate":'{{ config('setting.enddate') }}',
});
$('#checkbox2').bind('click',function(){
    if($(this).prop('checked')){
        $('#Card').val('1800');
        $('#Money').val('2300');
    } else {
        $('#Card').val('1500');
        $('#Money').val('2000');
    }
});

/*
            jQuery('#datepicker-autoclose').datepicker({
                autoclose: true,
                orientation:'bottom',
                todayHighlight: true
            });
            jQuery('#datepicker-inline').datepicker();
            jQuery('#datepicker-multiple-date').datepicker({
                format: "mm/dd/yyyy",
                clearBtn: true,
                multidate: true,
                multidateSeparator: ","
            });
            jQuery('#date-range').datepicker({
                toggleActive: true
            });*/
        });



        </script>



    </body>
</html>