<?php 
    if ($_GET['view'] == 'allMsg') :
        require_once "includes/connection.php";
        $result = mysqli_query($db, "SELECT * FROM `allmessages`");
        while($row = mysqli_fetch_assoc($result)) {
            $messages[] = [
                'id' => $row['id'],
                'name' => $row['name'],
                'content' => $row['content'],
                'send_time' => $row['send_time']
            ];
        }
        foreach($messages as $msg) : ?>
        <div class="message">
            <b class="author"><?= htmlspecialchars($msg['name']) ?>:</b>
            <span class="text"><?= htmlspecialchars($msg['content']) ?></span>
            <small class="time">[<?= date('H:i', strtotime($msg['send_time'])) ?>]</small>
            <?php
                if ($msg['name'] == $_SESSION['session_username']) echo "<a href='includes/deleteMsg.php?view={$_GET['view']}&user={$msg['name']}&id={$msg['id']}'>Удалить</a>";
            ?>
        </div>
<?php endforeach; endif; ?>