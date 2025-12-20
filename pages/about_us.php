<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$firstLetter = strtoupper($username[0]);

include '../includes/header.php';
?>

<link rel="stylesheet" href="../assets/css/about_us.css">

<div class="slider-container">
    <div class="slider">
        <!-- Slide 1: Video -->
        <div class="slide">
            <video id="sliderVideo" autoplay loop muted>
                <source src="../assets/images/about_us\Best 5 Star Luxury Hotel in Bengaluru, Karnataka The Leela Palace Bengaluru_1.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="video-controls">
    <button id="playPauseBtn" onclick="togglePlayPause()">â–¶</button>
    <button id="muteBtn" onclick="toggleMute()"><i class="fas fa-volume-up"></i></button>
</div>
</div>
        
        
        <!-- Slide 2: Image -->
        <div class="slide">
            <img src="../assets/images/about_us\facade high res.jpeg" alt="Image 1">
        </div>
        
        <!-- Slide 3: Image -->
        <div class="slide">
            <img src="../assets/images/index\Travel+Leisure-Awards_0.jpg.webp" alt="Image 2">
        </div>
        
        <!-- Slide 4: Image -->
        <div class="slide">
          
            <img src="../assets/images/about_us\outside.jpg" alt="Image 3">
        </div>
    </div>
    <!-- Navigation Buttons -->
    <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
    <button class="next" onclick="moveSlide(1)">&#10095;</button>
</div>
</div>
</div>
<div class="booking-bar">
    <div class="booking-option">
    <div id="occupancy-summary">
      <label> 0 Room, 0 Adult, 0 Children :</label>
    
</div>

<div id="occupancyModal" class="occupancy-modal">
    <div class="occupancy-item">
        <span>Rooms</span>
        <div class="counter">
            <button onclick="updateCount('rooms', -1)">-</button>
            <span id="rooms-count">0</span>
            <button onclick="updateCount('rooms', 1)">+</button>
        </div>
    </div>
    <div class="occupancy-item">
        <span>Adults</span>
        <div class="counter">
            <button onclick="updateCount('adults', -1)">-</button>
            <span id="adults-count">0</span>
            <button onclick="updateCount('adults', 1)">+</button>
        </div>
    </div>
    <div class="occupancy-item">
        <span>Children</span>
        <div class="counter">
            <button onclick="updateCount('children', -1)">-</button>
            <span id="children-count">0</span>
            <button onclick="updateCount('children', 1)">+</button>
        </div>
    </div>
    <button class="done-button" onclick="closeModal()">Done</button>
</div>

    </div>
    <div class="booking-option">
  <span>Check-in - </span>
  <input type="date" id="checkin" placeholder="Check-in" min="2024-11-10">
  <span>Check-out -</span>
  <input type="date" id="checkout" placeholder="Check-out" min="2024-11-10">
</div>




    <div class="booking-option">
        <label for="room-type">Type of Room:</label>
        <select id="room-type">
            <option value="single">Single Room</option>
            <option value="double">Double Room</option>
            <option value="suite">Royal Suite</option>
            <option value="suite">Maharaja Suite</option>
            <option value="suite">Duplex Suite</option>
            <option value="suite">Luxury Suite</option>

        </select>
    </div>
    <button class="book-button">BOOK</button>
</div>
<div class="decorative-divider">
      <h2># Our Story</h2>
          <img src="../assets/images/about_us\text-demo.svg " alt="decorative divider">
    </div>
  <!-- Our Story Section -->
  <section class="story-section">
    <div class="container">
    
    
      <p><span class="w-word">W</span>elcome to <span class="w-word">D</span><span class="highlight">ynasty Hotels</span>, 
      a hallmark of elegance and refinement since <span class="highlight">1992</span>.
       From its beginnings as a <span class="highlight">boutique establishment</span>, 
       Dynasty Hotels has flourished into a distinguished collection of properties, each embodying a unique blend of 
      <span class="highlight">timeless luxury</span> and <span class="highlight">contemporary sophistication</span>.</p>
     
     
     
     
     
     
      <div class="frame">
      <img src="../assets/images/about_us\welcome.jpg" alt="Hotel Lobby">
      <!-- <p>Established in 1992, Dynasty Hotels has been a symbol of sophistication and luxury. What started as a boutique hotel has grown into a collection of properties that reflect the essence of grandeur and style, blending tradition with modern amenities.</p> -->
       </div>
       </div>
  </section>

  <!-- main  -->
  
  <!-- first image star  -->
 <div class="section">
             <img src="../assets/images/about_us\alsonot.webp" alt="Responsible Luxury">
        <div class="text-content">
            <h2 >RESPONSIBLE LUXURY</h2>
            <div class="divider">
                      <img class="icon" src="../assets/images/about_us\thired-icon.svg" alt="Responsible Luxury"> 
                 </div>
                     <p>Delivering world-class luxury experiences which address the needs of wellbeing and safety through responsible practices which are in harmony with the environment and society.</p>
                        <a href="#" class="button">KNOW MORE</a>
       </div>
  </div>
