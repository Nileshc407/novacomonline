<?php

$html_brand = "www.yahoocom";
 $ch = curl_init();
 
$options = array(
 CURLOPT_URL            => $html_brand,
 CURLOPT_RETURNTRANSFER => true,
 CURLOPT_HEADER         => true,
 CURLOPT_FOLLOWLOCATION => true,
 CURLOPT_ENCODING       => "",
 CURLOPT_AUTOREFERER    => true,
 CURLOPT_CONNECTTIMEOUT => 120,
 CURLOPT_TIMEOUT        => 120,
 CURLOPT_MAXREDIRS      => 10,
 );
 curl_setopt_array( $ch, $options );
 $response = curl_exec($ch);
 $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
 
if ( $httpCode != 200 ){
 echo "Return code is {$httpCode} \n"
 .curl_error($ch);
 } else {
 echo "<pre>".htmlspecialchars($response)."</pre>";
 }
 
curl_close($ch);

/*
$request = new HttpRequest();
$request->setUrl('http://196.207.24.118:7070/coloop/ehp');
$request->setMethod(HTTP_METH_POST);

$request->setHeaders(array(
  'Postman-Token' => 'bffc9bc1-dba6-46fe-b7bd-fb927f97c3bd',
  'cache-control' => 'no-cache',
  'Authorization' => 'Flag 44126D30C4449EED8C521394074E6FACB3966211C7AB9A8CEF780247547841ED',
  'Content-Type' => 'application/json'
));

$request->setBody('{"Membership_id":"3000000001","Phone_no":"6555252555","Transaction_date":"2019-09-26 01:35:54","Orderno":"319000024","Item_details":[{"Item_code":"100101","Item_qty":1,"Item_rate":"150.00","Voucher_no":"3A8B531521","Condiments":[]}],"Sub_total":"150.00","Total_delivery_cost":"0.00","Redeem_points":0,"Redeem_amount":"0.00","Balance_Due":"150.00","Mpesa_Paid_Amount":"0.00","Mpesa_TransID":"","Gained_points":2,"Balance_points":11,"Paid_by":"Cash on Delivery","Symbol_of_currency":"KES","Delivery_address":"","Delivery_type":"1","Outlet_id":"4","Outlet_name":"Kukito outlet"}');

try {
  $response = $request->send();

  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}
*/
/*$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "7070",
  CURLOPT_URL => "https://196.207.24.118:7070/coloop/ehp",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"Membership_id\":\"3000000001\",\"Phone_no\":\"6555252555\",\"Transaction_date\":\"2019-09-26 04:35:54\",\"Orderno\":\"319000037\",\"Item_details\":[{\"Item_code\":\"100101\",\"Item_qty\":1,\"Item_rate\":\"150.00\",\"Voucher_no\":\"3A8B531521\",\"Condiments\":[]}],\"Sub_total\":\"150.00\",\"Total_delivery_cost\":\"0.00\",\"Redeem_points\":0,\"Redeem_amount\":\"0.00\",\"Balance_Due\":\"150.00\",\"Mpesa_Paid_Amount\":\"0.00\",\"Mpesa_TransID\":\"\",\"Gained_points\":2,\"Balance_points\":11,\"Paid_by\":\"Cash on Delivery\",\"Symbol_of_currency\":\"KES\",\"Delivery_address\":\"\",\"Delivery_type\":\"1\",\"Outlet_id\":\"4\",\"Outlet_name\":\"Kukito outlet\"}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Flag 44126D30C4449EED8C521394074E6FACB3966211C7AB9A8CEF780247547841ED",
    "Content-Type: application/json",
    "Postman-Token: 37241752-63bf-4e81-89ac-a3d5d64a994f",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
*/
?>