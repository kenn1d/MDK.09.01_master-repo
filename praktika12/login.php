<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Введите свои данные</h3>
    <form action="login.php" method='post'>
        <input type="text" name="username2" placeholder="введите name"><br><br>
        <input type="date" name="dateuser2" placeholder="введите дату"><br><br>
        <input type="submit" name='sent' value="Отправить">
    </form>
    <?php 
        if(isset($_POST['sent']) && !empty($_POST['username2']) && !empty($_POST['dateuser2'])) {
            setcookie('username2[0]', $_POST['username2']);
            setcookie('username2[1]', $_POST['dateuser2']);
            header('Location: index.php');
        }
    ?>
</body>
</html>