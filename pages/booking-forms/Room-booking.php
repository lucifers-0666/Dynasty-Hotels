<?php

$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "dynasty_hotels";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$name = $_POST['name'];
$phone_number = $_POST['number'];
$email = $_POST['email'];
$room_type = $_POST['room-type'];
$checkin_date = $_POST['checkin-date'];
$checkout_date = $_POST['checkout-date'];
$additional_info = $_POST['additional'];
$payment_method = $_POST['payment-method'];
$card_number = $_POST['card-number'];
$expiry_date = $_POST['expiry-date'];
$cvv = $_POST['cvv'];

$sql = "INSERT INTO bookings 
        (name, phone_number, email, room_type, checkin_date, checkout_date, additional_info, payment_method, card_number, expiry_date, cvv) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssss", $name, $phone_number, $email, $room_type, $checkin_date, $checkout_date, $additional_info, $payment_method, $card_number, $expiry_date, $cvv);

if ($stmt->execute()) {
    echo "Booking successfully submitted!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>

