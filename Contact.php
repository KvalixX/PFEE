<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <title>Contact Us - Move&Shop</title>
    <style>
    </style>
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

<section class="contact-form">
    <h2>Contact Us</h2>
    <form action="/submit_contact" method="post">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your full name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="program">Interested Program/Membership</label>
        <select id="program" name="program" required>
            <option value="" disabled selected>Select a program or membership</option>
            <option value="Membership">Membership</option>
            <option value="Personal Training">Personal Training</option>
            <option value="Group Classes">Group Classes</option>
            <option value="Yoga Program">Yoga Program</option>
            <option value="Diet Plan">Diet Plan</option>
        </select>

        <label for="message">Message</label>
        <textarea id="message" name="message" placeholder="Enter your message or inquiry" required></textarea>

        <button type="submit">Send Message</button>
    </form>
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

<script>
    function toggleMenu() {
        const menu = document.getElementById('menuList');
        menu.classList.toggle('active');
    }
</script>

<script src="mainn.js"></script>
</body>
</html>
