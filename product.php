<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./product.css">
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

<section id="prodetails" class="section-p1">
    <div class="single-pro-image">
        <img src="images/Adidas T-shirt 3bandes.jpg" width="100%" id="MainImg">
        <div class="small-img-group">
            <div class="small-img-col">
            <img src="images/Gloves.jpg" width="100%" class="small-img">
            </div>
            <div class="small-img-col">
            <img src="images/Adidas T-shirt 3bandes.jpg" width="100%" class="small-img">
            </div>
            <div class="small-img-col">
            <img src="images/Adidas T-shirt 3bandes.jpg" width="100%" class="small-img">
            </div>
            <div class="small-img-col">
            <img src="images/Adidas T-shirt 3bandes.jpg" width="100%" class="small-img">
            </div>
        </div>
    </div>

    <div class="single-pro-details">
        <h6>Home / T-Shirt</h6>
        <h4>Men's Fashion T shirt</h4>
        <h2>$13</h2>
        <select name="" id="">
            <option value="">Select Size</option>
            <option value="">XL</option>
            <option value="">XXL</option>
            <option value="">Small</option>
            <option value="">Large</option>
        </select>
        <input type="number" value="1">
        <button class="normal">Add to Cart</button>
        <h4>Product Details</h4>
        <span>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt aut aliquid veniam eveniet deleniti accusamus pariatur, a et qui nesciunt ea, quam est animi dicta velit nobis sunt ducimus. Deleniti.

        </span>
    </div>
</section>


<section id="product1" class="section-p1">
    <div class="pro-container">
        <div class="pro" onclick="window.location.href='product.php';">
            <img src="images/Adidas T-shirt 3bandes.jpg" alt="Adidas T-shirt 3 Bandes">
            <div class="des">
                <span>adidas</span>
                <h5>T-shirt</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>$50</h4>
            </div>
            <a href="#"><i class="fa fa-shopping-cart"></i></a>
        </div>
        <div class="pro" onclick="window.location.href='product.php';">
            <img src="images/short nike.png" alt="Adidas T-shirt 3 Bandes">
            <div class="des">
                <span>Nike</span>
                <h5>Short</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>$80</h4>
            </div>
            <a href="#"><i class="fa fa-shopping-cart"></i></a>
        </div>
        <div class="pro" onclick="window.location.href='product.php';">
            <img src="images/wrist wraps.webp" alt="Adidas T-shirt 3 Bandes">
            <div class="des">
                <span>Thunder Fitness</span>
                <h5>wrist wraps</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>$35</h4>
            </div>
            <a href="#"><i class="fa fa-shopping-cart"></i></a>
        </div>
        <div class="pro" onclick="window.location.href='product.php';">
            <img src="images/bandes de résistance.webp" alt="Adidas T-shirt 3 Bandes">
            <div class="des">
                <span>Fitness boutique</span>
                <h5>bande résistance</h5>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h4>$50</h4>
            </div>
            <a href="#"><i class="fa fa-shopping-cart"></i></a>
        </div>
    </div>
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
