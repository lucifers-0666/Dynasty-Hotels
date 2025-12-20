<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gift Cards - Dynasty Hotels</title>
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
        
        .giftcard-hero {
            background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%);
            color: white;
            padding: 100px 20px 60px;
            text-align: center;
        }
        
        .giftcard-container {
            max-width: 1000px;
            margin: 60px auto;
            padding: 0 20px;
        }
        
        .giftcard-selector {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .amount-card {
            background: white;
            padding: 40px 20px;
            border-radius: 15px;
            text-align: center;
            cursor: pointer;
            border: 3px solid transparent;
            transition: all 0.3s;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .amount-card:hover {
            transform: translateY(-5px);
            border-color: #bd8c5e;
        }
        
        .amount-card.selected {
            border-color: #bd8c5e;
            background: #fdf5e6;
        }
        
        .amount-card .amount {
            font-size: 36px;
            color: #bd8c5e;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        .purchase-form {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        
        .form-group {
            margin-bottom: 25px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
        }
        
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }
        
        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #bd8c5e;
            outline: none;
        }
        
        .purchase-button {
            width: 100%;
            background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%);
            color: white;
            padding: 15px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s;
        }
        
        .purchase-button:hover {
            transform: scale(1.02);
        }
        
        .gift-card-preview {
            background: linear-gradient(135deg, #bd8c5e 0%, #d4af37 100%);
            padding: 40px;
            border-radius: 15px;
            color: white;
            margin-bottom: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .benefits-section {
            background: white;
            padding: 40px;
            border-radius: 15px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    
    <div class="giftcard-hero">
        <i class="fas fa-gift" style="font-size: 72px; margin-bottom: 20px;"></i>
        <h1 style="font-size: 48px; margin-bottom: 15px;">Dynasty Gift Cards</h1>
        <p style="font-size: 18px; color: #fdf5e6;">The perfect gift for any occasion</p>
    </div>
    
    <div class="giftcard-container">
        <div class="gift-card-preview">
            <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 40px;">
                <div>
                    <h2 style="font-size: 32px; margin: 0;">Dynasty Hotels</h2>
                    <p style="margin: 5px 0; opacity: 0.9;">Luxury Experience Gift Card</p>
                </div>
                <i class="fas fa-crown" style="font-size: 48px;"></i>
            </div>
            <div style="text-align: center; margin: 40px 0;">
                <div style="font-size: 64px; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.2);" id="preview-amount">$100</div>
                <p style="font-size: 14px; opacity: 0.9; margin-top: 10px;">Card Number: XXXX-XXXX-XXXX-1234</p>
            </div>
            <p style="font-size: 12px; opacity: 0.8; text-align: center;">Valid for 12 months from purchase date</p>
        </div>
        
        <h2 style="text-align: center; color: #bd8c5e; margin-bottom: 30px;">Select Amount</h2>
        
        <div class="giftcard-selector">
            <div class="amount-card" onclick="selectAmount(50)">
                <div class="amount">$50</div>
                <p style="color: #666;">Starter</p>
            </div>
            <div class="amount-card selected" onclick="selectAmount(100)">
                <div class="amount">$100</div>
                <p style="color: #666;">Popular</p>
            </div>
            <div class="amount-card" onclick="selectAmount(250)">
                <div class="amount">$250</div>
                <p style="color: #666;">Premium</p>
            </div>
            <div class="amount-card" onclick="selectAmount(500)">
                <div class="amount">$500</div>
                <p style="color: #666;">Luxury</p>
            </div>
            <div class="amount-card" onclick="selectAmount(1000)">
                <div class="amount">$1000</div>
                <p style="color: #666;">Ultimate</p>
            </div>
        </div>
        
        <div class="purchase-form">
            <h3 style="color: #bd8c5e; margin-bottom: 30px; text-align: center;">Purchase Gift Card</h3>
            
            <form onsubmit="purchaseGiftCard(event)">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label>Your Name *</label>
                        <input type="text" required placeholder="John Doe">
                    </div>
                    
                    <div class="form-group">
                        <label>Your Email *</label>
                        <input type="email" required placeholder="your@email.com">
                    </div>
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label>Recipient Name *</label>
                        <input type="text" required placeholder="Jane Smith">
                    </div>
                    
                    <div class="form-group">
                        <label>Recipient Email *</label>
                        <input type="email" required placeholder="recipient@email.com">
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Personal Message (Optional)</label>
                    <textarea rows="4" placeholder="Add a personal message to make it special..."></textarea>
                </div>
                
                <div class="form-group">
                    <label>Delivery Method *</label>
                    <select>
                        <option>Email Delivery (Instant)</option>
                        <option>Physical Card (5-7 business days)</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Delivery Date *</label>
                    <input type="date" required>
                </div>
                
                <div style="background: #f0f9ff; padding: 20px; border-radius: 8px; margin-bottom: 25px; border-left: 4px solid #bd8c5e;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                        <span>Amount:</span>
                        <span style="font-weight: bold;" id="cart-amount">$100.00</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px; padding-top: 10px; border-top: 1px solid #ddd;">
                        <span style="font-weight: bold; color: #bd8c5e;">Total:</span>
                        <span style="font-weight: bold; color: #bd8c5e; font-size: 24px;" id="cart-total">$100.00</span>
                    </div>
                </div>
                
                <button type="submit" class="purchase-button">
                    <i class="fas fa-shopping-cart"></i> Purchase Gift Card
                </button>
            </form>
        </div>
        
        <div class="benefits-section">
            <h3 style="color: #bd8c5e; text-align: center; margin-bottom: 30px;">Why Choose Dynasty Gift Cards?</h3>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
                <div style="text-align: center;">
                    <i class="fas fa-infinity" style="font-size: 48px; color: #bd8c5e; margin-bottom: 15px;"></i>
                    <h4 style="color: #333; margin-bottom: 10px;">Flexible Use</h4>
                    <p style="color: #666;">Use for rooms, dining, spa, or any hotel service</p>
                </div>
                
                <div style="text-align: center;">
                    <i class="fas fa-calendar-alt" style="font-size: 48px; color: #bd8c5e; margin-bottom: 15px;"></i>
                    <h4 style="color: #333; margin-bottom: 10px;">12 Months Valid</h4>
                    <p style="color: #666;">Plenty of time to plan the perfect stay</p>
                </div>
                
                <div style="text-align: center;">
                    <i class="fas fa-bolt" style="font-size: 48px; color: #bd8c5e; margin-bottom: 15px;"></i>
                    <h4 style="color: #333; margin-bottom: 10px;">Instant Delivery</h4>
                    <p style="color: #666;">Email delivery in minutes for last-minute gifts</p>
                </div>
                
                <div style="text-align: center;">
                    <i class="fas fa-shield-alt" style="font-size: 48px; color: #bd8c5e; margin-bottom: 15px;"></i>
                    <h4 style="color: #333; margin-bottom: 10px;">No Expiration Fees</h4>
                    <p style="color: #666;">Full value maintained throughout validity period</p>
                </div>
            </div>
            
            <div style="background: #fdf5e6; padding: 25px; border-radius: 10px; margin-top: 30px; text-align: center;">
                <h4 style="color: #bd8c5e; margin-bottom: 15px;">Perfect For</h4>
                <p style="color: #666; line-height: 1.8;">
                    Birthdays • Anniversaries • Weddings • Graduations • Thank You Gifts • Corporate Rewards • Holidays • Just Because
                </p>
            </div>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
    
    <script>
        let selectedAmount = 100;
        
        function selectAmount(amount) {
            selectedAmount = amount;
            document.getElementById('preview-amount').textContent = '$' + amount;
            document.getElementById('cart-amount').textContent = '$' + amount + '.00';
            document.getElementById('cart-total').textContent = '$' + amount + '.00';
            
            document.querySelectorAll('.amount-card').forEach(card => {
                card.classList.remove('selected');
            });
            event.target.closest('.amount-card').classList.add('selected');
        }
        
        function purchaseGiftCard(e) {
            e.preventDefault();
            alert('🎉 Gift Card Purchase\n\nThank you for your purchase!\n\nAmount: $' + selectedAmount + '\n\nYou will receive a confirmation email shortly with the gift card details.');
            e.target.reset();
        }
        
        // Set minimum date to today
        document.querySelector('input[type="date"]').min = new Date().toISOString().split('T')[0];
    </script>
</body>
</html>
