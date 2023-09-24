<?php include "connect.php" ?>
<html>
<head><meta charset="utf-8"></head>
<body>
    <?php
        // 1. กำหนดคำสั่ง SQL ให ้ดึงข้อมูลสมาชิกตาม username
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
        $stmt->bindParam(1, $_GET["username"]); // 2. นำค่า username ที่สงมากับ ่ URL กeหนดเป็นเงื่อนไข
        $stmt->execute(); // 3. เริ่มค้นหา
        $row = $stmt->fetch(); // 4. ดึงผลลัพธ์ (เนื่องจากมีข ้อมูล 1 แถวจึงเรียกเมธอด fetch เพียงครั้งเดียว)
    ?>
    <div style="display:flex">
        <div>
                <img src='member_photo/<?=$row ["username"]?>.jpg'><br>
                ชื่อสมาชิก:<?=$row ["name"]?><br>
                ที่อยู่:<?=$row ["address"]?><br>
                อีเมล:<?=$row ["email"]?><br>
        </div>
    </div>
</body>
</html>