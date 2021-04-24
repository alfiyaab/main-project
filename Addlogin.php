<?php
   session_start();

include("DbConne.php");

  $username=$_POST["username"];

  $password=$_POST["password"];
  

 $sql="select * from login_tbl where username='$username' and password='$password'";

$result=mysqli_query($con,$sql);

$n=mysqli_num_rows($result);
$_SESSION['username']=$username;
  if($n>0)

{
  while($row=mysqli_fetch_array($result))
  { 
if($row['user_type']=="admin")
{
	header("location:startbootstrap-sb-admin-2-gh-pages/index.html");
	exit;
}

else if($row['user_type']=="user")
{
	header("location:home.php");
	exit;
}

  }
}
else
{
  ?>
<script>alert("Invalid Username or Password");
location.href="login.html";
 exit;
</script>
<?php
}
mysqli_close($con);

   ?>
