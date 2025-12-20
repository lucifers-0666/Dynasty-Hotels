<style>
    /* Footer Link Hover Effects */
    .footer-link {
        position: relative;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
    }
    .footer-link::before {
        content: '→';
        position: absolute;
        left: -20px;
        opacity: 0;
        transform: translateX(-5px);
        transition: all 0.3s ease;
        color: #D4AF37;
    }
    .footer-link:hover::before {
        opacity: 1;
        transform: translateX(0);
    }
    .footer-link:hover {
        transform: translateX(5px);
        color: #D4AF37;
    }
    .footer-link::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 1px;
        background: #D4AF37;
        transition: width 0.3s ease;
    }
    .footer-link:hover::after {
        width: 100%;
    }
    
    /* Social Icon Enhancement */
    .social-icon {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        border: 1px solid rgba(250,248,243,0.3);
        background: transparent;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        color: #E8E4DC;
    }
    .social-icon:hover {
        background: #D4AF37;
        color: white;
        transform: scale(1.15) rotate(5deg);
        border-color: #D4AF37;
        box-shadow: 0 4px 12px rgba(212,175,55,0.3);
    }
    
    /* Trust Badges */
    .trust-badge {
        filter: grayscale(100%);
        opacity: 0.6;
        transition: all 0.3s ease;
    }
    .trust-badge:hover {
        filter: grayscale(0%);
        opacity: 1;
        transform: scale(1.1);
    }
    
    /* Back to Top Button */
    .back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 55px;
        height: 55px;
        background: #D4AF37;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transition: all 0.4s ease;
        z-index: 1000;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(212,175,55,0.3);
    }
    .back-to-top.visible {
        opacity: 1;
        visibility: visible;
    }
    .back-to-top:hover {
        background: #C9A961;
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(212,175,55,0.5);
    }
    
    /* Newsletter Form */
    .newsletter-input {
        border-radius: 25px;
        background: #FAF8F3;
        border: 2px solid transparent;
        padding: 12px 60px 12px 24px;
        width: 100%;
        transition: all 0.3s ease;
    }
    .newsletter-input:focus {
        outline: none;
        border-color: #D4AF37;
        box-shadow: 0 0 0 3px rgba(212,175,55,0.1);
    }
    .newsletter-btn {
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        width: 42px;
        height: 42px;
        background: #D4AF37;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        cursor: pointer;
        border: none;
    }
    .newsletter-btn:hover {
        background: #C9A961;
        transform: translateY(-50%) scale(1.1);
    }
    
    /* Column Dividers */
    .column-divider {
        position: absolute;
        right: 0;
        top: 20%;
        height: 60%;
        width: 1px;
        background: rgba(250,248,243,0.15);
    }
    
    /* Footer Background */
    .footer-bg {
        background: linear-gradient(180deg, #3E2723 0%, #2C1B15 100%);
        position: relative;
    }
    
    /* Column Heading */
    .column-heading {
        position: relative;
        padding-bottom: 15px;
    }
    .column-heading::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 30px;
        height: 2px;
        background: #D4AF37;
    }
    
    /* Payment Icons */
    .payment-icon {
        transition: all 0.3s ease;
    }
    .payment-icon:hover {
        transform: scale(1.1) translateY(-2px);
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .footer-animate {
        animation: fadeInUp 0.6s ease forwards;
    }
</style>

<!-- Footer -->
<footer class="footer-bg text-cream-200" role="contentinfo">
    <!-- Main Footer Content -->
    <div class="max-w-7xl mx-auto px-12 py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12" style="gap: 50px;">
            
            <!-- Column 1 - About (35% = 4 cols) -->
            <div class="lg:col-span-4 footer-animate relative" style="animation-delay: 0.1s">
                <div class="mb-6">
                    <h3 class="font-display text-3xl text-cream-50 mb-2 tracking-wider">DYNASTY</h3>
                    <p class="text-gold-500 italic text-sm">HOTELS</p>
                    <div class="w-16 h-0.5 mx-0 mt-4 mb-6" style="background: linear-gradient(90deg, #D4AF37, transparent); width: 60px;"></div>
                </div>
                <p class="text-sm leading-relaxed" style="color: #E8E4DC;">
                    Experience unparalleled luxury and award-winning hospitality at Dynasty Hotels.
                </p>
                <div class="column-divider hidden lg:block"></div>
            </div>
            
            <!-- Column 2 - Explore (20% = 2 cols) -->
            <div class="lg:col-span-2 footer-animate relative" style="animation-delay: 0.2s">
                <h4 class="column-heading text-cream-50 font-semibold uppercase mb-6" style="letter-spacing: 1.5px; font-size: 16px; font-weight: 600;">EXPLORE</h4>
                <ul class="space-y-3">
                    <li><a href="room.php" class="footer-link text-sm">Accommodations</a></li>
                    <li><a href="food.php" class="footer-link text-sm">Dining</a></li>
                    <li><a href="#" class="footer-link text-sm">Spa & Wellness</a></li>
                    <li><a href="#" class="footer-link text-sm">Experiences</a></li>
                    <li><a href="wedding.php" class="footer-link text-sm">Events</a></li>
                    <li><a href="#" class="footer-link text-sm">Gallery</a></li>
                    <li><a href="#" class="footer-link text-sm">Gift Cards</a></li>
                    <li><a href="#" class="footer-link text-sm">Careers</a></li>
                </ul>
                <div class="column-divider hidden lg:block"></div>
            </div>
            
            <!-- Column 3 - Services (20% = 2 cols) -->
            <div class="lg:col-span-2 footer-animate relative" style="animation-delay: 0.3s">
                <h4 class="column-heading text-cream-50 font-semibold uppercase mb-6" style="letter-spacing: 1.5px; font-size: 16px; font-weight: 600;">SERVICES</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="footer-link text-sm">Concierge</a></li>
                    <li><a href="#" class="footer-link text-sm">Room Service</a></li>
                    <li><a href="#" class="footer-link text-sm">Transportation</a></li>
                    <li><a href="#" class="footer-link text-sm">Business Center</a></li>
                    <li><a href="#" class="footer-link text-sm">FAQ</a></li>
                    <li><a href="#" class="footer-link text-sm">Accessibility</a></li>
                    <li><a href="#" class="footer-link text-sm">Site Map</a></li>
                </ul>
                <div class="column-divider hidden lg:block"></div>
            </div>
            
            <!-- Column 4 - Stay Connected (25% = 4 cols) -->
            <div class="lg:col-span-4 footer-animate" style="animation-delay: 0.4s">
                <h4 class="column-heading text-cream-50 font-semibold uppercase mb-6" style="letter-spacing: 1.5px; font-size: 16px; font-weight: 600;">STAY CONNECTED</h4>
                
                <!-- Contact Info -->
                <div class="space-y-3 mb-6">
                    <div class="flex items-start gap-3">
                        <i data-lucide="map-pin" class="w-4 h-4 mt-1" style="color: #D4AF37; flex-shrink: 0;"></i>
                        <p class="text-sm">123 Luxury Avenue, Downtown</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <i data-lucide="phone" class="w-4 h-4" style="color: #D4AF37; flex-shrink: 0;"></i>
                        <a href="tel:+1234567890" class="text-sm hover:text-gold-500 transition-colors">+1 (234) 567-8900</a>
                    </div>
                    <div class="flex items-center gap-3">
                        <i data-lucide="mail" class="w-4 h-4" style="color: #D4AF37; flex-shrink: 0;"></i>
                        <a href="mailto:info@dynastyhotels.com" class="text-sm hover:text-gold-500 transition-colors">info@dynastyhotels.com</a>
                    </div>
                </div>
                
                <!-- Newsletter -->
                <div class="mt-6">
                    <h5 class="flex items-center gap-2 font-semibold mb-3" style="color: #D4AF37; font-size: 15px;">
                        <i data-lucide="gift" class="w-4 h-4"></i>
                        Exclusive Offers
                    </h5>
                    <form class="relative" aria-label="Subscribe to exclusive offers">
                        <input 
                            type="email" 
                            placeholder="Your email address" 
                            class="newsletter-input text-brown-900 text-sm"
                            required
                        >
                        <button type="submit" class="newsletter-btn" aria-label="Subscribe">
                            <i data-lucide="arrow-right" class="w-5 h-5 text-white"></i>
                        </button>
                    </form>
                    <p class="text-xs mt-2" style="color: #B8B2A8;">We respect your privacy</p>
                </div>
                
                <!-- Social Media -->
                <div class="flex gap-3 mt-6">
                    <a href="#" class="social-icon" aria-label="Facebook">
                        <i data-lucide="facebook" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="social-icon" aria-label="Instagram">
                        <i data-lucide="instagram" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="social-icon" aria-label="Twitter">
                        <i data-lucide="twitter" class="w-5 h-5"></i>
                    </a>
                    <a href="#" class="social-icon" aria-label="YouTube">
                        <i data-lucide="youtube" class="w-5 h-5"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Trust Badges -->
    <div class="py-12 border-t border-cream-200/10" style="background: #2C1B15;">
        <div class="max-w-7xl mx-auto px-6">
            <h6 class="text-center uppercase tracking-widest mb-8" style="color: #D4AF37; font-size: 12px;">HONORED BY EXCELLENCE</h6>
            <div class="flex flex-wrap items-center justify-center gap-12">
                <div class="trust-badge text-cream-200 text-center text-xs">Forbes 5⭐</div>
                <div class="trust-badge text-cream-200 text-center text-xs">AAA Five 💎</div>
                <div class="trust-badge text-cream-200 text-center text-xs">Leading Hotels</div>
                <div class="trust-badge text-cream-200 text-center text-xs">TripAdvisor</div>
                <div class="trust-badge text-cream-200 text-center text-xs">Green Globe 🌍</div>
                <div class="trust-badge text-cream-200 text-center text-xs">Luxury Travel</div>
            </div>
        </div>
    </div>
    
    <!-- Bottom Bar -->
    <div class="border-t border-cream-200/10 py-5" style="background: #1A0F0A;">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-6">
                <!-- Copyright -->
                <div class="text-sm text-cream-200/60">
                    <p>&copy; 2024 Dynasty Hotels. All Rights Reserved.</p>
                </div>
                
                <!-- Payment Methods -->
                <div class="flex items-center gap-4 flex-wrap justify-center">
                    <span class="text-xs text-cream-200/50">We Accept:</span>
                    <div class="flex items-center gap-3">
                        <div class="payment-icon w-12 h-8 bg-white rounded flex items-center justify-center text-xs font-bold" style="color: #1434CB;">VISA</div>
                        <div class="payment-icon w-12 h-8 bg-white rounded flex items-center justify-center text-xs font-bold" style="color: #EB001B;">MC</div>
                        <div class="payment-icon w-12 h-8 bg-white rounded flex items-center justify-center text-xs font-bold" style="color: #006FCF;">AMEX</div>
                        <div class="payment-icon w-12 h-8 bg-white rounded flex items-center justify-center text-xs font-bold" style="color: #003087;">PayPal</div>
                    </div>
                    <div class="flex items-center gap-2 ml-2">
                        <span class="text-xs px-2 py-1 bg-green-600 text-white rounded flex items-center gap-1">
                            <i data-lucide="shield-check" class="w-3 h-3"></i> SSL
                        </span>
                        <span class="text-xs px-2 py-1 bg-blue-600 text-white rounded">PCI</span>
                    </div>
                </div>
                
                <!-- Policy Links -->
                <div class="flex items-center gap-3 text-sm flex-wrap justify-center">
                    <a href="#" class="text-cream-200/60 hover:text-gold-500 transition-colors">Privacy</a>
                    <span class="text-gold-500">|</span>
                    <a href="#" class="text-cream-200/60 hover:text-gold-500 transition-colors">Terms</a>
                    <span class="text-gold-500">|</span>
                    <a href="#" class="text-cream-200/60 hover:text-gold-500 transition-colors">Cookies</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Back to Top -->
<button class="back-to-top" id="backToTop" aria-label="Back to top">
    <i data-lucide="arrow-up" class="w-6 h-6"></i>
</button>

<script>
    // Back to Top
    const backToTop = document.getElementById('backToTop');
    window.addEventListener('scroll', () => {
        backToTop.classList.toggle('visible', window.scrollY > 300);
    });
    backToTop.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
    
    // Newsletter
    document.querySelector('footer form').addEventListener('submit', (e) => {
        e.preventDefault();
        const btn = e.target.querySelector('.newsletter-btn');
        btn.innerHTML = '<i data-lucide="check" class="w-5 h-5 text-white"></i>';
        lucide.createIcons();
        setTimeout(() => {
            btn.innerHTML = '<i data-lucide="arrow-right" class="w-5 h-5 text-white"></i>';
            lucide.createIcons();
            e.target.reset();
        }, 2000);
    });
    
    // Initialize icons
    lucide.createIcons();
</script>

</body>
</html>
