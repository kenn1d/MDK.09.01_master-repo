<?php 
    require_once "login.php";
    $dbserver = mysqli_connect($address, $username, $psw, $db) or die (mysqli_connect_error());
    mysqli_set_charset($dbserver, "utf-8");

    $query = "SELECT * FROM classics";
    $result = mysqli_query($dbserver, $query);
    if (!$result) die ("Сбой при доступе к БД: " . mysqli_error($dbserver));

    //вывод данных
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<p>".$row['author']."</p>".
            "<p>".$row['title']."</p>".
            "<p>".$row['category']."</p>".
            "<p>".$row['year']."</p>".
            "<p>".$row['isbn']."</p>";
        }
    }
    else {
        echo "<p>В настоящее время таблица пуста</p>";
    }

    mysqli_close($dbserver);
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
    
</body>
</html>