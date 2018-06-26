<?php

require_once 'vendor/autoload.php';
  $token = $_REQUEST["token"];
  $payment_method_id = $_REQUEST["payment_method_id"];
  $installments = $_REQUEST["installments"];
  $issuer_id = $_REQUEST["issuer_id"];

  MercadoPago\SDK::setAccessToken("TEST-6919515303640106-062116-abdf9363bf85a87a55ccb1815872d014-300509930");
  //...
  $payment = new MercadoPago\Payment();
  $payment->transaction_amount = 300;
  $payment->token = $token;
  $payment->description = "Practical Marble Knife";
  $payment->installments = $installments;
  $payment->payment_method_id = $payment_method_id;
  $payment->issuer_id = $issuer_id;
  $payment->payer = array(
  "email" => "aryanna_hills@yahoo.com"
  );
  // Guarda y postea el pago
  $payment->save();
  //...
  // Imprime el estado del pago
  print  $payment->status;
  //print_r($payment);

?>