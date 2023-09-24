<?php include "connect.php" ?>
<?php
    $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
    $stmt->bindParam(1, $_GET["username"]); 
    $stmt->execute(); 
    $row = $stmt->fetch(); 
?>
<html>
<head><meta charset="utf-8"></head>
<body>
    <form action="ws9confirm.php" method="post">
    <input type="hidden" name="username" value="<?= "{$row["username"]}" ?>">
    password: <input type="text" name="password" value="<?=$row["password"]?>"><br>
    name: <input type="text" name="name" value="<?=$row["name"]?>"><br>
    address: <br>
    <textarea name="address" rows="3" cols="40"><?=$row["address"]?></textarea><br>
    mobile: <input type="tel" name="mobile" 
            pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" title="please enter value in form 0x-xxxx-xxxx"
            value="<?=$row["mobile"]?>"><br>
    email: <input type="email" name="email" 
            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}" title="please enter value in form example@mail.com"
            value="<?=$row["email"]?>"><br>
    <input type="submit" value="แก้ไข ">
    </form>
</body>
</html>