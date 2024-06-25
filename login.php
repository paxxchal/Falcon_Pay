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
    <title>Login</title>
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
     <!-- preloade -->
     <div class="preload preload-container">
        <div class="preload-logo">
          <div class="spinner"></div>
        </div>
      </div>
    <!-- /preload -->    
    <div class="mt-7 login-section">
        <div class="tf-container">
            <center>
                <img src="assets/logo.png" style="width:150px;"/>
            </center>
            <form class="tf-form" method="post">
                    <h1>Login</h1>
                    <div class="group-input">
                        <label>Email</label>
                        <input type="text" placeholder="Example@gmail" name="email">
                    </div>
                    <div class="group-input auth-pass-input last">
                        <label>Password</label>
                        <input type="password" class="password-input" placeholder="Password" name="password">
                        <a class="icon-eye password-addon" id="password-addon"></a>
                    </div>
                    <a href="forgot-password" class="auth-forgot-password mt-3 text-dark">Forgot Password?</a>

                <button type="submit" class="tf-btn accent large">Log In</button>

            </form>
             
            <p class="mb-9 fw-3 text-center ">Don't have a Account? <a href="register" class="auth-link-rg" >Sign up</a></p>
        </div>
    </div>
    
  



    <script type="text/javascript" src="javascript/jquery.min.js"></script>
    <script type="text/javascript" src="javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="javascript/password-addon.js"></script>
    <script type="text/javascript" src="javascript/main.js"></script>
    <script type="text/javascript" src="javascript/init.js"></script>


</body>

</html>

<?php
if($_POST){
    $customerId=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $query=mysqli_query($conn,"SELECT * FROM `users` WHERE email = '$customerId' AND NOT `role`='admin'");
    if(mysqli_num_rows($query)>0){
        $row=mysqli_fetch_assoc($query);
        $dbpass=$row['password'];
        $status=$row['status'];
        $role=$row['role'];
        $id=$row['id'];
        $fakename=$row['email'];
        if($status=="verified" || $status=="active"){
           if(password_verify($password,$dbpass)){
               $dateTime = date("l jS \of F Y h:i:s A");
               mysqli_query($conn, "UPDATE `users` SET `last_login`='$dateTime' WHERE `id`='$id'");
            $_SESSION['user_id']=$id;
            $_SESSION['auth']=true;
           // $_SESSION['email']=$email;
            $nextstep='./auth.php?id='.$id;
            
            //send otp on login
             $subject="OTP Verification";
 
             //generate random password
             $comb = '1234567890';
  $pass = array(); 
  $combLen = strlen($comb) - 1; 
  for ($i = 0; $i < 6; $i++) {
      $n = rand(0, $combLen);
      $pass[] = $comb[$n];
  }
     $OTP=implode($pass); 
 
     //generate otp email message
     $message="<p>Your one time password for <?php echo $sitename; ?> is <b>$OTP</b></p>
     Do not share this OTP with anyone.
     ";
     mysqli_query($conn, "UPDATE users SET otp='$OTP' WHERE email='$fakename'");
       // sendmail($fakename,$subject,$message);
           header("Location: $nextstep");
        
           }

           else{
              
            echo"
            <script>
            swal('Oops','Invalid details','error')
            </script>
            ";

           }
        }
        elseif($status=="not verified"){
            if($role=='admin'){
                echo"
        <script>
        swal('Oops','Invalid details','error')
        </script>
        ";
            }
            else{
                      $path="./otp.php";
                        $nextstep=$path.'?user-email='.$customerId;
                        

                       echo"
            <script>
          window.location.replace('$nextstep');
           </script>
           ";
            }
                  

        }
        elseif($status=="suspended"){
            echo"
                <script>
                swal('Oops','Invalid details','error')
                </script>
                ";
        }
        else{
            $_SESSION['user_id']=$id;
            $path="./index.php";
                        $nextstep=$path;
                        echo"
            <script>
            window.location.replace('$nextstep');
            </script>
            ";

                        
        }
    }
    else{
        echo"
        <script>
        swal('Oops','Invalid details','error')
        </script>
        ";
    }
  
}
    

?>