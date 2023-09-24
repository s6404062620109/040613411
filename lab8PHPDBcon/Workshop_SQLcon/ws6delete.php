<?php include "connect.php" ?>
<?php
    if (isset($_GET['username'])) {
        $username = $_GET['username'];
    
        $stmt = $pdo->prepare("DELETE FROM member WHERE username=?");
    
        if ($stmt->execute([$username])) {
            header("location: ws6.php");
            //exit(); // Make sure to exit after redirecting
        } else {
            // Handle the case where the execution fails
            echo "Error deleting member.";
        }
    } else {
        // Handle the case where 'username' is not set in the URL
        echo "No username specified for deletion.";
    }
?>