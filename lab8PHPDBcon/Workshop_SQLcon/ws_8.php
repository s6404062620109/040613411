<html>
<head><meta charset="UTF-8"></head>
<body>
    <form action="ws8createuser.php" method="post">
    username: <input type="text" name="username"><br>
    password: <input type="password" name="password"><br>
    name: <input type="text" name="name"><br>
    address: <br>
    <textarea name="address" rows="3" cols="40"></textarea><br>
    mobile: <input type="tel" name="mobile" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" title="please enter value in form 0x-xxxx-xxxx"><br>
    email: <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}" title="please enter value in form example@mail.com"><br>
    <input type="submit" value="เพิ่มสมาชิก ">
    </form>
</body>
</html>