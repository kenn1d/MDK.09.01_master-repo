<?php 
    include 'database.php';
    $ip = 'localhost';
    $username = 'root';
    $password = '';
    $dbName = 'traveles';

    $dataBase = DB_connect($ip, $username, $password, $dbName);
    $allClients = DB_query('SELECT * FROM Clients', $dataBase);
    $allTravelPackages = DB_query('SELECT * FROM TravelPackages', $dataBase);

    if(isset($_POST['add'])) {
        if($_POST['table'] == 'Clients') {
            DB_query("INSERT INTO `{$_POST['table']}` (`fullName`, `passportRu`, `passportInt`, `telNumber`, `visa`, `birthDate`) VALUES ('{$_POST['fullName']}','{$_POST['passportRu']}','{$_POST['passportInt']}','{$_POST['telNumber']}','{$_POST['visa']}','{$_POST['date']}')", $dataBase);
        }
        else if ($_POST['table'] == 'TravelPackage') {
            DB_query("INSERT INTO `{$_POST['table']}` (`Client_id`, `country`, `resort`, `hotel`, `transport`) VALUES ('{$_POST['Client_id']}','{$_POST['country']}','{$_POST['resort']}','{$_POST['hotel']}','{$_POST['transport']}')", $dataBase);
        }
    }

    if(isset($_GET['delete'])) DB_query("DELETE FROM `{$_GET['table']}` WHERE `{$_GET['table']}`.`id` = ".$_GET['id'], $dataBase);

    $filter = null;
    if(isset($_POST['find'])) {
        $query = '';
        if ($_POST['table'] == 'Clients') {
            $query = "SELECT * FROM `clients` WHERE `{$_POST['field']}` LIKE '%{$_POST['search']}%' ";
        }
        else if ($_POST['table'] == 'TravelPackage') {
            $query = "SELECT * FROM `travelpackages` WHERE `{$_POST['field']}` LIKE '%{$_POST['search']}%' ";
        }
        DB_query($query, $dataBase);
        $filter = DB_query($query, $dataBase);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traveles</title>
</head>
<body style="display: flex; gap: 20px;">
    <table border="1">
        <tr>
            <th colspan="2" ><?= $dbName; ?></th>
        </tr>
        <tr>
            <td style="vertical-align: top;">
                <h3>Добавление записи</h3>
                <form action="" method="post">
                    <span>Поле 1: </span><input type="text" name="fullName" placeholder="fullName"><br>
                    <span>Поле 2: </span><input type="text" name="passportRu" placeholder="passportRu"><br>
                    <span>Поле 3: </span><input type="text" name="passportInt" placeholder="passportInt"><br>
                    <span>Поле 4: </span><input type="text" name="telNumber" placeholder="telNumber"><br>
                    <span>Поле 5: </span><input type="text" name="visa" placeholder="visa"><br>
                    <span>Поле 6: </span><input type="date" name="birthDate" placeholder="birthDate"><br>
                    <input type="submit" name="add" value="Добавить запись">
                    <input type="hidden" name="table" value="Clients">
                </form>
            </td>
            <td style="vertical-align: top;">
                <h3>Добавление записи</h3>
                <form action="" method="post">
                    <span>Поле 1: </span><input type="text" name="Client_id" placeholder="Client_id"><br>
                    <span>Поле 2: </span><input type="text" name="country" placeholder="country"><br>
                    <span>Поле 3: </span><input type="text" name="resort" placeholder="resort"><br>
                    <span>Поле 4: </span><input type="text" name="hotel" placeholder="hotel"><br>
                    <span>Поле 5: </span><input type="text" name="transport" placeholder="transport"><br>
                    <input type="submit" name="add" value="Добавить запись">
                    <input type="hidden" name="table" value="TravelPackage">
                </form>
            </td>
        </tr>
        <tr>
            <th colspan="2">Поиск и фильтрация</th>
        </tr>
        <tr>
            <td>
                <form action="" method="post">
                    <input type="text" name="search">
                    <select name="field">
                        <option value="" disabled>Выберите...</option>
                        <option value="fullName">fullName</option>
                        <option value="passportRu">passportRu</option>
                        <option value="passportInt">passportInt</option>
                        <option value="telNumber">telNumber</option>
                        <option value="visa">visa</option>
                        <option value="birthDate">birthDate</option>
                    </select>
                    <input type="submit" name="find" value="Поиск">
                    <input type="hidden" name="table" value="Clients">
                </form>
            </td>
            <td>
                <form action="" method="post">
                    <input type="text" name="search">
                    <select name="field">
                        <option value="" disabled>Выберите...</option>
                        <option value="Client_id">Client_id</option>
                        <option value="country">country</option>
                        <option value="resort">resort</option>
                        <option value="hotel">hotel</option>
                        <option value="transport">transport</option>
                    </select>
                    <input type="submit" name="find" value="Поиск">
                    <input type="hidden" name="table" value="TravelPackage">
                </form>
            </td>
        </tr>
        <tr>
            <th>Записи таблицы 1 (Clients)</th>
            <th>Записи таблицы 2 (TravelPackages)</th>
        </tr>
        <tr>
            <td style="vertical-align: top;">
                <?= DB_parse($allClients); ?>
            </td>
            <td style="vertical-align: top;">
                <?= DB_parse($allTravelPackages); ?>
            </td>
        </tr>
    </table>
    <div>
        <?php if($filter != null) echo DB_parse($filter); ?>
    </div>
</body>
</html>