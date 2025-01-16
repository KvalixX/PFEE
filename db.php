<?php
$host = "localhost"; // Change if necessary
$dbname = "PFE"; // Replace with your actual database name
$username = "root"; // Replace with your actual database username
$password = ""; // Replace with your actual database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}
?>
