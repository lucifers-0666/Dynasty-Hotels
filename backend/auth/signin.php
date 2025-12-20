<?php
session_start();
require '../includes/config.php';

$error = "";

if (isset($_POST['signin'])) {
    $input = $_POST['username_or_email'];
    $password = $_POST['password'];

    if (isset($con)) {
        $stmt = $con->prepare("SELECT id, username, password FROM login WHERE (username = ? OR email = ?)");
        if (!$stmt) {
            $error = "Failed to prepare the statement. Please try again later.";
        } else {
            $stmt->bind_param("ss", $input, $input);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $username, $hashed_password);
                $stmt->fetch();

                if (password_verify($password, $hashed_password)) {
                    $_SESSION['user_id'] = $id;
                    $_SESSION['username'] = $username;
                    header("Location: ../../pages/index.php"); 
                    exit();
                } else {
                    $error = "Incorrect password!";
                }
            } else {
                $error = "Username or email not found!";
            }
            $stmt->close(); // Close the statement
        }
    } else {
        $error = "Database connection not initialized.";
    }

    $con->close(); // Close the database connection

    // Store the error message in session to display on the form page
    $_SESSION['signin_error'] = $error;
    header("Location: ../../pages/login.php"); // Redirect back to the form
    exit();
}


?>
