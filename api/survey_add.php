<?php
include_once "../DB/base.php";

// $subject=$_POST['subject'];
// $type=1;
// $vote=0;
// $active=0;
// insert('survey_subject',['subject'=>$subject,'type'=>$type,'vote'=>$vote,'active'=>$active]);

$subject=['subject'=>$_POST['subject'],'type'=>1,'vote'=>0,'active'=>0];
insert('survey_subject',$subject);

$subject_id=find('survey_subject',['subject'=>$POST['subject']])['id'];

if(isset($_POST['opt'])){
    foreach($_POST['opt'] as $option){
        if($option!=''){
            $tmp=['opt'=>$option,'subject_id'=>$subject_id,'vote'=>0];
        dd($tmp);
        insert('survey_options',$tmp);
        }    
    }
}

header("location:../admin_center.php?do=survey");
?>