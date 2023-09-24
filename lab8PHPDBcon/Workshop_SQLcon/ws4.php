<?php include "connect.php"; ?>
<html>
<head><meta charset="utf-8"></head>
<body>
    <form>
        <input type="text" name="seachinput">
        <input type="submit" value="ค้นหา">
    </form>
    <div>
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE ?");
        if (!empty($_GET)) // ถ ้ามีค่าที่สงมาจากฟอร์ม ่
            $value = '%' . $_GET["seachinput"] . '%'; // ดึงค่าที่สงมาก าหนดให ้กับตัวแปรเงื่อนไข ่
        $stmt->bindParam(1, $value); // ก าหนดชอตัวแปรเงื่อนไขที่จุดที่ก าหนด ื่ ? ไว ้
        $stmt->execute(); // เริ่มค ้นหา
    ?>
    </div>
    <?php while ($row = $stmt->fetch()) : ?>
        <div>
            ชื่อสมาชิก:<?=$row ["name"]?><br>
            ที่อยู่:<?=$row ["address"]?><br>
            อีเมล:<?=$row ["email"]?><br>
            <img src='member_photo/<?=$row ["username"]?>.jpg'>
            <hr>
        </div>
    <?php endwhile; ?>
</body>
</html>