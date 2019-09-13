<!DOCTYPE html>
<html>
<body>

<h1>資料輸入</h1>
<form action="train4-000.php" method="post">
    <p>
        <label>檔案名稱：
            <input type="text" name="fileName">
        </label><br>
    </p>
    <p>
        <label>姓名：
            <input type="text" name="name">
        </label><br>
    </p>
    <p>
        <label>身分證號：
            <input type="text" name="identity">
        </label><br>
    </p>
    <p>
        <label>生日：
            <input type="text" name="birthday">
        </label><br>
    </p>
    <p>
        <label>電話：
            <input type="text" name="phone">
        </label><br>
    </p>
    <p>
        <label>郵遞區號：
            <input type="text" name="code">
        </label><br>
    </p>
    <p>
        <label>住址：
            <input type="text" name="address">
        </label><br>
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

    function DeleteData($_File, $_ID){

        $FullDataArray = file($_File);

        $Array = GetList($_File);
        $j = 0;
        $FileNameEmptyCount = 0;
        $Counter = 0;
        while ($j<count($Array)){
            if($_ID !== ''){
                if($_ID === $Array[$j]){
                    $name = '';
                    $identity = '';
                    $birthday = '';
                    $phone = '';
                    $code = '';
                    $address = '';

                    $FullDataArray[$j] = "$name$identity$birthday$phone$code$address";
                    $Text = implode($FullDataArray);
                    file_put_contents($_File, $Text);
                }else{
                    $Counter++;
                }
            }else{
                $FileNameEmptyCount++;
            }
            $j++;
        }
        if($Counter === count($Array)){
            header("location:train4-000.php");
        }
    }
    function GetList($_File){

        $fileNameArray = array();
        $file = fopen($_File, "rb");

        $i = 1;
        while ((!feof($file) && $line = trim(fgets($file)))){
            $context = explode(';', $line);
            $fileNameArray[] = trim($context[0]);
            $i++;
        }
        fclose($file);

        return $fileNameArray;
    }

    if(isset($_GET['delete'])){
        DeleteData('file.txt', $_GET['id']);

    }

    $file = fopen("file.txt", "rb");

    echo "<br>目前共有以下資料<br><br>";

    $i = 1;
    echo "<table border='1'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>檔名</th>";
    echo "<th>姓名</th>";
    echo "<th>身份證號</th>";
    echo "<th>生日</th>";
    echo "<th>電話</th>";
    echo "<th>郵遞區號</th>";
    echo "<th>住址</th>";
    echo "<th>動作</th>";
    echo "</tr></thead>";
    echo "<tbody>";
    echo "<tr>";
    while ((!feof($file) && $line = trim(fgets($file)))){
        $context = explode(';', $line);
        echo "<td>".trim($context[0])."</td>";
        echo "<td>".trim($context[1])."</td>";
        echo "<td>".trim($context[2])."</td>";
        echo "<td>".trim(base64_decode($context[3]))."</td>";
        echo "<td>".trim(base64_decode($context[4]))."</td>";
        echo "<td>".trim($context[5])."</td>";
        echo "<td>".trim(base64_decode($context[6]))."</td>";
        $id = trim($context[0]);
        echo "<td>";
        echo "<a href='train4-001.php?id=$id'>修改 </a>";
        echo "<a href='train4-000.php?delete=true&id=$id'>刪除</a></td>";
        echo "<tr>";
        $i++;
    }
    echo "</tbody>";

    fclose($file);

?>
</body>
</html>
