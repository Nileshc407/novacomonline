<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

//PHPMailer Object
$mail = new PHPMailer(true); //Argument true in constructor enables exceptions
$mail->SMTPDebug = 3;                               // Enable verbose debug output

 $mail->isSMTP();                                      // Set mailer to use SMTP
 $mail->Host = 'Igainspark-com.mail.protection.outlook.com';  // Specify main and backup SMTP servers smtp.office365.com Igainspark-com.mail.protection.outlook.com
$mail->SMTPAuth = false;                               // Enable SMTP authentication
$mail->Username = 'admin@igainspark.com';                 // SMTP username
$mail->Password = '7Ik7bnxAN54dF';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25; 

// SMTPAuth   
/*
$mail->Host = 'mail.miraclecartes.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'rakeshadmin@miraclecartes.com';                 // SMTP username
$mail->Password = 'rakeshadmin@123';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                  // TCP port to connect to
*/

/* $mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
); */


$mail->From = 'admin@igainspark.com';
$mail->FromName = 'Mailer';
$mail->addAddress('ravip@miraclecartes.com', 'Ravi Phad');     // Add a recipient
$mail->addAddress('raviphad1988@gmail.com', 'Ravi Phad');     // Add a recipient
$mail->addAddress('rakesh.jadhav718@gmail.com', 'Rakesh Jadhav');     // Add a recipient
$mail->addAddress('nilesh@miraclecartes.com');               // Name is optional
$mail->addReplyTo('ravip@miraclecartes.com', 'Information');

// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}