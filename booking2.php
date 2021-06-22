<?php
 session_start();
include("DbConne.php");
if(!empty($_SESSION['username']))
{
	$temp=$_SESSION['username'];
	$get_id="select * from login_tbl where username='$temp'";
	$get=mysqli_query($con,$get_id);
	$a=mysqli_fetch_array($get);
	$get_id=$a['log_id'];
}
$product=$_POST["product"];	
$Name=$_POST["name"];
$Email_id=$_POST["phone"];
$phono=$_POST["email"];
$username=$_POST["hn"];
$password=$_POST["area"];
$city=$_POST["city"];
$pin=$_POST["pin"];
$qty=$_POST["qua"];
$cartid=$_POST["cartid"];
$price=$_POST["price"];
$sq="update reg_tbl set name='$Name',phone='$Email_id',email='$phono',house='$username',area='$password',city='$city',pin='$pin' where log_id='$get_id'";
$s=mysqli_query($con,$sq);
$c="update cart set qua='$qty' where cart_id='$cartid'";
$co=mysqli_query($con,$c);
$total=$price*$qty;
$insert="insert into booking(user_id,product,price,status)values('$get_id','$product','$total','0')";
$cone=mysqli_query($con,$insert);
$n=mysqli_insert_id($con);
{
    header("location:pay.php?x=$n");
}
?>