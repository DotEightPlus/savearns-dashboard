<?php

if(!isset($_GET['id']) && !isset($_GET['other'])) {
    redirect("./opps");
    
} else {
    
    $bank = $_GET['id'];
    $numb = $_GET['other'];

    //get bank code first

$request = [

    'account_number' => "2115376418",
    'account_bank' => "033"
];

$curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.flutterwave.com/v3/accounts/resolve',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($request),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer FLWSECK-1109e7cb4c9e1871e91a90f1d91c8479-X',
        'Content-Type: application/json'
    ),
    ));

   echo $response = curl_exec($curl);

    curl_close($curl);
    
    $res = json_decode($response);
    echo $res->data->account_name;
}
   
?>