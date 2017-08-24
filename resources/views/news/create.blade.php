<form method="post" action="/news">
    {!! csrf_field() !!}
    <label>標題<input type="text" name="title"> </label>


    <input type="submit" value="新增">
</form>