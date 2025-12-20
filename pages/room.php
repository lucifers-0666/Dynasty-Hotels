<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$firstLetter = strtoupper($username[0]);

include '../includes/header.php';
?>

<link rel="stylesheet" href="../assets/css/room.css">
<main>


<video id="sliderVideo" autoplay loop muted>
  <source src="../assets/images/stay\room.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>

<div class="video-controls">
  <button id="playPauseBtn" onclick="togglePlayPause()">&#9658;</button> <!-- Play icon (â–¶) -->
  <button id="muteBtn" onclick="toggleMute()"><i class="fas fa-volume-up"></i></button>
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
                                            <button  class="done-button" onclick="closeModal()">Done</button>
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
                    <form action="forms\forms\New folder\room.php" method="post">
                         <button  class="book-button">BOOK</button>
                    </form>
</div>

<section class="header-section">
        <h1>Suites</h1>
        
    </section>

 
  

  <section class="suites-section">
    <div class="suite-card">
        <img src="img/stay/Maharaja Suite.jpg" alt="Palace Suite" class="suite-image">
        <div class="suite-info">
            <h3>Maharaja Suite</h3>
            <ul class="suite-amenities">
                <li class="amenity1">
                    <img src="img/stay/king.png" alt="King Bed">
                    <p>1 King</p>
                </li>
                <li class="amenity2">
                    <img src="img/stay/internet.webp" alt="Internet">
                    <p>Internet</p>
                </li>
                <li class="amenity3">
                    <img src="img/stay/sofa bad.png" alt="Sofa Bed">
                    <p>Sofa bed</p>
                </li>
                <li class="amenity4">
                    <img src="img/stay/bathtub.webp" alt="Bathtub">
                    <p>Bathtub</p>
                </li>
                <li class="amenity5">
                    <img src="img/stay/rain shower.png" alt="Rain shower">
                    <p>Rain shower</p>
                </li>
            </ul>
            <a href="#" class="learn-more">Learn more</a>
        </div>
    </div>
   
    <div class="suite-card">
        <img src="../assets/images/stay\Royal Suite.jpg" alt="Palace Suite" class="suite-image">
        <div class="suite-info">
            <h3>Royal Suite</h3>
            <ul class="suite-amenities">
                <li class="amenity1">
                    <img src="img/stay/king.png" alt="King Bed">
                    <p>1 King</p>
                </li>
                <li class="amenity2">
                    <img src="img/stay/internet.webp" alt="Internet">
                    <p>Internet</p>
                </li>
                <li class="amenity3">
                    <img src="img/stay/sofa bad.png" alt="Sofa Bed">
                    <p>Sofa bed</p>
                </li>
                <li class="amenity4">
                    <img src="img/stay/bathtub.webp" alt="Bathtub">
                    <p>Bathtub</p>
                </li>
                <li class="amenity5">
                    <img src="img/stay/rain shower.png" alt="Rain shower">
                    <p>Rain shower</p>
                </li>
            </ul>
            <a href="#" class="learn-more">Learn more</a>
        </div>
    </div>
        
    </section>


    <section class="suites-section">
    <div class="suite-card">
        <img src="../assets/images/stay\Luxury Suite.jpg" alt="Palace Suite" class="suite-image">
        <div class="suite-info">
            <h3>Luxury Suite</h3>
            <ul class="suite-amenities">
                <li class="amenity1">
                    <img src="img/stay/king.png" alt="King Bed">
                    <p>1 King</p>
                </li>
                <li class="amenity2">
                    <img src="img/stay/internet.webp" alt="Internet">
                    <p>Internet</p>
                </li>
               
                <li class="amenity5">
                    <img src="img/stay/rain shower.png" alt="Rain shower">
                    <p>Rain shower</p>
                </li>
            </ul>
            <a href="#" class="learn-more">Learn more</a>
        </div>
    </div>


    <div class="suite-card">
        <img src="../assets/images/stay\Duplex Suite.jpg" alt="Palace Suite" class="suite-image">
        <div class="suite-info">
            <h3>Duplex Suite</h3>
            <ul class="suite-amenities">
                <li class="amenity1">
                    <img src="img/stay/king.png" alt="King Bed">
                    <p>1 King</p>
                </li>
                <li class="amenity2">
                    <img src="img/stay/internet.webp" alt="Internet">
                    <p>Internet</p>
                </li>
               
                <li class="amenity5">
                    <img src="img/stay/rain shower.png" alt="Rain shower">
                    <p>Rain shower</p>
                </li>
            </ul>
            <a href="#" class="learn-more">Learn more</a>
        </div>
    </div>
        
