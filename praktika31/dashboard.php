<?php 
    session_start();

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db_name = 'blog';

    $conn = new mysqli($host, $user, $pass, $db_name);
    $conn->set_charset("utf8mb4");

    $query = "SELECT id, title, content, created_at FROM posts ORDER BY created_at DESC LIMIT 5";
    $result = $conn->query($query);

    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $content_preview = mb_substr($row['content'], 0, 150);
            if (strlen($row['content']) > 150) {
                $content_preview .= "...";
            }

            echo '<h2>' . htmlspecialchars($row['title']) . '</h2>';
            echo '<p>' . htmlspecialchars($content_preview) . '</p>';
            echo '<a href="post.php?id=' . $row['id'] . '">Читать полностью</a><br>';
            echo "<a href='add.php?id={$row['id']}'>Изменить запись</a>";
            echo '<hr>';
        }
    }
    else {
        echo 'Нет записей для отображения';
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лента</title>
</head>
<body>
    <a href="add.php">Добавить запись</a>
</body>
</html>