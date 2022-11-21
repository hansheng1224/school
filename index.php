<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學生管理系統</title>
    <link rel="stylesheet" href="style01.css">

    <?php
    $dsn = "mysql:host=localhost;charset=utf8;dbname=school";
    $pdo = new PDO($dsn, 'root', '');


    if (isset($_GET['code'])) {
        $sql = "SELECT `students`.`id`,
                `students`.`school_num` as '學號',
                `students`.`name` as '姓名',
                `students`.`birthday` as '生日',
                `students`.`graduate_at` as '畢業國中' 
                FROM `students`,`class_student` 
                WHERE `class_student`.      `school_num`=`students`.`school_num` &&     `class_code`='{$_GET['code']}'";
        $sql_total = "SELECT count(`students`.`id`)
                FROM `students`,`class_student` 
                WHERE `class_student`.      `school_num`=`students`.`school_num` &&     `class_code`='{$_GET['code']}'";
    }else{
        $sql = "SELECT `students`.`id`,
                `students`.`school_num` as '學號',
                `students`.`name` as '姓名',
                `students`.`birthday` as '生日',
                `students`.`graduate_at` as '畢業國中' 
                FROM `students`";
        $sql_total = "SELECT count(`students`.`id`)
                FROM `students`";  
    }

    $div=10;
    $total=$pdo->query($sql_total)->fetchColumn();
    echo "總筆數為:".$total;
    // echo "總筆數為:".$sql_total;

    $pages=ceil($total/$div);
    echo "總頁數為:".$pages;
    $now=(isset($_GET['page']))?$_GET['page']:1;
    //$now=$_GET['page']??1;
    echo "當前頁為:".$now;
    $start=($now-1)*$div;
    $sql=$sql."LIMIT $start,$div";


    $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    ?>
</head>

<body>
    <h1 style="text-align:center">學生管理系統</h1>
    <nav>
        <a href="add.php">新增學生</a>
        <a href="login.php">教師登入</a>
        <a href="reg.php">教師註冊</a>
    </nav>

    <nav>
    <ul class="class-list">
    <?php
        $sql="SELECT `id`,`code`,`name` FROM `classes`";
        $classes=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach($classes as $class){
            echo "<li><a href='?code={$class['code']}'>{$class['name']}</a></li>";
        }
    ?>    
    </ul>
    </nav>

    <?php
    // echo "<pre>";
    // print_r($rows);
    // echo "</pre>"
    ?>

    <?php
    if(isset($_GET['status'])){
        switch($_GET['status']){
            case 'add_success':
                echo "<span style='color:green'>新增學生成功</span>";
            break;
            case 'add_fail':
                echo "<span style='color:red'>新增學生有誤</span>";
            break;
        }
    }


    ?>


    <table class='list-students'>
        <tr>
            <td>學號</td>
            <td>姓名</td>
            <td>生日</td>
            <td>畢業國中</td>
            <td>年齡</td>
            <td>操作</td>

        </tr>
        <?php
        foreach ($rows as $row) {
            $age = round((strtotime('now') - strtotime($row['生日'])) / (60 * 60 * 24 * 365), 1);

            echo "<tr>";
            echo "<td>{$row['學號']}</td>";
            echo "<td>{$row['姓名']}</td>";
            echo "<td>{$row['生日']}</td>";
            echo "<td>{$row['畢業國中']}</td>";
            echo "<td>$age</td>";
            echo "<td>";
            echo "<a href='edit.php?id={$row['id']}'>編輯</a>";
            echo "<a href='del.php?id={$row['id']}'>刪除</a>";

            echo "</td>";
            echo "</tr>";
        }

        ?>
    </table>
</body>

</html>