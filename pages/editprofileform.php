<?php
session_start();
require '../backend/includes/config.php'; // Ensure this file includes the database connection

$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$firstLetter = strtoupper($username[0]);

// Initialize variables for error and success messages
$error = $success = "";

// Handle file upload and form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['profile_photo']) && $_FILES['profile_photo']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_photo']['tmp_name'];
        $fileName = $_FILES['profile_photo']['name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileExtension, $allowedExtensions)) {
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $newFileName = $username . '_profile.' . $fileExtension;
            $destPath = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $destPath)) {
                // Save the file path in the database
                $stmt = $con->prepare("UPDATE login SET profile_photo = ? WHERE username = ?");
                $stmt->bind_param("ss", $destPath, $username);
                if ($stmt->execute()) {
                    $success = "Profile photo updated successfully!";
                } else {
                    $error = "Database update failed. Please try again!";
                }
                $stmt->close();
            } else {
                $error = "File upload failed. Check permissions!";
            }
        } else {
            $error = "Invalid file type. Only JPG, PNG, and GIF are allowed!";
        }
    } elseif (isset($_POST['update_password'])) {
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Retrieve the user's current hashed password from the database
        $stmt = $con->prepare("SELECT password FROM login WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        $stmt->close();

        if (password_verify($old_password, $hashed_password)) {
            if ($new_password === $confirm_password) {
                $new_hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

                $stmt = $con->prepare("UPDATE login SET password = ? WHERE username = ?");
                $stmt->bind_param("ss", $new_hashed_password, $username);
                if ($stmt->execute()) {
                    $success = "Password updated successfully!";
                } else {
                    $error = "An error occurred while updating the password. Please try again.";
                }
                $stmt->close();
            } else {
                $error = "New passwords do not match!";
            }
        } else {
            $error = "Old password is incorrect!";
        }
    } else {
        $error = "No file uploaded or password fields filled.";
    }
}

// Retrieve the current profile photo from the database
$stmt = $con->prepare("SELECT profile_photo FROM login WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($profilePhoto);
$stmt->fetch();
$stmt->close();

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/editprofile.css">
</head>
<body>
    <div class="navbar">
        <div class="brand">Profile</div>
        <a class="clr" href="index.php"> Back To Home</a>
        <div class="profile" onclick="toggleDropdown(event)">
            <div class="avatar">
                <?php if (!empty($profilePhoto) && file_exists($profilePhoto)): ?>
                    <img src="<?php echo $profilePhoto; ?>" alt="Profile Photo">
                <?php else: ?>
                    <?php echo $firstLetter; ?>
                <?php endif; ?>
            </div>
            <div class="dropdown" id="dropdownMenu">
                <a href="editprofileform.php">Edit Profile</a>
                <a href="../backend/auth/logout.php">Logout</a>
            </div>
        </div>
    </div>
    <div class="container">
        <h1>Edit Profile</h1>
        <?php if ($error): ?>
            <div class="message error"><?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="message success"><?php echo $success; ?></div>
        <?php endif; ?>

        <form action="editprofileform.php" method="post" enctype="multipart/form-data">
           
            <div class="form-group">
                <label for="old_password">Old Password</label>
                <input type="password" name="old_password" id="old_password">
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" name="new_password" id="new_password">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm New Password</label>
                <input type="password" name="confirm_password" id="confirm_password">
            </div>
            <div class="form-group">
                <label for="profile_photo">Upload Profile Photo</label>
                <input type="file" name="profile_photo" id="profile_photo">
            </div>
            <div class="form-group">
                <button type="submit" name="update_password">Update Password</button>
            </div>
        </form>
    </div>
    <script src="../assets/js/ed.js" defer></script>
</body>
</html>

