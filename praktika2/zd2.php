<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pr2 - 2 - kibanov</title>
</head>
<body>
    <h3>Задание 2</h3>
    <?php 
        $age = -1;
    ?>
    <p><?php 
        if($age >= 18 && $age <= 59){
            echo "Вам ещё работать и работать";
        }
        else if($age > 59) echo "Пора на пенсию";
        else if($age < 18 && $age > 0) echo "Вам рано ещё работать";
        else echo "Такого возраста не существует";
    ?></p>
</body>
</html>