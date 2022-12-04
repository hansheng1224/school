<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,'root','');

date_default_timezone_set("Asia/Taipei");

session_start();

// function dd($array){
//     echo "<pre>";
//     print_r($array);
//     echo "</pre>";
// }
?>