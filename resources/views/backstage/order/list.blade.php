@include('backstage.header')
<!-- =======================
             ===== START PAGE ======
             ======================= -->

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">參加名單</h4>
                    </div>
                </div>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title"><b>日期：{{ $act->ADay->format('Y-m-d') }}&nbsp;時間：{{ substr($act->STime,0,5) }} - {{ substr($act->ETime,0,5) }}</b></h4>
                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>報名序號</th>
                                        <th>姓名</th>
                                        <th>電話</th>
                                        <th>Email</th>
                                        <th>主餐</th>
                                        <th>付款方式</th>
                                        <th>飲食備註</th>
                                        <th>你的驚喜</th>
                                        <th>註記</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
@forelse ($orders as $row)
                                    <tr>
                                        <td>{{ $row->SN }}</td>
                                        <td>{{ $row->Name }}</td>
                                        <td>{{ $row->Tel }}</td>
                                        <td>{{ $row->EMail }}</td>
                                        <td>@foreach($row->pople as $k=>$r) <div>顧客 {{$k+1}} {{ $r->Meal=='Hunsi' ? '葷食' : '素食'}}</div> @endforeach</td>
                                        <td>{{ $row->Pay=='online' ? '線上付款' : '現場繳費' }}<br />
@if($row->Status == 'SUCCESS')
<span class="label label-success">{{ $row->Status }}</span>
@elseif($row->Status == 'Cancel')
<span class="label label-warning">{{ $row->Status }}</span>
@else
<span class="label label-danger">{{ $row->Status=='' ? '無付款(失敗)' : $row->Status }}</span>
@endif

                                        </td>
                                        <td>{!! nl2br($row->Notes) !!}</td>
                                        <td>{!! nl2br($row->Surprised) !!}</td>
                                        <td>{!! $row->PS !!}</td>
                                        <td >
                                            <a href="/act/{{ $row->AID }}/order/{{ $row->OID }}"><i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>
@endforeach
                                </tbody>
                            </table>
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

        <!-- Datatables-->
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

        <!-- Datatable init js -->
        <script src="/backstage/pages/datatables.init.js"></script>

        <script src="/backstage/js/jquery.core.js"></script>
        <script src="/backstage/js/jquery.app.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable( { keys: true } );
                $('#datatable-responsive').DataTable();
                $('#datatable-scroller').DataTable( { ajax: "/backstage/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
                var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
            } );
            TableManageButtons.init();

        </script>


    </body>
</html>