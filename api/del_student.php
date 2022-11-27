<?php
include "./DB/base.php";

// $sql="DELETE FROM `students` WHERE `name`='陳彥明'";
$student=$pdo->query("SELECT * FROM `students` WHERE `id` = '{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
$sql_class="DELETE FROM `class_student` WHERE `school_num` = '{$student['school_num']}'";
$sql_student="DELETE FROM `students` WHERE `id` = '{$_GET['id']}'";

echo $sql_class;
echo $sql_student;

$res_class=$pdo->exec($sql_class);
$res_student=$pdo->exec($sql_student);
echo $res_class;
echo "<br>";
echo $res_student;
echo "<br>";
echo "刪除成功:";

header("location:../index.php?del=已成功刪除學生{$student['name']}的所有資料！！");
?>