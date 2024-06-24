<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (function_exists('curl_init')) {
    echo 'cURL is installed and enabled.<br>';
} else {
    echo 'cURL is not installed or not enabled.<br>';
}


// Get cURL version information
$curlVersion = curl_version();

// Print cURL version details
echo 'cURL Version: ' . $curlVersion['version'] . "<br>";
echo 'cURL Host: ' . $curlVersion['host'] . "<br>";
echo 'cURL SSL Version: ' . $curlVersion['ssl_version'] . "<br>";
echo 'cURL Protocols: ' . implode(', ', $curlVersion['protocols']) . "<br>";



$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.google.co.in/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false); 
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Process the response
echo $response;
?>
