<?php
 session_start();
include("DbConne.php");
$Name=$_POST["username"];
$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];

$r="select log_id from login_tbl where username='$Name'";
$result=mysqli_query($con,$r);
$num=mysqli_num_rows($result);


$sq="update reg_tbl set name='$name',email='$email',phone='$phone' where log_id='$num'";
if(mysqli_query($con,$sq))
{
    header("location:my-account.html");
}

mysqli_close($con);
?>