<!-- first image end  -->

<!-- 2 image star  -->
    <div class="section">
              <img src="../assets/images/about_us\view.jpeg" alt="Design & Detailing">
          <div class="text-content">
                <h2>Tranquil Luxury Amidst Nature</h2>
                <div class="divider">
                      <img class="icon" src="../assets/images/about_us\thired-icon.svg" alt="Responsible Luxury"> 
                 </div>
<p> This serene hotel setting harmoniously blends natural beauty with refined architecture. Overlooking a scenic waterfront, the lush gardens feature manicured lawns, palm trees, and water features with floating lilies, creating an oasis of calm. Distinctive outdoor seating areas are thoughtfully designed for relaxation, surrounded by tranquil ponds and soft ambient lighting. The backdrop of historic architecture and the gentle hills adds to the immersive experience, seamlessly celebrating the rich cultural heritage of the destination. This space invites guests to unwind and connect with nature in an environment crafted for wellbeing and rejuvenation.</p>

</div>
      </div>
        
        <!-- 2 image end  -->


         <!-- 3 image star  -->
 <div class="section">
             <img src="../assets/images/about_us\inside2.jpg" alt="Responsible Luxury">
        <div class="text-content">
            <h2 >Timeless Luxury and Elegance</h2>
                 <div class="divider">
                      <img class="icon" src="../assets/images/about_us\thired-icon.svg" alt="Responsible Luxury"> 
                 </div>
                <p>Step into timeless elegance with this exquisitely designed lounge that blends classical sophistication and luxurious comfort. Rich textures, ornate patterns, and warm golden hues create a regal ambiance, complemented by carefully curated artwork and decor. The grand chandelier and intricate ceiling details elevate the space, making it the perfect setting for intimate gatherings or moments of quiet reflection in opulent surroundings.</p>

                 <a href="#" class="button">KNOW MORE</a>
       </div>
  </div>
<!-- 3 image end  -->

<!-- 4 image star  -->
    <div class="section">
              <img src="../assets/images/about_us\homeSliderImage.png" alt="Design & Detailing">
          <div class="text-content">
                <h2>Dine by the Poolside Bliss</h2>
                <div class="divider">
                      <img class="icon" src="../assets/images/about_us\thired-icon.svg" alt="Responsible Luxury"> 
                 </div>

                <p>"Experience a delightful dining atmosphere with serene poolside views and a refreshing open-air setting. This elegantly designed space, featuring wooden interiors and natural lighting, offers a perfect blend of comfort and style. Whether enjoying a casual breakfast or a romantic dinner, the tranquil surroundings and thoughtfully arranged seating create an inviting ambiance for every occasion."</p>
                </div>
      </div>
        
      <div class="card-container">
                  <div class="card">
                      <img src="../assets/images/about_us\pexels-pixabay-261169.jpg" alt="Kaya Kalp - The Spa">
                      <div class="card-title">Dive into Bliss</div>
                      <div class="card-description">
                      Unwind in our serene pool, perfect for a refreshing swim or a relaxing lounge by the water.

                    </div>
                  </div>
                  <div class="card">
                      <img src="../assets/images/about_us\mass_spa.jpg" alt="Kaya Kalp - The Spa">
                      <div class="card-title">Kaya Kalp - The Spa</div>
                      <div class="card-description">
                          A fragrant haven that melts away the stresses and strains of daily life, with both ancient and modern therapies.
                      </div>
                  </div>
                  <div class="card">
                      <img src="../assets/images/about_us\gift-card.png" alt="Health & Fitness Centre">
                      <div class="card-title">Relax in Comfort</div>
                      <div class="card-description">
                      Enjoy the perfect retreat in our cozy lounging area, designed for ultimate relaxation and tranquility.                      </div>
                  </div>

                  <div class="card">
                      <img src="../assets/images/about_us\pexels-pixabay-262047.jpg" alt="Swimming Pool">
                      <div class="card-title">Gather Around Grandeur</div>
                      <div class="card-description">
                      Experience the charm of our spacious dining table, perfect for family feasts or elegant gatherings. Crafted for comfort and style, itâ€™s the centerpiece for creating cherished memories.                      </div>
                  </div>
              </div>
           </div>

 

  <!-- Testimonials Section -->
  <section class="testimonials-section">
  <div class="container">
    <h2>What Our Guests Say</h2>
    <div class="testimonials">
      <div class="testimonial">
        <div class="testimonial-photo">
          <img src="PHP_PROJECT\img\about_us\images.jpeg" alt="Photo of Emily R.">
        </div>
        <p>"Staying at Dynasty Hotels is always a luxurious experience. The attention to detail is remarkable!"</p>
        <span>- Emily R.</span>
      </div>
      <div class="testimonial">
        <div class="testimonial-photo">
          <img src="guest2.jpg" alt="Photo of John M.">
        </div>
        <p>"A perfect combination of comfort, service, and opulence. Highly recommended!"</p>
        <span>- John M.</span>
      </div>
    </div>
  </div>
