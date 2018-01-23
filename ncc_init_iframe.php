<?php
/*  
    Yazhi NCC Demo
    Author : vkajamugan@yazhii.net
    Description : This PHP implement the NCC init request for IFrame method.
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
    $jsonRequest['redirectUrl']="http://localhost/yazhii-ncc-client/ncc_complete.php";
    $jsonResponse = RestClient::sendRequest("https://www.yazhii.net/ncc/ncc_controller.php", json_encode($jsonRequest));
    $responseObject = json_decode($jsonResponse);
?>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Yazhi NCC Demo</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="https://www.prepbootstrap.com/Content/shieldui-lite/dist/css/light/all.min.css">
    </head>

    <body class="col-md-6">
        <iframe class="col-lg-12 holds-the-iframe"  height="600" width="100%" frameBorder="0" src="<?php echo $responseObject->data->paymentPageUrl; ?>"> </iframe> 
    </body>
</html>