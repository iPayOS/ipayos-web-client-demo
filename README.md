# Yazhi NCC payment gateway client

Yazhi NCC provides easy smart and secured platform for payments. It builds single and common bridge for merchants, service providers, consumers and money authorities, which brings new user experience in fintech.

## How to run
* Register as Business user in http://localhost/yazhii-settle-web/register.php, Login to Yazhi NCC.
* Retrieve Client ID, Token & Secret from Dashboard -> Payment Gateway Panel.
* Checkout/Download the project from https://gitlab.com/yazhii-community/yazhii-ncc-client-demo.git
* Replace your Client ID, Token & Secret in both ncc_init.php & ncc_complete.php
* Deploy in WEB Server (Eg. Apache)
* Browse index.php

## Request Messages & Parameters
There are 2 type of messages, normally used to do a successful payment. All messages should be sent in JSON format and Responses also should be decoded as JSON format.
### NCC INIT Request
This message will be sent from client to NCC to initiate the payment request. Following parameters will be used to generate this message :
* clientId
* token
* secret
* requestType = "NCC_INIT"
* transactionAmount
* msisdn
* email
* clientReference
* redirectUrl

#### NCC INIT Response
This will contain following parameters :
* status
* statusDescription
* data 

And Data will have following details :
* requestId
* paymentPageUrl

### NCC COMPLETE Request
This message will be sent from client to NCC to complete the payment request. Following parameters will be used to generate this message :
* clientId
* token
* secret
* requestType = "NCC_COMPLETE"
* transactionAmount
* msisdn
* email
* clientReference
* redirectUrl

#### NCC COMPLETE Response
This will contain following parameters :
* status
* statusDescription
* data 

And Data will have following details :
* nccReference
* responseText

## Test credit card details
Following TEST credit card can be used to test your integration.
* Card No : 4564456445644564
* Expiry Date : 05/20
* CCV : 123