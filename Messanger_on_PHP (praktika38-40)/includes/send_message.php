<?php 
    session_start();
    require_once "connection.php"; 
    if (mb_strlen($_POST['message']) < 50) {
        if($_POST['chat_id'] == 'allMsg') {
            $result = mysqli_query($db, "INSERT INTO `allMessages` (`name`, `content`) VALUES ('{$_SESSION['session_username']}', '{$_POST['message']}')");
        }
        else {
            $result = mysqli_query($db, "INSERT INTO `messages` (`chat_id`, `user_id`, `content`) VALUES ('{$_POST['chat_id']}', '{$_SESSION['session_user_id']}', '{$_POST['message']}')");
        }
        header("Location: ../intropage.php?view={$_POST['chat_id']}");
    }
    else {
        header("Location: ../intropage.php?view={$_POST['chat_id']}&lenError");
    }
?>