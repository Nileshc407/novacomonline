<?php
//https://www.youtube.com/watch?v=vswB4BMqqI8&list=PLWCLxMult9xfY_dsYicKGcCLhlZ6YXFMh
//https://myaccount.google.com/apppasswords // hit for craete smtp password

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "third_party/vendor/autoload.php";

$mail = new PHPMailer(true); 
$mail->SMTPDebug = 3;                  

$mail->isSMTP();                                     
$mail->Host = 'smtp.gmail.com';  
$mail->SMTPAuth = true;                               
$mail->Username = 'nileshchoudhari91@gmail.com';                 
$mail->Password = 'hzkemvgbuerhinpo';                       
$mail->SMTPSecure = 'tls';                            
$mail->Port = 587; 

/* $mail->SMTPOptions = array(					
					'ssl' => array(
						'verify_peer' => false,
						'verify_peer_name' => false,
						'allow_self_signed' => true
					)
				); */

$mail->From = 'nileshchoudhari91@gmail.com';
$mail->FromName = 'localhost';
$mail->addAddress('nileshchoudhari407@gmail.com');          
$mail->addAddress('nileshc@miraclecartes.com');          
$mail->WordWrap = 50;     
$mail->isHTML(true);                                 
$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold! test mail set through gmail smtp</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) 
{
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} 
else 
{
    echo 'Message has been sent';
}
?>