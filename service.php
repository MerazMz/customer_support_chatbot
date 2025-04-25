<?php
session_start();

// Define service data with local image paths and new fields
$services = [
    'radiology' => [
        'title' => 'Radiology Services',
        'icon' => 'fa-x-ray',
        'description' => 'Our Radiology department offers advanced imaging services using state-of-the-art technology to provide accurate diagnoses and guide treatment plans. We prioritize patient comfort and safety while delivering high-quality imaging results.',
        'offerings' => [
            'X-rays: Quick imaging to detect bone fractures or chest conditions like pneumonia.',
            'CT scans: Detailed 3D images of organs to diagnose issues like tumors or internal injuries.',
            'MRI scans: High-resolution images of muscles, brain, or joints for accurate neurological or soft tissue diagnosis.',
            'Ultrasound: Safe, non-invasive imaging using sound waves, ideal for pregnancy or organ checks.',
            'Mammography: Specialized breast imaging to screen for early signs of breast cancer.'
        ],
        'why_choose_us' => 'Our team of board-certified radiologists and skilled technologists use cutting-edge equipment to ensure precise imaging. We offer same-day appointments and rapid result turnaround to support timely medical decisions.',
        'image' => 'images/radiology.jpeg',
        // New fields
        'availability' => 'available',
        'faqs' => [
            ['question' => 'What is an MRI scan?', 'answer' => 'An MRI uses magnetic fields to create detailed images of your body, helping diagnose conditions like brain or joint issues.'],
            ['question' => 'Is radiation involved in ultrasound?', 'answer' => 'No, ultrasound uses sound waves, making it safe for pregnancy and other sensitive conditions.']
        ],
        'testimonials' => [
            ['name' => 'Aditi', 'text' => 'The MRI was quick and comfortable, with clear results explained by the team.'],
            ['name' => 'Sakshi Sharma', 'text' => 'Ultrasound helped monitor my pregnancy safely. Highly recommend!']
        ]
    ],
    'neurology' => [
        'title' => 'Neurology Services',
        'icon' => 'fa-brain',
        'description' => 'Our Neurology department provides comprehensive care for a wide range of neurological conditions, from headaches to complex disorders. Our specialists use advanced diagnostics and personalized treatment plans.',
        'offerings' => [
            'EEG and EMG testing: Measures brain and muscle activity to diagnose epilepsy or nerve disorders.',
            'Epilepsy and seizure management: Personalized plans to control seizures with medication or therapy.',
            'Stroke prevention and rehabilitation: Strategies and therapies to reduce stroke risk and aid recovery.',
            'Parkinson’s and Alzheimer’s treatment: Comprehensive care to manage symptoms and improve quality of life.',
            'Headache and migraine clinics: Specialized care to relieve chronic headaches and prevent migraines.'
        ],
        'why_choose_us' => 'Our neurologists are leaders in their field, offering cutting-edge treatments and compassionate care. We work closely with patients to improve quality of life.',
        'image' => 'images/neurology.jpeg',
        'availability' => 'limited',
        'faqs' => [
            ['question' => 'What is an EEG?', 'answer' => 'An EEG records electrical activity in the brain to diagnose conditions like epilepsy or sleep disorders.'],
            ['question' => 'Can migraines be treated?', 'answer' => 'Yes, our clinics offer personalized treatments, including medications and lifestyle changes, to reduce migraine frequency.']
        ],
        'testimonials' => [
            ['name' => 'Aman Kumar', 'text' => 'The epilepsy management plan changed my life. The team was so supportive!'],
            ['name' => 'Vijay Verma', 'text' => 'Stroke rehab helped me regain mobility faster than expected.']
        ]
    ],
    'cardiology' => [
        'title' => 'Cardiology Services',
        'icon' => 'fa-heartbeat',
        'description' => 'Our Cardiology department specializes in heart care, offering services from preventive screenings to advanced treatments. We are committed to improving heart health for all our patients.',
        'offerings' => [
            'Echocardiograms and stress testing: Ultrasound and exercise tests to check heart function and detect issues.',
            'Cardiac catheterization: Minimally invasive procedure to diagnose and treat blocked heart arteries.',
            'Heart rhythm monitoring: Tracks irregular heartbeats to prevent complications like arrhythmias.',
            'Coronary artery disease management: Treatments to improve blood flow and reduce heart attack risk.',
            'Heart failure treatment programs: Tailored plans to strengthen heart function and enhance daily living.'
        ],
        'why_choose_us' => 'Our cardiologists use the latest technology and research to provide top-tier care. We focus on prevention, early detection, and tailored treatment plans.',
        'image' => 'images/cardiology.jpeg',
        'availability' => 'available',
        'faqs' => [
            ['question' => 'What is a stress test?', 'answer' => 'A stress test monitors your heart during exercise to detect issues like blockages or irregular rhythms.'],
            ['question' => 'Is cardiac catheterization safe?', 'answer' => 'Yes, it’s a minimally invasive procedure with low risks, performed by our expert cardiologists.']
        ],
        'testimonials' => [
            ['name' => 'Vanshika', 'text' => 'The heart rhythm monitoring caught my issue early, saving me from complications.'],
            ['name' => 'Ravi Dubey', 'text' => 'Cardiac care here is top-notch. I feel stronger every day!']
        ]
    ],
    'orthopedics' => [
        'title' => 'Orthopedics Services',
        'icon' => 'fa-bone',
        'description' => 'Our Orthopedics department offers specialized care for bones, joints, and muscles, helping patients regain mobility and reduce pain through surgical and non-surgical treatments.',
        'offerings' => [
            'Joint replacement surgeries: Replaces damaged hips or knees to restore mobility and reduce pain.',
            'Sports injury treatment: Expert care for sprains, tears, or fractures to get athletes back in action.',
            'Spine care and surgery: Treatments for back pain or spinal conditions to improve movement and comfort.',
            'Fracture management: Precise care to heal broken bones and prevent future complications.',
            'Physical therapy programs: Customized exercises to rebuild strength and flexibility after injury or surgery.'
        ],
        'why_choose_us' => 'Our orthopedic surgeons and therapists provide personalized care, using minimally invasive techniques to ensure faster recovery and better outcomes.',
        'image' => 'images/orthopedics.jpeg',
        'availability' => 'booked',
        'faqs' => [
            ['question' => 'How long is recovery after joint replacement?', 'answer' => 'Recovery varies, but most patients resume normal activities within 6-12 weeks with physical therapy.'],
            ['question' => 'Can sports injuries be treated without surgery?', 'answer' => 'Yes, many injuries respond well to physical therapy and non-surgical treatments.']
        ],
        'testimonials' => [
            ['name' => 'Arpita', 'text' => 'Knee replacement surgery gave me my mobility back. Amazing care!'],
            ['name' => 'Lakshay Thakur', 'text' => 'The sports injury team got me back on the field in weeks.']
        ]
    ],
    'ophthalmology' => [
        'title' => 'Ophthalmology Services',
        'icon' => 'fa-eye',
        'description' => 'Our Ophthalmology department provides complete eye care, from routine vision exams to advanced surgical procedures, ensuring optimal vision health for our patients.',
        'offerings' => [
            'Cataract surgery: Removes cloudy lenses to restore clear vision with minimal recovery time.',
            'LASIK and vision correction: Laser procedures to reduce dependence on glasses or contacts.',
            'Glaucoma management: Treatments to lower eye pressure and prevent vision loss.',
            'Retinal disorder treatment: Advanced care for conditions like macular degeneration to preserve sight.',
            'Pediatric eye care: Gentle vision exams and treatments tailored for children’s eye health.'
        ],
        'why_choose_us' => 'Our ophthalmologists use state-of-the-art technology to deliver precise and effective treatments, prioritizing patient comfort and vision preservation.',
        'image' => 'images/ophthalmology.jpeg',
        'availability' => 'available',
        'faqs' => [
            ['question' => 'Is LASIK painful?', 'answer' => 'LASIK is typically painless, with mild discomfort during recovery, managed with eye drops.'],
            ['question' => 'How often should children have eye exams?', 'answer' => 'Children should have eye exams every 1-2 years or as recommended by our specialists.']
        ],
        'testimonials' => [
            ['name' => 'Sonakshi', 'text' => 'Cataract surgery was seamless, and my vision is crystal clear now!'],
            ['name' => 'Gaurav Bhatia', 'text' => 'LASIK changed my life. No more glasses!']
        ]
    ]
];

