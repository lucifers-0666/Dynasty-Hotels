<?php
// Get current page for active navigation
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynasty Hotels - Luxury Living, Unmatched Comfort</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream: {
                            50: '#FAF8F3',
                            100: '#F5F3ED',
                            200: '#E8E4DC',
                        },
                        gold: {
                            500: '#D4AF37',
                            600: '#C9A961',
                        },
                        brown: {
                            700: '#5D4037',
                            800: '#4E342E',
                            900: '#3E2723',
                        }
                    },
                    fontFamily: {
                        'display': ['Playfair Display', 'serif'],
                        'sans': ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        /* Scroll Progress Indicator */
        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 1px;
            background: #D4AF37;
            z-index: 9999;
            transition: width 0.1s ease;
        }
        
        /* Logo Enhancement */
        .logo-text {
            position: relative;
            transition: all 0.3s ease;
        }
        .logo-underline {
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #D4AF37, transparent);
            margin: 5px auto 0;
            animation: shimmer 3s infinite;
        }
        @keyframes shimmer {
            0%, 100% { opacity: 0.5; transform: translateX(-10px); }
            50% { opacity: 1; transform: translateX(10px); }
        }
        .logo-text:hover .logo-underline {
            animation: shimmer 1s infinite;
        }
        
        /* Navigation Links */
        .nav-link {
            position: relative;
            text-transform: uppercase;
            font-size: 14px;
            letter-spacing: 1px;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 50%;
            width: 0;
            height: 2px;
            background: #D4AF37;
            transform: translateX(-50%);
            transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        
        /* Dropdown Menus */
        .dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .dropdown-menu {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }
        
        /* Book Now Button Animation */
        @keyframes pulse-button {
            0%, 100% { transform: scale(1); box-shadow: 0 2px 8px rgba(212,175,55,0.3); }
            50% { transform: scale(1.02); box-shadow: 0 4px 12px rgba(212,175,55,0.4); }
        }
        .book-btn {
            animation: pulse-button 3s infinite;
        }
        .book-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(212,175,55,0.4);
        }
        
        /* Search Bar Enhancement */
        .search-container {
            position: relative;
        }
        .search-input {
            width: 0;
            opacity: 0;
            transition: all 0.3s ease;
        }
        .search-expanded {
            width: 300px !important;
            opacity: 1 !important;
        }
        
        /* Sticky Header Behavior */
        .main-header {
            transition: all 0.3s ease;
        }
        .main-header.scrolled {
            height: 55px !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            backdrop-filter: blur(10px);
        }
        .main-header.scrolled .logo-text {
            transform: scale(0.9);
        }
        
        /* Mobile Menu */
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .mobile-menu.active {
            transform: translateX(0);
        }
    </style>
</head>
<body class="bg-cream-50 font-sans">

<!-- Scroll Progress Indicator -->
<div class="scroll-progress" id="scrollProgress"></div>

<!-- Top Contact Bar -->
<div class="bg-brown-900 text-cream-50 h-10" style="background: #3E2723;">
    <div class="max-w-7xl mx-auto px-6 h-full flex items-center justify-between text-xs">
        <!-- Left: Contact Info -->
        <div class="flex items-center gap-6">
            <a href="tel:+1234567890" class="flex items-center gap-2 hover:text-gold-500 transition-colors">
                <i data-lucide="phone" class="w-3 h-3"></i>
                <span>+1 (234) 567-8900</span>
            </a>
            <a href="mailto:info@dynastyhotels.com" class="flex items-center gap-2 hover:text-gold-500 transition-colors">
                <i data-lucide="mail" class="w-3 h-3"></i>
                <span>info@dynastyhotels.com</span>
            </a>
        </div>
        
        <!-- Center: Tagline -->
        <div class="hidden lg:block font-display italic text-sm" style="color: #D4AF37;">
            Luxury Living, Unmatched Comfort
        </div>
        
        <!-- Right: Language, Currency, Social -->
        <div class="flex items-center gap-4">
            <!-- Language Selector -->
            <div class="flex items-center gap-1 cursor-pointer hover:text-gold-500 transition-colors">
                <span>🇺🇸</span>
                <span>EN</span>
                <i data-lucide="chevron-down" class="w-3 h-3"></i>
            </div>
            
            <!-- Currency Selector -->
            <div class="flex items-center gap-1 cursor-pointer hover:text-gold-500 transition-colors">
                <span>USD</span>
                <i data-lucide="chevron-down" class="w-3 h-3"></i>
            </div>
            
            <!-- Social Media Icons -->
            <div class="hidden md:flex items-center gap-3 ml-2">
                <a href="#" class="hover:text-gold-500 transition-colors" aria-label="Facebook">
                    <i data-lucide="facebook" class="w-3 h-3"></i>
                </a>
                <a href="#" class="hover:text-gold-500 transition-colors" aria-label="Instagram">
                    <i data-lucide="instagram" class="w-3 h-3"></i>
                </a>
                <a href="#" class="hover:text-gold-500 transition-colors" aria-label="Twitter">
                    <i data-lucide="twitter" class="w-3 h-3"></i>
                </a>
                <a href="#" class="hover:text-gold-500 transition-colors" aria-label="YouTube">
                    <i data-lucide="youtube" class="w-3 h-3"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Main Header -->
