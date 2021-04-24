<?php
 session_start();
include("DbConne.php");
$Name=$_POST["name"];
$Email_id=$_POST["email"];
$phono=$_POST["contactno"];
$username=$_POST["username"];
$password=$_POST["password"];
$user_type="user";

$r="select * from login_tbl where username='$username'";
$result=mysqli_query($con,$r);
$num=mysqli_num_rows($result);
if($num==1)
{
  ?>
<script>alert("Username already exists");
location.href="registration.html";
 exit;
</script>
<?php
}
else
{
$sqli="insert into login_tbl(username,password,user_type) values ('$username','$password','$user_type')";
$result1=mysqli_query($con,$sqli);
$n=mysqli_insert_id($con);
$sq="insert into reg_tbl(name,phone,email,log_id) values('$Name','$phono','$Email_id','$n')";
if(mysqli_query($con,$sq))
{
    header("location:login.html");
}
}
mysqli_close($con);
?>
