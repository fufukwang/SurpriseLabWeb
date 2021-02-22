@include('backstage.header',['title' => '微醺大飯店：1980s貝殼匯入列表'])
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
                        <h4 class="page-title">微醺大飯店：1980s貝殼匯入列表 </h4>
                    </div>
                </div>
                <!-- Page-Title -->
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="table-rep-plugin">
                                <div class="table-wrapper">
                                    <div class="btn-toolbar">
                                        <div class="btn-group focus-btn-group" style="width: 100%"><form action="/thegreattipsyS2/backmes">

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
                                                <label><input type="checkbox" name="is_sent" value="1" @if($request->is_sent) checked @endif>未寄送</label>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <select name="season" class="form-control">
                                                    <option value="">季</option>
                                                    @foreach($quart as $r)
                                                        <option value="{{ $r->quarter }}"@if($request->season==$r->quarter) selected @endif>第 {{ $r->quarter }} 季</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> 搜尋</button>
                                            </div>
                                            @if( Session::get('key')->tgt2 == 0 )
                                            <div class="form-group col-sm-1">
                                                <a target="_blank" href="/thegreattipsyS2/backmenouse/xls" class="btn btn-danger">匯出未兌換名單</a>
                                            </div>
                                            @endif

                                        </form></div>
                                    </div><div class="table-responsive" data-pattern="priority-columns">
                                    <div class="sticky-table-header fixed-solution" style="width: auto;">
                                        <form id="SentMailForm" method="post">
                                            {!! csrf_field() !!}
                                        <table id="tech-companies-1-clone" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="checkAll"></th>
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
                                                <td><input type="checkbox" name="id[]" value="{{ $row->id }}"></td>
                                                <td>{{ $row->id }}</td>
                                                <td><div class="single-line name_{{ $row->id }}">{{ $row->name }}</div></td>
                                                <td>{{ $row->detail }}</td>
                                                <td><div class="single-line tel_{{ $row->id }}">{{ $row->tel }}</div><div class="single-line email_{{ $row->id }}">{{ $row->email }}</div></td>
                                                <td>@forelse(App\model\tgt2\coupon::where('b_id',$row->id)->get() as $coup){{ $coup->code }}@if($coup->o_id>0) <a href="javascript:;" class="canelCoupon" data-id="{{ $row->id }}" data-code="{{ $coup->code }}"><i class="fa fa-times"></i></a> @endif<br >@empty 無優惠券 @endforelse</td>
                                                <td class="editable" style="border:1px solid #eee" data-id="{{ $row->id }}" contenteditable="true">{!! $row->manage !!}</td>
                                                <td><input type="checkbox" class="sendbox" value="{{ $row->id }}" @if($row->is_sent)checked @endif /></td>
                                                <td class="actions">
                                                    <a href="javascript:;" class="btn btn-info btn-xs edit_info" data-id="{{ $row->id }}">修改</a>
                                                    <a href="javascript:;" class="btn btn-primary btn-xs sent_mail" data-id="{{ $row->id }}">寄送優惠券</a>
                                                </td>
                                            </tr>
