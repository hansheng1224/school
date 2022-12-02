<h1>資料庫常用自訂函式</h1>
<h3>all()-存取指定條件的多筆資料-1</h3>
<?php
include_once "./db/base.php";


// $rows=all('students',['dept'=>1,'graduate_at'=>1]," ORDER BY `id` desc");
// dd($rows);

// $rows=find('table',200);
// dd($rows);
//$rows=find('students',['name'=>'林玟玲']);
//dd($rows);

 //update('students',['name'=>'陳小春','dept'=>'2','graduate_at'=>'3']);
 //del('students',18);

 $result=q("select count(id) from `students` ");
echo $result[0][0];

$students=q("SELECT `students`.`id`,
                    `students`.`school_num` as '學號',
                    `students`.`name` as '姓名',
                    `students`.`birthday` as '生日',
                    `students`.`graduate_at` as '畢業國中'
                    FROM `class_student`,`students` 
                    WHERE `class_student`.`school_num`=`students`.`school_num` && 
                          `class_student`.`class_code`='101'");

dd($students);


function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

/**
 * pram table - 資料表名稱
 * pram args[0] - where 條件(array)或sql字串
 * pram args[1] - order by limit 之類的sql 字串
 */

function all($table,...$args){
    global $pdo;
    $sql="select * from $table ";

    if(isset($args[0])){
        if(is_array($args[0])){
            //是陣列 ['acc'=>'mack','pw'=>'1234'];
            foreach($args[0] as $key => $value){
                $temp[]="`$key`='value'";
            }

            $sql=$sql." WHERE ".join(' && ',$temp);
        }else{
            //是字串
            $sql=$sql . $args[0];
        }
    }

    if(isset($args[1])){
        $sql=$sql.$args[1];
    }

    echo $sql;
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

}

function find($table,$id){
    global $pdo;
    $sql="SELECT * FROM `$table`";
        
    if(is_array($id)){
        foreach($id as $key => $value){
            $temp[]="`$key`='$value'";
        }
        $sql=$sql ." WHERE ". join(' && ',$temp);
    }else{
        $sql=$sql . "WHERE `id`='$id'";
    }

    return $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
}

function update($table,$col,...$args){
    global $pdo;
    $sql="UPDATE `$table` SET ";

    if(is_array($col)){
        foreach($col as $key => $value){
            $temp[]="`$key`='$value'";
        }
        $sql=$sql . join(' , ',$temp);
    }else{
        echo "資料提供錯誤，請提供陣列資料";
    }

    if(isset($args[0])){
        if(is_array($args[0])){
            //是陣列 ['acc'=>'mack','pw'=>'1234'];
            foreach($args[0] as $key => $value){
                $temp[]="`$key`='value'";
            }

            $sql=$sql." WHERE ".join(' && ',$temp);
        }else{
            //是字串
            $sql=$sql . "WHERE `id` = '{$args[0]}'";
        }
    }

    

    echo $sql;
    return $pdo->exec($sql);
}

function insert($table,$cols){
    global $pdo;
    $keys=array_keys($cols);

    $sql="INSERT INTO $table (`" .join("`,`",$keys) . "`) VALUES ('" . join("','",$cols) . "')";

    echo $sql;
    return $pdo->exec($sql);
}

function del($table,$id){
    global $pdo;
    $sql="DELETE FROM `$table`";

    if(is_array($id)){
        foreach($id as $key => $value){
            $temp[]="`$key`='value'";
        }
        $sql = $sql . " WHERE " .join(" && ",$temp);
    }else{
        $sql=$sql." WHERE `id`='$id'";
    }
    echo $sql;
    return $pdo->exec($sql);
}

function q($sql){
    global $pdo;
    return $pdo->query($sql)->fetchAll();
}
?>