<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);

    // Basic validation
    if(empty($email)) {
        header("Location: forgot_password.php?error=empty");
        exit();
    }

    try {
        // Check if the email exists in the database
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user) {
            // Generate a unique token - make it shorter for easier URL handling
            $token = bin2hex(random_bytes(16)); // 32 characters is enough
            
            // Set expiry time 1 hour from now
            $expiry_timestamp = time() + 3600;
            $expires = date('Y-m-d H:i:s', $expiry_timestamp);
            
            // Debug log
            error_log("Generated token: " . $token . " for email: " . $email . " expires: " . $expires);

            // Store the token in the database
            // First, delete any existing tokens for this user
            $stmt = $pdo->prepare("DELETE FROM password_resets WHERE email = ?");
            $stmt->execute([$email]);
            error_log("Deleted any existing tokens for: " . $email);

            // Insert new token
            $stmt = $pdo->prepare("INSERT INTO password_resets (email, token, expires) VALUES (?, ?, ?)");
            if($stmt->execute([$email, $token, $expires])) {
                error_log("Successfully inserted token into database");
            } else {
                error_log("Failed to insert token: " . print_r($stmt->errorInfo(), true));
                throw new Exception("Failed to insert token into database");
            }

            // Construct the reset link
            // Get the current base URL more reliably
            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
            $host = $_SERVER['HTTP_HOST'];
            
            // Get the directory path from the current script
            $dir_path = dirname($_SERVER['PHP_SELF']);
            
            // Ensure the directory path ends with a slash
            if ($dir_path != '/') {
                $dir_path = $dir_path . '/';
            }
            
            // Create the full reset link with the correct path
            $reset_link = $protocol . $host . $dir_path . "reset_password.php?token=" . $token;
            
            // Log the link for backup purposes
            error_log("Password reset link for $email: $reset_link");

            // Send email with the reset link
            $to = $email;
            $subject = "Password Reset Request";
            
            // Create HTML message with better formatting
            $htmlMessage = "
            <html>
            <head>
                <title>Password Reset</title>
            </head>
            <body style='font-family: Arial, sans-serif; line-height: 1.6; max-width: 600px; margin: 0 auto; padding: 20px;'>
                <div style='background-color: #f5f5f5; padding: 20px; border-radius: 5px;'>
                    <h2 style='color: #3366cc;'>Password Reset Request</h2>
                    <p>Hello,</p>
                    <p>You have requested to reset your password. Click the button below to set a new password:</p>
                    <p style='text-align: center;'>
                        <a href='$reset_link' style='display: inline-block; background-color: #3366cc; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin: 15px 0;'>Reset Password</a>
                    </p>
                    <p>Or copy and paste this link into your browser:</p>
                    <p><a href='$reset_link'>$reset_link</a></p>
                    <p>This link will expire in 1 hour.</p>
                    <p>If you did not request this, please ignore this email.</p>
                    <hr style='border: 1px solid #eee; margin: 20px 0;'>
                    <p style='font-size: 12px; color: #666;'>This is an automated email, please do not reply.</p>
                </div>
            </body>
            </html>";
            
            // Plain text alternative for email clients that don't support HTML
            $plainMessage = "Hello,\n\nYou have requested to reset your password. Copy and paste the link below into your browser to set a new password:\n\n$reset_link\n\nThis link will expire in 1 hour.\n\nIf you did not request this, please ignore this email.";
            
            // Set content-type header for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: noreply@" . $_SERVER['HTTP_HOST'] . "\r\n";
            
            // Send email
            if(mail($to, $subject, $htmlMessage, $headers)) {
                // Redirect to success page
                header("Location: forgot_password.php?success=1");
                exit();
            } else {
                error_log("Failed to send email to $email");
                header("Location: forgot_password.php?error=email_failed");
                exit();
            }
        } else {
            // Email not found
            header("Location: forgot_password.php?error=not_found");
            exit();
        }
    } catch(PDOException $e) {
        error_log("Password Reset Error: " . $e->getMessage());
        header("Location: forgot_password.php?error=server");
        exit();
    } catch(Exception $e) {
        error_log("General Error: " . $e->getMessage());
        header("Location: forgot_password.php?error=server");
        exit();
    }
}
?> 