@empty
<tr><td colspan="8" align="center">尚無資料</td></tr>
@endforelse
                                        </tbody>
                                    </table>
                                    <div class="form-group col-sm-1">
                                        <button class="btn btn-primary muSent" type="button">大量寄送</button>
                                    </div>
                                    <div class="form-group col-sm-1">
                                        <input type="number" class="form-control" max="{{ $mes->lastPage() }}" value="{{ $mes->currentPage() }}" min="1" id="page_input">
                                    </div>
                                    <div class="form-group col-sm-1">
                                        <button class="btn btn-info" id="goPage" type="button">立即前往</button>
                                    </div>
                                </form>

                                    <div class="text-align-center">{{ $mes->appends(['search' => $request->search,'isdone'=>$request->isdone,'season'=>$request->season,'is_sent'=>$request->is_sent])->links() }}</div>
                                </div></div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">微醺大飯店：1980s貝殼資料匯入 </h4>
                    </div>
                </div>
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="table-rep-plugin">
                                <div class="table-wrapper">
                                    @if( Session::get('key')->tgt2 == 0 )
                                    <div class="btn-toolbar">
                                        <div class="btn-group focus-btn-group" style="width: 100%"><form action="/thegreattipsyS2/uploadxlsx" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="form-group col-sm-1">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        匯入資料
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" placeholder="XLSX檔案" name="xlsx">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" placeholder="季度" min="1" name="quarter">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-sm-1">
                                                <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> 上傳</button>
                                            </div>
                                        </form></div>
                                    </div>
                                    @endif
                                    <div>
                                        <p>
                                            範例檔案 : <a href="/example/tgt2範例檔案.xlsx" target="_blank">xlsx 範例檔案</a>
                                        </p>
                                        <p>
                                            說明:<br />
                                            sn 為貝殼的序號(反查方便) 金流單號<br />
                                            detail 贊助細節<br />
                                            num 總數量<br />
                                            money 總金額<br />
                                            name 姓名<br />
                                            email 信箱<br />
                                            tel 電話<br />
                                            sponsor_id 贊助者ID<br />
                                            last_four 刷卡後四碼<br />
                                            eb1 早鳥票<br />
                                            p1 單人票<br />
                                            p2 雙人票<br />
                                            p6 六人票<br />
                                            <!--l1 時間有點限制票數量<br />
                                            a1 無限暢飲票數量<br />
                                            a4 四人沉醉票數量<br /-->
                                            其他的位置可以保留<br />
                                            <span style="color:#f55">同一季只會存入一組相同的單號</span>
                                        </p>
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

    $('#checkAll').bind('click', function() {
        $('input[name="id[]"]').prop('checked', $(this).prop('checked'));
    });
    $('.canelCoupon').bind('click',function(){
        var id   = $(this).data('id');
        var code = $(this).data('code');
        if(confirm("確定要移除此優惠碼的使用紀錄?!(此動作無法復原)")) {
            $.post('/thegreattipsyS2/backmes/CanelCoupon',{
                b_id : id,
                code : code,
            },function(data){
                $('.canelCoupon[data-id="'+id+'"]').remove();
                $.Notification.notify('success','bottom left','已更新', '已移除')
            },'json');
        }
    });

    $('.editable').bind('blur',function(){
        var val = $(this).html();
        var id  = $(this).data('id');
        $.post('/thegreattipsyS2/backmes/'+id+'/sendManageUpdate',{
            manage : val
        },function(data){
            $.Notification.notify('success','bottom left','已更新', '備註已更新')
        },'json');
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
            var name  = $('.name_'+id).html();
            var tel   = $('.tel_'+id).html();
            var email = $('.email_'+id).html();
            $.post('/thegreattipsyS2/backmes/'+id+'/infoUpdate',{
                name  : name,
                tel   : tel,
                email : email
            },function(data){
                $.Notification.notify('success','bottom left','已更新', '資訊已更新')
            },'json');
        }
    })
    $('.sendbox').bind('click',function(){
        var send = $(this).prop('checked');
        var id   = $(this).val();
        $.post('/thegreattipsyS2/backmes/'+id+'/sendUpdate',{
            send : (send ? 1 : 0)
        },function(data){
            $.Notification.notify('success','bottom left','已更新', '發送狀態已更新')
        },'json');
    });
    $('.sent_mail').bind('click',function(){
        var id   = $(this).data('id');
        $.post('/thegreattipsyS2/backmes/'+id+'/sentcoupon',{},function(data){
            if(data.message == 'success'){
                $('.sendbox[value="'+id+'"]').prop('checked',true);
                $.Notification.notify('success','bottom left','已更新', '發送狀態已更新');
            } else {
                $('.sendbox[value="'+id+'"]').prop('checked',false);
                $.Notification.notify('error','bottom left','錯誤', '寄信失敗');
            }
        },'json');
    });
    $('.muSent').bind('click',function(){
        $('#SentMailForm').submit();
    });
    $('#goPage').bind('click',function(){
        var page = $('#page_input').val();
        window.location = "?page="+page;
    });

});
@if(Session::has('message')) alert('{{ Session::get('message') }}'); @endif
		</script>


    </body>
</html>

