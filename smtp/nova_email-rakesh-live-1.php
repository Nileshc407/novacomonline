<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions
$mail->SMTPDebug = 3;   // Enable verbose debug output

$mail->isSMTP();   // Set mailer to use SMTP

echo 'Here inside';

//*JavaHouse
/*$mail->Host = 'smtp.office365.com';  
$mail->SMTPAuth = true;     // Enable SMTP authentication
$mail->Username = 'no-reply@javahouseafrica.com';     
//$mail->Password = 'Paj96048';  
$mail->Password = 'Qos69035';  
$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;*/

//Qos69035

//Nomads 
/*$mail->SMTPAuth = true;     // Enable SMTP authentication
$mail->Host = 'mail.thesandskenya.com';
$mail->Username = 'material-control@thesandskenya.com';     
$mail->Password = '9qn35TTqRV';  
$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25; */

//cJEQqmgunK , mbmkIoD5qg , 9qn35TTqRV, password of info@nomadbeachbar.com is dysGp9dMAk

//*iGainspark 
/*$mail->Host = 'Igainspark-com.mail.protection.outlook.com';
$mail->SMTPAuth = false;     // Enable SMTP authentication
$mail->Username = 'no-reply@igainspark.com';     
$mail->Password = 'Gaf70488'; 
$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25; */


//*Miraclecartes 
/*$mail->SMTPAuth = true;     // Enable SMTP authentication
$mail->Host = 'mail.miraclecartes.com';
$mail->Username = 'testaccount@miraclecartes.com';     
$mail->Password = 'z4xO-F_P?NO]';  
$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25; */

//*iGainspark 
/*$mail->SMTPAuth = true;     // Enable SMTP authentication
$mail->Host = 'Igainspark-com.mail.protection.outlook.com';
$mail->Username = 'no-reply@igainspark.com';     
$mail->Password = 'Gaf70488';  
$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25; */

//*Aero Club
/*$mail->SMTPAuth = true;     // Enable SMTP authentication
$mail->Host = 'smtp.office365.com';
$mail->Username = 'info@aeroclubea.com';     
$mail->Password = 'Nug17379';  
$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25; */

//*Novacom
/*$mail->Host = 'secure.emailsrvr.com';
$mail->SMTPAuth = true;     // Enable SMTP authentication
$mail->Username = 'no_reply@novacom.co.ke';     
$mail->Password = 'V1510n.2030!';  
$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;*/

//*Novacom
/*$mail->Host = 'smtp.office365.com'; //smtp.office365.com , smtp-mail.outlook.com
$mail->SMTPAuth = true;     // Enable SMTP authentication
$mail->Username = 'no_reply@novacom.co.ke';     
$mail->Password = 'Naq43906';  
$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25; */  //587, 25 

//*Pizza Hut
/*$mail->Host = 'smtp.office365.com'; //smtp.office365.com , smtp-mail.outlook.com
$mail->SMTPAuth = true;     // Enable SMTP authentication
$mail->Username = 'sms@doughworks.co.tz';     
$mail->Password = 'Rob98237';  
$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;  */ //587, 25 

//*KFC
/*$mail->Host = 'smtp.office365.com'; //smtp.office365.com , smtp-mail.outlook.com
$mail->SMTPAuth = true;     // Enable SMTP authentication
$mail->Username = 'no_reply@novacom.co.ke';     
$mail->Password = 'Naq43906';  
$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25; */  //587, 25 

//*tamarind Customer
$mail->Host = 'smtp.gmail.com'; //smtp.office365.com , smtp-mail.outlook.com
$mail->SMTPAuth = true;     // Enable SMTP authentication
$mail->Username = 'tamarindtreats@tamarind.co.ke';     
$mail->Password = 'ziir okhx gvie clql';  
$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;  //587, 465 



echo 'Here 1';

	
$mail->SMTPOptions = array(					
					'ssl' => array(
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
					)
				); 

echo 'Before Here 2';

$mail->From = 'tamarindtreats@tamarind.co.ke';
$mail->FromName = 'Tamarind  LIVE ';
// $mail->addAddress('nileshchoudhari91@gmail.com', 'nilesh choudhari');     // Add a recipient
$mail->addAddress('rakesh.jadhav718@gmail.com', 'rakesh jadhav');     // Add a recipient
//$mail->addAddress('amit.walia.wa@gmail.com', 'amit');     // Add a recipient
$mail->addAddress('nileshc@miraclecartes.com');               // Name is optional
$mail->addAddress('rakesh_jadhav@hotmail.com');               // Name is optional
$mail->addAddress('rakesh@miraclecartes.com');               // Name is optional
//$mail->addAddress('amit@novacom.co.ke');               // Name is optional
//$mail->addReplyTo('nileshc@miraclecartes.com', 'Information');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Testing from LIVE Server';
$mail->Body    = "This is the message from Script executed on  LIVE Server<b>in bold!</b><br>";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

echo 'Before send function';

if(!$mail->send()) 
{
	echo 'Message could not be sent.';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
else 
{
	echo 'Message has been sent';
}
//echo $mail->print_debugger();
?>
