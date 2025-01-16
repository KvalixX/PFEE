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
        .signup-form {
            max-width: 400px;
            margin: 70px auto 50px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background: #f9f9f9;
        }
        .signup-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .signup-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        .signup-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .signup-form button {
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
        .signup-form button:hover {
            background-color: #fff;
            color: #8b382a;
            border-color: #8b382a;
        }
        /* Container for the success message */
.message-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: rgba(0, 0, 0, 0.1);
    padding: 0 20px;
}

/* Stylish message box */
.message {
    background: #fff;
    padding: 30px;
    text-align: center;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

/* Heading */
.message h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

/* Paragraph */
.message p {
    font-size: 16px;
    color: #555;
    margin-bottom: 20px;
}

/* Button styles */
.message .btn {
    display: inline-block;
    margin: 10px;
    padding: 12px 25px;
    background-color: #8b382a;
    color: #fff;
    font-size: 16px;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.message .btn:hover {
    background-color: #a24536;
}

.message .btn:active {
    background-color: #822f26;
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $full_name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-password']);

    // Validate passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
    } else {
        // Hash password before storing
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL query to insert user data into database
        $sql = "INSERT INTO users (full_name, email, password) VALUES ('$full_name', '$email', '$hashed_password')";

        if ($conn->query($sql) === TRUE) {
            // Registration successful
            echo "
            <div class='message-container'>
                <div class='message'>
                    <h2>Registration Successful!</h2>
                    <p>Your account has been created. What would you like to do next?</p>
                    <a href='Log-in.php' class='btn'>Go to Login</a>
                    <a href='index.php' class='btn'>Continue Browsing</a>
                </div>
            </div>
            ";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close connection
$conn->close();
?>

<section class="signup-form">
    <h2>Sign Up</h2>
    <form action="Sign-up.php" method="post">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your full name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Create a password" required>

        <label for="confirm-password">Confirm Password</label>
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>

        <button type="submit">Sign Up</button>
    </form>
    <p style="text-align: center; margin-top: 15px;">
        Already have an account? <a href="Log-in.php" style="color: #8b382a; text-decoration: none; font-weight: bold;">Log In</a>
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
