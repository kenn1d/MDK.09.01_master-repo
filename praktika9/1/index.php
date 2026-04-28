<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ПР8 Кибанов</title>
</head>
<body>
    <?php 
        function privet() {
            echo 'Привет!';
        }

        function stud($fam, $name, $sqad) {
            echo "Ваша фамилия: $fam. Ваше имя: $name. Ваша группа: $sqad";
        }

        function group(array $spisok, $name, $dateStart, $dateEnd) {
            $students = implode(", ", $spisok);
            echo "Состав: $students. Имя: $name. 
            Дата начала обучения: $dateStart. 
            Дата окончания: $dateEnd";
        }

        function getTable($rows, $cols) {
            $table = '<table border="1">';

            for ($tr = 1; $tr <= $rows; $tr++) {
                $table .= '<tr>';
                for ($td = 1; $td <= $cols; $td++) {
                    if ($tr === 1 or $td === 1) {
                        $table .= '<th style="color:white;background-color:green;">'.$tr*$td.'</th>';
                    } else {
                        $table .= '<td>'.$tr*$td.'</td>';
                    }
                }
                $table .= '</tr>';
            }

            $table .= '</table>';
            echo $table;
        }

        function menu() {
            $pages = [
                '1 page' => "index.php",
                '2 page' => "index.php",
                '3 page' => "index.php"
            ];
            foreach ($pages as $key=>$page)
                echo "<a href='$page'>$key</a><br>";
        }

        function randFloat($a, $b) {
            return $a + mt_rand() / mt_getrandmax() * ($b - $a);
        }

        function op($n1, $n2, $operator) {
            switch ($operator) {
                case "+": return $n1 + $n2; break;
                case "-": return $n1 - $n2; break;
                case "*": return $n1 * $n2; break;
                case "/": return $n1 / $n2; break;
            }
        }
    ?>
    <h2>Задание 1</h2>
        <?= function_exists('privet') ? privet() : "function is undefined" ?>
    <h2>Задание 2</h2>
        <?= function_exists('stud') ? stud("Кибанов", "Макар", "ИСВ-23-1") : "function is undefined" ?>
    <h2>Задание 3</h2>
        <?= function_exists('group') ? group(['макар', 'марк', "максим", "матвей", "митрофан"], "ИСВ-23-1", "2023", "2027") : "function is undefined" ?>
    <h2>Задание 4</h2>
        <?= 
            getTable(3,3);
            getTable(5,5);
            getTable(10,10);
        ?>
    <h2>Задание 5</h2>
        <?= menu() ?>
    <h2>Задание 6</h2>
        <?= mt_rand(45, 234) ?>
    <h2>Задание 7</h2>
        <?= randFloat(45, 234) ?>
    <h2>Задание 8</h2>
        <?= op(4, 2, "*") ?>
</body>
</html>