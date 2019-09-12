<!DOCTYPE html>
<html>
<body>

<h1>資料修改</h1>
<form action="train4-001.php" method="post">
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
    <input type="submit" value="修改">
</form>


<?php
    echo "<br>";



    $Array = GetList("file.txt");

//    for($i=0; $i<count($Array); $i++){
//        echo "$Array[$i]<br>";
//    }

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
        $fileName = empty($_POST["fileName"]) ? '' : $_POST["fileName"];


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
//                echo "請輸入檔名";
            }
            $j++;

        }

        if($FileNameEmptyCount!==0){
            echo "請輸入檔名<br>";
        }

        $file = fopen("file.txt", "rb");
        $i = 1;
        while ((!feof($file) && $line = trim(fgets($file)))){
            $context = explode(';', $line);
            echo '第'.$i.'筆 '."檔名 ".trim($context[0]).
                " 姓名 ".trim($context[1]).
                " 身份證號 ".trim($context[2]).
                " 生日 ".trim(base64_decode($context[3])).
                " 電話 ".trim(base64_decode($context[4])).
                " 郵遞區號 ".trim($context[5]).
                " 住址 ".trim(base64_decode($context[6])).
                '<br>'
            ;
            $i++;
        }
        echo "<br>共".($i-1)."筆<br>";

        fclose($file);

        if($Counter === count($Array)){
            echo "<br>無該筆資料";
        }


    }





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

fclose($file);

?>


</body>
</html>
