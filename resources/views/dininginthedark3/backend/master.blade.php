@include('backstage.header',['title' => '無光晚餐S3揪團列表'])
<!-- =======================
             ===== START PAGE ======
             ======================= -->
<style type="text/css">
[contenteditable="true"].single-line {
    white-space: nowrap;
    overflow: hidden;
    border:0.5px solid #eee;
} 
[contenteditable="true"].single-line br {
    display:none;

}
[contenteditable="true"].single-line * {
    display:inline;
    white-space:nowrap;
}
        </style>
        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">無光晚餐S3揪團列表 </h4>
                    </div>
                </div>
                <!-- Page-Title -->
                
                

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">


                            <div class="table-rep-plugin">
                                <div class="table-wrapper">
                                    <div class="btn-toolbar">
                                        <div class="btn-group focus-btn-group"><form action="/dark3/getMasterList" id="SearchForm">


                                            <div class="form-group col-sm-8">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="搜尋" name="search" autocomplete="off" id="datepicker-autoclose" value="{{ $request->search or ''}}">
                                                    </div><!-- input-group -->
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> 搜尋</button>&nbsp;
                                            <!--button type="button" class="btn btn-info" onclick="submitSearchForm();" style="margin-left: 10px;"><span class="glyphicon glyphicon-print"></span> 列印</button>
                                            <button type="button" class="btn btn-info" onclick="submitPrintCover();" style="margin-left: 10px;"><span class="glyphicon glyphicon-print"></span> 封面列印</button-->


                                        </form></div>
                                    </div><div class="table-responsive" data-pattern="priority-columns">
                                    <div class="sticky-table-header fixed-solution" style="width: auto;"><table id="tech-companies-1-clone" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>主揪姓名</th>
                                                <th>主揪信箱</th>
                                                <th>姓名</th>
                                                <th>email</th>
                                                <th>電話</th>
                                                <th>功能</th>
                                            </tr>
                                        </thead>
                                        <tbody>
@forelse ($master as $row)
                                            <tr id="tr_{{ $row->id }}">
                                                <td><a href="/dark3/order/{{ $row->order_id }}/edit?" target="_blank">{{ $row->master_name }}</a></td>
                                                <td>{{ $row->master_email }}</td>
                                                <td><div class="single-line name_{{ $row->id }}">{{ $row->name }}</div></td>
                                                <td><div class="single-line email_{{ $row->id }}">{{ $row->email }}</div></td>
                                                <td><div class="single-line tel_{{ $row->id }}">{{ $row->tel }}</div></td>
                                                <td class="actions">
                                                    <a href="javascript:;" class="btn btn-info btn-xs edit_info" data-id="{{ $row->id }}">修改</a>
                                                    @if($row->name == '??' || $row->name == '???')
                                                    <a href="javascript:;" class="btn btn-inverse btn-xs send_mail" data-id="{{ $row->order_id }}" data-name="{{ $row->name }}" data-email="{{ $row->email }}" data-type="Name" data-toggle="tooltip" data-placement="top" data-original-title="姓名錯誤修改通知">通知</a>
                                                    @endif
                                                    <a href="javascript:;" class="btn btn-default btn-xs send_mail" data-id="{{ $row->order_id }}" data-name="{{ $row->name }}" data-email="{{ $row->email }}" data-type="DX" data-toggle="tooltip" data-placement="top" data-original-title="開幕酒會邀請函">邀請函</a>
                                                    <a href="javascript:;" class="btn btn-default btn-xs send_mail" data-id="{{ $row->order_id }}" data-name="{{ $row->name }}" data-email="{{ $row->email }}" data-type="D21" data-toggle="tooltip" data-placement="top" data-original-title="寄送21天前的通知信">21</a>
                                                    <a href="javascript:;" class="btn btn-default btn-xs send_mail" data-id="{{ $row->order_id }}" data-name="{{ $row->name }}" data-email="{{ $row->email }}" data-type="D14" data-toggle="tooltip" data-placement="top" data-original-title="寄送14天前的通知信">14</a>
                                                    <a href="javascript:;" class="btn btn-default btn-xs send_mail" data-id="{{ $row->order_id }}" data-name="{{ $row->name }}" data-email="{{ $row->email }}" data-type="D10" data-toggle="tooltip" data-placement="top" data-original-title="寄送11天前的通知信">11</a>
                                                    <a href="javascript:;" class="btn btn-default btn-xs send_mail" data-id="{{ $row->order_id }}" data-name="{{ $row->name }}" data-email="{{ $row->email }}" data-type="D05" data-toggle="tooltip" data-placement="top" data-original-title="寄送5天前的通知信">05</a>


                                                    <a href="javascript:;" class="btn btn-warning btn-xs send_sms" data-id="{{ $row->order_id }}" data-name="{{ $row->name }}" data-tel="{{ $row->tel }}" data-type="DX" data-toggle="tooltip" data-placement="top" data-original-title="開幕酒會簡訊邀請函">邀請函</a>
                                                    <a href="javascript:;" class="btn btn-warning btn-xs send_sms" data-id="{{ $row->order_id }}" data-name="{{ $row->name }}" data-tel="{{ $row->tel }}" data-type="D10" data-toggle="tooltip" data-placement="top" data-original-title="寄送11天前的通知簡訊">11</a>
                                                    <a href="javascript:;" class="btn btn-warning btn-xs send_sms" data-id="{{ $row->order_id }}" data-name="{{ $row->name }}" data-tel="{{ $row->tel }}" data-type="D00" data-toggle="tooltip" data-placement="top" data-original-title="當天通知簡訊">當天</a>

                                                    <a class="btn btn-danger btn-xs" href="javascript:;" data-id="{{ $row->id }}" data-toggle="tooltip" data-placement="top" data-original-title="刪除此筆資料"><i class="fa fa-remove"></i></a>
                                                </td>
                                            </tr>
