<?php
session_start();
require "./config.php";

//require "coingecko-api.php";

//$_SESSION['user_id']=160;
if(!isset(($_SESSION['user_id']))){
  header("location:auth.php");
}
else{
  $id=$_SESSION['user_id'];
  $query=mysqli_query($conn,"SELECT * FROM `users` WHERE `id`='$id'");
  if(mysqli_num_rows($query)>0){
    $row=mysqli_fetch_assoc($query);
    $username=$row['username'];
    $name=$row['name'];
    $email=$row['email'];
    $phone=$row['phone'];
    $address=$row['address'];
    $image=$row['image_src'];
    $ref=$row['refer'];
    $ref_bonus=$row['ref_bonus'];
    $last_login = $row['last_login'];
    $organisation = $row['organisation'];
    $city=$row['city'];
    $zip=$row['zip_code'];
    $custom_message=$row['custom_message'];
    $rem_bal = $row['balance'];
    $account_number = $row['acc_no'];
    $dbotp=$row['otp'];
    $acc_status=$row['status'];
    $kyc_status=$row['kyc_status'];
    $allowed=$row['allowed'];
    if($allowed=="false"){
        header("Location: activate");
    }
  }
  $total_deposited_query=mysqli_query($conn,"SELECT SUM(amount) FROM `transactions` WHERE `user_id`='$id' AND `type`='deposit' AND status='approved'");
  if(mysqli_num_rows($total_deposited_query)>0){
      $total_row=mysqli_fetch_assoc($total_deposited_query);
      $total_deposited=$total_row['SUM(amount)'];
      
  }
  else{
    $total_deposited=0;
  }
  if($total_deposited==""){
  $total_deposited=0;
  }
  $total_withdraw_query=mysqli_query($conn,"SELECT SUM(amount) FROM `transactions` WHERE `user_id`='$id' AND `type`='withdraw' AND status='approved'");
  if(mysqli_num_rows($total_withdraw_query)>0){
      $total_row=mysqli_fetch_assoc($total_withdraw_query);
      $total_withdraw=$total_row['SUM(amount)'];
      
  }
  if($total_withdraw==""){
    $total_withdraw=0;
  }
  $get_fees = mysqli_query($conn, "SELECT * FROM fees");
  $card_creation_fee_row = mysqli_fetch_assoc($get_fees);
  $card_creation_fee = $card_creation_fee_row['card'];
   
 $accounts=mysqli_query($conn,"SELECT * FROM `accounts` WHERE `user_id`='$id'");
    if(mysqli_num_rows($accounts)>0){
      
      $row2=mysqli_fetch_assoc($accounts);
      
      
      $amount=$row2['amount'];
      $plan=$row2['plan'];
      $firstday=$row2['duration'];
      $today= time();
      $isactive=$row2['active'];
      $days=round(($today-intval($firstday))/86400,2) ;
      $profit=$row2['profit'];
      $ref_bonus=$row2['balance'];
       
      
      
      
      //$profit=round(($roi/100)*$days*$amount,3);
       
      
    }

    $get_sum_credits=mysqli_query($conn, "SELECT SUM(amount) FROM transactions WHERE user_id='$id' AND type='transfer in'");
    $total_credit=mysqli_fetch_assoc($get_sum_credits);
    $sum_credit=$total_credit["SUM(amount)"];

    $get_sum_debits=mysqli_query($conn, "SELECT SUM(amount) FROM transactions WHERE user_id='$id' AND type='transfer out'");
    $total_debit=mysqli_fetch_assoc($get_sum_debits);
    $sum_debit=$total_debit["SUM(amount)"];

    $get_total_portifolio_balance = mysqli_query($conn,"SELECT SUM(balance) FROM portifolios WHERE `user_id` = '$id'");
    if(mysqli_num_rows($get_total_portifolio_balance)>0){
      $total_portifolio_balance=mysqli_fetch_assoc($get_total_portifolio_balance);
      $btc_balance=round($total_portifolio_balance['SUM(balance)'],6);
      $balance = round($btc_balance,2);
  }
      
   
       
  
    }

    $overall_portifolio = mysqli_query($conn, "SELECT * FROM `portifolios` WHERE `user_id` = '$id'");
    $num_portifolio = mysqli_num_rows($overall_portifolio);

    $active_portifolio = mysqli_query($conn, "SELECT * FROM `portifolios` WHERE `user_id` = '$id' AND `status` = 'active'");
    $num_active_portifolio = mysqli_num_rows($active_portifolio);

    $settled_portifolio = mysqli_query($conn, "SELECT * FROM `portifolios` WHERE `user_id` = '$id' AND `status` = 'settled'");
    $num_settled_portifolio = mysqli_num_rows($settled_portifolio);
    
    $total_profit_query=mysqli_query($conn,"SELECT SUM(profit) FROM `portifolios` WHERE `user_id`='$id'");
  if(mysqli_num_rows($total_profit_query)>0){
      $total_prow=mysqli_fetch_assoc($total_profit_query);
      $total_profit=$total_prow['SUM(profit)'];
      
  }
  if($total_profit==""){
    $total_profit=0;
  }

      ?>