<?php 
    if(isset($_POST['username'])) {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $query = mysqli_query($db, "SELECT * FROM users WHERE username='".$username."' AND password='".$password."';");
            $numrows = mysqli_num_rows($query);
            if ($numrows != 0) {
                while($row = mysqli_fetch_assoc($query)) {
                    $userId = $row['id'];
                    $dbusername = $row['username'];
                    $dbpassword = $row['password'];
                }
                if ($username == $dbusername && $password == $dbpassword) {
                    $_SESSION['session_username'] = $username;
                    $_SESSION['session_user_id'] = $userId;
                    header("Location: intropage.php");
                } else {
                    $message = "Неверный логин или парль!";
                }
            }
        } else {
            $message = "Все поля обязательны к заполнению!";
        }
    }
?>