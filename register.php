<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "config.php";
require "mail.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">
    <title>Register</title>
    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="assets/icon.png" />
    <link rel="apple-touch-icon-precomposed" href="assets/icon.png" />
    <!-- Font -->
    <link rel="stylesheet" href="fonts/fonts.css" />
    <!-- Icons -->
    <link rel="stylesheet" href="fonts/icons-alipay.css">
    <link rel="stylesheet" href="styles/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="styles/styles.css" />
    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="192x192" href="app/icons/icon-192x192.png">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <!-- preload -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /preload -->
    <div class="mt-7 login-section">
        <div class="tf-container">
            <center>
                <img src="assets/logo.png" style="width:150px;" />
            </center>
            <form class="tf-form" method="post">
                <h1>Register</h1>
                <div class="group-input">
                    <label>Email</label>
                    <input type="text" placeholder="Example@gmail.com" name="email" required>
                </div>
                <div class="group-input auth-pass-input last my-2">
                    <label>Password</label>
                    <input type="password" class="password-input" placeholder="Password" name="password" required>
                    <a class="icon-eye password-addon" id="password-addon"></a>
                </div>
                <div class="group-input auth-pass-input last my-2">
                    <label>Confirm Password</label>
                    <input type="password" class="password-input" placeholder="Password" name="cpassword" required>
                    <a class="icon-eye password-addon" id="password-addon"></a>
                </div>
                <button type="submit" class="tf-btn accent large">Register</button>
            </form>
            <p class="mb-9 fw-3 text-center">Already have an Account? <a href="login.php" class="auth-link-rg">Sign in</a></p>
        </div>
    </div>
    <?php
    if ($_POST) {
        //$phone=$_POST['phone'];
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        //$full_name=$_POST['fullname'];
        //$username=$_POST['username'];
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        //checks if passwords are the same
        if ($password == $cpassword) {
            //hashes the passwords
            $password = password_hash($password, PASSWORD_BCRYPT);

            //creates a new mail class with phpmailer
            //$mail = new PHPMailer\PHPMailer\PHPMailer();

            $subject = "OTP Verification";

            //generate random password
            $comb = '1234567890';
            $pass = array();
            $combLen = strlen($comb) - 1;
            for ($i = 0; $i < 6; $i++) {
                $n = rand(0, $combLen);
                $pass[] = $comb[$n];
            }
            $OTP = implode($pass);

            //generate otp email message
            $message = "<p>Your one time password for $sitename is <b>$OTP</b></p>Do not share this OTP with anyone.";

            //checks if emails already exists
            $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
            if (mysqli_num_rows($query) == 0) {


                $ip = $_SERVER['REMOTE_ADDR'];
                $ref = ''; // Define $ref and $ref_bonus properly
                $ref_bonus = 0;
                //inserts new data in the database
                $insert = mysqli_query($conn, "INSERT INTO users ( `email`,`password`,`status`,`otp`,`ip_address`,`refer`,`ref_bonus`)VALUES('$email','$password','not verified','$OTP','$ip','$ref','$ref_bonus')");

                if ($insert) {
                    $getid = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
                    if (mysqli_num_rows($getid) > 0) {
                        $row = mysqli_fetch_assoc($getid);
                        $id = $row['id'];
                        $date = date("Y-m-d H:i:s");

                        $create = mysqli_query($conn, "INSERT INTO accounts (user_id, balance, active, amount, plan, created_at) VALUES ('$id', '0', 'no', '0', '2', '$date')");
                        $insert_ref = mysqli_query($conn, "INSERT INTO referrals (user_id, refer_by, join_at) VALUES ('$id', '$ref', '$date')");

                        if (!$create) {
                            echo "<script>swal('Oops','An error occurred','error');</script>";
                        } else {
                            $sendmail = sendmail($email, $subject, $message);
                            header("Location: ./otp.php?user-email=$email");
                        }
                    }
                } else {
                    echo "<script>swal('Oops','Error storing user details','error');</script>";
                    echo "MySQL Error: " . mysqli_error($conn); // Debugging line
                }
            } else {
                echo "<script>swal('Oops','Email already exists','error');</script>";
            }
        } else {
            echo "<script>swal('Oops','Passwords are not the same','error');</script>";
        }
    }
    ?>
    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="javascript/password-addon.js"></script>
    <script type="text/javascript" src="javascript/main.js"></script>
    <script type="text/javascript" src="javascript/init.js"></script>


</body>

</html>