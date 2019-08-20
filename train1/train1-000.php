<!DOCTYPE html>
<html>
<body>

<?php

    echo "1 正方形"."<br>";
    echo "<table>";
    for ($x=0; $x<10; $x++){
        echo "<td>";
        for ($y = 0; $y < 10; $y++) {
            if($x==0&&$y==0){
                echo "&nbsp;x ";
            }else if($x==0){
                echo "&nbsp;". 1*$y." ";
            }else if($y==0){
                echo "&nbsp;". 1*$x." ";
            }else{
                echo  "&nbsp;". $x * $y . "&nbsp;";
            }
            echo "<br>";
        }
        echo "</td>";
    }
    echo "</table><br>";

    echo "2 上三角形"."<br>";
    echo "<table>";
    for ($x=0; $x<10; $x++){
        echo "<td>";
        for ($y = 0; $y < 10; $y++) {
            if($x==0&&$y==0){
                echo "&nbsp;x ";
            }else if($x==0){
                echo "&nbsp;". 1*$y." ";
            }else if($y==0){
                echo "&nbsp;". 1*$x." ";
            }else{
                if($x==1&&$y==1){
                    echo "&nbsp;". $x * $y ;
                }
                else if($x>1&&$y<$x+1){
                    echo  "&nbsp;". $x * $y;
                } else{
                    echo " ";
                }
            }
            echo "<br>";
        }
        echo "</td>";
    }
    echo "</table><br>";

    echo "3 下三角形"."<br>";
    echo "<table>";
    for ($x=0; $x<10; $x++){
        echo "<td>";
        for ($y = 0; $y < 10; $y++) {
            if($x==0&&$y==0){
                echo "&nbsp;x ";
            }else if($x==0){
                echo "&nbsp;". 1*$y." ";
            }else if($y==0){
                echo "&nbsp;". 1*$x." ";
            }else{
                if($x==1&&$y==1){
                    echo "&nbsp;". $x * $y ;
                }
                else if($y>1&&$x<$y+1){
                    echo  "&nbsp;". $x * $y;
                } else{
                    echo " ";
                }
            }
            echo "<br>";
        }
        echo "</td>";
    }
    echo "</table><br>";

    echo "4 雙排"."<br>";
    echo "<table>";
    for ($x=2; $x<6; $x++){
        echo "<td>";
        for ($y = 1; $y < 10; $y++) {
            echo  "$x" . "x$y=". $x * $y . " ";
            echo "<br>";
        }
        echo "</td>";
    }
    echo "</table>";
    echo "<br>";
    echo "<table>";
    for ($x=6; $x<10; $x++){
        echo "<td>";
        for ($y = 1; $y < 10; $y++) {
            echo  "$x" . "x$y=". $x * $y . " ";
            echo "<br>";
        }
        echo "</td>";
    }
    echo "</table><br>";
    echo "5 上三角形 左折"."<br>";
    echo "<table>";
    for ($x=0; $x<11; $x++){
        echo "<td>";
        for ($y = 0; $y < 7; $y++) {
            if($x==0&&$y==0){
                echo "&nbsp;x ";
            }else if($x==0 && $y<2){
                echo "&nbsp;". 1*$y." ";
            }else if($x==0 && $y>2){
                echo "&nbsp;" . 1 * ($y+4) . " ";
            }else if($y==0){
                echo "&nbsp;". 1*$x." ";
            }else{
                if($x==1&&$y==1){
                    echo "&nbsp;". $x * $y ;
                }else if($x>1&&$y<=$x){
                    echo  "&nbsp;". $x * $y . "&nbsp;&nbsp;&nbsp;";
                }else{
                    for($i=1; $i<6; $i++){
                        if($x==$i&&$y==$x+1&&$i!==5){
                            echo $y+5 . "\\" . $y ;
                        }else if($x==$i&&$y==$x+1&&$i==5){
                            echo "&nbsp;" . $y;
                        }
                    }
                    for($i=7; $i<11; $i++){
                        if($x==$i-6 && $y > $i-5){
                            echo ($x+6)*($y+4);
                        }
                    }
                    echo " ";
                }
            }
            echo "<br>";
        }
        echo "</td>";
    }
    echo "</table><br>";
?>

</body>
</html>