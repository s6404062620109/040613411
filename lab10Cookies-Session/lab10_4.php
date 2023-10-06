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
    if (isset($_GET["username"])){
        $username = $_GET["username"];
    }
    if($_SESSION["role"] == "Admin"){
        $stmt = $pdo->prepare("SELECT ord_id, ord_date, status FROM orders WHERE username = ?");
        $stmt->bindParam(1, $username);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
                echo "หมายเลขออร์เดอร์: " . $row["ord_id"] . ",<br>";
                echo "วันออกออร์เดอร์: " . $row["ord_date"] . "<br>";
                echo "สถานะออร์เดอร์: " . $row["status"] . "<br>";
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
