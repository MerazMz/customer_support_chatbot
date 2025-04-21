<?php
// Include the database connection file
require_once 'db_connect.php';

// Create admins table
try {
    // Define SQL query to create admins table if it doesn't exist
    $query = "
    CREATE TABLE IF NOT EXISTS admins (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
    ";
    // Execute the SQL query using PDO
    $pdo->exec($query);
    // Display success message to the user
    echo "Admins table created successfully.<br>";
} catch(PDOException $e) {
    // Catch any database errors that occur during table creation
    // Display error message with details about the exception
    echo "Error creating admins table: " . $e->getMessage() . "<br>";
}

// Create contact_messages table
try {
    // Define SQL query to create contact_messages table if it doesn't exist
    $query = "
    CREATE TABLE IF NOT EXISTS contact_messages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        subject VARCHAR(200) NOT NULL,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
    ";
    // Execute the SQL query using PDO
    $pdo->exec($query);
    // Display success message to the user
    echo "Contact messages table created successfully.<br>";
} catch(PDOException $e) {
    // Catch any database errors that occur during table creation
    // Display error message with details about the exception
    echo "Error creating contact messages table: " . $e->getMessage() . "<br>";
}

// Display completion message with a link to return to the homepage
echo "<p>Database setup completed. You can now <a href='index.php'>return to the homepage</a>.</p>";
?> 