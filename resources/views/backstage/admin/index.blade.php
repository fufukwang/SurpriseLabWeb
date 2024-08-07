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


        <div class="panel">

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="m-b-30">
                            <a href="admin/create"><button id="addToTable" class="btn btn-primary waves-effect waves-light">Add <i class="fa fa-plus"></i></button></a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <table class="table table-striped" id="datatable-editable">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Creatdate</th>
                            <th>Power Admin</th>
                            <th>Gift Add</th>
                            <th>微醺大飯店</th>
                            <th>無光&T41</th>
                            <th>明日俱樂部</th>
                            <th>微醺大飯店2</th>
                            <th>無光晚餐3</th>
                            <th>落日轉運站</th>
                            <th>巴黎舞會</th>
                            <th>落日台北站</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admin as $row)
                        <tr class="gradeX">
                            <td>{{$row->id}}</td>
                                <td>{{$row->account}}</td>
                                <td>{{$row->created_at}}</td>
                                <td>@if($row->admin) yes @else no @endif</td>
                                <td>@if($row->giftadd) yes @else no @endif</td>
                                <td>@if($row->thegreattipsy) yes @else no @endif</td>
                                <td>@if($row->oldview) yes @else no @endif</td>
                                <td>@if($row->clubtomorrow) yes @else no @endif</td>
                                <td>@if($row->tgt2) yes @else no @endif</td>
                                <td>@if($row->dark3) yes @else no @endif</td>
                                <td>@if($row->terminal) yes @else no @endif</td>
                                <td>@if($row->paris) yes @else no @endif</td>
                                <td>@if($row->terTP) yes @else no @endif</td>
                            <td class="actions">
                                <a href="#" class="hidden on-editing save-row"><i class="fa fa-save"></i></a>
                                <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>
                                <a href="/admin/{{ $row->id }}/edit" class="on-default edit-row"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:{}" onclick="document.getElementById('my_form{{ $row->id }}').submit();" class="on-default remove-row"><i class="fa fa-trash-o"></i></a>
                                <form id="my_form{{ $row->id }}" method="post" action="/admin/{{ $row->id }}">
                                    {!! csrf_field() !!}<input name="_method" type="hidden" value="DELETE"> <!--刪除的偽方法-->
                                </form><!-- csrf_field() 防止跨網域的攻擊-->
                            </td>
                        </tr>
                        @endforeach
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
@include('backstage.jquery')
</body>
</html>
