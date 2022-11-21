<?php
$dsn = "mysql:host=localhost;charset=utf8;dbname=school";
$pdo = new PDO($dsn, 'root', '');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增學生</title>
</head>

<body>
    <h1>新增學生</h1>
    <form action="api/add_student.php" method="post">
        <table>

            <tr>
                <td>學號</td>
                <?php
                // $sql="SELECT * FROM `students`";
                $sql="SELECT max(`school_num`) FROM `students`";
                $max=$pdo->query($sql)->fetchColumn();

                // $rows=$pdo->query($sql)->fetchAll();
                // $row=$pdo->query($sql)->fetch();

                // echo "<pre>";
                // echo "fetchColumn";
                // echo "<hr>";
                // print_r($max);
                // echo "fetchAll";
                // echo "<hr>";
                // print_r($rows);
                // echo "fetch";
                // echo "<hr>";
                // print_r($row);
                // echo "</pre>";
                
                ?>
                <td><input type="text" name="school_num" id="" value="<?=$max+1;?>"></td>
            </tr>
            <tr>
                <td>名子</td>
                <td><input type="text" name="name" id=""></td>
            </tr>
            <tr>
                <td>生日</td>
                <td><input type="date" name="birthday" id=""></td>
            </tr>
            <tr>
                <td>身分證號</td>
                <td><input type="text" name="uni_id" id=""></td>
            </tr>
            <tr>
                <td>地址</td>
                <td><input type="text" name="addr" id=""></td>
            </tr>
            <tr>
                <td>家長</td>
                <td><input type="text" name="parents" id=""></td>
            </tr>
            <tr>
                <td>電話</td>
                <td><input type="text" name="tel" id=""></td>
            </tr>
            <tr>
                <td>科系</td>
                <!-- <td><input type="number" name="dept" id=""></td> -->
                <td>
                    <select name="dept" id="">
                        <?php
                        $sql = "SELECT * FROM `dept`";
                        $depts = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($depts as $dept) {
                            echo "<option value='{$dept['id']}'>{$dept['name']}</option>";
                        }
                        ?>
                    </select>
                </td>
                <!-- <select name="" id="">
                    <option value="1">商業經營科</option>
                    <option value="2">國際貿易科</option>
                    <option value="3">資料處理科</option>
                    <option value="4">幼兒保育科</option>
                    <option value="5">美容科</option>
                    <option value="6">室內佈置科</option>
                </select> -->
            </tr>
            <tr>
                <td>畢業國中</td>
                <!-- <td><input type="number" name="graduate_at" id=""></td> -->
                <td>
                <select name="graduate_at" id="">
                    <?php
                        $sql="SELECT * FROM `graduate_school`";
                        $grads=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                        foreach($grads as $grad){
                            echo "<option value='{$grad['id']}'>{$grad['county']}{$grad['name']}</option>";
                        }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>status_code</td>
                <!-- <td><input type="text" name="status_code" id=""></td> -->
                <td>
                <select name="status_code" id="">
                    <?php
                        $sql="SELECT * FROM `status`";
                        $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                        foreach($rows as $row){
                            echo "<option value='{$row['code']}'>{$row['status']}</option>";
                        }
                    ?>
                </select>
                </td>
            </tr>
            <tr>
                <td>班級</td>
                <td>
                <select name='class_code' onchange='update.php'>
                <?php
                $sql="SELECT `id`,`code`,`name`
                FROM `classes`";
                $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
                foreach($rows as $row){
                    echo "<option value='{$row['code']}'>{$row['name']}</option>";
                }
                ?>
                </select>
                </td>
            </tr>
            
        </table>
        <input type="submit" value="確認新增">
    </form>
</body>

</html>