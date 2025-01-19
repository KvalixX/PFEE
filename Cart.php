<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Your Cart</h1>
    <?php if (!empty($_SESSION['cart'])): ?>
        <form action="update_cart.php" method="post">
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($_SESSION['cart'] as $product_id => $item):
                        $item_total = $item['price'] * $item['quantity'];
                        $total += $item_total;
                    ?>
                        <tr>
                            <td><?= $item['name'] ?></td>
                            <td>$<?= number_format($item['price'], 2) ?></td>
                            <td>
                                <input type="number" name="quantity[<?= $product_id ?>]" value="<?= $item['quantity'] ?>" min="1">
                            </td>
                            <td>$<?= number_format($item_total, 2) ?></td>
                            <td>
                                <button type="submit" name="update[<?= $product_id ?>]">Update Quantity</button>
                                <a href="remove_product.php?product_id=<?= $product_id ?>" class="remove-button">Remove</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3">Grand Total</td>
                        <td>$<?= number_format($total, 2) ?></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" name="action" value="update_cart">Update Cart</button>
        </form>
        <a href="checkout.php">Proceed to Checkout</a>
    <?php else: ?>
        <p>Your cart is empty!</p>
    <?php endif; ?>
</body>
</html>
<style>
    /* Table and cart item styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

button, .remove-button {
    padding: 6px 12px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}

button:hover, .remove-button:hover {
    background-color: #0056b3;
}

.remove-button {
    text-decoration: none;
    padding: 6px 12px;
    background-color: #ff4747;
    border-radius: 5px;
}

.remove-button:hover {
    background-color: #e03e3e;
}

/* Optional: Style for the input number field */
input[type="number"] {
    width: 60px;
    padding: 5px;
    text-align: center;
    font-size: 16px;
}

</style>