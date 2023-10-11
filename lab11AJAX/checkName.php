<?php

$conn = mysqli_connect("localhost", "root", "", "blueshop");

if ($conn) {
    $username = $_GET["username"];

    $stmt = $conn->prepare("SELECT * FROM member WHERE username LIKE ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "denied";
    } else {
        echo "okay";
    }

    $stmt->close();
    $conn->close();
} else {
    echo mysqli_connect_error(); 
}
?>