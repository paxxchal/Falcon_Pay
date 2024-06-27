<?php
session_start();
require "./config.php";
require "./mail.php";
$email = $_REQUEST['user-email'];


?>
<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets2-path="../assets2/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>OTP</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../logo.png" />

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


    <!-- loader -->

    <style>
      #loader {
        position: fixed;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        z-index: 99999;
        background: #252520;
        display: flex;
        align-items: center;
        justify-content: center;
        user-select: none;
      }

      #loader .loading-icon {
        width: 42px;
        height: auto;
        animation: loadingAnimation 0.5s ease-in-out infinite;
      }

      img,
      svg {
        vertical-align: middle !important;
      }

      @keyframes loadingAnimation {
        0% {
          transform: rotate(0deg);
        }

        100% {
          transform: rotate(180deg);
        }
      }
    </style>
    <script>
      // setInterval(function(){
      //     document.getElementById("loader").style.display="none";
      // },2000)

      window.addEventListener('beforeunload', function(e) {
        // Display the custom loader before the user leaves the page
        document.getElementById('loader').style.display = 'flex';

        // You can also return a message that the browser will display in a confirmation dialog
        //e.returnValue = 'You have unsaved changes. Are you sure you want to leave this page?';
      });
    </script>


    <div id="loader" style="display:none;" class=" justify-content-center align-items-center">
      <center>
        <img src="assets/img/loading-icon.png" alt="icon" class="loading-icon">
      </center>

    </div>

    <!-- * loader -->


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
            <h4 class="mb-2">Your adventure starts here</h4>
            <p class="mb-4">Make your payment experience easy and fun!</p>

            <form id="formAuthentication" class="mb-3" method="post">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" value='<?php echo $email; ?>' placeholder="Enter your username" readonly />
              </div>
              <div class="mb-3">
                <label for="otp" class="form-label">OTP</label>
                <input type="number" class="form-control" id="otp" name="otp" placeholder="Enter OTP" />
              </div>



              <button class="btn btn-primary d-grid w-100" type="submit">Confirm</button>
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
  $email = $_POST['email'];
  $otp = mysqli_real_escape_string($conn, $_POST['otp']);

  $subject = "Account created successfully";

  $comb = '0987654321';
  $pass = array();
  $combLen = strlen($comb) - 1;
  for ($i = 0; $i < 8; $i++) {
    $n = rand(0, $combLen);
    $pass[] = $comb[$n];
  }
  $customerId = implode($pass);
  $message = "
    <p>Your account at Falcon Pay has been created successfully.</p>
    <p>Here are the Details to access your account</p>
     
     Password: Same as account password.</p>
     <p>Do not share these details with anyone</p>
    ";





  $query = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email'");
  if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $dbotp = $row['otp'];
    $id = $row['id'];

    if ($otp == $dbotp) {
      $update = mysqli_query($conn, "UPDATE users SET `status`='verified', `customerId`='$customerId' WHERE email='$email'");
      if ($update) {
        $nextstep = 'auth.php?id=' . $id;
        $_SESSION['user_id'] = $id;
        $_SESSION['email'] = $email;
        $_SESSION['auth'] = true;

        echo "
                <script>
                window.location.replace('$nextstep');
                </script>
                
                ";
        $sendmail =  sendmail("$email", "$subject", "$message");


        if ($sendmail) {
          // echo json_encode($response);
        }
      }
    } else {
      $sqlError = mysqli_error($conn);

      echo "
            <script>
            swal('Oops','OTP not valid','error');
            </script>
            ";
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


  .light-bg,
  .layout-page {
    background-color: #15181a !important;
  }

  .card {
    background-color: #000 !important;
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
<style>
  body {
    background-color: #15181a !important;
    color: #fff !important;
    margin: auto !important;
  }

  .tf-balance-box {
    background-color: #000 !important;
  }

  h3,
  .text-blue,
  h5 {
    color: #fff !important;
  }

  a {
    color: #DD572D;
  }

  .primary_color {
    color: #DD572D
  }

  .tf-navigation-bar {
    background-color: #000 !important;
    color: #fff;
  }

  .app-header {
    background-image: url("assets/banner.png");
  }

  .bottom-navigation-bar {
    background-color: #000 !important;
  }

  th {
    color: #fff !important;
  }

  td {
    color: #fff !important;
    padding: 10px !important;
  }

  a {
    text-decoration: none !important;
  }

  a:hover,
  a:active {
    color: #DD572D
  }

  .card,
  .modal-content,
  .panel-box,
  .tf-statusbar {
    background-color: #000 !important;
    color: #fff !important;
  }

  .btn-primary,
  .plan-button {
    background-color: #DD572D !important;
    border-color: #DD572D !important;
  }

  /* .container{
            padding: 4px !important;
        } */
</style>