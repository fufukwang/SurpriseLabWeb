@include('backstage.header')
<!-- =======================
             ===== START PAGE ======
             ======================= -->

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">訂單 </h4>
                    </div>
                </div>
                <!-- Page-Title -->
                
                

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">


                            <div class="table-rep-plugin">
                                <div class="table-wrapper">
                                    <div class="btn-toolbar">
                                        <div class="btn-group focus-btn-group"><form action="/dark2/print" id="SearchForm">

                                            <div class="form-group col-sm-2">
                                                <div class="col-sm-12">
<input name="dayrange" type="text" class="form-control" placeholder="yyyy-mm-dd">
<input type="hidden" name="daystart" value="{{ $request->daystart or Carbon\Carbon::today()->format('Y-m-d H:i:s')}}">
<input type="hidden" name="dayend" value="{{ $request->dayend or Carbon\Carbon::today()->format('Y-m-d H:i:s')}}">
                                                    <!--div class="input-group">






                                                        <input type="text" class="form-control" placeholder="yyyy-mm-dd" name="day" id="datepicker-autoclose" value="{{ $request->day or ''}}">
                                                        <span class="input-group-addon bg-primary b-0 text-white"><i class="ion-calendar"></i></span>
                                                    </div--><!-- input-group -->
                                                </div>
                                                <div class="col-sm-12">不搜尋日期
<label><input type="radio" name="srday" value="1"@if($request->srday==1) checked @endif>是</label>
<label><input type="radio" name="srday" value="0"@if($request->srday!=1) checked @endif>否</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <select name="pay_status" class="form-control">
                                                    <option value="">狀態</option>
                                                    <option value="已預約"@if(isset($request->pay_status) && $request->pay_status=='已預約') selected @endif>已預約</option>
                                                    <option value="已付款"@if(isset($request->pay_status) && $request->pay_status=='已付款') selected @endif>已付款</option>
                                                    <option value="未完成"@if(isset($request->pay_status) && $request->pay_status=='未完成') selected @endif>未完成</option>
                                                    <option value="取消訂位"@if(isset($request->pay_status) && $request->pay_status=='取消訂位') selected @endif>取消訂位</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <select name="dayparts" class="form-control">
                                                    <option value="">時段</option>
                                                    <option value="午餐"@if(isset($request->dayparts) && $request->dayparts=='午餐') selected @endif>午餐</option>
                                                    <option value="下午茶"@if(isset($request->dayparts) && $request->dayparts=='下午茶') selected @endif>下午茶</option>
                                                    <option value="晚餐"@if(isset($request->dayparts) && $request->dayparts=='晚餐') selected @endif>晚餐</option>
                                                    <option value="特別活動"@if(isset($request->dayparts) && $request->dayparts=='特別活動') selected @endif>特別活動</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <select name="pay_type" class="form-control">
                                                    <option value="">付款類型</option>
                                                    <option value="信用卡"@if(isset($request->pay_type) && $request->pay_type=='信用卡') selected @endif>信用卡</option>
                                                    <option value="現場付款"@if(isset($request->pay_type) && $request->pay_type=='現場付款') selected @endif>現場付款</option>
                                                    <option value="後台編輯"@if(isset($request->pay_type) && $request->pay_type=='後台編輯') selected @endif>後台編輯</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <select name="order" class="form-control">
                                                    <option value="">排序(預設為修改時間反序)</option>
                                                    <option value="rangstart|asc"@if(isset($request->order) && $request->order=='rangstart|asc') selected @endif>開始時間正序</option>
                                                    <option value="rangstart|desc"@if(isset($request->order) && $request->order=='rangstart|desc') selected @endif>開始時間反序</option>
                                                    <option value="created_at|desc"@if(isset($request->order) && $request->order=='created_at|desc') selected @endif>訂單時間反序</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <input type="text" name="search" placeholder="搜尋姓名、電話、信箱" class="form-control" value="{{ $request->search or ''}}">
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <input type="text" name="code" placeholder="優惠碼(需較長時間)" class="form-control" value="{{ $request->code or ''}}">
                                            </div>
 
                                            <div class="form-group col-sm-1">
                                                <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> 搜尋</button>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <button type="button" class="btn btn-primary" id="grTable"><span class="glyphicon glyphicon-search"></span> 產生列印表格</button>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <button type="button" class="btn btn-warning" id="exportXls">匯出XLS</button>
                                            </div>

                                        </form></div>
                                    </div><div class="table-responsive" data-pattern="priority-columns">
                                    <div class="sticky-table-header fixed-solution"><table id="datatable-buttons" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>序號</th>
                                                <th>場次</th>
                                                <th>姓名</th>
                                                <th>資訊</th>
                                                <th>主餐</th>
                                                <th>付款狀態</th>
                                                <th>餐飲備註</th>
                                                <th>優惠券</th>
                                                <th>註記</th>
                                                <th data-orderable="false">功能</th>
                                            </tr>
                                        </thead>
                                        <tbody>
