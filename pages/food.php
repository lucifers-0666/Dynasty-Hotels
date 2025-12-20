<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$firstLetter = strtoupper($username[0]);

include '../includes/header.php';
?>

<link rel="stylesheet" href="../assets/css/food.css">

<br>
<br>
<br>
<video id="sliderVideo" autoplay loop muted>
  <source src="../assets/images/Dining\food.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>

<div class="video-controls">
  <button id="playPauseBtn" onclick="togglePlayPause()">&#9658;</button> <!-- Play icon (â–¶) -->
  <button id="muteBtn" onclick="toggleMute()"><i class="fas fa-volume-up"></i></button>
</div>
<br>
<main>
<br>
<br>
    <section class="header-section">
        <h1>Dining</h1>
    </section>
<!-- <<<<<<<<<< videop  part >>>>>>>>>> -->




<!-- <<<<<<<<<<  part >>>>>>>>>> -->
<div class="container">
<div class="image-content">
    <img src="../assets/images/Dining\round.png" alt="Catering Image">
  </div>
    <div class="text-section">
        <h2>SAVOR</h2>
        <h1>An Epicurean Destination</h1>
        <p>The Palace is an epicurean destination for two world-famous San Francisco establishments.</p>
        <p>Under the richly decorated, glass-domed majesty of the Garden Court, you can treat yourself to a dining experience thatâ€™s as spectacular as its iconic setting.</p>
        <p>Or sip a classic cocktail at the Pied Piper, while you marvel at the wondrous Maxfield Parrish mural that gives the bar its name.</p>
    </div>

    <div class="image-section">
        <img src="../assets/images/Dining\first_food_1.jpg" alt="Cocktail" class="small-image">
        <br>
        <img src="../assets/images/Dining\first_food_2.jpg" alt="Oysters" class="small-image">
    </div>

<!-- <<<<<<<<<< second container part >>>>>>>>>> -->


</div>
<div class="second-container">
    <div class="info-section">
        <div class="subheading">PIED PIPER</div>
        <div class="main-heading">A Masterpiece Beckons You</div>
        <p class="description">â€œThe Pied Piperâ€ mural overlooking our elegant bar has captivated patrons from around the world for over a century. This iconic Maxfield Parrish masterpiece gives our historic bar its name and inspires our staff to treat every cocktail and plate like a work of art.</p>
        <p class="description">Explore the menu of shareable plates, cocktails, beer, wine, and spirits.</p>
        <p class="highlight">Everyday, 5:00 PMâ€“11:30 PM</p>
        <div class="action-links">
            <a href="index.php">Visit website</a>
            <a href="index.php">Book a private event</a>
            <a href="index.php">Take a glimpse</a>
        </div>
    </div>
    <div class="image-display">
        <img src="../assets/images/Dining\second container.jpg" alt="Pied Piper Bar Scene">
    </div>
</div>

<!-- <<<<<<<<<< dining card part >>>>>>>>>> -->


<div class="dining">
    <h2>Exclusively at the Pied Piper</h2>
    <div class="dining-cards">
        <!-- First Card -->
        <div class="dining-card">
            <img src="../assets/images/Dining\card1.jpg" alt="Whiskey Selection at Pied Piper">
            <div class="dining-card-content">
                <div class="subheading">Renowned Spirits</div>
                <div class="title">Whiskey Selection at Pied Piper</div>
                <p class="description">Pied Piperâ€™s esteemed spirits list includes acclaimed whiskeys from the U.S., Canada, Ireland, Japan, and Scotland.</p>
                <a href="index.php">View menu</a>
            </div>
        </div>
        
        <!-- Second Card -->
        <div class="dining-card">
            <img src="../assets/images/Dining\card2.jpg" alt="Epicurean Offerings">
            <div class="dining-card-content">
                <div class="subheading">Seasonal Menu</div>
                <div class="title">Enjoy Unique Epicurean Offerings & Signature Creations</div>
                <p class="description">Delight your senses with special holiday menus, monthly activations, or iconic signature items which are still served today.</p>
                <a href="index.php">Explore more</a>
            </div>
        </div>
        
        <!-- Third Card -->
        <div class="dining-card">
            <img src="../assets/images/Dining\card3.jpg" alt="The Pied Piper Burger">
            <div class="dining-card-content">
                <div class="subheading">Urban Adventures</div>
                <div class="title">The Pied Piper Burger</div>
                <p class="description">Recognized as one of the best burgers in San Francisco, the Piper Wagyu Burger is crafted with Wagyu beef, house pickles, Fiscalini smoked cheddar, applewood smoked bacon, chipotle aioli, and served with fries.</p>
                <a href="index.php">View menu</a>
            </div>
        </div>
    </div>
</div>
<br><br><br>

<!-- <<<<<<<<<<<<<<<< third container part>>>>>>>>>>>>>>> -->

