<?php
session_start();

// Check if user is logged in as admin
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    header('Location: login.php');
    exit();
}

// Set timezone to India
date_default_timezone_set('Asia/Kolkata');

require_once 'db_connect.php';

// Fetch all feedback messages from the database
try {
    $stmt = $pdo->query("SELECT * FROM contact_messages ORDER BY created_at DESC");
    $feedback_messages = $stmt->fetchAll();
} catch(PDOException $e) {
    $error = "Database error: " . $e->getMessage();
}

// Fetch admin registrations
try {
    $stmt = $pdo->query("SELECT * FROM admins ORDER BY created_at DESC");
    $admins = $stmt->fetchAll();
} catch(PDOException $e) {
    $error = "Database error: " . $e->getMessage();
    $admins = [];
}

// Process admin registration
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register_admin'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validation
    if (empty($username) || empty($password) || empty($confirm_password)) {
        $reg_error = "All fields are required";
    } elseif ($password !== $confirm_password) {
        $reg_error = "Passwords do not match";
    } elseif (strlen($password) < 8) {
        $reg_error = "Password must be at least 8 characters long";
    } else {
        try {
            // Check if username already exists
            $check = $pdo->prepare("SELECT COUNT(*) FROM admins WHERE username = ?");
            $check->execute([$username]);
            if ($check->fetchColumn() > 0) {
                $reg_error = "Username already exists";
            } else {
                // Hash password and insert new admin
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO admins (username, password) VALUES (?, ?)");
                $stmt->execute([$username, $hashed_password]);
                
                $reg_success = "Admin registered successfully";
                
                // Refresh admin list
                $stmt = $pdo->query("SELECT * FROM admins ORDER BY created_at DESC");
                $admins = $stmt->fetchAll();
            }
        } catch(PDOException $e) {
            $reg_error = "Database error: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="https://demo.awaikenthemes.com/dispnsary/wp-content/uploads/2024/11/favicon.png">
    <title>Admin Dashboard - Dispnsary</title>
    <style>
        .dropdown-menu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        .dropdown-menu.show {
            max-height: 500px;
            transition: max-height 0.5s ease-in;
        }
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.7;
            }
        }
        .live-indicator {
            animation: pulse 2s infinite;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Top Bar -->
    <div class="bg-white text-[#4c63ce] sticky top-0 z-50 shadow-md">
        <div class="container mx-auto max-w-7xl">
            <!-- Mobile Navbar -->
            <div class="md:hidden flex justify-between items-center py-3 px-4">
                <div class="flex items-center">
                    <img src="https://demo.awaikenthemes.com/dispnsary/wp-content/uploads/2024/11/logo-1.svg" alt="Logo" class="h-8">
                </div>
                <div class="flex items-center gap-3">
                    <button id="mobile-menu-button" class="p-2 rounded-full hover:bg-white/20">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Menu (hidden by default) -->
            <div id="mobile-menu" class="md:hidden hidden bg-white shadow-lg py-2 rounded-b-lg">
                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-100">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-[#4c63ce] rounded-full flex items-center justify-center text-white">
                            <?php 
                                $username = htmlspecialchars($_SESSION['admin_username']);
                                echo strtoupper(substr($username, 0, 1));
                            ?>
                        </div>
                        <div>
                            <div class="font-medium text-gray-900"><?php echo $username; ?></div>
                            <div class="text-xs text-gray-500">Administrator</div>
                        </div>
                    </div>
                    <a href="logout_admin.php" class="px-4 py-2 bg-[#4c63ce] text-white rounded-lg hover:bg-[#3b4fa3] transition-colors duration-200 flex items-center gap-2">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
            
            <!-- Desktop Navbar -->
            <div class="hidden md:flex justify-between items-center py-3 px-4">
                <div class="flex items-center space-x-8">
                    <div class="flex items-center">
                        <img src="https://demo.awaikenthemes.com/dispnsary/wp-content/uploads/2024/11/logo-1.svg" alt="Logo" class="h-8 mr-3">
                        <span class="font-medium text-lg">Admin Dashboard</span>
                    </div>
                    
                </div>
                <div class="flex items-center gap-3">
                    <div class="relative" id="user-dropdown-container">
                        <button id="user-dropdown-button" class="flex items-center space-x-2 px-2 py-1 rounded-md hover:bg-white/20 transition-colors">
                            <div class="w-8 h-8 bg-[#4c63ce] rounded-full flex items-center justify-center text-white">
                                <?php echo strtoupper(substr($_SESSION['admin_username'], 0, 1)); ?>
                            </div>
                            <span class="font-medium"><?php echo htmlspecialchars($_SESSION['admin_username']); ?></span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div id="user-dropdown" class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50 overflow-hidden">
                            <div class="py-2 px-4 bg-gray-50 border-b border-gray-100">
                                <p class="text-sm font-medium text-gray-900">Welcome,</p>
                                <p class="text-sm text-gray-600"><?php echo htmlspecialchars($_SESSION['admin_username']); ?></p>
                            </div>
                            <a href="logout_admin.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-sign-out-alt mr-2 text-gray-500"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-6 max-w-7xl">
        <!-- Dashboard Content -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Sidebar -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-md p-4">
                    <ul class="space-y-2">
                        <li class="p-2 bg-blue-50 text-[#4c63ce] rounded font-medium">
                            <i class="fas fa-comment-dots mr-2"></i> Feedbacks
                        </li>
                        <li class="p-2 hover:bg-gray-50 rounded cursor-pointer">
                            <a href="index.php"><i class="fas fa-home mr-2"></i> Back to Website</a>
                        </li>
                    </ul>
                </div>
                
                <!-- Admin Registration Form -->
                <div class="bg-white rounded-lg shadow-md p-4 mt-6">
                    <h3 class="font-semibold text-lg mb-4 text-gray-800 border-b pb-2">Register New Admin</h3>
                    
                    <?php if(isset($reg_error)): ?>
                        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-md text-sm">
                            <?php echo htmlspecialchars($reg_error); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if(isset($reg_success)): ?>
                        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-md text-sm">
                            <?php echo htmlspecialchars($reg_success); ?>
                        </div>
                    <?php endif; ?>
                    
                    <form action="" method="POST" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="username">
                                Username
                            </label>
                            <input 
                                type="text" 
                                id="username" 
                                name="username"
                                class="w-full px-3 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500"
                                required
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="password">
                                Password
                            </label>
                            <input 
                                type="password" 
                                id="password" 
                                name="password"
                                class="w-full px-3 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500"
                                required
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="confirm_password">
                                Confirm Password
                            </label>
                            <input 
                                type="password" 
                                id="confirm_password" 
                                name="confirm_password"
                                class="w-full px-3 py-2 rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-500"
                                required
                            >
                        </div>
                        <button 
                            type="submit" 
                            name="register_admin"
                            class="w-full bg-[#4c63ce] text-white py-2 rounded hover:bg-[#3b4fa3] transition-colors"
                        >
                            Register
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="col-span-1 lg:col-span-3">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <div class="flex items-center">
                            <div class="rounded-full bg-blue-100 p-3 mr-4">
                                <i class="fas fa-comment-dots text-[#4c63ce] text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-gray-500 text-sm font-medium">Feedbacks</h3>
                                <p class="text-2xl font-semibold text-gray-800"><?php echo count($feedback_messages); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <div class="flex items-center">
                            <div class="rounded-full bg-green-100 p-3 mr-4">
                                <i class="fas fa-user-shield text-green-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-gray-500 text-sm font-medium">Total Admins</h3>
                                <p class="text-2xl font-semibold text-gray-800"><?php echo count($admins) + 1; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-4">
                        <div class="flex items-center">
                            <div class="rounded-full bg-purple-100 p-3 mr-4">
                                <i class="fas fa-calendar-alt text-purple-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-gray-500 text-sm font-medium">Today's Date</h3>
                                <p class="text-sm font-semibold text-gray-800"><?php echo date('F j, Y - h:i A'); ?> <span class="text-xs text-gray-500">IST</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Feedback Messages Table -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="px-6 py-4 border-b">
                        <h2 class="font-semibold text-xl text-gray-800">Feedbacks</h2>
                    </div>
                    
                    <?php if(isset($error)): ?>
                        <div class="p-6 text-red-500"><?php echo $error; ?></div>
                    <?php elseif(empty($feedback_messages)): ?>
                        <div class="p-6 text-gray-500">No feedbacks found.</div>
                    <?php else: ?>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subject</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php foreach($feedback_messages as $message): ?>
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="font-medium text-gray-900"><?php echo htmlspecialchars($message['name']); ?></div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-gray-600"><?php echo htmlspecialchars($message['email']); ?></div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="font-medium text-gray-900"><?php echo htmlspecialchars($message['subject']); ?></div>
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-gray-600 max-w-md truncate"><?php echo htmlspecialchars($message['message']); ?></div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-gray-600"><?php echo date('M j, Y - h:i A', strtotime($message['created_at'])); ?> <span class="text-xs text-gray-500">IST</span></div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
                
                <!-- Admin List -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden mt-6">
                    <div class="px-6 py-4 border-b">
                        <h2 class="font-semibold text-xl text-gray-800">Admins List</h2>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Default admin -->
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="font-medium text-gray-900">admin <span class="ml-2 px-2 py-0.5 bg-yellow-100 text-yellow-800 rounded-full text-xs">Default</span></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-gray-600">Default Account</div>
                                    </td>
                                </tr>
                                
                                <!-- Registered admins -->
                                <?php foreach($admins as $admin): ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="font-medium text-gray-900"><?php echo htmlspecialchars($admin['username']); ?></div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-gray-600"><?php echo date('M j, Y - h:i A', strtotime($admin['created_at'])); ?> <span class="text-xs text-gray-500">IST</span></div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <div class="border-t mt-8 py-4 text-center text-gray-500 text-sm">
        <p>© <?php echo date('Y'); ?> Dispnsary Medical Center Admin Dashboard. All rights reserved.</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle sidebar menu items
            const menuItems = document.querySelectorAll('ul li');
            const sections = document.querySelectorAll('[data-section]');
            
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Update active state
                    menuItems.forEach(i => i.classList.remove('bg-blue-50', 'text-[#4c63ce]'));
                    this.classList.add('bg-blue-50', 'text-[#4c63ce]');
                });
            });
            
            // Mobile menu toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
            
            // User dropdown toggle
            const userDropdownButton = document.getElementById('user-dropdown-button');
            const userDropdown = document.getElementById('user-dropdown');
            
            userDropdownButton.addEventListener('click', function(e) {
                e.stopPropagation();
                userDropdown.classList.toggle('show');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function() {
                userDropdown.classList.remove('show');
            });
            
            // Prevent closing when clicking inside dropdown
            userDropdown.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        });
    </script>
</body>
</html> 