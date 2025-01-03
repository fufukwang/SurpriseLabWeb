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
                    <div class="card-box" style="min-height: 500px;">
                        <h4 class="m-t-0 header-title"><b>編輯管理員</b></h4>
                        <form  data-parsley-validate novalidate method="post" action="/admin/{{ $admin->id }}">
                            {!! csrf_field() !!}<input name="_method" type="hidden" value="PUT"><!--修改的偽方法-->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="userName">account</label>
                                    <input type="text" name="account" parsley-trigger="change" required placeholder="account" class="form-control" id="userName" value="{{ $admin->account }}">
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>power admin</label>
                                        <input type="checkbox" @if($admin->admin)checked @endif name="admin" value="1" data-plugin="switchery" data-color="#ffaa00"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>gift add</label>
                                        <input type="checkbox" @if($admin->giftadd)checked @endif name="giftadd" value="1" data-plugin="switchery" data-color="#ffaa00"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>微醺大飯店</label>
                                        <input type="checkbox" @if($admin->thegreattipsy)checked @endif name="thegreattipsy" value="1" data-plugin="switchery" data-color="#ffaa00"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>無光,T41</label>
                                        <input type="checkbox" @if($admin->oldview)checked @endif name="oldview" value="1" data-plugin="switchery" data-color="#ffaa00"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>明日俱樂部</label>
                                        <input type="checkbox" @if($admin->clubtomorrow)checked @endif name="clubtomorrow" value="1" data-plugin="switchery" data-color="#ffaa00"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>微醺大飯店2</label>
                                        <input type="checkbox" @if($admin->tgt2)checked @endif name="tgt2" value="1" data-plugin="switchery" data-color="#ffaa00"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>無光晚餐3</label>
                                        <input type="checkbox" @if($admin->dark3)checked @endif name="dark3" value="1" data-plugin="switchery" data-color="#ffaa00"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>落日轉運站</label>
                                        <input type="checkbox" @if($admin->terminal)checked @endif name="terminal" value="1" data-plugin="switchery" data-color="#ffaa00"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>巴黎舞會</label>
                                        <input type="checkbox" @if($admin->paris)checked @endif name="paris" value="1" data-plugin="switchery" data-color="#ffaa00"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>落日台北站</label>
                                        <input type="checkbox" @if($admin->terTP)checked @endif name="terTP" value="1" data-plugin="switchery" data-color="#ffaa00"/>
                                    </div>
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

<link href="/backstage/plugins/switchery/switchery.min.css" rel="stylesheet" />
<script src="/backstage/plugins/switchery/switchery.min.js"></script>

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