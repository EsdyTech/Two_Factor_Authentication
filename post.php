
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
  <?php include('header.php');?>


  <!-- Post Content -->
  <article>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

<p><h2 class="section-heading">BACKGROUND OF THE STUDY</h2></p>
<p>With the development of science and technology and means of storage and exchange of information in different ways, or so-called transfer of data across the network from one site to another site, became to look at the security of data and information is important; we need to provide protection for the information of the dangers that threaten them or attack them through the use of tools to protect information from internal or external threats. In addition to the procedures adopted to prevent access information into the hands of unauthorized persons through communications and to ensure the authenticity of these communications.
Today security concerns are on the ascent in all areas. Most systems today rely on static passwords to verify the user’s identity. Users have a propensity to use obvious passwords, simple password, easily guessable password and same password for multiple accounts, and even write their passwords, store them on their system or asking the websites for remembering their password etc. Utilization of static passwords in this expanded dependence on access to IT systems progressively presents themselves to Hackers, ID Thieves and Fraudsters. In addition, hackers have the preference of using numerous techniques / attacks such as guessing attack, shoulder surfing attack, dictionary attack, brute force attack, snooping attack, social engineering attack etc. to steal passwords so as to gain access to their login accounts. Quite a few techniques, strategies for using passwords have been proposed but some of which are especially not easy to use and practice. To solve the password problem in banking sectors and also for online transaction two factor authentications using OTP and ATM pin / cards have been implemented.</p>

<p><h2 class="section-heading">STATEMENT OF THE PROBLEM</h2></p>
<p>In recent years, increased interest institutions and organizations in the security aspects of their networks and systems, and among these aspects to verify that the person requesting access to the system that he is the person who claims that he/she is, this process called Authentication, in most systems are using a password only to access the system for login process. Below are some problems and risks for the use of password in the user authentication process:
1.	Recently it became Breakthroughs systems, websites and personal accounts are a large and different ways, because of weak protection of those systems methods so it was necessary to find ways more secure to protect those systems.
2.	Passwords become easier to guess.
3.	Short passwords are easy to guess and crack.
4.	Equipment and software often has standard pre-configured passwords (default passwords).
5.	Most people they have many account use same password for all these accounts.
</p>

          <h2 class="section-heading">AIMS AND OBJECTIVE OF THE STUDY</h2>
<p>The project aims and objectives that will be achieved after completion of this project are discussed in this subchapter. The aims and objectives are as follows:
1.	Avoid the risks related to the use password.
2.	Limit the unauthorized access to accounts.
3.	Verification of the person requesting access to the system.
4.	Building authentication process with low cost.
5.	To take advantage of users smartphone’s
</p>

<h2 class="section-heading">SIGNIFICANCE OF THE STUDY</h2>
 <p>With the development of computer science progressed accordingly ways to hack, and different ways plus sensitivity of data; as a result, the greater the need to find solutions to overcome the weaknesses those hackers exploits it, we will give a proposal for two level user authentications to access the system.
</p>

<h2 class="section-heading">SCOPE AND LIMITATION OF THE STUDY</h2>
 <p>The two way mobile authentication system is an innovative technology used to solve the existing problems of the present one factor authentication which is a simple username and a password. The two way mobile authentication solves this problem by using a strong authentication with the combination of something you know, something you have‖ and something you are. When compared the above three methods individually, all the methods have some vulnerabilities. Something you know may be shared, something you have may be stolen and something you are stronger but it is expensive to use in all the cases. So the combination provides a stronger authentication. The project is aimed towards the realization of a strong two factor authentication using mobile device to. 
1.	Provides with a cost effective and user friendly authentication. 
2.	Avoids the use of a simple username and password system which is not secure anymore. 
3.	Using the mobile as your authentication token. 
4.	Ease to use any existing applications on web.
5.	No additional use of hardware.
6.	Easy to deploy.

</p>

          <!-- <blockquote class="blockquote">The dreams of yesterday are the hopes of today and the reality of tomorrow. Science has not yet mastered prophecy. We predict too much for the next year and yet far too little for the next ten.</blockquote>

          <p>Spaceflights cannot be stopped. This is not the work of any one man or even a group of men. It is a historical process which mankind is carrying out in accordance with the natural laws of human development.</p> -->

          <h2 class="section-heading">DEFINITION OF TERMS</h2>
          <p>	
1.  Authentication: the process or action of proving or showing something to be true, genuine, or valid.
2.	System: Physical component of a computer that is used to perform certain task.
3.	Data: Numbers, Text or image which is in the form suitable for Storage in or processing by a computer, or incomplete information. 
4.	Information: A meaning full material derived from computer data by organizing it and interpreting it in a specified way.
5.	Input: Data entered into a computer for storage or processing. 
6.	Output: Information produced from a computer after processing. 
7.	Information System: A set of interrelated components that collect (or retrieve), process, store and distribute information to support decision making and control in an organization. 
8.	Computer: Computer is an electronic device that accepts data as Input, processes data and     gives out information as output to the user.
9.	Software:-Software is set of related programs that are designed by the manufacturer to control the hardware and to enable the computer perform a given task.
10.	Hardware: - Hardware is a physical part of a computer that can be touched, seen, feel which are been control by the software to perform a given task.
11.	Database: - Database is the collection of related data in an organized form. 
12.	Programming: - programming is a set of coded instruction which the computers understands and obey. 
13.	Technology: -Technology is the branch of knowledge that deals with the creation and use technical and their interrelation with life, society and the environment, drawing upon such as industrial art, engineering, applied science and pure science.
</p>

          <a href="#">
            <img class="img-fluid" src="images/otp1.jpg" alt="">
          </a>
          <!-- <span class="caption text-muted">To go places and do things that have never been done before – that’s what living is all about.</span>

          <p>Space, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before.</p>

          <p>As I stand out here in the wonders of the unknown at Hadley, I sort of realize there’s a fundamental truth to our nature, Man must explore, and this is exploration at its greatest.</p> -->

          <!-- <p>Placeholder text by
            <a href="http://spaceipsum.com/">Space Ipsum</a>. Photographs by
            <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>.</p> -->
        </div>
      </div>
    </div>
  </article>

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
