<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitemap - Dynasty Hotels</title>
    <link rel="icon" href="../assets/images/index/icons8-circled-d-32.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #fdf5e6;
        }
        
        .sitemap-header {
            background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%);
            color: white;
            padding: 60px 20px;
            text-align: center;
        }
        
        .sitemap-container {
            max-width: 1200px;
            margin: 60px auto;
            padding: 0 20px 60px;
        }
        
        .sitemap-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .sitemap-section {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .sitemap-section h3 {
            color: #bd8c5e;
            margin-bottom: 20px;
            font-size: 22px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .sitemap-section ul {
            list-style: none;
            padding: 0;
        }
        
        .sitemap-section li {
            margin-bottom: 12px;
        }
        
        .sitemap-section a {
            color: #666;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: color 0.3s;
        }
        
        .sitemap-section a:hover {
            color: #bd8c5e;
        }
    </style>
</head>
<body>
    <div class="sitemap-header">
        <i class="fas fa-sitemap" style="font-size: 60px; margin-bottom: 20px;"></i>
        <h1 style="font-size: 42px; margin: 0;">Site Map</h1>
        <p style="margin-top: 10px; font-size: 16px;">Navigate our website easily</p>
    </div>
    
    <div class="sitemap-container">
        <div class="sitemap-grid">
            <div class="sitemap-section">
                <h3><i class="fas fa-home"></i> Main Pages</h3>
                <ul>
                    <li><a href="index.php"><i class="fas fa-angle-right"></i> Home</a></li>
                    <li><a href="about_us.php"><i class="fas fa-angle-right"></i> About Us</a></li>
                    <li><a href="contact.php"><i class="fas fa-angle-right"></i> Contact</a></li>
                    <li><a href="awards.php"><i class="fas fa-angle-right"></i> Awards & Recognition</a></li>
                    <li><a href="faq.php"><i class="fas fa-angle-right"></i> FAQs</a></li>
                </ul>
            </div>
            
            <div class="sitemap-section">
                <h3><i class="fas fa-bed"></i> Accommodations</h3>
                <ul>
                    <li><a href="room.php"><i class="fas fa-angle-right"></i> Rooms & Suites</a></li>
                    <li><a href="room.php#deluxe"><i class="fas fa-angle-right"></i> Deluxe Rooms</a></li>
                    <li><a href="room.php#executive"><i class="fas fa-angle-right"></i> Executive Suites</a></li>
                    <li><a href="room.php#presidential"><i class="fas fa-angle-right"></i> Presidential Suite</a></li>
                </ul>
            </div>
            
            <div class="sitemap-section">
                <h3><i class="fas fa-utensils"></i> Dining</h3>
                <ul>
                    <li><a href="food.php"><i class="fas fa-angle-right"></i> All Restaurants</a></li>
                    <li><a href="menu/food.php"><i class="fas fa-angle-right"></i> The Golden Fork</a></li>
                    <li><a href="menu/food.php#skybar"><i class="fas fa-angle-right"></i> Rooftop Sky Bar</a></li>
                    <li><a href="menu/food.php#cafe"><i class="fas fa-angle-right"></i> Dynasty Café</a></li>
                </ul>
            </div>
            
            <div class="sitemap-section">
                <h3><i class="fas fa-calendar-alt"></i> Events & Meetings</h3>
                <ul>
                    <li><a href="wedding.php"><i class="fas fa-angle-right"></i> Weddings</a></li>
                    <li><a href="event_booking.php"><i class="fas fa-angle-right"></i> Events</a></li>
                    <li><a href="booking-forms/Event.php"><i class="fas fa-angle-right"></i> Event Booking Form</a></li>
                </ul>
            </div>
            
            <div class="sitemap-section">
                <h3><i class="fas fa-spa"></i> Wellness</h3>
                <ul>
                    <li><a href="index.php#spa"><i class="fas fa-angle-right"></i> Spa & Wellness</a></li>
                    <li><a href="index.php#fitness"><i class="fas fa-angle-right"></i> Fitness Center</a></li>
                    <li><a href="activities.php"><i class="fas fa-angle-right"></i> Activities & Experiences</a></li>
                </ul>
            </div>
            
            <div class="sitemap-section">
                <h3><i class="fas fa-calendar-check"></i> Bookings</h3>
                <ul>
                    <li><a href="Booking.php"><i class="fas fa-angle-right"></i> Book Now</a></li>
                    <li><a href="booking-forms/Room-booking.php"><i class="fas fa-angle-right"></i> Room Booking</a></li>
                    <li><a href="booking-forms/table.php"><i class="fas fa-angle-right"></i> Table Reservation</a></li>
                    <li><a href="booking-forms/Event.php"><i class="fas fa-angle-right"></i> Event Booking</a></li>
                </ul>
            </div>
            
            <div class="sitemap-section">
                <h3><i class="fas fa-user"></i> Account</h3>
                <ul>
                    <li><a href="login.php"><i class="fas fa-angle-right"></i> Login</a></li>
                    <li><a href="sign_up.php"><i class="fas fa-angle-right"></i> Sign Up</a></li>
                    <li><a href="dashboard.php"><i class="fas fa-angle-right"></i> My Dashboard</a></li>
                    <li><a href="editprofileform.php"><i class="fas fa-angle-right"></i> Edit Profile</a></li>
                </ul>
            </div>
            
            <div class="sitemap-section">
                <h3><i class="fas fa-info-circle"></i> Information</h3>
                <ul>
                    <li><a href="privacy-policy.php"><i class="fas fa-angle-right"></i> Privacy Policy</a></li>
                    <li><a href="terms-conditions.php"><i class="fas fa-angle-right"></i> Terms & Conditions</a></li>
                    <li><a href="activities.php"><i class="fas fa-angle-right"></i> Activities</a></li>
                    <li><a href="gift-cards.php"><i class="fas fa-angle-right"></i> Gift Cards</a></li>
                    <li><a href="careers.php"><i class="fas fa-angle-right"></i> Careers</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
