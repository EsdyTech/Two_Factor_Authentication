
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
<?php include('headerAbout.php');?>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p><b><h2>INTRODUCTION</h2></b></p>
<p>With the development of science and technology and means of storage and exchange of information in different ways, or so-called transfer of data across the network from one site to another site, became to look at the security of data and information is important; we need to provide protection for the information of the dangers that threaten them or attack them through the use of tools to protect information from internal or external threats. In addition to the procedures adopted to prevent access information into the hands of unauthorized persons through communications and to ensure the authenticity of these communications.
Today security concerns are on the ascent in all areas. Most systems today rely on static passwords to verify the user’s identity. Users have a propensity to use obvious passwords, simple password, easily guessable password and same password for multiple accounts, and even write their passwords, store them on their system or asking the websites for remembering their password etc. Utilization of static passwords in this expanded dependence on access to IT systems progressively presents themselves to Hackers, ID Thieves and Fraudsters. In addition, hackers have the preference of using numerous techniques / attacks such as guessing attack, shoulder surfing attack, dictionary attack, brute force attack, snooping attack, social engineering attack etc. to steal passwords so as to gain access to their login accounts. Quite a few techniques, strategies for using passwords have been proposed but some of which are especially not easy to use and practice. To solve the password problem in banking sectors and also for online transaction two factor authentications using OTP and ATM pin / cards have been implemented.
</p>
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <?php include('footer.php');?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
