<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require "PHPMailer/vendor/autoload.php";
 function sendmail($to,$subject,$message,$attachment=null,$name=""){
     
     $to=$to;
     $subject=$subject;
     
     $file="https://tatcoin.net/images/w_logo.png";
     $body="<html>  
     <body style='color: #000; font-size: 16px; text-decoration: none; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; background-color: #efefef;'>
         
         <div id='wrapper' style='max-width: 600px; margin: auto auto; padding: 20px;'>
             
             <div id='logo' style='color:#E1B530;padding:10px;'>
                 <center><h1 style='margin: 0px;'>
                 <img src='https://ctcreditconnect.com/img/logo.png' style='width:150px'/>
                 </h1></center>
             </div>
                 
             <div id='content' style='font-size: 16px; padding: 25px; background-color: #fff;
                 moz-border-radius: 10px; -webkit-border-radius: 10px; border-radius: 10px; -khtml-border-radius: 10px;
                 border-color: gold; border-width: 4px 1px; border-style: solid;position:relative;top:-180px;'>
 
                 <h1 style='font-size: 22px;'><center>$subject</center></h1>
                 
                 <p>Hi $name,</p>
 
                  $message

                 <p> 
                 Best Regards!<br>
                 Management,<br>
                 ctcreditconnect
                 
                 </p>
                 <br />
                 <p><center><a href='https://ctbankingconnect.com'></a></center></p>
 
                 <p style='display: flex; justify-content: center; margin-top: 10px;'><center>
                      
                      </div>
                 </center></p>
                 
             </div>
             <div id='footer1' style='margin-bottom: 20px; padding: 0px 8px; text-align: center;background-color: #e5e7e9; padding: 10px;position:relative;top:-180px;'>
             
             Have a problem? contact us. We're active from Mondays to Fridays 8am - 5pm, then Saturdays 10am - 4pm
             <p>
             Landwehrstraße 11, 74572 Blaufelden, Germany
             </p>
             
        </div>
             <div id='footer' style='margin-bottom: 20px; padding: 0px 8px; text-align: center;position:relative;top:-180px;'>

                  Copyright ctcreditconnect 2023.
             </div>
         </div>
     </body>
 </html>
 ";


$mail=new PHPMailer(true);
$mail->SMTPDebug=0;
$mail->isSMTP(true);
$mail->SMTPAuth = true;
$mail->Port = 587;
$mail->Host="mail.ctcreditconnect.com";
$mail->Username="support@ctcreditconnect.com";
$mail->Password="Jesusislord123$";


$mail->isHTML(true);
$mail->setFrom("support@ctcreditconnect.com","ctcreditconnect");
$mail->addAddress($to);
$mail->Subject=$subject;
$mail->Body=$body;
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);


$sendmail=$mail->send();

/*$headers ='From: ctbankingconnect <support@ctbankingconnect.com>'. "\r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html;charset=UTF-8"."\r\n";
$sendmail=mail($to,$subject,$body,$headers);
*/
 }

?>