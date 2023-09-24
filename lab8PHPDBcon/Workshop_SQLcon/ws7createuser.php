<?php include "connect.php" ?>
<?php
    $stmt = $pdo->prepare("INSERT INTO member VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $_POST["username"]);
    $stmt->bindParam(2, $_POST["password"]);
    $stmt->bindParam(3, $_POST["name"]);
    $stmt->bindParam(4, $_POST["address"]);
    $stmt->bindParam(5, $_POST["mobile"]);
    $stmt->bindParam(6, $_POST["email"]);
    $stmt->execute();
    $key = $pdo->lastInsertId();

?>
<html>
<head><meta charset="UTF-8"></head>
<body>
    เพิ่มสมาชิกสำเร็จ ข้อมูลสมาชิกใหม่ คือ <br>
     username: <?=$_POST["username"]?><br>
     password: <?=$_POST["password"]?><br>
     name: <?=$_POST["name"]?><br>
     address: <?=$_POST["address"]?><br>
     mobile: <?=$_POST["mobile"]?><br>
     email: <?=$_POST["email"]?><br>
</body>
</html>