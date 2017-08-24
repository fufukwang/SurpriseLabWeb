@include('backstage.header')
        <!-- =======================
     ===== START PAGE ======
     ======================= -->
<div class="wrapper">
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Event</h4>
            </div>
        </div>
        <!-- Page-Title -->


        <div class="panel">

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="m-b-30">
                            <a href="event/create"><button id="addToTable" class="btn btn-primary waves-effect waves-light">Add <i class="fa fa-plus"></i></button></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <table class="table table-striped" id="datatable-editable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>Creatdate</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="gradeX">
                            <td>1</td>
                            <td>活動名稱</td>
                            <td>文案</td>
                            <td>2015/06/02</td>
                            <td class="actions">
                                <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                <a href="/backstage/admin/edit" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                <a href="#" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end: page -->

        </div> <!-- end Panel -->

        @include('backstage.footer')
    </div> <!-- end container -->
</div>
<!-- End wrapper -->

</body>
</html>