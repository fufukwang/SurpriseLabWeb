@include('backstage.header',['title' => '驚喜製造許願清單'])
<!-- =======================
             ===== START PAGE ======
             ======================= -->

<div class="wrapper">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">驚喜製造許願清單  </h4>
            </div>
        </div>
        <!-- Page-Title -->



        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">

                    <div class="table-rep-plugin">
                        <div class="table-wrapper">
                            <div class="btn-toolbar">
                                    <form action="/surprise/wishs" autocomplete="off">

                                        <div class="form-group col-sm-2">
                                            <input type="text" name="search" placeholder="搜尋關鍵字" class="form-control" value="{{ $request->search or ''}}">
                                        </div>

                                        <div class="form-group col-sm-1">
                                            <select name="type" class="form-control">
                                                <option value="">狀態</option>
                                                <option value="未處理"@if(request()->get('type')=="未處理") selected @endif>未處理</option>
                                                <option value="已完成"@if(request()->get('type')=="已完成") selected @endif>已完成</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> 搜尋</button>


                                    </form>
                            </div>
                            <div class="table-responsive" data-pattern="priority-columns">
                                <div class="sticky-table-header fixed-solution" style="width: auto;">
                                    <form method="post" id="openForm">
                                        {!! csrf_field() !!}
                                        <table id="tech-companies-1-clone" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>狀態 / 新增時間</th>
                                                    <th>許願</th>
                                                    <th>管理</th>
                                                    <th>功能</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($wishs as $row)
                                                <tr id="tr_{{ $row->id }}">
                                                    <td>
                                                        @if($row->type == '未處理') <span class="badge badge-pill badge-info">{{ $row->type }}</span> 
                                                        @elseif($row->type == '已完成') <span class="badge badge-pill badge-success">{{ $row->type }}</span> 
                                                        @endif<br />{{ $row->created_at }}</td>
                                                    <td>{{ $row->wish }}</td>
                                                    <td>{{ $row->manage }}</td>
                                                    <td class="actions">
                                                        <a class="btn btn-primary btn-xs" href="/surprise/wish/{{ $row->id }}/modify"><i class="fa fa-pencil"></i></a>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="4" align="center">尚無資料</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>

                                    </form>
                                    @if(count($wishs))
                                    <div align="center">{{ $wishs->appends(Request::capture()->except('page'))->links() }}</div>
                                    @endif
                                </div>
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

        </div>
        <!-- end container -->
    </div>
    <!-- End wrapper -->

    @include('backstage.jquery')
    <link href="/backstage/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <script src="/backstage/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <link href="/backstage/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
<link href="/backstage/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Examples -->
    <script src="/backstage/plugins/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="/backstage/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>
    <script src="/backstage/plugins/datatables/dataTables.bootstrap.js"></script>
    <script src="/backstage/plugins/tiny-editable/mindmup-editabletable.js"></script>
    <script src="/backstage/plugins/tiny-editable/numeric-input-example.js"></script>

    <script src="/backstage/pages/datatables.editable.init.js"></script>
    <script src="/backstage/plugins/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Notification js -->
    <script src="/backstage/plugins/notifyjs/dist/notify.min.js"></script>
    <script src="/backstage/plugins/notifications/notify-metro.js"></script>

    <script src="/backstage/js/jquery.core.js"></script>
    <script src="/backstage/js/jquery.app.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <script>
        $(function() {



        });
        @if(Session::has('message')) alert('{{ Session::get('message') }}'); @endif
    </script>


    </body>

    </html>
