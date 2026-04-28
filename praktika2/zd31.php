<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pr2 - 3.1 - kibanov</title>
</head>
<body>
    <h3>Задание 3.1</h3>
    <?php 
        $day = 3;
        switch ($day){
            case 1:
                case 2:
                    case 3:
                        case 4:
                            case 5:
                                echo "Это рабочий день";
                                break;
            case 6:
                case 7:
                    echo "Это выходной день";
                    break;
            default: echo "Это неизвестный день";
        }
    ?>
</body>
</html>