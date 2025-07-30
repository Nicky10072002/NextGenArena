<?php

session_start();
// Check if the user is logged in
session_unset(); // Unset all session variables
// Destroy the session
session_destroy();

// Redirect to the login page or home page
header("Location: ../Pages/SignIn.html");
exit;
echo "✅ You have been logged out successfully.";

?>