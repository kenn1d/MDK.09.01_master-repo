<?php 
    if(!isset($_SESSION["session_username"]))
        header("Location: login.php");
    else {
        require_once "connection.php";
        $result = mysqli_query($db, "SELECT * FROM `users` WHERE `id` = {$_SESSION['session_user_id']}");
        while($row = mysqli_fetch_assoc($result)) :
            $users[] = [
                'username' => $row['username'],
                'full_name' => $row['full_name'],
                'email' => $row['email']
            ];
            foreach($users as $data) :
        ?>
            <h3>Твой nickname: <?= htmlspecialchars($data['username']); ?></h3>
            <h3>Твоё ФИО: <?= htmlspecialchars($data['full_name']); ?></h3>
            <h3>Твой email: <?= htmlspecialchars($data['email']); ?></h3>
<?php
            endforeach;
        endwhile; 
    }
?>