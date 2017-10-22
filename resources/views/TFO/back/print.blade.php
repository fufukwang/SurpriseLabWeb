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
                                        <div class="btn-group focus-btn-group"><form action="/TableForOne/print" id="SearchForm">

                                            <div class="form-group col-sm-2">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="yyyy-mm-dd" name="day" id="datepicker-autoclose" value="{{ $request->day or ''}}">
                                                        <span class="input-group-addon bg-primary b-0 text-white"><i class="ion-calendar"></i></span>
                                                    </div><!-- input-group -->
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <select name="paystatus" class="form-control">
                                                    <option value="">付款狀態</option>
                                                    <option value="已付款"@if(isset($request->paystatus) && $request->paystatus=='已付款') selected @endif>已付款</option>
                                                    <option value="未完成"@if(isset($request->paystatus) && $request->paystatus=='未完成') selected @endif>未完成</option>
                                                    <option value="取消訂位"@if(isset($request->paystatus) && $request->paystatus=='取消訂位') selected @endif>取消訂位</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <select name="dayparts" class="form-control">
                                                    <option value="">時段</option>
                                                    <option value="午餐"@if(isset($request->dayparts) && $request->dayparts=='午餐') selected @endif>午餐</option>
                                                    <option value="下午茶"@if(isset($request->dayparts) && $request->dayparts=='下午茶') selected @endif>下午茶</option>
                                                    <option value="晚餐"@if(isset($request->dayparts) && $request->dayparts=='晚餐') selected @endif>晚餐</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <select name="paytype" class="form-control">
                                                    <option value="">付款類型</option>
                                                    <option value="禮物卡"@if(isset($request->paytype) && $request->paytype=='禮物卡') selected @endif>禮物卡</option>
                                                    <option value="信用卡"@if(isset($request->paytype) && $request->paytype=='信用卡') selected @endif>信用卡</option>
                                                    <option value="現場付款"@if(isset($request->paytype) && $request->paytype=='現場付款') selected @endif>現場付款</option>
                                                    <option value="後台編輯"@if(isset($request->paytype) && $request->paytype=='後台編輯') selected @endif>後台編輯</option>
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
                                            <div class="form-group col-sm-2">
                                                <input type="text" name="search" placeholder="搜尋姓名、電話、信箱" class="form-control" value="{{ $request->search or ''}}">
                                            </div>
 
                                            <div class="form-group col-sm-1">
                                                <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> 搜尋</button>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <button type="button" class="btn btn-primary" id="grTable"><span class="glyphicon glyphicon-search"></span> 產生列印表格</button>
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
                                                <th>禮物卡</th>
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
                                                <td>@if($row->meal=='V')素@else 葷@endif <br >{{ $row->item }}</td>
                                                <td class="@if($row->paystatus=='已付款')success @elseif($row->paystatus=='未完成')danger @elseif($row->paystatus=='取消訂位')warning @endif">{{ $row->paytype }} / {{ $row->paystatus }}</td>
                                                <td style="word-break: break-all;max-width: 200px;">{{ $row->notes }}</td>
                                                <td></td>
                                                <td>{{ $row->manage }}</td>
                                                
                                                <td class="actions">
                                                    <a class="btn btn-primary btn-xs" href="/TableForOne/order/{{ $row->id }}/edit?{{ Request::getQueryString() }}"><i class="fa fa-pencil"></i></a>
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
        <!--
<link href="/backstage/plugins/switchery/switchery.min.css" rel="stylesheet" />
<script src="/backstage/plugins/switchery/switchery.min.js"></script>
    -->


        <script src="/backstage/js/jquery.core.js"></script>
        <script src="/backstage/js/jquery.app.js"></script>

        <script>


$(function(){
    $('.btn-danger').bind('click',function(){
        var id = $(this).data('id');
        if(confirm("確定要刪除此訂單")) {
             $.ajax({
                url: '/TableForOne/order/'+id+'/delete',
                method: 'delete',
                dataType:'json'
            }).done(function(data){
                swal(data.message);
                $('#tr_'+id).remove();
            });
        }
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

});
function submitSearchForm(){
    $('#SearchForm').attr('target','_blank')
    $('#SearchForm').attr('action','/TableForOne/table')
    $('#SearchForm').submit();
    $('#SearchForm').attr('target','_top');
    $('#SearchForm').attr('action','/TableForOne/print');
}
@if(Session::has('message')) alert('{{ Session::get('message') }}'); @endif
		</script>


    </body>
</html>

