<?php
	include "connect.php";
    session_start();
    // ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
    if (empty($_SESSION["username"]) ) { 
        header("location: login-form.php");
    }
?>

<html>
<head><meta charset="utf-8"></head>
<body>
<?php
    if($_SESSION["role"] == "Admin"){
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
                echo "username: " . $row["username"] . ",<br>";
                echo "name: " . $row["name"] . ",<br>";
                echo "address: " . $row["address"] . "<br>";
                echo "mobile: " . $row["mobile"] . "<br>";
                echo "email: " . $row["email"] . "<br>";
                echo "role: " . $row["role"] . "<br>";
                echo "<a href='changerole.php?username=". $row["username"] ."'>ให้สิทธิ์ Admin</a>";
                echo "<hr>\n";
            }
    }
    elseif($_SESSION["role"] == "User"){   
        echo "<script>alert('You are not Admin!')</script>";
        header("refresh: 2; url=product-list.php");
    }   
?>
</body>
</html>
