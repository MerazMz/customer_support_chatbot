<!-- This PHP script establishes connection to MySQL database using the PDO (PHP Data Objects) extension.
  -->


<?php
$host = 'localhost'; //Database server's hostname.
$dbname = 'customer_support_chatbot';//name of the database to connect to.
$username = 'root';//The username for database authentication.
$password = '';//the password for database authentication.

// Attempt to establish a connection to the database using PDO
try {
    // Create a new PDO instance with the specified host, database name, username, and password
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);//PDO is a PHP class used for database access. It suports multiple database types.
    // The DSN (Data Source Name) specifies the database type (mysql), host, and database name.
    
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