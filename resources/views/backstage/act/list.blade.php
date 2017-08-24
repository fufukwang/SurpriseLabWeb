@include('backstage.header')
<!-- =======================
             ===== START PAGE ======
             ======================= -->

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">活動列表</h4>
                    </div>
                </div>
                <!-- Page-Title -->
                
                
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="m-b-30">
                                    <a href="/act" class="btn btn-primary waves-effect waves-light">新增活動 <i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel">
                            <!-- tabs -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="nav nav-tabs navtab-custom">
                                        <li class="@if(!$request->has('filter'))active @endif">
                                            <a href="/acts">
                                                <span class="visible-xs"><i class="fa fa-home"></i></span>
                                                <span class="hidden-xs">全部</span>
                                            </a>
                                        </li>
                                        <li class="@if($request->has('filter') && $request->filter=='feature')active @endif">
                                            <a href="/acts?filter=feature">
                                                <span class="visible-xs"><i class="fa fa-user"></i></span>
                                                <span class="hidden-xs">即將到來</span>
                                            </a>
                                        </li>
                                        <li class="@if($request->has('filter') && $request->filter=='old')active @endif">
                                            <a href="/acts?filter=old">
                                                <span class="visible-xs"><i class="fa fa-user"></i></span>
                                                <span class="hidden-xs">已結束</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/orderlist">
                                                <span class="visible-xs"><i class="fa fa-user"></i></span>
                                                <span class="hidden-xs">完整參加名單</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- table-->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="home">
                                            <div class="">
                                                <table class="table table-striped" id="datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>活動日期</th>
                                                            <th>活動場次</th>
                                                            <th>參加人數</th>
                                                            <th>特別活動</th>
                                                            <th>開放單身</th>
                                                            <th>刷卡/現金<br />不含服務費 10%</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
@forelse ($acts as $row)
                                                        <tr class="gradeC" id="tr_{{ $row->AID }}"><!--  gradeU  -->
                                                            <td>{{ $row->ADay->format('m/d') }}</td>
                                                            <td>{{ substr($row->STime,0,5) }}-{{ substr($row->ETime,0,5) }}</td>
                                                            <td>{{ App\model\orderlist::where('Status','SUCCESS')->where('AID',$row->AID)->sum('Pople') }}/{{ $row->Pop }}</td>
                                                            <td>{{ $row->Sp ? '是' : '否' }}</td>
                                                            <td>{{ $row->One ? '是' : '否' }}</td>
                                                            <td>{{ $row->Card }}/{{ $row->Money }}</td>
                                                            <td class="actions">
                                                                <a href="/act/{{$row->AID}}/orders"><i class="fa fa-list-alt"></i></a>
                                                                <a href="/act?AID={{ $row->AID }}"><i class="fa fa-pencil"></i></a>
<form method="post" action="/{{ $row->AID }}/actdelete" style="display: inline;">
{!! csrf_field() !!}<input name="_method" type="hidden" value="DELETE"> <!--刪除的偽方法-->
<a href="javascript:;" class="delbtn"><i class="fa fa-trash-o"></i></a>
</form>
                                                                
                                                            </td>
                                                        </tr>
@empty
<tr><td colspan="7" align="center">尚無資料</td></tr>
@endforelse

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end-table -->
                                </div>
                            </div>
                            <!-- end tabs -->
                    </div>
                    <!-- end: page -->

                </div> 
                <!-- end Panel -->



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

<!-- Examples -->
	    <script src="/backstage/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
	    <script src="/backstage/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>
	    <script src="/backstage/plugins/datatables/dataTables.bootstrap.js"></script>
	    <script src="/backstage/plugins/tiny-editable/mindmup-editabletable.js"></script>
	    <script src="/backstage/plugins/tiny-editable/numeric-input-example.js"></script>

	    <script src="/backstage/pages/datatables.editable.init.js"></script>

        <script src="/backstage/js/jquery.core.js"></script>
        <script src="/backstage/js/jquery.app.js"></script>

        <script>
        $('#datatable').dataTable();
			//$('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
$(function(){
    $('.delbtn').bind('click',function(){
        if(confirm("確定要刪除此活動?如有訂單將一併刪除")) $(this).parent().submit();
    });
});
@if(Session::has('message')) alert('{{ Session::get('message') }}'); @endif
		</script>


    </body>
</html>

