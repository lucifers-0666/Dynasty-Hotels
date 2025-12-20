<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../assets/images/index/icons8-circled-d-32.png" type="image/x-icon">
  <title>Login - Dynasty Hotels</title>
  <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
<header>
    <div class="header-container">
        <div class="logo">
            <a href="index.php">
                <img src="../assets/images/index/li_logo.svg" alt="Dynasty Hotels Logo">
            </a>
        </div>
        <nav class="nav-left">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="room.php">Rooms</a></li>
                <li><a href="wedding.php">Wedding</a></li>
                <li><a href="Booking.php">Booking</a></li>
                <li><a href="about_us.php">About us</a></li>
            </ul>
        </nav>
        <nav class="nav-right">
            <ul>
                <li>
                    <a href="login.php" class="sign-in-btn">
                        <img src="../assets/images/index/account.png" alt="Sign In Icon"> Sign In
                    </a>
                </li>
                <li><a href="sign_up.php" class="sign-up-btn">Register</a></li>
            </ul>
        </nav>
    </div>
</header>


    <!-- Client-side error message -->
    <form id="signinForm" method="post" action="../backend/auth/signin.php" class="form-container" novalidate>
    <h2>Sign In</h2>

    <!-- Server-side error -->
    <?php if (isset($_SESSION['signin_error'])): ?>
        <p class="error-message"><?php echo $_SESSION['signin_error']; unset($_SESSION['signin_error']); ?></p>
    <?php endif; ?>

    <!-- Client-side error -->
    <p id="clientError" class="error-message" style="display: none;">Please fill in all fields.</p>

    <!-- Username Field -->
   <!-- Username Field -->
<div class="form-group">
    <label for="username_or_email">Username or E-mail:</label>
    <input
        type="text"
        name="username_or_email"
        id="username_or_email"
        placeholder="Enter your username or email"
        required
    >
    <p id="usernameError" class="error-message" style="display: none;">Please enter your username or email.</p>
</div>

<!-- Password Field -->
<div class="form-group">
    <label for="password">Password:</label>
    <div class="password-container">
        <input
            type="password"
            name="password"
            id="password"
            placeholder="Enter your password"
            required
        >
        <button type="button" id="togglePassword" class="toggle-password">Show</button>
    </div>
    <p id="passwordError" class="error-message" style="display: none;">Please enter your password.</p>
</div>


    <!-- Forgot Password -->
    <div class="forgot-password">
        <a href="editprofileform.php">Forgot Password?</a>
    </div>

    <!-- Submit Button -->
    <button class="color-sub" type="submit" name="signin">Sign In</button>

    <!-- Sign Up Link -->
    <p>Don't have an account? <a class="color-signup" href="sign_up.php">Sign Up</a></p>
</form>


<script src="../assets/js/login.js" defer></script>

</body>
</html>

