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

<div><br><br>修改功能：</div>
<form action="train4-001.php" method="post">
    <br>
    姓名：<input type="text" name="name"><br>
    身分證號：<input type="text" name="identity"><br>
    生日：<input type="text" name="birthday"><br>
    電話：<input type="text" name="phone"><br>
    郵遞區號：<input type="text" name="code"><br>
    住址：<input type="text" name="address"><br><br>
    <input type="submit" value="修改">
</form>

<?php

    $fp = fopen("file.txt", "r+");
    if($fp){
        $name = empty($_POST["name"])?$name: $_POST["name"];
        $identity = empty($_POST["identity"])?$identity: $_POST["identity"];
        $birthday = empty($_POST["birthday"])?$birthday: $_POST["birthday"];
        $phone = empty($_POST["phone"])?$phone: $_POST["phone"];
        $code = empty($_POST["code"])?$code: $_POST["code"];
        $address = empty($_POST["address"])?$address: $_POST["address"];

        $birthday_b64 = base64_encode($birthday);
        $phone_b64 = base64_encode($phone);
        $address_b64 = base64_encode($address);


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
