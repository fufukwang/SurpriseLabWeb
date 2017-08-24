@include('backstage.header')
<!-- =======================
             ===== START PAGE ======
             ======================= -->

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">聯絡我們</h4>
                    </div>
                </div>
                <!-- Page-Title -->
                
                
                    <div class="panel-body">
                        
                        <div class="panel">
                            <!-- tabs -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <!-- table-->
                                    <div class="card-box table-responsive">
                                                <table class="table table-striped" id="datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>姓名</th>
                                                            <th>聯絡資訊</th>
                                                            <th>主旨</th>
                                                            <th>狀態</th>
                                                            <th>留言</th>
                                                            <th>時間</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
@forelse ($contacts as $row)
                                                        <tr class="gradeC"><!--  gradeU  -->
                                                            <td>{{ $row->Name }}</td>
                                                            <td>{{ $row->Tel }} / {{ $row->EMail}}</td>
                                                            <td>{{ $row->Subject }}</td>
                                                            <td>{{ $row->Status ? '已處理' : '未處理' }}</td>
                                                            <td>{{ $row->Content }}</td>
                                                            <td>{{ $row->created_at->format('Y-m-d H:i:s') }}</td>
                                                            <td class="actions">
                                                                <a href="/contact/{{ $row->CID }}"><i class="fa fa-pencil"></i></a>
<form method="post" action="/contact/{{ $row->CID }}/delete" style="display: inline;">
{!! csrf_field() !!}<input name="_method" type="hidden" value="DELETE"> <!--刪除的偽方法-->
<a href="javascript:;" class="delbtn"><i class="fa fa-trash-o"></i></a>
</form>

                                                            </td>
                                                        </tr>
@empty
<tr><td colspan="4" align="center">尚無資料</td></tr>
@endforelse

                                                    </tbody>
                                                </table>
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
			$(document).ready(function() {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable( { keys: true } );
                $('#datatable-responsive').DataTable();
                $('#datatable-scroller').DataTable( { ajax: "assets/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
                var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
    $('.delbtn').bind('click',function(){
        if(confirm("確定要刪除此留言?刪除後無法將無法復原此留言!")) $(this).parent().submit();
    });
            } );
            TableManageButtons.init();
		</script>


    </body>
</html>

