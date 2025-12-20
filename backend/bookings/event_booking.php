<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Events";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$hotel = $_POST['hotel'];
$purpose = $_POST['purpose'];
$guests = $_POST['guests'];
$event_date = $_POST['event_date'];
$payment_method = $_POST['payment_method'];
$card_number = isset($_POST['card_number']) ? $_POST['card_number'] : null;
$expiry_date = isset($_POST['expiry_date']) ? $_POST['expiry_date'] : null;
$cvv = isset($_POST['cvv']) ? $_POST['cvv'] : null;
$additional_info = $_POST['additional_info'];

$stmt = $conn->prepare("INSERT INTO event_details (name, email, phone, hotel, purpose, guests, event_date, payment_method, card_number, expiry_date, cvv, additional_info) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssisssssss", $name, $email, $phone, $hotel, $purpose, $guests, $event_date, $payment_method, $card_number, $expiry_date, $cvv, $additional_info);

if ($stmt->execute()) {
    echo "Enquiry submitted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
