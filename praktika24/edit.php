<?php 
    include 'database.php';
    $ip = 'localhost';
    $username = 'root';
    $password = '';
    $dbName = 'traveles';

    $table = $_GET['table'];
    $id = $_GET['id'];
    $query = '';
    
    $dataBase = DB_connect($ip, $username, $password, $dbName);

    function getData($table, $id, $dataBase, $needValue) {
        $data = DB_query("SELECT * FROM $table WHERE `id`= $id", $dataBase);
        $array = mysqli_fetch_array($data, MYSQLI_ASSOC);
        return $array[$needValue];
    }

    if (isset($_POST['update'])) {
        if ($table == 'Clients') {
            $query = "UPDATE `$table` SET
                `fullName`='{$_POST['fullName']}',
                `passportRu`='{$_POST['passportRu']}',
                `passportInt`='{$_POST['passportInt']}',
                `telNumber`='{$_POST['telNumber']}',
                `visa`='{$_POST['visa']}',
                `birthDate`='{$_POST['birthDate']}'
            WHERE `id`= $id";
        }
        else if ($table == 'TravelPackages') {
            $query = "UPDATE `$table` SET
                `Client_id`='{$_POST['Client_id']}',
                `country`='{$_POST['country']}',
                `resort`='{$_POST['resort']}',
                `hotel`='{$_POST['hotel']}',
                `transport`='{$_POST['transport']}' 
            WHERE `id`= $id";
        }
        $result = DB_query($query, $dataBase);

        header('Location: index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование записи</title>
</head>
<body>
    <h1>Редактирование записи</h1>
    <?php if ($table == "Clients") { ?>
        <form action="" method="post">
            <input type="text" name="fullName" placeholder="fullName" value="<?= getData($table, $id, $dataBase, 'fullName'); ?>"><br>
            <input type="text" name="passportRu" placeholder="passportRu" value="<?= getData($table, $id, $dataBase, 'passportRu'); ?>"><br>
            <input type="text" name="passportInt" placeholder="passportInt" value="<?= getData($table, $id, $dataBase, 'passportInt'); ?>"><br>
            <input type="text" name="telNumber" placeholder="telNumber" value="<?= getData($table, $id, $dataBase, 'telNumber'); ?>"><br>
            <input type="text" name="visa" placeholder="visa" value="<?= getData($table, $id, $dataBase, 'visa'); ?>"><br>
            <input type="date" name="birthDate" placeholder="birthDate" value="<?= getData($table, $id, $dataBase, 'birthDate'); ?>"><br>
            <input type="submit" name="update" value="Обновить запись">
        </form>
    <?php } ?>
    <?php if ($table == "TravelPackages") { ?>
        <form action="" method="post">
            <input type="text" name="Client_id" placeholder="Client_id" value="<?= getData($table, $id, $dataBase, 'Client_id'); ?>"><br>
            <input type="text" name="country" placeholder="country" value="<?= getData($table, $id, $dataBase, 'country'); ?>"><br>
            <input type="text" name="resort" placeholder="resort" value="<?= getData($table, $id, $dataBase, 'resort'); ?>"><br>
            <input type="text" name="hotel" placeholder="hotel" value="<?= getData($table, $id, $dataBase, 'hotel'); ?>"><br>
            <input type="text" name="transport" placeholder="transport" value="<?= getData($table, $id, $dataBase, 'transport'); ?>"><br>
            <input type="submit" name="update" value="Обновить запись">
        </form>
    <?php } ?>
</body>
</html>