<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $a = $_POST["a"];
        $b = $_POST["b"];
        echo $a+$b,"<br>";
        echo $a-$b,"<br>";
        echo $a*$b,"<br>";
        echo $a/$b,"<br>";
    ?>
</body>
</html>