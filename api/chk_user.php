<?php
include "../DB/base.php";
session_start();

$acc = $_POST['acc'];
$pw = $_POST['pw'];

$sql = "SELECT count(`id`) FROM `users` WHERE `acc`='$acc' && `pw`='$pw'";
$chk = $pdo->query($sql)->fetchColumn();

//echo $chk;

if ($chk == 1) {
    $sql = "SELECT * from`users` WHERE `acc`='$acc' && `pw`='$pw'";
    // $sql="SELECT `id`,`acc`,`pwd`,`name`,`last_login` from`users` WHERE `acc`='$acc' && `pwd`='$pwd'";
    $user = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    

    $_SESSION['login']=$user;
    header("location:../admin_center.php");
    //  echo "<pre>";
    //  print_r($_SESSION['login']);
    //  echo "</pre>";
}else{
    if(isset($_SESSION['login_try'])){
        $_SESSION['login_try']++;
    }else{
        $_SESSION['login_try']=1;
    }
    header("location:../index.php?do=login&error=login");
}
?>