</section>

<!-- Sustainability Section -->
<section class="sustainability-section">
  <div class="container">
    <h2>Our Commitment to Sustainability</h2>
    <div class="sustainability-content">
      <div class="sustainability-photo">
        <img src="PHP_PROJECT\img\about_us\sustainable-hotel-management.jpg" alt="Sustainability efforts at Dynasty Hotels">
      </div>
      <p>At Dynasty Hotels, we are dedicated to promoting sustainability by reducing our carbon footprint and supporting local communities. We source organic ingredients from local farmers, implement energy-saving technologies, and ensure eco-friendly practices throughout our operations.</p>
    </div>
  </div>
</section>


  <!-- Footer -->
 <footer id="about-us-section">
  <div class="footer-content">
    
    <!-- About Dynasty Hotels -->
    <div class="footer-description">
      <h2>About Dynasty Hotels</h2>
      <p>
        Welcome to <span style="color: #f0d29a; font-weight: bold;">Dynasty Hotels</span>, first opened in
        <span style="color: #f0d29a; font-weight: bold;">Rajasthan in 1992,</span> blending traditional Rajasthani charm with modern luxury. Known for its elegant decor and personalized service, it quickly became a sought-after destination, offering authentic experiences and a warm, welcoming atmosphere for travelers.
      </p>
    </div>  

    <!-- Contact Us -->
    <div class="footer-details">
      <h2>Contact Us</h2>
      <p>Email: info@dynastyhotels.com</p>
      <p>Phone: +91 8238650390</p>
      <h2>Follow Us</h2>
      <div class="social-icons">
        <a href="https://www.facebook.com/dynastycdoc/">
          <img src="../assets/images/index\new_fb-removebg-preview.png" alt="Facebook">
        </a>
        <a href="https://x.com/i/flow/login?redirect_after_login=%2Fdynastyresorts">
          <img src="../assets/images/index\images-removebg-preview.png" alt="Twitter">
        </a>
        <a href="https://www.instagram.com/dynastyholidays/?hl=en">
          <img src="../assets/images/index\new_ig-removebg-preview.png" alt="Instagram">
        </a>
      </div>
    </div>

    <!-- Subscribe Section -->
    <div class="email-subscription">
      <h4>Subscribe to Our Newsletter</h4>
      <form action="#" method="post" onsubmit="subscribeAlert()">
        <input type="email" id="email" name="email" placeholder="Enter Your Email id" required>
        <button type="submit">SUBSCRIBE</button>
      </form>
    </div>

  </div>
</footer>


  <!-- JavaScript for scrolling animations -->
  <script src="js\about_us.js" defer></script>

<?php include '../includes/footer.php'; ?>

<script>
  lucide.createIcons();
</script>

