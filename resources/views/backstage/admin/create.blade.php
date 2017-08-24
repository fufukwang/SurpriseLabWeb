@include('backstage.header')
        <!-- =======================
     ===== START PAGE ======
     ======================= -->
<div class="wrapper">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">後台管理者</h4>
            </div>
        </div>
        <!-- Page-Title -->


        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b>新增</b></h4>
                    <form action="/admin" method="post"  data-parsley-validate novalidate>
                        {!! csrf_field() !!}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="userName">account*</label>
                                <input type="text" name="account" parsley-trigger="change" required placeholder="account" class="form-control" id="userName">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="pass1">Password*</label>
                                <input id="pass1" name="password" type="password" placeholder="Password" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="passWord2">Confirm Password *</label>
                                <input data-parsley-equalto="#pass1" type="password" required placeholder="Password" class="form-control" id="passWord2">
                            </div>
                        </div>
                        <div class="form-group text-right m-b-0">
                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                Cancel
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        @include('backstage.footer')
    </div> <!-- end container -->
</div>
<!-- End wrapper -->
<!-- jQuery  -->
<script src="/backstage/js/jquery.min.js"></script>
<script src="/backstage/js/bootstrap.min.js"></script>
<script src="/backstage/js/detect.js"></script>
<script src="/backstage/js/fastclick.js"></script>
<script src="/backstage/js/jquery.blockUI.js"></script>
<script src="/backstage/js/waves.js"></script>
<script src="/backstage/js/wow.min.js"></script>
<script src="/backstage/js/jquery.nicescroll.js"></script>
<script src="/backstage/js/jquery.scrollTo.min.js"></script>

<!-- Parsleyjs -->
<script type="text/javascript" src="/backstage/plugins/parsleyjs/dist/parsley.min.js"></script>

<script src="/backstage/js/jquery.core.js"></script>
<script src="/backstage/js/jquery.app.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>
</body>
</html>