@include('backstage.header')
<!-- =======================
             ===== START PAGE ======
             ======================= -->

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">營業日 <a href="/TableForOne/room/0/edit" class="btn btn-primary waves-effect waves-light">新增營業日 <i class="fa fa-plus"></i></a></h4>
                    </div>
                </div>
                <!-- Page-Title -->
                
                

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">


                            <div class="table-rep-plugin">
                                <div class="table-wrapper">
                                    <div class="btn-toolbar">
                                        <div class="btn-group focus-btn-group"><form action="/TableForOne/rooms">

                                            <div class="form-group col-sm-2">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="yyyy-mm-dd" name="day" id="datepicker-autoclose" value="{{ $request->day or ''}}">
                                                        <span class="input-group-addon bg-primary b-0 text-white"><i class="ion-calendar"></i></span>
                                                    </div><!-- input-group -->
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <select name="dayparts" class="form-control">
                                                    <option value="">全部</option>
                                                    <option value="午餐"@if(isset($request->dayparts) && $request->dayparts=='午餐') selected @endif>午餐</option>
                                                    <option value="晚餐"@if(isset($request->dayparts) && $request->dayparts=='晚餐') selected @endif>晚餐</option>
                                                    <option value="下午茶"@if(isset($request->dayparts) && $request->dayparts=='下午茶') selected @endif>下午茶</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <select name="order" class="form-control">
                                                    <option value="">排序(預設為修改時間反序)</option>
                                                    <option value="day|asc"@if(isset($request->order) && $request->order=='day|asc') selected @endif>日期正序</option>
                                                    <option value="day|desc"@if(isset($request->order) && $request->order=='day|desc') selected @endif>日期反序</option>
                                                </select>
                                            </div>

                                            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> 搜尋</button>


                                        </form></div>
                                    </div><div class="table-responsive" data-pattern="priority-columns">
                                    <div class="sticky-table-header fixed-solution" style="width: auto;">
                                    <form method="post" id="openForm">
                                    {!! csrf_field() !!}
                                    <table id="tech-companies-1-clone" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="checkAll"></th>
                                                <th>開放訂位</th>
                                                <th>營業日期</th>
                                                <th>營業時段</th>
                                                <th>目前訂位 / 開放位置</th>
                                                <th>金額 / +佐餐飲<br />現場價</th>
                                                <th>功能</th>
                                            </tr>
                                        </thead>
                                        <tbody>
@forelse ($pros as $row)
                                            <tr id="tr_{{ $row->id }}">
                                                <td><input type="checkbox" name="id[]" value="{{ $row->id }}"></td>
                                                <td>@if($row->open>0) 開放中 @else 關閉中 @endif</td>
                                                <td>{{ $row->day }}</td>
                                                <td>{{ $row->dayparts }}<br />{{ substr($row->rangstart,0,5) }} ~ {{ substr($row->rangend,0,5) }}</td>
                                                <td>{{ App\model\TFOOrder::where('paystatus','已付款')->where('tfopro_id',$row->id)->count('id') }} / {{ $row->sites }}</td>
                                                <td>{{ $row->money }} / {{ $row->wine }}<br />{{ $row->cash_money }} / {{ $row->cash_wine }}</td>
                                                <td class="actions">
                                                    <a class="btn btn-purple btn-xs" href="/TableForOne/order/{{ $row->id }}/appointment">預約席</a>
                                                    <a class="btn btn-info btn-xs" href="/TableForOne/orders/{{ $row->id }}"><i class="fa fa-list-alt"></i></a>
                                                    <a class="btn btn-primary btn-xs" href="/TableForOne/room/{{ $row->id }}/edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-xs" href="javascript:;" data-id={{ $row->id }}><i class="fa fa-remove"></i></a>
                                                </td>
                                            </tr>
@empty
<tr><td colspan="7" align="center">尚無資料</td></tr>
@endforelse
                                        </tbody>
                                    </table>
                                    <div><button class="btn btn-primary">開放前台定位</button></div>
                                    </form>

                                    <div align="center">{{ $pros->appends(Request::capture()->except('page'))->links() }}</div>
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
	    <script src="/backstage/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>
	    <script src="/backstage/plugins/datatables/dataTables.bootstrap.js"></script>
	    <script src="/backstage/plugins/tiny-editable/mindmup-editabletable.js"></script>
	    <script src="/backstage/plugins/tiny-editable/numeric-input-example.js"></script>

	    <script src="/backstage/pages/datatables.editable.init.js"></script>
        <script src="/backstage/plugins/sweetalert/dist/sweetalert.min.js"></script>


        <script src="/backstage/js/jquery.core.js"></script>
        <script src="/backstage/js/jquery.app.js"></script>

        <script>
        $('#datatable').dataTable();
			//$('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
$(function(){
    $('.btn-danger').bind('click',function(){
        var id = $(this).data('id');
        if(confirm("確定要刪除此營業日?如有訂單將一併刪除")) {
             $.ajax({
                url: '/TableForOne/room/'+id+'/delete',
                method: 'delete',
                dataType:'json'
            }).done(function(data){
                swal(data.message);
                $('#tr_'+id).remove();
            });
        }
    });
    $('#checkAll').bind('click',function(){
        $('input[name="id[]"]').prop('checked',$(this).prop('checked'));
    });
    jQuery('#datepicker-autoclose').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });

});
@if(Session::has('message')) alert('{{ Session::get('message') }}'); @endif
		</script>


    </body>
</html>

