<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

$mail = new PHPMailer(true); 
$mail->SMTPDebug = 3;   
$mail->isSMTP();   

echo 'Here inside';

//*JavaHouse
$mail->Host = 'smtp.office365.com';  
$mail->SMTPAuth = true;    
$mail->Username = 'no-reply@javahouseafrica.com';     
$mail->Password = 'Qos69035';  
$mail->SMTPSecure = 'tls';  
$mail->Port = 25;
$mail->From = 'no-reply@javahouseafrica.com';

//Qos69035

//Nomads 
/* $mail->SMTPAuth = true;    
$mail->Host = 'mail.thesandskenya.com';
$mail->Username = 'info@nomadbeachbar.com';     
// $mail->Password = 'mbmkIoD5qg';  
$mail->Password = 'dysGp9dMAk';  
$mail->SMTPSecure = 'tls';  
$mail->Port = 25;  
$mail->From = 'info@nomadbeachbar.com';
*/

//cJEQqmgunK

//*iGainspark 
/*$mail->Host = 'Igainspark-com.mail.protection.outlook.com';
$mail->SMTPAuth = false;     // Enable SMTP authentication
$mail->Username = 'no-reply@igainspark.com';     
$mail->Password = 'Gaf70488'; 
$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25; 
$mail->From = 'info@nomadbeachbar.com';*/


//*Miraclecartes 
/*$mail->SMTPAuth = true;     // Enable SMTP authentication
$mail->Host = 'mail.miraclecartes.com';
$mail->Username = 'testaccount@miraclecartes.com';     
$mail->Password = 'z4xO-F_P?NO]';  
$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25; 
$mail->From = 'info@nomadbeachbar.com';*/

//*iGainspark 
/*$mail->SMTPAuth = true;     // Enable SMTP authentication
$mail->Host = 'Igainspark-com.mail.protection.outlook.com';
$mail->Username = 'no-reply@igainspark.com';     
$mail->Password = 'Gaf70488';  
$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25; 
$mail->From = 'info@nomadbeachbar.com';*/

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
$mail->Port = 25;
$mail->From = 'info@nomadbeachbar.com';*/

//*Novacom
/*$mail->Host = 'smtp.office365.com'; //smtp.office365.com , smtp-mail.outlook.com
$mail->SMTPAuth = true;     // Enable SMTP authentication
$mail->Username = 'no_reply@novacom.co.ke';     
$mail->Password = 'Naq43906';  
$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25; 
$mail->From = 'info@nomadbeachbar.com';*/  //587, 25 

//*Pizza Hut
/*$mail->Host = 'smtp.office365.com'; //smtp.office365.com , smtp-mail.outlook.com
$mail->SMTPAuth = true;     // Enable SMTP authentication
$mail->Username = 'sms@doughworks.co.tz';     
$mail->Password = 'Rob98237';  
$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;  
$mail->From = 'info@nomadbeachbar.com';*/ //587, 25 

//*KFC
/*$mail->Host = 'smtp.office365.com'; //smtp.office365.com , smtp-mail.outlook.com
$mail->SMTPAuth = true;     // Enable SMTP authentication
$mail->Username = 'no_reply@novacom.co.ke';     
$mail->Password = 'Naq43906';  
$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25; 
$mail->From = 'info@nomadbeachbar.com';*/  //587, 25 

$mail->SMTPOptions = array(					
					'ssl' => array(
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
					)
				); 

$mail->FromName = 'Nomads LIVE ';
$mail->addAddress('nileshchoudhari91@gmail.com', 'nilesh choudhari');     
$mail->addAddress('nileshc@miraclecartes.com');              

$mail->WordWrap = 50;                               

$mail->isHTML(true);                                 

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
echo $mail->print_debugger();
?>