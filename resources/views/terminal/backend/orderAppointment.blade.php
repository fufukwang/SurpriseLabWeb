@include('backstage.header',['title' => '落日轉運站預約席次設定'])
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
                                    <h4 class="m-t-0 header-title"><b>落日轉運站預約席次設定</b></h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-8">

                                    <div class="p-20">
                                        <form data-parsley-validate method="post" action="/terminal/order/{{ $pro_id }}/appointmentUpdate" class="form-horizontal">
{!! csrf_field() !!}

                                            <div class="form-group">
                                                <label class="control-label col-sm-4">票種</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="ticket_type" @if(isset($pro->id)) disabled @endif>
                                                        <option value="train"@if(isset($pro->ticket_type) && $pro->ticket_type=='train') selected @endif>微醺列車 The Great Tipsy : The Next Stop</option>
                                                        <option value="flight"@if(isset($pro->ticket_type) && $pro->ticket_type=='flight') selected @endif>FLIGHT 無光飛航</option>
                                                        <option value="boat"@if(isset($pro->ticket_type) && $pro->ticket_type=='boat') selected @endif>Boat for ONE 單人船票</option>
                                                        <option value="A"@if(isset($pro->ticket_type) && $pro->ticket_type=='A') selected @endif>套票 A</option>
                                                        <option value="B"@if(isset($pro->ticket_type) && $pro->ticket_type=='B') selected @endif>套票 B</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="form-group train">
                                                <label class="control-label col-sm-4">微醺列車 The Great Tipsy : The Next Stop</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="train" @if(isset($pro->id)) disabled @endif>
                                                        @foreach($train as $row)
                                                        <option value="{{ $row->id }}"@if(isset($pro->id) && $pro->id==$row->id) selected @endif>{{ $row->day }} {{ $row->day_parts }} {{ substr($row->rang_start,0,5) }} ~ {{ substr($row->rang_end,0,5) }} (剩餘 {{$row->sites}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group flight">
                                                <label class="control-label col-sm-4">FLIGHT 無光飛航</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="flight" @if(isset($pro->id)) disabled @endif>
                                                        @foreach($flight as $row)
                                                        <option value="{{ $row->id }}"@if(isset($pro->id) && $pro->id==$row->id) selected @endif>{{ $row->day }} {{ $row->day_parts }} {{ substr($row->rang_start,0,5) }} ~ {{ substr($row->rang_end,0,5) }} (剩餘 {{$row->sites}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group boat">
                                                <label class="control-label col-sm-4">Boat for ONE 單人船票</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="boat" @if(isset($pro->id)) disabled @endif>
                                                        @foreach($boat as $row)
                                                        <option value="{{ $row->id }}"@if(isset($pro->id) && $pro->id==$row->id) selected @endif>{{ $row->day }} {{ $row->day_parts }} {{ substr($row->rang_start,0,5) }} ~ {{ substr($row->rang_end,0,5) }} (剩餘 {{$row->sites}})</option>
                                                        @endforeach
                                                    </select>
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
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="tel" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">EMail</label>
                                                <div class="col-sm-8">
                                                    <input type="email" class="form-control" name="email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">人數</label>
                                                <div class="col-sm-8">
                                                    <select name="people" id="pople" class="form-control" data-cash="{{ $pro->cash ?? 0 }}">
                                                        @for($i=1;$i<37;$i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">素食</label>
                                                <div class="col-sm-8">
                                                    <select name="vegetarian" id="vegetarian" class="form-control">
                                                        @for($i=0;$i<37;$i++)
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

                                            <div class="form-group">
                                                <label class="control-label col-sm-4">XLS顯示</label>
                                                <div class="col-sm-8">
                                                    <select name="edit_type" class="form-control">
                                                        <option value="後台編輯">後台編輯</option>
                                                        <option value="藍新快速">藍新快速</option>
                                                        <option value="自行匯款">自行匯款</option>
                                                        <option value="公關位">公關位</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">金額</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control" name="money" id="money" required>
                                                    <small id="tipbox" class="text-warning"></small>
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
$('#pople').bind('change',function(){
    let people = $(this).val();
    let cash = $(this).data('cash');
    let money = Math.round(parseInt(cash) * parseInt(people) * 1.1);
    $('#tipbox').text("單人金額:"+cash + " X 1 X 10%服務費 = " + Math.round(parseInt(cash) * 1.1) + '如新增套票須自行計算');
    $('#money').val(money);
});
$('select[name=ticket_type]').bind('change',function(){
    var val = $(this).val()
    $('.boat,.train,.flight').hide();
    if(val == 'boat'){ $('.boat').show(); }
    if(val == 'train'){ $('.train').show(); }
    if(val == 'flight'){ $('.flight').show(); }
    if(val == 'A'){ $('.train,.flight').show(); }
    if(val == 'B'){ $('.boat,.train,.flight').show(); }
});
$('select[name=ticket_type]').trigger('change');
        });



        </script>



    </body>
</html>