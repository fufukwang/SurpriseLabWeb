<!--這頁會接收 Controllers 傳過來的變數 $news-->
<form method="post" action="/email/{{ $email->id }}"> <!--顯示傳來的變數中的id值-->
    {!! csrf_field() !!}<input name="_method" type="hidden" value="PUT"><!--修改的偽方法-->
    <label>姓名<input type="text" name="name" value="{{ $email->name }}"> </label><!--顯示傳來的變數中的title值-->
    <label>信箱<input type="text" name="email" value="{{ $email->email }}"> </label><!--顯示傳來的變數中的title值-->
    <input type="submit" value="修改">
</form>