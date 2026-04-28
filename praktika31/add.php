<?php 
    session_start();

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db_name = 'blog';

    $conn = new mysqli($host, $user, $pass, $db_name);
    $conn->set_charset("utf8mb4");
    $add = true;

    $post_id = $_GET['id'] ?? null;
    if ($post_id) {
        $add = false;
        $query = "SELECT title, content, created_at FROM posts WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $post_id);
        $stmt->execute();

        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $post = $result->fetch_assoc();

            echo "
            <form action='' method='POST'>
                <label>Заголовок:</label>
                <input type='text' name='title' required value='{$post['title']}'>
                <label>Текст:</label>
                <input type='text' name='content' required value='{$post['content']}'>";
            echo "<button type='submit' name='addPost'>Изменить</button>
            </form>";

        } else {
            echo "Запись с ID " . htmlspecialchars($post_id) . " не найдена в базе.";
        }

        $stmt->close();
    } else { 
        echo "
            <form action='' method='POST'>
                <label>Заголовок:</label>
                <input type='text' name='title' required>
                <label>Текст:</label>
                <input type='text' name='content' required>";
        echo "<button type='submit' name='addPost'>Добавить</button>
        </form>";
    }

    if(isset($_POST['addPost'])) {
        if($add) {
            $query = "INSERT INTO `posts`(`title`, `content`) VALUES ('{$_POST['title']}','{$_POST['content']}')";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            header("Location: dashboard.php");
            exit;
        }
        else {
            $query = "UPDATE `posts` SET `title`='{$_POST['title']}',`content`='{$_POST['content']}' WHERE `id` = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $post_id);
            $stmt->execute();
            header("Location: dashboard.php");
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление записи</title>
</head>
<body>
    <!-- <form action="" method="post">
        <label>Заголовок:</label>
        <input type="text" name="title" required value="">
        <label>Текст:</label>
        <input type="text" name="content" required>
        
    </form> -->
</body>
</html>