@include('backstage.header',['title' => '落日轉運站兌換碼列表'])
<!-- =======================
             ===== START PAGE ======
             ======================= -->

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">落日轉運站兌換碼列表 </h4>
                    </div>
                </div>
                <!-- Page-Title -->
                
                

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">


                            <div class="table-rep-plugin">
                                <div class="table-wrapper">
                                    <div class="btn-toolbar">
                                        <div class="btn-group focus-btn-group" style="width:100%"><form action="/terminal/coupons" id="SearchForm">
                                            <input type="hidden" name="xls" value="">
                                            <!--div class="form-group col-sm-2">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="yyyy-mm-dd" name="day" id="datepicker-autoclose" value="{{ $request->day or ''}}">
                                                        <span class="input-group-addon bg-primary b-0 text-white"><i class="ion-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div-->
                                            <div class="form-group col-sm-1">
                                                <select name="type" class="form-control">
                                                    <option value="">票券類別</option>
                                                    <option value="train"@if($request->type=='train') selected @endif>微醺列車</option>
                                                    <option value="flight"@if($request->type=='flight') selected @endif>FLIGHT無光飛航</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-2">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="搜尋" name="search" id="datepicker-autoclose" value="{{ $request->search or ''}}">
                                                    </div><!-- input-group -->
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> 搜尋</button>&nbsp;
                                            <button type="button" class="btn btn-info outXls" style="margin-left: 10px;">匯出</button>
                                            <!--button type="button" class="btn btn-info" onclick="submitPrintCover();" style="margin-left: 10px;"><span class="glyphicon glyphicon-print"></span> 封面列印</button-->


                                        </form></div>
                                    </div><div class="table-responsive" data-pattern="priority-columns">
                                    <div class="sticky-table-header fixed-solution" style="width: auto;"><table id="tech-companies-1-clone" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>編號</th>
                                                <th>禮物卡</th>
                                                <th>類別</th>
                                                <th>折扣金額</th>
                                                <th>兌換日期</th>
                                                <th>訂單編號</th>
                                                <th>備註</th>
                                                <th>功能</th>
                                            </tr>
                                        </thead>
                                        <tbody>
@forelse ($coupons as $row)
                                            <tr id="tr_{{ $row->id }}">
                                                <td>{{ $row->id }}</td>
                                                <td>{{ $row->code }}</td>
                                                <td>@if( $row->type == 'train' ) 微醺列車 @elseif( $row->type == 'flight' ) FLIGHT無光飛航 @endif</td>
                                                <td>@if( $row->type == 'train' ) 1250 @elseif( $row->type == 'flight' ) 500 @endif</td>
                                                <td>@if($row->o_id > 0) 
                                                    {{ App\model\terminal\order::where('sn',$row->o_id)->first()->created_at }}
                                                @else 尚未兌換
                                                @endif</td>
                                                <th>{{ $row->o_id }}@if($row->o_id == -1) (訂單已刪除) @endif </th>
                                                <td class="editable" style="word-break: break-all;max-width: 200px;" data-id="{{ $row->id }}" contenteditable="true">{!! nl2br($row->remark) !!}</td>
                                                <td class="actions">
                                                    <!--a class="btn btn-primary btn-xs" href="/TableForOne/gift/{{ $row->id }}/edit"><i class="fa fa-pencil"></i></a-->
                                                    <a class="btn btn-danger btn-xs" href="javascript:;" data-o_id={{ $row->o_id }} data-id={{ $row->id }}><i class="fa fa-remove"></i></a>
                                                </td>
                                            </tr>
@empty
<tr><td colspan="13" align="center">尚無資料</td></tr>
@endforelse
                                        </tbody>
                                    </table>


                                    <div class="text-align-center">{{ $coupons->links() }}</div>
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
        if($(this).data('o_id') > 0){
            txt = '此優惠券已被使用(訂單不會被刪除),';
        }
        if(confirm(txt + "確定要刪除此優惠券")) {
             $.ajax({
                url: '/terminal/coupon/'+id+'/delete',
                method: 'delete',
                dataType:'json'
            }).done(function(data){
                swal(data.message);
                $('#tr_'+id).remove();
            });
        }
    });
    // 修改備註
    $('.editable').bind('blur',function(){
        var val = $(this).html();
        var id  = $(this).data('id');
        $.post('/terminal/setting/store',{
            slug: 'upateCouponNotes',
            notes : val,
            id: id,
        },function(data){
            if(data.success){ $.Notification.notify('success','bottom left','已更新', '備註已更新'); 
            } else { $.Notification.notify('error','bottom left','更新失敗', '備註更新失敗'); }
        },'json');
    });

    $('.outXls').bind('click',function(){
        $('input[name=xls]').val('1');
        $('#SearchForm').submit();
        $('input[name=xls]').val('');
    })
});

@if(Session::has('message')) alert('{{ Session::get('message') }}'); @endif
		</script>


    </body>
</html>

