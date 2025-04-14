<?php
require_once 'db_connect.php';

// Create admins table
try {
    $query = "
    CREATE TABLE IF NOT EXISTS admins (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
    ";
    $pdo->exec($query);
    echo "Admins table created successfully.<br>";
} catch(PDOException $e) {
    echo "Error creating admins table: " . $e->getMessage() . "<br>";
}

// Create contact_messages table
try {
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
    $pdo->exec($query);
    echo "Contact messages table created successfully.<br>";
} catch(PDOException $e) {
    echo "Error creating contact messages table: " . $e->getMessage() . "<br>";
}

echo "<p>Database setup completed. You can now <a href='index.php'>return to the homepage</a>.</p>";
?> 