<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,'root','');

echo "<pre>";
print_r($_POST);
echo "</pre>";

// $school_num=$_POST['school_num'];
$name=$_POST['name'];
$birthday=$_POST['birthday'];
$uni_id=$_POST['uni_id'];
$addr=$_POST['addr'];
$parents=$_POST['parents'];
$tel=$_POST['tel'];
$dept=$_POST['dept'];
$graduate_at=$_POST['graduate_at'];
$status_code=$_POST['status_code'];

//學員所屬班級在另一張資料class_student
$class_code=$_POST['class_code'];

$sql_students="UPDATE `students`
    SET `name`='$name',
        `birthday`='$birthday',
        `uni_id`='$uni_id',
        `addr`='$addr',
        `parents`='$parents',
        `tel`='$tel',
        `dept`='$dept',
        `graduate_at`='$graduate_at',
        `status_code`='$status_code'
    WHERE `is` = '$id'";

$class_code=$_POST['class_code'];
$school_num=$pdo->query("SELECT * from `students` WHERE `id` = '$id'")->fetch(PDO::FETCH_ASSOC);
$class=$pdo->query("SELECT * FROM `class_student` WHERE `school_num`='{$school_num['school_num']}'")->fetch(PDO::FETCH_ASSOC);

$sql_class_student="UPDATE `class_student` SET `class_code` = '$class_code' WHERE `id` = '{$class['id']}'";

// $sql="UPDATE `students` SET `name`='丁于潁',`birthday`='1988-07-14' WHERE `id`='1'";

echo $sql_students;
echo "<br>";
echo $sql_class_student;
echo "<br>";

$res1=$pdo->exec($sql_studemts);
$res2=$pdo->exec($sql_class_student);
echo "編輯成功:";
header("location:../index.php");
?>