<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    $cart_item = [
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => 1,
    ];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Vérifier si l'article est déjà dans le panier
    $item_exists = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $product_id) {
            $item['quantity']++;
            $item_exists = true;
            break;
        }
    }

    // Ajouter l'article au panier s'il n'existe pas
    if (!$item_exists) {
        $_SESSION['cart'][] = $cart_item;
    }

    header('Location: Shop.php?success=1');
    exit();
}
?>
