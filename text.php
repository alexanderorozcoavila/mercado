<?php

    require_once 'vendor/autoload.php';

    MercadoPago\SDK::setAccessToken("TEST-6919515303640106-062116-abdf9363bf85a87a55ccb1815872d014-300509930");

    $payment = new MercadoPago\Payment();

    $payment->transaction_amount = 141;
    $payment->token = "YOUR_CARD_TOKEN";
    $payment->description = "Ergonomic Silk Shirt";
    $payment->installments = 1;
    $payment->payment_method_id = "visa";
    $payment->payer = array(
      "email" => "larue.nienow@hotmail.com"
    );

    $payment->save();

    echo $payment->status;

  ?>