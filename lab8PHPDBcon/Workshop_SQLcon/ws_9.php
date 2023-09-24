<?php include "connectdb.php" ?>
<html>
<head><meta charset="utf-8"></head>
<body>
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            echo "username : " . $row ["username"] . "<br>";
            echo "password: " . $row ["password"] . "<br>";
            echo "ชื่อ : " . $row ["name"] . "<br>";
            echo "ที่อยู่: " . $row ["address"] . "<br>";
            echo "<a href='ws9edit.php?username=" . $row ["username"] . "'>แก ้ไข</a> ";
            echo "<hr>\n";
        }
    ?>
</body>
</html>