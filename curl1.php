<?php

$url = 'http://www.google.co.in/';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
if(curl_errno($ch)){
    echo 'Request Error:' . curl_error($ch);
}
?>
