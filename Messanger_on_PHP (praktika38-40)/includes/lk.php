<?php 
    session_start();

    if(!isset($_SESSION["session_username"]))
        header("Location: login.php");
    else 
        include "header.php";
    
?>
    <div class="container">
        <h2><span><?= $_SESSION["session_username"] ?></span>, это твой личный кабинет. <a href="../intropage.php">Пообщаемся</a>?</h2>
    
        <div class="main">
            <?= include "userData.php"; ?>
        </div>
    </div>

    <div class="logout_bth">
        <p><a href="logout.php">Выйти</a> из системы</p>
    </div>

<?php 
    include "footer.php";
?>