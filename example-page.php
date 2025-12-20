<?php
session_start();
?>

<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center bg-gradient-to-br from-brown-900 to-brown-800">
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="relative z-10 text-center text-white px-6">
        <h1 class="font-display text-6xl md:text-7xl mb-4">Welcome to Dynasty</h1>
        <p class="text-xl md:text-2xl mb-8 text-cream-100">Experience Luxury Redefined</p>
        <a href="Booking.php" class="inline-flex items-center space-x-2 bg-gold-500 text-white px-8 py-4 rounded-full hover:bg-gold-600 transition-all hover:scale-105 text-lg">
            <i data-lucide="calendar" class="w-5 h-5"></i>
            <span>Book Your Stay</span>
        </a>
    </div>
</section>

<!-- Welcome Section -->
<section class="py-20 bg-cream-50">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="font-display text-4xl text-brown-900 mb-6">Your Gateway to Luxury</h2>
        <div class="w-20 h-1 bg-gold-500 mx-auto mb-8"></div>
        <p class="text-lg text-brown-700 leading-relaxed">
            Dynasty Hotels offers an unparalleled experience where timeless elegance meets modern comfort. 
            From our world-class accommodations to our award-winning dining, every moment is crafted 
            to exceed your expectations.
        </p>
    </div>
</section>

<!-- Features Grid -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="font-display text-4xl text-brown-900 text-center mb-12">Why Choose Dynasty</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="text-center p-8 hover:shadow-xl transition-all rounded-lg">
                <div class="w-16 h-16 bg-gold-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="award" class="w-8 h-8 text-white"></i>
                </div>
                <h3 class="font-display text-2xl text-brown-900 mb-3">Award-Winning Service</h3>
                <p class="text-brown-700">Forbes 5-Star rated hospitality that sets the standard for excellence.</p>
            </div>
            
            <!-- Feature 2 -->
            <div class="text-center p-8 hover:shadow-xl transition-all rounded-lg">
                <div class="w-16 h-16 bg-gold-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="utensils" class="w-8 h-8 text-white"></i>
                </div>
                <h3 class="font-display text-2xl text-brown-900 mb-3">World-Class Dining</h3>
                <p class="text-brown-700">Michelin-starred chefs creating unforgettable culinary experiences.</p>
            </div>
            
            <!-- Feature 3 -->
            <div class="text-center p-8 hover:shadow-xl transition-all rounded-lg">
                <div class="w-16 h-16 bg-gold-500 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="sparkles" class="w-8 h-8 text-white"></i>
                </div>
                <h3 class="font-display text-2xl text-brown-900 mb-3">Luxury Amenities</h3>
                <p class="text-brown-700">Spa, pool, fitness center, and more - everything you need.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-brown-900 text-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="font-display text-4xl mb-6">Ready to Experience Dynasty?</h2>
        <p class="text-xl text-cream-100 mb-8">Book your stay today and discover what luxury truly means.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="Booking.php" class="inline-flex items-center justify-center space-x-2 bg-gold-500 text-white px-8 py-4 rounded-full hover:bg-gold-600 transition-all hover:scale-105">
                <i data-lucide="calendar" class="w-5 h-5"></i>
                <span>Book Now</span>
            </a>
            <a href="room.php" class="inline-flex items-center justify-center space-x-2 border-2 border-white text-white px-8 py-4 rounded-full hover:bg-white hover:text-brown-900 transition-all">
                <i data-lucide="bed" class="w-5 h-5"></i>
                <span>View Rooms</span>
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script>
    lucide.createIcons();
</script>

</body>
</html>
