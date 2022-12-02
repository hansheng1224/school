<nav class='container d-flex justify-content-between py-3 shadow mb-5>
    <!-- <pre style="text-align:left!important">
    <?php //print_r($_SERVER);?>
    </pre>  -->
<?php
$local=strrchr($_SERVER['PHP_SELF'],'/');
//  echo $local;
//  echo "<br>";
$local=str_replace(['/','.php'],'',$local);
//  echo $local;
//  echo "<br>";
// $local=str_replace(['/練習PHP/1112-PHP-MYSQL/','.php'],'',$_SERVER['PHP_SELF']);
switch($local){
    case "index" :
        echo "<div><a href=''></a></div>";
        
        echo "<div>";
        echo "<a class='mx-2' href='index.php'>回首頁</a>";
        echo "</div>";
        echo "<div>";
        echo "<!------新功能預定------>";
        echo "<a href='index.php?do=main'>最新消息</a>";
        echo "</div>";
        echo "<div>";
        echo "<a href='index.php?do=students_list'>學生列表</a>";
        echo "</div>";

        echo "<div>";
        if(isset($_SEESION['login'])){
            echo "<a href='admin_center.php'>回管理中心</a>";
            echo "<a href='logout.php'>教師登出</a>";
        }else{
            echo "<a href='./index.php?do=reg'>教師註冊</a>";
            echo "<a href='./index.php?do=login'>教師登入</a>";
        }
        echo "</div>";
    break;
    case "admin_center":
        echo "<div><a href=''></a></div>";

        echo "<div>";
        echo "<a href='admin_center.php'>回管理首頁</a>";
        echo "<a href='index.php'>回網站首頁</a>";
        echo "</div>";
        echo "<div>";
        echo "<a href='admin_center.php?do=students_list'>學生管理</a>";
        echo "<a href='admin_center.php?do=news'>新聞管理</a>";
        echo "</div>";
        echo "<div>";
        // echo "<a href='admin_center.php?do=add'>新增學生</a>";
        echo "<a href='logout.php'>教師登出</a>";
        echo "</div>";
    break;
}
?>

    <!-- <a href="add.php">新增學生</a>
    <a href="login.php">教師登入</a>
    <a href="reg.php">教師註冊</a> -->
</nav> 
