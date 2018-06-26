<?php   
    require_once 'vendor/autoload.php';
  MercadoPago\SDK::setAccessToken("TEST-6919515303640106-062116-abdf9363bf85a87a55ccb1815872d014-300509930");

  $customer = new MercadoPago\Customer();
  $customer->email = "hyhuyiyyi@sadsdesdasdsd.com";
  $customer->save();

  $cust_id = $customer->id;
  print $cust_id;

  $card = new MercadoPago\Card();
  $card->token = "9b2d63e00d66a8c721607214cedaecda";
  $card->customer_id = $cust_id;
  $card->save();

  print var_dump($card);

?>