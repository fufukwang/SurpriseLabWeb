@include('backstage.header')
<!-- =======================
===== START PAGE ======
======================= -->

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <!--div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">活動編輯</h4>
                    </div>
                </div-->
                <!-- Page-Title -->



                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h4 class="m-t-0 header-title"><b>建立營業日</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                        建立營業日期範圍與價格.
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-8">

                                    <div class="p-20">
                                        <form  data-parsley-validate novalidate method="post" action="/TableForOne/room/{{ $pro->id or 0}}/update" class="form-horizontal">
{!! csrf_field() !!}


                                            <div class="form-group">
                                                <label class="control-label col-sm-4">範圍</label>
                                                <div class="col-sm-8">
@if(isset($pro->id) && $pro->id>0)
<input name="day" type="text" class="form-control" placeholder="yyyy-mm-dd" value="{{ $pro->day  }}">
@else
<input name="dayrange" type="text" class="form-control" placeholder="yyyy-mm-dd">
<input type="hidden" name="daystart">
<input type="hidden" name="dayend">
@endif

                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-sm-4">座位數</label>
                                                <div class="col-sm-8" style="padding:0 10px;">
                                                    <input type="text" value="{{ $pro->sites or 0 }}" name="sites" data-bts-min="0" data-bts-max="100" data-bts-step="1" data-bts-decimal="0" data-bts-step-interval="100" data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500" data-bts-booster="true" data-bts-boostat="10" data-bts-max-boosted-step="false" data-bts-mousewheel="true" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-4">時段</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="dayparts">
                                                        <option value="午餐" data-rangstart='11:00' data-rangend='13:00'@if(isset($pro->dayparts) && $pro->dayparts=='午餐') selected @endif>午餐</option>
                                                        <option value="晚餐" data-rangstart='14:00' data-rangend='16:00'@if(isset($pro->dayparts) && $pro->dayparts=='晚餐') selected @endif>晚餐</option>
                                                        <option value="下午茶" data-rangstart='18:00' data-rangend='20:00'@if(isset($pro->dayparts) && $pro->dayparts=='下午茶') selected @endif>下午茶</option>
                                                    </select>
                                                </div>
                                            </div>
@if(isset($pro->id) && $pro->id>0)
                                            <label class="control-label col-sm-4">區間</label>
                                            <div class="col-sm-4">
                                                <div class="input-group m-b-15">
                                                    <div class="bootstrap-timepicker">
                                                        <input name="rangstart" type="text" value="{{ $pro->rangstart or '' }}" class="form-control timepicker">
                                                    </div>
                                                    <span class="input-group-addon bg-primary b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
                                                </div><!-- input-group -->
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="input-group m-b-15">
                                                    <div class="bootstrap-timepicker">
                                                        <input name="rangend" type="text" value="{{ $pro->rangend or '' }}" class="form-control timepicker">
                                                    </div>
                                                    <span class="input-group-addon bg-primary b-0 text-white"><i class="glyphicon glyphicon-time"></i></span>
                                                </div><!-- input-group -->
                                            </div>
@else
                                        <div class="form-group" id="rangebox">





                                        </div>
@endif

                                            <div class="form-group">
                                                <label class="control-label col-sm-4">定價</label>
                                                <div class="col-sm-8" style="padding:0 10px;">
                                                    <input type="text" value="{{ $pro->money or 0 }}" name="money" data-bts-min="0" data-bts-max="5000" data-bts-step="1" data-bts-decimal="0" data-bts-step-interval="100" data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500" data-bts-booster="true" data-bts-boostat="10" data-bts-max-boosted-step="false" data-bts-mousewheel="true" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">+佐餐飲</label>
                                                <div class="col-sm-8" style="padding:0 10px;">
                                                    <input type="text" value="{{ $pro->wine or 0 }}" name="wine" data-bts-min="0" data-bts-max="5000" data-bts-step="1" data-bts-decimal="0" data-bts-step-interval="100" data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500" data-bts-booster="true" data-bts-boostat="10" data-bts-max-boosted-step="false" data-bts-mousewheel="true" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">開放訂位</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="open">
                                                        <option value="0"@if(isset($pro->open) && $pro->open<=0) selected @endif>關閉</option>
                                                        <option value="1"@if(isset($pro->open) && $pro->open>0) selected @endif>開放</option>
                                                    </select>
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
            // Time Picker
            $('.timepicker').timepicker({ showMeridian : false});
            $("input[name='sites'],input[name='money'],input[name='wine']").TouchSpin();



$('input[name="dayrange"]').daterangepicker({
        locale: {
          format: 'YYYY-MM-DD'
        },
        startDate: '{{ Carbon\Carbon::today()->format('Y-m-d H:i:s') }}',
        endDate: '{{ Carbon\Carbon::today()->format('Y-m-d H:i:s') }}',
        minDate:'{{ Carbon\Carbon::today()->format('Y-m-d') }}',
        maxDate:'{{ config('setting.tfoend') }}',
    }, 
    function(start, end, label) {
        $('input[name=daystart]').val(start.format('YYYY-MM-DD') );
        $('input[name=dayend]').val(end.format('YYYY-MM-DD') );
        //alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });

$("#datepicker").datetimepicker({
    "format": "YYYY-MM-DD",
    "minDate":'{{ Carbon\Carbon::today()->format('Y-m-d') }}',
    "maxDate":'{{ config('setting.tfoend') }}',
});
$('select[name=dayparts]').bind('change',function(){
    //$('input[name=rangstart]').val($(this).find('option:selected').data('rangstart'));
    //$('input[name=rangend]').val($(this).find('option:selected').data('rangend'));
    
});

@if(isset($pro->id) && $pro->id>0)
@else

$('#rangebox').on('click','.btn-info',function(){
    $(this).removeClass('btn-info');
    $(this).addClass('btn-danger');
    var $i = $(this).find('.fa-plus');
    $i.removeClass('fa-plus');
    $i.addClass('fa-minus');
    var rand = getRand(0,99999);
    var html = addHtml(rand);
    $('#rangebox').append(html);
    $('.timepicker').timepicker({ showMeridian : false});
});
$('#rangebox').on('click','.btn-danger',function(){
    var id = $(this).data('id');
    $('.ro-'+id).remove();
});

$('#rangebox').append(addHtml(getRand(0,99999)));
$('.timepicker').timepicker({ showMeridian : false});
@endif
        });

function addHtml(rand){
    return '<label class="control-label col-sm-4 ro-'+rand+'"">區間</label><div class="col-sm-3 ro-'+rand+'"><div class="input-group m-b-15"><div class="bootstrap-timepicker"><input name="rangstart[]" type="text" class="form-control timepicker"></div><span class="input-group-addon bg-primary b-0 text-white"><i class="glyphicon glyphicon-time"></i></span></div></div><div class="col-sm-3 ro-'+rand+'"><div class="input-group m-b-15"><div class="bootstrap-timepicker"><input name="rangend[]" type="text" class="form-control timepicker"></div><span class="input-group-addon bg-primary b-0 text-white"><i class="glyphicon glyphicon-time"></i></span></div></div><label class="control-label col-sm-2 ro-'+rand+'"><button type="button" class="btn btn-info btn-xs" data-id="'+rand+'"><i class="fa fa-plus"></i></button></label>'
}
function getRand(min,max) {
    return Math.floor(Math.random()*(max-min+1)+min);
}

        </script>



    </body>
</html>