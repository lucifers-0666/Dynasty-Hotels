<?php
// Database connection details
$servername = "localhost";
$username = "root";  // Replace with your DB username
$password = "";      // Replace with your DB password
$dbname = "dynasty_hotels";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$hotel = $_POST['hotel'];
$guests = $_POST['guests'];
$booking_date = $_POST['booking_date'];
$meal_type = $_POST['meal_type'];
$additional_info = $_POST['additional_info'];

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO Food_table (name, email, phone, hotel, guests, booking_date, meal_type, additional_info) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssisss", $name, $email, $phone, $hotel, $guests, $booking_date, $meal_type, $additional_info);

// Execute the statement and check for success
if ($stmt->execute()) {
    echo "Thank you! Your enquiry has been submitted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
