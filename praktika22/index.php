<?php 
    include 'database.php';

    $ip = 'localhost';
    $username = 'root';
    $password = '';
    $dbName = 'UploadFiles';

    $dataBase = DB_connect($ip, $username, $password, $dbName);

    if(isset($_POST['bthUpload'])) {
        $file = "upload/". $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $file);
        $query = "INSERT INTO `Users` (`name`, `email`, `photo`, `phone`) VALUES ('{$_POST['name']}','{$_POST['email']}','$file','{$_POST['phone']}')";
        $result = DB_query($query, $dataBase);

        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новый пользователь</title>
</head>
<body>
    <div>
        <h2>Новый пользователь</h2>
        <div style="display: flex;  gap: 15px;">
            
            <form action="" method="post" style="display: flex; gap: 10px;" enctype="multipart/form-data">
                <div class="photo" style=" display: flex; align-items: center;  background: #f5f5f5; padding: 0 5px 0 5px">
                    <input type="file" name="file" title=''>    
                </div>
                <div style="display: flex; gap: 10px; flex-direction: column; justify-content: space-between;">
                    <input type="text" name="name" placeholder="Имя" required>
                    <input type="text" name="email" placeholder="Email" required>
                    <input type="text" name="phone" placeholder="Телефон" required>
                    <input type="submit" name="bthUpload" value="Зарегистрироваться">
                </div>
            </form>
        </div>
    </div>
    <div>
        <?php DB_parse(DB_query("SELECT * FROM `Users`", $dataBase)); ?>
    </div>
</body>
<?php mysqli_close($dataBase); ?>
</html>