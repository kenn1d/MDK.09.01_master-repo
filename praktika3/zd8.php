<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $weekDays =
        [ 
            'ru' => ["понедельник", "вторник", "среда", "четверг", "пятница", "суббота", "воскресенье"],
            'en' => ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"]
        ];
        $day = 3;
        $lang = 'en';
        echo $weekDays[$lang][$day-1];
    ?>
</body>
</html>