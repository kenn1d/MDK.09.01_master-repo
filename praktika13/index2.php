<?php 
    session_start();
    $login = "admin";
    $psw = "admin";
    if($_SERVER["REQUEST_METHOD"] === 'POST') {
        if($login != $_POST["login"] or $psw != $_POST["psw"]) {
            echo "Неправильный логин или пароль";
        }
        else header("Location: welcome.php");
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
    <form action="" method="post">
        <input type="text" name="login" placeholder="логин">
        <input type="text" name="psw" placeholder="пароль">
        <input type="submit" value="Войти">
    </form>
</body>
</html>