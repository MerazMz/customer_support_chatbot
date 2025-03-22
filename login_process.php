<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Basic validation
    if(empty($email) || empty($password)) {
        header("Location: login.php?error=empty");
        exit();
    }

    try {
        // Prepare and execute query
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Verify user and password
        if ($user && password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['fullname'];
            $_SESSION['user_email'] = $user['email'];
            
            // Redirect to index page
            header("Location: index.php");
            exit();
        } else {
            header("Location: login.php?error=invalid");
            exit();
        }
    } catch(PDOException $e) {
        header("Location: login.php?error=server");
        exit();
    }
}
?> 