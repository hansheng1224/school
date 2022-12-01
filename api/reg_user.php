<?php
include "../DB/base.php";

$acc=trim(strip_tags($_POST['acc']));
$pw=trim($_POST['pw']);
$name=trim($_POST['name']);
$email=trim($_POST['email']);


$sql="INSERT INTO `users`(`acc`,`pw`,`name`,`email`,`last_login`) VALUES ('$acc','$pw','$name','$email',now())";
echo "acc=>".$acc;
echo "<br>";
echo "password=>".$pw;
echo "<br>";
echo "email=>".$email;
echo "<br>";
echo "name=>".$name;
echo "<br>";

$pdo->exec($sql);
header("location:../index.php?do=login");
?>