</section>

    <section class="header-section">
        <h1>Rooms</h1>
         </section>
         <section class="suites-section">
    <div class="suite-card">
        <img src="../assets/images/stay\double room.jpg" alt="Palace Suite" class="suite-image">
        <div class="suite-info">
            <h3>Single Room</h3>
            <ul class="suite-amenities">
                <li class="amenity1">
                    <img src="img/stay/king.png" alt="King Bed">
                    <p>1 King</p>
                </li>
                <li class="amenity2">
                    <img src="img/stay/internet.webp" alt="Internet">
                    <p>Internet</p>
                </li>
                
                <li class="amenity4">
                    <img src="img/stay/bathtub.webp" alt="Bathtub">
                    <p>Bathtub</p>
                </li>
                <li class="amenity5">
                    <img src="img/stay/rain shower.png" alt="Rain shower">
                    <p>Rain shower</p>
                </li>
            </ul>
            <a href="#" class="learn-more">Learn more</a>
        </div>
    </div>
    <div class="suite-card">
        <img src="../assets/images/stay\single room.jpg" alt="Palace Suite" class="suite-image">
        <div class="suite-info">
            <h3>Double Room</h3>
            <ul class="suite-amenities">
                <li class="amenity1">
                    <img src="img/stay/king.png" alt="King Bed">
                    <p>1 King</p>
                </li>
                <li class="amenity2">
                    <img src="img/stay/internet.webp" alt="Internet">
                    <p>Internet</p>
                </li>
                
                <li class="amenity4">
                    <img src="img/stay/bathtub.webp" alt="Bathtub">
                    <p>Bathtub</p>
                </li>
                <li class="amenity5">
                    <img src="img/stay/rain shower.png" alt="Rain shower">
                    <p>Rain shower</p>
                </li>
            </ul>
            <a href="#" class="learn-more">Learn more</a>
        </div>
    </div>
        
    </section>
</br></br></br>

<div class="card-container">
        <div class="card">
            <img src="../assets/images/stay\Card Maharaja-Suite .jpg" alt="Swimming Pool">
            <div class="card-title">Maharaja Suite</div>
            <div class="card-description">
            Experience royal luxury in our Maharaja Suite, adorned with exquisite decor and spacious elegance.
          </div>
        </div>

        <div class="card">
            <img src="../assets/images/stay\Card Royal-Suite.webp" alt="Health & Fitness Centre">
            <div class="card-title">Royal Suite</div>
            <div class="card-description">
            Discover the epitome of elegance in our Royal Suite. This suite boasts regal decor, a spacious living area, and stunning views.
          </div>
        </div>

        <div class="card">
            <img src="../assets/images/stay\Card Deluxe-Room.webp" alt="Kaya Kalp - The Spa">
            <div class="card-title">Deluxe Suite</div>
            <div class="card-description">
            : Experience the ultimate in luxury with our Deluxe Suite, featuring elegant dÃ©cor, a spacious living area, and stunning views.
            </div>
        </div>

</div>

<div class="card-container">
        <div class="card">
            <img src="../assets/images/stay\Card Luxury Suite.webp" alt="Swimming Pool">
            <div class="card-title">Luxury Suite</div>
            <div class="card-description">
            Indulge in our Luxury Suite, where opulence meets comfort. Featuring a plush living area, exquisite furnishings, and breathtaking views,

        </div>
        </div>

        <div class="card">
            <img src="../assets/images/stay\single room card.jpeg" alt="Health & Fitness Centre">
            <div class="card-title">Single Room</div>
            <div class="card-description">
            The Single Room offers a cozy and comfortable stay for solo travelers, featuring a plush king bed, high-speed internet access, and a luxurious rain shower.
        </div>
        </div>

        <div class="card">
            <img src="../assets/images/stay\double room card.jpg" alt="Kaya Kalp - The Spa">
            <div class="card-title">Double Room</div>
            <div class="card-description">
            The Double Room offers a cozy, elegantly designed space perfect for relaxation. It features a comfortable king bed, complimentary internet access, and a luxurious rain shower.
            </div>
        </div>

        
    </div>

    <div class="container">
        <div class="image-container">
            <img src="../assets/images/stay\frount1.jpg" alt="Dining Room">
        </div>
        <div class="content">
            <h2>INDULGE AT THE PALACE</h2>
            <p>Experience the royal treatment during your stay with us by pre- ordering our exclusive Welcome amenities.</p>
            <button onclick="learnMore()" href="#" class="learn-more">Learn More</button>
        </div>
    </div>
 </main>

<script src="../assets/js/room.js"></script>

<?php include '../includes/footer.php'; ?>

<script>
  lucide.createIcons();
</script>









