<form method="post" action="/email">
    {!! csrf_field() !!}
    <label>Name<input type="text" name="name"> </label>
    <label>Email<input type="text" name="email"> </label>
    <input type="hidden" value="nolight" name="nolight">
    <input type="submit" value="新增">
</form>