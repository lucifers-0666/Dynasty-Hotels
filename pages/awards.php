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
    <title>Awards & Recognition - Dynasty Hotels</title>
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
        
        .awards-hero {
            background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%);
            color: white;
            padding: 100px 20px 60px;
            text-align: center;
        }
        
        .awards-hero h1 {
            font-size: 48px;
            margin-bottom: 15px;
        }
        
        .awards-container {
            max-width: 1200px;
            margin: 60px auto;
            padding: 0 20px;
        }
        
        .awards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }
        
        .award-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        .award-card:hover {
            transform: translateY(-10px);
        }
        
        .award-icon {
            font-size: 72px;
            margin-bottom: 20px;
        }
        
        .award-card h3 {
            color: #bd8c5e;
            margin-bottom: 10px;
            font-size: 22px;
        }
        
        .award-year {
            color: #999;
            font-size: 14px;
            margin-bottom: 15px;
        }
        
        .award-description {
            color: #666;
            line-height: 1.6;
        }
        
        .timeline-section {
            background: white;
            padding: 60px 40px;
            border-radius: 15px;
            margin-bottom: 60px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .timeline-section h2 {
            text-align: center;
            color: #bd8c5e;
            font-size: 36px;
            margin-bottom: 40px;
        }
        
        .timeline {
            position: relative;
            padding: 20px 0;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, #bd8c5e, #d4af37);
        }
        
        .timeline-item {
            display: flex;
            margin-bottom: 50px;
            position: relative;
        }
        
        .timeline-item:nth-child(odd) {
            flex-direction: row-reverse;
        }
        
        .timeline-content {
            width: 45%;
            padding: 25px;
            background: #fdf5e6;
            border-radius: 10px;
            border-left: 4px solid #bd8c5e;
        }
        
        .timeline-item:nth-child(odd) .timeline-content {
            border-left: none;
            border-right: 4px solid #bd8c5e;
        }
        
        .timeline-year {
            font-size: 24px;
            font-weight: bold;
            color: #bd8c5e;
            margin-bottom: 10px;
        }
        
        .timeline-content h4 {
            color: #333;
            margin-bottom: 10px;
        }
        
        .certifications-section {
            background: white;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .certifications-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .cert-badge {
            padding: 30px;
            background: #fdf5e6;
            border-radius: 10px;
            transition: transform 0.3s;
        }
        
        .cert-badge:hover {
            transform: scale(1.05);
        }
        
        .cert-badge i {
            font-size: 48px;
            color: #bd8c5e;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    
    <div class="awards-hero">
        <i class="fas fa-trophy" style="font-size: 72px; margin-bottom: 20px;"></i>
        <h1>Awards & Recognition</h1>
        <p style="font-size: 18px; color: #fdf5e6;">Celebrating 50 years of excellence in hospitality</p>
    </div>
    
    <div class="awards-container">
        <div class="awards-grid">
            <div class="award-card">
                <i class="fas fa-medal award-icon" style="color: #ffd700;"></i>
                <h3>Best Luxury Hotel</h3>
                <div class="award-year">2025</div>
                <p class="award-description">World Travel Awards - Recognized for exceptional luxury accommodation and outstanding guest experiences.</p>
            </div>
            
            <div class="award-card">
                <i class="fas fa-star award-icon" style="color: #d4af37;"></i>
                <h3>Five Star Rating</h3>
                <div class="award-year">2025</div>
                <p class="award-description">Forbes Travel Guide - Maintained our prestigious Five-Star status for the 10th consecutive year.</p>
            </div>
            
            <div class="award-card">
                <i class="fas fa-utensils award-icon" style="color: #bd8c5e;"></i>
                <h3>Michelin Star</h3>
                <div class="award-year">2025</div>
                <p class="award-description">Michelin Guide - The Golden Fork restaurant awarded One Michelin Star for exceptional cuisine.</p>
            </div>
            
            <div class="award-card">
                <i class="fas fa-leaf award-icon" style="color: #28a745;"></i>
                <h3>Green Key Global</h3>
                <div class="award-year">2024</div>
                <p class="award-description">Leading eco-label for sustainable tourism - Recognized for environmental initiatives.</p>
            </div>
            
            <div class="award-card">
                <i class="fas fa-heart award-icon" style="color: #dc3545;"></i>
                <h3>Best Spa Experience</h3>
                <div class="award-year">2024</div>
                <p class="award-description">International SpaLife Awards - Outstanding wellness facilities and treatment excellence.</p>
            </div>
            
            <div class="award-card">
                <i class="fas fa-users award-icon" style="color: #bd8c5e;"></i>
                <h3>Best Employer</h3>
                <div class="award-year">2024</div>
                <p class="award-description">Hospitality Industry Awards - Recognized for exceptional employee satisfaction and workplace culture.</p>
            </div>
        </div>
        
        <div class="timeline-section">
            <h2>Our Journey of Excellence</h2>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2025</div>
                        <h4>Michelin Star Achievement</h4>
                        <p>The Golden Fork restaurant receives its first Michelin Star, cementing our reputation for culinary excellence.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2023</div>
                        <h4>Sustainability Certification</h4>
                        <p>Achieved LEED Gold Certification for our commitment to environmental sustainability and green practices.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2020</div>
                        <h4>Grand Renovation</h4>
                        <p>$50 million renovation project completed, modernizing all facilities while preserving our historic charm.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2015</div>
                        <h4>Forbes Five-Star Rating</h4>
                        <p>First received the prestigious Forbes Five-Star rating, a testament to our unwavering commitment to excellence.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">2000</div>
                        <h4>Spa Expansion</h4>
                        <p>Opened our world-class Dynasty Spa & Wellness Center, spanning 10,000 square feet.</p>
                    </div>
                </div>
                
                <div class="timeline-item">
                    <div class="timeline-content">
                        <div class="timeline-year">1975</div>
                        <h4>Grand Opening</h4>
                        <p>Dynasty Hotels opened its doors, beginning our legacy of exceptional hospitality and luxury service.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="certifications-section">
            <h2 style="color: #bd8c5e; font-size: 36px; margin-bottom: 15px;">Certifications & Memberships</h2>
            <p style="color: #666; margin-bottom: 30px;">Proud member of prestigious international hospitality organizations</p>
            
            <div class="certifications-grid">
                <div class="cert-badge">
                    <i class="fas fa-certificate"></i>
                    <h4 style="color: #333; margin-top: 10px;">ISO 9001</h4>
                    <p style="color: #666; font-size: 14px;">Quality Management</p>
                </div>
                
                <div class="cert-badge">
                    <i class="fas fa-shield-alt"></i>
                    <h4 style="color: #333; margin-top: 10px;">Safe Travels</h4>
                    <p style="color: #666; font-size: 14px;">WTTC Stamp</p>
                </div>
                
                <div class="cert-badge">
                    <i class="fas fa-handshake"></i>
                    <h4 style="color: #333; margin-top: 10px;">Leading Hotels</h4>
                    <p style="color: #666; font-size: 14px;">of the World</p>
                </div>
                
                <div class="cert-badge">
                    <i class="fas fa-gem"></i>
                    <h4 style="color: #333; margin-top: 10px;">AAA Five Diamond</h4>
                    <p style="color: #666; font-size: 14px;">Award Winner</p>
                </div>
                
                <div class="cert-badge">
                    <i class="fas fa-award"></i>
                    <h4 style="color: #333; margin-top: 10px;">TripAdvisor</h4>
                    <p style="color: #666; font-size: 14px;">Travelers' Choice</p>
                </div>
                
                <div class="cert-badge">
                    <i class="fas fa-tree"></i>
                    <h4 style="color: #333; margin-top: 10px;">EarthCheck</h4>
                    <p style="color: #666; font-size: 14px;">Silver Certified</p>
                </div>
            </div>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>
