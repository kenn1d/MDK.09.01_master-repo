<?php 
    session_start();

    if(!isset($_SESSION["session_username"]))
        header("Location: login.php");
    else 
        include "includes/header.php";

    include "includes/header.php"; 
?>
    <div class="container">
        <h2>Добро пожаловать, <span> USER </span></h2>!
        <p><a href="includes/logout.php">Выйти</a> из системы</p>
    </div>
<?php 
    include "includes/footer.php";
?>