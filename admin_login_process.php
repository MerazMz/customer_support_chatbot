<?php
session_start();
require_once 'db_connect.php';

// Default admin credentials
$default_admin_username = 'admin';
$default_admin_password = 'Admin@123';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Basic validation
    if(empty($username) || empty($password)) {
        header("Location: login.php?error=empty&admin=1");
        exit();
    }

    // Check if using default admin credentials
    if ($username === $default_admin_username && $password === $default_admin_password) {
        // Set admin session variables
        $_SESSION['admin_id'] = 1;
        $_SESSION['admin_username'] = $default_admin_username;
        $_SESSION['is_admin'] = true;
        
        // Redirect to admin dashboard
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // Check database for admin credentials
        try {
            // Prepare and execute query
            $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
            $stmt->execute([$username]);
            $admin = $stmt->fetch();

            // Verify admin and password
            if ($admin && password_verify($password, $admin['password'])) {
                // Set admin session variables
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_username'] = $admin['username'];
                $_SESSION['is_admin'] = true;
                
                // Redirect to admin dashboard
                header("Location: admin_dashboard.php");
                exit();
            } else {
                header("Location: login.php?error=invalid&admin=1");
                exit();
            }
        } catch(PDOException $e) {
            header("Location: login.php?error=server&admin=1");
            exit();
        }
    }
}
?> 