<div class="third-container">
  <div class="image-section">
    <img src="../assets/images/Dining\fourth.jpg" alt="Pied Piper Mural">
  </div>
  <div class="text-section">
 
    <h2>The Pied Piper Mural</h2>
    <p>
      Commissioned in the aftermath of The Great 1906 Earthquake, this Maxfield Parrish masterpiece has been hanging in its namesake bar since the Palace Hotel reopened in 1909. As an icon of San Franciscoâ€™s cultural heritage, bar patrons have the opportunity to experience The Pied Piper in its intended setting, a rare treat for art lovers and epicureans alike.
    </p>
  </div>
</div>

<!-- <<<<<<<<<<<<<<<< fourth container part>>>>>>>>>>>>>>> -->


<div class="fourth-container">
  <div class="text-section">
    <h3>THE GARDEN COURT RESTAURANT</h3>
    <h2>A FEAST FOR YOUR SENSES</h2>
    <p>
      Sit down at a table set amidst marble Italian pillars and Austrian crystal chandeliers, as golden natural light floods through a glass-domed ceiling. This exquisite experience captures the elegance and taste of classic fine dining.
    </p>
    <div class="schedule">
      <p><strong>Monâ€“Fri,</strong> 6:30 AMâ€“10:30 AM, 12:00 PMâ€“2:00 PM<br>
      <strong>Sat,</strong> 6:30 AMâ€“10:30 AM, 12:00 PMâ€“2:00 PM, 2:00 PMâ€“4:00 PM<br>
      <strong>Sun,</strong> 7:00 AMâ€“11:00 AM</p>
    </div>
    <div class="links">
      <a href="index.php">Visit website</a>
      <a href="index.php">Book a table</a>
      <a href="index.php">Take a glimpse</a>
    </div>
  </div>
  <div class="image-section">
    <img src="../assets/images/Dining\fifth.jpg" alt="Garden Court Restaurant">
  </div>
</div>

<!-- <<<<<<<<<<<<<<<< second cards part>>>>>>>>>>>>>>> -->


<div class="second-Dining-cards">
  <div class="dining">
    <h2>Exclusively Facility</h2>
    <div class="second-Dining-cards">
      <!-- Card 1 -->
      <div class="card">
        <img src="../assets/images/Dining\card4.jpg" alt="Room Service">
        <h4>ROOM SERVICE</h4>
        <h2>Incredible In-Room Dining</h2>
        <p>Live like royalty while you stay with us, and enjoy an indulgent meal from the comfort of your room.</p>
        <div class="schedule">
          <p><strong>Mon-Sat,</strong> 6:30 AM-10:30 AM, 12:00 PM-2:00 PM, 5:00 PM-10:00 PM<br>
          <strong>Sun,</strong> 7:00 AM-11:00 AM</p>
        </div>
        <a href="index.php">Explore in-room dining</a>
      </div>

      <!-- Card 2 -->
      <div class="card">
        <img src="../assets/images/Dining\card5.jpg" alt="Green Goddess Dressing">
        <h4>GREEN GODDESS DRESSING</h4>
        <h2>Home of the Original World-Famous Dressing</h2>
        <p>Our Green Goddess Dressing has been featured at restaurants all over the world, but was invented at the Palace Hotel, where it remains a menu staple.</p>
        <a href="index.php">Reserve a table</a>
      </div>

      <!-- Card 3 -->
      <div class="card">
        <img src="../assets/images/Dining\card6.jpg" alt="Concierge Service">
        <h4>CONCIERGE</h4>
        <h2>At Your Service</h2>
        <p>Our Concierge team goes above and beyond to ensure your stay is exceptional. Theyâ€™re here to curate your experience and passionate about guiding you towards the best that San Francisco has to offer.</p>
        <a href="index.php">Discover activities</a>
      </div>
    </div>
  </div>
</div>
<br><br><br>

<!-- <<<<<<<<<<<<<<<< six container part>>>>>>>>>>>>>>> -->


<div class="six-container">
    <div class="six-image">
        <img src="../assets/images/Dining\round2.png" alt="Festive Season">
    </div>
    <div class="six-content">
        <p>UNFORGETTABLE FESTIVE EXPERIENCES AWAIT YOU</p>
        <h2>CELEBRATE THE SEASON AT THE PALACE HOTEL</h2>
        <p>
            Join us for magical seasonal celebrations filled with joy and elegance. 
            From our enchanting holiday afternoon teas to festive dining experiences, 
            each event is designed to create cherished memories with family and friends.
        </p>
        <a href="#" class="explore-link">Explore festive experiences</a>
        
    </div>
</div>

<!-- <<<<<<<<<<<<<<<<<<<last part>>>>>>>>>>>>>>>>>> -->


