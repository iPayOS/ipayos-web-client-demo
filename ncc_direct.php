<?php
/*  
    Yazhi NCC Demo
    Author : vkajamugan@yazhii.net
    Description : This PHP implement the NCC direct request.
*/

    include "RestClient.php";

    // Payment gateway API credentials
        
    $jsonRequest['clientId']="XXXX";
    $jsonRequest['token']="token_xxxxxxxx";   
    $jsonRequest['secret']="secret_xxxxx";
        
        
    $jsonRequest['requestType']="NCC_PAYMENT_DIRECT";
    $jsonRequest['transactionAmount']= '200.00';
    $jsonRequest['clientReference']="test001";
    $jsonRequest['cardToken']="xxxxxxxxxxxxxxx";
    $jsonResponse = RestClient::sendRequest("https://www.yazhii.net/ncc/ncc_controller.php", json_encode($jsonRequest));
    $responseObject = json_decode($jsonResponse);
    echo $jsonResponse;
?>