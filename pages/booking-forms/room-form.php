<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Booking Form</title>
    <link rel="stylesheet" href="../../assets/css/booking-forms.css">
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h2>Room Booking Form</h2>
        </div>
        <form id="bookingForm" action="Room-booking.php" method="post" novalidate>
            <label for="name">Name :</label>
            <input type="text" id="name" name="name" placeholder="Enter your name">
            
            <label for="number">Phone Number :</label>
            <input type="tel" id="number" name="number" placeholder="Enter your phone number">
            
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
            
            <label for="room-type">Type of Room :</label>
            <select id="room-type" name="room-type">
                <option value="">Select room type</option>
                <option value="single">Single</option>
                <option value="double">Double</option>
                <option value="royal">Royal</option>
                <option value="maharaja">Maharaja</option>
                <option value="duplex">Duplex</option>
                <option value="luxury">Luxury</option>
            </select>
            
            <label for="checkin-date">Room Check-In Date :</label>
            <input type="date" id="checkin-date" name="checkin-date">
            
            <label for="checkout-date">Room Check-Out Date :</label>
            <input type="date" id="checkout-date" name="checkout-date">
            
            <label for="additional">Additional Information</label>
            <textarea id="additional" name="additional" rows="4" placeholder="Any additional details or requests"></textarea>
            
            <div class="payment-section">
    <label for="payment-method">Payment Method:</label>
    <select id="payment-method" name="payment-method" onchange="togglePaymentFields()">
        <option value="">Select Payment Method</option>
        <option value="credit-card">Credit Card</option>
        <option value="debit-card">Debit Card</option>
        <option value="gpay">GPay</option>
        <option value="cash">Cash</option>
    </select>
    <span id="payment-method-error" class="error"></span>

    <!-- Card Payment Fields -->
    <div class="card-fields">
        <label for="card-number">Card Number:</label>
        <input type="text" id="card-number" name="card-number" placeholder="Enter your card number" maxlength="16">
        <span id="card-number-error" class="error"></span>

        <label for="expiry-date">Expiry Date:</label>
        <input type="month" id="expiry-date" name="expiry-date">
        <span id="expiry-date-error" class="error"></span>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" placeholder="Enter your CVV" maxlength="3">
        <span id="cvv-error" class="error"></span>
    </div>

    <!-- GPay Fields -->
    <div class="gpay-fields">
        <p>Scan the QR code to pay via GPay:</p>
        <img src="scanner.jpeg" alt="Scan GPay QR Code" class="gpay-scanner">
    </div>

    <!-- Cash Fields -->
    <div class="cash-fields">
        <p>You can pay in cash upon arrival at the property.</p>
    </div>
</div>

            
            <button type="button" onclick="validateForm()">Submit</button>
        </form>
    </div>
    <script src="../../assets/js/room-booking.js"></script>
  
</body>
</html>

