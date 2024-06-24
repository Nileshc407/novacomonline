<?php
function send_FCM()
{
	// $url = "POST https://fcm.googleapis.com/v1/projects/miraclenova-59b7d/messages:send";
	$url = "https://fcm.googleapis.com/fcm/send";
	
	$api_key = "AAAAweMFKsw:APA91bEMuizQs8UCVI4-NNs8dGpZfyWG5yL-dpHyn02uO53lORCw8ctrO_GHCQiBFrWrFks1QaJ1mruMqQ7ynq-n-pe0etDmxF5BN-H6TVcTxJKX0Eb1xLb89ZhMjL0mRhuhsl76Vrzv";
	
	$To ="e9V5nquAQgqlm9HjIwNUt_:APA91bEb1vMauaLaPCqY9kGwg-Bb3NPQjUJftpihJXc1pv_LZJeRZnCPMcDfktAcxdldsV4z3YJOljDs2ES1lkLsdOe8WSkg4MMW_BpMEbgvvTWFnJ4DZ1AGh1jeIAntNYvz2RYrAlEL";

	$notifData = ['title'=>'JavaHouse Demo Notification','body'=>'JavaHouse Demo App Notification Body', 'click_action'=>'https://novacomonline.ehpdemo.online/javahouseafricaApp/index.php/Cust_home/compose?Id=20258'];
	
	$notifBody = ['notification'=>$notifData,'to'=> $To];
				
	$notifBodyReq = json_encode($notifBody);
	
	$curl = curl_init();
	curl_setopt_array($curl, array(
	CURLOPT_URL => $url, 
	CURLOPT_POST => true,
	CURLOPT_POSTFIELDS => $notifBodyReq,  
	CURLOPT_HTTPHEADER => array('Authorization:key='.$api_key,'Content-Type: application/json')));
	
	$response =curl_exec($curl);
	$data = json_decode($response,true);
	echo "response-------".$data;
	curl_close($curl);
}
send_FCM();
?>