
<?php
session_start();
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    // $password=md5($_POST['password']);
    $password=$_POST['password'];

    $query=mysqli_query("select ID from tbladmin where  UserName='$adminuser' && Password='$password'");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['cvmsaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    }
  }
  ?>


<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cvmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$eid=$_GET['editid'];
 
$remark=$_POST['remark'];
 $query=mysqli_query($con,"update tblvisitor set remark='$remark' where  ID='$eid'");
 

    if ($query) {
    $msg="Visitors Remark has been Updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
}

?>

<?php
 $eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from  tblvisitor where ID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

}?>


<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cvmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $AName=$_POST['adminname'];
  $mobno=$_POST['mobilenumber'];
  $email=$_POST['email'];
  $username=$_POST['username'];
$date = date("Y-m-d");

  $query=mysqli_query($con,"insert into tbladmin(AdminName,UserName,MobileNumber,Email,Password,AdminRegdate) value('$AName','$username','$mobno','$email','12345','$date')");

    if ($query) {
    $msg="Administrator/User Detail has been added.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
  }
  ?>


$displayForm = " <form method='POST' class='register-form' id='login-form'>
    <div class='form-group'>
        <label for='your_name'><i class='zmdi zmdi-account material-icons-name'></i></label>
        <input type='text' name="email" id='your_name' placeholder='Your Email Address'/>
    </div>
    <div class='form-group'>
        <label for='your_pass'><i class='zmdi zmdi-lock'></i></label>
        <input type='password' name='password' id='your_pass' placeholder='Your Password'/>
    </div>
    <div class='form-group'>
        <input type='checkbox' name='remember-me' id='remember-me' class='agree-term'/>
        <label for='remember-me' class='label-agree-term'><span><span></span></span>Remember me</label>
    </div>
    <div class='form-group form-button'>
        <input type='submit' name='login' id='login' class='form-submit' value='Log in'/>
    </div>
</form> ";