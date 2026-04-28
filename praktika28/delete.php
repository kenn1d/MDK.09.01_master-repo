<?php 
    include "connection.php";
    include "DBclass.php";

    $db = new DBclass(SERVER, USER, PASSWORD, NAME);

    if (isset($_GET['delete'])) {
        if ($db->openConnection()) {
            $idToDelete = $_GET['delete'] ?? null;

            if ($idToDelete === null) {
                echo "Не указан ID записи для удаления.";
                exit;
            }

            $escapedId = $db->escapeString($idToDelete);

            $sql = "DELETE FROM users WHERE `id` = '" . $escapedId . "'";
            
            $result = $db->query($sql);

            if ($result) {
                $affectedRows = $db->getAffectedRows();
                if ($affectedRows > 0) {
                    echo "<script>
                        alert('Запись с ID " . $escapedId . " Успешно удалена.');
                        window.location.href = 'list.php';
                    </script>";
                    exit;
                } else {
                    echo "Запись с ID " . $escapedId . " не найдена или уже была удалена.";
                }
            } else {
                echo "Ошибка подключения к базе данных: " . $db->getLastError();
            }
        } else {
            echo "Ошибка подключения к базе данных: " . $db->getLastError();
        }
    }
?>