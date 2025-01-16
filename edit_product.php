<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "PFE"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product to edit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found!";
    }
}

// Update product
if (isset($_POST['update_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $sql = "UPDATE products SET name='$name', description='$description', price='$price', image='$image' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: adminpanel.php");
    } else {
        echo "Error updating product: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="edit_product.php?id=<?php echo $id; ?>" method="POST">
        <label for="name">Product Name:</label>
        <input type="text" name="name" value="<?php echo $product['name']; ?>" required><br><br>

        <label for="description">Product Description:</label>
        <textarea name="description" required><?php echo $product['description']; ?></textarea><br><br>

        <label for="price">Price ($):</label>
        <input type="number" name="price" value="<?php echo $product['price']; ?>" required><br><br>

        <label for="image">Image URL:</label>
        <input type="text" name="image" value="<?php echo $product['image']; ?>" required><br><br>

        <button type="submit" name="update_product">Update Product</button>
    </form>
</body>
</html>

<?php $conn->close(); ?>
