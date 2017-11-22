<?php
/*  
    Yazhi NCC Demo
    Author : vkajamugan@yazhii.net
    Description : This PHP implement the NCC complete request.
*/

    include "RestClient.php";

    if(isset($_GET['requestId']))	
    {
        $requestId = $_GET['requestId'];
        
        // Payment gateway API credentials
        
        $jsonRequest['clientId']="XXXX";
        $jsonRequest['token']="token_xxxxxxxx";   
        $jsonRequest['secret']="secret_xxxxx";
        
        
        $jsonRequest['requestType']="NCC_COMPLETE";
        $jsonRequest['requestId']=$requestId;
        $jsonResponse = RestClient::sendRequest("https://www.yazhii.net/settle/ncc_controller.php", json_encode($jsonRequest));
        $responseObject = json_decode($jsonResponse);
        
        // print response
        // {"status":X,"statusDescription":"Description","data":{"nccReference":"NCCXXXXXXXXXX","responseText":"Response Description"}}
        // Eg :
        // Success Respone
        // {"status":0,"statusDescription":"SUCCESS","data":{"nccReference":"NCCXXXXXXXXXX","responseText":"APPROVED"}}
        //
        // Failure Response
        // {"status":5,"statusDescription":"GATEWAY_ERROR","data":{"nccReference":"NCCXXXXXXXXXX","responseText":null}}
        
        echo $jsonResponse;
    }else{
        echo "requestId not found";
    }
?>