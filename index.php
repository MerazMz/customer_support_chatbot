<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="https://demo.awaikenthemes.com/dispnsary/wp-content/uploads/2024/11/favicon.png">
    <title>Dispnsary - Medical Center</title>
    <style>
        .notification {
            position: fixed;
            right: -100%;
            top: 30px;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            transition: right 0.5s ease-in-out;
        }
        .notification.show {
            right: 20px;
        }
        .notification.success {
            background-color: #def7ec;
            border: 1px solid #31c48d;
            color: #03543f;
        }
        .notification.error {
            background-color: #fde8e8;
            border: 1px solid #f98080;
            color: #9b1c1c;
        }
        .notification-progress {
            position: absolute;
            left: 0;
            top: 0;
            height: 3px;
            background: #4c63ce;
            border-radius: 8px 8px 0 0;
            width: 100%;
            transform-origin: left;
            animation: progress 5s linear;
        }
        @keyframes progress {
            from { transform: scaleX(1); }
            to { transform: scaleX(0); }
        }
        .hover\:shadow:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome" href="/css/app-wa-025281ccfe06a9d63cd35694641e07d3.css?vsn=d">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-duotone-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-duotone-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-duotone-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-duotone-light.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/sharp-light.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/duotone-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/duotone-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/duotone-light.css">
</head>
<body class="bg-gray-100" style="background-image:radial-gradient(#b6b6c475 1px, transparent 1px); background-size: 30px 30px; background-color: #ffffff;">
    <!-- Top Bar -->
    <div class="bg-[#4c63ce] text-white">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="flex flex-col sm:flex-row justify-between items-center py-2 text-sm">
                <div class="flex flex-row items-center justify-between w-full">
                    <div class="flex items-center gap-4">
                        <span class="flex items-center">
                            <i class="fa-solid fa-clock mr-2"></i>
                            <span class="font-medium">08:00am to 09:00pm</span>
                        </span>
                        <span class="hidden sm:inline">|</span>
                        <span class="hidden sm:flex items-center">
                            <i class="fa-solid fa-envelope mr-2"></i>
                            <span class="font-medium">merazmz2004@gmail.com/vanshikababral@gmail.com</span>
                        </span>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="hidden sm:flex space-x-4">
                            <i class="fa-brands fa-instagram hover:text-gray-200 cursor-pointer"></i>
                            <i class="fa-brands fa-twitter hover:text-gray-200 cursor-pointer"></i>
                            <i class="fa-brands fa-facebook hover:text-gray-200 cursor-pointer"></i>
                        </div>
                        <span class="hidden sm:inline">|</span>
                        <span class="flex items-center">
                            <span class="font-medium"><i class="fa fa-phone mr-2"></i>+917739864558/+913528103762</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="flex justify-between items-center py-4">
                <img src="https://demo.awaikenthemes.com/dispnsary/wp-content/uploads/2024/11/logo-1.svg" alt="Logo" class="h-8 sm:h-10">
                <button class="lg:hidden relative w-8 h-8 cursor-pointer" onclick="toggleMenu()" id="menuButton">
                    <span class="absolute w-6 h-0.5 bg-gray-600 transform transition-all duration-300 -translate-x-1/2 left-1/2" style="top: 25%"></span>
                    <span class="absolute w-6 h-0.5 bg-gray-600 transform transition-all duration-300 -translate-x-1/2 left-1/2" style="top: 50%"></span>
                    <span class="absolute w-6 h-0.5 bg-gray-600 transform transition-all duration-300 -translate-x-1/2 left-1/2" style="top: 75%"></span>
                </button>
                <div class="hidden lg:flex items-center space-x-8">
                    <ul class="flex space-x-8 font-medium">
                        <li class="relative after:content-[''] after:absolute after:w-0 after:h-[2px] after:bg-[#4c63ce] after:left-0 after:bottom-0 after:transition-all after:duration-300 hover:after:w-full cursor-pointer">
                            <a href="#home" onclick="scrollToSection('home'); return false;">Home</a>
                        </li>
                        <li class="relative after:content-[''] after:absolute after:w-0 after:h-[2px] after:bg-[#4c63ce] after:left-0 after:bottom-0 after:transition-all after:duration-300 hover:after:w-full cursor-pointer">
                            <a href="#about" onclick="scrollToSection('about'); return false;">About Us</a>
                        </li>
                        <li class="relative after:content-[''] after:absolute after:w-0 after:h-[2px] after:bg-[#4c63ce] after:left-0 after:bottom-0 after:transition-all after:duration-300 hover:after:w-full cursor-pointer">
                            <a href="#services" onclick="scrollToSection('services'); return false;">Services</a>
                        </li>
                        <li class="relative after:content-[''] after:absolute after:w-0 after:h-[2px] after:bg-[#4c63ce] after:left-0 after:bottom-0 after:transition-all after:duration-300 hover:after:w-full cursor-pointer">
                            <a href="#health-data" onclick="scrollToSection('health-data'); return false;">Health Stats</a>
                        </li>
                        <li class="relative after:content-[''] after:absolute after:w-0 after:h-[2px] after:bg-[#4c63ce] after:left-0 after:bottom-0 after:transition-all after:duration-300 hover:after:w-full cursor-pointer">
                            <a href="#contact" onclick="scrollToSection('contact'); return false;">Contact</a>
                        </li>
                    </ul>
                    <div class="flex space-x-4">
                        <?php if(isset($_SESSION['user_name'])): ?>
                            <div class="flex items-center gap-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 bg-[#4c63ce] rounded-full flex items-center justify-center text-white">
                                        <?php 
                                            $fullname = htmlspecialchars($_SESSION['user_name']);
                                            $firstname = explode(' ', $fullname)[0];
                                            echo strtoupper(substr($firstname, 0, 1));
                                        ?>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-sm text-gray-600">Welcome,</span>
                                        <span class="text-[#4c63ce] font-medium -mt-1"><?php echo $firstname; ?></span>
                                    </div>
                                </div>
                                <a href="logout.php" class="bg-[#4c63ce] text-white font-[500] px-4 py-2 rounded-full hover:bg-[#3b4fa3] transition-colors flex items-center gap-2">
                                    <span>Logout</span>
                                    <i class="fas fa-sign-out-alt"></i>
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="flex space-x-4">
                                <a href="login.php" class="bg-[#4c63ce] text-white font-[500] px-4 py-2 rounded-full hover:bg-[#3b4fa3] transition-colors flex items-center gap-2">
                                    <span>Login</span>
                                    <i class="fas fa-sign-in-alt"></i>
                                </a>
                                <a href="signup.php" class="bg-[#4c63ce] text-white font-[500] px-4 py-2 rounded-full hover:bg-[#3b4fa3] transition-colors flex items-center gap-2">
                                    <span>Signup</span>
                                    <i class="fas fa-user-plus"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div id="mobile-menu" class="hidden lg:hidden absolute top-full left-0 right-0 bg-white shadow-md z-50">
                <div class="px-4 py-4">
                    <ul class="space-y-4">
                        <li class="hover:text-[#4c63ce] cursor-pointer"><a href="#home" onclick="scrollToSection('home'); return false;">Home</a></li>
                        <li class="hover:text-[#4c63ce] cursor-pointer"><a href="#about" onclick="scrollToSection('about'); return false;">About Us</a></li>
                        <li class="hover:text-[#4c63ce] cursor-pointer"><a href="#health-data" onclick="scrollToSection('health-data'); return false;">Health Stats</a></li>
                        <li class="hover:text-[#4c63ce] cursor-pointer"><a href="#services" onclick="scrollToSection('services'); return false;">Services</a></li>
                        <li class="hover:text-[#4c63ce] cursor-pointer"><a href="#contact" onclick="scrollToSection('contact'); return false;">Contact</a></li>
                    </ul>
                    <div class="flex flex-col space-y-2 mt-4">
                        <?php if(isset($_SESSION['user_name'])): ?>
                            <span class="text-[#4c63ce] font-medium">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                            <a href="logout.php" class="bg-[#4c63ce] text-white px-4 py-2 rounded-full hover:bg-[#3b4fa3] transition-colors text-center">Logout</a>
                        <?php else: ?>
                            <a href="login.php" class="bg-[#4c63ce] text-white px-4 py-2 rounded-full hover:bg-[#3b4fa3] transition-colors text-center">Login</a>
                            <a href="signup.php" class="bg-[#4c63ce] text-white px-4 py-2 rounded-full hover:bg-[#3b4fa3] transition-colors text-center">Signup</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Emergency Ambulance Button -->
    <div class="fixed bottom-24 right-6 z-40">
        <?php if(isset($_SESSION['user_id'])): ?>
            <button onclick="bookAmbulance()" class="bg-red-600 hover:bg-red-700 text-white font-bold py-4 px-4 rounded-full shadow-lg flex items-center gap-3 animate-pulse">
                <i class="fas fa-ambulance text-2xl"></i>
            </button>
        <?php else: ?>
            <a href="login.php" class="bg-red-600 hover:bg-red-700 text-white font-bold py-4 px-4 rounded-full shadow-lg flex items-center gap-3">
                <i class="fas fa-ambulance text-2xl"></i>
            </a>
        <?php endif; ?>
    </div>

