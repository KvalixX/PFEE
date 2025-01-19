<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
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
session_start();
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
            <!-- Show Profile links if user is logged in -->
            <li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        <?php else: ?>
            <!-- Show login/signup links if the user is not logged in -->
            <li><a href="Sign-up.php"><i class="fas fa-user-plus"></i> Sign up</a></li>
            <li><a href="Log-in.php"><i class="fas fa-sign-in-alt"></i> Log in</a></li>
        <?php endif; ?>
    </ul>
    <div class="menu-icon">
        <i class="fa-solid fa-bars" onclick="toggleMenu()"></i>
    </div>
</nav>


<section class="home">
    <video class="video-slide active" src="videos/1.mp4" autoplay muted loop></video>
    <video class="video-slide" src="videos/11.mp4" autoplay muted loop></video>
    
   
    <div class="content active">
    <h1>Move&<span>Shop</span></h1>
    <p>Move better, live better, find everything at Move&Shop</p>
    <a href="Shop.php">Shop Now</a>
</div>
<div class="content">
    <h1>Move&<span>Shop</span></h1>
    <p>Move better, live better, find everything at Move&Shop</p>
    <a href="Plan.php">Join Us</a>
</div>
    
 
    <div class="media-icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
    </div>
    
  
    <div id="services-cards" class="slider-navigation">
        <div class="nav-btn active" aria-label="Slide 1"></div>
        <div class="nav-btn" aria-label="Slide 2"></div>
    </div>
</section>
<br><br>
<section class="nature-section">
  <div class="nature-content">
  <h1 class="nature-title">Are you ready to change your body?</h1>
    <p>Join us now and take the first step towards a healthier, stronger, and more confident version of yourself.</p>
    <a href="#join-us" class="nature-link">Join Us</a>
  </div>
  <div class="nature-image">
    <img src="images/nature.jpg" alt="Nature Image">
  </div>
</section>
    <div class="container">
        <h1 class="section-heading">Our <span>Services</span></h1>
        <div class="services-cards">
            <div class="services-card">
                <i class="fa-solid fa-heart"></i>
                <h2>Personalized Gym Onboarding</h2>
                <p>Start strong with a tailored onboarding session! Meet with our trainers to create your personalized workout plan and explore our state-of-the-art facilities.</p>
            </div>
            <div class="services-card">
                <i class="fas fa-shopping-cart"></i>
                <h2>Fitness Equipment Purchase</h2>
                <p>Find everything you need to enhance your workouts at home: mats, dumbbells, resistance bands, and more. Purchase high-quality equipment directly through our online shop.</p>
            </div>
            <div class="services-card">
                <i class="fas fa-users"></i>
                <h2>Exclusive Gym Membership Packages</h2>
                <p>Choose from flexible membership plans tailored to your needs. Enjoy perks like free group classes, access to premium zones, and discounts on shop products.</p>
            </div>
        </div>
    </div>
<br><br>
<?php
// Connexion à la base de données (remplacez les valeurs selon votre configuration)
$host = 'localhost'; // hôte de la base de données
$dbname = 'PFE'; // nom de la base de données
$username = 'root'; // nom d'utilisateur de la base de données
$password = ''; // mot de passe de la base de données

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Définir le mode d'erreur de PDO pour afficher les exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Échec de la connexion à la base de données : ' . $e->getMessage();
}

// Requête SQL pour obtenir les 3 premiers produits
$query = "SELECT id, name, brand, image, price FROM products LIMIT 3";
$stmt = $pdo->prepare($query);
$stmt->execute();

// Récupérer les résultats dans un tableau associatif
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<section id="product1" class="section-p1">
    <h2>Top Sellers</h2>
    <p>Explore our most popular sports accessories, chosen by customers for their quality and performance!</p>
    <div class="pro-container">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="pro" onclick="window.location.href='product.php?id=<?= htmlspecialchars($product['id']); ?>';">
                    <img src="<?= htmlspecialchars($product['image']); ?>" alt="<?= htmlspecialchars($product['name']); ?>">
                    <div class="des">
                        <span><?= htmlspecialchars($product['brand']); ?></span>
                        <h5><?= htmlspecialchars($product['name']); ?></h5>
                        <h4>$<?= number_format($product['price'], 2); ?></h4>
                    </div>
                    <a href="#"><i class="fa fa-shopping-cart"></i></a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No top sellers available at the moment.</p>
        <?php endif; ?>
    </div>
