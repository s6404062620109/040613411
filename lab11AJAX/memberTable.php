<?php
$keyword = $_GET["keyword"];
$conn = mysqli_connect("localhost", "root", "", "blueshop");
if ($conn) {

} else {
    echo mysqli_errno();
}
$sql = "SELECT * FROM member WHERE username LIKE '%$keyword%'";
$objQuery = mysqli_query($conn, $sql);
?>
<table border="1">
    <tr>
        <th>รูปภาพ</th>
        <th>ชื่อสมาชิก</th>
        <th>ที่อยู่</th>
        <th>เบอร์โทรศัพท์</th>
        <th>เมล</th>
        <th>ตำแหน่ง</th>   
    </tr>
    <?php while($row = mysqli_fetch_array($objQuery)):?>
    <tr>
        <td><img src='member_photo/<?=$row ["username"]?>.jpg'></td>
        <td><?=$row ["name"]?></td>
        <td><?=$row ["address"]?></td>
        <td><?=$row ["mobile"]?></td>
        <td><?=$row ["email"]?></td>
        <td><?=$row ["role"]?></td>
    </tr>
    <?php endwhile;?>
</table>