<?php
session_start();
if (!isset($_SESSION['auth_token'])) {
    die("❌ Access denied. Please login.");
}

echo "<h2>Welcome to NextGen Arena 🎮</h2>";
echo "<script>console.log('JWT Token: " . $_SESSION['auth_token'] . "');</script>";
?>

<a href="../Backend/logout.php">Logout</a>
