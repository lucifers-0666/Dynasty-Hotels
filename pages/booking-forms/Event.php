<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking Form</title>
    <link rel="stylesheet" href="../../assets/css/booking-forms.css">
    <style>
        .error {
            color: red;
            font-size: 0.9em;
        }

        .card-fields, .gpay-fields, .cash-fields {
            display: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="form-header">
            <h2>Event Booking Form</h2>
        </div>
        <form id="bookingForm" action="submit-event.php" method="post" novalidate>
            <label for="name">Name :</label>
            <input type="text" id="name" name="name" placeholder="Enter your name">
            <span id="name-error" class="error"></span>

            <label for="number">Phone Number :</label>
            <input type="tel" id="number" name="number" placeholder="Enter your phone number">
            <span id="phone-error" class="error"></span>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" placeholder="Enter your email">
            <span id="email-error" class="error"></span>

            <label for="room-type">Type of Event:</label>
            <select id="room-type" name="room-type">
                <option value="">Select Event type</option>
                <option value="single">Wedding</option>
                <option value="double">celebration</option>
                <option value="royal">meeting</option>
            
            </select>
            <span id="room-type-error" class="error"></span>

            <label for="checkin-date">Event Check-In Date :</label>
            <input type="date" id="checkin-date" name="checkin-date">
            <span id="checkin-date-error" class="error"></span>

            <label for="checkout-date">Event Check-Out Date :</label>
            <input type="date" id="checkout-date" name="checkout-date">
            <span id="checkout-date-error" class="error"></span>

            <label for="payment-method">Payment Method:</label>
    <select id="payment-method" name="payment-method" onchange="togglePaymentFields()">
        <option value="">Select Payment Method</option>
        <option value="credit-card">Credit Card</option>
        <option value="debit-card">Debit Card</option>
        <option value="gpay">GPay</option>
        <option value="cash">Cash</option>
    </select>

    <!-- Credit/Debit Card Payment Fields -->
    <div class="card-fields" style="display:none;">
        <label for="card-number">Card Number:</label>
        <input type="text" id="card-number" name="card-number">

        <label for="expiry-date">Expiry Date:</label>
        <input type="month" id="expiry-date" name="expiry-date">

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv">
    </div>

    <!-- GPay Payment Fields -->
    <div class="gpay-fields" style="display:none;">
        <p>Scan the QR code to pay via GPay:</p>
        <img src="scanner.jpeg" alt="GPay Scanner QR Code">
    </div>

    <!-- Cash Payment Fields -->
    <div class="cash-fields" style="display:none;">
        <p>Pay with cash upon arrival.</p>
        
    </div>
    <button type="submit">Submit</button>
    </form>
    </div>

    <script src="../../assets/js/booking.js"></script>
</body>
</html>

