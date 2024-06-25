<?php
session_start();  // Start a new session or resume the existing session

// If a logout request is detected, destroy the session and redirect to login page
if ($_REQUEST['logout'] == "true") {
    session_destroy();
    header('location: login.php');
    exit();  // Exit the script after redirect to prevent further execution
}

// Check if the user is not logged in by verifying the existence of 'user_id' in the session
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    // header('location: login');
    // exit();  // Exit the script after redirect to prevent further execution

    // For now, we'll just set a dummy user_id to bypass login check
    $_SESSION['user_id'] = 1;  // Assuming 1 is a valid user ID for testing
}

// Remove authentication check
/*
else {
    // If the user is logged in, proceed with further checks
    $id = $_SESSION['user_id'];  // Retrieve the user ID from the session

    // Check if the user has not completed authentication
    if ($_SESSION['auth'] == false) {
        header("Location: login-auth");  // Redirect to authentication page
        exit();  // Exit the script after redirect to prevent further execution
    } else {
        // If the user is authenticated, connect to the database
        require "config.php";

        // Query the database to retrieve user details
        $query = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");

        // Check if the user exists in the database
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);

            // Check if the user is allowed access
            if ($row['allowed'] == "true") {
                // Check if the user's username is not set
                if ($row['username'] == null) {
                    header("location: form.php");  // Redirect to form page to complete profile
                } else {
                    // If the user is allowed and has a username, set allowed variable and redirect to index
                    $allowed = $row['allowed'];
                    header("location: index");
                }
            } else {
                header("location: activate");  // Redirect to account activation page if not allowed
            }
        }
    }
}
*/

require "config.php";

// Assuming the above bypass for user_id is set, retrieve the dummy user's details
$id = $_SESSION['user_id'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);

    if ($row['allowed'] == "true") {
        if ($row['username'] == null) {
            header("location: form.php");
        } else {
            $allowed = $row['allowed'];
            header("location: index");
        }
    } else {
        header("location: activate");
    }
}