// Get the service parameter from the URL
$service = isset($_GET['service']) ? strtolower($_GET['service']) : '';

// Check if the service exists
if (!array_key_exists($service, $services)) {
    header("Location: index.php");
    exit();
}

$serviceData = $services[$service];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($serviceData['title']); ?> - Dispnsary</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="https://demo.awaikenthemes.com/dispnsary/wp-content/uploads/2024/11/favicon.png">
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
        /* New CSS for high-contrast mode */
        .high-contrast {
            background: #000 !important;
            color: #fff !important;
        }
        .high-contrast * {
            background: #000 !important;
            color: #fff !important;
            border-color: #fff !important;
        }
        .high-contrast .bg-\[#4c63ce\] {
    background: #fff !important;
    color: #000 !important;
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
                        <!-- New high-contrast toggle button -->
                        <button onclick="toggleHighContrast()" class="text-white hover:text-gray-200" aria-label="Toggle high contrast mode">
                            <i class="fas fa-adjust"></i>
                        </button>
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
                            <a href="index.php#home">Home</a>
                        </li>
                        <li class="relative after:content-[''] after:absolute after:w-0 after:h-[2px] after:bg-[#4c63ce] after:left-0 after:bottom-0 after:transition-all after:duration-300 hover:after:w-full cursor-pointer">
                            <a href="index.php#about">About Us</a>
                        </li>
                        <li class="relative after:content-[''] after:absolute after:w-0 after:h-[2px] after:bg-[#4c63ce] after:left-0 after:bottom-0 after:transition-all after:duration-300 hover:after:w-full cursor-pointer">
                            <a href="index.php#services">Services</a>
                        </li>
                        <li class="relative after:content-[''] after:absolute after:w-0 after:h-[2px] after:bg-[#4c63ce] after:left-0 after:bottom-0 after:transition-all after:duration-300 hover:after:w-full cursor-pointer">
                            <a href="index.php#health-data">Health Stats</a>
                        </li>
                        <li class="relative after:content-[''] after:absolute after:w-0 after:h-[2px] after:bg-[#4c63ce] after:left-0 after:bottom-0 after:transition-all after:duration-300 hover:after:w-full cursor-pointer">
                            <a href="index.php#contact">Contact</a>
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
                            <li class="hover:text-[#4c63ce] cursor-pointer"><a href="index.php#home">Home</a></li>
                            <li class="hover:text-[#4c63ce] cursor-pointer"><a href="index.php#about">About Us</a></li>
                            <li class="hover:text-[#4c63ce] cursor-pointer"><a href="index.php#services">Services</a></li>
                            <li class="hover:text-[#4c63ce] cursor-pointer"><a href="index.php#health-data">Health Stats</a></li>
                            <li class="hover:text-[#4c63ce] cursor-pointer"><a href="index.php#contact">Contact</a></li>
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
            <section class="py-16">
                <div class="container mx-auto px-4 max-w-7xl">
                    <div class="text-center mb-12">
                        <h1 class="text-[#4c63ce] font-medium text-base sm:text-lg mb-4">
                            <i class="fa-solid fa-stethoscope mr-2"></i>
                            <?php echo htmlspecialchars($serviceData['title']); ?>
                        </h1>
                        <p class="text-gray-600 max-w-2xl mx-auto text-sm sm:text-base">
                            Explore our specialized <?php echo htmlspecialchars($service); ?> services, designed to meet your unique healthcare needs.
                        </p>
                    </div>
                    <!-- New Search Bar -->
                    <div class="mb-10">
    <label for="service-search" class="block text-center text-gray-800 text-base sm:text-lg font-semibold tracking-tight mb-3">
        Search Our Offerings
        <span class="block text-gray-600 text-xs sm:text-sm mt-1.5 italic">Find services like MRI, Stroke, or Ultrasound</span>
    </label>
    <div class="relative max-w-md mx-auto">
        <span class="absolute inset-y-0 left-0 flex items-center pl-4">
            <i class="fas fa-search text-[#4c63ce] text-sm sm:text-base transition-transform duration-300 group-hover:scale-110"></i>
        </span>
        <input 
            type="text" 
            id="service-search" 
            placeholder="Search MRI, Stroke, etc." 
            class="w-full border border-gray-200 rounded-xl pl-12 pr-5 py-3 text-sm sm:text-base text-gray-800 bg-gradient-to-r from-white to-[#4c63ce]/5 shadow-md focus:shadow-lg hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-[#4c63ce] focus:border-[#4c63ce] hover:border-[#4c63ce]/50 transition-all duration-300 group focus:scale-[1.02]" 
            aria-label="Search service offerings"
            title="Type to filter available services"
        >
    </div>
</div>
                    <div class="bg-white rounded-xl shadow-sm p-6 sm:p-8">
                        <div class="flex flex-col lg:flex-row gap-8">
                            <div class="lg:w-1/2">
                                <div class="bg-[#4c63ce]/10 w-16 h-16 rounded-2xl text-[#4c63ce] flex items-center justify-center mb-4">
                                    <i class="fas <?php echo htmlspecialchars($serviceData['icon']); ?> text-2xl"></i>
                                </div>
                                <!-- Updated Title with Availability Badge -->
                                <h2 class="text-2xl sm:text-3xl font-semibold text-[#0B1030] mb-4 flex items-center gap-2">
                                    <?php echo htmlspecialchars($serviceData['title']); ?>
                                    <?php
                                    $availability = $serviceData['availability'];
                                    $badgeClass = $availability === 'available' ? 'bg-green-100 text-green-700' : ($availability === 'limited' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700');
                                    $badgeText = $availability === 'available' ? 'Available Now' : ($availability === 'limited' ? 'Limited Slots' : 'Fully Booked');
                                    ?>
                                    <span class="text-xs font-medium px-2 py-1 rounded-full <?php echo $badgeClass; ?>">
                                        <?php echo $badgeText; ?>
                                    </span>
                                </h2>
                                <p class="text-gray-600 text-sm sm:text-base mb-6">
                                    <?php echo htmlspecialchars($serviceData['description']); ?>
                                </p>
                                <a href="booknow.php" class="bg-[#4c63ce] text-white font-medium px-6 py-3 rounded-full hover:bg-[#3b4fa3] transition-colors inline-flex items-center gap-2">
                                    <span>Book Appointment</span>
                                    <i class="fas fa-calendar-check"></i>
                                </a>
                                <img src="<?php echo htmlspecialchars($serviceData['image'] ?: 'images/fallback.jpg'); ?>" alt="<?php echo htmlspecialchars($serviceData['title']); ?>" class="w-full h-64 sm:h-64 object-cover rounded-xl mt-6 border-2 border-blue-200 shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="lg:w-1/2">
                                <h3 class="text-xl font-semibold text-[#0B1030] mb-4">What We Offer</h3>
                                <!-- Updated Offerings with Data Attribute for Search -->
                                <ul class="space-y-3" id="offerings-list">
                                    <?php foreach ($serviceData['offerings'] as $offering): ?>
                                        <li class="flex items-center gap-3 group hover:bg-gray-100 hover:px-4 hover:scale-[1.02] hover:shadow-sm transition-all duration-300 ease-in-out rounded-lg" data-offering="<?php echo htmlspecialchars(strtolower($offering)); ?>">
                                            <i class="fas fa-check-circle text-[#4c63ce] group-hover:text-blue-700"></i>
                                            <span class="text-gray-600"><?php echo htmlspecialchars($offering); ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <h3 class="text-xl font-semibold text-[#0B1030] mt-6 mb-4">Why Choose Us</h3>
                                <p class="text-gray-600 text-sm sm:text-base">
                                    <?php echo htmlspecialchars($serviceData['why_choose_us']); ?>
                                </p>
                                <!-- New FAQ Accordion -->
                                <h3 class="text-xl font-semibold text-[#0B1030] mt-6 mb-4">Frequently Asked Questions</h3>
                                <div class="space-y-3">
    <?php foreach ($serviceData['faqs'] as $index => $faq): ?>
        <div class="border border-gray-200 rounded-xl bg-white shadow-sm hover:shadow-md transition-shadow duration-300">
            <button class="w-full text-left px-5 py-4 flex justify-between items-center text-gray-800 bg-gradient-to-r from-white to-gray-50 hover:from-[#4c63ce]/5 hover:to-gray-100 rounded-xl transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-[#4c63ce] focus:ring-offset-2" onclick="toggleFAQ(<?php echo $index; ?>)" onkeydown="if(event.key === 'Enter' || event.key === ' ') toggleFAQ(<?php echo $index; ?>)" aria-expanded="false" aria-controls="faq-answer-<?php echo $index; ?>">
                <span class="text-base sm:text-lg font-semibold tracking-tight"><?php echo htmlspecialchars($faq['question']); ?></span>
                <i class="fas fa-chevron-down text-[#4c63ce] text-sm sm:text-base transition-transform duration-300" id="faq-icon-<?php echo $index; ?>"></i>
            </button>
            <div class="hidden px-5 py-4 text-gray-600 text-sm sm:text-base bg-gray-50 rounded-b-xl border-t border-gray-200" id="faq-answer-<?php echo $index; ?>">
                <?php echo htmlspecialchars($faq['answer']); ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
                            </div>
                        </div>
                    </div>
                    <!-- New Testimonial Carousel -->
                    <div class="mt-12">
                        <h3 class="text-xl font-semibold text-[#0B1030] mb-4 text-center">Patient Testimonials</h3>
                        <div class="relative">
                            <div class="overflow-hidden">
                                <div class="flex transition-transform duration-500" id="testimonial-carousel">
                                    <?php foreach ($serviceData['testimonials'] as $testimonial): ?>
                                        <div class="min-w-full p-4">
                                            <div class="bg-gray-50 rounded-lg p-6 text-center">
                                                <p class="text-gray-600 italic mb-4">"<?php echo htmlspecialchars($testimonial['text']); ?>"</p>
                                                <p class="text-[#4c63ce] font-medium"><?php echo htmlspecialchars($testimonial['name']); ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <button onclick="prevTestimonial()" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-[#4c63ce] text-white p-2 rounded-full">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button onclick="nextTestimonial()" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-[#4c63ce] text-white p-2 rounded-full">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
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

                // New JavaScript Functions
                // FAQ Toggle
                function toggleFAQ(index) {
                    const answer = document.getElementById(`faq-answer-${index}`);
                    const icon = document.getElementById(`faq-icon-${index}`);
                    const button = answer.previousElementSibling;
                    const isOpen = !answer.classList.contains('hidden');
                    document.querySelectorAll('[id^="faq-answer-"]').forEach(el => el.classList.add('hidden'));
                    document.querySelectorAll('[id^="faq-icon-"]').forEach(el => el.classList.remove('rotate-180'));
                    document.querySelectorAll('[aria-controls^="faq-answer-"]').forEach(el => el.setAttribute('aria-expanded', 'false'));
                    if (!isOpen) {
                        answer.classList.remove('hidden');
                        icon.classList.add('rotate-180');
                        button.setAttribute('aria-expanded', 'true');
                    }
                }

                // Search Filter
                document.getElementById('service-search').addEventListener('input', function(e) {
                    const searchTerm = e.target.value.toLowerCase();
                    const offerings = document.querySelectorAll('#offerings-list li');
                    offerings.forEach(item => {
                        const offeringText = item.dataset.offering.toLowerCase();
                        item.classList.toggle('hidden', !offeringText.includes(searchTerm));
                    });
                });

                // Testimonial Carousel
                let currentTestimonial = 0;
                function nextTestimonial() {
                    const carousel = document.getElementById('testimonial-carousel');
                    const total = <?php echo count($serviceData['testimonials']); ?>;
                    currentTestimonial = (currentTestimonial + 1) % total;
                    carousel.style.transform = `translateX(-${currentTestimonial * 100}%)`;
                }
                function prevTestimonial() {
                    const carousel = document.getElementById('testimonial-carousel');
                    const total = <?php echo count($serviceData['testimonials']); ?>;
                    currentTestimonial = (currentTestimonial - 1 + total) % total;
                    carousel.style.transform = `translateX(-${currentTestimonial * 100}%)`;
                }

                // High Contrast Toggle
                function toggleHighContrast() {
                    document.body.classList.toggle('high-contrast');
                }
            </script>
        </body>
    </html>