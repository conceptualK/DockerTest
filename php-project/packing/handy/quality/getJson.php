<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $data = array(
        'order_id' => $_REQUEST["order_id"],
        'pallet_id' => $_REQUEST["pallet_id"],
        'module_id' => $_REQUEST["module_id"],
        'judge' => $_REQUEST["judge"],
        'defect_code' => $_REQUEST["defect_code"],
    );
  
    //Specify the URL and data 
    $url = 'http://10.19.5.106:5001/api/C2QCCheck';
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

    
    // echo $json_response;
    // echo $json_object->MsgCode.",".$json_object->Status.",".$json_object->ErrorMsg;
    echo $json_object->MsgCode.",".$json_object->Status;

    // if ($status != 201) {
    //     //die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
        

    // } else {
    //     $response = json_decode($json_response, true);
    //     echo $json_response;
    // }
    curl_close($curl);


} else {
    echo "message error";
}
?>