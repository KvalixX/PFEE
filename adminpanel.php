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
    $image = $_POST['image'];  // Handle file upload for images properly

    $sql = "INSERT INTO products (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Admin Panel - Manage Products</h1>

    <form action="adminpanel.php" method="POST">
        <h2>Add Product</h2>
        <label for="name">Product Name:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="description">Product Description:</label>
        <textarea name="description" id="description" required></textarea><br><br>

        <label for="price">Price ($):</label>
        <input type="number" name="price" id="price" required><br><br>

        <label for="image">Image URL:</label>
        <input type="text" name="image" id="image" required><br><br>

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
                    <a href="product.php?id=' . $row['id'] . '"><i class="fa fa-shopping-cart"></i></a>
                    <a href="adminpanel.php?delete_id=' . $row['id'] . '" onclick="return confirm(\'Are you sure you want to delete this product?\')"><i class="fa fa-trash"></i> Delete</a>
                    <a href="edit_product.php?id=' . $row['id'] . '"><i class="fa fa-pencil"></i> Edit</a>
                </div>
                ';
            }
        } else {
            echo "No products found!";
        }
        ?>
    </div>

</body>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 30px;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    form h2 {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }

    input, textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
    }

    textarea {
        height: 150px;
        resize: vertical;
    }

    button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #45a049;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .products {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .pro {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        width: 250px;
        padding: 15px;
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .pro:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
    }

    .pro img {
        width: 100%;
        height: auto;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .pro .des {
        margin-top: 10px;
    }

    .pro .des span {
        font-size: 1.1rem;
        font-weight: bold;
        display: block;
        color: #333;
        margin-bottom: 5px;
    }

    .pro .des h5 {
        font-size: 1rem;
        color: #666;
        margin-bottom: 10px;
    }

    .pro .des h4 {
        font-size: 1.2rem;
        color: #4CAF50;
        margin-bottom: 10px;
    }

    .pro a {
        display: inline-block;
        margin: 5px;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border-radius: 5px;
        font-size: 1rem;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .pro a:hover {
        background-color: #45a049;
    }

    .pro a i {
        margin-right: 5px;
    }

    @media (max-width: 768px) {
        .products {
            flex-direction: column;
            align-items: center;
        }

        .pro {
            width: 90%;
        }
    }
</style>
</html>

<?php $conn->close(); ?>
