<!DOCTYPE html>
<html>
<body>

<h1>資料輸入</h1>
<form action="train4-000.php" method="post">
    <p>檔案名稱：
        <input type="text" name="fileName"><br>
    </p>
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

    $fileName = empty($_POST['fileName']) ? '' : $_POST['fileName'];
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


    $file = fopen("file.txt", "a");

    if($file){
        if($fileName !== '' && $name !== '' && $identity !== '' && $birthday_b64 !== '' && $phone_b64 !== '' && $code !== '' && $address_b64 !== ''){
            if(IsSameName($fileName)){
                echo "<br>已有相同檔名<br>";
            } else {
                fwrite($file, "$fileName;$name;$identity;$birthday_b64;$phone_b64;$code;$address_b64\r\n");
            }
        } else{
            echo "<br>請輸入資料<br>";
        }
    }

    $file = fopen("file.txt", "rb");

    echo "<br>目前共有以下資料<br><br>";

    $i = 1;
    while ((!feof($file) && $line = trim(fgets($file)))){
        $context = explode(';', $line);
        echo '第'.$i.'筆 '.trim($context[0]).'<br>';
        $i++;
    }

    fclose($file);


    function IsSameName($_FileName){
        $file = fopen("file.txt", "rb");

        $i = 1;
        while ((!feof($file) && $line = trim(fgets($file)))){
            $context = explode(';', $line);

            $i++;
        }

        if ($_FileName === trim($context[0])){
            return true;
        }

        fclose($file);
        return false;

    }

?>
</body>
</html>
