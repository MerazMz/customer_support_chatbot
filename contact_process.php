<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    // Basic validation
    if(empty($name) || empty($email) || empty($subject) || empty($message)) {
        header("Location: index.php?contact_error=empty#contact");
        exit();
    }

    // Email validation
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?contact_error=invalid_email#contact");
        exit();
    }

    try {
        // Prepare and execute the insert query
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
        
        if($stmt->execute([$name, $email, $subject, $message])) {
            // Optional: Send email notification to admin
            $to = "info@medicenter.com";
            $headers = "From: " . $email . "\r\n";
            $headers .= "Reply-To: " . $email . "\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();

            mail($to, "New Contact Form Submission: " . $subject, $message, $headers);

            // Redirect with success message
            header("Location: index.php?contact_success=true#contact");
            exit();
        } else {
            throw new PDOException("Failed to insert contact message");
        }
    } catch(PDOException $e) {
        error_log("Contact Form Error: " . $e->getMessage());
        header("Location: index.php?contact_error=server#contact");
        exit();
    }
}
?> 