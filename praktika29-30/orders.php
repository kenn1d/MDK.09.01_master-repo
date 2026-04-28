<?php 
    include "DB/database.php";
    const ip = "localhost";
    const username = "root";
    const password = "";
    const dbName = "goldFish";
    $client_id = 1;

    $dataBase = DB_connect(ip, username, password, dbName);
    $result = DB_query(
        "SELECT o.*, p.name FROM Orders o 
        JOIN product p ON o.product_id = p.id 
        WHERE o.client_id = $client_id
        ORDER BY o.order_num DESC", $dataBase);

    $orders = [];
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $num = $row['order_num'];
        if (!isset($orders[$num])) {
            $orders[$num] = [
                'items' => [],
                'total' => 0
            ];
        }
        $orders[$num]['items'][] = $row;
        $orders[$num]['total'] += $row['totalSum'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Золотая Рыбка — заказы</title>
    <link rel="stylesheet" href="css/orders.css">
</head>
<body>
    <header>
        <h1>Интернет-магазин "Золотая рыбка"</h1>
        <nav>
            <ul class="menu">
                <li><a href="index.html">Главная</a></li>
                <li><a href="catalog.php">Каталог</a></li>
                <li class="active"><a href="#">Заказы</a></li>
                <li><a href="basket.php">Корзина</a></li>
            </ul>
        </nav>
    </header>

    <main class="orders">
        <?php foreach($orders as $orderNum => $orderData) : ?>
            <table class="order-table">
                <thead>
                    <tr>
                        <th>Номер заказа</th>
                        <th>Товары</th>
                        <th>Цена</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="order-row">
                        <td class="order-number">№ <?= $orderNum; ?></td>
                        <td class="product-names">
                            <?php foreach($orderData['items'] as $item) : ?>
                                <?= $item['name']; ?><br>
                            <?php endforeach; ?>
                        </td>
                        <td class="prices">
                            <?php foreach($orderData['items'] as $item) : ?>
                                <?= $item['totalSum']; ?> руб.<br>
                            <?php endforeach; ?>
                        </td>
                        <td class="status">
                            <?php foreach($orderData['items'] as $item) :
                                $flag = $item['completeOrder'];
                                if($flag == 0) { echo "Не завершен"; }
                                else { echo "Завершен"; } ?><br>
                            <?php endforeach; ?>
                        </td>
                    </tr>
                    <tr class="total-row">
                        <td></td>
                        <td class="total-label">Сумма:</td>
                        <td class="total-sum"><?= $orderData['total']; ?> руб.</td>
                    </tr>
                </tbody>
            </table>
        <?php endforeach; ?>
    </main>

    <footer>
        <div class="footer-line"></div>
        <p>Сайт разработан Кибновым М.Е., 2026</p>
    </footer>
</body>
</html>