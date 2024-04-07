<?php
session_start();
if (!isset($_SESSION['email'])) {
    // If the session variable isn't set, redirect back to the login or verification page
    header('Location: login.htm'); // Ensure this path is correct
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css"> <!-- Adjust path as needed -->
</head>
<body>
    <header class="header-logo">
        <h1>Shop Online</h1>
        <p class="dim">the World's Luxury Marketplace. 💵</p>
    </header>
    <div class="container d-flex flex-row-reverse">
        <div class="info-section">
            <img class="store" src="images/resetconfirm.png" alt="Store"> <!-- Adjust src as needed -->
        </div>
        <div class="login-section">
            <h2>Reset Password</h2>
            <form method="post" action="perform_reset.php">
                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password:</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="New Password" required>
                </div>
                <input type="submit" class="btn btn-primary" value="Reset Password">
            </form>
            <p class="login-back-link">
                <a href="login.htm">Login to your account?</a>
            </p>
        </div>
    </div>
    <footer class="footer-logo">
        <p>© 2024 Dollar Karan Preet Singh. All rights reserved.<br> COS80021-Web Application Development</p>
    </footer>
</body>
</html>
