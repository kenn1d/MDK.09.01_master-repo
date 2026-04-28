<?php 
    include "connection.php";
    include "DBclass.php";

    $db = new DBclass(SERVER, USER, PASSWORD, NAME);

    if(isset($_POST['insert_user'])) {
        if($db->openConnection()) {
            $name = $_POST['name'] ?? 'default_name'; // установка значения по-умолчанию

            $escapedName = $db->escapeString($name);
            $sql = "INSERT INTO users (name) VALUES ('" . $escapedName . "')";
            $result = $db->query($sql);

            if($result) {
                $lastInsertId = $db->getLastInsertId();
                echo "Запись успешно добавлена. ID новой записи: " . ($lastInsertId !== null ? $lastInsertId : "не удалось получить ID");
            } else {
                echo "Ошибка при добавлении записи: " . $db->getLastError();
            }
        } else {
            echo "Ошибка подключения к базе данных: " . $db->getLastError();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Добавить запись</h3>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Имя">
        <input type="submit" name="insert_user" value="Добавить">
    </form>
</body>
</html>