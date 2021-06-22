<?php
 session_start();
include("DbConne.php");
if(!empty($_SESSION['username']))
{
	$temp=$_SESSION['username'];
	
}
if(isset($_REQUEST['x']))
{
$a=intval($_GET['x']);
$sql="select * from product where productid='$a'";
$c=mysqli_query($con,$sql);
$row=mysqli_fetch_array($c);
		
		$name=$row['productname'];
		$prize=$row['prize'];
		$file=$row['file'];
	}
$r="select * from cart where productname='$name' and uname='$temp'";
$result=mysqli_query($con,$r);
$num=mysqli_num_rows($result);
if($num==1)
{
echo "<script>alert('food already in cart');</script>";
 header("location:home.php");
 exit;

}
else
{	
	

$sq="insert into cart(productname,prize,uname,file) values('$name','$prize','$temp','$file')";
if(mysqli_query($con,$sq))
{
    header("location:cart.php");
}
}
mysqli_close($con);
?>
