<?php 
    include "DB/database.php";
    const ip = "localhost";
    const username = "root";
    const password = "";
    const dbName = "goldFish";

    $client_id = 1;
    $dataBase = DB_connect(ip, username, password, dbName);
    $basketResult = DB_query("SELECT * FROM `basket` WHERE `client_id` = $client_id", $dataBase);
    $basket = DB_getMas($basketResult);

    if(isset($_POST['toOrder'])) {
        $orderNum = rand(1000, 9999);

        $addOrder = DB_query(
            "INSERT INTO `Orders` (`client_id`, `order_num`, `totalSum`, `product_id`, `completeOrder`) 
            SELECT `client_id`, $orderNum, `summ`, `product_id`, 0
            FROM `Basket` 
            WHERE `client_id` = $client_id", 
            $dataBase
        );
        
        $clearBasket = DB_query("DELETE FROM `Basket` WHERE `client_id` = $client_id", $dataBase);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Золотая Рыбка — корзина</title>
    <link rel="stylesheet" href="css/basket.css">
</head>
<body>
    <header>
        <h1>Интернет-магазин "Золотая Рыбка"</h1>
        <nav>
            <ul class="menu">
                <li><a href="index.html">Главная</a></li>
                <li><a href="catalog.php">Каталог</a></li>
                <li><a href="orders.php">Заказы</a></li>
                <li class="active"><a href="#">Корзина</a></li>
            </ul>
        </nav>
    </header>
    <main class="cart">
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Товары</th>
                    <th>Цена</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(!empty($basket))
                    foreach($basket as $value) :
                        $productResult = DB_query("SELECT `name`, `price` FROM `product` WHERE `id` = {$value['product_id']}", $dataBase);
                        $product = DB_getMas($productResult);
                        ?>
                        <tr>
                            <td><?= $product[0]['name']; ?></td>
                            <td><?= $value['summ']; ?> руб</td>
                            <td><span class="delete-icon">🗑️</span></td>
                        </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="cart-total">
            <p><strong>Сумма</strong><?php 
                $result = mysqli_fetch_array(DB_query("SELECT SUM(summ) AS total_sum FROM `Basket`", $dataBase), MYSQLI_ASSOC);
                $totalPrice = $result['total_sum'] ?? 0;
                echo $totalPrice;
                ?> руб</p>
            <form action="" method="post">
                <input type="submit" name="toOrder" value="Заказать" class="order-btn">
            </form>
        </div>
    </main>
    <footer>
        <div class="footer-line"></div>
        <p>Сайт разработан Кибновым М.Е., 2026</p>
    </footer>
</body>
</html>