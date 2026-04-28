<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pr2 - 4 - kibanov</title>
</head>
<body>
    <h3>Задание 4</h3>
    <?php 
        const cnst = 50;
        if(defined('cnst')) {
            echo "Константа существует и равна: ".cnst;
        } 
        else echo "Константы не существует";
    ?>
</body>
</html>