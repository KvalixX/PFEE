<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: Log-in.php");
    exit();
}

// Fetch user information from the database
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "PFE"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($user['full_name']); ?></h1>
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>

    <a href="edit-profile.php">Modify Profile</a>
    <a href="logout.php">Logout</a>
</body>
</html>
