<?php 
    session_start();

    // 1. проверка авторизован ли пользователь
    if(!isset($_SESSION['user_id'])) {
        // пользователь не авторизован
        // перенаправляем на страницу авторизации с сообщением об ошибке
        header("Location: login.php?error=not_auth");
        exit;
    }

    // 2. если пользователь авторизован, получаем данные пользователя из сессии
    $user_id = $_SESSION['user_id'];
    $username = $_SESSION['username']; // предполагаем, что имя пользователя тоже хранится в сессии
    // Др данные....

    // 3. доп. проверка ролей (если нужно)
    // например если только админы имеют доступ к панели
    $user_role = $_SESSION['user_role'] ?? 'guest'; // guest - Значение по умол.

    if ($user_role !== 'admin') {
        echo "У вас нет прав для доступа к этой странице.";
        exit;
    }

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db_name = 'pr32';
    $conn = new mysqli($host, $user, $pass, $db_name);

    if(isset($_POST['update'])) {
        $result = $conn->query("UPDATE `requests` SET `status`='{$_POST['status']}' WHERE `id` = '{$_POST['id']}'");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
</head>
<body>
    <h1>Добро пожаловать в панель администратора, <?= htmlspecialchars($username); ?>!</h1>
    <p>Здесь вы можете управлять сайтом.</p>
    <?php 
        $result = $conn->query("SELECT * FROM `requests`");
        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) : ?>
            <form action="" method="post">
                <input type="text" name="fio" value="<?= $row['fio']; ?>" disabled>
                <input type="tel" name="phone" value="<?= $row['phone']; ?>" disabled>
                <input type="text" name="services" value="<?= $row['services']; ?>" disabled>
                <input type="text" name="message" value="<?= $row['message']; ?>" disabled>
                <input type="date" name="created_at" value="<?= $row['created_at']; ?>" disabled>
                <input type="text" name="status" value="<?= $row['status']; ?>">
                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                <input type="submit" value="Обновить" name="update">
            </form><br>
            <?php endwhile;
        }
    ?>
    <br><br><a href="logout.php">Выйти</a>
</body>
</html>