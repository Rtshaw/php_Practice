<!DOCTYPE html>
<html>
<body>

<form action="train4-000.php" method="post">
    <p>姓名：
        <input type="text" name="name"><br>
    </p>
    <p>身分證號：
        <input type="text" name="identity"><br>
    </p>
    <p>生日：
        <input type="text" name="birthday"><br>
    </p>
    <p>電話：
        <input type="text" name="phone"><br>
    </p>
    <p>郵遞區號：
        <input type="text" name="code"><br>
    </p>
    <p>住址：
        <input type="text" name="address"><br>
    </p>
    <input type="submit" value="送出">


</form>

<?php

    $name = empty($_POST["name"]) ? '' : $_POST["name"];
    $identity = empty($_POST["identity"]) ? '' : $_POST["identity"];
    $birthday = empty($_POST["birthday"]) ? '' : $_POST["birthday"];
    $phone = empty($_POST["phone"]) ? '' : $_POST["phone"];
    $code = empty($_POST["code"]) ? '' : $_POST["code"];
    $address = empty($_POST["address"]) ? '' : $_POST["address"];
    // base64
    $birthday_b64 = base64_encode($birthday);
    $phone_b64 = base64_encode($phone);
    $address_b64 = base64_encode($address);

    $filename = $name;

    $file = fopen("file.txt", "a");

    if($file){
        fwrite($file, "$name;$identity;$birthday_b64;$phone_b64;$code;$address_b64\r\n");

        fclose($file);
    }

?>
</body>
</html>
