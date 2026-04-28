<?php 
    session_start();
    require_once "includes/connection.php";
    include "includes/auth.php";

    if (!empty($message)) {
        echo "<div class='error'>
            <span onclik='ignore()'>x</span>" . $message . "
        </div>
        <script>
            function ignore () { document.querySelector('.error').style.display = 'none'; }
        </script>";
    }

    include "includes/header.php";
?>
    <div class="container">
        <div id="login">
            <h1>Вход</h1>
            <form action="" id="loginform" method="post" name="loginform">
                <label for="user_login">Имя пользователя
                    <input type="text" name="username" size="20" id="username" value="">
                </label>
                <label for="user_pass">Пароль
                    <input type="password" name="password" size="20" id="password" value="">
                </label>
                <input class="button" type="submit" name="login" value="Log In">
                <p>Ещё не зарегистрированы? <a href="register.php">Регистрация</a></p>
            </form>
        </div>
    </div>
<?php include "includes/footer.php"; ?>