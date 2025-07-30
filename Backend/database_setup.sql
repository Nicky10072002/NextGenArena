-- Create database if it doesn't exist
CREATE DATABASE IF NOT EXISTS sign_up_form;

-- Use the database
USE sign_up_form;

-- Create users table if it doesn't exist
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    city VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)

-- Optional: Insert some sample data for testing
-- INSERT INTO users (username, email, password, gender, city) VALUES 
-- ('John Doe', 'john@example.com', 'password123', 'Male', 'Calicut'),
-- ('Jane Smith', 'jane@example.com', 'password456', 'Female', 'Kolkata'); 