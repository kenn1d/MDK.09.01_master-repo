<?php 
    session_start();

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db_name = 'blog';

    $error_message = '';
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'] ?? '';
        $password = trim($_POST['password']) ?? '';

        if (empty($username) || empty($password)) {
            $_SESSION['error_message'] = 'Заполните все поля!';    
            header("Location: login.php");
            exit;
        } else {
            $conn = new mysqli($host, $user, $pass, $db_name);
            $conn->set_charset("utf8mb4");

            $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                
                if(password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $username;
                    header("Location: dashboard.php");
                    exit;
                } else {
                    $_SESSION['error_message'] = 'Неверный пароль.';
                }
            } else {
                $_SESSION['error_message'] = 'Пользователь не найден.';
            }
            header("Location: login.php");
            exit;
        }
    }

    if (isset($_SESSION['error_message'])) {
        echo "<script>
            toastr.error('{$_SESSION['error_message']}');
        </script>";
        unset($_SESSION['error_message']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>
    <form action="" method="post">
        <label>Логин:</label>
        <input type="text" name="username" required>
        <label>Пароль:</label>
        <input type="password" name="password" required>
        <button type="submit" name="login">Войти</button>
    </form>
</body>
</html>