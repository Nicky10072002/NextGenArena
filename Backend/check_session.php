<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
    $response = array(
        'logged_in' => true,
        'username' => $_SESSION['username'],
        'email' => $_SESSION['email'],
        'token' => isset($_SESSION['auth_token']) ? $_SESSION['auth_token'] : null
    );
} else {
    $response = array(
        'logged_in' => false,
        'username' => null,
        'email' => null,
        'token' => null
    );
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?> 