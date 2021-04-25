# iPayOS payment gateway client

Yazhi NCC provides easy smart and secured platform for payments. It builds single and common bridge for merchants, service providers, consumers and money authorities, which brings new user experience in fintech.

## How to run
* Register as Business user in https://www.ipayos.com/register.php, Login to Yazhi iPayOS.
* Retrieve Client ID, Token & Secret from Dashboard -> Payment Gateway Panel.
* Checkout/Download the project from https://gitlab.com/yazhii-community/yazhii-ipayos-client-demo.git
* Replace your Client ID, Token & Secret in both ncc_init.php & ncc_complete.php
* Deploy in WEB Server (Eg. Apache)
* Browse index.php

## Payment Flows
### Store card and pay seemlessly
* NCC CARD INIT Request
* NCC CARD INIT Response with redirection URL
* Redirect to Bank/Payment Gateway
* Enter Card Details
* Redirect to User
* NCC CARD COMPLETE Request
* NCC CARD COMPLETE Response with cardToken. Successfully stored card.
* NCC PAYMENT DIRECT Request using above cardToken
* NCC PAYMENT DIRECT response. Successful payment.

### On the fly enter card details
* NCC INIT Request
* NCC INIT Response with redirection URL
* Redirect to Bank/Payment Gateway
* Enter Card Details
* Redirect to User
* NCC CARD COMPLETE Request
* NCC CARD COMPLETE Response. Successful payment.

## Request Messages & Parameters
There are 5 types of messages, normally used to do a successful payment. All messages should be sent in JSON format and Responses also should be decoded as JSON format.
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

### NCC CARD INIT Request
This message will be sent from client to NCC to initiate the card storing request. Following parameters will be used to generate this message :
* clientId
* token
* secret
* requestType = "NCC_CARD_INIT"
* cardName
* cardType
* msisdn
* email
* clientReference
* redirectUrl

#### NCC CARD INIT Response
This will contain following parameters :
* status
* statusDescription
* data 

And Data will have following details :
* requestId
* paymentPageUrl

### NCC CARD COMPLETE Request
This message will be sent from client to NCC to complete the payment request. Following parameters will be used to generate this message :
* clientId
* token
* secret
* requestType = "NCC_CARD_COMPLETE"
* requestId

#### NCC CARD COMPLETE Response
This will contain following parameters :
* status
* statusDescription
* data 

And Data will have following details :
* nccReference
* responseText
* cardType
* CardNumber
* cardExpiry
* cardToken

### NCC PAYMENT DIRECT Request
This message will be sent from client to NCC to do direct payment using stored card (cardToken) request. Following parameters will be used to generate this message :
* clientId
* token
* secret
* requestType = "NCC_PAYMENT_DIRECT"
* transactionAmount
* cardToken
* clientReference

#### NCC PAYMENT DIRECT Response
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
* Expiry Date : 05/22
* CCV : 123