<header class="main-header bg-cream-50 sticky top-0 z-40 shadow-sm" style="height: 75px; padding-left: 40px;">
    <div class="max-w-7xl mx-auto h-full flex items-center justify-between">
        
        <!-- Logo -->
        <a href="index.php" class="logo-text flex flex-col">
            <div class="font-display text-3xl font-bold tracking-wider" style="color: #5D4037; letter-spacing: 0.15em;">
                DYNASTY
            </div>
            <div class="font-sans text-xs tracking-widest" style="color: #D4AF37; margin-top: -5px;">
                HOTELS
            </div>
            <div class="logo-underline"></div>
        </a>
        
        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center" style="gap: 40px;">
            <a href="index.php" class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?> text-brown-700 hover:text-gold-500">Home</a>
            
            <div class="dropdown relative">
                <a href="room.php" class="nav-link <?php echo ($current_page == 'room.php') ? 'active' : ''; ?> flex items-center gap-1 text-brown-700 hover:text-gold-500">
                    <span>Accommodations</span>
                    <i data-lucide="chevron-down" class="w-3 h-3"></i>
                </a>
                <div class="dropdown-menu absolute top-full left-0 mt-2 bg-white rounded-lg shadow-xl p-4 w-56 z-50">
                    <a href="room.php?type=suite" class="block px-4 py-2.5 text-sm text-brown-700 hover:bg-cream-100 hover:text-gold-500 rounded transition-all">Luxury Suites</a>
                    <a href="room.php?type=premium" class="block px-4 py-2.5 text-sm text-brown-700 hover:bg-cream-100 hover:text-gold-500 rounded transition-all">Premium Rooms</a>
                    <a href="room.php?type=penthouse" class="block px-4 py-2.5 text-sm text-brown-700 hover:bg-cream-100 hover:text-gold-500 rounded transition-all">Royal Penthouses</a>
                </div>
            </div>
            
            <a href="food.php" class="nav-link <?php echo ($current_page == 'food.php') ? 'active' : ''; ?> text-brown-700 hover:text-gold-500">Dining</a>
            
            <div class="dropdown relative">
                <a href="#spa" class="nav-link flex items-center gap-1 text-brown-700 hover:text-gold-500">
                    <span>Spa & Wellness</span>
                    <i data-lucide="chevron-down" class="w-3 h-3"></i>
                </a>
                <div class="dropdown-menu absolute top-full left-0 mt-2 bg-white rounded-lg shadow-xl p-4 w-56 z-50">
                    <a href="#spa-services" class="block px-4 py-2.5 text-sm text-brown-700 hover:bg-cream-100 hover:text-gold-500 rounded transition-all">Spa Services</a>
                    <a href="#fitness" class="block px-4 py-2.5 text-sm text-brown-700 hover:bg-cream-100 hover:text-gold-500 rounded transition-all">Fitness Center</a>
                    <a href="#yoga" class="block px-4 py-2.5 text-sm text-brown-700 hover:bg-cream-100 hover:text-gold-500 rounded transition-all">Yoga & Meditation</a>
                </div>
            </div>
            
            <div class="dropdown relative">
                <a href="wedding.php" class="nav-link <?php echo ($current_page == 'wedding.php') ? 'active' : ''; ?> flex items-center gap-1 text-brown-700 hover:text-gold-500">
                    <span>Events</span>
                    <i data-lucide="chevron-down" class="w-3 h-3"></i>
                </a>
                <div class="dropdown-menu absolute top-full left-0 mt-2 bg-white rounded-lg shadow-xl p-4 w-56 z-50">
                    <a href="wedding.php" class="block px-4 py-2.5 text-sm text-brown-700 hover:bg-cream-100 hover:text-gold-500 rounded transition-all">Weddings</a>
                    <a href="#conferences" class="block px-4 py-2.5 text-sm text-brown-700 hover:bg-cream-100 hover:text-gold-500 rounded transition-all">Conferences</a>
                    <a href="#private-events" class="block px-4 py-2.5 text-sm text-brown-700 hover:bg-cream-100 hover:text-gold-500 rounded transition-all">Private Events</a>
                </div>
            </div>
            
            <div class="dropdown relative">
                <a href="#gallery" class="nav-link flex items-center gap-1 text-brown-700 hover:text-gold-500">
                    <span>Gallery</span>
                    <i data-lucide="chevron-down" class="w-3 h-3"></i>
                </a>
                <div class="dropdown-menu absolute top-full left-0 mt-2 bg-white rounded-lg shadow-xl p-4 w-56 z-50">
                    <a href="#photos" class="block px-4 py-2.5 text-sm text-brown-700 hover:bg-cream-100 hover:text-gold-500 rounded transition-all">Photo Gallery</a>
                    <a href="#reviews" class="block px-4 py-2.5 text-sm text-brown-700 hover:bg-cream-100 hover:text-gold-500 rounded transition-all">Guest Reviews</a>
                    <a href="#virtual-tour" class="block px-4 py-2.5 text-sm text-brown-700 hover:bg-cream-100 hover:text-gold-500 rounded transition-all">Virtual Tour</a>
                </div>
            </div>
            
            <a href="about_us.php" class="nav-link <?php echo ($current_page == 'about_us.php') ? 'active' : ''; ?> text-brown-700 hover:text-gold-500">About</a>
        </nav>
        
        <!-- Right Side Actions -->
        <div class="flex items-center" style="gap: 15px;">
            <!-- Search Icon -->
            <button id="searchToggle" class="w-9 h-9 flex items-center justify-center text-brown-700 hover:text-gold-500 transition-colors" aria-label="Search">
                <i data-lucide="search" class="w-5 h-5"></i>
            </button>
            
            <!-- Search Input (Hidden) -->
            <input type="text" id="searchInput" placeholder="Search..." class="search-input h-9 px-4 border border-gold-500 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-gold-500" />
            
            <!-- User Account Icon -->
            <a href="login.php" class="w-7 h-7 rounded-full flex items-center justify-center text-white hover:bg-gold-600 transition-colors" style="background: #D4AF37;" aria-label="Account">
                <i data-lucide="user" class="w-4 h-4"></i>
            </a>
            
            <!-- Book Now Button -->
            <a href="Booking.php" class="book-btn hidden lg:flex items-center gap-2 px-6 py-2.5 rounded-full text-white font-semibold shadow-lg transition-all" style="background: #D4AF37;">
                <i data-lucide="calendar" class="w-4 h-4"></i>
                <span>BOOK NOW</span>
            </a>
            
            <!-- Mobile Menu Toggle -->
            <button id="mobileMenuToggle" class="lg:hidden w-9 h-9 flex items-center justify-center text-brown-700" aria-label="Menu">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Menu Overlay -->
