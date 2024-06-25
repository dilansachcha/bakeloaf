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
                                                        <i class="bi bi-speedometer2 mx-1 fs-1 text-black"></i>
                                                        <span class=" fs-5 text-black">Dashboard </span>
                                                    </a>

                                                    <a href="dilivererOrders.php" class="list-group-item list-group-item-action active colour1">
                                                        <i class="bi bi-car-front mx-1 fs-1"></i>
                                                        <span class=" fs-5">Orders </span>
                                                    </a>
                                                    <a href="delivererPayments.php" class="list-group-item list-group-item-action">
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
                                <span class="fs-3 fw-bolder">Orders</span><br>
                                <span class="fs-6 text-primary">Deliverer Home .</span>
                                <span class="fs-6">Orders</span>
                            </div>


                            <div class="col-12 mt-3 mb-5">
                                <div class="row m-1">
                                    <div class="col-12  bg-light rounded-4 shadow-lg ">
                                        <div class="row">
                                            <div class="col-12 mb-3 mt-1 ">
                                                <i class="bi bi-clock fs-4 text-success mx-2"></i>
                                                <span class="fs-5 text-success fw-bold"> Accept Orders</span>
                                            </div>


                                            <div class="col-12">
                                                <div class="row">

                                                    <div class="col-1"></div>
                                                    <div class="col-10">
                                                        <div class="row">
                                                            <?php
                                                            $data_rs =  Database::search("SELECT * FROM `pending_orders` WHERE `deliverer_email` = '" . $email . "' AND `deliverer_status` = 'Deliverer Accept'");
                                                            $n = $data_rs->num_rows;
                                                            for ($i = 0; $i < $n; $i++) {

                                                                $data = $data_rs->fetch_assoc();
                                                                $order_id = $data["order_id"];


                                                            ?>

                                                                <div class="col-5  shadow-lg rounded-3 mb-4 mx-4">
                                                                    <div class="row">
                                                                        <div class="col-12 text-center bg-dark">
                                                                            <div class="row p-2">
                                                                                <span class=" fw-bold fs-5 text-white">Order Details</span>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-12  border">
                                                                            <div class="row">
                                                                                <div class="col-4">
                                                                                    <span class=" fs-6">Order_id</span>
                                                                                </div>
                                                                                <div class="col-8">
                                                                                    <span class=" fs-6"><?php echo $order_id ?></span>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                        <div class="col-12  border">
                                                                            <div class="row">
                                                                                <div class="col-4">
                                                                                    <span class=" fs-6">Name</span>
                                                                                </div>
                                                                                <div class="col-8">
                                                                                    <span class=" fs-6"><?php echo $data["name"] ?></span>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12  border">
                                                                            <div class="row">
                                                                                <div class="col-4">
                                                                                    <span class=" fs-6">Email</span>
                                                                                </div>
                                                                                <div class="col-8">
                                                                                    <span class=" fs-6"><?php echo $data["email"] ?></span>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12  border">
                                                                            <div class="row">
                                                                                <div class="col-4">
                                                                                    <span class=" fs-6">Mobile</span>
                                                                                </div>
                                                                                <div class="col-8">
                                                                                    <span class=" fs-6"><?php echo $data["mobile"] ?></span>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12  border">
                                                                            <div class="row">
                                                                                <div class="col-4">
                                                                                    <span class=" fs-6">Address</span>
                                                                                </div>
                                                                                <div class="col-8">
                                                                                    <span class=" fs-6"><?php echo $data["address"] ?></span>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12  border">
                                                                            <div class="row">
                                                                                <div class="col-4">
                                                                                    <span class=" fs-6">City</span>
                                                                                </div>
                                                                                <div class="col-8">
                                                                                    <span class=" fs-6"><?php echo $data["city"] ?></span>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <?php

                                                                        $data_rs2 =  Database::search("SELECT `food_names`,`path` FROM request_orders_foods INNER JOIN `pending_orders` ON request_orders_foods.order_id = pending_orders.order_id INNER JOIN `foods` ON request_orders_foods.food_names = foods.name INNER JOIN `food_images` ON foods.id = food_images.food_id
                                                                        WHERE pending_orders.order_id = '" . $order_id . "'");
                                                                        $nd = $data_rs2->num_rows;


                                                                        ?>

                                                                        <div class="col-12  border">
                                                                            <div class="row">
                                                                                <div class="col-4">
                                                                                    <span class=" fs-6">food names</span>
                                                                                </div>
                                                                                <div class="col-8">
                                                                                    <?php

                                                                                    for ($a = 0; $a < $nd; $a++) {

                                                                                        $data2 = $data_rs2->fetch_assoc();
                                                                                        $names = $data2["food_names"];
                                                                                    ?>

                                                                                        <span class=" fs-6"><?php echo $names ?><br></span>
                                                                                    <?php
                                                                                    }

                                                                                    ?>


                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12  border">
                                                                            <div class="row">
                                                                                <div class="col-4">
                                                                                    <span class=" fs-6">Total</span>
                                                                                </div>
                                                                                <div class="col-8">
                                                                                    <span class=" fs-6 fw-bold text-danger">Rs: <?php echo $data["total"] ?>.00</span>
                                                                                </div>

                                                                            </div>
                                                                        </div>


                                                                        <div class="col-12 d-grid">
                                                                            <button class=" btn btn-info mt-2 mb-2" onclick="dilivererAcceptClick('<?php echo $order_id ?>');">Click to Finish</button>
                                                                        </div>

                                                                    </div>

                                                                </div>


                                                            <?php
                                                            }
                                                            ?>



                                                        </div>
                                                    </div>
                                                    <div class="col-1"></div>

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