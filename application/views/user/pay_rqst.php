<?php

$netamt = $cost*1.18;

foreach($info->result() as $row):

  

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_4b14a7665ece3143ca6bb0e58f1",
                  "X-Auth-Token:test_f114860025c09869f1413c7d28f"));

$payload = Array(
    'purpose' => 'Posting an Advertisement in 8GB',
    'amount' => $netamt,
    'phone' => $row->phone,
    'buyer_name' => $row->username,
    'redirect_url' => 'http://8gb.io/classyad/success.php',
    'send_email' => true,
    'webhook' => '',
    'send_sms' => true,
    'email' => $row->email,
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 

$json_decode = json_decode($response,true);

$long_url = $json_decode['payment_request']['longurl'];
header('Location:'.$long_url);
endforeach;
?>