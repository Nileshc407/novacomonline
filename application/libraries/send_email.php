<?php
	// error_reporting(-1);
// ini_set('display_errors', 'On');
$c_email="ravip@miraclecartes.com";
$subject = "Email Confirmation Message from Demo";
					$from = "ravip@miraclecartes.com";
					$message = "Test message";
					/* var_dump($message); */
					$headers = "From:rakesh@miraclecartes.com\r\n";
					$headers.= "Content-type: text/html\r\n";
					
         
         $retval = mail($c_email, $subject, $message, $headers);
         var_dump($retval);
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }
      ?>
        