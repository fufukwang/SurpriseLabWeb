<!--這頁會接收 Controllers 傳過來的變數 $news-->
<form method="post" action="/news/{{ $news->id }}"> <!--顯示傳來的變數中的id值-->
    {!! csrf_field() !!}<input name="_method" type="hidden" value="PUT"><!--修改的偽方法-->
    <label>標題<input type="text" name="title" value="{{ $news->title }}"> </label><!--顯示傳來的變數中的title值-->
    <input type="submit" value="修改">
</form>