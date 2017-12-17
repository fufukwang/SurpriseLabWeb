@include('backstage.header')
<!-- =======================
             ===== START PAGE ======
             ======================= -->

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">禮物卡 <a href="/TableForOne/gift/0/edit" class="btn btn-primary waves-effect waves-light">新增禮物卡 <i class="fa fa-plus"></i></a></h4>
                    </div>
                </div>
                <!-- Page-Title -->
                
                

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">


                            <div class="table-rep-plugin">
                                <div class="table-wrapper">
                                    <div class="btn-toolbar">
                                        <div class="btn-group focus-btn-group"><form action="/TableForOne/gifts" id="SearchForm">

                                            <div class="form-group col-sm-2">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="yyyy-mm-dd" name="day" id="datepicker-autoclose" value="{{ $request->day or ''}}">
                                                        <span class="input-group-addon bg-primary b-0 text-white"><i class="ion-calendar"></i></span>
                                                    </div><!-- input-group -->
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="搜尋" name="search" id="datepicker-autoclose" value="{{ $request->search or ''}}">
                                                    </div><!-- input-group -->
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> 搜尋</button>&nbsp;
                                            <button type="button" class="btn btn-info" onclick="submitSearchForm();" style="margin-left: 10px;"><span class="glyphicon glyphicon-print"></span> 列印</button>


                                        </form></div>
                                    </div><div class="table-responsive" data-pattern="priority-columns">
                                    <div class="sticky-table-header fixed-solution" style="width: auto;"><table id="tech-companies-1-clone" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>序號</th>
                                                <th>訂單時間</th>
                                                <th>購買人姓名</th>
                                                <th>購買人電話</th>
                                                <th>購買人EMail</th>
                                                <th>收禮人姓名</th>
                                                <th>收禮人電話</th>
                                                <th>寄送方式</th>
                                                <th>Code</th>
                                                <th>兌換日期</th>
                                                <th>付款狀態</th>
                                                <th>寄送</th>
                                                <th>註記</th>
                                                <th>功能</th>
                                            </tr>
                                        </thead>
                                        <tbody>
@forelse ($gifts as $row)
                                            <tr id="tr_{{ $row->id }}">
                                                <td>{{ $row->sn }}</td>
                                                <td>{{ $row->created_at }}</td>
                                                <td>{{ $row->bname }}</td>
                                                <td>{{ $row->btel }}</td>
                                                <td>{{ $row->bemail }}</td>
                                                <td>{{ $row->rname }}</td>
                                                <td>{{ $row->rtel }}</td>
                                                <td>{{ $row->sendtype }}</td>
                                                <td>{{ $row->code }}</td>
                                                <td>@if($row->tfoorder_id > 0) 
                                                    {{ App\model\TFOOrder::find($row->tfoorder_id)->created_at }}
                                                @endif</td>
                                                <td class="@if($row->paystatus==1)success @elseif($row->paystatus==-1) warning @else danger @endif">@if($row->admin>0) 後台新增 @else 前台付款 @endif / @if($row->paystatus==1) 已付款 @elseif($row->paystatus==-1) 已取消 @else 未付款 @endif</td>
                                                <td><input type="checkbox" class="sendbox" value="{{ $row->id }}" @if($row->send)checked @endif /></td>
                                                <td>{{ $row->manage }}</td>
                                                <td class="actions">
                                                    <a class="btn btn-primary btn-xs" href="/TableForOne/gift/{{ $row->id }}/edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-xs" href="javascript:;" data-id={{ $row->id }}><i class="fa fa-remove"></i></a>
                                                </td>
                                            </tr>
@empty
<tr><td colspan="13" align="center">尚無資料</td></tr>
@endforelse
                                        </tbody>
                                    </table>


                                    <div class="text-align-center">{{ $gifts->links() }}</div>
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
<script src="/backstage/plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.zh-TW.min.js"></script>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js"></script>
        <!-- Notification js -->
        <script src="/backstage/plugins/notifyjs/dist/notify.min.js"></script>
        <script src="/backstage/plugins/notifications/notify-metro.js"></script>

        <script>
        //$('#datatable').dataTable();
			//$('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
$(function(){
    $('.sendbox').bind('click',function(){
        var send = $(this).prop('checked');
        var id   = $(this).val();
        $.post('/TableForOne/gift/'+id+'/sendUpdate',{
            send : (send ? 1 : 0)
        },function(data){
            $.Notification.notify('success','bottom left','已更新', '發送狀態已更新')
        },'json');
        console.log(send);
    });
    $('.btn-danger').bind('click',function(){
        var id = $(this).data('id');
        if(confirm("確定要刪除禮物卡?如有訂單將一併刪除")) {
             $.ajax({
                url: '/TableForOne/gift/'+id+'/delete',
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
        todayHighlight: true,
        orientation:'top',
        language: 'zh-TW',
    });

});
function submitSearchForm(){
    $('#SearchForm').attr('target','_blank')
    $('#SearchForm').attr('action','/TableForOne/GiftsToCsv')
    $('#SearchForm').submit();
    $('#SearchForm').attr('target','_top');
    $('#SearchForm').attr('action','/TableForOne/gifts');
}
@if(Session::has('message')) alert('{{ Session::get('message') }}'); @endif
		</script>


    </body>
</html>

