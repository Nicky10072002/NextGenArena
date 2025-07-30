<?php

    require '../vendor/autoload.php';
    use Firebase\JWT\JWT;   
    use Firebase\JWT\Key;

    $secretKey = 'your_secret_key'; // Replace with your actual secret key

// Handle login authentication
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to MySQL
    $conn = new mysqli("localhost", "root", "root", "sign_up_form");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare statement to find user by email
    $stmt = $conn->prepare("SELECT username, email, password FROM users WHERE email = ?");
    
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Start session and store user data
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            
            echo "✅ Login successful!";
            
            // Generate JWT token
            $payload = [
                'iss' => 'http://localhost', // Issuer
                'iat' => time(), // Issued at
                'exp' => time() + (60 * 60), // Expiration time (1 hour)
                'data' => [
                    'username' => $user['username'],
                    'email' => $user['email']
                ]
            ];

            $jwt = JWT::encode($payload, $secretKey, 'HS256');

           // Save JWT into session
            $_SESSION['auth_token'] = $jwt;
            echo "<script>console.log('JWT Token: " . $jwt . "');</script>";

        } else {
            echo "❌ Invalid password. Please try again.";
        }
    } else {
        echo "❌ User not found. Please check your email or sign up.";
    }


    $stmt->close();
    $conn->close();
} else {
    echo "❌ No data received";
}
?>