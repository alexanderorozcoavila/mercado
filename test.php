<?php

    require_once 'vendor/autoload.php';

    //MercadoPago\SDK::setAccessToken("TEST-6919515303640106-062116-abdf9363bf85a87a55ccb1815872d014-300509930");
    //MercadoPago\SDK::setPublicKey("TEST-d4674cfe-e7ca-415c-a55b-0b1aae356a98");

    MercadoPago\SDK::setClientId("4872747012024883");
    MercadoPago\SDK::setClientSecret("YSct6DW4VhTA9sgZ68mfbsf1lw3SBaW1");

    # Create a preference object
    $preference = new MercadoPago\Preference();
    # Create an item object
    $item = new MercadoPago\Item();
    $item->id = "1234";
    $item->title = "Heavy Duty Leather Chair";
    $item->quantity = 1;
    $item->currency_id = "ARS";
    $item->unit_price = 81.71;
    # Create a payer object
    $payer = new MercadoPago\Payer();
    $payer->email = "test_user_58959236@testuser.com";
    # Setting preference properties
    $preference->items = array($item);
    $preference->payer = $payer;
    # Save and posting preference
    $preference->save();


    /*
    vendedor
    array(2) { ["code"]=> int(201) 
        ["body"]=> array(5) { 
            ["id"]=> int(330255629) 
            ["nickname"]=> string(11) "TETE5688990" 
            ["password"]=> string(9) "qatest563" 
            ["site_status"]=> string(6) "active" 
            ["email"]=> string(31) "test_user_58959236@testuser.com" } }

    comprador
    array(2) { ["code"]=> int(201) 
        ["body"]=> array(5) { 
            ["id"]=> int(330254308) 
            ["nickname"]=> string(11) "TETE1430633" 
            ["password"]=> string(10) "qatest7750" 
            ["site_status"]=> string(6) "active" 
            ["email"]=> string(31) "test_user_89340043@testuser.com" } }
    */

  ?>
  <html>
    <head>
        <title>Pagar</title>
    </head>
    <body>
        <a href="<?php echo $preference->init_point; ?>">Pay</a>
    </body>
</html>