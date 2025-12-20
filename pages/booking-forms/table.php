<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'config.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $hotel = $conn->real_escape_string($_POST['hotel']);
    $guests = intval($_POST['guests']);
    $booking_date = $conn->real_escape_string($_POST['booking_date']);
    $meal_type = $conn->real_escape_string($_POST['meal_type']);
    $additional_info = $conn->real_escape_string($_POST['additional_info']);

    // Insert into database
    $sql = "INSERT INTO enquiries (name, email, phone, hotel, guests, booking_date, meal_type, additional_info) 
    VALUES ('$name', '$email', '$phone', '$hotel', '$guests', '$booking_date', '$meal_type', '$additional_info')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a success page or display success message
        echo "<script>alert('Booking enquiry submitted successfully!'); window.location.href='Booking.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close(); // Close the database connection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquire Now - Room Booking</title>
    <link rel="stylesheet" href="../../assets/css/table-booking.css"/>
    <style>
        .error {
            color: red;
            font-size: 0.9em;
        }

        .card-fields, .gpay-fields, .cash-fields {
            display: none;
        }
        .card-fields .form-group {
    margin-bottom: 15px; /* Adds spacing between fields */
}

.card-fields input {
    width: 100%; /* Ensures the input fields are full width */
    padding: 10px;
    margin-top: 5px;
    font-size: 1em;
}

.card-fields label {

    display: block; /* Makes the label take up its own line */
}

    </style>
</head>
<body>
    <div class="form-container">
        <h1>Enquire Now</h1>
        <form id="enquiryForm" action="food_form.php" method="post" novalidate>
            <div class="form-group">
                <input type="text" name="name" placeholder="Name*" id="name" required>
                <span id="name-error" class="error"></span>
                <input type="email" name="email" placeholder="Email*" id="email" required>
                <span id="email-error" class="error"></span>
            </div>
            <div class="form-group">
                <input type="tel" name="phone" placeholder="Phone" id="phone" pattern="[0-9]{10}" required>
                <span id="phone-error" class="error"></span>
                <input type="text" name="hotel" placeholder="Hotel Name" id="hotel">
            </div>
            <div class="form-group">
                <input type="number" name="guests" placeholder="Number of Guests*" id="guests" required>
                <span id="guests-error" class="error"></span>
                <input type="date" name="booking_date" id="booking_date" required>
                <span id="booking-date-error" class="error"></span>
            </div>
            <div class="form-group">
                <select name="meal_type" id="meal_type" required>
                    <option value="">Meal Type*</option>
                    <option value="breakfast">Breakfast</option>
                    <option value="lunch">Lunch</option>
                    <option value="dinner">Dinner</option>
                </select>
                <span id="meal-type-error" class="error"></span>
            </div>
            <textarea name="additional_info" placeholder="Additional Information" id="additional_info"></textarea>

            <!-- Payment Options -->
            <label for="payment-method">Payment Method:</label>
            <select id="payment-method" name="payment-method" onchange="togglePaymentFields()">
                <option value="">Select Payment Method</option>
                <option value="credit-card">Credit Card</option>
                <option value="debit-card">Debit Card</option>
                <option value="gpay">GPay</option>
                <option value="cash">Cash</option>
            </select>

            <!-- Credit/Debit Card Payment Fields -->
            <div class="card-fields">
    <div class="form-group">
        <label for="card-number">Card Number:</label>
        <input type="text" id="card-number" name="card-number" maxlength="16" required>
        <span id="card-number-error" class="error"></span>
    </div>

    <div class="form-group">
        <label for="expiry-date">Expiry Date:</label>
        <input type="month" id="expiry-date" name="expiry-date" required>
        <span id="expiry-date-error" class="error"></span>
    </div>

    <div class="form-group">
        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" maxlength="3" required>
        <span id="cvv-error" class="error"></span>
    </div>
</div>

            <!-- GPay Payment Fields -->
            <div class="gpay-fields">
                <p>Scan the QR code to pay via GPay:</p>
                <img src="scanner.jpeg" alt="GPay Scanner QR Code">
            </div>

            <!-- Cash Payment Fields -->
            <div class="cash-fields">
                <p>Pay with cash upon arrival.</p>
            </div>

            <div id="error-messages"></div>
            <button type="submit" class="submit-btn">SUBMIT</button>
        </form>
    </div>
    <script src="../../assets/js/table-booking.js"></script>


</body>
</html>

