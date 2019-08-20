<!DOCTYPE html>
<html>
<body>
<div>
    判斷陣列 (i,you),(am,are),(stduent,teacher)<br>
    替換陣列 (我,你),(是,是),(學生,老師)
</div>
<br>
<form action="train3-001.php" method="post">
    輸入：<input type="text" name="content">
    <input type="submit" value="送出">
</form>
<?php
    $in = $_POST["content"];
    $ary = explode(" ", $in);

    for($x=0; $x<count($ary); $x++){
        switch ($ary[$x]){
            case 'i':
                $ary[$x]='我';
                break;
            case 'you':
                $ary[$x]='你';
                break;
            case 'am':
                $ary[$x]='是';
                break;
            case 'are':
                $ary[$x]='是';
                break;
            case 'student':
                $ary[$x]='學生';
                break;
            case 'teacher':
                $ary[$x]='老師';
                break;
            default:
                break;
        }
    }

    for($i=0; $i<count($ary); $i++){
        echo $ary[$i];
    }

?>
</body>
</html>
