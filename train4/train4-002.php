<!DOCTYPE html>
<html>
<body>

<?php

$file = fopen("file.txt", "r");
$x = 6;

$ary=array();
while (!feof($file) && $x!==0){
    if($x===4 || $x===3 || $x===1){
        $line = fgets($file);
        $line = base64_decode($line);
        array_push($ary, $line);
    }else{
        $line = fgets($file);
        array_push($ary, $line);
    }
    $x--;
}
list($name, $identity, $birthday, $phone, $code, $address) = $ary;
echo $name."<br>".$identity."<br>".$birthday."<br>".$phone."<br>".$code."<br>".$address;

fclose($file);

?>


<div><br><br>刪除功能：</div>
<div>說明：輸入與原資料相同即可刪除。</div>
<form action="train4-002.php" method="post">
    <br>
    姓名：<input type="text" name="name"><br>
    身分證號：<input type="text" name="identity"><br>
    生日：<input type="text" name="birthday"><br>
    電話：<input type="text" name="phone"><br>
    郵遞區號：<input type="text" name="code"><br>
    住址：<input type="text" name="address"><br><br>
    <input type="submit" value="刪除">
</form>

<?php

    $fp = fopen("file.txt", "w");
    if($fp){
        if(empty($_POST["name"])){
            $name = $name;
        }else{
            $name = (strcmp($_POST["name"]."\n", $name)==0) ? "\n" : $name;
        }
        if(empty($_POST["identity"])){
            $identity = $identity;
        }else{
            $identity = (strcmp($_POST["identity"]."\n", $identity)==0) ? "\n" : $identity;
        }
        if(empty($_POST["birthday"])){
            $birthday = $birthday;
            $birthday_b64 = base64_encode($birthday)."\n";
        }else{
            $birthday = (strcmp($_POST["birthday"], $birthday)==0) ? "" : $birthday;
            $birthday_b64 = strcmp($birthday, "")==0 ? "\n" : base64_encode($birthday)."\n";
        }
        if(empty($_POST["phone"])){
            $phone = $phone;
            $phone_b64 = base64_encode($phone)."\n";
        }else{
            $phone = (strcmp($_POST["phone"], $phone)==0) ? "" : $phone;
            $phone_b64 = strcmp($_POST["phone"], $phone)==0 ? "\n" : base64_encode($phone)."\n";
        }
        if(empty($_POST["code"])){
            $code = $code;
        }else{
            $code = (strcmp($_POST["code"]."\n", $code)==0) ? "\n" : $code;
        }
        if(empty($_POST["address"])){
            $address = $address;
            $address_b64 = base64_encode($address)."\n";
        }else{
            $address = (strcmp($_POST["address"], $address)==0) ? "" : $address;
            $address_b64 = strcmp($_POST["address"], $address)==0 ? "\n" : base64_encode($address)."\n";
        }


        echo $name."<br>".$identity."<br>".$birthday."<br>".$phone."<br>".$code."<br>".$address;
        fwrite($fp, $name);
        fwrite($fp, $identity);
        fwrite($fp, $birthday_b64);
        fwrite($fp, $phone_b64);
        fwrite($fp, $code);
        fwrite($fp, $address_b64);

        fclose($fp);

    }


?>
</body>
</html>