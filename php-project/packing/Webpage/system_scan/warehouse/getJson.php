<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo $_SERVER['REQUEST_METHOD'];
//echo $_REQUEST['pallet'];

    $data = array(
        'location' => $_REQUEST["location"],
        'pallet_id' => $_REQUEST["pallet_id"],
        'order_id' => $_REQUEST["order_id"],
    );
    // Specify the URL and data 
    $url = 'http://10.19.5.106:5001/api/C1WareHouse';
    $content = json_encode($data);

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $curl,
        CURLOPT_HTTPHEADER,
        array("Content-type: application/json")
    );
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

    $json_response = curl_exec($curl);
    $json_object = json_decode($json_response);

    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    ///echo $json_response;
    echo $json_object->MsgResult.','.$json_object->ErrorMessage;

   
    curl_close($curl);


} else {
    echo "message error";
}
?>