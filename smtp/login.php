<?php
session_start();
$conn = new mysqli("localhost","root","","novacom_devp");
if($conn)
{
	$email = $_REQUEST['email'];
	$query = mysqli_query($conn,"select * from igain_enrollment where User_name='$email'");
	$count = mysqli_num_rows($query);
	if($count > 0)
	{
		$Otp = rand('11111','99999');
		$update = mysqli_query($conn,"Update igain_enrollment set Otp = '$Otp' where User_name = '$email'");
		
		$_SESSION['User_email'] = $email;
		send_otp_email($email,$Otp);
		echo "exist";
	}
	else
	{
		$_SESSION['User_email'] = Null;
		echo "not exist";
	}
}
else
{
	echo mysqli_error($conn);
}

function send_otp_email($to_email,$Otp)
{
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require_once "third_party/vendor/autoload.php";
	//require_once "third_party/vendor/phpmailer/phpmailer/src/PHPMailer.php";
	
	

	$mail = new PHPMailer(true); 
	$mail->SMTPDebug = 3;                  

	$mail->isSMTP();                                     
	$mail->Host = 'smtp.gmail.com';  
	$mail->SMTPAuth = true;                               
	$mail->Username = 'nileshchoudhari91@gmail.com';                 
	$mail->Password = 'hzkemvgbuerhinpo';                       
	$mail->SMTPSecure = 'tls';                            
	$mail->Port = 587; 

	$mail->From = 'nileshchoudhari91@gmail.com';
	$mail->FromName = 'localhost';
	$mail->addAddress($to_email);                 
	$mail->WordWrap = 50;     
	$mail->isHTML(true);                                 
	$mail->Subject = 'Email verification otp';
	$mail->Body    = 'Your email verification otp is <b>'.$Otp.'</b>';
	$mail->AltBody = '';

	if(!$mail->send()) 
	{
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} 
	else 
	{
		echo 'Message has been sent';
	}
} 
?>