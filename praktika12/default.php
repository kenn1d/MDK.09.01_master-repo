
    <?php 
        setcookie('username', 'Кибанов Макар');
        if(isset($_COOKIE['username'])) echo $_COOKIE['username'];
    ?>