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
        $stmt = $pdo->prepare("SELECT username, COUNT(ord_id) as total_order FROM orders GROUP BY username");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
                echo "Username: " . $row["username"] . ",<br>";
                echo "จำนวนออร์เดอร์: " . $row["total_order"] . "<br>";
                echo "<a href='lab10_4.php?username=". $row["username"] ."'>ดูรายการ Order</a>";
                echo "<hr>\n";
            }
    }
    elseif($_SESSION["role"] == "User"){    
        $username = $_SESSION["username"];
        $stmt = $pdo->prepare("SELECT * FROM orders WHERE username = '$username'");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
                echo "เลขออเดอร์: " . $row["ord_id"] . ",<br>";
                echo "สถานะออร์เดอร์: " . $row["status"] . ",<br>";
                echo "วันออกออร์เดอร์: " . $row["ord_date"] . "<br>";
                echo "<hr>\n";
            }
    }   
?>
</body>
</html>
