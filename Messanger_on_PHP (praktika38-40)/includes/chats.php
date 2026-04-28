<?php 
    require_once "includes/connection.php";
    $result = mysqli_query($db, "SELECT chats.id, chats.title
                                FROM chats
                                JOIN `chatMembers` ON chats.id = chatMembers.chat_id
                                WHERE chatMembers.user_id = {$_SESSION['session_user_id']};");
    if (mysqli_num_rows($result) != 0) :
    while($row = mysqli_fetch_assoc($result)) {
        $allChats[] = [
            'id' => $row['id'],
            'title' => $row['title']
        ];
    }
    foreach($allChats as $chat): ?>
    <div class="chat-info">
        <div class="chat-name"><?= htmlspecialchars($chat['title']) ?></div>
        <div class="chat-last-msg"><a href="intropage.php?view=<?= $chat['id']; ?>">Нажмите</a>, чтобы открыть...</div>
    </div>
<?php
    endforeach;
    endif;
?>