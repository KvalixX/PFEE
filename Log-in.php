<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <title>Kvalix</title>
    <style>
        .login-form {
            max-width: 400px;
            margin: 100px auto 50px; 
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background: #f9f9f9;
        }
        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .login-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-form button {
            width: 100%;
            padding: 12px;
            background-color: #8b382a;
            color: #fff;
            border: 1px solid #8b382a;
            border-radius: 8px;
            font-weight: bold;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .login-form button:hover {
            background-color: #fff;
            color: #8b382a;
            border-color: #8b382a;
        }
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
<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "PFE"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user enters the new admin email and password
    if ($email === 'admin@admin.com' && $password === 'admin') {
        // Redirect to admin panel
        header("Location: adminpanel.php");
        exit();
    }

    // If not "admin", check credentials in the database
    $sql = "SELECT * FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email); // Bind email parameter to prepared statement
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password using password_hash
        if (password_verify($password, $row['password'])) {
            // Start a session and store user info
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['full_name'];
            $_SESSION['user_email'] = $row['email'];
            header("Location: profile.php"); // Redirect to the user dashboard
            exit();
        } else {
            $error_message = "Invalid credentials!";
        }
    } else {
        $error_message = "Invalid credentials!";
    }
}

$conn->close();
?>

<section class="login-form">
    <h2>Log In</h2>
    <form action="Log-in.php" method="post">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>

        <?php if (isset($error_message)): ?>
            <p style="color: red; text-align: center;"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <button type="submit">Log In</button>
    </form>
    <p style="text-align: center; margin-top: 15px;">
        Don't have an account? <a href="Sign-up.php" style="color: #8b382a; text-decoration: none; font-weight: bold;">Sign Up</a>
    </p>
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