@empty
<tr><td colspan="5" align="center">尚無資料</td></tr>
@endforelse
                                        </tbody>
                                    </table>


                                    <div class="text-align-center">{{ $master->appends(Request::capture()->except('page'))->links() }}</div>
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
        <!-- Notification js -->
        <script src="/backstage/plugins/notifyjs/dist/notify.min.js"></script>
        <script src="/backstage/plugins/notifications/notify-metro.js"></script>

        <script>
        //$('#datatable').dataTable();
			//$('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
$(function(){

    $('.btn-danger').bind('click',function(){
        var id  = $(this).data('id');
        var txt = '';
        if(confirm(txt + "確定要刪除此成員")) {
             $.ajax({
                url: '/dark3/postMaster/'+id+'/delete',
                method: 'delete',
                dataType:'json'
            }).done(function(data){
                swal('資料已刪除');
                $('#tr_'+id).remove();
            });
        }
    });
    $('.edit_info').bind('click',function(){
        var id  = $(this).data('id');
        if($(this).hasClass('btn-info')){ // 出現表格
            $(".name_"+id+" ,.tel_"+id+" ,.email_"+id).prop('contenteditable',true)
            $(this).removeClass('btn-info')
            $(this).addClass('btn-warning')
            $(this).text('送出')
        } else if($(this).hasClass('btn-warning')){ // 送出資料
            $(".name_"+id+" ,.tel_"+id+" ,.email_"+id).prop('contenteditable',false)
            $(this).removeClass('btn-warning')
            $(this).addClass('btn-info')
            $(this).text('修改')
            var name  = $('.name_'+id).text();
            var tel   = $('.tel_'+id).text();
            var email = $('.email_'+id).text();
            $.post('/dark3/postMaster/'+id+'/store',{
                name  : name,
                tel   : tel,
                email : email
            },function(data){
                $.Notification.notify('success','bottom left','已更新', '資訊已更新');
            },'json');
        }
    });
    $('.send_mail').bind('click',function(){
        var id  = $(this).data('id');
        var type  = $(this).data('type');
        var name  = $(this).data('name');
        var email  = $(this).data('email');
        $.post('/dark3/postReSendMail',{
            name: name,
            id: id,
            email: email,
            type: type,
        },function(data){
            $.Notification.notify('success','bottom left','已更新', '已重新送出');
        },'json');
    });
    $('.send_sms').bind('click',function(){
        var id  = $(this).data('id');
        var type  = $(this).data('type');
        var name  = $(this).data('name');
        var tel  = $(this).data('tel');
        $.post('/dark3/postReSendSMS',{
            name: name,
            id: id,
            tel: tel,
            type: type,
        },function(data){
            $.Notification.notify('success','bottom left','已更新', '已重新送出');
        },'json');
    });
});

@if(Session::has('message')) alert('{{ Session::get('message') }}'); @endif
		</script>


    </body>
</html>

