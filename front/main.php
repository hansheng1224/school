<h1 class='text-center'>最新消息</h1>
<ul class='list-group'>
    <li class='list-group-item list-group-item-action d-flex text-center bg-info text-white'>
        <div class="col-md-10">標題</div>
        <div class='col-ms-2'>人氣</div>
    </li>
<?php
$all_news="SELECT * FROM `news` ORDER BY `top` DESC, `readed` DESC";
$rows=$pdo->query($all_news)->fetchAll();
$hot=$pdo->query("SELECT `id` FROM `news` ORDER BY `readed` DESC")->fetchColumn();


?>

</ul>