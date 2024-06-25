<?php
$host = "localhost";
$username = "falcon_user";
$password = "1234";
$dbname = "falcon_pay";

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