<div id="mobileMenu" class="mobile-menu fixed top-0 right-0 w-full h-screen bg-cream-100/98 backdrop-blur-md z-50 lg:hidden">
    <div class="flex flex-col h-full">
        <!-- Mobile Menu Header -->
        <div class="flex justify-between items-center p-6 border-b-2 border-gold-500">
            <div class="logo-text flex flex-col items-center">
                <div class="font-display text-2xl font-bold tracking-wider" style="color: #5D4037; letter-spacing: 0.15em;">DYNASTY</div>
                <div class="font-sans text-xs tracking-widest" style="color: #D4AF37; margin-top: -3px;">HOTELS</div>
            </div>
            <button id="closeMobileMenu" class="text-brown-700 hover:text-gold-500 transition-colors">
                <i data-lucide="x" class="w-8 h-8"></i>
            </button>
        </div>
        
        <!-- Mobile Menu Navigation -->
        <nav class="flex-1 flex flex-col items-center justify-center space-y-6 text-center overflow-y-auto py-8">
            <div class="w-20 h-0.5 bg-gold-500 mb-4"></div>
            <a href="index.php" class="text-2xl font-semibold text-brown-700 hover:text-gold-500 transition-colors uppercase tracking-wider">Home</a>
            <div class="w-20 h-0.5 bg-gold-500"></div>
            <a href="room.php" class="text-2xl font-semibold text-brown-700 hover:text-gold-500 transition-colors uppercase tracking-wider">Accommodations</a>
            <div class="w-20 h-0.5 bg-gold-500"></div>
            <a href="food.php" class="text-2xl font-semibold text-brown-700 hover:text-gold-500 transition-colors uppercase tracking-wider">Dining</a>
            <div class="w-20 h-0.5 bg-gold-500"></div>
            <a href="#" class="text-2xl font-semibold text-brown-700 hover:text-gold-500 transition-colors uppercase tracking-wider">Spa & Wellness</a>
            <div class="w-20 h-0.5 bg-gold-500"></div>
            <a href="wedding.php" class="text-2xl font-semibold text-brown-700 hover:text-gold-500 transition-colors uppercase tracking-wider">Events</a>
            <div class="w-20 h-0.5 bg-gold-500"></div>
            <a href="#" class="text-2xl font-semibold text-brown-700 hover:text-gold-500 transition-colors uppercase tracking-wider">Gallery</a>
            <div class="w-20 h-0.5 bg-gold-500"></div>
            <a href="about_us.php" class="text-2xl font-semibold text-brown-700 hover:text-gold-500 transition-colors uppercase tracking-wider">About</a>
            <div class="w-20 h-0.5 bg-gold-500 mt-4"></div>
            
            <!-- Mobile Book Now Button -->
            <a href="Booking.php" class="mt-6 flex items-center gap-2 px-8 py-4 rounded-full text-white font-semibold shadow-lg text-xl" style="background: #D4AF37;">
                <i data-lucide="calendar" class="w-5 h-5"></i>
                <span>BOOK NOW</span>
            </a>
        </nav>
        
        <!-- Mobile Menu Footer -->
        <div class="p-6 border-t border-cream-300 flex justify-center gap-6">
            <a href="#" class="text-brown-700 hover:text-gold-500 transition-colors">
                <i data-lucide="facebook" class="w-6 h-6"></i>
            </a>
            <a href="#" class="text-brown-700 hover:text-gold-500 transition-colors">
                <i data-lucide="instagram" class="w-6 h-6"></i>
            </a>
            <a href="#" class="text-brown-700 hover:text-gold-500 transition-colors">
                <i data-lucide="twitter" class="w-6 h-6"></i>
            </a>
            <a href="#" class="text-brown-700 hover:text-gold-500 transition-colors">
                <i data-lucide="youtube" class="w-6 h-6"></i>
            </a>
        </div>
    </div>
