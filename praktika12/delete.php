<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="delete.php" method="post">
        <input type="text" name="value">
        <input type="submit" name="change" value="Изменить имя username">
        <input type="submit" name="delete" value="Удалить куки username">
    </form>
    <?php 
        if(isset($_POST['change'])) {
            setcookie("username", $_POST['value']);
            $value = $_POST['value'];
            echo "Новое значение переменной username : $value";
        }

        if(isset($_POST['delete'])) {
            setcookie("username", "", time() - 3600);
            echo "Куки username удалены";
        }
    ?>
</body>
</html>