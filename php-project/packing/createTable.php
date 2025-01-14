<?php
$url = 'http://192.168.137.248:3000/CustomersTable';
$curl = curl_init($url);


curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 


$response = curl_exec($curl);


if(curl_errno($curl)) {
    $error_msg = curl_error($curl);
    echo 'cURL Error: ' . $error_msg;
}


curl_close($curl);

echo $response;


    

?>