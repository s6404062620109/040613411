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
        $stmt = $pdo->prepare("SELECT * FROM item");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
                echo "หมายเลขออร์ไอเทม: " . $row["tid"] . ",<br>";
                echo "หมายเลขออร์เดอร์: " . $row["ord_id"] . ",<br>";
                echo "หมายเลยสินค้า: " . $row["pid"] . "<br>";
                echo "จำนวน: " . $row["quantity"] . "<br>";
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
