<?php
$sql="SELECT * FROM `news` WHERE `id`='{$_GET['id']}'";
$news=$pdo->query($sql)->fetch();
?>

<h3 class="text-left font-weight-bolder"><?=$news['subject'];?></h3>
<div ></div>