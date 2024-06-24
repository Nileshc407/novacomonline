<?php
require_once 'third_party/vendor/autoload.php'; // Include the autoloader

use Google\Auth\Credentials\ServiceAccountCredentials;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

function getAccessToken($projectId, $privateKeyPath)
{
    // Load the private key file
    $credentials = new ServiceAccountCredentials(
        ['https://www.googleapis.com/auth/firebase.messaging'],
        $privateKeyPath
    );

    // Set the project ID
    $credentials->projectId = $projectId;

    // Create the HTTP client
    $httpClient = new Client();

    try {
        // Get the access token
        $accessToken = $credentials->fetchAuthToken($httpClient);
        return $accessToken['access_token'];
    } catch (RequestException $e) {
        // Handle any errors that occurred during the token retrieval
        echo 'Error getting access token: ' . $e->getMessage();
    }
}

// Usage
$projectId = 'novacom-7a496';
$privateKeyPath = 'third_party/novacom-7a496-firebase-adminsdk-iygqi-17fcd4ea1c.json';

$accessToken = getAccessToken($projectId, $privateKeyPath);
echo 'Access Token: ' . $accessToken;
?>