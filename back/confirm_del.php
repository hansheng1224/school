<?php
// include "./DB/base.php";

$student=$pdo->query("SELECT * FROM `students` WHERE `id`='{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);
?>


    <!-- <style>
        body{
            display: flex;
            height:95vh;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .dialog{
            width: 280px;
            height: 200px;
            border: 1px solid red;
            box-shadow: 1px 1px 10px #f2b4b4;
        }
        .msg{
            font-size: 24px;
        }
        .msg span{
            font-weight: bolder;
        }
    </style> -->

    <div class='col-md-4 p-4 mx-auto my-5 border rounded shadow'>
        <div>
        <h1 class='text-center my-2 text-danger'>確認刪除</h1>
        <div class='text-danger my-5 text-center' style="font-size:2rem">你確定要刪除<br><span class="font-weight-border"><?=$student['name'];?></span>嗎?
        </div>
        <br>
        <div class="text-center">
        <button class="btn btn-lg mx-2 btn-danger" onclick="location.href='../api/del_student.php?id=<?=$_GET['id'];?>'">確定刪除</button>
        <button class='btn btn-lg btn-warning' onclick="location.href='../admin_center.php'">取消</button>
        </div>
        </div>
    </div>
    
