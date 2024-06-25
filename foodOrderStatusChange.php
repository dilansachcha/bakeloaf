<?php

session_start();
require "connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status | Admin Panel</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/easy_food.png" />
</head>

<body>

    <div class=" container-fluid vh-100">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <span class=" co-1 fw-bold fs-1 mt-3">Food Order Status</span>
            </div>

            <div class="col-12  mt-5 ">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10  ">
                        <div class="row m-2 shadow-lg">
                            <div class="col-4 border">
                                <span class=" fs-5 fw-bold ">Email</span>
                            </div>
                            <div class="col-2 border">
                                <span class=" fs-5 fw-bold ">Order Time<span>
                            </div>
                            <div class="col-2 border">
                                <span class=" fs-5 fw-bold ">Mobile</span>
                            </div>
                            <div class="col-2 border">
                                <span class=" fs-5 fw-bold ">Order_ID</span>
                            </div>
                            <div class="col-2 border">
                                <span class=" fs-5 fw-bold ">Status</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-1"></div>

                </div>

            </div>

            <div class="col-12  mt-1">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10  rounded-3 ">
                        <?php

                        $data_rs = Database::search("SELECT * FROM `pending_orders` WHERE `status` = 'success' ");
                        $n = $data_rs->num_rows;
                        for ($i = 0; $i < $n; $i++) {
                            $d = $data_rs->fetch_assoc();
                            $order_id = $d["order_id"];
                            $email = $d["email"];

                        ?>

                            <div class="row m-2 ">
                                <div class="col-4 border d-flex   align-items-center">
                                    <span class=" fs-5 fw-bold "><?php echo $email ?></span>
                                </div>
                                <div class="col-2 border d-flex   align-items-lg-center">
                                    <span class=" fs-5 fw-bold "><?php echo $d["date"] ?><span>
                                </div>
                                <div class="col-2 border d-flex   align-items-center">
                                    <span class=" fs-5 fw-bold " id="mobile"><?php echo $d["mobile"] ?></span>
                                </div>
                                <div class="col-2 border d-flex   align-items-center">
                                    <span class=" fs-5 fw-bold "><?php echo $d["order_id"] ?></span>
                                </div>
                                <div class="col-2 border d-flex justify-content-center">
                                    <?php

                                    if ($d["deliverer_status"] == 'paid') {
                                    ?>

                                        <button class=" btn btn-warning mt-3 mb-3" onclick="foodStatus('<?php echo $order_id ?>');"><?php echo $d["deliverer_status"] ?></button>
                                    <?php
                                    } else if($d["deliverer_status"] == 'cooking') {
                                    ?>

                                        <button class=" btn btn-primary mt-3 mb-3" onclick="foodStatus('<?php echo $order_id ?>');"><?php echo $d["deliverer_status"] ?></button>
                                    <?php
                                    }else if ($d["deliverer_status"] == 'packing') {
                                        
                                    
                                        ?>
                                        <button class=" btn btn-danger mt-3 mb-3" onclick="foodStatus('<?php echo $order_id ?>');"><?php echo $d["deliverer_status"] ?></button>
                                        <?php
                                    }else if($d["deliverer_status"] == 'ready to deliver'){
                                       
                                        ?>
                                        <button class="btn btn-success mt-3 mb-3" onclick="foodStatus('<?php echo $order_id ?>');"><?php echo $d["deliverer_status"] ?></button>
                                        <?php

                                    }else if($d["deliverer_status"] == 'Deliverer Accept'){
                                        ?>
                                        <button class="btn btn-info mt-3 mb-3" onclick="foodStatus('<?php echo $order_id ?>');"><?php echo $d["deliverer_status"] ?></button>
                                        <?php
                                    }else{
                                        ?>
                                        <button class="btn btn-secondary mt-3 mb-3" onclick="foodStatus('<?php echo $order_id ?>');"><?php echo $d["deliverer_status"] ?></button>
                                        <?php
                                    }


                                    ?>



                                </div>
                            </div>
                        <?php
                        }


                        ?>

                    </div>
                    <div class="col-1"></div>

                </div>

            </div>
        </div>
    </div>


    <script src="script.js"></script>
</body>

</html>