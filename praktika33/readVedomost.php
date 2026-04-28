<?php
    $xml = simplexml_load_file("vedomost.xml");

    foreach($xml->{'tovar-list'}->tovar as $tovar) {
        echo "<span class='line1'>Название: " . $tovar->name . '</span>';
        echo "<span class='line2'>Описание: " . $tovar->desc . '</span>';
        echo "<span class='line1'>Цена: " . $tovar->price . '</span>';
        echo "<span class='line2'>Количество: " . $tovar->count . '</span>';
        echo "<span class='line1'>Вес: " . $tovar->weight . "</span><br><br>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>