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
  $dateReg = date("Y-m-d");

  $query=mysqli_query($con,"insert into users(firstName,lastName,email,password,userName,phone,otpGen,timesUsed,dateGen,timeGen,timeElapse,dateReg) value('$fName','$lName','$email','$password','$uName','$phone','$otpGen','$timesUsed','$dateGen','$timeGen','$timeElapse','$dateReg')");

    if ($query) 
    {

    $msg="Your Registration was successful, Check Your mail to confirm";

    }

  else
    {
      $msg="An Error Ocuured, Please try again later!";
    }
  


}

  ?>