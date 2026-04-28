<?php 
    session_start();
    require_once "includes/connection.php";
    
    if(!isset($_SESSION["session_username"]))
        header("Location: login.php");
    else 
        include "includes/header.php";

    include "includes/header.php";

    if (isset($_GET['lenError'])) {
        echo "<div class='error'>
            <span onclik='ignore()'>x</span>Длина сообщения не может привышать более 50 символов
        </div>
        <script>
            function ignore () { document.querySelector('.error').style.display = 'none'; }
        </script>";
    }
?>
    <div class="container">
        <h2>Привет, <a href="includes/lk.php"><?= $_SESSION["session_username"] ?></a>! Пообщаемся?</h2>

        <div class="main">
            <div class="chats">
                <h3 class="chats-title">Мои диалоги</h3>
                <div class="chat-info">
                    <div class="chat-name">Общий чат</div>
                    <div class="chat-last-msg"><a href="intropage.php?view=allMsg">Нажмите</a>, чтобы открыть...</div>
                </div>
                <?php 
                    include "includes/chats.php";
                ?>
            </div>
            <div class="messages">
                <?php 
                    if (isset($_GET['view']) && $_GET['view'] == 'allMsg') { 
                        include "includes/allMsg.php"; 
                    }
                    else if (isset($_GET['view']) && $_GET['view'] != 'allMsg') {
                        include "includes/Msg.php"; 
                    }
                ?>
            </div>
            <?php if (isset($_GET['view'])) : ?>
            <form action="includes/send_message.php" method="POST" class="send-form">
                <input type="hidden" name="chat_id" value="<?= htmlspecialchars($_GET['view']); ?>">
                <textarea name="message" placeholder="Введите сообщение..." required></textarea>
                <button type="submit" name="send">Отправить</button>
            </form>
            <?php endif; ?>
        </div>
    </div>

    <div class="logout_bth">
        <p><a href="includes/logout.php">Выйти</a> из системы</p>
    </div>
<?php 
    include "includes/footer.php";
?>