<nav>
    <!-- <pre style="text-align:left!important"> -->
    <?php //print_r($_SERVER);?>
    <!-- </pre> -->

<?php
$local=strrchr($_SERVER['PHP_SELF'],'/');
echo $local;
echo "<br>";
$local=str_replace(['/','.php'],'',$local);
echo $local;
echo "<br>";
// $local=str_replace(['/練習PHP/1112-PHP-MYSQL/','.php'],'',$_SERVER['PHP_SELF']);
switch($local){
    case "index":
        echo "<a href='reg.php'>教師註冊</a>";
        echo "<a href='login.php'>教師登入</a>";
        break;
    case "admin_center":
        echo "<a href='admin_center.php?do=add'>新增學生</a>";
        echo "<a href-'logout.php'>教師登出</a>";
        break;
}
?>

    <!-- <a href="add.php">新增學生</a>
    <a href="login.php">教師登入</a>
    <a href="reg.php">教師註冊</a> -->
</nav> 