@include('backstage.header',['title' => '明日俱樂部預約席次設定'])
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
                                    <h4 class="m-t-0 header-title"><b>明日俱樂部預約席次設定</b></h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-8">

                                    <div class="p-20">
                                        <form  data-parsley-validate novalidate method="post" action="/clubtomorrow/order/{{ $pro_id }}/appointmentUpdate" class="form-horizontal">
{!! csrf_field() !!}
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">日期</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="day" value="{{ $pro->day }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">時段</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="daypart" value="{{ $pro->day_parts }}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">區間</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="range" value="{{ substr($pro->rang_start,0,5) }} ~ {{ substr($pro->rang_end,0,5) }}" readonly>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-4">姓名</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="name" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">電話</label>
                                                <div class="col-sm-3">
                                                    <select name="dial_code" class="form-control" required>
<option value="+886">+886</option>
<option value="+86">+86</option>
<option value="+852">+852</option>
<option value="+853">+853</option>
<option value="+60">+60</option>
<option value="+65">+65</option>

                                                    </select>
                                                    <!--input type="text" class="form-control" name="dial_code" maxlength="4" required-->
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" name="tel" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">EMail</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control" name="email" required email>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">人數</label>
                                                <div class="col-sm-8">
                                                    <select name="people" id="pople" class="form-control">
                                                        @for($i=0;$i<31;$i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">素食</label>
                                                <div class="col-sm-8">
                                                    <select name="vegetarian" id="vegetarian" class="form-control">
                                                        @for($i=0;$i<31;$i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">不酒</label>
                                                <div class="col-sm-8">
                                                    <select name="no_alcohol" id="no_alcohol" class="form-control">
                                                        @for($i=0;$i<31;$i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>


                                            
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">備註</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="notes" style="min-height:120px;"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">付款方式</label>
                                                <div class="col-sm-8">
                                                    <select name="pay_type" class="form-control">
                                                        <option value="後台編輯">後台編輯</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">付款狀態</label>
                                                <div class="col-sm-8">
                                                    <select name="pay_status" class="form-control">
                                                        <option value="未完成">未完成</option>
                                                        <option value="已付款">已付款</option>
                                                        <option value="取消訂位">取消訂位</option>
                                                    </select>
                                                    <p>選擇已付款才會寄送EMail</p>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-sm-4">管理</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="manage" style="min-height:120px;"></textarea>
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
$('#money').bind('change',function(){
    $('#item').val($('#money option:selected').text());
});
$('#pople').bind('change',function(){
    changeToPople($(this).val());
})
changeToPople(1);
        });


function changeToPople(pople){
    $('.btn-group').hide()
    for(i=0;i<parseInt(pople);i++){
        $('.btn-group').eq(i).show();
    }
    /*
    $('.group-6').hide();
    if(pople == 4){
        $('.group-4').show();
    } else if(pople == 6){
        $('.group-6').show();
    }
    */
}


        </script>



    </body>
</html>