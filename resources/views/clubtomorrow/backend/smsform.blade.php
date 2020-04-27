@include('backstage.header',['title' => '明日俱樂部前導'])
<!-- =======================
             ===== START PAGE ======
             ======================= -->

<div class="wrapper">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-4">
                <h4 class="page-title">明日俱樂部前導</h4>
            </div>
            <div class="col-sm-4">
                <h4 class="page-title">明日俱樂部集氣</h4>
            </div>
        </div>
        <!-- Page-Title -->



        <div class="row">
            <div class="col-sm-4">
                <div class="card-box">


                    <div class="table-rep-plugin">
                        <div class="table-wrapper">
                            <div class="btn-toolbar">
                                <div class="btn-group focus-btn-group">
                                    <form method="post" autocomplete="off" target="_blank">
                                        {!! csrf_field() !!}
                                        <div class="form-group col-sm-10">
                                            <div class="col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control dayinput" placeholder="搜尋範圍起始" name="day" value="{{ $request->day or ''}}">
                                                    <span class="input-group-addon bg-primary b-0 text-white"><i class="ion-calendar"></i></span>
                                                </div>
                                                <!-- input-group -->
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-10">
                                            <div class="col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control dayinput" placeholder="搜尋範圍結束" name="day_end" value="{{ $request->day_end or ''}}">
                                                    <span class="input-group-addon bg-primary b-0 text-white"><i class="ion-calendar"></i></span>
                                                </div>
                                                <!-- input-group -->
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-10">
                                            <div class="col-sm-12">
                                        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> 下載</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card-box">
                    <div class="table-rep-plugin">
                        <div class="table-wrapper">
                            <div class="btn-toolbar">
                                <div class="btn-group focus-btn-group">
                                    <form method="post" autocomplete="off" target="_blank">
                                        {!! csrf_field() !!}
                                        <!--div class="form-group col-sm-10">
                                            <div class="col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control dayinput" placeholder="搜尋範圍起始" name="day" value="{{ $request->day or ''}}">
                                                    <span class="input-group-addon bg-primary b-0 text-white"><i class="ion-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-10">
                                            <div class="col-sm-12">
                                                <div class="input-group">
                                                    <input type="text" class="form-control dayinput" placeholder="搜尋範圍結束" name="day_end" value="{{ $request->day_end or ''}}">
                                                    <span class="input-group-addon bg-primary b-0 text-white"><i class="ion-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-10">
                                            <div class="col-sm-12">
                                        <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> 下載</button>
                                            </div>
                                        </div-->
                                        <div>
                                            <h4>登錄總數：{{ $count }}</h4>
                                        </div>

                                    </form>
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
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
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
        //$('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
        $(function() {
            jQuery('.dayinput').datepicker({
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true,
                orientation: "auto bottom"
            });

        });
        @if(Session::has('message')) alert('{{ Session::get('message') }}'); @endif

    </script>


    </body>

    </html>
