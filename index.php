<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

// if (!isset($_SESSION['userEmail']))
// {

//   echo "<script type = \"text/javascript\">
//   window.location = (\"index.php\");
//   </script>";

// }


 if(isset($_POST['signup']))
  {
  $fName=$_POST['fName'];
  $lName=$_POST['lName'];
  $email=$_POST['email'];
  $uName=$_POST['uName'];
  $phone=$_POST['phone'];
  $password=$_POST['password'];
  $repassword=$_POST['repassword'];
  date_default_timezone_set('Africa/Lagos'); $dateReg =  date('Y-m-d H:i:s');
  $dateGen = date("Y-m-d h:m:s");



 if($password != $repassword)
 {
    $msg = "<font color='red'><b><h3>Password Mismatch! Check Password</h3></b></font>";
 }

else
{

  $result=mysqli_query($con,"select * from users where email='$email'");
  $row=mysqli_fetch_array($result);
  $count = mysqli_num_rows($result);				

  if($count > 0)
  {
    $msg = "<font color='red'><b><h3>This Email has already been used by another user!</h3></b></font>";
  }

else
{
					
// function Random($length = 5) {
// // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
// $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
// $charactersLength = strlen($characters);
// $randomString = '';
// for ($i = 0; $i < $length; $i++) {
// $randomString .= $characters[rand(0, $charactersLength - 1)];
// }
// return $randomString;
// }

// $otpGen = Random();
$timesUsed = 0;

$query=mysqli_query($con,"insert into users(firstName,lastName,email,password,userName,phone,otpGen,timesUsed,dateGen,timeGen,timeElapse,dateReg) value('$fName','$lName','$email','$password','$uName','$phone','','$timesUsed','','$timeGen','$timeElapse','$dateReg')");

    if ($query) 
    {   
    echo "<script type = \"text/javascript\">
                alert(\"Your Registration was successful!\");
                window.location = (\"signinUser.php\")
                </script>";

    }

    else
    {
        echo "<script type = \"text/javascript\">
        alert(\"An Error Ocuured, Try again Later!\");
        window.location = (\"index.php\")
        </script>";
            }
  
        }
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
        <!-- Sign up form -->
        <section class="signup" style="margin-top:-210px;">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up here!</h2>
                       <?php echo $msg;?>
                       <br>
                        <form method="POST" action="" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="fName" id="name" placeholder="First Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="lName" id="name" placeholder="Last Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                    <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input type="text" name="uName" id="name" placeholder="UserName" required/>
                                </div>
                                <div class="form-group">
                                        <label for="name"><i class="zmdi zmdi-phone material-icons-name"></i></label>
                                        <input type="text" name="phone" id="name" placeholder="Phone Number" required/>
                                    </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="repassword" id="repassword" placeholder="Repeat your password" required/>
                            </div>
                            
                            <!-- <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div> -->
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/2factor.jpg" alt="sing up image"></figure>
                        <a href="signinUser.php" class="signup-image-link">Already a Member? Sign In here!</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sing in  Form -->
        <!-- <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="your_pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>