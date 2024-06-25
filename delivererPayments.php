<?php

require "connection.php";


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="resource/easy_food.png" />
    <title>Deliverer Home | easyfood</title>

</head>

<body>


    <div class=" container-fluid ">
        <div class="row ">
            <?php

            include "delivererHeader.php";
            $email = $_SESSION["d"]["email"];


            ?>
        </div>

        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10 mt-4 rounded-4 shadow-lg">
                            <div class="row">
                                <div class="col-12 mt-2  text-center">
                                    <span class="fs-4 fw-bold">Deliverer Option</span>
                                </div>
                                <div class="col-12 mt-2 mb-3">
                                    <div class="row ">


                                        <div class="col-12 mb-2">
                                            <div class="list-group ">
                                                <a href="delivererHome.php" class="list-group-item list-group-item-action  " aria-current="true">
                                                    <i class="bi bi-speedometer2 mx-1 fs-1 "></i>
                                                    <span class=" fs-5 ">Dashboard </span>
                                                </a>

                                                <a href="dilivererOrders.php" class="list-group-item list-group-item-action">
                                                    <i class="bi bi-car-front mx-1 fs-1"></i>
                                                    <span class=" fs-5">Orders </span>
                                                </a>
                                                <a href="delivererPayments.php" class="list-group-item list-group-item-action active colour1 ">
                                                    <i class="bi bi-currency-dollar mx-1 fs-1"></i>
                                                    <span class=" fs-5">Payments</span>
                                                </a>
                                                <a href="diliver_signin.php" class="list-group-item list-group-item-action">
                                                    <i class="bi bi-box-arrow-left mx-1 fs-1"></i>
                                                    <span class=" fs-5">Log Out</span>
                                                </a>

                                            </div>
                                        </div>

                                    </div>


                                </div>

                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                </div>
                <div class="col-9 mt-4  mb-3 rounded-4 ">
                    <div class="row">
                        <div class="col-12">
                            <span class="fs-3 fw-bolder">Payments</span><br>
                            <span class="fs-6 text-primary">Deliverer Home .</span>
                            <span class="fs-6">Payments</span>
                        </div>





                        <div class="col-12 mt-3 mb-5">
                            <div class="row m-1">
                                <div class="col-12   ">
                                    <div class="row">
                                        <div class="col-12 mb-3 mt-1">
                                            <i class="bi bi-clock fs-4 text-secondary"></i>
                                            <span class="fs-5 text-secondary fw-bold">Success Orders</span>
                                        </div>
                                        <div class="col-12 mt-1 mb-2">
                                            <div class="row ">

                                                <div class="col-12 bg-info rounded-4 shadow-lg">
                                                    <div class="row p-2">
                                                        <div class="col-3 d-flex justify-content-center ">
                                                            <span>Order ID</span>
                                                        </div>
                                                        <div class="col-3 d-flex justify-content-center">
                                                            <span>Date</span>
                                                        </div>
                                                        <div class="col-2 d-flex justify-content-center">
                                                            <span>Total</span>
                                                        </div>
                                                        <div class="col-2 d-flex justify-content-center">
                                                            <span>Status</span>
                                                        </div>
                                                        <div class="col-2">
                                                            <span>Earnings</span>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-12 mt-4 mb-2">
                                            <div class="row">
                                                <?php

                                                $ddf = 0;

                                                $data3_rs = Database::search("SELECT * FROM `pending_orders` WHERE `status` = 'success' AND `deliverer_status`='delivered' AND `deliverer_email` ='" . $email . "' ");
                                                $n3 = $data3_rs->num_rows;

                                                for ($i = 0; $i < $n3; $i++) {
                                                    $data3 = $data3_rs->fetch_assoc();
                                                    $order_id = $data3["order_id"];

                                                ?>


                                                    <div class="col-12 ">
                                                        <div class="row">
                                                            <div class="col-3 border d-flex align-items-center">
                                                                <span><?php echo $order_id ?></span>
                                                            </div>
                                                            <div class="col-3 border d-flex align-items-center">
                                                                <span><?php echo $data3["date"] ?></span>
                                                            </div>
                                                            <div class="col-2 border d-flex align-items-center">
                                                                <span>Rs: <?php echo $data3["total"] ?>.00</span>
                                                            </div>
                                                            <div class="col-2 border d-flex justify-content-center  align-items-center ">
                                                                <span class=" visually-hidden" id="email"><?php echo $email ?></span>
                                                                <button class="btn btn-secondary mt-2 mb-2" onclick="delivererAcceptOrders('<?php echo $order_id ?>');"><?php echo $data3["deliverer_status"] ?></button>
                                                            </div>
                                                            <div class="col-2 border d-flex justify-content-center  align-items-center ">

                                                                <?php

                                                                $d = 100;
                                                                $dd = 10;
                                                                $total = $data3["total"];
                                                                $nd = $total / $d;
                                                                $ddd = $nd * $dd;

                                                                $ddf = $ddf + $ddd;





                                                                ?>

                                                                <span class=" fw-bold fs-5 text-danger">Rs: <?php echo $ddd ?>.00</span>




                                                            </div>

                                                        </div>

                                                    </div>




                                                <?php
                                                }

                                                ?>


                                            </div>
                                            <div class="col-12 mt-4 mb-4">
                                                <div class="row">
                                                    <div class="col-3"></div>
                                                    <div class="col-3"></div>
                                                    <div class="col-2"></div>
                                                    <div class="col-2">
                                                        <span class=" fw-bold fs-5 text-primary">Total Earnings</span>
                                                    </div>
                                                    <div class="col-2">
                                                        <?php

                                                        $email = $_SESSION["d"]["email"];

                                                        Database::iud("UPDATE `diliverer` SET `total_earnings`= '" . $ddf . "'  WHERE `email` = '" . $email . "' ");

                                                        ?>
                                                        <span class=" fw-bold fs-3 text-primary">Rs: <?php echo $ddf ?>.00</span>
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
            </div>
        </div>
    </div>

    </div>




    <script src="script.js"></script>
</body>

</html>