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
                                        <div class="btn-group focus-btn-group"><form action="/TableForOne/print">

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
                                                    <option value="已付款">已付款</option>
                                                    <option value="未付款">未付款</option>
                                                    <option value="付款失敗">付款失敗</option>
                                                    <option value="取消訂單">取消訂單</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-1">
                                                <select name="paytype" class="form-control">
                                                    <option value="">付款類型</option>
                                                    <option value="禮物卡">禮物卡</option>
                                                    <option value="信用卡">信用卡</option>
                                                </select>
                                            </div>
<div class="form-group col-sm-1"><div class="checkbox checkbox-primary"><input name="notel" value="1" id="none1" type="checkbox"@if($request->notel == 1) checked @endif><label for="none1">不顯示電話</label></div></div>
<div class="form-group col-sm-1"><div class="checkbox checkbox-primary"><input name="notool" value="1" id="none2" type="checkbox"@if($request->notool == 1) checked @endif><label for="none2">不顯示功能</label></div></div>
<div class="form-group col-sm-1"><div class="checkbox checkbox-primary"><input name="noemail" value="1" id="none3" type="checkbox"@if($request->noemail == 1) checked @endif><label for="none3">不顯示信箱</label></div></div>
 

                                            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> 搜尋</button>


                                        </form></div>
                                    </div><div class="table-responsive" data-pattern="priority-columns">
                                    <div class="sticky-table-header fixed-solution"><table id="datatable-buttons" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>序號</th>
                                                <th>姓名</th>
                                                @if($request->notel != 1)<th>電話</th>@endif
                                                @if($request->noemail != 1)<th>信箱</th>@endif
                                                <th>付款狀態</th>
                                                @if($request->notool != 1)<th data-orderable="false">功能</th>@endif
                                            </tr>
                                        </thead>
                                        <tbody>
@forelse ($order as $row)
                                            <tr>
                                                <td>{{ $row->sn }}</td>
                                                <td>{{ $row->name }}</td>
                                                @if($request->notel != 1)<td>{{ $row->tel }}</td>@endif
                                                @if($request->noemail != 1)<td>{{ $row->email }}</td>@endif
                                                <td>{{ $row->paystatus }}</td>
                                                @if($request->notool != 1)<td class="actions">
                                                    <a class="btn btn-primary btn-xs" href="/TableForOne/order/{{ $row->id }}/edit"><i class="fa fa-pencil"></i></a>
                                                    <a class="btn btn-danger btn-xs" href="javascript:;" data-id={{ $row->id }}><i class="fa fa-remove"></i></a>
                                                </td>@endif
                                            </tr>
@empty
<tr><td colspan="6" align="center">尚無資料</td></tr>
@endforelse



                                        </tbody>
                                    </table>


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
        <!--
<link href="/backstage/plugins/switchery/switchery.min.css" rel="stylesheet" />
<script src="/backstage/plugins/switchery/switchery.min.js"></script>
    -->


        <script src="/backstage/js/jquery.core.js"></script>
        <script src="/backstage/js/jquery.app.js"></script>

        <script>


$(function(){
    $('.delbtn').bind('click',function(){
        if(confirm("確定要刪除此活動?如有訂單將一併刪除")) $(this).parent().submit();
    });
    jQuery('#datepicker-autoclose').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });


        var datatable = $("#datatable-buttons").DataTable({
            dom: "Bfrtip",
            buttons: [{
                extend: "copy",
                className: "btn-sm"
            }, {
                extend: "csv",
                className: "btn-sm"
            }, {
                extend: "excel",
                className: "btn-sm"
            }, {
                extend: "print",
                className: "btn-sm"
            }],
            responsive: !0
        })








});
@if(Session::has('message')) alert('{{ Session::get('message') }}'); @endif
		</script>


    </body>
</html>

