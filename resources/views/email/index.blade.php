<a href="/email/create">新增email</a><br><br>
@foreach($email as $row) <!--$row 是自定名稱-->
<div>
    {{$row->id}},{{$row->name}},{{ $row->email }}  <!--title是資料庫欄位名稱-->
        <a href="/email/{{ $row->id }}/edit">edit</a><!--id是資料庫欄位名稱-->
        <form method="post" action="/email/{{ $row->id }}">
        {!! csrf_field() !!}<input name="_method" type="hidden" value="DELETE"> <!--刪除的偽方法-->
        <input type="submit" value="刪除">
</div>
@endforeach