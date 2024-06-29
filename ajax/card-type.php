<?php
require "../config.php";
$slug = $_POST['slug'];
$get_card = mysqli_query($conn, "SELECT * FROM card_types WHERE slug='$slug'");
if (mysqli_num_rows($get_card) > 0) {
    $row = mysqli_fetch_assoc($get_card);
    $min = $row['min'];
    $price = $row['price'];

    echo json_encode(array(
        "min" => $min,
        "price" => $price
    ));
}
