<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careers - Dynasty Hotels</title>
    <link rel="icon" href="../assets/images/index/icons8-circled-d-32.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #fdf5e6;
        }
        
        .careers-hero {
            background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%);
            color: white;
            padding: 100px 20px 60px;
            text-align: center;
        }
        
        .careers-container {
            max-width: 1200px;
            margin: 60px auto;
            padding: 0 20px;
        }
        
        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }
        
        .benefit-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .job-listing {
            background: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .job-info h3 {
            color: #bd8c5e;
            margin-bottom: 10px;
        }
        
        .job-meta {
            display: flex;
            gap: 20px;
            color: #666;
            font-size: 14px;
            margin-top: 10px;
        }
        
        .apply-button {
            background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <div class="careers-hero">
        <i class="fas fa-briefcase" style="font-size: 72px; margin-bottom: 20px;"></i>
        <h1 style="font-size: 48px; margin-bottom: 15px;">Join Our Team</h1>
        <p style="font-size: 18px; color: #fdf5e6;">Build your career at Dynasty Hotels</p>
    </div>
    
    <div class="careers-container">
        <div style="text-align: center; margin-bottom: 60px;">
            <h2 style="font-size: 36px; color: #333; margin-bottom: 20px;">Why Work With Us?</h2>
            <p style="color: #666; font-size: 18px; max-width: 700px; margin: 0 auto;">
                Join a team dedicated to excellence in hospitality. We invest in our employees' growth and wellbeing.
            </p>
        </div>
        
        <div class="benefits-grid">
            <div class="benefit-card">
                <i class="fas fa-heart" style="font-size: 48px; color: #bd8c5e; margin-bottom: 20px;"></i>
                <h3 style="color: #333; margin-bottom: 15px;">Health & Wellness</h3>
                <p style="color: #666;">Comprehensive health insurance, dental, vision, and wellness programs</p>
            </div>
            
            <div class="benefit-card">
                <i class="fas fa-graduation-cap" style="font-size: 48px; color: #bd8c5e; margin-bottom: 20px;"></i>
                <h3 style="color: #333; margin-bottom: 15px;">Career Development</h3>
                <p style="color: #666;">Training programs, tuition reimbursement, and advancement opportunities</p>
            </div>
            
            <div class="benefit-card">
                <i class="fas fa-plane" style="font-size: 48px; color: #bd8c5e; margin-bottom: 20px;"></i>
                <h3 style="color: #333; margin-bottom: 15px;">Travel Discounts</h3>
                <p style="color: #666;">Employee rates at Dynasty Hotels worldwide and partner properties</p>
            </div>
            
            <div class="benefit-card">
                <i class="fas fa-calendar-check" style="font-size: 48px; color: #bd8c5e; margin-bottom: 20px;"></i>
                <h3 style="color: #333; margin-bottom: 15px;">Time Off</h3>
                <p style="color: #666;">Generous paid time off, holidays, and flexible scheduling options</p>
            </div>
            
            <div class="benefit-card">
                <i class="fas fa-piggy-bank" style="font-size: 48px; color: #bd8c5e; margin-bottom: 20px;"></i>
                <h3 style="color: #333; margin-bottom: 15px;">Retirement Plans</h3>
                <p style="color: #666;">401(k) with company matching and financial planning assistance</p>
            </div>
            
            <div class="benefit-card">
                <i class="fas fa-users" style="font-size: 48px; color: #bd8c5e; margin-bottom: 20px;"></i>
                <h3 style="color: #333; margin-bottom: 15px;">Team Culture</h3>
                <p style="color: #666;">Inclusive environment, team events, and recognition programs</p>
            </div>
        </div>
        
        <div style="background: white; padding: 40px; border-radius: 15px; margin-bottom: 60px; text-align: center;">
            <h2 style="color: #bd8c5e; margin-bottom: 20px;">Our Values</h2>
            <div style="display: flex; justify-content: center; gap: 40px; flex-wrap: wrap; margin-top: 30px;">
                <div style="flex: 1; min-width: 200px;">
                    <i class="fas fa-star" style="font-size: 36px; color: #d4af37;"></i>
                    <h4 style="color: #333; margin: 15px 0;">Excellence</h4>
                    <p style="color: #666;">Striving for perfection in every detail</p>
                </div>
                <div style="flex: 1; min-width: 200px;">
                    <i class="fas fa-handshake" style="font-size: 36px; color: #d4af37;"></i>
                    <h4 style="color: #333; margin: 15px 0;">Integrity</h4>
                    <p style="color: #666;">Honest and ethical in all we do</p>
                </div>
                <div style="flex: 1; min-width: 200px;">
                    <i class="fas fa-heart-circle-check" style="font-size: 36px; color: #d4af37;"></i>
                    <h4 style="color: #333; margin: 15px 0;">Respect</h4>
                    <p style="color: #666;">Valuing diversity and every individual</p>
                </div>
            </div>
        </div>
        
        <h2 style="text-align: center; font-size: 36px; color: #333; margin-bottom: 40px;">Current Openings</h2>
        
        <div class="job-listing">
            <div class="job-info">
                <h3>Front Desk Manager</h3>
                <p style="color: #666;">Lead our guest services team and ensure exceptional experiences</p>
                <div class="job-meta">
                    <span><i class="fas fa-map-marker-alt"></i> Main Location</span>
                    <span><i class="fas fa-clock"></i> Full-Time</span>
                    <span><i class="fas fa-briefcase"></i> Management</span>
                </div>
            </div>
            <button class="apply-button" onclick="applyJob('Front Desk Manager')">Apply Now</button>
        </div>
        
        <div class="job-listing">
            <div class="job-info">
                <h3>Executive Chef</h3>
                <p style="color: #666;">Create culinary masterpieces in our Michelin-starred restaurant</p>
                <div class="job-meta">
                    <span><i class="fas fa-map-marker-alt"></i> Main Location</span>
                    <span><i class="fas fa-clock"></i> Full-Time</span>
                    <span><i class="fas fa-utensils"></i> Culinary</span>
                </div>
            </div>
            <button class="apply-button" onclick="applyJob('Executive Chef')">Apply Now</button>
        </div>
        
        <div class="job-listing">
            <div class="job-info">
                <h3>Spa Therapist</h3>
                <p style="color: #666;">Provide rejuvenating treatments in our luxury wellness center</p>
                <div class="job-meta">
                    <span><i class="fas fa-map-marker-alt"></i> Main Location</span>
                    <span><i class="fas fa-clock"></i> Full-Time</span>
                    <span><i class="fas fa-spa"></i> Wellness</span>
                </div>
            </div>
            <button class="apply-button" onclick="applyJob('Spa Therapist')">Apply Now</button>
        </div>
        
        <div class="job-listing">
            <div class="job-info">
                <h3>Housekeeping Supervisor</h3>
                <p style="color: #666;">Maintain our high standards of cleanliness and comfort</p>
                <div class="job-meta">
                    <span><i class="fas fa-map-marker-alt"></i> Main Location</span>
                    <span><i class="fas fa-clock"></i> Full-Time</span>
                    <span><i class="fas fa-broom"></i> Operations</span>
                </div>
            </div>
            <button class="apply-button" onclick="applyJob('Housekeeping Supervisor')">Apply Now</button>
        </div>
        
        <div class="job-listing">
            <div class="job-info">
                <h3>Events Coordinator</h3>
                <p style="color: #666;">Plan and execute unforgettable weddings and corporate events</p>
                <div class="job-meta">
                    <span><i class="fas fa-map-marker-alt"></i> Main Location</span>
                    <span><i class="fas fa-clock"></i> Full-Time</span>
                    <span><i class="fas fa-calendar-alt"></i> Events</span>
                </div>
            </div>
            <button class="apply-button" onclick="applyJob('Events Coordinator')">Apply Now</button>
        </div>
        
        <div class="job-listing">
            <div class="job-info">
                <h3>Night Auditor</h3>
                <p style="color: #666;">Oversee overnight operations and guest services</p>
                <div class="job-meta">
                    <span><i class="fas fa-map-marker-alt"></i> Main Location</span>
                    <span><i class="fas fa-clock"></i> Part-Time</span>
                    <span><i class="fas fa-moon"></i> Overnight</span>
                </div>
            </div>
            <button class="apply-button" onclick="applyJob('Night Auditor')">Apply Now</button>
        </div>
        
        <div style="background: white; padding: 40px; border-radius: 15px; text-align: center; margin-top: 60px;">
            <i class="fas fa-envelope" style="font-size: 48px; color: #bd8c5e; margin-bottom: 20px;"></i>
            <h3 style="color: #bd8c5e; margin-bottom: 15px;">Don't See Your Role?</h3>
            <p style="color: #666; margin-bottom: 25px;">
                We're always looking for talented individuals to join our team.<br>
                Send us your resume and we'll keep you in mind for future opportunities.
            </p>
            <button class="apply-button" onclick="window.location.href='mailto:careers@dynastyhotels.com'">
                <i class="fas fa-paper-plane"></i> Submit General Application
            </button>
            <p style="margin-top: 20px; color: #666;">
                <i class="fas fa-envelope"></i> careers@dynastyhotels.com | 
                <i class="fas fa-phone"></i> +1 (555) 123-4569
            </p>
        </div>
    </div>
    
    <script>
        function applyJob(position) {
            alert('Apply for: ' + position + '\n\nYou will be redirected to our application portal.\n\nThank you for your interest in joining Dynasty Hotels!');
            // In production, redirect to actual application form
            // window.location.href = 'application-form.php?position=' + encodeURIComponent(position);
        }
    </script>
</body>
</html>
