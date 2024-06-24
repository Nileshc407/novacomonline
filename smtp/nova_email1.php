<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "third_party/vendor/autoload.php";
//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions
$mail->SMTPDebug = 3;   // Enable verbose debug output
$mail->isSMTP();   // Set mailer to use SMTP

// $mail->Host = 'smtp.office365.com';  
// $mail->Host = 'secure.emailsrvr.com';  
$mail->Host = 'Igainspark-com.mail.protection.outlook.com';  
$mail->SMTPAuth = true;     // Enable SMTP authentication
// $mail->Username = 'no-reply@javahouseafrica.com';        
// $mail->Password = 'Qos69035';  
// $mail->Username = 'info@aeroclubea.com';  
// $mail->Password = 'Nug17379';  
// $mail->Username = 'noreply@novacom.co.ke';  
// $mail->Password = 'V1510n.2030!'; 

$mail->Username = 'no-reply@igainspark.com';  
$mail->Password = 'Gaf70488';  

/* $config['protocol'] = 'smtp';
$config['smtp_host'] = 'Igainspark-com.mail.protection.outlook.com'
$config['smtp_user'] = 'mailto:no-reply@igainspark.com';
$config['smtp_pass'] = 'Gaf70488';
$config['smtp_port'] = 25; */


$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted$mail->Host = 'secure.emailsrvr.com';  
$mail->Port = 25; 


/* $mail->SMTPAuth = true;     // Enable SMTP authentication
$mail->Username = 'noreply@novacom.co.ke';     
$mail->Password = 'V1510n.2030!';  
$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;  */

//$mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers smtp.office365.com Igainspark-com.mail.protection.outlook.com
//$mail->SMTPAuth = false;     // Enable SMTP authentication
//$mail->Username = 'no-reply@javahouseafrica.com';     // SMTP username
//$mail->Password = 'Foz67871';  // SMTP password
//$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
//$mail->Port = 587; 
	
$mail->SMTPOptions = array(					
					'ssl' => array(
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
					)
				);

// $mail->From = 'no-reply@javahouseafrica.com';
// $mail->From = 'info@aeroclubea.com';
// $mail->From = 'noreply@novacom.co.ke';
$mail->From = 'no-reply@igainspark.com';
$mail->FromName = 'Java House Africa Loyalty';
$mail->addAddress('nileshchoudhari91@gmail.com', 'nilesh choudhari');     // Add a recipient
  // Add a recipient
$mail->addAddress('nileshc@miraclecartes.com');               // Name is optional
             // Name is optional
//$mail->addReplyTo('nileshc@miraclecartes.com', 'Information');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = "This is the HTML message body <b>in bold!</b><br>";
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
	echo 'Message could not be sent.';
	echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
else 
{
	echo 'Message has been sent';
}
//echo $mail->print_debugger();