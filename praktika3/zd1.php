<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $bmw = [
            "model" => "x5",
            "speed" => 120,
            "doors" => 5, 
            "year" => "2006"
        ];
        $toyota = [
            "model" => "carina",
            "speed" => 130,
            "doors" => 4, 
            "year" => "2007"
        ];
        $opel = [
            "model" => "corsa",
            "speed" => 140, 
            "doors" => 5, 
            "year" => "2007"
        ];
    ?>
    <p><?= 'bmw: '.$bmw["model"]." ".$bmw["speed"]." ".$bmw["doors"]." ".$bmw["year"]?></p>
    <p><?= 'toyota: '.$toyota["model"]." ".$toyota["speed"]." ".$toyota["doors"]." ".$toyota["year"]?></p>
    <p><?= 'opel: '.$opel["model"]." ".$opel["speed"]." ".$opel["doors"]." ".$opel["year"]?></p>
</body>
</html>