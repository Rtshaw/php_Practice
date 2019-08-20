<!DOCTYPE html>
<html>
<body>

<form action="train4-000.php" method="post">
    姓名：<input type="text" name="name"><br>
    身分證號：<input type="text" name="identity"><br>
    生日：<input type="text" name="birthday"><br>
    電話：<input type="text" name="phone"><br>
    郵遞區號：<input type="text" name="code"><br>
    住址：<input type="text" name="address"><br>
    <input type="submit" value="送出">
</form>

<?php

    $name = $_POST["name"]."\n";
    $identity = $_POST["identity"]."\n";
    $birthday = $_POST["birthday"];
    $phone = $_POST["phone"];
    $code = $_POST["code"]."\n";
    $address = $_POST["address"];
    // base64
    $birthday_b64 = base64_encode($birthday)."\n";
    $phone_b64 = base64_encode($phone)."\n";
    $address_b64 = base64_encode($address)."\n";


    $file = fopen("./file.txt", "w");
    if($file){
        fwrite($file, $name);
        fwrite($file, $identity);
        fwrite($file, $birthday_b64);
        fwrite($file, $phone_b64);
        fwrite($file, $code);
        fwrite($file, $address_b64);

        fclose($file);
    }

?>
</body>
</html>
