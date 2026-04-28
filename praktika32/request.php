<?php
    $name =$_POST['name'] ?? '';
    $phone =$_POST['phone'] ?? '';
    $service = $_POST['service'] ?? '';
    $message =$_POST['message'] ?? '';

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db_name = 'pr32';
    $conn = new mysqli($host, $user, $pass, $db_name);

    $name = $conn->real_escape_string($name);
    $phone = $conn->real_escape_string($phone);
    $service = $conn->real_escape_string($service);
    $message = $conn->real_escape_string($message);

    $sql = "INSERT INTO `requests`(`fio`, `phone`, `services`, `message`) VALUES ('$name','$phone','$service','$message')";

    if($conn->query($sql) === TRUE) {
        echo "<h2>Заявка успешно отправлена!</h2>";
        echo "<p>Спасибо за вашу заявку. Мы свяжимся с вами в ближайшее время.</p>";
    } else {
        echo "<h2>Ошибка отправки заявки:</h2>";
        echo "<p>$conn->error</p>";
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Запрос</title>
    
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .colse {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover, .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Оформление заявки на услугу</h2>
    <button id='myBtn'>Оформить заявку</button>
    <div id='myModal' class='modal'>
        <div class="modal-content">
            <span class='close'>&times;</span>
            <h2>Заявка на услугу</h2>
            <form action="" method="post">
                <label for="name">Ваше имя:</label>
                <input type="text" name="name" id="name" required><br><br>
                <label for="name">Ваш телефон:</label>
                <input type="phone" name="phone" id="phone" required><br><br>
                <label for="name">Выберите услугу:</label>
                <select name="service" id="service">
                    <option value="консультация">Консультация</option>
                    <option value="разработка">Разработка</option>
                    <option value="поддержка">Поддержка</option>
                </select><br><br>
                <label for="name">Ваше соощение:</label>
                <textarea id='message' name='message' rows='4' cols='50'></textarea><br><br>
                <input type="submit" value='Отправить заявку'>
            </form>
        </div>
    </div>
</body>
    <script>
        var modal = document.getElementById('myModal');
        var btn = document.getElementById('myBtn');
        var span = document.getElementsByClassName('close')[0];

        btn.onclick = function() {
            modal.style.display = "block";
        }
        span.onclick = function() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if(event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</html>