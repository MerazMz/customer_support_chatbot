<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="https://demo.awaikenthemes.com/dispnsary/wp-content/uploads/2024/11/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Forgot Password</title>
</head>
<body class="overflow-hidden">
    <div class="bg-gradient-to-r from-blue-100 to-purple-100 min-h-screen flex items-center justify-center">
        <div class="bg-white p-6 rounded-2xl shadow-2xl w-full max-w-md transition-all hover:shadow-3xl">
            <!-- Logo/Header -->
            <div class="text-center mb-6 sm:mb-8">
                <img src="https://demo.awaikenthemes.com/dispnsary/wp-content/uploads/2024/11/logo-1.svg" 
                     alt="Logo" 
                     class="h-10 mx-auto mb-4">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">Forgot Password</h1>
                <p class="text-sm sm:text-base text-gray-500">Enter your email to reset your password</p>
                
                <?php if(isset($_GET['error'])): ?>
                    <div class="mt-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                        <?php 
                            switch($_GET['error']) {
                                case 'empty':
                                    echo "Please enter your email address";
                                    break;
                                case 'not_found':
                                    echo "Email address not found in our system";
                                    break;
                                case 'email_failed':
                                    echo "Failed to send email. Please try again or contact support.";
                                    break;
                                case 'expired_token':
                                    echo "Your password reset link has expired or is invalid. Please request a new one.";
                                    break;
                                case 'invalid_token':
                                    echo "Invalid password reset link. Please request a new one.";
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
                
                <?php if(isset($_GET['success'])): ?>
                    <div class="mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                        <?php echo "Password reset link has been sent to your email."; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Forgot Password Form -->
            <form class="space-y-4 sm:space-y-6" action="forgot_password_process.php" method="POST">
                <!-- Email Input -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1 sm:mb-2" for="email">
                        Email Address
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email"
                        class="w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none text-sm sm:text-base"
                        placeholder="Enter your email"
                        required
                    >
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full bg-blue-600 text-white py-2 sm:py-3 rounded-lg hover:bg-blue-700 transition-colors duration-300 font-medium text-sm sm:text-base"
                >
                    Send Reset Link
                </button>
            </form>

            <!-- Back to Login -->
            <div class="text-center mt-4 sm:mt-6">
                <p class="text-gray-600 text-sm sm:text-base">
                    Remember your password? 
                    <a href="login.php" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">Back to Login</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html> 