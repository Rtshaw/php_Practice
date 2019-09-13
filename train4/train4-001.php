<!DOCTYPE html>
<html>
<body>

<?php

    $file = fopen('file.txt', "rb");

    $i = 1;
    $C = 0;
    $id = empty($_GET["id"]) ? '': $_GET["id"];
    while ((!feof($file) && $line = trim(fgets($file)))){
        $context = explode(';', $line);
        if($id === trim($context[0])){
            $id = trim($context[0]);
        }else{
            $C++;
        }
        $fileName[] = trim($context[0]);
        $i++;
    }
    fclose($file);
    if($C === count($fileName)){
        header("location:train4-000.php");
    }


    echo "<h1>資料修改</h1>";
    echo "<form action='train4-001.php?id=$id' method='post'>";
    echo "<p>檔案名稱：";
    echo '<input type="text" name="fileName" value="'.$id.'" disabled="disabled"><br>';
    echo '</p>';
    echo '<p>姓名：';
    echo '<input type="text" name="name"><br>';
    echo '</p>';
    echo '<p>身分證號：';
    echo '<input type="text" name="identity"><br>';
    echo '</p>';
    echo '<p>生日：';
    echo '<input type="text" name="birthday"><br>';
    echo '</p>';
    echo '<p>電話：';
    echo '<input type="text" name="phone"><br>';
    echo '</p>';
    echo '<p>郵遞區號：';
    echo '<input type="text" name="code"><br>';
    echo '</p>';
    echo '<p>住址：';
    echo '<input type="text" name="address"><br>';
    echo '</p>';
    echo '<input type="submit" value="修改">';
    echo '</form>';

    echo "<br>";



    $Array = GetList("file.txt");

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


    $file = fopen("file.txt", "a");
    $FullDataArray = file('file.txt');
    if($file){
        $fileName = empty($_POST["fileName"]) ? $id : $_POST["fileName"];


        $j = 0;
        $Counter = 0;
        $FileNameEmptyCount = 0;


        while ($j<count($Array)){
            if($fileName !== ''){
                if($fileName === $Array[$j]){
                    $LineContent = explode(';', $FullDataArray[$j]);

                    $name = empty($_POST["name"]) ? $LineContent[1]: $_POST["name"];
                    $identity = empty($_POST["identity"]) ? $LineContent[2]: $_POST["identity"];
                    $birthday = empty($_POST["birthday"]) ? $LineContent[3]: $_POST["birthday"];
                    $phone = empty($_POST["phone"]) ? $LineContent[4]: $_POST["phone"];
                    $code = empty($_POST["code"]) ? $LineContent[5]: $_POST["code"];
                    $address = empty($_POST["address"]) ? $LineContent[6]: $_POST["address"];

                    $birthday_b64 = empty($_POST["birthday"]) ? $LineContent[3]:base64_encode($birthday);
                    $phone_b64 = empty($_POST["phone"]) ? $LineContent[4] : base64_encode($phone);
                    $address_b64 = empty($_POST["address"]) ? $LineContent[6]: base64_encode($address);


                    $FullDataArray[$j] = "$fileName;$name;$identity;$birthday_b64;$phone_b64;$code;$address_b64";
                    $Text = implode($FullDataArray);
                    file_put_contents('file.txt', $Text);
                }else{
                    $Counter++;
                }
            }else{
                $FileNameEmptyCount++;
            }
            $j++;

        }

        if($FileNameEmptyCount!==0){
            echo "請輸入檔名<br>";
        }

        $file = fopen("file.txt", "rb");
        $i = 1;
        echo "<table border='1'>";
        echo "<thead>";
        echo "<tr>
            <th>檔名</th>
            <th>姓名</th>
            <th>身份證號</th>
            <th>生日</th>
            <th>電話</th>
            <th>郵遞區號</th>
            <th>住址</th>
          </tr></thead>";
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
            echo "<tr>";
            $i++;
        }
        echo "</tbody>";
        echo "<br>共".($i-1)."筆<br><br>";

        fclose($file);

        if($Counter === count($Array)){
            echo "<br>無該筆資料";
        }


    }


?>


</body>
</html>
