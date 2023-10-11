<?php
    include "connect.php"; 

    if (isset($_GET["username"])) {
        $username = $_GET["username"];
        $newRole =  "Admin";

        $stmt = $pdo->prepare("UPDATE member SET role = :newRole WHERE username = :username");
        $stmt->bindParam(':newRole', $newRole, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        header("location: lab10_3.php");
    } else {
        echo "Failed.";
    }
?>