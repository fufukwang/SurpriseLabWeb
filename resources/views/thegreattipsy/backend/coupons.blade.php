@include('backstage.header',['title' => '微醺大飯店兌換碼列表'])
<!-- =======================
             ===== START PAGE ======
             ======================= -->

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">微醺大飯店兌換碼列表 </h4>
                    </div>
                </div>
                <!-- Page-Title -->
                
                

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">


                            <div class="table-rep-plugin">
                                <div class="table-wrapper">
                                    <div class="btn-toolbar">
                                        <div class="btn-group focus-btn-group"><form action="/thegreattipsy/coupons" id="SearchForm">

                                            <!--div class="form-group col-sm-2">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="yyyy-mm-dd" name="day" id="datepicker-autoclose" value="{{ $request->day or ''}}">
                                                        <span class="input-group-addon bg-primary b-0 text-white"><i class="ion-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div-->
                                            <div class="form-group col-sm-8">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="搜尋" name="search" id="datepicker-autoclose" value="{{ $request->search or ''}}">
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
                                                <th>Code</th>
                                                <th>類別</th>
                                                <th>兌換日期</th>
                                                <th>訂單編號</th>
                                                <th>功能</th>
                                            </tr>
                                        </thead>
                                        <tbody>
@forelse ($coupons as $row)
                                            <tr id="tr_{{ $row->id }}">
                                                <td>{{ $row->code }}</td>
                                                <td>@if( $row->type == 'l1' ) 時間有點限制票 @elseif( $row->type == 'a1' ) 暢行無阻票 @elseif( $row->type == 'a4' ) 四人沉醉票 @endif</td>
                                                <td>@if($row->o_id > 0) 
                                                    {{ App\model\tgt\order::where('sn',$row->o_id)->first()->created_at }}
                                                @else 尚未兌換
                                                @endif</td>
                                                <th>{{ $row->o_id }}</th>
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
                url: '/thegreattipsy/coupon/'+id+'/delete',
                method: 'delete',
                dataType:'json'
            }).done(function(data){
                swal(data.message);
                $('#tr_'+id).remove();
            });
        }
    });


});

@if(Session::has('message')) alert('{{ Session::get('message') }}'); @endif
		</script>


    </body>
</html>

