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
                                                    <a href="delivererHome.php" class="list-group-item list-group-item-action active colour1 " aria-current="true">
                                                        <i class="bi bi-speedometer2 mx-1 fs-1 "></i>
                                                        <span class=" fs-5 ">Dashboard </span>
                                                    </a>

                                                    <a href="dilivererOrders.php" class="list-group-item list-group-item-action">
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
                                <span class="fs-3 fw-bolder">Dashboard</span><br>
                                <span class="fs-6 text-primary">Deliverer Home .</span>
                                <span class="fs-6">easyfood deliverer Dashboard</span>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-10 bg-light rounded-4 shadow  ">
                                        <div class="row">

                                            <?php


                                            ?>
                                            <div class="col-1">
                                                <i class="bi bi-person-badge-fill fs-1 text-info"></i>
                                            </div>
                                            <div class="col-6 ">

                                                <span class="fs-5">Deliverer Name : <?php echo $_SESSION["d"]["fname"];
                                                                                    echo (" ");
                                                                                    echo $_SESSION["d"]["lname"]; ?></span><br>
                                                <div class="col-12 mt-2 mb-2">
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <span class="fs-5">Status :</span>
                                                        </div>
                                                        <div class="col-5">
                                                            <select class=" form-select" aria-label="Default select example" id="option">
                                                                <option selected>select status</option>
                                                                <?php

                                                                $data_rs = Database::search("SELECT * FROM `deliverer_status`");
                                                                $n = $data_rs->num_rows;

                                                                for ($x = 0; $x < $n; $x++) {
                                                                    $data = $data_rs->fetch_assoc();

                                                                ?>

                                                                    <option value="<?php echo $data["id"]; ?>"><?php echo $data["name"]; ?></option>

                                                                <?php

                                                                }

                                                                ?>



                                                            </select>
                                                        </div>
                                                        <div class="col-2">
                                                            <button class="btn btn-outline-secondary" onclick="dilivererStatusSet('<?php echo $email ?>');">Set</button>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-3 d-flex justify-content-center align-items-center">
                                                
                                            </div>
                                            <div class="col-1 d-flex justify-content-center">
                                                <div class="row align-items-center">
                                                    <div class="col-12 d-flex justify-content-center">
                                                        <?php

                                                        $data2_rs =   Database::search("SELECT `deliverer_status_id` FROM `diliverer` WHERE `email` = '" . $email . "' ");
                                                        $n2 = $data2_rs->num_rows;
                                                        $data2 = $data2_rs->fetch_assoc();

                                                        if ($data2["deliverer_status_id"] == '1') {
                                                        ?>

                                                            <lable class="btn btn-success rounded-5" id="status">Online</lable>

                                                        <?php

                                                        } else {

                                                        ?>

                                                            <lable class="btn btn-danger rounded-5" id="status">Offline</lable>

                                                        <?php

                                                        }

                                                        ?>

                                                    </div>
                                                </div>



                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-1"></div>
                                </div>
                            </div>

                            <div class="col-12 mt-5 mb-3">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-1"></div>
                                            <?php

                                            $data_rs4 = Database::search("SELECT `total_earnings` FROM `diliverer` WHERE `email` = '" . $email . "'");
                                            $n4 = $data_rs4->num_rows;
                                            $data4 = $data_rs4->fetch_assoc();
                                            ?>
                                            <div class="col-3 border  border-info  rounded-4 d-flex justify-content-center ">
                                                <div class="row p-2">
                                                    <span class=" fw-bold fs-4 text-info">Rs: <?php echo $data4["total_earnings"] ?>.00</span>
                                                </div>

                                            </div>
                                            <div class="col-2  d-flex  align-items-center">
                                                <div class="row">
                                                    <span class="bg-info  text-white" style="border-radius: 0px 10px 10px 0px;">Total Earnings</span>
                                                </div>

                                            </div>




                                            <div class="col-2  d-flex justify-content-end  align-items-center">
                                                <div class="row">
                                                    <span class="bg-dark  text-white" style="border-radius: 10px 0px 0px 10px;">Successfull Orders</span>
                                                </div>

                                            </div>
                                            <div class="col-3 border  border-dark  rounded-4 d-flex justify-content-center ">
                                                <div class="row p-1">
                                                    <?php

                                                    $data_rs7 = Database::search("SELECT * FROM `pending_orders` WHERE `deliverer_email` = '" . $email . "' AND `deliverer_status`= 'delivered'");
                                                    $n7 = $data_rs7->num_rows;
                                                    $data7 = $data_rs7->fetch_assoc();
                                                    ?>
                                                    <span class=" fw-bold fs-3 text-dark"><?php echo $n7 ?></span>
                                                </div>

                                            </div>
                                            <div class="col-1"></div>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <div class="row">
                                            <div class="col-1"></div>


                                            <div class="col-3 border  border-success  rounded-4 d-flex justify-content-center ">
                                                <div class="row p-2">
                                                    <?php

                                                    $data_rs5 = Database::search("SELECT * FROM `feedback` WHERE `deliverer_email` = '" . $email . "' AND `type`= '1' ");
                                                    $n5 = $data_rs5->num_rows;
                                                    $data5 = $data_rs5->fetch_assoc();
                                                    ?>
                                                    <span class=" fw-bold fs-4 text-success"><?php echo $n5 ?></span>
                                                </div>

                                            </div>
                                            <div class="col-2  d-flex  align-items-center">
                                                <div class="row">
                                                    <span class="bg-success text-white" style="border-radius: 0px 10px 10px 0px;">Positive Feedbacks</span>
                                                </div>

                                            </div>


                                            <div class="col-2  d-flex justify-content-end  align-items-center">
                                                <div class="row">
                                                    <span class="bg-danger  text-white" style="border-radius: 10px 0px 0px 10px;">Negative Feedbacks</span>
                                                </div>

                                            </div>
                                            <div class="col-3 border  border-danger  rounded-4 d-flex justify-content-center ">
                                                <div class="row p-1">
                                                    <?php

                                                    $data_rs6 = Database::search("SELECT * FROM `feedback` WHERE `deliverer_email` = '" . $email . "' AND `type`= '3' ");
                                                    $n6 = $data_rs6->num_rows;
                                                    $data6 = $data_rs6->fetch_assoc();
                                                    ?>
                                                    <span class=" fw-bold fs-3 text-danger"><?php echo $n6 ?></span>
                                                </div>

                                            </div>
                                            <div class="col-1"></div>

                                        </div>
                                    </div>



                                </div>
                            </div>

                            <?php

                            $deli_rs =  Database::search("SELECT * FROM `deliverer_has_address` WHERE `deliverer_email` = '" . $email . "' ");
                            $dn = $deli_rs->num_rows;

                            $dili = $deli_rs->fetch_assoc();

                            if ($dili == true) {
                            ?>

                                <div class="col-12 mt-3 mb-5 " id="dv1">
                                    <div class="row m-1">
                                        <div class="col-12  bg-light rounded-4 shadow-lg ">
                                            <div class="row">
                                                <div class="col-12 mb-3 mt-1">
                                                    <i class="bi bi-clock fs-4 text-danger"></i>
                                                    <span class="fs-5 text-danger fw-bold">Pending Orders</span>
                                                </div>
                                                <div class="col-12 mt-1 mb-2">
                                                    <div class="row ">
                                                        <div class="col-1"></div>
                                                        <div class="col-10 colour1 rounded-4 shadow-lg">
                                                            <div class="row p-2">
                                                                <div class="col-3 d-flex justify-content-center ">
                                                                    <span>Email</span>
                                                                </div>
                                                                <div class="col-3 d-flex justify-content-center">
                                                                    <span>Name</span>
                                                                </div>
                                                                <div class="col-3 d-flex justify-content-center">
                                                                    <span>Order ID</span>
                                                                </div>
                                                                <div class="col-3 d-flex justify-content-center">
                                                                    <span class="">Status</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-1"></div>

                                                    </div>
                                                </div>

                                                <div class="col-12 mt-4 mb-2">
                                                    <div class="row">
                                                        <?php

                                                        $data3_rs = Database::search("SELECT * FROM `pending_orders` WHERE `status` = 'success' AND `deliverer_status`='ready to deliver' ");
                                                        $n3 = $data3_rs->num_rows;

                                                        for ($i = 0; $i < $n3; $i++) {
                                                            $data3 = $data3_rs->fetch_assoc();
                                                            $order_id = $data3["order_id"];

                                                        ?>

                                                            <div class="col-1"></div>
                                                            <div class="col-10 ">
                                                                <div class="row">
                                                                    <div class="col-3 border d-flex align-items-center">
                                                                        <span><?php echo $data3["email"] ?></span>
                                                                    </div>
                                                                    <div class="col-3 border d-flex align-items-center">
                                                                        <span><?php echo $data3["name"] ?></span>
                                                                    </div>
                                                                    <div class="col-3 border d-flex align-items-center">
                                                                        <span><?php echo $order_id ?></span>
                                                                    </div>
                                                                    <div class="col-3 border d-flex justify-content-center  align-items-center ">
                                                                        <span class=" visually-hidden" id="email"><?php echo $email ?></span>
                                                                        <button class="btn btn-success mt-2 mb-2" onclick="delivererAcceptOrders('<?php echo $order_id ?>');"><?php echo $data3["deliverer_status"] ?></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-1"></div>

                                                        <?php
                                                        }

                                                        ?>


                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                </div>

                            <?php

                            } else {
                            ?>

                                <div class="col-12 mt-4">
                                    <div class="row">
                                        <div class="col-1"></div>
                                        <div class="col-10">
                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-center">
                                                    <span class=" fw-bold fs-1 ">Please Update Your Profile First !</span>
                                                </div>
                                                <div class="col-12 d-flex justify-content-center">
                                                    <span class=" fw-bold fs-5 ">Click User Icon top Right corner...</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-1"></div>
                                    </div>
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
