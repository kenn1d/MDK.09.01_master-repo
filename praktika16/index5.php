<?php 
    $db = mysqli_connect("localhost:3306", "root", "", "Traveles");
    $string = mysqli_query($db, "SELECT c.fullName, c.visa 
                                FROM Clients c
                                INNER JOIN TravelPackages tp ON c.id = tp.Client_id
                                    WHERE c.visa = 'QWERTY123'");
    $count = mysqli_num_rows($string);
    for($i = 0; $i < $count; $i++) {
        $result[] = mysqli_fetch_row($string);
        $string = mysqli_query($db, "SELECT c.fullName, c.visa 
                                    FROM Clients c
                                    INNER JOIN TravelPackages tp ON c.id = tp.Client_id
                                        WHERE c.visa = 'QWERTY123'");
    }

    var_dump($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>