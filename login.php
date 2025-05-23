<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="https://demo.awaikenthemes.com/dispnsary/wp-content/uploads/2024/11/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Page</title>
    <script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.6.10/firebase-auth-compat.js"></script>
</head>
<body class="overflow-hidden">
    <div class="bg-gradient-to-r from-blue-100 to-purple-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-6 rounded-2xl shadow-2xl w-full max-w-md transition-all hover:shadow-3xl">
        <!-- Logo/Header -->
        <div class="text-center mb-6 sm:mb-8">
            <img src="https://demo.awaikenthemes.com/dispnsary/wp-content/uploads/2024/11/logo-1.svg" 
                     alt="Logo" 
                     class="h-10 mx-auto mb-4">
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-2">Welcome Back</h1>
            <p class="text-sm sm:text-base text-gray-500">Please sign in to continue</p>
            
            <?php if(isset($_GET['error'])): ?>
                <div class="mt-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                    <?php 
                        switch($_GET['error']) {
                            case 'invalid':
                                echo isset($_GET['admin']) ? "Invalid admin username or password" : "Invalid email or password";
                                break;
                            case 'server':
                                echo "Server error occurred. Please try again";
                                break;
                            case 'empty':
                                echo "Please fill in all fields";
                                break;
                            default:
                                echo "An error occurred. Please try again";
                        }
                    ?>
                </div>
            <?php endif; ?>
            
            <?php if(isset($_GET['success'])): ?>
                <div class="mt-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                    <?php 
                        switch($_GET['success']) {
                            case 'registered':
                                echo "Successfully registered! Please login.";
                                break;
                            case 'password_reset':
                                echo "Password has been reset successfully! Please login with your new password.";
                                break;
                            default:
                                echo "Successfully registered! Please login.";
                        }
                    ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Login Form -->
        <form class="space-y-4 sm:space-y-6" action="login_process.php" method="POST" id="userLoginForm">
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

            <!-- Password Input -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 sm:mb-2" for="password">
                    Password
                </label>
                <div class="relative">
                    <input 
                        type="password" 
                        id="password" 
                        name="password"
                        class="w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none text-sm sm:text-base pr-10"
                        placeholder="Enter your password"
                        required
                    >
                    <button 
                        type="button"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600 cursor-pointer"
                        onclick="togglePasswordVisibility()"
                    >
                        <i class="fas fa-eye" id="togglePassword"></i>
                    </button>
                </div>
                <div class="flex justify-end mt-1">
                    <a href="forgot_password.php" class="text-sm text-blue-600 hover:text-blue-800">Forgot Password?</a>
                </div>
            </div>

            <script>
                function togglePasswordVisibility() {
                    const passwordInput = document.getElementById('password');
                    const toggleIcon = document.getElementById('togglePassword');
                    
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
            </script>

            <!-- Login Button -->
            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white py-2 sm:py-3 rounded-lg hover:bg-blue-700 transition-colors duration-300 font-medium text-sm sm:text-base"
            >
                Sign In
            </button>
        </form>

        <!-- Admin Login Form (Hidden by default) -->
        <form class="space-y-4 sm:space-y-6 hidden" action="admin_login_process.php" method="POST" id="adminLoginForm">
            <!-- Username Input -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 sm:mb-2" for="username">
                    Admin Username
                </label>
                <input 
                    type="text" 
                    id="username" 
                    name="username"
                    class="w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none text-sm sm:text-base"
                    placeholder="Enter admin username"
                    required
                >
            </div>

            <!-- Password Input -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1 sm:mb-2" for="admin_password">
                    Admin Password
                </label>
                <div class="relative">
                    <input 
                        type="password" 
                        id="admin_password" 
                        name="password"
                        class="w-full px-3 sm:px-4 py-2 sm:py-3 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-all outline-none text-sm sm:text-base pr-10"
                        placeholder="Enter admin password"
                        required
                    >
                    <button 
                        type="button"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600 cursor-pointer"
                        onclick="toggleAdminPasswordVisibility()"
                    >
                        <i class="fas fa-eye" id="toggleAdminPassword"></i>
                    </button>
                </div>
            </div>

            <script>
                function toggleAdminPasswordVisibility() {
                    const passwordInput = document.getElementById('admin_password');
                    const toggleIcon = document.getElementById('toggleAdminPassword');
                    
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
            </script>

            <!-- Login Button -->
            <button 
                type="submit" 
                class="w-full bg-[#4c63ce] text-white py-2 sm:py-3 rounded-lg hover:bg-[#3b4fa3] transition-colors duration-300 font-medium text-sm sm:text-base"
            >
                Admin Login
            </button>
        </form>

        <!-- Sign Up Link -->
        <div class="text-center mt-4 sm:mt-6" id="signupLink">
            <p class="text-gray-600 text-sm sm:text-base">
                Don't have an account? 
                <a href="signup.php" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">Sign up</a>
            </p>
        </div>

        <!-- Back to User Login Link (Hidden by default) -->
        <div class="text-center mt-4 sm:mt-6 hidden" id="backToUserLink">
            <p class="text-gray-600 text-sm sm:text-base">
                Not an admin? 
                <a href="#" onclick="switchToUserLogin(); return false;" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">Back to User Login</a>
            </p>
        </div>

        <!-- Social Login -->
        <div class="mt-2 sm:mt-8">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">Or continue with</span>
                </div>
            </div>

            <div class="mt-4 sm:mt-6 w-full">
                <button 
                    type="button"
                    onclick="signInWithGoogle()"
                    class="w-full flex justify-center items-center py-2 px-3 sm:px-4 border border-gray-300 rounded-lg hover:bg-blue-50 transition-colors">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="h-4 sm:h-5 w-4 sm:w-5">
                    <span class="ml-2 text-gray-600 font-semibold">Sign in with Google</span>
                </button>
                
                <!-- Admin Login Button -->
                <button 
                    type="button"
                    onclick="switchToAdminLogin()"
                    class="w-full flex justify-center items-center py-2 px-3 sm:px-4 border border-gray-300 rounded-lg hover:bg-[#eef0f8] transition-colors mt-3">
                    <i class="fas fa-user-shield text-[#4c63ce] h-4 sm:h-5 w-4 sm:w-5"></i>
                    <span class="ml-2 text-gray-600 font-semibold">Admin Login</span>
                </button>
            </div>

    </div>
    </div>

    <script>
        function switchToAdminLogin() {
            document.getElementById('userLoginForm').classList.add('hidden');
            document.getElementById('adminLoginForm').classList.remove('hidden');
            document.getElementById('signupLink').classList.add('hidden');
            document.getElementById('backToUserLink').classList.remove('hidden');
            
            // Change the header text
            document.querySelector('h1').textContent = 'Admin Login';
            document.querySelector('p').textContent = 'Please enter your admin credentials';
        }
        
        function switchToUserLogin() {
            document.getElementById('adminLoginForm').classList.add('hidden');
            document.getElementById('userLoginForm').classList.remove('hidden');
            document.getElementById('backToUserLink').classList.add('hidden');
            document.getElementById('signupLink').classList.remove('hidden');
            
            // Change the header text back
            document.querySelector('h1').textContent = 'Welcome Back';
            document.querySelector('p').textContent = 'Please sign in to continue';
        }
        
        // Check if we need to show admin login form based on URL parameter
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('admin') === '1') {
                switchToAdminLogin();
            }
        };
        
        // Firebase authentication would go here
        function signInWithGoogle() {
            // Firebase authentication logic
            alert('Google sign-in would be handled by Firebase');
        }
    </script>
</body>
</html>