@include('backstage.header')
<!-- =======================
             ===== START PAGE ======
             ======================= -->

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="get" class="form-horizontal">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4">選擇日期</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="datepicker-autoclose" name="Day" value="{{ $request->has('Day') ? $request['Day'] : Carbon\Carbon::today()->toDateString() }}" readonly>
                                                    <span class="input-group-addon bg-primary b-0 text-white"><i class="ion-calendar"></i></span>
                                                </div><!-- input-group -->
                                            </div>
                                        </div>
                                        <p style="text-align: right;">
                                            <button type="submit" class="btn btn-success waves-effect w-md waves-light m-b-5">搜尋</button>
                                            </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-Title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title"><b>日期：{{ $request->has('Day') ? $request['Day'] : Carbon\Carbon::today()->toDateString() }}</b></h4>
                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-bordered table-condensed m-0" data-page-length='200'>
                                    <thead>
                                        <tr>
                                            <th data-orderable="false" width="16" style="padding:0px;margin:0px;">確認</th>
                                            <th data-orderable="false" width="16" style="padding:0px;margin:0px;">順序</th>
                                            <th data-orderable="false" width="16" style="padding:0px;margin:0px;">桌號</th>
                                            <th data-orderable="false" width="16" style="padding:0px;margin:0px;">到店</th>
                                            <th data-orderable="false" width="16" style="padding:0px;margin:0px;">離店</th>
                                            <th>時間</th>
                                            <th data-orderable="false" width="16" style="padding:0px;margin:0px;">人數</th>
                                            <th data-orderable="false">序號</th>
                                            <th data-orderable="false" width="6%">姓名</th>
                                            <th data-orderable="false">電話</th>
                                            <th data-orderable="false" width="6%">主餐</th>
                                            <th data-orderable="false" width="16" style="padding:0px;margin:0px;">葷</th>
                                            <th data-orderable="false" width="16" style="padding:0px;margin:0px;">素</th>
                                            <th data-orderable="false">付款</th>
                                            <th data-orderable="false">Kitchen</th>
                                            <th data-orderable="false">Surprise</th>
                                            <th data-orderable="false">備註</th>
                                            <th data-orderable="false">註記</th>
                                        </tr>
                                    </thead>
                                    <tbody>
@forelse ($orders as $row)
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ substr($row->STime,0,5) }}</td>
                                            <td>{{ $row->Pople }}</td>
                                            <td>{{ $row->SN }}</td>
                                            <td>{{ $row->Name }}</td>
                                            <td>{{ $row->Tel }}</td>
                                            <td>@foreach(\App\model\pople::where('OID',$row->OID)->get() as $k=>$r) <div>{{$k+1}}-{{ $r->Meal=='Hunsi' ? '葷' : '素'}}</div> @endforeach</td>
                                            <td>{{ \App\model\pople::where('OID',$row->OID)->where('Meal','Hunsi')->count() }}</td>
                                            <td>{{ \App\model\pople::where('OID',$row->OID)->where('Meal','Vegetarian')->count() }}</td>
                                            <td>{{ $row->Pay=='online' ? '線上付款' : '現場繳費' }} @if($row->Status == 'SUCCESS')
<span class="label label-success">{{ $row->Status }}</span>
@elseif($row->Status == 'Cancel')
<span class="label label-warning">{{ $row->Status }}</span>
@else
<span class="label label-danger">{{ $row->Status=='' ? '無付款(失敗)' : $row->Status }}</span>
@endif</td>
                                            <td></td>
                                            <td></td>
                                            <td>{!! nl2br($row->Notes) !!}</td>
                                            <td>{!! nl2br($row->PS) !!}</td>
                                        </tr>
@endforeach
                                    </tbody>
                                </table>
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



        <!-- jQuery  -->
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
        <!-- Custom main Js -->
        <script src="/backstage/js/jquery.core.js"></script>
        <script src="/backstage/js/jquery.app.js"></script>
        
        <script src="/backstage/plugins/switchery/switchery.min.js"></script>
        <script src="/backstage/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script type="text/javascript" src="/backstage/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="/backstage/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="/backstage/plugins/select2/select2.min.js" type="text/javascript"></script>
        <script src="/backstage/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="/backstage/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>

        <script src="/backstage/plugins/moment/moment.js"></script>
        <script src="/backstage/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="/backstage/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <script src="/backstage/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="/backstage/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>


        <script src="/backstage/js/jquery.core.js"></script>
        <script src="/backstage/js/jquery.app.js"></script>

        <script>
            jQuery(document).ready(function() {

                //advance multiselect start
                $('#my_multi_select3').multiSelect({
                    selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    afterInit: function (ms) {
                        var that = this,
                            $selectableSearch = that.$selectableUl.prev(),
                            $selectionSearch = that.$selectionUl.prev(),
                            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                            .on('keydown', function (e) {
                            if (e.which === 40) {
                                that.$selectableUl.focus();
                                return false;
                            }
                        });

                        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                            .on('keydown', function (e) {
                            if (e.which == 40) {
                                that.$selectionUl.focus();
                                return false;
                            }
                        });
                    },
                    afterSelect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    },
                    afterDeselect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    }
                });

                // Select2
                $(".select2").select2();

                $(".select2-limiting").select2({
                    maximumSelectionLength: 2
                });
                $('#datatable-responsive').DataTable();
            });
            TableManageButtons.init();
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true,
                buttondown_class: "btn btn-primary",
                buttonup_class: "btn btn-primary",
                verticalupclass: 'ion-plus-round',
                verticaldownclass: 'ion-minus-round'
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }

            // Time Picker
            jQuery('#timepicker').timepicker({
                defaultTIme : false
            });
            jQuery('#timepicker2').timepicker({
                showMeridian : false
            });
            jQuery('#timepicker3').timepicker({
                minuteStep : 15
            });

            //colorpicker start

            $('.colorpicker-default').colorpicker({
                format: 'hex'
            });
            $('.colorpicker-rgba').colorpicker();

            // Date Picker
            jQuery('#datepicker').datepicker();
            /*jQuery('#datepicker-autoclose').datepicker({
                autoclose: true,
                todayHighlight: true
            });*/
    $('#datepicker-autoclose').datepicker({
        format:'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });
            jQuery('#datepicker-inline').datepicker();
            jQuery('#datepicker-multiple-date').datepicker({
                format: "mm/dd/yyyy",
                clearBtn: true,
                multidate: true,
                multidateSeparator: ","
            });
            jQuery('#date-range').datepicker({
                toggleActive: true
            });



        </script>

    </body>
</html>