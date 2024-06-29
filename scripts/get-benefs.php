<?php
session_start();
$id=$_POST['val'];
require "../config.php";

$query = mysqli_query($conn, "SELECT * FROM beneficiaries WHERE id='$id'");
$results = array();
if(mysqli_num_rows($query)>0){
    $beneficiaries=mysqli_fetch_assoc($query);
        $beneficiary_name = $beneficiaries['name'];
        $aza=$beneficiaries['account_number'];
        $zip=$beneficiaries['zip'];
        $bank_name=$beneficiaries['bank_name'];
        $home_address=$beneficiaries['address'];

        $result = array(
            "name"=>"$beneficiary_name",
            "account"=>"$aza",
            "zip"=>"$zip",
            "bank"=>"$bank_name",
            "address"=>"$home_address",
            "bank_name"=>"$bank_name",
        );

        echo json_encode($result);

       
    
}
        ?>