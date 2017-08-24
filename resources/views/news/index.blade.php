<a href="/news/create">新增</a>
@foreach($news as $row) <!--$row 是自定名稱-->
<div>
    {{ $row->title }} <!--title是資料庫欄位名稱-->
    <a href="/news/{{ $row->id }}/edit">修改</a><!--id是資料庫欄位名稱-->
    <form method="post" action="/news/{{ $row->id }}">
        {!! csrf_field() !!}<input name="_method" type="hidden" value="DELETE"> <!--刪除的偽方法-->
    <input type="submit" value="刪除">
    </form><!-- csrf_field() 防止跨網域的攻擊-->
</div>
@endforeach