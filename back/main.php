<?php
if(isset($_GET['del'])){
    echo "<div class='del-msg'>";
    echo $_GET['del'];
    echo "</div>";
}
?>
<?php

include "./layouts/class_nav.php";
?>

<?php
    if (isset($_GET['code'])) {
        $sql = "SELECT `students`.`id`,
                `students`.`school_num` as '學號',
                `students`.`name` as '姓名',
                `students`.`birthday` as '生日',
                `students`.`graduate_at` as '畢業國中' 
                FROM `students`,`class_student` 
                WHERE `class_student`.`school_num`=`students`.`school_num` && `class_code`='{$_GET['code']}'";
        $sql_total = "SELECT count(`students`.`id`)
                FROM `students`,`class_student` 
                WHERE `class_student`.`school_num`=`students`.`school_num` &&  `class_code`='{$_GET['code']}'";
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
    //echo "總筆數為:".$total;
    // echo "總筆數為:".$sql_total;

    $pages=ceil($total/$div);
    //echo "總頁數為:".$pages;
    $now=(isset($_GET['page']))?$_GET['page']:1;
    //$now=$_GET['page']??1;
    //echo "當前頁為:".$now;
    $start=($now-1)*$div;
    $sql=$sql."LIMIT $start,$div";


    $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
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
    <div class="pages">
    <?php
    if(($now-1)>=1){
        $prev=$now-1;
        if(isset($_GET['code'])){
            echo "<a href='?page=$prev&code={$_GET['code']}'>";
            echo "&lt";
            echo "</a>";
        }else{
            echo "<a href='?page=$prev'>";
            echo "&lt";
            echo "</a>";
        }
    }else{
        echo "<a class='noshow'>&nbsp;</a>";
    }
    ?>

<?php
        //顯示第一頁
        if($now>=4){
            if(isset($_GET['code'])){
                echo "<a href='?page=1&code={$_GET['code']}'> ";
                echo "1 ";
                echo " </a>...";
                
            }else{
       
                echo "<a href='?page=1'> ";
                echo "1 ";
                echo " </a>...";
            }
        }
    ?>

<?php 
    //頁碼區
    //只顯示前後四個頁碼

        if($now>=3 && $now<=($pages-2)){  //判斷頁碼在>=3 及小於最後兩頁的狀況
            $startPage=$now-2;
        }else if($now-2<3){ //判斷頁碼在1,2頁的狀況
            $startPage=1;
        }else{  //判斷頁碼在最後兩頁的狀況
            $startPage=$pages-4;
        }

        for($i=$startPage;$i<=($startPage+4);$i++){
            $nowPage=($i==$now)?'now':'';
            if(isset($_GET['code'])){
                echo "<a href='?page=$i&code={$_GET['code']}' class='$nowPage'> ";
                echo $i;
                echo " </a>";
                
            }else{
                echo "<a href='?page=$i' class='$nowPage'> ";
                echo $i;
                echo " </a>";
            }
        }
        ?>

    <!-- <?php
    for($i=1;$i<=$pages;$i++){
        // $nowPageo=($i===$now)?'now':'';
        if(isset($_GET['code'])){
            echo "<a href='?page=$i&code={$_GET['code']}'>";
            echo $i;
            echo "</a>";
        }else{
            echo "<a href='?page=$i'>";
            echo $i;
            echo "</a>";
        }
    }
    ?> -->

    <!-- <?php
    if($now<=($pages)){
        if(isset($_GET['code'])){
            echo "<a href='?page=$pages&code={$_GET['code']}'>";
            echo "$pages";
            echo "</a>";
        }else{
            echo "<a href='?page=$pages'>";
            echo "$pages";
            echo "</a>";
        }
    }
    ?> -->


<?php
        //顯示第最後一頁
        if($now<=($pages-3)){
            if(isset($_GET['code'])){
                echo "...<a href='?page=$pages&code={$_GET['code']}'> ";
                echo "$pages";
                echo " </a>";
                
            }else{
       
                echo "...<a href='?page=$pages'> ";
                echo "$pages";
                echo " </a>";
            }
        }
    ?>
    <?php
    if(($now+1)<=$pages){
        $next=$now+1;
        if(isset($_GET['code'])){
            echo "<a href='?page=$next&code={$_GET['code']}'>";
            echo "&gt";
            echo "</a>";
        }else{
            echo "<a href='?page=$next'>";
            echo "&gt";
            echo "</a>";
        }
    }else{
        echo "<a class='noshow'>&nbsp</a>";
    }
    ?>
    </div>

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
            echo "<a href='./back/edit.php?id={$row['id']}'>編輯</a>";
            echo "<a href='./back/confirm.php?id={$row['id']}'>刪除</a>";
            // echo "<a href='./api/del_student.php?id={$row['id']}'>刪除</a>";
            // echo "<a href='del.php?id={$row['id']}'>刪除</a>";

            echo "</td>";
            echo "</tr>";
        }

        ?>
    </table>