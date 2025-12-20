<?php
session_start();
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$firstLetter = strtoupper($username[0]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/dashboard.css">
</head>
<body>
<div class="navbar">
        <div class="brand">Dashboard</div>
        <div class="profile" onclick="toggleDropdown(event)">
            <div class="avatar"><?php echo $firstLetter; ?></div>
            <div class="dropdown" id="dropdownMenu">
                <a href="editprofileform.php">Edit Profile</a>
                <a href="../backend/auth/logout.php">Logout</a>
            </div>
        </div>
    </div>
    <div class="content">
        <h1>Welcome to the Dashboard</h1>
        <p>This is your main dashboard area.</p>
    </div>

    <script>
        function toggleDropdown(event) 
        {
            var dropdown = document.getElementById("dropdownMenu");
            if (dropdown.style.display === "none" || dropdown.style.display === "") {
                dropdown.style.display = "block";
            } else 
            {
                dropdown.style.display = "none";
            }
            event.stopPropagation(); // Prevent the click event from propagating to the window
        }

        // Close the dropdown if clicked outside
        window.onclick = function(event) {
            var dropdown = document.getElementById("dropdownMenu");
            if (!event.target.closest('.profile')) {
                if (dropdown.style.display === "block") {
                    dropdown.style.display = "none";
                }
            }
        }
    </script>
</body>
</html>


