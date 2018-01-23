<?php
/*  
    Yazhi NCC Demo
    Author : vkajamugan@yazhii.net
    Description : This PHP implement the NCC init request for Re Direct method.
*/

    include "RestClient.php";

    // Payment gateway API credentials
        
    $jsonRequest['clientId']="XXXX";
    $jsonRequest['token']="token_xxxxxxxx";   
    $jsonRequest['secret']="secret_xxxxx";
        
        
    $jsonRequest['requestType']="NCC_INIT";
    $jsonRequest['transactionAmount']=$_REQUEST['amount'];
    $jsonRequest['msisdn']=$_REQUEST['mobileNumber'];
    $jsonRequest['email']=$_REQUEST['email'];
    $jsonRequest['clientReference']="test001";
    $jsonRequest['redirectUrl']="http://localhost/yazhii-ncc-client-demo/ncc_complete.php";
    $jsonResponse = RestClient::sendRequest("https://www.yazhii.net/ncc/ncc_controller.php", json_encode($jsonRequest));
    $responseObject = json_decode($jsonResponse);
    header('Location: '.$responseObject->data->paymentPageUrl);
    die();
?>