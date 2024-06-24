<?php
$to = "nileshchoudhari91@gmail.com";
$subject = "Test Email";
$message = '<html><body>';
$message .= '<h1 style="color:#000000;">Dear Nilesh Chaudhari,</h1>';
$message .= '<p style="color:#333;font-size:18px;">We have received your request to reset your password. Please click on the below link.</p>';
$message .= "<a href='https://javahouseafrica.ehp.online/index.php/Login/Setpassword?Pwd_data=eyJDb21wYW55X2lkIjoiNyIsIkVucm9sbF9pZCI6IjI1ODAiLCJVc2VyX2VtYWlsX2lkIjoibmlsZXNoY0BtaXJhY2xlY2FydGVzLmNvbSJ9'>Click here to Set Password</a>";
$message .= '</body></html>';
 
$header = implode("\r\n", [
  "MIME-Version: 1.0",
  "Content-type: text/html; charset=utf-8",
  "From:shivanshchoudhari02@gmail.com"
]);

// (B) SEND!
echo mail($to, $subject, $message, $header)

  ?>