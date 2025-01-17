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

// Add product
if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // File upload handling
    $image_path = ''; // Initialize the variable to store the image path

    if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $temp_name = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $image_path = 'uploads/' . $image_name; // Example upload directory

        // Move uploaded file to permanent location
        move_uploaded_file($temp_name, $image_path);
    }

    // Insert into database
    $sql = "INSERT INTO products (name, description, price, image) VALUES ('$name', '$description', '$price', '$image_path')";
    $conn->query($sql);
}


// Delete product
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM products WHERE id = $delete_id";
    $conn->query($sql);
}

// Fetch all products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="dashboardd.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="adminpanel.php"><i class="fas fa-box"></i> Manage Products</a></li>
                <li><a href="orders.php"><i class="fas fa-shopping-cart"></i> Orders</a></li>
                <li><a href="users.php"><i class="fas fa-users"></i> Users</a></li>
                <li><a href="settings.php"><i class="fas fa-cogs"></i> Settings</a></li>
                <li><a href="Log-in.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h1>Manage Products</h1>
            <form action="adminpanel.php" method="POST" enctype="multipart/form-data">
                <h2>Add Product</h2>
                <label for="name">Product Name:</label>
                <input type="text" name="name" id="name" required><br><br>

                <label for="description">Product Description:</label>
                <textarea name="description" id="description" required></textarea><br><br>

                <label for="price">Price ($):</label>
                <input type="number" name="price" id="price" required><br><br>

                <label for="image">Image URL:</label>
                <input type="file" name="image" id="image" required><br><br>

                <button type="submit" name="add_product">Add Product</button>
            </form>

            <h2>Existing Products</h2>
            <div class="products">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <div class="pro">
                            <img src="' . $row['image'] . '" alt="' . $row['name'] . '">
                            <div class="des">
                                <span>' . $row['name'] . '</span>
                                <h5>' . $row['description'] . '</h5>
                                <h4>$' . $row['price'] . '</h4>
                            </div>

                            <a id="delete-btn" href="adminpanel.php?delete_id=' . $row['id'] . '" onclick="return confirm(\'Are you sure you want to delete this product?\')"><i class="fa fa-trash"></i> Delete</a>
                            <a id="edit-btn" href="edit_product.php?id=' . $row['id'] . '"><i class="fa fa-pencil"></i> Edit</a>
                        </div>
                        ';
                    }
                } else {
                    echo "No products found!";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>


<?php $conn->close(); ?>
