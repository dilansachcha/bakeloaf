<?php

session_start();
require "connection.php";


if ($_SESSION["admin"]) {

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Customer Feedback | admin Panel</title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resource/easy_food.png" />
    </head>

    <body>

        <div class=" container-fluid vh-100">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center mt-5">
                            <span class=" fs-1 fw-bold">Customer Feedback</span>
                        </div>

                        <div class="col-12 mt-5 bg-info">
                            <div class="row text-white">
                                <div class="col-2 border">
                                    <span class=" fs-5">Order_id</span>
                                </div>
                                <div class="col-3 border">
                                    <span class=" fs-5">Customer Email</span>
                                </div>
                                <div class="col-2 border">
                                    <span class=" fs-5">Date</span>
                                </div>
                                <div class="col-2 border">
                                    <span class=" fs-5" v>feedback</span>
                                </div>
                                <div class="col-1 border">
                                    <span class=" fs-5">type</span>
                                </div>
                                <div class="col-2 border">
                                    <span class=" fs-5">deliverer email</span>
                                </div>
                            </div>
                        </div>


                        <?php
                        $data_rs = Database::search("SELECT * FROM `feedback`");
                        $n = $data_rs->num_rows;

                        for ($i = 0; $i < $n; $i++) {

                            $data = $data_rs->fetch_assoc();

                        ?>
                            <div class="col-12 mt-4  border">
                                <div class="row p-2">
                                    <div class="col-12    ">
                                        <div class="row ">

                                            <div class="col-2">
                                                <span class=" text-black"><?php echo $data["order_id"] ?></span>
                                            </div>
                                            <div class="col-3">
                                                <span><?php echo $data["user_email"] ?></span>
                                            </div>
                                            <div class="col-2">
                                                <span><?php echo $data["date"] ?></span>
                                            </div>
                                            <div class="col-2">
                                                <span><?php echo $data["feedback"] ?></span>
                                            </div>
                                            <div class="col-1">
                                                <?php

                                                if ($data['type'] == 1) {
                                                ?>
                                                    <span class=" bg-success text-white p-1">Positive</span>
                                                <?php
                                                } else if ($data["type"] == 2) {
                                                ?>
                                                    <span class=" bg-warning text-black p-1">Neutral</span>
                                                <?php
                                                } else if ($data["type"] == 3) {
                                                ?>
                                                    <span class=" bg-danger text-white p-1">Negative</span>
                                                <?php
                                                }

                                                ?>

                                            </div>
                                            <div class="col-2">
                                                <span><?php echo $data["deliverer_email"] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        <?php
                        }

                        ?>


                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>

<?php


} else {

    echo ("you are not admin");
}

?>