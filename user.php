<?php

require_once 'vendor/autoload.php';
  MercadoPago\SDK::setAccessToken("TEST-6919515303640106-062116-abdf9363bf85a87a55ccb1815872d014-300509930");

  $body = array(
    "json_data" => array(
      "site_id" => "MLA"
    )
  );

  $result = MercadoPago\SDK::post('/users/test_user', $body);

  var_dump($result);
?>