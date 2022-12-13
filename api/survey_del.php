<?php
include_once "../DB/base.php";

$id=$_GET['id'];

//$option=all("survey_options",['subject_id'=>$id]);

del("survey_subject",$id);
del("survey_options",['subject_id'=>$id]);


header("location:../admin_center.php?do=survey");
?>