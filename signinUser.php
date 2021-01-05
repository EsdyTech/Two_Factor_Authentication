
<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
{
 
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    $result=mysqli_query($con,"select * from users where email='$email' and password='$password'");
    $row=mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);				

    if($count > 0)
    {
        $_SESSION['email'] = $row['email'];
        function Random($length = 5) {
        // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
        }
    
        $_SESSION['newOtpGen'] = Random();
        // $newOtpGen= Random();
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
        $mail->Password ='sawdykdevtest@2020';
        $mail->SetFrom('no-reply@howcode.org');
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email);
        
        if(!$mail->Send()) 
        {
            $msg = " An Error Ocuured while trying to send Mail, Kindly Contact Administrator. Thanks!";
        } 
        else 
        {

            $query=mysqli_query($con,"update users set otpGen='$_SESSION[newOtpGen]', timesUsed='$timesUsed', dateGen='$dateGen' where  email='$email'");
            echo "<script type = \"text/javascript\">
            alert(\"Your login credentials are valid, a one time password (OTP) has been sent to your Email\");
            window.location = (\"otpUser.php\")
            </script>";
            // $urlOtp = "<a href='otpUser.php' class='signup-image-link'>Click here to Continue!</a>";
            // $msg = "<font color='green'><b><h3>Your login credentials are valid, a one time password (OTP) has been sent to your Email!".$urlOtp."</h3></b></font>";
            // $displayForm = 0;
        }
    }
    else
    {  
        $msg = "<font color='red'><b><h3>Incorrect Username/Password!</h3></b></font>";
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
                        <figure><img src="images/otp2.png" alt="sing up image"></figure>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <?php echo $msg;?>
                        <?php echo $displayForm;?>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="your_name" placeholder="Your Email Address" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Your Password" required/>
                            </div>
                            <!-- <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div> -->
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="login" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <br>
                        <a href="index.php" class="signup-image-link">You dont have an account?Create an account</a>
                        <!-- <div class="social-login">
                            <span class="social-label">Or Login with </span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div> -->
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