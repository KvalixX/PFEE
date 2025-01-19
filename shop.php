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

// Fetch all products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./shops.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        function toggleMenu() {
            const menu = document.getElementById('menuList');
            menu.classList.toggle('active');
        }
    </script>
    <title>Kvalix</title>
</head>
<body>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav>
    <div class="logo">
        <h1>M<span>S</span></h1>
    </div>
    <ul id="menuList">
        <li><a href="index.php">Home</a></li>
        <li><a href="Shop.php">Shop</a></li>
        <li><a href="Programs.php">Programs</a></li>
        <li><a href="Plan.php">Plan</a></li>
        <li><a href="Contact.php">Contact</a></li>
        
        <?php if (isset($_SESSION['user_id'])): ?>
            <li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        <?php else: ?>
            <li><a href="Sign-up.php"><i class="fas fa-user-plus"></i> Sign up</a></li>
            <li><a href="Log-in.php"><i class="fas fa-sign-in-alt"></i> Log in</a></li>
        <?php endif; ?>
        <!-- Lien vers le panier -->
        <li><a href="cart.php"><i class="fas fa-shopping-cart"></i> Cart</a></li>
    </ul>
    <div class="menu-icon">
        <i class="fa-solid fa-bars" onclick="toggleMenu()"></i>
    </div>
</nav>


<section class="header">
    <h2>Our <span>Shop</span></h2>
    <p>Discover top-quality gym gear designed to elevate your fitness journey. From strength training to recovery, we have everything you need to reach your goals!</p>
</section>
<div id="product1">
        <h2>Our Products</h2>
        <p>Explore our collection of amazing products</p>

        <div class="pro-container">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="pro">
                <img src="' . $row['image'] . '" alt="' . $row['name'] . '">
                <div class="des">
                    <span>Fitness boutique</span>
                    <h5>' . $row['name'] . '</h5>
                    <h4>$' . $row['price'] . '</h4>
                </div>
                <form action="cart_action.php" method="POST">
                    <input type="hidden" name="product_id" value="' . $row['id'] . '">
                    <input type="hidden" name="product_name" value="' . $row['name'] . '">
                    <input type="hidden" name="product_price" value="' . $row['price'] . '">
                    <button type="submit" name="add_to_cart" class="add-to-cart-btn">
                        <i class="fa fa-shopping-cart"></i> Add to Cart
                    </button>
                </form>
            </div>';
        }
    } else {
        echo "<p>No products found!</p>";
    }
    ?>
</div>
    </div>


    <section id="paginationn" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
    </section>
<footer>
    <div class="row">
        <div class="col">
            <h1>Move&<span>Shop</span></h1>
            <p>Move better, live better, find everything at Move&Shop</p>
        </div>
        <div class="col">
            <h3>Quick Links</h3>
            <ul class="quick-links">
                <div class="left-links">
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="Shop.php">Shop</a></li>
                    <li><a href="Programs.php">Programs</a></li>
                    <li><a href="#Plan">Plan</a></li>
                    <li><a href="Contact.php">Contact</a></li>
                </div>
                <div class="right-links">
                    <li><a href="Schedules.php">Schedules</a></li>
                    <li><a href="Membership.php">Membership</a></li>
                    <li><a href="Services.php">Services</a></li>
                </div>
            </ul>
        </div>
        <div class="col">
            <h3>Connect With Us</h3>
            <ul class="social-links">
                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
        <div class="col">
            <h3>Newsletter</h3>
            <p>Subscribe to our newsletter for the latest updates and offers.</p>
            <form>
                <input type="email" placeholder="Enter your email" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </div>
</footer>
<style>
    /* Style for Add to Cart button */
.add-to-cart-btn {
    text-decoration: none;  /* No underline on the text */
    border: 1px solid #ccc;  /* Light border around the button */
    border-radius: 1em;  /* Rounded corners */
    padding: 1em 2em;  /* Padding around the button */
    font-weight: bold;  /* Bold font weight */
    text-transform: uppercase;  /* Uppercase text */
    display: inline-block;  /* Make the button an inline block */
    background-color: white;  /* White background color */
    color: #333;  /* Dark text color */
    transition: all 0.3s ease;  /* Smooth transition for all properties */
    margin-bottom: 0;  /* No bottom margin */
}

/* Hover effect for Add to Cart button */
.add-to-cart-btn:hover {
    background-color: #8b382a;  /* Dark red background on hover */
    color: white;  /* White text color on hover */
    border-color: #8b382a;  /* Change border color to match the background */
}

</style>
<script src="mainn.js"></script>
</body>
</html>
