<?php include "connectdb.php"; ?>
<html>
<head><meta charset="utf-8"></head>
<body>
    <div style="display: flex">
        <?php
            $stmt = $pdo->prepare("SELECT * FROM member");
            $stmt->execute();
        ?>
        <?php while ($row = $stmt->fetch()) : ?>
            <div style="text-align: center">
                <a href="ws5detail.php?username=<?=$row["username"]?>">
                    <img src='member_photo/<?=$row ["username"]?>.jpg'>
                </a><br>
                ชื่อสมาชิก:<?=$row ["name"]?><br>
                ที่อยู่:<?=$row ["address"]?><br>
                อีเมล:<?=$row ["email"]?><br>
            </div><br>
        <?php endwhile; ?>
    </div>
</body>
</html>