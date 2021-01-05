
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
  <?php include('headerProfile.php');?>

  <?php $result=mysqli_query($con,"select * from users where email='$_SESSION[email]'");
  $row=mysqli_fetch_array($result);
  $count = mysqli_num_rows($result);				
?>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p><b><h3>User Profile</h3></b></p>
<p>First Name: <u><?php echo $row['firstName'];?></u></p>
<p>Last Name: <u><?php echo $row['lastName'];?></u></p>
<p>Email Address: <u><?php echo $row['email'];?></u></p>
<p>Password: <u><?php echo $row['password'];?></u></p>
<p>UserName: <u><?php echo $row['userName'];?></u></p>
<p>Phone Number: <u><?php echo $row['phone'];?></u></p>

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
