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
        <li><a href="Sign-up.php"><i class="fas fa-user-plus"></i> Sign up</a></li>
        <li><a href="Log-in.php"><i class="fas fa-sign-in-alt"></i> Log in</a></li>
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
                    <div class="pro" onclick="window.location.href=\'product.php?id=' . $row['id'] . '\';">
                        <img src="' . $row['image'] . '" alt="' . $row['name'] . '">
                        <div class="des">
                            <span>Fitness boutique</span>
                            <h5>' . $row['name'] . '</h5>
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h4>$' . $row['price'] . '</h4>
                        </div>
                        <a href="#"><i class="fa fa-shopping-cart"></i></a>
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

<script src="mainn.js"></script>
</body>
</html>
