<?php 
    require_once "login.php";
    $db_server = mysqli_connect($address, $username, $psw, "traveles") or die (mysqli_connect_error());
    mysqli_set_charset($db_server, "utf-8");

    $query = "SELECT * FROM TravelPackages";
    $result = mysqli_query($db_server, $query);
    if(!$result) die ("Ошибка: " . mysqli_error($db_server));

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<br><p>".$row['Client_id']."</p>".
            "<p>".$row['country']."</p>".
            "<p>".$row['resort']."</p>".
            "<p>".$row['hotel']."</p>".
            "<p>".$row['transport']."</p>";
        }
    }
    else echo "<p>Таблица пуста</p>";

    mysqli_close($db_server);
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