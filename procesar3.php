<?php
error_reporting(E_ERROR);
require_once 'vendor/autoload.php';


$token = $_REQUEST["token"];
$payment_method_id = $_REQUEST["payment_method_id"];
$installments = $_REQUEST["installments"];
$issuer_id = $_REQUEST["issuer_id"];
$payer_id = $_REQUEST["payer_id"];
$payer_type = $_REQUEST["payer_type"];
   
  MercadoPago\SDK::setAccessToken("TEST-6919515303640106-062116-abdf9363bf85a87a55ccb1815872d014-300509930");
  //...

    $payment = new MercadoPago\Payment();
    $payment->transaction_amount = 100;
    $payment->token = $token;
    $payment->issuer_id = $issuer_id;
    $payment->installments = $installments;
    $payment->payment_method_id = $payment_method_id;
    $payment->payer = array(
        "type" => $payer_type,
        "id" => $payer_id
    );
 
  $payment->save();
  if($payment->status=='approved'){
    
    session_start();
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