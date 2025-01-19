<?php
session_start();

if (isset($_POST['action']) && $_POST['action'] == 'update_cart') {
    // Mettre à jour les quantités
    foreach ($_POST['quantity'] as $product_id => $quantity) {
        if ($quantity >= 1) {
            $_SESSION['cart'][$product_id]['quantity'] = $quantity;
        }
    }
}

header('Location: cart.php');
exit;
?>
