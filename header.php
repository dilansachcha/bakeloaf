<?php

session_start();

require "connection.php";
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />



</head>

<body>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    </head>

    <body>
        <div class=" container-fluid">
            <div class="row">
                <div class="col-12" style="background-color: #3c2f27;">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-4 col-12  d-flex align-items-center">
                                    <div class="row m-1">
                                        <div class="col-12 ">
                                            <div class="row">
                                                <div class="col-lg-6 col-6    ">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-3 d-flex justify-content-end ">
                                                            <i class="bi bi-phone fs-1 text-white"></i>
                                                        </div>
                                                        <div class="col-lg-8 col-9  d-flex align-content-center  ">
                                                            <div class="row">
                                                                <div class="col-12 ">
                                                                    <span class=" fw-bold co-1 ">CONTACT US</span>
                                                                </div>
                                                                <div class="col-12 ">
                                                                    <span class=" fs-6 text-white">+94 760 553 316</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-6 ">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-3 d-flex justify-content-end">
                                                            <i class="bi bi-car-front fs-1 text-white"></i>
                                                        </div>
                                                        <div class="col-lg-8 col-9 d-flex align-content-center  ">
                                                            <div class="row">
                                                                <div class="col-12 d-flex align-items-center">
                                                                    <span class=" fw-bold co-1 ">FAST DELIVERY</span>
                                                                </div>
                                                                <div class="col-12 ">
                                                                    <span class=" fs-6 text-white">Freshness Ensured!</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2 p-2" style="border-radius: 30px;">
                                            <div class="row  m-1">
                                                <div class="col-6 d-flex justify-content-center">
                                                    <div class="dropdown">
                                                        <button class="dropbtn btn-dark btn shadow-lg text-white-50">Food Selection</button>
                                                        <div class="dropdown-content">
                                                            <a href="breads.php">Breads & Rolls</a>
                                                            <a href="cakesandcupcakes.php">Cakes & Cupcakes</a>
                                                            <a href="pastrydanish.php">pastries & Danishes</a>
                                                            <a href="cookiesandbars.php">Cookies & Bars</a>
                                                            <a href="savoryitems.php">Savory Items</a>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-6 d-flex justify-content-center">
                                                    <button type="button" class="btn shadow-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">Order Tracker</button>
                                                </div>


                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel" >ORDER TRACKER</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="col-12 bg-dark ">
                                                                    <div class="row">

                                                                        <div class="col-12 ">
                                                                            <div class="row text-white">
                                                                                <div class="col-2 d-flex ">
                                                                                    <span>Order ID</span>
                                                                                </div>
                                                                                <div class="col-3 d-flex ">
                                                                                    <span>Date</span>
                                                                                </div>
                                                                                <div class="col-2 d-flex ">
                                                                                    <span>Price</span>
                                                                                </div>
                                                                                <div class="col-3 d-flex ">
                                                                                    <span>Status</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-12 mt-2">
                                                                    <div class="row">
                                                                        <?php

                                                                        if (isset($_SESSION["u"]["email"])) {
                                                                            $email1 = $_SESSION["u"]["email"];

                                                                            $data_rs1 = Database::search("SELECT * FROM `pending_orders` WHERE `email` = '" . $email1 . "' AND `status` ='success'");
                                                                            $nd = $data_rs1->num_rows;

                                                                            for ($i = 0; $i < $nd; $i++) {
                                                                                $data1 = $data_rs1->fetch_assoc();
                                                                        ?>

                                                                                <div class="col-12 border mt-1 mb-1">
                                                                                    <div class="row">
                                                                                        <div class="col-2 d-flex align-items-center">
                                                                                            <span><?php echo $data1["order_id"] ?></span>
                                                                                        </div>
                                                                                        <div class="col-3 d-flex align-items-center">
                                                                                            <span><?php echo $data1["date"] ?></span>
                                                                                        </div>
                                                                                        <div class="col-2 d-flex align-items-center">
                                                                                            <span>Rs:<?php echo $data1["total"] ?>.00</span>
                                                                                        </div>
                                                                                        <div class="col-3 d-flex align-items-center">
                                                                                            <?php

                                                                                            if ($data1["deliverer_status"] == 'paid') {
                                                                                            ?>

                                                                                                <button class=" btn btn-warning mt-3 mb-3"><?php echo $data1["deliverer_status"] ?></button>
                                                                                            <?php
                                                                                            } else if ($data1["deliverer_status"] == 'cooking') {
                                                                                            ?>

                                                                                                <button class=" btn btn-primary mt-3 mb-3"><?php echo $data1["deliverer_status"] ?></button>
                                                                                            <?php
                                                                                            } else if ($data1["deliverer_status"] == 'packing') {


                                                                                            ?>
                                                                                                <button class=" btn btn-danger mt-3 mb-3"><?php echo $data1["deliverer_status"] ?></button>
                                                                                            <?php
                                                                                            } else if ($data1["deliverer_status"] == 'ready to deliver') {

                                                                                            ?>
                                                                                                <button class="btn btn-success mt-3 mb-3"><?php echo $data1["deliverer_status"] ?></button>
                                                                                            <?php

                                                                                            } else if ($data1["deliverer_status"] == 'Deliverer Accept') {
                                                                                            ?>
                                                                                                <button class="btn btn-info mt-3 mb-3"><?php echo $data1["deliverer_status"] ?></button>
                                                                                            <?php
                                                                                            } else {
                                                                                            ?>
                                                                                                <button class="btn btn-secondary mt-3 mb-3"><?php echo $data1["deliverer_status"] ?></button>
                                                                                            <?php
                                                                                            }


                                                                                            ?>
                                                                                        </div>
                                                                                        <div class="col-2 d-flex align-items-center">
                                                                                            <?php

                                                                                            $d_rs = Database::search("SELECT * FROM `feedback` WHERE `order_id` = '" . $data1["order_id"] . "'");
                                                                                            $ndd = $d_rs->num_rows;

                                                                                            if ($ndd == true) {
                                                                                            ?>
                                                                                                <button class=" btn btn-outline-primary visually-hidden" onclick="addFeedback('<?php echo $data1['order_id'] ?>');">+ Feedback</button>
                                                                                            <?php
                                                                                            } else {
                                                                                            ?>

                                                                                                <button class=" btn btn-outline-primary" onclick="addFeedback('<?php echo $data1['order_id'] ?>');">+ Feedback</button>
                                                                                            <?php
                                                                                            }

                                                                                            ?>

                                                                                        </div>

                                                                                    </div>
                                                                                </div>

                                                                        <?php
                                                                            }
                                                                        }


                                                                        ?>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-4  image2 d-lg-block d-none"></div>

                                <div class="col-lg-4 col-12 d-flex align-items-center  ">
                                    <div class="row m-1">
                                        <div class="col-lg-12 col-12 d-lg-block ">
                                            <div class="row">
                                                <div class="col-lg-4 col-2   d-flex justify-content-end">
                                                    <i class="bi bi-clock text-white fs-1"></i>
                                                </div>
                                                <div class="col-lg-8 col-10 d-flex align-content-center  ">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-6 ">
                                                            <span class=" fw-bold co-1 ">DELIVERY FROM</span>
                                                        </div>
                                                        <div class="col-lg-12 col-6">
                                                            <span class="text-white">9 A.M. To 9 P.M.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-2  bg-light" style="border-radius: 30px;">
                                            <div class="row ">


                                                <div class="col-lg-5 col-5  d-flex justify-content-center align-items-center ">


                                                    <?php



                                                    if (isset($_SESSION["u"])) {
                                                        $data = $_SESSION["u"];
                                                        $email = $_SESSION["u"]["email"];

                                                    ?>
                                                        <span class=" fw-bold">Welcome</span>&nbsp;
                                                        <span class="text-lg-start text-danger fw-bold"><?php echo $data["fname"]; ?></span>


                                                    <?php

                                                    } else {

                                                    ?>

                                                        <a href="index.php" class=" btn btn-dark">Sign In Or Register</a>&nbsp;

                                                    <?php

                                                    }

                                                    ?>


                                                </div>

                                                <div class="col-lg-5  col-5 d-flex justify-content-center align-items-center ">
                                                    <div class="row">
                                                        <?php

                                                        if (isset($_SESSION["u"]["email"])) {
                                                        ?>
                                                            <div class="dropdown ">
                                                                <button class="dropbtn btn">My Account <i class="bi bi-caret-down-fill"></i></button>
                                                                <div class="dropdown-content">
                                                                    <a href="userProfile.php">My Profile</a>
                                                                    <a href="purchaseHistory.php">Purchase History</a>
                                                                    <a href="cart.php">Cart</a>
                                                                    <a href="" onclick="signout();">Log Out</a>

                                                                </div>
                                                            </div>

                                                        <?php
                                                        } else {
                                                        }

                                                        ?>

                                                    </div>

                                                </div>


                                                <?php

                                                if (isset($_SESSION["u"]["email"])) {

                                                ?>

                                                    <div class="col-lg-2 col-2 d-flex justify-content-start align-items-center " onclick=" window.location='cart.php'">

                                                        <?php


                                                        ?>
                                                        <span class="position-relative ">
                                                            <i class="bi bi-cart-check fs-1 pointer "></i>

                                                            <?php

                                                            $cart = Database::search("SELECT * FROM `cart` WHERE `users_email` = '" . $email . "' ");
                                                            $n = $cart->num_rows;

                                                            if ($n == 0) {
                                                            ?>
                                                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary mt-3 visible" id="b12">
                                                                    <i class="bi bi-emoji-frown"></i>

                                                                </span>
                                                            <?php
                                                            } else {

                                                            ?>
                                                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-3 visible" id="b12">
                                                                    <?php echo $n ?> +

                                                                </span>
                                                        </span>
                                                    <?php
                                                            }
                                                    ?>





                                                    </div>

                                                <?php


                                                } else {

                                                ?>

                                                    <div class="col-lg-2 col-2 d-flex justify-content-start align-items-center ">

                                                        <?php


                                                        ?>
                                                        <span class="position-relative ">
                                                            <i class="bi bi-cart-check fs-1 pointer "></i>


                                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary mt-3 visible" id="b12">
                                                                <i class="bi bi-emoji-frown"></i>

                                                            </span>




                                                        </span>






                                                    </div>

                                                <?php
                                                }


                                                ?>




                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>




        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
    </body>

    </html>

</body>