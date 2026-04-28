<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>задание 1</h3>
    <?php 
        $f = fopen("martch.txt", 'a');
        fwrite($f, "весна пришла!");
        fclose($f);
    ?>
    <h3>задание 2</h3>
    <?php
        rename('martch.txt', "8.txt");
    ?>
    <h3>задание 3</h3>
    <?php
        if (!is_dir('old')) {
            mkdir('old');
        }
        rename('8.txt', 'old/8.txt'); 
        
    ?>
    <h3>задание 4</h3>
    <?php
        copy('old/8.txt', 'old/double.txt');
    ?>
    <h3>задание 5</h3>
    <?php
        echo filesize('old/double.txt').' байт'.'<br><br>';
        echo filesize('old/double.txt')/1000 .' мегабайт'.'<br><br>';
        echo (float)filesize('old/double.txt')/1000000 .' гигабайт'.'<br><br>';
    ?>
    <h3>задание 6</h3>
    <?php
        unlink('old/double.txt');
    ?>
    <h3>задание 7</h3>
    <?php
        if(!file_exists('old/double.txt') and file_exists('old/8.txt')){
            echo "Скрипт удалил double.txt и сохранил 8.txt!<br><br>";
        }
        else echo "Скрипт не сработал<br><br>";
    ?>
    <h3>задание 8</h3>
    <?php
       if (!is_dir('demo_1')) mkdir('demo_1');
    ?>
    <h3>задание 9</h3>
    <?php
        rename('demo_1', 'test_2');
    ?>
    <h3>задание 10</h3>
    <?php
        rmdir('test_2');
    ?>
    <h3>задание 11</h3>
    <?php
        $fams = ['shein', 'kibanov', 'kaznin', 'turitcina'];
        if (!is_dir('test_2')) mkdir('test_2');
        for($i = 0; $i < count($fams); $i++) {
            mkdir("test_2/$fams[$i]");
        }
    ?>
</body>
</html>