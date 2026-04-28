<?php 
    session_start();

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db_name = 'pr32';
    $conn = new mysqli($host, $user, $pass, $db_name);

    if(isset($_POST['LOG-IN'])) {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if($username === 'admin' && $password === '123456789') {
            $_SESSION['user_id'] = 123;
            $_SESSION['username'] = $username;
            $_SESSION['user_role'] = 'admin'; // устанавливаем роль пользователя

            header("Location: admin_panel.php");
            exit;
        } else {
            header("Location: login.php?error=invalid_credentials");
            exit;
        }
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
    <h2>Вход в систему</h2>
    
    <?php if(isset($error_message)): ?>
        <div class="error"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label>Логин:</label><br>
        <input type="text" name="username" required><br><br>
        
        <label>Пароль:</label><br>
        <input type="password" name="password" required><br><br>
        
        <input type="submit" name="LOG-IN" value="Войти">
    </form>
</body>
</html>