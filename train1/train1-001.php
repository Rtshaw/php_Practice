<!DOCTYPE html>
<html>
<body>

<?php

    echo "1 正方形"."<br>";
    echo "<table>";
    $x = 0;
    while ($x<10){
        echo "<td>";
        $y = 0;
        while ($y<10){
            if($x==0&&$y==0){
                echo "&nbsp;x ";
            }else if($x==0){
                echo "&nbsp;". 1*$y." ";
            }else if($y==0){
                echo "&nbsp;". 1*$x." ";
            }else{
                echo  "&nbsp;". $x * $y;
            }
            echo "<br>";
            $y++;
        }
        $x++;
        echo "</td>";
    }
    echo "</table><br>";

    echo "2 上三角形"."<br>";
    echo "<table>";

    $x = 0;
    while($x<10){
        echo "<td>";
        $y = 0;
        while ($y<10){
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
            $y++;
        }
        echo "</td>";
        $x++;
    }
    echo "</table><br>";


    echo "3 下三角形"."<br>";
    echo "<table>";
    $x=0;
    while ($x<10){
        echo "<td>";
        $y=0;
        while ($y<10){
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
            $y++;
        }
        echo "</td>";
        $x++;
    }
    echo "</table><br>";


    echo "4 雙排"."<br>";
    echo "<table>";
    $x = 2;
    while ($x<6){
        echo "<td>";
        $y = 1;
        while ($y<10){
            echo  "$x" . "x$y=". $x * $y . " ";
            echo "<br>";
            $y++;
        }
        echo "</td>";
        $x++;
    }

    echo "</table>";
    echo "<br>";
    echo "<table>";

    $x = 6;
    while ($x<10){
        echo "<td>";
        $y = 1;
        while ($y<10){
            echo  "$x" . "x$y=". $x * $y . " ";
            echo "<br>";
            $y++;
        }
        echo "</td>";
        $x++;
    }

    echo "</table><br>";


    echo "5 上三角形 左折"."<br>";
    echo "<table>";
    $x = 0;
    while($x<11){
        echo "<td>";
        $y = 0;
        while ($y<7){
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
                    $i=1;
                    while ($i<6){
                        if($x==$i&&$y==$x+1&&$i!==5){
                            echo $y+5 . "\\" . $y ;
                        }else if($x==$i&&$y==$x+1&&$i==5){
                            echo "&nbsp;" . $y;
                        }
                        $i++;
                    }
                    $i=7;
                    while ($i<11){
                        if($x==$i-6 && $y > $i-5){
                            echo ($x+6)*($y+4);
                        }
                        $i++;
                    }
                    echo " ";
                }
            }
            echo "<br>";
            $y++;

        }
        echo "</td>";
        $x++;
    }
    echo "</table><br>";
?>

</body>
</html>