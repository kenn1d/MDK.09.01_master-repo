<?php 
    function DB_connect($ip, $username, $password, $dbName) {
        $dataBase = mysqli_connect($ip, $username, $password, $dbName);
        if (!$dataBase) die (mysqli_connect_error());
        return $dataBase;
    }

    function DB_query($query, $dataBase) {
        $result = mysqli_query($dataBase, $query);
        if (!$result) die ("Сбой при доступе к БД: " . mysqli_error($dataBase));
        return $result;
    }

    function DB_parse($result) {
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                echo "<div style='border-bottom: 1px solid #ccc; margin-bottom: 10px;'>";

                $tableName = mysqli_fetch_field_direct($result, 0) -> table;

                foreach ($row as $columnName => $value) {
                    if ($columnName == 'photo')
                        echo "<p>:<strong>" . htmlspecialchars($columnName) . ":</strong> "."<br>"."<img style='max-height: 200px;' src='" . $value . "'>" . "</p>";
                    else echo "<p>:<strong>" . htmlspecialchars($columnName) . ":</strong> " . htmlspecialchars($value) . "</p>";
                }?>
                    <form action='' method='post'>
                        <input type='hidden' name='delete' value='yes'>
                        <input type='hidden' name='table' value="<?= $tableName; ?>">
                        <input type='hidden' name='id' value='<?= $row['id']; ?>'>
                    </form>
                    </div>
                <?php
            }
        }
        else echo "<p>Таблица пустая</p>";
    }
?>