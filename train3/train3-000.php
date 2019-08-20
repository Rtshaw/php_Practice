<!DOCTYPE html>
<html>
<body>

<form action="train3-000.php" method="post">
    可輸入五位數任意數字, 例如 (12345)：<input type="text" name="number" maxlength="5">
    <input type="submit" value="送出">
</form>
<?php

    function caculate($_in, $mode=true){
        $ary_c = array('零','壹','貳','參','肆','伍','陸','柒','捌','玖');
        $ary_u = array('','拾','佰','仟','','萬');
        $result = "";

        if($mode)
            preg_match_all("/^0*(\d*)\.?(\d*)/", $_in, $ar);
        else
            preg_match_all("/(\d*)\.?(\d*)/", $_in, $ar);
        if($ar[1][0] != ""){
            $str = strrev($ar[1][0]);
            for($i=0; $i<strlen($str); $i++){
                $output[$i] = $ary_c[$str[$i]];
                if($mode){
                    $output[$i] .= $str[$i] != "0"? $ary_u[$i %4] : "";
                    if($str[$i] + $str[$i-1]==0)
                        $output[$i] = "";
                    if($i % 4 == 0){
                        $output[$i] .= $ary_u[4 + floor($i/4)];
                    }
                }
            }
            $result = join("", array_reverse($output)) . $result;

        }
        return $result;
    }
    $input = empty($_POST['number'])? null: $_POST["number"];
    $ary = str_split($input);

    echo caculate($input);
    echo "<br>";

?>



</body>
</html>