</section>


<section class="program-content">
    <h1>Programs</h1>
    <div>
        <div class="program-img yoga-img">
            <div class="black-screen">
                <p>Yoga</p>
            </div>
        </div>
        <div class="program-img cardio-img">
            <div class="black-screen">
                <p>Cardio</p>
            </div>
        </div>
        <div class="program-img strength-img">
            <div class="black-screen">
                <p>Strength</p>
            </div>
        </div>
    </div>
    <a href="Programs.php" class="btn-1">View All</a>
</section>

<article>
	<div class="content">
		<h1>Fitness Journeys: Personalized for You</h1>
		<p>
			At our gym, fitness is about more than just exercise—it's about <mark>empowering</mark> you to achieve your goals. Whether you're just starting or are already experienced, we provide a <mark>supportive environment</mark> to help you build strength, stamina, and flexibility.
		</p>
		<p>
			Fitness isn't a one-size-fits-all journey. What works for one person might not work for another, but we're here to help you find your own path with <mark>personalized support</mark> and expert guidance.
		</p>
		<p>
			The <mark>energy of our community</mark> is what sets us apart. It's a place where everyone supports each other, pushes their limits, and stays motivated together.
		</p>
		<p>
			With the <mark>latest equipment</mark> and a friendly atmosphere, we help you push past barriers, elevate your workouts, and lift your spirit.
		</p>
		<h2>Fitness: A Lifestyle, Not Just a Goal</h2>
		<p>
			Working out isn’t just about physical fitness—it's about improving <mark>mental clarity</mark>, boosting confidence, and leading a fuller, healthier life. Fitness should be fun and sustainable, and we’re here to make that possible.
		</p>
		<p>
			It's about <mark>progress, not perfection</mark>. Small steps lead to big results. Join a community that values progress over perfection.
		</p>
		<p>
			<mark>Consistency</mark> is the key to success. The more you show up, the more you’ll grow—physically, mentally, and emotionally.
		</p>
		<p>
			Our gym isn’t just a place to work out; it’s a place to grow, challenge yourself, and have fun. Ready to take the first step? <mark>We’ll be here every step of the way</mark>.
		</p>
	</div>
</article>

<h1 class="text-center">Choose the Best Plan for You</h1>

<div class="pricing-container"  id="Plan">
  
  <div class="pricing-box">
    <h5>Basic Plan</h5>
    <p class="price"><sup>$</sup>25<sub>/mo</sub></p>
    <ul class="features-list">
      <li><strong>Access</strong> to gym during regular hours</li>
      <li><strong>1</strong> personal coaching session/month</li>
      <li><strong>Access</strong> to basic gym equipment</li>
      <li><strong>Lockers</strong> and showers</li>
    </ul>
    <button class="btn-primary">Join Now</button>
  </div>

 
  <div class="pricing-box pricing-box-highlight">
    <h5>Premium Plan</h5>
    <p class="price"><sup>$</sup>59<sub>/mo</sub></p>
    <ul class="features-list">
      <li><strong>24/7</strong> gym access</li>
      <li><strong>3</strong> personal coaching sessions/month</li>
      <li><strong>Full access</strong> to advanced equipment</li>
      <li><strong>Group classes</strong> (Yoga, HIIT, etc.)</li>
      <li><strong>Sauna</strong> and relaxation area</li>
    </ul>
    <button class="btn-primary">Join Now</button>
  </div>

  
  <div class="pricing-box">
    <h5>Platinum Plan</h5>
    <p class="price"><sup>$</sup>99<sub>/mo</sub></p>
    <ul class="features-list">
      <li><strong>24/7</strong> gym access</li>
      <li><strong>5</strong> personal coaching sessions/month</li>
      <li><strong>VIP access</strong> to premium equipment</li>
      <li><strong>Unlimited</strong> group and private classes</li>
      <li><strong>Monthly</strong> nutrition consultation</li>
      <li><strong>Spa</strong> and wellness area access</li>
    </ul>
    <button class="btn-primary">Join Now</button>
  </div>
</div>

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


<script src="mainn.js"></script>
</body>
</html>
