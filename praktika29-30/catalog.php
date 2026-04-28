<?php 
    include "DB/database.php";
    const ip = "localhost";
    const username = "root";
    const password = "";
    const dbName = "goldFish";

    $dataBase = DB_connect(ip, username, password, dbName);
    $result = DB_query("SELECT * FROM `Product`", $dataBase);
    $products = DB_getMas($result);

    $clientId = 1;
    if(isset($_POST['goToBasket'])) {    
        $productId = $_POST['id'];
        
        $check = DB_query(
            "SELECT * FROM `Basket` WHERE `product_id` = $productId AND `client_id` = $clientId", 
        $dataBase);

        if(empty(DB_getMas($check))) {
            $addToBasket = DB_query(
                "INSERT INTO `Basket` (`client_id`, `product_id`, `summ`) 
                SELECT $clientId, `id`, `price` 
                FROM `product` 
                WHERE `id` = $productId", 
            $dataBase);
        }
        else {
            $addToBasket = DB_query(
                "UPDATE `Basket` 
                SET `summ` = `summ` + (
                    SELECT `price` FROM `product` WHERE `id` = $productId
                )
                WHERE `product_id` = $productId AND `client_id` = $clientId", 
            $dataBase);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Золотая Рыбка — каталог</title>
    <link rel="stylesheet" href="css/catalog.css">
</head>
<body>
    <header>
        <h1>Интернет-магазин "Золотая Рыбка"</h1>
        <nav>
            <ul class="menu">
                <li><a href="index.html">Главная</a></li>
                <li class="active"><a href="#">Каталог</a></li>
                <li><a href="orders.php">Заказы</a></li>
                <li><a href="basket.php">Корзина</a></li>
            </ul>
        </nav>
    </header>
    <main class="catalog">
        <?php 
            foreach ($products as $item) { ?>
                <div class="product"> 
                    <form action="" method="post">
                        <h3><?= $item['name']; ?></h3>
                        <div class="img-placeholder">
                            <img src="<?= $item['photo']; ?>" alt="product">
                        </div>
                        <p class="price"><?= $item['price']; ?> руб.</p>
                        <input type="submit" name="goToBasket" value="в корзину">
                        <input type="hidden" name="id" value="<?= $item['id']; ?>">
                    </form>
                </div>
            <?php }
        ?>
    </main>
    <footer>
        <div class="footer-line"></div>
        <p>Сайт разработан Кибновым М.Е., 2026</p>
    </footer>
</body>
</html>