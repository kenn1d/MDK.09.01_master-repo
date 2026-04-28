<?php
    session_start();
    if(isset($_POST["sessionClear"])){
        session_unset();
        header("Location: index1.php");
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
    <h2>Добро пожаловать, <?= $_SESSION["username"] ?></h2>
    <form action="" method="post">
        <button type="submit" name="sessionClear">Очистить сессию</button>
    </form>
</body>
</html>