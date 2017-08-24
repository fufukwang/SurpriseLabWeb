@include('backstage.header')
<!-- =======================
     ===== START PAGE ======
     ======================= -->
<div class="wrapper">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">驚喜製造 訂閱清單</h4>
            </div>
        </div>
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Create date</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($email as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->created_at}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @include('backstage.footer')
    </div> <!-- end container -->
</div>
<!-- End wrapper -->


@include('backstage.jquery')

<!-- Datatables-->
<script src="backstage/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="backstage/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="backstage/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="backstage/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="backstage/plugins/datatables/jszip.min.js"></script>
<script src="backstage/plugins/datatables/pdfmake.min.js"></script>
<script src="backstage/plugins/datatables/vfs_fonts.js"></script>
<script src="backstage/plugins/datatables/buttons.html5.min.js"></script>
<script src="backstage/plugins/datatables/buttons.print.min.js"></script>
<script src="backstage/plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="backstage/plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="backstage/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="backstage/plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="backstage/plugins/datatables/dataTables.scroller.min.js"></script>

<!-- Datatable init js -->
<script src="backstage/pages/datatables.init.js"></script>

<script src="backstage/js/jquery.core.js"></script>
<script src="backstage/js/jquery.app.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable( { keys: true } );
        $('#datatable-responsive').DataTable();
        $('#datatable-scroller').DataTable( { ajax: "backstage/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
        var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
    } );
    TableManageButtons.init();

</script>





</body>
</html>