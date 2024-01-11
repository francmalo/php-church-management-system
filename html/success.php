<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_username'])){
    header('location:../index.php');	
    exit();
}
include "../db_connect.php";
// Display success message
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <!-- Include your CSS styles if needed -->
</head>
<body>

    <div>
        <h1>Success!</h1>
        <p>Your form has been submitted successfully.</p>
        <a href="create_user.php">Go back to create another member</a>
    </div>

    <!-- Include your JS scripts if needed -->
</body>
</html>
