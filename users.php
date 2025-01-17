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

// Delete user
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM users WHERE id = $delete_id";
    $conn->query($sql);
}

// Fetch all users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
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
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h1>Manage Users</h1>
            <h2>Existing Users</h2>
            <div class="users">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <div class="user">
                            <span>' . $row['full_name'] . '</span>
                            <h5>' . $row['email'] . '</h5>
                            <a  href="users.php?delete_id=' . $row['id'] . '" onclick="return confirm(\'Are you sure you want to delete this user?\')"><i class="fa fa-trash"></i> Delete</a>
                            <a  href="edit_user.php?id=' . $row['id'] . '"><i class="fa fa-pencil"></i> Edit</a>
                        </div>
                        ';
                    }
                } else {
                    echo "No users found!";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>

<?php $conn->close(); ?>
