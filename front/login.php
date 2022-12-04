<div class="col-sm-3 mx-auto my-5 p-5 border shadows-sm">
<h3 class='text-center'>教師登入</h3>
<?php
// session_start();
if(isset($_GET['error'])){
    // header("location:../index.php?do=login");
    echo "<div>";
    echo "帳號或密碼錯誤:";
    echo "登入嘗試".$_SESSION['login_try']."次";
    echo "</div>";
}
?>


<form action="./api/chk_user.php" method="post">
    <div class="form-group">帳號: <input class="form-control" type="text" name="acc" id=""></div>
    <div class="form-group">密碼: <input class="form-control" type="password" name="pw" id=""></div>
    <div class='text-center'><input class="btn btn-primary" type="submit" value="登入"></div>
</form>

</div>