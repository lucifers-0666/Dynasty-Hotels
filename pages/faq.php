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
    <title>FAQs - Dynasty Hotels</title>
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
        
        .faq-hero {
            background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%);
            color: white;
            padding: 100px 20px 60px;
            text-align: center;
        }
        
        .faq-hero h1 {
            font-size: 48px;
            margin-bottom: 15px;
        }
        
        .faq-hero p {
            font-size: 18px;
            color: #fdf5e6;
        }
        
        .faq-container {
            max-width: 900px;
            margin: 60px auto;
            padding: 0 20px;
        }
        
        .faq-categories {
            display: flex;
            gap: 15px;
            margin-bottom: 40px;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .faq-category-btn {
            background: white;
            color: #bd8c5e;
            padding: 12px 25px;
            border: 2px solid #bd8c5e;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .faq-category-btn:hover,
        .faq-category-btn.active {
            background: #bd8c5e;
            color: white;
        }
        
        .faq-item {
            background: white;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .faq-question {
            padding: 25px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background 0.3s;
        }
        
        .faq-question:hover {
            background: #fdf5e6;
        }
        
        .faq-question h3 {
            margin: 0;
            color: #333;
            font-size: 18px;
            flex: 1;
        }
        
        .faq-icon {
            font-size: 24px;
            color: #bd8c5e;
            transition: transform 0.3s;
        }
        
        .faq-item.active .faq-icon {
            transform: rotate(180deg);
        }
        
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
        }
        
        .faq-answer-content {
            padding: 0 25px 25px;
            color: #666;
            line-height: 1.8;
        }
        
        .faq-item.active .faq-answer {
            max-height: 500px;
        }
        
        .search-box {
            max-width: 600px;
            margin: 0 auto 40px;
        }
        
        .search-box input {
            width: 100%;
            padding: 15px 50px 15px 20px;
            border: 2px solid #bd8c5e;
            border-radius: 8px;
            font-size: 16px;
        }
        
        .contact-cta {
            background: white;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            margin-top: 60px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .contact-cta h3 {
            color: #bd8c5e;
            margin-bottom: 15px;
            font-size: 28px;
        }
        
        .contact-cta button {
            background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%);
            color: white;
            padding: 15px 40px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    
    <div class="faq-hero">
        <i class="fas fa-question-circle" style="font-size: 72px; margin-bottom: 20px;"></i>
        <h1>Frequently Asked Questions</h1>
        <p>Find answers to common questions about Dynasty Hotels</p>
    </div>
    
    <div class="faq-container">
        <div class="search-box">
            <input type="text" placeholder="Search FAQs..." id="faqSearch" onkeyup="searchFAQs()">
        </div>
        
        <div class="faq-categories">
            <button class="faq-category-btn active">All</button>
            <button class="faq-category-btn">Bookings</button>
            <button class="faq-category-btn">Rooms</button>
            <button class="faq-category-btn">Amenities</button>
            <button class="faq-category-btn">Dining</button>
            <button class="faq-category-btn">Policies</button>
        </div>
        
        <div class="faq-list">
            <!-- Booking FAQs -->
            <div class="faq-item" data-category="bookings">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>What is your cancellation policy?</h3>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>Free cancellation up to 48 hours before check-in. Cancellations made within 48 hours will incur a charge of one night's stay. No-shows will be charged the full amount. Special rates and packages may have different cancellation terms.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq-item" data-category="bookings">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>How can I modify my reservation?</h3>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>You can modify your reservation through our website by accessing "My Bookings" section, or by calling our reservations team at +1 (555) 123-4567. Modifications are subject to availability and rate differences may apply.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq-item" data-category="bookings">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>Do you offer group booking discounts?</h3>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>Yes! Groups of 10 or more rooms qualify for special rates. Contact our Group Sales team at groups@dynastyhotels.com or call +1 (555) 123-4568 for customized quotes and exclusive benefits.</p>
                    </div>
                </div>
            </div>
            
            <!-- Room FAQs -->
            <div class="faq-item" data-category="rooms">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>What time is check-in and check-out?</h3>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>Standard check-in time is 3:00 PM and check-out is 11:00 AM. Early check-in and late check-out are subject to availability. Dynasty Rewards members enjoy complimentary late check-out based on tier level.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq-item" data-category="rooms">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>Are all rooms non-smoking?</h3>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>Yes, Dynasty Hotels is a 100% non-smoking property. Designated outdoor smoking areas are available. Smoking in rooms will result in a $250 cleaning fee.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq-item" data-category="rooms">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>Do rooms have air conditioning and heating?</h3>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>Yes, all rooms feature individually controlled climate systems with both air conditioning and heating. Rooms also include ceiling fans for additional comfort.</p>
                    </div>
                </div>
            </div>
            
            <!-- Amenities FAQs -->
            <div class="faq-item" data-category="amenities">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>Is WiFi available and is it free?</h3>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>Yes, complimentary high-speed WiFi is available throughout the hotel including all guest rooms, restaurants, and public areas. Premium WiFi with higher bandwidth is available for $10/day.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq-item" data-category="amenities">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>Do you have parking facilities?</h3>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>Yes, we offer secure covered parking at $25/day for self-parking and $40/day for valet service. Electric vehicle charging stations are available. Complimentary parking for Dynasty Rewards Gold members.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq-item" data-category="amenities">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>Is there a fitness center?</h3>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>Yes, our 24-hour fitness center features state-of-the-art cardio equipment, free weights, and strength training machines. Personal training sessions are available upon request. Access is complimentary for all guests.</p>
                    </div>
                </div>
            </div>
            
            <!-- Dining FAQs -->
            <div class="faq-item" data-category="dining">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>What dining options are available?</h3>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>We offer three dining venues: The Golden Fork (fine dining), Rooftop Sky Bar (cocktails & small plates), and Dynasty Café (all-day casual dining). In-room dining is available 24/7.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq-item" data-category="dining">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>Do you accommodate dietary restrictions?</h3>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>Absolutely! Our chefs can accommodate vegetarian, vegan, gluten-free, kosher, halal, and most allergy-related dietary needs. Please inform us at booking or notify your server.</p>
                    </div>
                </div>
            </div>
            
            <!-- Policies FAQs -->
            <div class="faq-item" data-category="policies">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>What is your pet policy?</h3>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>We welcome pets up to 25 lbs with a $50 per night fee (maximum $150). Service animals are always welcome at no charge. Pet amenities include beds, bowls, and treats. Please notify us in advance.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq-item" data-category="policies">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>What forms of payment do you accept?</h3>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>We accept all major credit cards (Visa, MasterCard, American Express, Discover), debit cards, cash, and mobile payments (Apple Pay, Google Pay). A valid credit card is required at check-in for incidentals.</p>
                    </div>
                </div>
            </div>
            
            <div class="faq-item" data-category="policies">
                <div class="faq-question" onclick="toggleFAQ(this)">
                    <h3>Do you have an age requirement for check-in?</h3>
                    <i class="fas fa-chevron-down faq-icon"></i>
                </div>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        <p>Guests must be 21 years or older to check in. Valid government-issued photo ID and credit card in the guest's name are required at check-in.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="contact-cta">
            <i class="fas fa-headset" style="font-size: 48px; color: #bd8c5e; margin-bottom: 15px;"></i>
            <h3>Still Have Questions?</h3>
            <p style="color: #666; margin-bottom: 20px;">Our guest services team is here to help 24/7</p>
            <button onclick="window.location.href='contact.php'">
                <i class="fas fa-phone"></i> Contact Us
            </button>
            <p style="margin-top: 15px; color: #666;">
                <i class="fas fa-phone"></i> +1 (555) 123-4567 | 
                <i class="fas fa-envelope"></i> info@dynastyhotels.com
            </p>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
    
    <script>
        function toggleFAQ(element) {
            const faqItem = element.parentElement;
            const isActive = faqItem.classList.contains('active');
            
            // Close all FAQ items
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Open clicked item if it wasn't active
            if (!isActive) {
                faqItem.classList.add('active');
            }
        }
        
        function searchFAQs() {
            const input = document.getElementById('faqSearch').value.toLowerCase();
            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question h3').textContent.toLowerCase();
                const answer = item.querySelector('.faq-answer-content').textContent.toLowerCase();
                
                if (question.includes(input) || answer.includes(input)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>
