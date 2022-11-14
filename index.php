<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>學生管理系統</title>
    <link rel="stylesheet" href="style.css">
    <?php
    $dsn = "mysql:host=localhost;charset=utf8;dbname=school";
    $pdo = new PDO($dsn, 'root', '');

    $sql = "SELECT * FROM `students` LIMIT 20";

    $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    ?>
</head>

<body>
    <h1>學生管理系統</h1>
    <nav>
    <a href="add.php">新增學生</a>
    <a href="login.php">教師登入</a>
    <a href="reg.php">教師註冊</a>
    </nav>
    
    

    <?php
    // echo "<pre>";
    // print_r($rows);
    // echo "</pre>"
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
            $age = round((strtotime('now') - strtotime($row['birthday'])) / (60 * 60 * 24 * 365), 1);

            echo "<tr>";
            echo "<td>{$row['school_num']}</td>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['birthday']}</td>";
            echo "<td>{$row['graduate_at']}</td>";
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