<?php 
    $items = array(
        array('id' => '1', 'desc' => 'Канадско-австралийский словарь', 'price' => 24.95),
        array('id' => '2', 'desc' => 'Парашют', 'price' => 1000),
        array('id' => '3', 'desc' => 'Виниловая платинка GUF - Дома', 'price' => 100000),
        array('id' => '4', 'desc' => 'F sharp', 'price' => 39.95),
    );

    session_start();
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

    if(isset($_POST['action']) and $_POST['action'] == 'Купить'){
        $_SESSION['cart'][] = $_POST['id'];
        header('Loaction: .');
        exit();
    }

    if(isset($_GET['cart'])) {
        $cart = array();
        $total = 0;
        foreach ($_SESSION['cart'] as $id) {
            foreach ($items as $product) {
                if ($product['id'] == $id){
                    $cart[] = $product;
                    $total += $product['price'];
                    break;
                }
            }
        }
        include 'cart.html.php';
        exit();
    }

    function html($text) {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }
    function htmlout($text) {
        echo html($text);
    }

    if(isset($_POST['action']) and $_POST['action'] == 'Очистить корзину') {
        unset($_SESSION['cart']);
        header('Location: ?cart');
        exit();
    }

    include 'catalog.html.php';
?>