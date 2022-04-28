@include('backstage.header',['title' => '驚喜製造許願內容'])
<!-- =======================
===== START PAGE ======
======================= -->

        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <!--div class="row">
                    <div class="col-sm-12">
                        <h4 class="page-title">活動編輯</h4>
                    </div>
                </div-->
                <!-- Page-Title -->



                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h4 class="m-t-0 header-title"><b>驚喜製造許願內容</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                        驚喜製造許願內容.
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-8">

                                    <div class="p-20">
                                        <form  data-parsley-validate novalidate method="post" action="/surprise/wish/{{ $wish->id }}/store" class="form-horizontal">
{!! csrf_field() !!}

                                            <div class="form-group">
                                                <label class="control-label col-sm-4">處理狀態</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" name="type">
                                                        <option value="未處理"@if(isset($wish->type) && $wish->type=='未處理') selected @endif>未處理</option>
                                                        <option value="已完成"@if(isset($wish->type) && $wish->type=='已完成') selected @endif>已完成</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">願望</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" readonly style="min-height: 120px">{{ $wish->wish }}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">註記</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" name="manage" style="min-height: 120px">{{ $wish->manage }}</textarea>
                                                </div>
                                            </div>




                                            <div align="right">
                                                <button type="submit" class="btn btn-primary btn-custom waves-effect w-md waves-light m-b-5">送出</button>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-4">ip</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" readonly value="{{ $wish->ip }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4">瀏覽器資訊</label>
                                                <div class="col-sm-8">
                                                    <textarea class="form-control" readonly>{{ $wish->agent }}</textarea>
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

        <script src="/backstage/plugins/switchery/switchery.min.js"></script>
        <script src="/backstage/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
        <script type="text/javascript" src="/backstage/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="/backstage/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="/backstage/plugins/select2/select2.min.js" type="text/javascript"></script>
        <script src="/backstage/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="/backstage/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js" type="text/javascript"></script>

        <script src="/backstage/js/jquery.core.js"></script>
        <script src="/backstage/js/jquery.app.js"></script>


        <script>
        $(function(){

        });

        </script>



    </body>
</html>