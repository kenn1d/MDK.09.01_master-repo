<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $arr = [
	        'cms'=>['joomla', 'wordpress', 'drupal'],
	        'colors'=>['blue'=>'голубой', 'red'=>'красный', 'green'=>'зеленый']
        ];
        echo $arr['cms'][0]." ".$arr['cms'][2]." ".$arr['colors']['green']." ".$arr['colors']['red'];
    ?>
</body>
</html>