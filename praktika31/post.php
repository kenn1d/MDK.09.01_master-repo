<?php 
    session_start();

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db_name = 'blog';

    $conn = new mysqli($host, $user, $pass, $db_name);
    $conn->set_charset("utf8mb4");

    $post_id = $_GET['id'] ?? null;
    if ($post_id) {
        $query = "SELECT title, content, created_at FROM posts WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $post_id);
        $stmt->execute();

        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $post = $result->fetch_assoc();

            echo '<h1>' . htmlspecialchars($post['title']) . '</h1>';
            echo '<p>' . nl2br(htmlspecialchars($post['content'])) . '</p>';
            echo '<p><em>Дата публикации: ' . $post['created_at'] . '</em></p>';
        } else {
            echo "Запись с ID " . htmlspecialchars($post_id) . " не найдена в базе.";
        }

        $stmt->close();
    } else { echo 'Неверный ID записи'; }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пост</title>
</head>
<body>
    
</body>
</html>