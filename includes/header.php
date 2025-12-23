<?php
// Get current page for active navigation
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dynasty Hotel - Experience 2025's pinnacle of luxury hospitality in Hyderabad. Book your premium stay today.">
    <meta name="theme-color" content="#1A4D3E">
    <title>Dynasty Hotels - Luxury Living, Unmatched Comfort</title>
    
    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.tailwindcss.com">
    <link rel="preconnect" href="https://unpkg.com">
    
    <!-- Critical CSS Inline -->
    <style>
      /* Critical above-the-fold styles */
      * { margin: 0; padding: 0; box-sizing: border-box; }
      body { font-family: 'Poppins', sans-serif; background: #F7F3ED; color: #3A2F26; }
      img { max-width: 100%; height: auto; }
      /* Skip to main content link */
      .skip-to-main { position: absolute; left: -9999px; z-index: 9999; padding: 16px 24px; background: #1A4D3E; color: #ffffff; text-decoration: none; font-weight: 600; border-radius: 8px; }
      .skip-to-main:focus { left: 20px; top: 20px; outline: 3px solid #C9A96E; outline-offset: 3px; }
    </style>
    
    <!-- Fonts with font-display swap -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    
    <!-- Deferred Scripts -->
    <script src="https://cdn.tailwindcss.com" defer></script>
    <script src="https://unpkg.com/lucide@latest" defer></script>
    
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
    
    <!-- Critical CSS Inline -->
    <style>
        /* Critical above-the-fold styles */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #F7F3ED; color: #3A2F26; }
        img { max-width: 100%; height: auto; }
        
        /* Skip to main content link for accessibility */
        .skip-to-main { 
            position: absolute; 
            left: -9999px; 
            z-index: 9999; 
            padding: 16px 24px; 
            background: #1A4D3E; 
            color: #ffffff; 
            text-decoration: none; 
            font-weight: 600; 
            border-radius: 8px;
            font-size: 16px;
        }
        .skip-to-main:focus { 
            left: 20px; 
            top: 20px; 
            outline: 3px solid #C9A96E; 
            outline-offset: 3px; 
        }
        
        /* Scroll Progress Indicator */
        .scroll-progress {
            position: fixed;
            top: 0;
            left: 0;
            height: 1px;
            background: #C9A96E;
            z-index: 9999;
            transition: width 0.1s ease;
        }

        /* Glassmorphism Main Header */
        .main-header {
            transition: all 0.3s ease;
            background: rgba(247, 243, 237, 0.85); /* #F7F3ED */
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.04);
            border-bottom: 1px solid rgba(58, 47, 38, 0.08);
        }
        .main-header.scrolled {
            height: 60px !important;
        }
        
        /* Global Focus Styles for Accessibility */
        a:focus, button:focus, input:focus, textarea:focus, select:focus, [tabindex]:focus {
            outline: 3px solid #C9A96E;
            outline-offset: 3px;
        }
        
        /* Ensure sufficient contrast for all text */
        .nav-link { color: #3A2F26; } /* 4.5:1 contrast on #F7F3ED */
        
        /* Reduced Motion Support */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }

        /* Logo */
        .logo-text {
            position: relative;
            transition: all 0.3s ease;
        }
        .logo-text .brand {
            font-size: 28px;
            font-weight: 700;
            color: #3A2F26;
            letter-spacing: -0.5px;
            line-height: 1;
        }
        .logo-underline {
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, transparent, #C9A96E, transparent);
            margin: 6px 0 0 0;
        }

        /* Navigation Links */
        .nav-link {
            position: relative;
            font-size: 15px;
            font-weight: 500;
            color: #3A2F26;
            transition: color 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 0%;
            height: 2px;
            background: #C9A96E;
            transition: width 280ms cubic-bezier(0.4, 0, 0.2, 1);
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

        /* Search Bar Enhancement */
        .search-container { position: relative; }
        .search-input { width: 0; opacity: 0; transition: all 0.3s ease; }
        .search-expanded { width: 300px !important; opacity: 1 !important; }

        /* Header shrink on scroll */
        .main-header.scrolled .logo-text { transform: scale(0.95); }

        /* Mobile Menu Panel */
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            background: rgba(255, 255, 255, 0.75);
        }
        .mobile-menu.active { transform: translateX(0); }

        /* Hamburger icon */
        .hamburger { width: 24px; height: 24px; display: inline-flex; flex-direction: column; justify-content: center; gap: 5px; }
        .hamburger span { display: block; width: 24px; height: 2px; background: #3A2F26; border-radius: 2px; transition: transform 300ms ease, opacity 300ms ease; }
        .hamburger.active span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
        .hamburger.active span:nth-child(2) { opacity: 0; }
        .hamburger.active span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

        /* Header CTA Button */
        .header-cta {
            background: #1A4D3E;
            color: #ffffff;
            padding: 12px 28px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            transition: transform 320ms ease, box-shadow 320ms ease, background 320ms ease;
        }
        .header-cta:hover { transform: scale(1.04); background: #236F56; box-shadow: 0 6px 20px rgba(26, 77, 62, 0.25); }
    </style>
</head>
<body class=\"bg-cream-50 font-sans\">

<!-- Skip to Main Content for Accessibility -->
<a href=\"#main-content\" class=\"skip-to-main\">Skip to main content</a>

<!-- Scroll Progress Indicator -->
<div class=\"scroll-progress\" id=\"scrollProgress\"></div>

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
<header class="main-header sticky top-0 z-1000" style="height: 75px; padding-left: 40px;">
    <div class="max-w-7xl mx-auto h-full flex items-center justify-between">
        
        <!-- Logo -->
        <a href="index.php" class="logo-text flex flex-col">
            <div class="brand">Dynasty Hotel</div>
            <div class="logo-underline"></div>
        </a>
        
        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center" style="gap: 40px;">
            <a href="index.php" class="nav-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Home</a>
            
            <div class="dropdown relative">
                <a href="room.php" class="nav-link <?php echo ($current_page == 'room.php') ? 'active' : ''; ?> flex items-center gap-1">
                    <span>Accommodations</span>
                    <i data-lucide="chevron-down" class="w-3 h-3"></i>
                </a>
                <div class="dropdown-menu absolute top-full left-0 mt-2 bg-white rounded-lg shadow-xl p-4 w-56 z-50">
                    <a href="room.php?type=suite" class="block px-4 py-2.5 text-sm text-[#3A2F26] hover:bg-[#F7F3ED] hover:text-[#2C5F4F] rounded transition-all">Luxury Suites</a>
                    <a href="room.php?type=premium" class="block px-4 py-2.5 text-sm text-[#3A2F26] hover:bg-[#F7F3ED] hover:text-[#2C5F4F] rounded transition-all">Premium Rooms</a>
                    <a href="room.php?type=penthouse" class="block px-4 py-2.5 text-sm text-[#3A2F26] hover:bg-[#F7F3ED] hover:text-[#2C5F4F] rounded transition-all">Royal Penthouses</a>
                </div>
            </div>
            
            <a href="food.php" class="nav-link <?php echo ($current_page == 'food.php') ? 'active' : ''; ?>">Dining</a>
            
            <div class="dropdown relative">
                <a href="#spa" class="nav-link flex items-center gap-1">
                    <span>Spa & Wellness</span>
                    <i data-lucide="chevron-down" class="w-3 h-3"></i>
                </a>
                <div class="dropdown-menu absolute top-full left-0 mt-2 bg-white rounded-lg shadow-xl p-4 w-56 z-50">
                    <a href="#spa-services" class="block px-4 py-2.5 text-sm text-[#3A2F26] hover:bg-[#F7F3ED] hover:text-[#2C5F4F] rounded transition-all">Spa Services</a>
                    <a href="#fitness" class="block px-4 py-2.5 text-sm text-[#3A2F26] hover:bg-[#F7F3ED] hover:text-[#2C5F4F] rounded transition-all">Fitness Center</a>
                    <a href="#yoga" class="block px-4 py-2.5 text-sm text-[#3A2F26] hover:bg-[#F7F3ED] hover:text-[#2C5F4F] rounded transition-all">Yoga & Meditation</a>
                </div>
            </div>
            
            <div class="dropdown relative">
                <a href="wedding.php" class="nav-link <?php echo ($current_page == 'wedding.php') ? 'active' : ''; ?> flex items-center gap-1">
                    <span>Events</span>
                    <i data-lucide="chevron-down" class="w-3 h-3"></i>
                </a>
                <div class="dropdown-menu absolute top-full left-0 mt-2 bg-white rounded-lg shadow-xl p-4 w-56 z-50">
                    <a href="wedding.php" class="block px-4 py-2.5 text-sm text-[#3A2F26] hover:bg-[#F7F3ED] hover:text-[#2C5F4F] rounded transition-all">Weddings</a>
                    <a href="#conferences" class="block px-4 py-2.5 text-sm text-[#3A2F26] hover:bg-[#F7F3ED] hover:text-[#2C5F4F] rounded transition-all">Conferences</a>
                    <a href="#private-events" class="block px-4 py-2.5 text-sm text-[#3A2F26] hover:bg-[#F7F3ED] hover:text-[#2C5F4F] rounded transition-all">Private Events</a>
                </div>
            </div>
            
            <div class="dropdown relative">
                <a href="#gallery" class="nav-link flex items-center gap-1">
                    <span>Gallery</span>
                    <i data-lucide="chevron-down" class="w-3 h-3"></i>
                </a>
                <div class="dropdown-menu absolute top-full left-0 mt-2 bg-white rounded-lg shadow-xl p-4 w-56 z-50">
                    <a href="#photos" class="block px-4 py-2.5 text-sm text-[#3A2F26] hover:bg-[#F7F3ED] hover:text-[#2C5F4F] rounded transition-all">Photo Gallery</a>
                    <a href="#reviews" class="block px-4 py-2.5 text-sm text-[#3A2F26] hover:bg-[#F7F3ED] hover:text-[#2C5F4F] rounded transition-all">Guest Reviews</a>
                    <a href="#virtual-tour" class="block px-4 py-2.5 text-sm text-[#3A2F26] hover:bg-[#F7F3ED] hover:text-[#2C5F4F] rounded transition-all">Virtual Tour</a>
                </div>
            </div>
            
            <a href="about_us.php" class="nav-link <?php echo ($current_page == 'about_us.php') ? 'active' : ''; ?>">About</a>
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
            <a href="Booking.php" class="header-cta hidden lg:flex items-center gap-2">
                <span>Book Now</span>
            </a>
            
            <!-- Mobile Menu Toggle -->
            <button id="mobileMenuToggle" class="lg:hidden hamburger" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Menu Overlay -->
<div id="mobileMenu" class="mobile-menu fixed top-0 right-0 w-full h-screen z-50 lg:hidden">
    <div class="flex flex-col h-full">
        <!-- Mobile Menu Header -->
        <div class="flex justify-between items-center p-6 border-b-2 border-gold-500">
            <div class="logo-text flex flex-col items-center">
                <div class="brand">Dynasty Hotel</div>
                <div class="logo-underline"></div>
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
            <a href="Booking.php" class="mt-6 header-cta text-xl">
                <span>Book Now</span>
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
        mobileMenuToggle.classList.toggle('active');
        document.body.style.overflow = 'hidden';
    });
    
    closeMobileMenu.addEventListener('click', () => {
        mobileMenu.classList.remove('active');
        mobileMenuToggle.classList.remove('active');
        document.body.style.overflow = '';
    });
    
    // Close menu on link click
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            mobileMenuToggle.classList.remove('active');
            document.body.style.overflow = '';
        });
    });
    
    // Initialize Lucide Icons
    lucide.createIcons();
</script>