</div>

<script>
    // Scroll Progress Bar
    window.addEventListener('scroll', () => {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        document.getElementById('scrollProgress').style.width = scrolled + '%';
    });
    
    // Sticky Header
    const header = document.querySelector('.main-header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
    
    // Search Toggle
    const searchToggle = document.getElementById('searchToggle');
    const searchInput = document.getElementById('searchInput');
    
    searchToggle.addEventListener('click', () => {
        searchInput.classList.toggle('search-expanded');
        if (searchInput.classList.contains('search-expanded')) {
            searchInput.focus();
        }
    });
    
    // Close search on outside click
    document.addEventListener('click', (e) => {
        if (!searchToggle.contains(e.target) && !searchInput.contains(e.target)) {
            searchInput.classList.remove('search-expanded');
        }
    });
    
    // Mobile Menu
    const mobileMenuToggle = document.getElementById('mobileMenuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const closeMobileMenu = document.getElementById('closeMobileMenu');
    
    mobileMenuToggle.addEventListener('click', () => {
        mobileMenu.classList.add('active');
        document.body.style.overflow = 'hidden';
    });
    
    closeMobileMenu.addEventListener('click', () => {
        mobileMenu.classList.remove('active');
        document.body.style.overflow = '';
    });
    
    // Close menu on link click
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            document.body.style.overflow = '';
        });
    });
    
    // Initialize Lucide Icons
    lucide.createIcons();
</script>
