@include('backstage.header',['title' => '巴黎舞會兌換碼列表'])
<!-- =======================
             ===== START PAGE ======
             ======================= -->

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">巴黎舞會兌換碼列表 </h4>
                    </div>
                </div>
                <!-- Page-Title -->
                
                

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">


                            <div class="table-rep-plugin">
                                <div class="table-wrapper">
                                    <div class="btn-toolbar">
                                        <div class="btn-group focus-btn-group" style="width:100%"><form action="/paris/coupons" id="SearchForm">

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
                                                    <option value="p1"@if($request->type=='p1') selected @endif>單人獨舞票</option>
                                                    <option value="p2"@if($request->type=='p2') selected @endif>雙人共舞票</option>
                                                    <option value="p4"@if($request->type=='p4') selected @endif>四人群舞票</option>
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
                                            <!--button type="button" class="btn btn-info" onclick="submitSearchForm();" style="margin-left: 10px;"><span class="glyphicon glyphicon-print"></span> 列印</button>
                                            <button type="button" class="btn btn-info" onclick="submitPrintCover();" style="margin-left: 10px;"><span class="glyphicon glyphicon-print"></span> 封面列印</button-->


                                        </form></div>
                                    </div><div class="table-responsive" data-pattern="priority-columns">
                                    <div class="sticky-table-header fixed-solution" style="width: auto;"><table id="tech-companies-1-clone" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>類別</th>
                                                <th>兌換期限</th>
                                                <th>兌換日期</th>
                                                <th>訂單編號</th>
                                                <th>功能</th>
                                            </tr>
                                        </thead>
                                        <tbody>
@forelse ($coupons as $row)
                                            <tr id="tr_{{ $row->id }}">
                                                <td>{{ $row->code }}</td>
                                                <td>
@if( $row->type == 'p1' ) 單人獨舞票 
@elseif( $row->type == 'p2' ) 雙人共舞票
@elseif( $row->type == 'p4' ) 四人群舞票
@elseif( $row->type == 'gift' ) 禮物卡
@endif</td>
                                                <th>@if($row->end_at != '') <span @if($row->end_at->timestamp<time()) style="color:red;" @endif>{{$row->end_at}}</span> @else - @endif </th>
                                                <td>@if($row->o_id > 0) 
                                                    {{ App\model\paris\order::where('sn',$row->o_id)->first()->created_at }}
                                                @else 尚未兌換
                                                @endif</td>
                                                <th>{{ $row->o_id }}@if($row->o_id == -1) (訂單已刪除) @endif </th>
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
@if( Session::get('key')->paris == 1 && Session::get('key')->admin == 1 )
                    <div class="col-sm-12">
                        <div class="card-box">
                            <h4 class="page-title">巴黎舞會新增兌換碼 </h4>
                            <div class="table-rep-plugin">
                                <div class="table-wrapper">
                                    <div class="btn-toolbar">
                                        <div class="btn-group focus-btn-group" style="width: 100%"><form action="/paris/coupons" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group col-sm-12">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="ticket">票券類別</label>
                                                        <select name="ticket" id="ticket" class="form-control">
                                                            <option value="p1">單人獨舞票</option>
                                                            <option value="p2">雙人共舞票</option>
                                                            <option value="p4">四人群舞票</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="num">生成數量</label>
                                                        <input type="number" value="1" class="form-control" id="num" name="num" min="1" max="3000" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="day">票券期限(指定日期的23:59:59，如無期限請留白)</label>
                                                        <input type="date" class="form-control" id="day" name="day" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> 產生</button>
                                            </div>
                                        </form></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
@endif










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
                url: '/paris/coupon/'+id+'/delete',
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

