<?php 
    session_start();
    if(!empty($_POST["username"])) {
        $_SESSION["username"] = $_POST["username"];
        header("Location: welcome.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="username" placeholder="введите имя">
        <input type="submit" value="Отправить">
    </form>
</body>
</html>