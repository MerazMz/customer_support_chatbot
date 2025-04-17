<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = trim($_POST['fullname']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Basic validation
    if(empty($fullname) || empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        header("Location: signup.php?error=empty");
        exit();
    }

    // Username validation
    if(!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        header("Location: signup.php?error=invalid_username");
        exit();
    }

    // Password validation
    if(strlen($password) < 6) {
        header("Location: signup.php?error=password_length");
        exit();
    }

    // Password match validation
    if($password !== $confirm_password) {
        header("Location: signup.php?error=password_mismatch");
        exit();
    }

    try {
        // Check if username already exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if($stmt->rowCount() > 0) {
            header("Location: signup.php?error=username_exists");
            exit();
        }

        // Check if email already exists
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if($stmt->rowCount() > 0) {
            header("Location: signup.php?error=email_exists");
            exit();
        }

        // Hash password and insert user
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Use explicit column names in the INSERT statement
        $stmt = $pdo->prepare("INSERT INTO users (fullname, username, email, password) VALUES (?, ?, ?, ?)");
        
        // Execute with error checking
        if(!$stmt->execute([$fullname, $username, $email, $hashed_password])) {
            throw new PDOException("Failed to insert user");
        }

        // Redirect to login page with success message
        header("Location: login.php?success=registered");
        exit();
        
    } catch(PDOException $e) {
        // Log the error for debugging
        error_log("Signup Error: " . $e->getMessage());
        header("Location: signup.php?error=server");
        exit();
    }
}
?>