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
                <div class="row">
                    <div class="col-sm-12">
                       <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form method="post" class="form-horizontal group-border-dashed" action="/contactstore"> {!! csrf_field() !!}
                                    <input type="hidden" name="CID" value="{{ $contact->CID }}">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">姓名</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" required placeholder="Type something" readonly value="{{ $contact->Name }}" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">電話</label>
                                            <div class="col-sm-6">
                                                <input data-parsley-type="number" type="text" class="form-control" required placeholder="Enter only numbers"readonly value="{{ $contact->Tel }}" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">E-Mail</label>
                                            <div class="col-sm-6">
                                                <input type="email" class="form-control" required parsley-type="email" placeholder="Enter a valid e-mail"readonly value="{{ $contact->EMail }}" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">主旨</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" required placeholder="Subject"readonly value="{{ $contact->Subject }}" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">備註</label>
                                            <div class="col-sm-6">
                                                <textarea required readonly class="form-control" name="Content">{{ $contact->Content }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">狀態</label>
                                            <div class="col-sm-6">
                                                <div class="radio radio-info radio-inline">
                                                    <input type="radio" id="inlineRadio1" value="1" name="Status" @if($contact->Status) checked @endif>
                                                    <label for="inlineRadio1"> 已處理 </label>
                                                </div>
                                                <div class="radio radio-inline">
                                                    <input type="radio" id="inlineRadio2" value="0" name="Status" @if(!$contact->Status) checked @endif>
                                                    <label for="inlineRadio2"> 未處理 </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">紀錄</label>
                                            <div class="col-sm-6">
                                                <textarea required class="form-control" name="Notes">{{ $contact->Notes }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9 m-t-15">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-default waves-effect m-l-5">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
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

        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script type="text/javascript" src="assets/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="assets/plugins/select2/select2.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>

        <script src="assets/plugins/moment/moment.js"></script>
        <script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="assets/plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>


        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>