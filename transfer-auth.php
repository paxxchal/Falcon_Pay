<?php
require "header.php";

?>
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets2-path="../assets2/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>OTP</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="assets/icon.png" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets2/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets2/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets2/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets2/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets2/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="../assets2/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="../assets2/vendor/js/helpers.js"></script>
  <!--sweet alerts -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets2/js/config.js"></script>
  <style>
    .bg-primary {
      background: #f9b81f !important;
    }

    .bg-dark {
      background: #15181a !important;
    }
  </style>
</head>


<body>
  <!-- Content -->

  <div class="container-xxl bg-dark">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register Card -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.php" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">

                </span>
                <span class="app-brand-text demo text-body fw-bolder">Falcon Pay</span>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Adventure starts here </h4>
            <p class="mb-4">Enter the Transfer code that was sent to your email</p>

            <form id="formAuthentication" class="mb-3" method="post">

              <div class="mb-3">
                <label for="otp" class="form-label">Transfer code</label>
                <input type="number" class="form-control" id="otp" name="otp" placeholder="Enter Code" />
              </div>



              <button class="btn btn-primary d-grid w-100" type="submit" name="confirm">Confirm</button>
            </form>


          </div>
        </div>
        <!-- Register Card -->
      </div>
    </div>
  </div>



  <?php
  require "footer.php";

  ?>
  <!-- / Content -->



  <!-- Core JS -->
  <!-- build:js assets2/vendor/js/core.js -->
  <script src="../assets2/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets2/vendor/libs/popper/popper.js"></script>
  <script src="../assets2/vendor/js/bootstrap.js"></script>
  <script src="../assets2/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="../assets2/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="../assets2/js/main.js"></script>

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
<?php
$user_id = $id;

if (isset($_POST['confirm'])) {
  $subject = "New Transfer";
  $mail =  $_SESSION['mail'];
  $amount = $_SESSION['amount'];
  $currency = $_SESSION['currency'];
  $description = $_SESSION['description'];
  $otp = $_POST['otp'];
  $date = date("l jS \of F Y");
  $unix_time = time();
  $status = "pending";
  $rand = rand();

  if ($otp == $dbotp) {
    $ava_bal = $rem_bal - $amount;



    $count_mail = mysqli_query($conn, "SELECT * FROM users WHERE `email` = '$mail' OR `acc_no` = '$mail'");
    if (mysqli_num_rows($count_mail) > 0) {
      $fetch_mail = mysqli_fetch_assoc($count_mail);
      $mail_bal = $fetch_mail['balance'];
      $to_email = $fetch_mail['email'];
      $add_bal = intval($amount) + intval($mail_bal);
      $message = "<p>You just received ₦$amount from $username.</p>
     <p>Thank you for using Falcon Pay</p>";
      sendmail($to_email, $subject, $message);



      $message = "<p>You just sent ₦$amount to $mail.</p>
     <p>Thank you for using Falcon Pay</p>";

      $message = "
     <p>You just initiated a transfer. Below are the details of the transfer</p>
     <table>
     <tr>
     <td><b>Amount: &nbsp;</b></td>
     <td>₦$amount</td>
     </tr>
     
     <tr>
     <td><b>Recipient: &nbsp;</b></td>
     <td>$mail</td>
     </tr>
     
     <tr>
     <td><b>Source: &nbsp;</b></td>
     <td>From Credit Account</td>
     </tr>
     
     <tr>
     <td><b>Status: &nbsp;</b></td>
     <td>Successful</td>
     </tr>
     
     </table>
     <p>If you did not initiate this transfer or need help securing your account, please contact us at contact@falconpay.com</p>
     
     ";

      sendmail($email, $subject, $message);


      $sql2 = mysqli_query($conn, "UPDATE users SET balance = '$ava_bal' WHERE id = $user_id");

      $sql3 = mysqli_query($conn, "UPDATE users SET balance = $add_bal WHERE `email` = '$mail' OR `acc_no` = '$mail'");
      //OUTWARD TRANSACTION
      $sql = "INSERT INTO transactions(`user_id`,`amount`,`type`,`status`,`date`,`unix_time`, `currency`)VALUES('$user_id','$amount','transfer out','approved','$date','$unix_time','NGN')";

      $insertTrx = mysqli_query($conn, $sql);

      //INWARD TRANSACTION

      $get_user = mysqli_query($conn, "SELECT id FROM users WHERE email='$mail' OR acc_no='$mail'");
      $to = mysqli_fetch_assoc($get_user);
      $to_id = $to['id'];
      $sql = "INSERT INTO transactions(`user_id`,`amount`,`type`,`status`,`date`,`unix_time`, `currency`)VALUES('$to_id','$amount','Transfer in','approved','$date','$unix_time','USD')";

      $insertTrx = mysqli_query($conn, $sql);

      echo "
      <script>
      swal('Transfer Successful', 'Your transaction was successful', 'success')
      .then(()=>{
          location.replace('index.php')
      });
      </script>
         ";
    } else {
      echo "
      <script>
      swal('An error occurred', 'Email unknown', 'error');
      </script>
    ";
    }
  } else {
    echo "
      <script>
      swal('Oops', 'Transfer code invalid', 'error');
      </script>
    ";
  }
}

?>