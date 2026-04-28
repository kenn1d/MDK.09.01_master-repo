<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pr2 - 3.2 - kibanov</title>
</head>
<body>
    <h3>Задание 3.2</h3>
    <?php 
        $time = 3;
        $time_day = match(true) {
            $time >= 6 && $time <= 11 => "Утро",
            $time >= 12 && $time <= 18 => "День",
            $time >= 19 && $time <= 24 => "Вечер",
            $time >= 1 && $time <= 5 => "Ночь",
            default => "Некорректное время",
        };
        echo $time_day;
    ?>
</body>
</html>