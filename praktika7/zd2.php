<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Log-in</h3>
    <form action="<?= $_SERVER['PHP_SELF'];?>" method="post">
        <input type="text" placeholder='login' name="login">
        <input type="password" placeholder='password' name="psw1">
        <input type="password" placeholder='password correct' name="psw2">
        <input type="submit" value="Sent">
    </form>
    <?php 
        if($_POST != null) {
            if ($_POST['login'] != "")
                if($_POST['psw1'] != $_POST['psw2']) {
                    echo "<hr><p>Пароли не совпадают!</p>";
                }
                else echo "<hr><p>Вы зарегались под имененем ".$_POST['login']." с паролем ".$_POST['psw1']."</p>";
            else echo "<hr><p>Логин не указан!</p>";
        }
    ?>
</body>
</html>