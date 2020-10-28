<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Jojonomic</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <table>
            <tr>
                <td>Plain</td>
                <td>:</td>
                <td><input type="text" name="plain" id=""></td>
            </tr>
            <tr>
                <td>K</td>
                <td>:</td>
                <td><input type="text" name="k" id=""></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="submit" value="Kirim"></td>
            </tr>
        </table>
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $plain = $_POST["plain"];
            $k = $_POST["k"];

            encryptedString($plain, $k);
        }

        function encryptedString($plain, $k){
            echo $plain.'<br/>';

            $hasil = [];
            $index = [];

            array_push($hasil, $plain[0]);
            array_push($index, 0);

            for($i = $k; $i < strlen($plain);){
                if(count($hasil) == strlen($plain)){
                    break;
                }else{
                    if(in_array($i, $index)){
                        array_push($hasil, $plain[$i+1]);
                        array_push($index, $i);
                    }else{
                        array_push($hasil, $plain[$i]);
                        array_push($index, $i);
                    }
                    $i = $i+$k;
                    if($i >= strlen($plain)){
                        $i = ($i - strlen($plain));
                    }
                }
            }

            foreach($hasil as $h){
                echo $h;
            }
        }
    ?>
</body>
</html>