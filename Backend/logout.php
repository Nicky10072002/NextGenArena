<?php

session_start();
// Check if the user is logged in
session_unset(); // Unset all session variables
// Destroy the session
session_destroy();

// Redirect to the home page
header("Location: ../Pages/Home.html");
exit;

?>