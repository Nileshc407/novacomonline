<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{  "to":"fMEjmrlGSV-NXsTMUl81F9:APA91bFCl_cxZf1inTFAb5O42e7g3ZeWZ1b12YiWjEwdy2hjG4TbVPYfuJrbyAEdR6-bXaC75Bd2KwCiCelCfVmidckijzx3jgvTh8F_2o8Q2NLSXrLFMY33HG7WJVAtXkzq_6vVRY6V",
    "notification":{
        "title":"New Message",
        "body":"Hello, this is test message from url",
        "click_action":"https://novacomonline.ehpdemo.online/level24App/index.php/Cust_home/compose?Id=10378"
    }
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: key=AAAAjqCWPC0:APA91bGKGYmqXzPkLHeg1vwC-GmMHgEE3rEGbaq3i2d4kozZu6k9N5eRKSy1RaF0u5YqdJVbmtZLFqQUz5tO1EwOoTp0GeMNGkx4xLu4KKxax4O61wL1tqPBcOFo33V-2D1zEu4q7mRj',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
?>