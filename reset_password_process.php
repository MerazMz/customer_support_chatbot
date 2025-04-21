<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if token and reset email are set
    if (!isset($_POST['token']) || empty($_POST['token'])) {
        error_log("Missing token in reset password process");
        header("Location: forgot_password.php?error=invalid_token");
        exit();
    }
    
    if (!isset($_SESSION['reset_email']) || empty($_SESSION['reset_email'])) {
        error_log("Missing reset_email in session");
        header("Location: forgot_password.php?error=invalid_token");
        exit();
    }

    $token = $_POST['token'];
    $email = $_SESSION['reset_email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    error_log("Processing password reset for email: $email with token: $token");

    // Basic validation
    if (empty($password) || empty($confirm_password)) {
        header("Location: reset_password.php?token=$token&error=empty");
        exit();
    }

    // Password length validation
    if (strlen($password) < 6) {
        header("Location: reset_password.php?token=$token&error=password_length");
        exit();
    }

    // Password match validation
    if ($password !== $confirm_password) {
        header("Location: reset_password.php?token=$token&error=password_mismatch");
        exit();
    }

    try {
        // First check if the token exists
        $stmt = $pdo->prepare("SELECT * FROM password_resets WHERE token = ? AND email = ?");
        $stmt->execute([$token, $email]);
        $reset = $stmt->fetch();
        
        if (!$reset) {
            error_log("Token not found for email: $email");
            header("Location: forgot_password.php?error=invalid_token");
            exit();
        }
        
        // Check if token is expired
        $expires = new DateTime($reset['expires']);
        $now = new DateTime();
        
        if ($now > $expires) {
            error_log("Token expired for email: $email");
            header("Location: forgot_password.php?error=expired_token");
            exit();
        }

        // Token is valid, update the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        error_log("Updating password for email: $email");

        // Update the user's password
        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE email = ?");
        $result = $stmt->execute([$hashed_password, $email]);
        
        if (!$result || $stmt->rowCount() === 0) {
            error_log("Failed to update password: " . print_r($stmt->errorInfo(), true));
            throw new PDOException("Failed to update password");
        }
        
        error_log("Password updated successfully for: $email");

        // Delete the used token
        $stmt = $pdo->prepare("DELETE FROM password_resets WHERE token = ?");
        $stmt->execute([$token]);
        error_log("Deleted used token: $token");

        // Clear the reset email from the session
        unset($_SESSION['reset_email']);

        // Redirect to login page with success message
        header("Location: login.php?success=password_reset");
        exit();
    } catch (PDOException $e) {
        error_log("Password Reset DB Error: " . $e->getMessage());
        header("Location: reset_password.php?token=$token&error=server");
        exit();
    } catch (Exception $e) {
        error_log("Password Reset General Error: " . $e->getMessage());
        header("Location: reset_password.php?token=$token&error=server");
        exit();
    }
} else {
    // If not a POST request, redirect to the forgot password page
    header("Location: forgot_password.php");
    exit();
}
?> 