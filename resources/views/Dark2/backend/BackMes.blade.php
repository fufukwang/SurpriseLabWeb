@include('backstage.header')
<!-- =======================
             ===== START PAGE ======
             ======================= -->

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">貝殼的文件 </h4>
                    </div>
                </div>
                <!-- Page-Title -->
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="table-rep-plugin">
                                <div class="table-wrapper">
                                    <div class="btn-toolbar">
                                        <div class="btn-group focus-btn-group" style="width: 100%"><form action="/dark2/backmes">

                                            <div class="form-group col-sm-2">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="搜尋" name="search" id="datepicker-autoclose" value="{{ $request->search or ''}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <label><input type="checkbox" name="isdone" value="1" @if($request->isdone) checked @endif>未兌換</label>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <select name="season" class="form-control">
                                                    <option value="">選擇</option>
                                                    <option value="1"@if($request->season==1) selected @endif>18夏之季</option>
                                                    <option value="2"@if($request->season==2) selected @endif>18秋之季</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> 搜尋</button>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <a target="_blank" href="/dark2/backmenouse/xls" class="btn btn-danger">匯出未兌換名單</a>
                                            </div>

                                        </form></div>
                                    </div><div class="table-responsive" data-pattern="priority-columns">
                                    <div class="sticky-table-header fixed-solution" style="width: auto;"><table id="tech-companies-1-clone" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>流水號</th>
                                                <th>姓名</th>
                                                <th>訂購內容</th>
                                                <th>電話 / 信箱</th>
                                                <th>酷碰</th>
                                                <th>註記</th>
                                                <th>寄送狀態</th>
                                                <th>功能</th>
                                            </tr>
                                        </thead>
                                        <tbody>
@forelse ($mes as $row)
                                            <tr id="tr_{{ $row->id }}">
                                                <td>{{ $row->id }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->detail }}</td>
                                                <td>{{ $row->tel }} <br /> {{ $row->email }}</td>
                                                <td>@forelse(App\model\d2coupon::where('xls_id',$row->id)->get() as $coup){{ $coup->code }}@if($coup->wine) (含調飲) @endif @if($coup->order_id>0) <a href="javascript:;" class="canelCoupon" data-id="{{ $row->id }}" data-code="{{ $coup->code }}"><i class="fa fa-times"></i></a> @endif<br >@empty 無優惠券 @endforelse</td>
                                                <td class="editable" style="border:1px solid #eee" data-id="{{ $row->id }}" contenteditable="true">{!! $row->manage !!}</td>
                                                <td><input type="checkbox" class="sendbox" value="{{ $row->id }}" @if($row->is_sent)checked @endif /></td>
                                                <td class="actions">
                                                    <a href="javascript:;" class="btn btn-primary btn-xs sent_mail" data-id="{{ $row->id }}">寄送優惠券</a>
                                                </td>
                                            </tr>
@empty
<tr><td colspan="7" align="center">尚無資料</td></tr>
@endforelse
                                        </tbody>
                                    </table>


                                    <div class="text-align-center">{{ $mes->appends(['search' => $request->search,'isdone'=>$request->isdone,'season'=>$request->season])->links() }}</div>
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
        <!-- Notification js -->
        <script src="/backstage/plugins/notifyjs/dist/notify.min.js"></script>
        <script src="/backstage/plugins/notifications/notify-metro.js"></script>

        <script>
        $('#datatable').dataTable();
			//$('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
$(function(){
    /*
    $('.btn-danger').bind('click',function(){
        var id = $(this).data('id');
        if(confirm("確定要刪除此留言?")) {
             $.ajax({
                url: '/dark2/contact/'+id+'/delete',
                method: 'delete',
                dataType:'json'
            }).done(function(data){
                swal(data.message);
                $('#tr_'+id).remove();
            });
        }
    });*/


    $('.canelCoupon').bind('click',function(){
        var id   = $(this).data('id');
        var code = $(this).data('code');
        if(confirm("確定要移除此優惠碼的使用紀錄?!(此動作無法復原)")) {
            $.post('/dark2/backmes/CanelCoupon',{
                xls_id : id,
                code   : code,
            },function(data){
                $('.canelCoupon[data-id="'+id+'"]').remove();
                $.Notification.notify('success','bottom left','已更新', '備註已更新')
            },'json');
        }
    });

    $('.editable').bind('blur',function(){
        var val = $(this).html();
        var id  = $(this).data('id');
        $.post('/dark2/backmes/'+id+'/sendManageUpdate',{
            manage : val
        },function(data){
            $.Notification.notify('success','bottom left','已更新', '備註已更新')
        },'json');
    });
    $('.sendbox').bind('click',function(){
        var send = $(this).prop('checked');
        var id   = $(this).val();
        $.post('/dark2/backmes/'+id+'/sendUpdate',{
            send : (send ? 1 : 0)
        },function(data){
            $.Notification.notify('success','bottom left','已更新', '發送狀態已更新')
        },'json');
    });
    $('.sent_mail').bind('click',function(){
        var id   = $(this).data('id');
        $.post('/dark2/backmes/'+id+'/sentcoupon',{},function(data){
            if(data.message == 'success'){
                $('.sendbox[value="'+id+'"]').prop('checked',true);
                $.Notification.notify('success','bottom left','已更新', '發送狀態已更新');
            } else {
                $('.sendbox[value="'+id+'"]').prop('checked',false);
                $.Notification.notify('error','bottom left','錯誤', '寄信失敗');
            }
        },'json');
    });

});
@if(Session::has('message')) alert('{{ Session::get('message') }}'); @endif
		</script>


    </body>
</html>

