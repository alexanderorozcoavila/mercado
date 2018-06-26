<?php
    require_once 'vendor/autoload.php';
    MercadoPago\SDK::setAccessToken("TEST-6919515303640106-062116-abdf9363bf85a87a55ccb1815872d014-300509930");
    if((isset($_GET['price'])) && (isset($_GET['product']))){
        if((!empty($_GET['price'])) && (!empty($_GET['product']))){
            $price = $_GET['price'];
            $product = $_GET['product'];


            session_start();
            if(isset($_SESSION['mail']) && isset($_SESSION['user_id']) && isset($_SESSION['token'])){

                $email = $_SESSION['mail'];
                $token = $_SESSION['token'];
                $user_id = $_SESSION['user_id'];

                $filters = array(
                    "email"=>$email
                  );
                //print $email ;
                $customers = MercadoPago\Customer::search($filters);
                // print var_dump($customers);
                $cards = $customers->cards;
                $cust_id = $customers->id;
                // print $customers->id;
                // foreach ($cards as $card) {
                //     echo $card->id;
                //   }

                 // exit;


            }


            ?>
              <!DOCTYPE html>
                <html>
                <head>
                    <meta charset="utf-8" />
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <title>Page Title</title>
                    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
                    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
                </head>
                <body>
                    <header>
                    <div class="collapse bg-dark" id="navbarHeader">
                        <div class="container">
                        <div class="row">
                            <div class="col-sm-8 col-md-7 py-4">
                            <h4 class="text-white">About</h4>
                            <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                            </div>
                            <div class="col-sm-4 offset-md-1 py-4">
                            <h4 class="text-white">Contact</h4>
                            <ul class="list-unstyled">
                                <li><a href="#" class="text-white">Follow on Twitter</a></li>
                                <li><a href="#" class="text-white">Like on Facebook</a></li>
                                <li><a href="#" class="text-white">Email me</a></li>
                            </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="navbar navbar-dark bg-dark box-shadow">
                        <div class="container d-flex justify-content-between">
                        <a href="#" class="navbar-brand d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                            <strong>Album</strong>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        </div>
                    </div>
                    </header>
                    <main role="main">
                    <div class="album py-5 bg-light">
                        <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22348%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20348%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_16432638c7b%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A17pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_16432638c7b%22%3E%3Crect%20width%3D%22348%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22116.7265625%22%20y%3D%22120.3%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
                                <div class="card-body">
                                <p class="card-text">Product description
                                
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                    <?php
                                    if(isset($cust_id) && !empty($cust_id)){
                                        ?>
                                            <form action="procesar3.php" method="POST">
                                        <?php
                                    }else{
                                        ?>
                                            <form action="procesar2.php" method="POST">
                                        <?php
                                    }
                                    ?>
                                    
                                    <script
                                        src="https://www.mercadopago.com.ar/integrations/v1/checkout.js"
                                        data-public-key="TEST-d4674cfe-e7ca-415c-a55b-0b1aae356a98"
                                        data-transaction-amount="<?php echo $price; ?>"
                                        <?php
                                            if(isset($cust_id) && !empty($cust_id)){
                                        ?>
                                        data-customer-id="<?php echo $cust_id; ?>"
                                        <?php
                                            }
                                            if(isset($cards) && !empty($cards)){
                                                ?>
                                        data-card-ids="<?php
                                                foreach ($cards as $card) {
                                                    echo $card->id;
                                                }
                                                ?>"
                                                <?php
                                            }
                                        ?>
                                        >
                                    </script>
                                    </form>
                                    </div>
                                    <small class=""><?php echo $price; ?>$</small>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </main>
                </body>
                </html>

            <?php
        }
    }else{
        //print "no";
    }

?>