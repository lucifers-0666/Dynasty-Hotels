<?php
session_start();
require '../includes/config.php'; // Database connection

// Initialize variables for error and success messages
$error = $success = "";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate form fields
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format!";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Check if the username or email is already taken
        $query = $con->prepare("SELECT id FROM login WHERE username = ? OR email = ?");
        $query->bind_param("ss", $username, $email);
        $query->execute();
        $query->store_result();

        if ($query->num_rows > 0) {
            $error = "Username or email already taken!";
        } else {
            // Insert new user into the database
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $insert = $con->prepare("INSERT INTO login (username, email, password) VALUES (?, ?, ?)");
            $insert->bind_param("sss", $username, $email, $hashed_password);
            if ($insert->execute()) {
                $success = "Sign-up successful! You can now <a href='login.php'>sign in</a>.";
            } else {
                $error = "An error occurred. Please try again.";
            }
            $insert->close();
        }
        $query->close();
    }
    $con->close();

    // Store messages in session
    $_SESSION['signup_error'] = $error;
    $_SESSION['signup_success'] = $success;

    // Redirect to the form page
    header("Location: ../../pages/sign_up.php");
    exit();
}
?>
