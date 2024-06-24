<?php
session_start();
$conn = new mysqli("localhost","root","","novacom_devp");
if($conn)
{
	if($_SESSION['User_email'] != Null)
	{
		$User_email = $_SESSION['User_email'];
	}
	$otp = $_REQUEST['otp'];
	$query = mysqli_query($conn,"select * from igain_enrollment where User_name='$User_email' AND Otp ='$otp'");
	$count = mysqli_num_rows($query);
	if($count > 0)
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
}
else
{
	echo mysqli_error($conn);
}
?>