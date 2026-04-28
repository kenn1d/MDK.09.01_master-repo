<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Обязательное задание</h3>
    <form action="" method="post">
        <button type="submit" name="ini">Иницилизировать скрипт</button>
    </form>
    <?php 
        if(isset($_POST['ini'])) {
            include('default.php');
        }
    ?>

    <h3>Задание на 3</h3>
    <form action="index.php" method='post'>
        <input type="text" name="username1" placeholder="введите name"><br>
        <input type="submit" name='send' value="Отправить">
    </form>
    <?php 
        if(isset($_POST['send'])) {
            if(isset($_POST['username1'])) setcookie('username1', $_POST['username1']);
            else echo 'Значение формы было пустым!';
        }
        if(isset($_COOKIE['username1'])) {
            echo $_COOKIE['username1'].'<br><br>';
        }
    ?>

    <h3>Задание на 4</h3>
    <?php 
        if(empty($_COOKIE)) {
    ?>
        <button type="submit" name='reg'><a href="login.php">Зарегистрироваться</a></button>
    <?php 
        }
        else {
    ?>
        <form action="index.php" method='post'>
            <input type="submit" name="check" value="Проверить куки">
        </form>
    <?php 
            if(isset($_POST['check'])) {
                if(!empty($_COOKIE['username2'])) {
                    echo 'Куки существуют'.'<br>';
                    echo 'Имя: '. $_COOKIE['username2'][0] . '<br>';
                    echo 'Дата: '. $_COOKIE['username2'][1] . '<br>';
                }
                else header('Location: login.php');
            }
        }
    ?>
    <h3>Задание на 5</h3>
    <button type="submit"><a href="delete.php">Удалить кукисы или изменить имя</a></button>
</body>
</html>