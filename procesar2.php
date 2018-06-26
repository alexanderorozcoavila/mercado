<?php
error_reporting(E_ERROR);
require_once 'vendor/autoload.php';

function generarCodigo($longitud) {
    $key = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
   }
   
  $token = $_REQUEST["token"];
  $payment_method_id = $_REQUEST["payment_method_id"];
  $installments = $_REQUEST["installments"];
  $issuer_id = $_REQUEST["issuer_id"];
  $email = generarCodigo(6)."@laweb2.com";

  MercadoPago\SDK::setAccessToken("TEST-6919515303640106-062116-abdf9363bf85a87a55ccb1815872d014-300509930");
  //...

  $payment = new MercadoPago\Payment();
  $payment->transaction_amount = 100;
  $payment->token = $token;
  $payment->description = "Practical Marble Knife";
  $payment->installments = $installments;
  $payment->payment_method_id = $payment_method_id;
  $payment->issuer_id = $issuer_id;

  $payment->payer = array(
    "email" => $email
  );
  
  // Guarda y postea el pago
  //print var_dump($payment);
  $payment->save();
  if($payment->status=='approved'){
        $customer = new MercadoPago\Customer();
        $customer->email = $email;
        $customer->save();
        $cust_id = $customer->id;

        $card = new MercadoPago\Card();
        $card->token = $token;
        $card->customer_id = $cust_id;
        $card->save();
    
    session_start();
    $_SESSION['mail']  = $email;
    $_SESSION['token']  = $token;
    $_SESSION['customer']  = $cust_id;
    $_SESSION['user_id']  = $issuer_id;
    ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Page Title</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        </head>
        <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button>
                    <span class="glyphicon glyphicon-ok"></span> <strong>Success Message</strong>
                        <hr class="message-inner-separator">
                        <p>
                        the operation was successfully carried out. <br>
                        to return to twitter, use the following link.<br>
                        <a href="visual1.php">Twitter return</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
            
        </body>
        </html>
    <?php

  }else{
      ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Page Title</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
                            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        </head>
        <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6">
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button>
                        <span class="glyphicon glyphicon-record"></span> <strong>Warning Message</strong>
                        <hr class="message-inner-separator">
                        <p>
                            Best check yo self, you're not looking too good.<br>
                            to return to twitter, use the following link.<br>
                        <a href="visual1.php">Twitter return</a></p>
                    </div>
                </div>
            </div>
        </div>
            
        </body>
        </html>

      <?php
  }

?>