<?php
include "./DB/base.php";

$acc=trim(strip_tags($_POST['acc']));
$pwd=trim($_POST['pwd']);
$name=trim($_POST['name']);
$email=trim($_POST['email']);
$last_login=NULL;

$sql="INSERT INTO `users`(`acc`,`pwd`,`name`,`email`,`last_login`) VALUE ('$acc','$pwd','$name','$email','$last_login')";
echo "acc=>".$acc;
echo "<br>";
echo "password=>".$pwd;
echo "<br>";
echo "email=>".$email;
echo "<br>";
echo "name=>".$name;
echo "<br>";

$pdo->exec($sql);
header("lovation:../login.php");
?>