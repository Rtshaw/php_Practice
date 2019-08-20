<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<form action="train2.php" method="post">
    年: <input type="text" name="year">
    月: <input type="text" name="month">
    日: <input type="text" name="day">
    <input type="submit" value="send">
</form>
<?php
$year = $_POST["year"];
$month = $_POST["month"];
$day = $_POST["day"];

// 判斷閏年
function IsLeapYear($_y){
    return ($_y%400==0||(($_y%4==0)&&($_y%100!==0)));
}
// 判斷星期幾
function WhatWeekday($_y, $_m){
    // 12月份
    $days=array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    if(IsLeapYear($_y)){
        $days[1]+=1;
    }

    $whatd = $days[$_m-1];
    for($i=0; $i<$_m-1; $i++){
        $whatd += $days[$i];
    }
    $whatd += $_y + $_y/4 - $_y/100 + $_y/400 - 3;

    $whatd += 7; // 避免負值
    $whatd %= 7;
    return $whatd;
}

function WhatWeekday2($_y, $_m){
    // 12月份
    $days=array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    if(IsLeapYear($_y)){
        $days[1]+=1;
    }

    $whatd = $days[$_m-1];
    for($i=0; $i<$_m-1; $i++){
        $whatd += $days[$i];
    }
    $whatd += $_y + $_y/4 - $_y/100 + $_y/400 - 4;

    $whatd += 7; // 避免負值
    $whatd %= 7;
    return $whatd;
}

function WeekList(){
    $weekary = array('日', '一', '二', '三', '四', '五', '六');

    echo "<tr>";
    for($i=0; $i<count($weekary); $i++)
        echo '<th class="fontb">'.$weekary[$i].'</th>';
    echo "</tr>";
}

function DayList($_y, $_m, $_d){
    $days=array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    $weekday = WhatWeekday($_y, $_m);
    echo "<tr>";
    for($i=0; $i<$weekday; $i++){
        echo "<th>"." "."</th>";
    }
    for($i=1, $count=$weekday+1; $i<=$days[$_m-1]; $i++, $count++){
        if($_d==$i){
            echo "<th><font color='#ff4500'> " .$i. "</font></th>";
        }else{
            echo "<th>". $i ."</th>";
        }
        if($count % 7 === 0){
            echo "</tr><tr>";
        }
    }
}

function WeekList2(){
    $weekary = array( '一', '二', '三', '四', '五', '六', '日');

    echo "<tr>";
    for($i=0; $i<count($weekary); $i++)
        echo '<th class="fontb">'.$weekary[$i].'</th>';
    echo "</tr>";
}

function DayList2($y, $m, $d){
    $days=array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    $weekday = WhatWeekday2($y, $m);
    echo "<tr>";
    for($i=0; $i<$weekday; $i++){
        echo "<th>"." "."</th>";
    }
    for($i=1, $count=$weekday+1; $i<=$days[$m-1]; $i++, $count++){
        if($d==$i){
            echo "<th><font color='#ff4500'> " .$i. "</font></th>";
        }else{
            echo "<th>". $i ."</th>";
        }
        if($count % 7 === 0){
            echo "</tr><tr>";
        }
    }
}

function Calendar($_y, $_m, $_d){
    $days=array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

    if($_y&&$_m&&$_d){
        if($_y>0 && $_m>0 && $_m<13 && $_d>0 && $_d<=$days[$_m-1]){
            echo "$_y 年 $_m 月 $_d 日". "<br><br>" ;
            echo "<table>";
            WeekList();
            DayList($_y, $_m, $_d);
            echo "</table>";
            echo "<br>";
            echo "<table>";
            WeekList2();
            DayList2($_y, $_m, $_d);
            echo "</table>";
        }else{
            echo "輸入日期錯誤";
        }
    }
    return 0;
}

Calendar($year, $month, $day);
?>

</body>
</html>