<!-- Main Content -->
<main id="home" class="container mx-auto px-8 my-8 sm:my-0 relative shadow-lg rounded-[40px] bg-gradient-to-br from-white via-blue-50 to-indigo-50 before:content-[''] before:absolute before:inset-0 before:bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHdpZHRoPSc0MCcgaGVpZ2h0PSc0MCcgdmlld0JveD0nMCAwIDQwIDQwJz48ZyBmaWxsPSdub25lJyBmaWxsLXJ1bGU9J2V2ZW5vZGQnPjxjaXJjbGUgY3g9JzIwJyBjeT0nMjAnIHI9JzInIGZpbGw9JyM0YzYzY2UnIG9wYWNpdHk9JzAuMScvPjwvZz48L3N2Zz4=')] before:opacity-30 before:rounded-[40px] max-w-[85rem]">
        <div class="mt-8 sm:mt-16 flex flex-col lg:flex-row">
            <div class="flex flex-col lg:flex-row items-center justify-between w-full">
                <div class="max-w-xl">
                    <h1 class="text-[#4c63ce] font-medium text-base sm:text-lg mb-4 mt-8">
                        <i class="fa-solid fa-stethoscope mr-2 sm:mt-8"></i>
                        Your Health Our Priority
                    </h1>
                    <h2 class="text-2xl sm:text-4xl font-semibold text-[#0B1030] mb-4">
                        Expert Medical care<br>you can rely on
                    </h2>
                    <p class="text-gray-500 text-sm sm:text-base mb-6">
                        Experience healthcare you can trust. Our dedicated team provides<br class="hidden md:block"> compassionate, high-quality care.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 relative z-10 mb-8">
                        <a href="booknow.php" class="rounded-full px-3.5 py-2 m-1 overflow-hidden relative group cursor-pointer border-2 font-medium border-indigo-600 text-indigo-600 text-white">
                            <span class="absolute w-64 h-0 transition-all duration-300 origin-center rotate-45 -translate-x-20 bg-indigo-600 top-1/2 group-hover:h-64 group-hover:-translate-y-32 ease"></span>
                            <span class="relative text-indigo-600 transition duration-300 group-hover:text-white ease">Book Appointment</span>
                        </a>
                        <a href="#contact" class="rounded-full px-3.5 py-2 m-1 overflow-hidden relative group cursor-pointer border-2 font-medium border-indigo-600 text-indigo-600 text-white">
                            <span class="absolute w-64 h-0 transition-all duration-300 origin-center rotate-45 -translate-x-20 bg-indigo-600 top-1/2 group-hover:h-64 group-hover:-translate-y-32 ease"></span>
                            <span class="relative text-indigo-600 transition duration-300 group-hover:text-white ease">Contact Ambulance</span>
                        </a>
                    </div>
                </div>
                <div class="hidden lg:block relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-50/50 to-indigo-50/50 rounded-[40px] before:content-[''] before:absolute before:inset-0 before:bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHdpZHRoPSc0MCcgaGVpZ2h0PSc0MCcgdmlld0JveD0nMCAwIDQwIDQwJz48ZyBmaWxsPSdub25lJyBmaWxsLXJ1bGU9J2V2ZW5vZGQnPjxjaXJjbGUgY3g9JzIwJyBjeT0nMjAnIHI9JzInIGZpbGw9JyM0YzYzY2UnIG9wYWNpdHk9JzAuMScvPjwvZz48L3N2Zz4=')] before:opacity-30 before:rounded-[40px]"></div>
                    <img loading="lazy" src="https://i.ibb.co/fz8YCdzD/Pngtree-indian-doctor-woman-smiling-at-15456626.png" alt="doctor" class="w-full h-[450px] object-contain relative z-10 ">

                    <div class="absolute z-30 bottom-8 right-8 bg-white p-3 rounded-[50px] border-4 border-white shadow-lg animate-[moveLeftRight_4s_ease-in-out_infinite]">
                        <div class="flex items-center gap-2">
                            <div class="bg-[#4c63ce] p-3 rounded-full"> <i class="fas fa-users text-white text-lg"></i></div>
                            <p class="text-gray-500 font-medium"><span class="text-black font-semibold text-xl" id="counter">0</span><span class="text-black font-semibold text-xl">+</span> <br> Satisfied Patients</p>
                        </div>
                    </div>
                    <style>
                        @keyframes moveLeftRight {
                            0%, 100% { transform: translateX(0); }
                            50% { transform: translateX(-50px); }
                        }
                    </style>
                </div>
            </div>
        </div>
    </main>

    <!-- About Us -->
    <div id="about" class="container mx-auto px-8 my-16 sm:my-24 relative max-w-[85rem]">
        <div class="mt-12 sm:mt-20 flex flex-col lg:flex-row">
            <div class="flex flex-col lg:flex-row items-center justify-between w-full gap-12">
                <div class="max-w-xl">
                    <h1 class="text-[#4c63ce] font-medium text-base sm:text-lg mb-4">
                        <i class="fa-solid fa-stethoscope mr-2 sm:mt-8"></i>
                        About Us
                    </h1>
                    <h2 class="text-2xl sm:text-4xl font-semibold text-[#0B1030] mb-6 leading-tight">
                        Professionals dedicated<br>to your health
                    </h2>
                    <p class="text-gray-600 text-sm sm:text-base mb-8 leading-relaxed">
                        Our team of skilled professionals is committed to providing<br class="hidden md:block"> personalized, compassionate care. With a focus.
                    </p>
                    <div class="space-y-8 relative z-10">
                        <div class="flex items-center gap-6 group hover:transform hover:translate-x-2 transition-all duration-300">
                            <div class="bg-[#4c63ce]/10 w-16 h-16 rounded-2xl text-[#4c63ce] flex items-center justify-center relative overflow-hidden group-hover:bg-[#4c63ce] group-hover:text-white transition-all duration-300 ease-in-out shadow-lg">
                                <i class="fas fa-user-nurse text-xl relative z-10 group-hover:animate-[flip_1s_ease-in-out_infinite]"></i>
                                <style>
                                    @keyframes flip {
                                        0% { transform: rotateY(0deg) scale(1); }
                                        50% { transform: rotateY(180deg) scale(1.2); }
                                        100% { transform: rotateY(360deg) scale(1); }
                                    }
                                </style>
                            </div>
                            <div>
                                <h1 class="text-xl font-semibold group-hover:text-[#4c63ce] transition-colors duration-300">Patient-Centered Care</h1>
                                <p class="text-gray-500 text-sm mt-1">Putting you at the heart of everything we do.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-6 group hover:transform hover:translate-x-2 transition-all duration-300">
                            <div class="bg-[#4c63ce]/10 w-16 h-16 rounded-2xl text-[#4c63ce] flex items-center justify-center relative overflow-hidden group-hover:bg-[#4c63ce] group-hover:text-white transition-all duration-300 ease-in-out shadow-lg">
                                <i class="fas fa-heartbeat text-xl relative z-10 group-hover:animate-[heartbeat_1s_infinite]"></i>
                            </div>
                            <div>
                                <h1 class="text-xl font-semibold group-hover:text-[#4c63ce] transition-colors duration-300">Comprehensive Health Checkups</h1>
                                <p class="text-gray-500 text-sm mt-1">We offer thorough health assessments to ensure your well-being.</p>
                            </div>
                        </div>
                        <style>
                            @keyframes heartbeat {
                                0%, 100% { transform: scale(1); }
                                50% { transform: scale(1.3); }
                            }
                        </style>
                        <div class="flex items-center gap-6 group hover:transform hover:translate-x-2 transition-all duration-300">
                            <div class="bg-[#4c63ce]/10 w-16 h-16 rounded-2xl text-[#4c63ce] flex items-center justify-center relative overflow-hidden group-hover:bg-[#4c63ce] group-hover:text-white transition-all duration-300 ease-in-out shadow-lg">
                                <i class="fas fa-ambulance text-xl relative z-10 group-hover:animate-[driveAway_1s_ease-in-out_forwards]"></i>
                                <style>
                                    @keyframes driveAway {
                                        0% { transform: translateX(0); opacity: 1; }
                                        100% { transform: translateX(100px); opacity: 0; }
                                    }
                                </style>
                            </div>
                            <div>
                                <h1 class="text-xl font-semibold group-hover:text-[#4c63ce] transition-colors duration-300">24 Hours Ambulance Service</h1>
                                <p class="text-gray-500 text-sm mt-1">We are here for you 24/7 to provide the care you need.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-6 group hover:transform hover:translate-x-2 transition-all duration-300">
                            <div class="bg-[#4c63ce]/10 w-16 h-16 rounded-2xl text-[#4c63ce] flex items-center justify-center relative overflow-hidden group-hover:bg-[#4c63ce] group-hover:text-white transition-all duration-300 ease-in-out shadow-lg">
                                <i class="fas fa-user-md text-xl relative z-10 group-hover:animate-bounce"></i>
                            </div>
                            <div>
                                <h1 class="text-xl font-semibold group-hover:text-[#4c63ce] transition-colors duration-300">Expert Medical Consultation</h1>
                                <p class="text-gray-500 text-sm mt-1">Get professional advice from our experienced doctors.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block relative">
                    <div class="relative">
                        <img src="https://images.pexels.com/photos/3259624/pexels-photo-3259624.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="doctor" class="w-full h-[450px] object-cover rounded-[40px] mt-8 shadow-xl">
                        <img src="https://images.pexels.com/photos/4386464/pexels-photo-4386464.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="open hours" class="w-[200px] h-[200px] object-cover absolute -bottom-8 -left-[90px] rounded-[40px] border-8 border-white shadow-xl">
                        <div class="absolute -bottom-8 right-[16px] bg-gradient-to-br from-white via-blue-50 to-indigo-50 p-4 rounded-[20px] border-4 border-white shadow-xl">
                            <p class="text-[#4c63ce] font-semibold text-sm flex items-center gap-2">
                                <i class="fas fa-video"></i>
                                Video call support
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services -->
    <div id="services" class="py-10 relative -mt-24">
        <div class="max-w-5xl mx-auto px-8 py-8">
            <div class="text-center">
                <h1 class="text-[#4c63ce] font-medium text-base sm:text-lg mb             mb-4">
                    <i class="fa-solid fa-stethoscope sm:mt-8 mr-2"></i>
                    Our Services
                </h1>
                <h1 class="text-3xl font-medium text-gray-900 mt-5 mb-6">
                    Comprehensive Services for Your Health Journey
                </h1>
            </div>
            <!-- Navigation Buttons -->
            <button id="prevBtn" class="absolute -left-4 top-1/2 -translate-y-1/2 z-10 bg-gray-100 p-3 rounded-full shadow-xl hover:bg-[#4c63ce] hover:text-white transition-all mx-4 sm:mx-40 hover:shadow">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button id="nextBtn" class="absolute -right-4 top-1/2 -translate-y-1/2 z-10 bg-gray-200 p-3 rounded-full shadow-xl hover:bg-[#4c63ce] hover:text-white transition-all mx-4 sm:mx-40 hover:shadow">
                <i class="fas fa-chevron-right"></i>
            </button>
            <!-- Carousel Container -->
            <div class="relative overflow-hidden">
                <!-- Cards Container -->
                <div id="servicesCarousel" class="flex gap-6 transition-transform duration-500 ease-in-out">
                    <!-- Radiology Card -->
                    <div class="min-w-[300px] bg-gradient-to-br from-white via-blue-50 to-indigo-50 p-6 rounded-2xl shadow-lg hover:shadow-lg transition-shadow">
                        <div class="bg-gray-100 rounded-full w-14 h-14 flex justify-center items-center text-[#4c63ce] shadow-xl mb-5">
                            <i class="fa-solid fa-x-ray text-2xl"></i>
                        </div>
                        <h2 class="uppercase text-[#4c63ce] font-medium mb-3">Radiology</h2>
                        <p class="text-gray-600 mb-3 text-sm">Advanced imaging services using state-of-the-art technology.</p><br>
                        <a class="text-[#4c63ce] flex items-center hover:text-[#3b4fa3] font-medium group" href="service.php?service=radiology">
                            Read More
                            <i class="fa-solid fa-chevron-right ml-1 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                    <!-- Neurology Card -->
                    <div class="min-w-[300px] bg-gradient-to-br from-white via-blue-50 to-indigo-50 p-6 rounded-2xl shadow-lg hover:shadow-lg transition-shadow">
                        <div class="bg-gray-100 rounded-full w-14 h-14 flex justify-center items-center text-[#4c63ce] shadow-xl mb-5">
                            <i class="fas fa-brain text-2xl"></i>
                        </div>
                        <h2 class="uppercase text-[#4c63ce] font-medium mb-3">Neurology</h2>
                        <p class="text-gray-600 mb-3 text-sm">Comprehensive care for neurological conditions.</p><br>
                        <a class="text-[#4c63ce] flex items-center hover:text-[#3b4fa3] font-medium group" href="service.php?service=neurology">
                            Read More
                            <i class="fa-solid fa-chevron-right ml-1 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                    <!-- Cardiology Card -->
                    <div class="min-w-[300px] bg-gradient-to-br from-white via-blue-50 to-indigo-50 p-6 rounded-2xl shadow-lg hover:shadow-lg transition-shadow">
                        <div class="bg-gray-100 rounded-full w-14 h-14 flex justify-center items-center text-[#4c63ce] shadow-xl mb-5">
                            <i class="fas fa-heartbeat text-2xl"></i>
                        </div>
                        <h2 class="uppercase text-[#4c63ce] font-medium mb-3">Cardiology</h2>
                        <p class="text-gray-600 mb-3 text-sm">Expert heart care from prevention to treatment.</p><br>
                        <a class="text-[#4c63ce] flex items-center hover:text-[#3b4fa3] font-medium group" href="service.php?service=cardiology">
                            Read More
                            <i class="fa-solid fa-chevron-right ml-1 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                    <!-- Orthopedics Card -->
                    <div class="min-w-[300px] bg-gradient-to-br from-white via-blue-50 to-indigo-50 p-6 rounded-2xl shadow-lg hover:shadow-lg transition-shadow">
                        <div class="bg-gray-100 rounded-full w-14 h-14 flex justify-center items-center text-[#4c63ce] shadow-xl mb-5">
                            <i class="fas fa-bone text-2xl"></i>
                        </div>
                        <h2 class="uppercase text-[#4c63ce] font-medium mb-3">Orthopedics</h2>
                        <p class="text-gray-600 mb-3 text-sm">Specialized care for bones, joints, and muscles.</p><br>
                        <a class="text-[#4c63ce] flex items-center hover:text-[#3b4fa3] font-medium group" href="service.php?service=orthopedics">
                            Read More
                            <i class="fa-solid fa-chevron-right ml-1 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                    <!-- Ophthalmology Card -->
                    <div class="min-w-[300px] bg-gradient-to-br from-white via-blue-50 to-indigo-50 p-6 rounded-2xl shadow-lg hover:shadow-lg transition-shadow">
                        <div class="bg-gray-100 rounded-full w-14 h-14 flex justify-center items-center text-[#4c63ce] shadow-xl mb-5">
                            <i class="fas fa-eye text-2xl"></i>
                        </div>
                        <h2 class="uppercase text-[#4c63ce] font-medium mb-3">Ophthalmology</h2>
                        <p class="text-gray-600 mb-3 text-sm">Complete eye care and vision services.</p><br>
                        <a class="text-[#4c63ce] flex items-center hover:text-[#3b4fa3] font-medium group" href="service.php?service=ophthalmology">
                            Read More
                            <i class="fa-solid fa-chevron-right ml-1 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Health Data Section -->
    <section id="health-data" class="py-8 sm:py-16 bg-gradient-to-br from-white via-blue-50 to-indigo-50 rounded-2xl mx-4 sm:mx-20">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="text-center mb-8 sm:mb-12">
                <h1 class="text-[#4c63ce] font-medium text-base sm:text-lg mb-4">
                    <i class="fa-solid fa-heart-pulse sm:mt-8 mr-2"></i>
                    Your Health Stats
                </h1>
                <p class="text-gray-600 max-w-2xl mx-auto text-sm sm:text-base">Track your health metrics in real-time with Google Fit integration</p>
            </div>
            <div id="setup-section" class="text-center mb-8">
                <button id="authorize-button" onclick="tokenClient.requestAccessToken()" disabled class="relative inline-flex items-center justify-start px-4 sm:px-6 py-2 sm:py-3 overflow-hidden font-medium transition-all bg-[#4c63ce] rounded-full hover:bg-white group text-sm sm:text-base">
                    <span class="w-48 h-48 rounded rotate-[-40deg] bg-[#3b4fa3] absolute bottom-0 left-0 -translate-x-full ease-out duration-500 transition-all translate-y-full mb-9 ml-9 group-hover:ml-0 group-hover:mb-32 group-hover:translate-x-0"></span>
                    <span class="relative w-full text-left text-white transition-colors duration-300 ease-in-out group-hover:text-white flex items-center gap-2">
                        <i class="fas fa-link"></i>
                        Connect Google Fit
                    </span>
                </button>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16">
        <div class="container mx-auto px-4 max-w-7xl">
            <div id="notification" class="notification">
                <div id="notification-progress" class="notification-progress"></div>
                <div class="flex items-center">
                    <span id="notification-icon" class="mr-2"></span>
                    <span id="notification-message"></span>
                </div>
            </div>
            <div class="text-center mb-12">
                <h1 class="text-[#4c63ce] font-medium text-base sm:text-lg mb-4">
                    <i class="fa-solid fa-stethoscope sm:mt-8 mr-2"></i>
                    Get in Touch
                </h1>
                <p class="text-gray-600 max-w-2xl mx-auto">Have questions or need assistance? We're here to help. Reach out to us through any of the following channels or fill out the contact form below.</p>
            </div>
            <div class="flex flex-col lg:flex-row gap-6">
                <div class="flex-1">
                    <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-[0_10px_20px_rgba(76,99,206,0.7)] transition-shadow">
                        <div class="w-12 h-12 bg-[#4c63ce]/10 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-location-dot text-[#4c63ce] text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Our Location</h3>
                        <p class="text-gray-600">123 Medical Center Drive<br>Healthcare City, HC 12345</p>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-[0_10px_20px_rgba(76,99,206,0.7)] transition-shadow">
                        <div class="w-12 h-12 bg-[#4c63ce]/10 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-phone text-[#4c63ce] text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Phone Number</h3>
                        <div class="flex items-center gap-2 mb-2">
                            <p class="text-gray-600">+917739864558</p>
                            <button onclick="copyToClipboard(this, '+917739864558')" class="text-[#4c63ce] hover:text-[#3b4fa3]">
                                <i class="fa-regular fa-clipboard"></i>
                            </button>
                        </div>
                        <div class="flex items-center gap-2">
                            <p class="text-gray-600">+9169696969</p>
                            <button onclick="copyToClipboard(this, '+9169696969')" class="text-[#4c63ce] hover:text-[#3b4fa3]">
                                <i class="fa-regular fa-clipboard"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-[0_10px_20px_rgba(76,99,206,0.7)] transition-shadow">
                        <div class="w-12 h-12 bg-[#4c63ce]/10 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-envelope text-[#4c63ce] text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Email Address</h3>
                        <p class="text-gray-600">info@medicenter.com<br>support@medicenter.com</p>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm p-4 sm:p-8">
                <form action="contact_process.php" method="POST" class="space-y-4 sm:space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                            <input type="text" id="name" name="name" required class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4c63ce] focus:border-transparent outline-none transition-all text-sm sm:text-base">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input type="email" id="email" name="email" required class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4c63ce] focus:border-transparent outline-none transition-all text-sm sm:text-base">
                        </div>
                    </div>
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                        <input type="text" id="subject" name="subject" required class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4c63ce] focus:border-transparent outline-none transition-all text-sm sm:text-base">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                        <textarea id="message" name="message" rows="4" required class="w-full px-3 sm:px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#4c63ce] focus:border-transparent outline-none transition-all text-sm sm:text-base"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-[#4c63ce] text-white font-medium px-4 sm:px-6 py-2.5 sm:py-3 rounded-lg hover:bg-[#3b4fa3] transition-colors flex items-center justify-center gap-2 text-sm sm:text-base">
                        <span>Send Message</span>
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
            <div class="mt-8 sm:mt-12 rounded-xl overflow-hidden shadow-sm mx-4 sm:mx-20">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3406.9612243126247!2d75.70336037601191!3d31.37728905426814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a5a594d22b88d%3A0x4cc934c58d0992ec!2sLovely%20Professional%20University!5e0!3m2!1sen!2sin!4v1707634171317!5m2!1sen!2sin" width="100%" height="300" class="sm:h-[450px]" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php'; ?>

    <!-- Chatbot Icon and Chat Box -->
    <div class="fixed bottom-4 sm:bottom-6 right-4 sm:right-6 z-50 flex items-end gap-2 sm:gap-4">
        <div id="medibot-text" class="bg-white rounded-lg px-3 sm:px-4 py-1.5 sm:py-2 shadow-lg animate-bounce mb-2">
            <p class="text-[#4c63ce] font-medium text-sm sm:text-base">Ask Medibot!</p>
        </div>
        <div class="relative">
            <div id="chat-box" class="hidden opacity-0 bg-white rounded-lg shadow-xl w-[90vw] sm:w-[350px] h-[80vh] sm:h-[500px] absolute bottom-20 right-0 mb-2 overflow-hidden transition-opacity duration-300 ease-in-out">
                <div class="bg-[#4c63ce] text-white p-3 sm:p-4 flex justify-between items-center">
                    <div class="flex items-center">
                        <i class="fa-regular fa-robot mr-2"></i>
                        <span class="font-medium text-sm sm:text-base">MEDI BOT</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <button onclick="toggleChat()" class="hover:text-gray-200">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div id="chat-messages" class="p-3 sm:p-4 h-[calc(80vh-120px)] sm:h-[380px] overflow-y-auto">
                    <div class="mb-4">
                        <div class="bg-gray-100 rounded-lg p-2.5 sm:p-3 max-w-[80%] relative group">
                            <p class="text-sm sm:text-base">Hello I am Medi Bot! How can I assist you today?</p>
                            <button onclick="speakMessage(this.parentElement.querySelector('p').textContent)" class="absolute right-2 top-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 text-[#4c63ce] hover:text-[#3b4fa3] p-1 rounded-full hover:bg-gray-100">
                                <i class="fas fa-volume-up text-sm sm:text-base"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="border-t p-2">
                    <div class="flex items-center gap-2">
                        <input type="text" id="chat-input" placeholder="Type your message..." class="flex-1 border rounded-full px-3 sm:px-4 py-1.5 sm:py-2 focus:outline-none focus:border-[#4c63ce] text-sm sm:text-base" autocomplete="off">
                        <button onclick="startVoiceInput()" class="bg-[#4c63ce] text-white p-1.5 sm:p-2 rounded-full hover:bg-[#3b4fa3] w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center">
                            <i class="fas fa-microphone text-sm sm:text-base"></i>
                        </button>
                        <button onclick="sendMessage()" class="bg-[#4c63ce] text-white p-1.5 sm:p-2 rounded-full hover:bg-[#3b4fa3] w-8 h-8 sm:w-10 sm:h-10 flex items-center justify-center">
                            <i class="fas fa-paper-plane text-sm sm:text-base"></i>
                        </button>
                    </div>
                </div>
            </div>
            <button onclick="toggleChat(); document.getElementById('medibot-text').style.display='none';" class="bg-[#4c63ce] text-white p-3 sm:p-4 rounded-full hover:bg-[#3b4fa3] transition-all duration-300 shadow-lg" id="chat-button">
                <i class="fa-solid fa-comment-dots text-xl sm:text-2xl transition-transform duration-300"></i>
            </button>
        </div>
    </div>

    <script>
        // Number counting effect
        let count = 0;
        const target = 6500;
        const counter = document.getElementById('counter');
        const speed = 5;
        const updateCount = () => {
            const increment = Math.ceil(target / (1000 / speed));
            if(count < target) {
                count += increment;
                if(count > target) count = target;
                counter.innerText = count;
                setTimeout(updateCount, speed);
            }
        };
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if(entry.isIntersecting) {
                    updateCount();
                    observer.unobserve(entry.target);
                }
            });
        });
        observer.observe(counter);

        // Mobile menu toggle
        function toggleMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            const spans = document.getElementById('menuButton').getElementsByTagName('span');
            const isOpen = !mobileMenu.classList.contains('hidden');
            mobileMenu.classList.toggle('hidden');
            if (!isOpen) {
                spans[0].style.top = '50%';
                spans[0].style.transform = 'translate(-50%, -50%) rotate(45deg)';
                spans[1].style.opacity = '0';
                spans[2].style.top = '50%';
                spans[2].style.transform = 'translate(-50%, -50%) rotate(-45deg)';
            } else {
                spans[0].style.top = '25%';
                spans[0].style.transform = 'translate(-50%, 0)';
                spans[1].style.opacity = '1';
                spans[2].style.top = '75%';
                spans[2].style.transform = 'translate(-50%, 0)';
            }
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileMenu = document.getElementById('mobile-menu');
            const menuButton = document.querySelector('.lg\\:hidden');
            if (!mobileMenu.contains(event.target) && !menuButton.contains(event.target)) {
                mobileMenu.classList.add('hidden');
                const spans = menuButton.getElementsByTagName('span');
                spans[0].style.top = '25%';
                spans[0].style.transform = 'translate(-50%, 0)';
                spans[1].style.opacity = '1';
                spans[2].style.top = '75%';
                spans[2].style.transform = 'translate(-50%, 0)';
            }
        });

        // Services Carousel
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.getElementById('servicesCarousel');
            const cards = carousel.children;
            const cardWidth = cards[0].offsetWidth + 24;
            let currentIndex = 0;
            const originalLength = cards.length;
            let autoScrollInterval;

            [...cards].forEach(card => {
                const clone = card.cloneNode(true);
                carousel.appendChild(clone);
            });

            function scrollToIndex(index) {
                carousel.style.transform = `translateX(-${index * cardWidth}px)`;
            }

            function nextSlide() {
                currentIndex++;
                carousel.style.transition = 'transform 0.5s ease-in-out';
                scrollToIndex(currentIndex);
                if (currentIndex >= originalLength) {
                    setTimeout(() => {
                        carousel.style.transition = 'none';
                        currentIndex = 0;
                        scrollToIndex(currentIndex);
                    }, 500);
                }
            }

            function prevSlide() {
                if (currentIndex <= 0) {
                    carousel.style.transition = 'none';
                    currentIndex = originalLength - 1;
                    scrollToIndex(currentIndex + 1);
                    setTimeout(() => {
                        carousel.style.transition = 'transform 0.5s ease-in-out';
                        scrollToIndex(currentIndex);
                    }, 50);
                } else {
                    currentIndex--;
                    carousel.style.transition = 'transform 0.5s ease-in-out';
                    scrollToIndex(currentIndex);
                }
            }

            function startAutoScroll() {
                autoScrollInterval = setInterval(nextSlide, 5000);
            }

            function stopAutoScroll() {
                clearInterval(autoScrollInterval);
            }

            const nextBtn = document.getElementById('nextBtn');
            const prevBtn = document.getElementById('prevBtn');

            nextBtn.addEventListener('click', nextSlide);
            prevBtn.addEventListener('click', prevSlide);

            nextBtn.addEventListener('mouseenter', stopAutoScroll);
            nextBtn.addEventListener('mouseleave', startAutoScroll);
            prevBtn.addEventListener('mouseenter', stopAutoScroll);
            prevBtn.addEventListener('mouseleave', startAutoScroll);

            startAutoScroll();
        });

        // Chatbot Functions
        function toggleChat() {
            const chatBox = document.getElementById('chat-box');
            const chatButton = document.getElementById('chat-button');
            const icon = chatButton.querySelector('i');
            if (chatBox.classList.contains('hidden')) {
                chatBox.classList.remove('hidden');
                void chatBox.offsetWidth;
                chatBox.classList.remove('opacity-0');
                icon.classList.remove('fa-comment-dots');
                icon.classList.add('fa-times');
                chatButton.style.transform = 'rotate(180deg)';
            } else {
                chatBox.classList.add('opacity-0');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-comment-dots');
                chatButton.style.transform = 'rotate(0deg)';
                setTimeout(() => {
                    chatBox.classList.add('hidden');
                }, 300);
            }
        }

        async function sendMessage() {
            const input = document.getElementById('chat-input');
            const message = input.value.trim();
            const messagesContainer = document.getElementById('chat-messages');
            if (message) {
                const userMessage = `
                    <div class="mb-4 flex justify-end">
                        <div class="bg-[#4c63ce] text-white rounded-lg p-3 max-w-[80%]">
                            <p>${message}</p>
                        </div>
                    </div>
                `;
                messagesContainer.innerHTML += userMessage;
                input.value = '';
                scrollToBottom(messagesContainer);
                try {
                    const loadingMessage = `
                        <div class="mb-4" id="loading-message">
                            <div class="rounded-lg p-3 max-w-[80%] flex items-center">
                                <div class="animate-pulse">Thinking...</div>
                            </div>
                        </div>
                    `;
                    messagesContainer.innerHTML += loadingMessage;
                    scrollToBottom(messagesContainer);
                    const response = await fetch('http://localhost:5000/chat', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ message: message })
                    });
                    const data = await response.json();
                    const loadingElement = document.getElementById('loading-message');
                    if (loadingElement) loadingElement.remove();
                    const messageId = 'ai-message-' + Date.now();
                    const aiResponse = `
                        <div class="mb-4">
                            <div class="bg-gray-100 rounded-lg p-3 max-w-[80%] relative group">
                                <p id="${messageId}" class="typing-effect pr-8"></p>
                                <button onclick="speakMessage(this.parentElement.querySelector('p').textContent)" class="absolute right-2 top-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 text-[#4c63ce] hover:text-[#3b4fa3] p-1 rounded-full hover:bg-gray-100">
                                    <i class="fas fa-volume-up"></i>
                                </button>
                                <button onclick="copyToClipboard(this, this.parentElement.querySelector('p').textContent)" class="absolute right-10 top-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 text-[#4c63ce] hover:text-[#3b4fa3] p-1 rounded-full hover:bg-gray-100">
                                    <i class="fas fa-copy"></i>
                                </button>
                            </div>
                        </div>
                    `;
                    messagesContainer.insertAdjacentHTML('beforeend', aiResponse);
                    scrollToBottom(messagesContainer);
                    setTimeout(() => {
                        const text = data.response;
                        const element = document.getElementById(messageId);
                        let index = 0;
                        function type() {
                            if (index < text.length) {
                                element.textContent += text.charAt(index);
                                index++;
                                setTimeout(type, 20);
                                scrollToBottom(messagesContainer);
                            }
                        }
                        type();
                    }, 100);
                } catch (error) {
                    console.error('Error:', error);
                    const errorMessage = `
                        <div class="mb-4">
                            <div class="bg-red-100 text-red-700 rounded-lg p-3 max-w-[80%]">
                                <p>Sorry, there was an error processing your message.</p>
                            </div>
                        </div>
                    `;
                    messagesContainer.innerHTML += errorMessage;
                    scrollToBottom(messagesContainer);
                }
            }
        }

        function scrollToBottom(element) {
            element.scrollTop = element.scrollHeight;
        }

        document.getElementById('chat-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') sendMessage();
        });

        function scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);
            const navHeight = document.querySelector('nav').offsetHeight;
            if (section) {
                const targetPosition = section.offsetTop - navHeight;
                window.scrollTo({ top: targetPosition, behavior: 'smooth' });
                const mobileMenu = document.getElementById('mobile-menu');
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    toggleMenu();
                }
            }
        }

        document.querySelectorAll('#mobile-menu li').forEach(item => {
            item.addEventListener('click', function() {
                const sectionId = this.textContent.toLowerCase().replace(/\s+/g, '');
                scrollToSection(sectionId);
            });
        });

        function startVoiceInput() {
            if ('webkitSpeechRecognition' in window || 'SpeechRecognition' in window) {
                const SpeechRecognition = window.webkitSpeechRecognition || window.SpeechRecognition;
                const recognition = new SpeechRecognition();
                recognition.lang = 'en-US';
                recognition.continuous = false;
                recognition.interimResults = false;
                const chatInput = document.getElementById('chat-input');
                const micButton = document.querySelector('button[onclick="startVoiceInput()"]');
                micButton.innerHTML = '<i class="fas fa-microphone-slash text-red-500"></i>';
                micButton.classList.add('animate-pulse');
                recognition.start();
                recognition.onresult = (event) => {
                    const transcript = event.results[0][0].transcript;
                    chatInput.value = transcript;
                    sendMessage();
                };
                recognition.onend = () => {
                    micButton.innerHTML = '<i class="fas fa-microphone"></i>';
                    micButton.classList.remove('animate-pulse');
                };
                recognition.onerror = (event) => {
                    console.error('Speech recognition error:', event.error);
                    micButton.innerHTML = '<i class="fas fa-microphone"></i>';
                    micButton.classList.remove('animate-pulse');
                    const messagesContainer = document.getElementById('chat-messages');
                    const errorMessage = `
                        <div class="mb-4">
                            <div class="bg-red-100 text-red-700 rounded-lg p-3 max-w-[80%]">
                                <p>Sorry, there was an error with voice recognition. Please try again.</p>
                            </div>
                        </div>
                    `;
                    messagesContainer.innerHTML += errorMessage;
                    scrollToBottom(messagesContainer);
                };
            } else {
                alert('Sorry, your browser does not support voice input. Please try using a modern browser like Chrome.');
            }
        }

        const style = document.createElement('style');
        style.textContent = `
            @keyframes pulse {
                0% { opacity: 1; }
                50% { opacity: 0.5; }
                100% { opacity: 1; }
            }
            .animate-pulse {
                animation: pulse 1s infinite;
            }
        `;
        document.head.appendChild(style);

        function speakMessage(text) {
            speechSynthesis.cancel();
            const button = event.currentTarget;
            const icon = button.querySelector('i');
            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = 'en-US';
            const voices = window.speechSynthesis.getVoices();
            const femaleVoice = voices.find(voice => voice.name.includes('Female') || voice.name.includes('female') || voice.name.includes('Samantha') || voice.name.includes('Microsoft Zira'));
            if (femaleVoice) utterance.voice = femaleVoice;
            utterance.pitch = 1.2;
            icon.classList.remove('fa-volume-up');
            icon.classList.add('fa-volume-mute');
            button.onclick = () => {
                speechSynthesis.cancel();
                icon.classList.remove('fa-volume-mute');
                icon.classList.add('fa-volume-up');
                button.onclick = () => speakMessage(text);
            };
            utterance.onend = () => {
                icon.classList.remove('fa-volume-mute');
                icon.classList.add('fa-volume-up');
                button.onclick = () => speakMessage(text);
            };
            speechSynthesis.speak(utterance);
        }

        function copyToClipboard(button, text) {
            navigator.clipboard.writeText(text).then(() => {
                const icon = button.querySelector('i');
                icon.classList.remove('fa-clipboard', 'fa-copy');
                icon.classList.add('fa-check');
                setTimeout(() => {
                    icon.classList.remove('fa-check');
                    icon.classList.add(button.classList.contains('fa-clipboard') ? 'fa-clipboard' : 'fa-copy');
                }, 1000);
            }).catch(err => console.error('Failed to copy text: ', err));
        }

        function bookAmbulance() {
            alert('Ambulance booked successfully');
        }

        function showNotification(type, message) {
            const notification = document.getElementById('notification');
            const notificationIcon = document.getElementById('notification-icon');
            const notificationMessage = document.getElementById('notification-message');
            const progressBar = document.getElementById('notification-progress');
            progressBar.remove();
            const newProgressBar = document.createElement('div');
            newProgressBar.id = 'notification-progress';
            newProgressBar.className = 'notification-progress';
            notification.insertBefore(newProgressBar, notification.firstChild);
            notification.className = 'notification ' + type;
            newProgressBar.style.background = type === 'success' ? '#31c48d' : '#f98080';
            notificationIcon.innerHTML = type === 'success' ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-exclamation-circle"></i>';
            notificationMessage.textContent = message;
            setTimeout(() => notification.classList.add('show'), 100);
            setTimeout(() => notification.classList.remove('show'), 5000);
        }

        window.addEventListener('DOMContentLoaded', () => {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('contact_success') === 'true') {
                showNotification('success', 'Your message has been sent successfully. We\'ll get back to you soon.');
            }
            if (urlParams.get('contact_error')) {
                let errorMessage = 'An error occurred. Please try again.';
                switch(urlParams.get('contact_error')) {
                    case 'empty': errorMessage = 'Please fill in all fields.'; break;
                    case 'invalid_email': errorMessage = 'Please enter a valid email address.'; break;
                    case 'server': errorMessage = 'Server error occurred. Please try again later.'; break;
                }
                showNotification('error', errorMessage);
            }
            if (urlParams.has('contact_success') || urlParams.has('contact_error')) {
                const newUrl = window.location.pathname + window.location.hash;
                window.history.replaceState({}, document.title, newUrl);
            }
        });
    </script>
</body>
</html>