@forelse ($order as $row)
                                            <tr id="tr_{{ $row->id }}">
                                                <td>{{ $row->sn }}</td>
                                                <td>{{ $row->day }}<br />{{ $row->dayparts }}<br />{{ substr($row->rangstart,0,5) }} ~ {{ substr($row->rangend,0,5) }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>phone:{{ $row->tel }}<br />email:{{ $row->email }}<br />{{ $row->created_at }}</td>
                                                <td>{{ implode('/',json_decode($row->meat,true)) }}</td>
                                                <td class="@if($row->pay_status=='已付款')success @elseif($row->pay_status=='未完成')danger @elseif($row->pay_status=='取消訂位')warning @endif">{{ $row->pay_type }} / {{ $row->pay_status }}</td>
                                                <td style="word-break: break-all;max-width: 200px;">{{ $row->notes }}</td>
                                                <th>@forelse(App\model\d2coupon::where('order_id',$row->sn)->get() as $coup){{ $coup->code }}@if($coup->wine) (含調飲) @endif [{{App\model\d2xls::select('money')->find($coup->xls_id)->money}}]<br >@empty 
@if($row->pay_type == '信用卡') 刷卡付費[{{ $row->OM }}] @else 無使用優惠券 @endif @endforelse</th>
                                                <td>{{ $row->manage }}</td>
                                                <td class="actions">
                                                    <a class="btn btn-primary btn-xs resent" href="javascript:;" data-name="{{ $row->name }}" data-email="{{ $row->email }}" data-id="{{ $row->pro_id }}" data-pople="{{ $row->pople }}"><i class="fa fa-envelope"></i></a>
                                                    <a class="btn btn-primary btn-xs" href="/dark2/order/{{ $row->id }}/edit?{{ Request::getQueryString() }}"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-xs" href="javascript:;" data-id={{ $row->id }}><i class="fa fa-remove"></i></a>
                                                </td>
                                            </tr>
@empty
<tr><td colspan="10" align="center">尚無資料</td></tr>
@endforelse



                                        </tbody>
                                    </table>

                                    <div align="center">{{ $order->appends(Request::capture()->except('page'))->links() }}</div>
                                </div></div>

                            </div>
                            
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="/dark2/xls/emaildata/output" class="btn btn-warning">下載成功付款的 EMail 名單</a>
                                    <span style="font-size: 12px;color:red;"><br>需要較多的伺服器資源.請在離峰時刻使用</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>






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
<link href="/backstage/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
<script src="/backstage/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<link href="/backstage/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
<!-- Examples -->
	    <script src="/backstage/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
	    <!--script src="/backstage/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>
	    <script src="/backstage/plugins/datatables/dataTables.bootstrap.js"></script>
	    <script src="/backstage/plugins/tiny-editable/mindmup-editabletable.js"></script>
	    <script src="/backstage/plugins/tiny-editable/numeric-input-example.js"></script-->


        <script src="/backstage/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/backstage/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="/backstage/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="/backstage/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="/backstage/plugins/datatables/jszip.min.js"></script>
        <script src="/backstage/plugins/datatables/pdfmake.min.js"></script>
        <script src="/backstage/plugins/datatables/vfs_fonts.js"></script>
        <script src="/backstage/plugins/datatables/buttons.html5.min.js"></script>
        <script src="/backstage/plugins/datatables/buttons.print.min.js"></script>
        <script src="/backstage/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="/backstage/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="/backstage/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="/backstage/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="/backstage/plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="/backstage/plugins/sweetalert/dist/sweetalert.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
        <!--
<link href="/backstage/plugins/switchery/switchery.min.css" rel="stylesheet" />
<script src="/backstage/plugins/switchery/switchery.min.js"></script>
    -->


        <script src="/backstage/js/jquery.core.js"></script>
        <script src="/backstage/js/jquery.app.js"></script>
        <!-- Notification js -->
        <script src="/backstage/plugins/notifyjs/dist/notify.min.js"></script>
        <script src="/backstage/plugins/notifications/notify-metro.js"></script>
        <script>


$(function(){
    $('input[name="dayrange"]').daterangepicker({
        locale: {
          format: 'YYYY-MM-DD'
        },
        startDate: '{{ $request->daystart or Carbon\Carbon::today()->format('Y-m-d H:i:s')}}',
        endDate: '{{ $request->dayend or Carbon\Carbon::today()->format('Y-m-d H:i:s')}}',
        minDate:moment().add(-1, 'y').format('YYYY-MM-DD'),
        maxDate:moment().add(6, 'M').format('YYYY-MM-DD'),
    }, 
    function(start, end, label) {
        $('input[name=daystart]').val(start.format('YYYY-MM-DD') );
        $('input[name=dayend]').val(end.format('YYYY-MM-DD') );
        //alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
    $('.btn-danger').bind('click',function(){
        var id = $(this).data('id');
        if(confirm("確定要刪除此訂單")) {
             $.ajax({
                url: '/dark2/order/'+id+'/delete',
                method: 'delete',
                dataType:'json'
            }).done(function(data){
                swal(data.message);
                $('#tr_'+id).remove();
            });
        }
    });
    $('.resent').bind('click',function(){
        var name  = $(this).data('name');
        var email = $(this).data('email');
        var id    = $(this).data('id');
        var pople = $(this).data('pople');
        $.post('/dark2/order/'+id+'/resent',{
            name  : name,
            email : email,
            pople : pople
        },function(data){
            $.Notification.notify('success','bottom left','已重發', '信件已重新發送');
        },'json');
    });


    jQuery('#datepicker-autoclose').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });


    $('#grTable').bind('click',function(){
        var day      = $('input[name=day]').val();
        var dayparts = $('select[name=dayparts]').val();
        if(day == '' || dayparts == ''){
            console.log('test');
            if(confirm("尚未選擇日期或時段確定要產生此表格?!")){
                submitSearchForm();
            }
        } else {
            submitSearchForm();
        }
       
    });
    $('#exportXls').bind('click',function(){
        var day      = $('input[name=day]').val();
        if(day == ''){
            alert('請選擇日期');
        } else {
            submitXLSForm();
        }
    })

});
function submitXLSForm(){
    $('#SearchForm').attr('target','_blank')
    $('#SearchForm').attr('action','/dark2/xls/data/output')
    $('#SearchForm').submit();
    $('#SearchForm').attr('target','_top');
    $('#SearchForm').attr('action','/dark2/print');
}
function submitSearchForm(){
    $('#SearchForm').attr('target','_blank')
    $('#SearchForm').attr('action','/dark2/table')
    $('#SearchForm').submit();
    $('#SearchForm').attr('target','_top');
    $('#SearchForm').attr('action','/dark2/print');
}
@if(Session::has('message')) alert('{{ Session::get('message') }}'); @endif
		</script>


    </body>
</html>

