<?php
$host = 'localhost';
$dbname = 'project220';
$username = 'root';
$password = '';

// Attempt to establish a connection to the database using PDO
try {
    // Create a new PDO instance with the specified host, database name, username, and password
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set the error mode to exception to handle errors gracefully
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Set the default fetch mode to associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    // Log the connection error message for debugging
    error_log("Connection Error: " . $e->getMessage());
    
    // Terminate the script and display an error message
    die("Connection failed: " . $e->getMessage());
}
?> 