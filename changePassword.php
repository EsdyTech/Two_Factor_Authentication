
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

 if(isset($_POST['change']))
  {

    $pass=$_POST['pass'];
    $newPass=$_POST['newPass'];
    $conPass=$_POST['conPass'];

    
if ($newPass != $conPass)
{
    $msg = "<font color='red'><b><h4>Password mismatch Retry!</h4></b></font>";
}
  else {  

  $result=mysqli_query($con,"select * from users where email='$_SESSION[email]' and password='$pass'");
  $row=mysqli_fetch_array($result);
  $count = mysqli_num_rows($result);				

  if($count == 0)
  {
    $msg = "<font color='red'><b><h4>Incorrect Current Password Entered!, Check Password and try again!</h4></b></font>";
}
  else {

    $query=mysqli_query($con,"update users set password='$newPass' where  email='$_SESSION[email]'");
    $msg = "<font color='green'><b><h3>Password Change was successful!</h3></b></font>";

       
  }  
}

  }
  ?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Two Factor Authentication System</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <?php include('topMenu.php');?>


  <!-- Page Header -->
  <?php include('headerPassword.php');?>


  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>A one-time password (OTP), also known as one-time pin or dynamic password, is a password that is valid for only one login session or transaction, on a computer system or other digital device.
</p>
        <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
        <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
        <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
        <?php echo $msg;?>
        <form name="sentMessage" action="changePassword.php" method="post">
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Password</label>
              <input type="password" class="form-control" name="pass" placeholder="Password"  required data-validation-required-message="Please enter your name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>New Password</label>
              <input type="password" class="form-control" name="newPass" placeholder="New Password" required data-validation-required-message="Please enter your email address.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Confirm Password</label>
              <input type="password" class="form-control" name="conPass" placeholder="Confirm Password"  required data-validation-required-message="Please enter your phone number.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <!-- <div id='success'></div> -->
          <div class="form-group">
            <input type="submit" class="btn btn-primary" name="change" id="sendMessageButton" value="Submit">
          </div>
        </form>
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <?php include('footer.php');?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
