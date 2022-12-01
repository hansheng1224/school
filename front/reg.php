<div class="col-md-3 mx-auto my-5 p-5 border shadow-sm">
<h3 class="text-center">教師註冊</h3>
<form action="./api/reg_user.php" method="post">
    <div class="form-group">
        <label  for="">帳號:</label>
        <input class="form-control" type="text" name='acc'>
    </div>
    <div class="form-group">
        <label  for="">密碼:</label>
        <input class="form-control" type="password" name='pw'>
    </div>
    <div class="form-group">
        <label  for="">信箱:</label>
        <input class="form-control"type="email" name='email'>
    </div>
    <div class="form-group">
        <label  for="">姓名:</label>
        <input class="form-control" type="text" name='name'>
    </div>
    <div class="text-center">
        <input class="btn btn-primary mx-2" type="submit" value='註冊'>
        <input class="btn btn-warning mx-2" type="reset" value='重置'>
    </div>
    

</form>
</div>
