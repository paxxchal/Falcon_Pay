<?php
$host = "localhost";
$username = "kriative_falconuser";
$password = "11111968.Gold";
$dbname = "kriative_falcon";

$sitename = "Falcon Pay";
$admin_email = "support@falconpay.com";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    $response = array(
        "error" => "yes",
        "errorMsg" => "Invalid db details"
    );

    echo json_encode($response);
}
