<?php
// Test database connection and table existence
echo "<h2>Database Connection Test</h2>";

// Test connection
$conn = new mysqli("localhost", "root", "root", "sign_up_form");

if ($conn->connect_error) {
    echo "❌ Connection failed: " . $conn->connect_error;
} else {
    echo "✅ Database connection successful!<br>";
    
    // Check if table exists
    $result = $conn->query("SHOW TABLES LIKE 'users'");
    if ($result->num_rows > 0) {
        echo "✅ Table 'users' exists!<br>";
        
        // Show table structure
        $result = $conn->query("DESCRIBE users");
        echo "<h3>Table Structure:</h3>";
        echo "<table border='1'>";
        echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['Field'] . "</td>";
            echo "<td>" . $row['Type'] . "</td>";
            echo "<td>" . $row['Null'] . "</td>";
            echo "<td>" . $row['Key'] . "</td>";
            echo "<td>" . $row['Default'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
    } else {
        echo "❌ Table 'users' does not exist!<br>";
        echo "Please run the database setup script first.<br>";
    }
}

$conn->close();
?> 