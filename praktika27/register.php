<?php 
    include "includes/header.php";
    require_once "includes/connection.php";
    include "includes/reg.php";

    if (!empty($message)) {
        echo "<div class='error'>
            <span onclik='ignore()'>x</span>" . $message . "
        </div>
        <script>
            function ignore () { document.querySelector('.error').style.display = 'none'; }
        </script>";
    }
?>
    <div class="container">
        <div id="login">
            <h1>Регистрация</h1>
            <form action="register.php" method="post" id="registerform" name="registerform">
                <label for="user_login">Полное имя
                    <input type="text" name="full_name" id="full_name" size="32" value="">
                </label>
                <label for="user_pass">Email
                    <input type="email" name="email" id="email" size="32" value="">
                </label>
                <label for="user_pass">Имя пользователя
                    <input type="text" name="username" id="username" size="20" value="">
                </label>
                <label for="user_pass">Пароль
                    <input type="password" name="password" id="password" size="32" value="">
                </label>
                <input class="button" type="submit" value="Зарегистрироваться" name="register" id="register">
                <p>Уже зарегистрированы? <a href="login.php">Введите имя пользователя</a></p>
            </form>
        </div>
    </div>
<?php include "includes/footer.php"; ?>