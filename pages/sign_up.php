
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link  rel="icon" href="../assets/images/index/icons8-circled-d-32.png" type="image/x-icon">

  <title>Dynasty Hotels</title>
  <link rel="stylesheet" href="../assets/css/sign_up.css">
</head>
<body>
<?php
// Start the session to access session variables
session_start();

// Example session check (adjust to match your session variables)
$isLoggedIn = isset($_SESSION['user_id']); // Assuming 'user_id' is set upon login
?>

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
            <li><a href="food.php">Food</a></li>
            <li><a href="wedding.php">Wedding</a></li>
            <li><a href="Booking.php">Booking</a></li>
            <li><a href="about_us.php">About us</a></li>
         </ul>
      </nav>

      <nav class="nav-right">
         <?php if ($isLoggedIn): ?>
            <div class="profile" onclick="toggleDropdown(event)">
               <div class="avatar"><?php echo $firstLetter; ?></div>
               <div class="dropdown" id="dropdownMenu">
                  <a href="editprofileform.php">Edit Profile</a>
                  <a href="../backend/auth/logout.php">Logout</a>
               </div>
            </div>
         <?php else: ?>
            <ul>
               <li>
                  <a href="login.php" class="sign-in-btn">
                     <img src="../assets/images/index/account.png" alt="Sign In Icon">
                     Sign In
                  </a>
               </li>
               <li><a href="sign_up.php" class="sign-up-btn">Register</a></li>
            </ul>
         <?php endif; ?>
      </nav>
   </div>
</header>
<form method="post" action="../backend/auth/signup.php">
    <h2>Sign Up Form</h2>
    <?php
    if (isset($_SESSION['signup_error']) && !empty($_SESSION['signup_error'])) {
        echo '<p class="error-message">' . $_SESSION['signup_error'] . '</p>';
        unset($_SESSION['signup_error']);
    }
    if (isset($_SESSION['signup_success']) && !empty($_SESSION['signup_success'])) {
        echo '<p class="success-message">' . $_SESSION['signup_success'] . '</p>';
        unset($_SESSION['signup_success']);
    }
    ?>
    <label for="username">Enter your Name :</label>
    <input type="text" name="username" id="username" placeholder="Enter your name">
    <br>
    <label for="email">Enter your E-mail :</label>
    <input type="email" name="email" id="email" placeholder="Enter your email">
    <br>
    <label for="password">Enter your Password :</label>
    <div class="password-field">
        <input type="password" name="password" id="password" placeholder="Enter your password">
        <span class="toggle-password" onclick="togglePassword('password')">Show</span>
    </div>
    <br>
    <label for="confirm_password">Confirm your Password :</label>
    <div class="password-field">
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your password">
        <span class="toggle-password" onclick="togglePassword('confirm_password')">Show</span>
    </div>
    <br>
    <button type="submit" name="signup">Sign Up</button>
    <p>Already have an account? <a href="login.php">Sign In</a></p>
</form>

<script src="../assets/js/sign_up.js" defer></script>
</body>
</html>
