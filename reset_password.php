<?php
session_start();
require_once 'db_connect.php';

// Check if token is provided
if (!isset($_GET['token']) || empty($_GET['token'])) {
    header("Location: login.php?error=invalid_token");
    exit();
}

$token = $_GET['token'];

// Debug - Log the token we're looking for
error_log("Attempting to verify reset token: " . $token);

// Verify token is valid and not expired
try {
    // First just check if the token exists without expiration check
    $stmt = $pdo->prepare("SELECT * FROM password_resets WHERE token = ?");
    $stmt->execute([$token]);
    $reset = $stmt->fetch();
    
    if (!$reset) {
        error_log("Token not found in database: " . $token);
        header("Location: forgot_password.php?error=invalid_token");
        exit();
    }
    
    // Now check if it's expired
    $expires = new DateTime($reset['expires']);
    $now = new DateTime();
    
    if ($now > $expires) {
        error_log("Token expired. Expiry time was: " . $reset['expires']);
        header("Location: forgot_password.php?error=expired_token");
        exit();
    }
    
    // Token is valid - store the email in a session variable
    $_SESSION['reset_email'] = $reset['email'];
    error_log("Valid token found for email: " . $reset['email']);
    
} catch (PDOException $e) {
    error_log("Token Verification Error: " . $e->getMessage());
    header("Location: forgot_password.php?error=server");
    exit();
} catch (Exception $e) {
    error_log("General Error: " . $e->getMessage());
    header("Location: forgot_password.php?error=server");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="https://demo.awaikenthemes.com/dispnsary/wp-content/uploads/2024/11/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Reset Password</title>
</head>
<body class="overflow-hidden">
    <div class="bg-gradient-to-r from-blue-100 to-purple-100 min-h-screen flex items-center justify-center">
        <div class="bg-white p-6 rounded-2xl shadow-2xl w-full max-w-md transition-all hover:shadow-3xl">
            <!-- Logo/Header -->
            <div class="text-center mb-6 sm:mb-8">
                <img src="https://demo.awaikenthemes.com/dispnsary/wp-content/uploads/2024/11/logo-1.svg" 
                     alt="Logo" 
                     class="h-10 mx-auto mb-4">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">Reset Password</h1>
                <p class="text-sm sm:text-base text-gray-500">Create a new password</p>
                
                <?php if(isset($_GET['error'])): ?>
                    <div class="mt-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                        <?php 
                            switch($_GET['error']) {
                                case 'empty':
                                    echo "Please fill in all fields";
                                    break;
                                case 'password_mismatch':
                                    echo "Passwords do not match";
                                    break;
                                case 'password_length':
                                    echo "Password must be at least 6 characters long";
                                    break;
                                case 'server':
                                    echo "Server error occurred. Please try again";
                                    break;
                                default:
                                    echo "An error occurred. Please try again";
                            }
                        ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Reset Password Form -->
            <form class="space-y-4 sm:space-y-6" action="reset_password_process.php" method="POST" onsubmit="return validateForm()">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
                
                <!-- Password Input -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1 sm:mb-2" for="password">
                        New Password
                    </label>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="password" 
                            name="password"
                            class="w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none text-sm sm:text-base pr-10"
                            placeholder="Enter new password"
                            required
                            minlength="6"
                        >
                        <button 
                            type="button"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600 cursor-pointer"
                            onclick="togglePasswordVisibility('password')"
                        >
                            <i class="fas fa-eye" id="toggle-password"></i>
                        </button>
                    </div>
                    <span id="passwordError" class="text-red-500 text-xs hidden">Password must be at least 6 characters long</span>
                </div>

                <!-- Confirm Password Input -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1 sm:mb-2" for="confirm_password">
                        Confirm New Password
                    </label>
                    <div class="relative">
                        <input 
                            type="password" 
                            id="confirm_password" 
                            name="confirm_password"
                            class="w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none text-sm sm:text-base pr-10"
                            placeholder="Confirm new password"
                            required
                        >
                        <button 
                            type="button"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600 cursor-pointer"
                            onclick="togglePasswordVisibility('confirm_password')"
                        >
                            <i class="fas fa-eye" id="toggle-confirm-password"></i>
                        </button>
                    </div>
                    <span id="confirmPasswordError" class="text-red-500 text-xs hidden">Passwords do not match</span>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full bg-blue-600 text-white py-2 sm:py-3 rounded-lg hover:bg-blue-700 transition-colors duration-300 font-medium text-sm sm:text-base"
                >
                    Reset Password
                </button>
            </form>

            <!-- Back to Login -->
            <div class="text-center mt-4 sm:mt-6">
                <p class="text-gray-600 text-sm sm:text-base">
                    <a href="login.php" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">Back to Login</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(inputId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById('toggle-' + inputId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        function validateForm() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const passwordError = document.getElementById('passwordError');
            const confirmPasswordError = document.getElementById('confirmPasswordError');
            let isValid = true;
            
            // Check password length
            if (password.length < 6) {
                passwordError.classList.remove('hidden');
                isValid = false;
            } else {
                passwordError.classList.add('hidden');
            }
            
            // Check if passwords match
            if (password !== confirmPassword) {
                confirmPasswordError.classList.remove('hidden');
                isValid = false;
            } else {
                confirmPasswordError.classList.add('hidden');
            }
            
            return isValid;
        }
    </script>
</body>
</html> 