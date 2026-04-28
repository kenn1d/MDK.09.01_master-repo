<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ПР8 Кибанов</title>
</head>
<body>
    <h2>Задание 1</h2>
    <?php 
        echo file_exists("file.txt") ? "Файл существует" : "Файла нет";
    ?>
    <h2>Задание 2</h2>
    <?php 
        $f = fopen('file.txt', 'r');
        $strNum = 1;
        while(($str = fgets($f, 999)) !== false){
            if($strNum == 1 or $strNum == 3) echo $str;
            $strNum++;
        }
        fclose($f);
    ?>
    <h2>Задание 3</h2>
    <form action="index.php" method="POST">
        <input type="text" placeholder="Фамилия" name="fName"><br><br>
        <input type="text" placeholder="Имя" name="lName"><br><br>
        <input type="text" placeholder="Отчество" name="sName"><br><br>
        <input type="text" placeholder="Возраст" name="age"><br><br>
        <input type="text" placeholder="Логин" name="login"><br><br>
        <input type="password" placeholder="Пароль" name="psw"><br><br>
        <button type="submit" name="reg">Регистрация</button><br><br>
        <button type="submit" name="getFile" value="1">Просмотр файла</button>
    </form>
    
    <?php
        if(isset($_POST['reg'])){
            $file = fopen('file2.txt', 'a');
            $login = true;

            $fileData = file('file2.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach($fileData as $key => $value) {
                if(($key - 4) % 8 == 0 and $value == "login - " . $_POST['login']) {
                    echo "Введите оригинальный логин.";
                    $login = false;
                    fclose($file);
                    break;
                }
            }
            
            if($login) {
                foreach($_POST as $key => $data) {
                    fwrite($file, "$key - $data\n");
                }
                fwrite($file, "----------\n");
                fclose($file);
                echo "Данные сохранены!";
            }
        }

        if(isset($_POST['getFile'])) {
            echo "<h3>Содержимое файла:</h3>";
            if (file_exists('file2.txt')) {
                echo nl2br(file_get_contents('file2.txt'));
            } else {
                echo "Файл пуст";
            }
        }
    ?>
</body>
</html>