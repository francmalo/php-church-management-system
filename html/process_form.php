<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_username'])){
    header('location:../index.php');	
}

include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process head of the family data
    $headFullName = $_POST['headFullName'];
    $headEmail = $_POST['headEmail'];
    $headPhoneNumber = $_POST['headPhoneNumber'];

    // Insert head of the family data into the database (modify this based on your database structure)
    $query = "INSERT INTO family_members (full_name, email, phone_number) VALUES ('$headFullName', '$headEmail', '$headPhoneNumber')";
    mysqli_query($connection, $query);

    // Process family members data
    if (isset($_POST['memberFullName']) && isset($_POST['memberEmail']) && isset($_POST['memberPhoneNumber'])) {
        $memberFullNames = $_POST['memberFullName'];
        $memberEmails = $_POST['memberEmail'];
        $memberPhoneNumbers = $_POST['memberPhoneNumber'];

        // Loop through each family member and insert data into the database
        for ($i = 0; $i < count($memberFullNames); $i++) {
            $memberFullName = $memberFullNames[$i];
            $memberEmail = $memberEmails[$i];
            $memberPhoneNumber = $memberPhoneNumbers[$i];

            // Insert family member data into the database (modify this based on your database structure)
            $query = "INSERT INTO family_members (full_name, email, phone_number) VALUES ('$memberFullName', '$memberEmail', '$memberPhoneNumber')";
            mysqli_query($connection, $query);
        }
    }

    // Redirect or perform additional actions after form submission
    header('Location: success_page.php');
} else {
    // Handle invalid request method or redirect
    header('Location: error_page.php');
}

?>
