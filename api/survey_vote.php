<?php
include_once "../db/base.php";

$option_id=$_POST['option'];
$option=find('survey_options',$option_id);
dd($option);
$subject=find("survey_subject",$option['subject_id']);

$subject['vote']++;
$option['vote']++;

update("survey_subject",$subject,$subject['id']);
update("survey_options",$option,$option['id']);

to("../index.php?do=survey_result&id={$subject['id']}");


?>