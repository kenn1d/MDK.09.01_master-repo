<?php 
    session_start();

    if(isset($_GET['view']) && isset($_GET['user']) && isset($_GET['id']) && $_SESSION['session_username'] == $_GET['user']) {
        require_once "connection.php";
        $id = intval($_GET['id']);
        if ($_GET['view'] != 'allMsg')
            $result = mysqli_query($db, "DELETE FROM `messages` WHERE `id` = $id");
        else $result = mysqli_query($db, "DELETE FROM `allmessages` WHERE `id` = $id");
        header("Location: ../intropage.php?view={$_GET['view']}");
    }
?>