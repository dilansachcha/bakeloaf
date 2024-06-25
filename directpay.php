<?php

session_start();
require "connection.php";


if (isset($_SESSION["po"]["email"])) {
    $email = $_SESSION["po"]["email"];
    $total = $_SESSION["po"]["total"];
    $mobile = $_SESSION["po"]["mobile"];
    $id = $_SESSION["po"]["id"];

    

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Directpay| BakeLoaf</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

        <link rel="icon" href="resource/bakeloaf.png" />
    </head>


    <body>
        <div class=" container-fluid vh-100 d-flex justify-content-center">
            <div class="row align-items-center">
                        <div class="card directpay-card text-center">
                            
                                <h2 class="category">Order Confirmed!</h2>
                                <h4 class="title">You Have Ordered : </h4>
                                <p class="description">What all of these have in common is that they're pulling information out of the app or the service and making it relevant to the moment. </p>
                                <button type="submit" id="payhere-payment" class="btn btn-primary col-12" onclick="pay();">Proceed to Pay</button>
                        </div>

            </div>
        </div>


        <script>

        </script>

        <script src="script.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

    </body>

    </html>
<?php
} else {
}

?>