<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Purchase History | BakeLoaf</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/bakeloaf.png" />
</head>

<body>
    <div class="col-12 container-fluid  d-flex justify-content-center align-items-center ">
        <div class="row d-flex justify-content-center  ">
            <?php include "header.php";

            if (isset($_SESSION["u"])) {

                $email = $_SESSION["u"]["email"];
            ?>
                <hr />


                <div class="col-6 col-lg-11 mt-2 d-flex justify-content-center ">
                    <div class="col-12 col-lg-12 d-flex justify-content-center">
                        <div class="row bg-dark  align-items-center p-2 shadow-lg rounded-4">

                            <div class=" col-12 col-lg-12  ">
                                <div class="row align-items-center">
                                    <div class="col-lg-4 col-12 ">
                                        <a href="cart.php" class="btn btn-dark d-grid ">Cart</a>
                                    </div>

                                    <div class="col-lg-4 col-12  ">
                                        <button class="btn btn-dark">Customer Service</button>
                                    </div>
                                    <div class="col-lg-4 col-12  ">
                                        <a href="home.php" class="btn btn-dark d-grid ">Home</a>
                                    </div>

                                </div>


                            </div>

                        </div>



                    </div>


                </div>

                <hr class="co-1 mt-2" />

                <div class="col-12 bg-light mt-2">
                    <div class="row">
                        <div class="col-12  ">
                            <hr class="text-black" />
                            <span class=" text-black fw-bold fs-4  ">Purchased History</span>
                            <hr class=" text-black">
                            <div class="col-12 bd3" style="color:white;">
                                <div class="row m-2">
                                    <div class=" mb-4 mt-4">
                                        <div class="row">
                                            <div class="col-6 d-flex justify-content-start">
                                                <span class="text-black fw-bold fs-5">Make Payment</span>
                                            </div>

                                        </div>

                                    </div>
                                    <div class=" col-12  align-items-center bd3 mb-4">
                                        <div class="row">



                                            <div class="col-lg-3 col-12  bd3 d-flex justify-content-center align-items-center">
                                                <img src="resource/payment_method/Visa.png" class=" " style="height:80px;" />
                                            </div>

                                            <div class="col-lg-3 col-12 bd3 d-flex justify-content-center ">

                                                <img src="resource/payment_method/Mastercard.png" class=" " style="height:80px;" />
                                            </div>

                                            <div class="col-lg-3 col-12  bd3 d-flex justify-content-center">

                                                <img src="resource/payment_method/American_Express.png" class=" " style="height:80px;" />
                                            </div>
                                            <div class="col-lg-3 d-flex justify-content-center">
                                                <a href="" class=" text-primary">Show other payment methods</a>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- titles bar -->
                            <div class="col-12 d-none d-lg-block mt-2 colour4 bd3 mt-4">
                                <div class="row ">
                                    <div class="col-lg-2  d-flex justify-content-start">
                                        <span class=" text-black  m-2 fw-bold">Item</span>
                                    </div>
                                    <div class="col-lg-2  d-flex justify-content-start">
                                        <span class=" text-black  m-2 fw-bold">Status</span>
                                    </div>
                                    <div class="col-lg-2  d-flex justify-content-start">
                                        <span class=" text-black  m-2 fw-bold">Amout</span>
                                    </div>
                                    <div class="col-lg-2  d-flex justify-content-start">
                                        <span class=" text-black  m-2 fw-bold">Date</span>
                                    </div>
                                    <div class="col-lg-2  d-flex justify-content-start">
                                        <span class=" text-black  m-2 fw-bold">Discription</span>
                                    </div>
                                    <div class="col-lg-2">
                                        <span class=" text-black  m-2"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- titles bar -->


                            <div class="col-12  mt-2 mb-2 shadow-lg">

                                <?php

                                $data_rs = Database::search("SELECT * FROM `invoice`  WHERE `email` = '" . $email . "'");
                                $n = $data_rs->num_rows;

                                for ($i = 0; $i < $n; $i++) {
                                    $data = $data_rs->fetch_assoc();
                                    $oid = $data["oid"];

                                ?>

                                    <div class="row d-flex align-items-center  mt-4 mb-4 shadow-lg  ">
                                        <div class="col-lg-2 col-6 ">
                                            <?php

                                            $data_rs2 = Database::search("SELECT `path`  FROM `food_images` INNER JOIN `foods` ON 
                                    food_images.food_id = foods.id INNER JOIN `request_orders_foods` ON
                                    foods.name = request_orders_foods.food_names    WHERE `order_id` = '" . $oid . "' ");
                                            $n2 = $data_rs2->num_rows;

                                            for ($a = 0; $a < $n2; $a++) {
                                                $data2 = $data_rs2->fetch_assoc();

                                                $path = $data2["path"];
                                            ?>

                                                <img src="<?php echo $path ?>" class="bd2 " style="height:60px; width:80px;" />
                                            <?php
                                            }

                                            ?>

                                        </div>
                                        <div class="col-lg-2 col-3">
                                            <span class="text-black  fs-5"><i class=" fs-3 bi bi-check-circle-fill text-success mx-1 "></i> success </span>

                                        </div>
                                        <div class="col-lg-2 col-3">
                                            <span class="text-black  fs-5 ">Rs: <?php echo $data["total"] ?>.00</span>
                                        </div>
                                        <div class="col-lg-2 col-6">
                                            <span class="text-black  fs-5"><?php echo $data["date"] ?></span>
                                        </div>
                                        <div class="col-lg-2 col-6">
                                            <?php

                                            $data_rs3 = Database::search("SELECT `name`  FROM `food_images` INNER JOIN `foods` ON food_images.food_id = foods.id INNER JOIN `request_orders_foods` ON foods.name = request_orders_foods.food_names WHERE `order_id` = '" . $oid . "' ");
                                            $n3 = $data_rs3->num_rows;

                                            for ($v = 0; $v < $n3; $v++) {
                                                $data3 = $data_rs3->fetch_assoc();
                                                $name2 = $data3["name"];
                                            ?>


                                                <span class="text-black  fs-5"><?php echo $name2 ?><br></span>
                                            <?php
                                            }

                                            ?>



                                        </div>
                                        <div class="col-lg-2 col-12 mt-2 d-flex justify-content-center ">



                                            <button class="btn btn-outline-danger" onclick="deleteonhistory('<?php echo $oid ?>');">
                                                Delete
                                            </button>

                                        </div>
                                    </div>

                                <?php
                                }

                                ?>





                            </div>



                            <nav aria-label="Page navigation example" class="d-flex justify-content-center mt-3 mb-3">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav><br><br><br>


                        </div>
                    </div>






                </div>
            <?php
            } else {
            }


            ?>


            <hr class=" text-black" />


            <?php include "footer.php"; ?>



        </div>

    </div>
    <script src="script.js"></script>
</body>