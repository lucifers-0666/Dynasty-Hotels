<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$firstLetter = strtoupper($username[0]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activities & Experiences - Dynasty Hotels</title>
    <link rel="icon" href="../assets/images/index/icons8-circled-d-32.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/index.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #fdf5e6;
        }
        
        .activities-hero {
            background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%);
            color: white;
            padding: 100px 20px 60px;
            text-align: center;
        }
        
        .activities-container {
            max-width: 1200px;
            margin: 60px auto;
            padding: 0 20px;
        }
        
        .activity-card {
            background: white;
            margin-bottom: 40px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            display: grid;
            grid-template-columns: 400px 1fr;
            gap: 0;
        }
        
        .activity-image {
            height: 300px;
            background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 72px;
        }
        
        .activity-content {
            padding: 40px;
        }
        
        .activity-content h3 {
            color: #bd8c5e;
            font-size: 28px;
            margin-bottom: 15px;
        }
        
        .activity-meta {
            display: flex;
            gap: 25px;
            margin-bottom: 20px;
            color: #666;
            font-size: 14px;
        }
        
        .activity-meta span {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .activity-description {
            color: #666;
            line-height: 1.8;
            margin-bottom: 20px;
        }
        
        .activity-price {
            font-size: 24px;
            color: #bd8c5e;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .book-button {
            background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s;
        }
        
        .book-button:hover {
            transform: scale(1.05);
        }
        
        .category-tabs {
            display: flex;
            gap: 15px;
            margin-bottom: 40px;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .category-tab {
            background: white;
            color: #bd8c5e;
            padding: 12px 25px;
            border: 2px solid #bd8c5e;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .category-tab:hover,
        .category-tab.active {
            background: #bd8c5e;
            color: white;
        }
        
        @media (max-width: 768px) {
            .activity-card {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    
    <div class="activities-hero">
        <i class="fas fa-hiking" style="font-size: 72px; margin-bottom: 20px;"></i>
        <h1 style="font-size: 48px; margin-bottom: 15px;">Activities & Experiences</h1>
        <p style="font-size: 18px; color: #fdf5e6;">Curated experiences for unforgettable memories</p>
    </div>
    
    <div class="activities-container">
        <div class="category-tabs">
            <button class="category-tab active">All Activities</button>
            <button class="category-tab">Adventure</button>
            <button class="category-tab">Wellness</button>
            <button class="category-tab">Cultural</button>
            <button class="category-tab">Family</button>
        </div>
        
        <!-- Activity 1 -->
        <div class="activity-card">
            <div class="activity-image">
                <i class="fas fa-mountain"></i>
            </div>
            <div class="activity-content">
                <h3>City Heritage Walking Tour</h3>
                <div class="activity-meta">
                    <span><i class="fas fa-clock"></i> 3 hours</span>
                    <span><i class="fas fa-users"></i> 2-15 guests</span>
                    <span><i class="fas fa-signal"></i> Easy</span>
                </div>
                <p class="activity-description">
                    Explore the rich history and culture of our city with an expert local guide. Visit iconic landmarks, hidden gems, and enjoy authentic local cuisine tasting. Perfect for history enthusiasts and culture lovers.
                </p>
                <div class="activity-price">$45 per person</div>
                <button class="book-button"><i class="fas fa-calendar-check"></i> Book Now</button>
            </div>
        </div>
        
        <!-- Activity 2 -->
        <div class="activity-card">
            <div class="activity-image" style="background: linear-gradient(135deg, #a07a4d 0%, #bd8c5e 100%);">
                <i class="fas fa-spa"></i>
            </div>
            <div class="activity-content">
                <h3>Sunrise Yoga & Meditation</h3>
                <div class="activity-meta">
                    <span><i class="fas fa-clock"></i> 90 minutes</span>
                    <span><i class="fas fa-users"></i> 2-20 guests</span>
                    <span><i class="fas fa-signal"></i> All Levels</span>
                </div>
                <p class="activity-description">
                    Start your day with mindfulness on our rooftop terrace. Led by certified instructors, this session combines gentle yoga flows with guided meditation, offering stunning sunrise views and complimentary herbal tea.
                </p>
                <div class="activity-price">$35 per person</div>
                <button class="book-button"><i class="fas fa-calendar-check"></i> Book Now</button>
            </div>
        </div>
        
        <!-- Activity 3 -->
        <div class="activity-card">
            <div class="activity-image" style="background: linear-gradient(135deg, #d4af37 0%, #a07a4d 100%);">
                <i class="fas fa-utensils"></i>
            </div>
            <div class="activity-content">
                <h3>Culinary Masterclass with Chef Marcus</h3>
                <div class="activity-meta">
                    <span><i class="fas fa-clock"></i> 4 hours</span>
                    <span><i class="fas fa-users"></i> 4-10 guests</span>
                    <span><i class="fas fa-signal"></i> Intermediate</span>
                </div>
                <p class="activity-description">
                    Learn the secrets of gourmet cuisine from our Michelin-starred chef. This hands-on class covers professional techniques, plating artistry, and wine pairing. Enjoy your creations with a full-course meal.
                </p>
                <div class="activity-price">$150 per person</div>
                <button class="book-button"><i class="fas fa-calendar-check"></i> Book Now</button>
            </div>
        </div>
        
        <!-- Activity 4 -->
        <div class="activity-card">
            <div class="activity-image" style="background: linear-gradient(135deg, #bd8c5e 0%, #a07a4d 100%);">
                <i class="fas fa-wine-glass"></i>
            </div>
            <div class="activity-content">
                <h3>Wine Tasting Experience</h3>
                <div class="activity-meta">
                    <span><i class="fas fa-clock"></i> 2 hours</span>
                    <span><i class="fas fa-users"></i> 2-12 guests</span>
                    <span><i class="fas fa-signal"></i> 21+ Only</span>
                </div>
                <p class="activity-description">
                    Sample premium wines from around the world with our sommelier. Learn about varietals, regions, and tasting techniques while enjoying artisanal cheese and charcuterie pairings in our elegant wine cellar.
                </p>
                <div class="activity-price">$85 per person</div>
                <button class="book-button"><i class="fas fa-calendar-check"></i> Book Now</button>
            </div>
        </div>
        
        <!-- Activity 5 -->
        <div class="activity-card">
            <div class="activity-image" style="background: linear-gradient(135deg, #28a745 0%, #20a53a 100%);">
                <i class="fas fa-biking"></i>
            </div>
            <div class="activity-content">
                <h3>City Bike Tour</h3>
                <div class="activity-meta">
                    <span><i class="fas fa-clock"></i> 3 hours</span>
                    <span><i class="fas fa-users"></i> 4-16 guests</span>
                    <span><i class="fas fa-signal"></i> Moderate</span>
                </div>
                <p class="activity-description">
                    Discover the city's best-kept secrets on two wheels! This guided bicycle tour takes you through scenic parks, vibrant neighborhoods, and historic districts. Bike, helmet, and water included.
                </p>
                <div class="activity-price">$55 per person</div>
                <button class="book-button"><i class="fas fa-calendar-check"></i> Book Now</button>
            </div>
        </div>
        
        <!-- Activity 6 -->
        <div class="activity-card">
            <div class="activity-image" style="background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);">
                <i class="fas fa-camera"></i>
            </div>
            <div class="activity-content">
                <h3>Photography Workshop</h3>
                <div class="activity-meta">
                    <span><i class="fas fa-clock"></i> 4 hours</span>
                    <span><i class="fas fa-users"></i> 3-8 guests</span>
                    <span><i class="fas fa-signal"></i> All Levels</span>
                </div>
                <p class="activity-description">
                    Capture stunning cityscapes and portraits with guidance from a professional photographer. Learn composition, lighting, and editing techniques. Perfect for improving your travel photography skills.
                </p>
                <div class="activity-price">$120 per person</div>
                <button class="book-button"><i class="fas fa-calendar-check"></i> Book Now</button>
            </div>
        </div>
        
        <!-- Activity 7 -->
        <div class="activity-card">
            <div class="activity-image" style="background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);">
                <i class="fas fa-heart"></i>
            </div>
            <div class="activity-content">
                <h3>Couples' Spa Retreat</h3>
                <div class="activity-meta">
                    <span><i class="fas fa-clock"></i> 3 hours</span>
                    <span><i class="fas fa-users"></i> 2 guests</span>
                    <span><i class="fas fa-signal"></i> Relaxing</span>
                </div>
                <p class="activity-description">
                    Indulge in ultimate relaxation with your partner. This package includes couples' massage, private jacuzzi session, champagne, and chocolate-covered strawberries in our luxurious spa suite.
                </p>
                <div class="activity-price">$450 per couple</div>
                <button class="book-button"><i class="fas fa-calendar-check"></i> Book Now</button>
            </div>
        </div>
        
        <!-- Activity 8 -->
        <div class="activity-card">
            <div class="activity-image" style="background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);">
                <i class="fas fa-child"></i>
            </div>
            <div class="activity-content">
                <h3>Kids' Adventure Club</h3>
                <div class="activity-meta">
                    <span><i class="fas fa-clock"></i> 4 hours</span>
                    <span><i class="fas fa-users"></i> Ages 5-12</span>
                    <span><i class="fas fa-signal"></i> Supervised</span>
                </div>
                <p class="activity-description">
                    Give your children an unforgettable experience with supervised activities including arts & crafts, games, treasure hunts, and pool time. Professional childcare staff ensure safety and fun for all.
                </p>
                <div class="activity-price">$60 per child</div>
                <button class="book-button"><i class="fas fa-calendar-check"></i> Book Now</button>
            </div>
        </div>
        
        <div style="background: white; padding: 40px; border-radius: 15px; text-align: center; box-shadow: 0 5px 20px rgba(0,0,0,0.1); margin-top: 60px;">
            <i class="fas fa-concierge-bell" style="font-size: 48px; color: #bd8c5e; margin-bottom: 20px;"></i>
            <h3 style="color: #bd8c5e; margin-bottom: 15px;">Custom Experiences Available</h3>
            <p style="color: #666; margin-bottom: 25px; max-width: 600px; margin-left: auto; margin-right: auto;">
                Our concierge team can create personalized experiences tailored to your interests. From private tours to exclusive dining, we'll make your stay extraordinary.
            </p>
            <button class="book-button"><i class="fas fa-envelope"></i> Contact Concierge</button>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>
