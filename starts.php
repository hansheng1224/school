<h3>使用function印星星</h3>
<pre>
<?php

starts('正三角形',10);
starts('菱形',21);
starts('矩形',9);
starts('直角三角形',12);

function starts($shape,$size){
switch($shape){

    case "正三角形" :
        for($i=1;$i<=$size;$i++){
        for($k=1;$k<=($size-$i);$k++){
            echo "&nbsp;";
        }
        for($j=1;$j<=(2*$i-1);$j++){
            echo "*";
        }
        echo "<br>";
        }
    break;
    case "菱形" :
    break;
    case "矩形" :
    break;
    case "正三角形" :
    break;
    }
}
?>
</pre>