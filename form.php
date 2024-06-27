<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "./config.php";
require "./mail.php";


?>
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets2-path="../assets2/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Register</title>

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
</head>


<body>
  <!-- Content -->

  <div class="container-xxl light-bg">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register Card -->
        <div class="card ">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="../index.php" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">

                </span>
                <span class="app-brand-text demo  fw-bolder">Falcon Pay</span>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Tell us more about yourself</h4>
            <p class="mb-4">Make your payment experience easy and fun!</p>

            <form id="formAuthentication" class="mb-3" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="email" class="form-label">Full name</label>
                <input type="text" class="form-control" id="email" name="fullname" value='' placeholder="Full name" required />
              </div>
              <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required />
              </div>

              <div class="mb-3">
                <label for="organisation" class="form-label">Employment status</label>

                <select name="organisation" class="form-control" required placeholder="Employment status">
                  <option value="" hidden selected disabled>Employment status</option>
                  <option value="Employed">Employed</option>
                  <option value="Unemployed">Unemployed</option>
                  <option value="Self employed">Self employed</option>
                  <option value="Retired">Retired</option>

                </select>
              </div>
              <div class="mb-3">
                <label for="position" class="form-label">Job title</label>
                <input type="text" class="form-control" id="position" name="position" placeholder="Which position in your organisation do you operate?" required />
              </div>
              <div class="mb-3">
                <label for="salary" class="form-label">Annual income</label>
                <select name="salary" class="form-select">
                  <option value="$10,000 - $99,000">$10,000 - $99,000</option>
                  <option value="$100,000 - $499,000">$100,000 - $499,000</option>
                  <option value="$500,000 and above">$500,000 and above</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="salary" class="form-label">What Kind of account are you creating</label>
                <select name="salary" class="form-select">
                  <option value="current">Current Account</option>
                  <option value="savings">Savings Account</option>

                </select>
              </div>


              <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone number" required />
              </div>

              <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Where are you currently based?" required />
              </div>

              <div class="mb-3">
                <label for="address" class="form-label">Contact address</label>
                <textarea class="form-control" id="address" name="address" placeholder="Address" required></textarea>
              </div>

              <div class="mb-3">
                <label for="zip" class="form-label">Zip code</label>
                <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip code" required />


              </div>

              <div class="mb-3">
                <label for="license-front" class="form-label">Drivers License</label>
                <input type="file" class="form-control" id="license-front" name="license-front" placeholder="Drivers license" required />
                <small>
                  Front
                </small>

              </div>
              <div class="mb-3">
                <label for="license-rear" class="form-label">Drivers License</label>
                <input type="file" class="form-control" id="license-rear" name="license-rear" placeholder="Drivers license" required />
                <small>
                  Rear
                </small>

              </div>

              <div class="mb-3">
                <label for="bill" class="form-label">Utility Bill</label>
                <input type="file" class="form-control" id="bill" name="bill" placeholder="Utility Bill" required />


              </div>
              <button class="btn btn-primary d-grid w-100">Continue</button>
            </form>


          </div>
        </div>
        <!-- Register Card -->
      </div>
    </div>
  </div>

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
if ($_POST) {
  $id = $_SESSION['user_id'];
  $email = $_SESSION['email'];


  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
  $zip = mysqli_real_escape_string($conn, $_POST['zip']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $organisation = mysqli_real_escape_string($conn, $_POST['organisation']);
  $city = mysqli_real_escape_string($conn, $_POST['city']);
  $salary = mysqli_real_escape_string($conn, $_POST['salary']);
  $position = mysqli_real_escape_string($conn, $_POST['position']);

  $license_front = $_FILES['license-front']['name'];
  $license_front_tmp = $_FILES['license-front']['tmp_name'];


  $license_rear = $_FILES['license-rear']['name'];
  $license_rear_tmp = $_FILES['license-rear']['tmp_name'];

  $bill = $_FILES['bill']['name'];
  $bill_tmp = $_FILES['bill']['tmp_name'];

  $destination = "images/";

  $accepted_files = ['png', 'jpg', 'jpeg', 'svg', 'gif'];



  $target_front = $destination . basename($license_front);
  $target_rear = $destination . basename($license_rear);
  $target_bill = $destination . basename($bill);

  $frontFileType = strtolower(pathinfo($target_front, PATHINFO_EXTENSION));
  $rearFileType = strtolower(pathinfo($target_rear, PATHINFO_EXTENSION));
  $billFileType = strtolower(pathinfo($target_bill, PATHINFO_EXTENSION));

  for ($i = 0; $i <= count($accepted_files); $i++) {
    if (in_array($frontFileType, $accepted_files) && in_array($rearFileType, $accepted_files) && in_array($billFileType, $accepted_files)) {
      $move1 = move_uploaded_file($license_front_tmp, $target_front);
      $move2 = move_uploaded_file($license_rear_tmp, $target_rear);
      $move3 = move_uploaded_file($bill_tmp, $target_bill);


      //generate random account number
      //generate random password
      $comb = '1234567890';
      $pass = array();
      $combLen = strlen($comb) - 1;
      for ($i = 0; $i < 10; $i++) {
        $n = rand(0, $combLen);
        $pass[] = $comb[$n];
      }
      $acc = implode($pass);




      $update = mysqli_query($conn, "UPDATE users SET `username`='$username', `name`='$fullname',`phone`='$phone',`zip_code`='$zip',`address`='$address',`organisation`='$organisation',`city`='$city',`salary`='$salary', position='$position', `acc_no`='$acc',`utility_bill`='$target_bill',`license_front`='$target_front',`license_rear`='$target_rear' WHERE id='$id'");
      //$update2=mysqli_query($conn,"UPDATE `accounts` SET `plan`='$investmentplan' WHERE `user_id`='$id'");
      if ($update) {
        $_SESSION['user_id'] = $id;
        $path = 'auth.php';
        $nextstep = $path;
        echo "<script>window.location.href = '$nextstep';</script>";
        exit();

        $subject = "Account created successfully";
        $message = " <p>Your account at Falcon Pay has successfully been created.</p>
			<p>Account number: $acc</p>
			<p>Password: Same as account password</p>
			";
        $sendmail = sendmail($email, $subject, $message);
      } else {

        echo mysqli_error($conn);
      }
    } else {
?>
      <script>
        swal('Oops!', 'Only png, Jpg and gif files are allowed', 'error');
      </script>
<?php
    }
  }
}
?>

<style>
  .light-bg {
    background-color: #15181a;
  }

  .modal-content {
    background-color: #000021;
    color: white;
  }

  .modal-header h3 {
    color: white !important;
  }

  .btn-primary {
    background: #FFB400;
    border: #FFB400
  }

  .card {
    background-color: #000 !important;
  }

  .light-bg,
  .layout-page {
    background-color: #15181a !important;
  }


  .bg-dark,
  .layout-navbar,
  .navbar.bg-dark {
    background: #000 !important;
  }

  a {
    color: #FFB400 !important
  }
</style>