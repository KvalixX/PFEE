<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "pfe"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product to edit
$product = null;
if (isset($_GET['id'])) {
    $id = (int)$_GET['id']; // Cast to integer for safety
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found!";
        exit;
    }
    $stmt->close();
}

// Update product
if (isset($_POST['update_product'])) {
    $id = (int)$_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = (float)$_POST['price'];

    // Check if a new image is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);

        // Ensure the uploads directory exists
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Attempt to move the uploaded file
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $imagePath = $targetFile;
        } else {
            echo "Error uploading the new image.";
            exit;
        }
    } else {
        // No new image uploaded, retain the old image path
        $imagePath = $_POST['current_image'];
    }

    // Update the database
    $stmt = $conn->prepare("UPDATE products SET name = ?, description = ?, price = ?, image = ? WHERE id = ?");
    $stmt->bind_param("ssdsi", $name, $description, $price, $imagePath, $id);
    if ($stmt->execute()) {
        header("Location: adminpanel.php");
    } else {
        echo "Error updating product: " . $conn->error;
    }
    $stmt->close();
}

$conn->close();
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
    <?php if ($product): ?>
    <form action="edit_product.php?id=<?php echo $product['id']; ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <input type="hidden" name="current_image" value="<?php echo $product['image']; ?>">

        <label for="name">Product Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required><br><br>

        <label for="description">Product Description:</label>
        <textarea name="description" required><?php echo htmlspecialchars($product['description']); ?></textarea><br><br>

        <label for="price">Price ($):</label>
        <input type="number" name="price" step="0.01" value="<?php echo $product['price']; ?>" required><br><br>

        <label for="image">Product Image:</label>
        <input type="file" name="image"><br>
        <p>Current Image: <a href="<?php echo $product['image']; ?>" target="_blank">View</a></p><br>

        <button type="submit" name="update_product">Update Product</button>
    </form>
    <?php else: ?>
        <p>Product not found.</p>
    <?php endif; ?>
</body>
</html>