<div class="last-container">
  <h2>More Nearby Options</h2>
  <div class="card-container">
    <div class="card">
      <h3>House Of Shields</h3>
      <p>House of Shields is one of San Franciscoâ€™s oldest bars having originally opened in 1908, and continues to serve some of the cityâ€™s best handcrafted cocktails.</p>
      <a href="index.php">View website</a>
    </div>
    <div class="card">
      <h3>The Grove</h3>
      <p>This restaurant specializes in hand-crafted American comfort food in a warm and eclectic setting.</p>
      <a href="index.php">View website</a>
    </div>
    <div class="card">
      <h3>The Sentinel </h3>
      <p>The Sentinel is a popular spot known for made-to-order sandwiches and tasty breakfast grub.</p>
      <a href="index.php">View website</a>
    </div>
    
  </div>
  <br>
  
  <div class="card-container">
    <div class="card">
      <h3>La Fusion</h3>
      <p>This lively restaurant offers their own twist on classic dishes from all over Latin America.</p>
      <a href="index.php">View website</a>
    </div>
    <div class="card">
      <h3>The Melt</h3>
      <p>Visit this delicious, no frills stop for melty grilled cheeses, juicy burgers, and more American diner classics. </p>
      <a href="index.php">View website</a>
    </div>
    <div class="card">
      <h3>Ghirardelli Ice Cream & Chocolate Shop</h3>
      <p>The original Ghirardelli Ice Cream & Chocolate Shop, featuring delectable chocolate, world famous Hot Fudge Sundaes and more.</p>
      <a href="index.php">View website</a>
    </div>
  </div>
  <br>

  <div class="card-container">
    <div class="card">
      <h3>Sam's Grill & Seafood Restaurant</h3>
      <p>Donâ€™t miss this San Francisco institution that has been serving cocktails and classic dishes for the past 75 years.</p>
      <a href="index.php">View website</a>
    </div>
    <div class="card">
      <h3>Lao Table</h3>
      <p>This upscale restaurant serves modern riffs on traditional Thai food in a stylish setting.</p>
      <a href="index.php">View website</a>
    </div>
   
  </div>
</div>
<br><br>
<div class="form-container">
        <h1>Enquire Now</h1>
        <form id="enquiryForm" action="Food_table.php" method="post">
            <div class="form-group">
                <input type="text" name="name" placeholder="Name*" id="name" required>
                <input type="email" name="email" placeholder="Email" id="email" required>
            </div>
            <div class="form-group">
                <input type="tel" name="phone" placeholder="Phone" id="phone" pattern="[0-9]{10}" required>
                <input type="text" name="hotel" placeholder="The Dynasty Palace Hotels" id="hotel" >
            </div>
            <div class="form-group">
                <input type="number" name="guests" placeholder="Number of Guests" id="guests" required>
                <input type="date" name="booking_date" id="booking_date" required>
            </div>
            <div class="form-group">
                <select name="meal_type" id="meal_type" required>
                    <option value="">Meal Type</option>
                    <option value="breakfast">Breakfast</option>
                    <option value="lunch">Lunch</option>
                    <option value="dinner">Dinner</option>
                </select>
            </div>
            <textarea name="additional_info" placeholder="Additional Information" id="additional_info"></textarea>
            <div id="error-messages"></div>
            <button type="submit" class="submit-btn">SUBMIT</button>
            

        </form>


</main>
<br><br><br>

<footer id="about-us-section">
  <div class="footer-content">
    
    
    <div class="footer-description">
      <h2>About Dynasty Hotels</h2>
      <p>
        Welcome to <span style="color: #f0d29a; font-weight: bold;">Dynasty Hotels</span>, first opened in
        <span style="color: #f0d29a; font-weight: bold;">Rajasthan in 1992,</span> blending traditional Rajasthani charm with modern luxury. Known for its elegant decor and personalized service, it quickly became a sought-after destination, offering authentic experiences and a warm, welcoming atmosphere for travelers.
      </p>
    </div>  

    
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

<script>
  
  // Play/Pause and Mute for Video
  const video = document.getElementById("sliderVideo");
  const playPauseBtn = document.getElementById("playPauseBtn");
  const muteBtn = document.getElementById("muteBtn");

  playPauseBtn?.addEventListener("click", () => {
    if (video.paused) {
      video.play();
      playPauseBtn.textContent = "âšâš"; // Pause icon
    } else {
      video.pause();
      playPauseBtn.textContent = "â–¶"; // Play icon
    }
  });

  muteBtn?.addEventListener("click", () => {
    video.muted = !video.muted;
    muteBtn.innerHTML = video.muted ? '<i class="fas fa-volume-mute"></i>' : '<i class="fas fa-volume-up"></i>';
  });

  // Sticky Header
  window.addEventListener('scroll', function () {
    const header = document.querySelector('.header-container');
    header.classList.toggle('sticky', window.scrollY > 0);
  });


</script>

<?php include '../includes/footer.php'; ?>

<script>
  lucide.createIcons();
</script>

