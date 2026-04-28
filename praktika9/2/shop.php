<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $tovars = [
            "Монитор" => "Новый монитор 144ГГц для видеоигр.",
            "Мышь" => "Офисная мышь. Сочетает обновлённый дизайн и удобное положение в ладони.",
            "Клавиатура" => "Механическая клавиатура с синими свечами. Приятный звук для ваших ушей."
        ];

        foreach ($tovars as $name=>$description) {
            include('goods.php');
        }
    ?>
</body>
</html>