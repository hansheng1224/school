<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,'root','');

$school_num=$_POST['school_num'];
$name=$_POST['name'];
$birthday=$_POST['birthday'];
$uni_id=$_POST['uni_id'];
$addr=$_POST['addr'];
$parents=$_POST['parents'];
$tel=$_POST['tel'];
$dept=$_POST['dept'];
$graduate_at=$_POST['graduate_at'];
$status_code=$_POST['status_code'];

$class_code=$_POST['class_code'];

$year=2000;

$max_num=$pdo->query("SELECT max(`seat_num`) FROM `class_student` WHERE `class_code`='$class_code'")->fetchColumn();

$seat_num=$max_num+1;


$sql="INSERT INTO `students`(`id`,`school_num`,`name`,`birthday`,`uni_id`,`addr`,`parents`,`tel`,`dept`,graduate_at`,`status_code`)VALUES(NULL,'$school_num',$name',$birthday','$uni_id','$addr','$parents','$tel','$dept','$graduate_at','$status_code')";

$sql_class="INSERT INTO `class_student`(`school_num`,`class_code`,`seat_num`,`year`) VALUE ('school_num','$class_code','$seat_num','$yeat')";

echo $sql;
echo $sql_class;

$res1=$pdo->exec($sql);
$res2=$pdo->exec($sql_class);

if($res1 && $res2){
    $status='add_success';
}else{
    $status='add_fail';
}
header("location:../index.php?status=$status");
// $res=$pdo->exec($sql);
// echo "新增成功:".$res;
?>