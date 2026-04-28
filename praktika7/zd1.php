<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <h4>Сведения о телефоне</h4>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" placeholder='Название' name='name'><br>
        <br><input type="text" placeholder='Модель' name='model'><br>
        <br><input type="text" placeholder='Оператор' name='oper'><br>
        <br><input type="text" placeholder='ПО' name='SW'><br>
        <br><input type="text" placeholder='Версия ОС' name='OC'><br>
        <br><input type="text" placeholder='Номер версии микропрограмм' name='verMicroApp'><br>
        <br><input type="text" placeholder='Номер версии оборудования' name='verObor'><br>
        <br><input type="text" placeholder='Версия ПО' name='verSW'><br>
        <br><input type="text" placeholder='Версия микросхемы' name='verMicro'><br>
        <br><input type="text" placeholder='Разрешение экрана' name='res'><br>
        <br><input type="text" placeholder='MAC-адрес' name='macAdd'><br>
        <br><input type="text" placeholder='IMEI' name='verIMEI'><br>
        <br><input type="submit" value="Отправить">
    </form>
    <?php if($_POST != null) { ?>
        <hr>
        <h4>Данные из формы</h4>
        <div>
            <p>Назавние: <?= trim($_REQUEST['name'], ' '); ?></p>
            <p>Модель: <?= trim($_REQUEST['model'], ' '); ?></p>
            <p>Оператор: <?= trim($_REQUEST['oper'], ''); ?></p>
            <p>ПО: <?= trim($_REQUEST['SW'], ' '); ?></p>
            <p>Версия ОС: <?= trim($_REQUEST['OC'], ' '); ?></p>
            <p>Номер версии микропрограмм: <?= trim($_REQUEST['verMicroApp'], ' '); ?></p>
            <p>Номер версии оборудования: <?= trim($_REQUEST['verObor'], ' '); ?></p>
            <p>Версия ПО: <?= trim($_REQUEST['verSW'], ' '); ?></p>
            <p>Версия микросхемы: <?= trim($_REQUEST['verMicro'], ' '); ?></p>
            <p>Разрешение экрана: <?= trim($_REQUEST['res'], ' '); ?></p>
            <p>MAC-адрес: <?= trim($_REQUEST['macAdd'], ' '); ?></p>
            <p>IMEI: <?= trim($_REQUEST['verIMEI'], ' '); ?></p>
        </div>
        <hr>
        <div>
            <?php 
                foreach($_POST as $key)
                    echo " $key ";
            ?>
        </div>
        <hr>
        <div>
            <?php 
                foreach($_POST as $element => $key)
                    echo "<p> переменная $element = $key</p>";
            ?>
        </div>
    <?php } ?>
</body>
</html>