<?php
session_start();

// Logout handling
if (isset($_REQUEST['logout']) && $_REQUEST['logout'] == "true") {
    session_destroy();
    header('location: login.php');
    exit();
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit();
}

// User is logged in, proceed with user data retrieval and checks
require "config.php";

$id = $_SESSION['user_id'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");

if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);

    if ($row['allowed'] == "true") {
        if ($row['username'] == null) {
            header("location: form.php");
        } else {
            $allowed = $row['allowed'];
            header("location: index.php");
        }
    } else {
        header("location: activate.php");
    }
} else {
    // User not found in database
    session_destroy();
    header("location: login.php");
}

exit();
