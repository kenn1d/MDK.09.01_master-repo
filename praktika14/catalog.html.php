<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог товаров</title>
    <style>
        table {
            border-collapse: collapse;
        }
        td, th {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <p>Ваша корзина содержит <?php echo count($_SESSION['cart']); ?> элементов</p>
    <p><a href="?cart">Посмотреть корзину</a></p>
    <table>
        <thead>
            <tr>Описание товара</tr>
            <th>Цена</th>
        </thead>
        <tbody>
            <?php foreach($items as $item): ?>
                <tr>
                    <td><?php htmlout($item['desc']); ?></td>
                    <td>
                        $<?php echo number_format($item['price'], 2); ?>
                    </td>
                    <td>
                        <form action="" method="post">
                            <div>
                                <input type="hidden" name="id" value="<?php htmlout($item['id']); ?>">
                                <input type="submit" name="action" value="Купить">
                            </div>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <p>Все цены указаны в баксах.</p>
</body>
</html>