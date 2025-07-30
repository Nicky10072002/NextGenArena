<?php


// Get raw POST data
$data = json_decode(file_get_contents("php://input"), true);

if ($data) {
    $username = $data['username'];
    $email = $data['email'];
    $password = $data['password'];
    $gender = $data['gender'];
    $city = $data['city']; 

    // Connect to MySQL
    $conn = new mysqli("localhost", "root", "root", "sign_up_form");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create table if it doesn't exist
    $createTable = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(100) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        gender ENUM('Male', 'Female', 'Other') NOT NULL,
        city VARCHAR(100) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if (!$conn->query($createTable)) {
        die("Table creation failed: " . $conn->error);
    }

    // Insert into DB (simple version)
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, gender, city) VALUES (?, ?, ?, ?, ?)");
    
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    
    //hash the password before storing it
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt->bind_param("sssss", $username, $email, $hashedpassword, $gender, $city);

    if ($stmt->execute()) {
            
        echo "✅ Data saved successfully!";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Handle regular form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $city = $_POST['city'];

        // Connect to MySQL
        $conn = new mysqli("localhost", "root", "root", "sign_up_form");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create table if it doesn't exist
        $createTable = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(100) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            gender ENUM('Male', 'Female', 'Other') NOT NULL,
            city VARCHAR(100) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        
        if (!$conn->query($createTable)) {
            die("Table creation failed: " . $conn->error);
        }

        // Insert into DB
        $stmt = $conn->prepare("INSERT INTO users (username, email, password, gender, city) VALUES (?, ?, ?, ?, ?)");
        
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        //hash the password before storing it
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt->bind_param("sssss", $username, $email, $hashedpassword, $gender, $city);

        if ($stmt->execute()) {
            

            echo "✅ Data saved successfully!";
        } else {
            echo "❌ Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "❌ No data received";
    }
}
?>
