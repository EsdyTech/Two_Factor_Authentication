

<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (!isset($_SESSION['email']))
{

  echo "<script type = \"text/javascript\">
  window.location = (\"index.php\");
  </script>";

}


 if(isset($_POST['login']))
  {
 
  $sessionEemail = $_SESSION['email'];
  $otp = $_POST['otp'];
  $checkTimesUsed = 0;

  $result=mysqli_query($con,"select * from users where email='$sessionEemail' and otpGen='$otp' and timesUsed='$checkTimesUsed'");
  $row=mysqli_fetch_array($result);
  $count = mysqli_num_rows($result);				

  if($count > 0)
  {
        $timesUsed = 1;        
        $query=mysqli_query($con,"update users set timesUsed='$timesUsed' where  email='$sessionEemail'");

    echo "<script type = \"text/javascript\">
    alert(\"Signin was Successful!\");
    window.location = (\"mainDashboard.php\")
    </script>";
  }

else
{  
    $msg = "<font color='red'><b><h3>An Incorrect OTP was entered!</h3></b></font>";

}

}

  ?>

<?php

if(isset($_POST['genNewOTP']))
  {
 
  $sessionEemail = $_SESSION['email'];

  $result=mysqli_query($con,"select * from users where email='$sessionEemail'");
  $row=mysqli_fetch_array($result);
  $count = mysqli_num_rows($result);				

  if($count > 0)
  {

    function Random($length = 5) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }
    
    $_SESSION['newOtpGen'] = Random();
        $timesUsed = 0;      
     date_default_timezone_set('Africa/Lagos'); $dateGen =  date('Y-m-d H:i:s');

        $subject = "A Two Factor Authentication Login System";
        $body = "Use this one time password (OTP) <b><h3>".$_SESSION['newOtpGen']."</h3></b> 
        to complete your login process for your two factor authentication.... Thanks. 
        <b><i>NOTE:OTP can only be used once!</i></b>";
        
        require_once ('php-mailer/PHPMailerAutoload.php');
        
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure='ssl';
        $mail->Host='smtp.googlemail.com';  
        $mail->Port = '465';
        $mail->isHTML();
        $mail->Username ='sawdykdevtest@gmail.com';
        $mail->Password ='sawdykdevtest2020';
        $mail->SetFrom('no-reply@howcode.org');
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($sessionEemail);
        
        if(!$mail->Send()) 
        {
            $msg = " An Error Ocuured while trying to send Mail, Kindly Contact Administrator. Thanks!";
        } 
        else 
        {

$query=mysqli_query($con,"update users set otpGen='$_SESSION[newOtpGen]', timesUsed='$timesUsed', dateGen='$dateGen' where  email='$sessionEemail'");

        $msg = "<font color='green'><b><h3>An Email has been sent to <font color='red'>".$sessionEemail."</font> with a new one time password (OTP)!</h3></b></font>";

  }
  }
else
{  
    $msg = "<font color='red'><b><h3>Invalid Login Credentials!, Contact the Administrator!</h3></b></font>";

}

}

  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Two Factor Authentication System</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

         <!--Beginning-->
        <section class="signup" style="margin-top:-150px;">
            <div class="container">
                <div class="signup-content">
                        <h2 class="form-title" style="margin-left:50px;">A Two Factor Authentication Login System</h2>
                </div>
                </div>
                </section>
 <!-- End -->
<br><br><br>
             <!-- Sing in  Form -->
        <section class="signup" style="margin-top:-210px;">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/otp3.png" alt="sing up image"></figure>
                        <a href="signinUser.php" class="signup-image-link">Go Back To Login</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Enter OTP</h2>
                        <?php echo $msg;?>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="text" name="otp" id="your_pass" placeholder="Your OTP" required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="login" class="form-submit" value="Submit"/>
                            </div>
                            <div class="form-group form-button" style="margin-top:-100px;margin-left:130px;">
                                    <input type="submit" name="genNewOTP" id="genNewOTP" class="form-submit" value="Gen New OTP"/>
                                </div>
                        </form>
                        <div class="social-login">
                            <!-- <span class="social-label">A One Time Password (OTP) has been sent to (EmailAddress of the user!)</span> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

       

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>