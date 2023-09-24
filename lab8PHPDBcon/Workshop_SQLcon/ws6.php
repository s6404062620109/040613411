<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8">
    <script>
        function confirmDelete(username) { 
            var ans = confirm("ต้องการลบข้อมูลสมาชิก?" + username); 
            if (ans==true) 
                document.location = "ws6delete.php?username=" + username;
        }
    </script>
</head>
<body>
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            echo "username : " . $row ["username"] . "<br>";
            echo "password: " . $row ["password"] . "<br>";
            echo "ชื่อ : " . $row ["name"] . "<br>";
            echo "ที่อยู่: " . $row ["address"] . "<br>";
            echo "<a href='editform.php?username=" . $row ["username"] . "'>แก ้ไข</a> | ";
            echo "<a href='#' onclick='confirmDelete(\"" . $row ["username"] . "\")'>ลบ</a>";
            echo "<hr>\n";
        }
    ?>
</body>
</html>