<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $a = 1;
        while ($a <= 50) {
            if($a%2 == 0) echo "<span>".$a."</span>";
            $a++;
        }
    ?>
</body>
</html>