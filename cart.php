<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>cart | BakeLoaf</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/bakeloaf.png" />
</head>

<body>




    <div class="col-12 container-fluid  ">
        <div class="row  ">


            <div class="spinner-wraper2 d-none  mt-2" id="spinner2">
                <div class="row">

                    <div role="status">
                        <div class="spinner-grow text-success"></div>
                        <div class="spinner-grow text-dark"></div>
                        <div class="spinner-grow text-white"></div>
                        <div class="spinner-grow text-warning"></div>

                    </div>

                </div>

            </div>

            <?php

            include "header.php";

            $data_rs33 = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $email . "'");
            $data_rs33->num_rows;

            $n33 = $data_rs33->fetch_assoc();

            if (isset($_SESSION["u"]) & $n33 == true) {
                $email = $_SESSION["u"]["email"];

                $itemPrice = 0;
                $total = 0;
                $shipTotal = 0;

            ?>
                <hr />
                

                <hr class="co-1 mt-2" />

                <div class="col-12  ">
                    <div class="row d-flex justify-content-center">
                    <div class="col-6 col-lg-11 mt-2 d-flex justify-content-center ">
                <div class="col-12 col-lg-12 d-flex justify-content-center">
                    <div class="row bg-dark  align-items-center p-2 shadow-lg rounded-4">
                        
                        <div class=" col-12 col-lg-12  ">
                            <div class="row align-items-center" >
                                <div class="col-lg-4 col-12 ">
                                    <a href="cart.php" class="btn btn-dark d-grid ">Cart</a>
                                </div>

                                <div class="col-lg-4 col-12  d-flex justify-content-center ">
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

                        <div class="col-12 col-lg-8 m-3  row shadow-lg  rounded-4">
                            <div class="col-12  row ">
                                <div>
                                    <span class="text-dark p-2 fs-2 d-flex justify-content-center">Shoping Cart</span>
                                </div>

                            </div>

                            <hr class=" text-primary" />
                            <?php

                            $data = Database::search("SELECT * FROM `cart` WHERE `users_email` = '$email'");
                            $f = $data->num_rows;

                            if ($f == 0) {
                            ?>

                                <div class="col-12">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-11  d-flex  ">
                                            <div class="row justify-content-center">
                                                <img src="resource/cart_icon.png" style="width: 400px; height:400px;">

                                                <h1 class=" fw-bold text-center">You have no items in your Cart yet.</h1>
                                                <div class="col-4 mt-2 mb-2 d-grid">
                                                    <button class="btn btn-outline-success p-2" onclick="window.location ='home.php' ">Start Shoping</button>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            <?php


                            } else {
                            ?>
                                <div class="col-12 ">
                                    <?php

                                    $food_rs = Database::search("SELECT * FROM `cart` INNER JOIN `foods` ON foods.id = cart.food_id INNER JOIN `food_images` ON foods.id = food_images.food_id WHERE `users_email`='" . $email . "' ");
                                    $n = $food_rs->num_rows;

                                    $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $email . "' ");
                                    $address_data = $address_rs->fetch_assoc();

                                    for ($x = 0; $x < $n; $x++) {
                                        $food = $food_rs->fetch_assoc();
                                        $pid = $food["id"];




                                        if ($address_data["city_id"] == 1) {
                                            $ship = $food["delivery_fee_colombo"];
                                        } else {
                                            $ship = $product_data["delivery_fee_other"];
                                        }
                                    ?>

                                        <div class="row  rounded-4 m-4 shadow-lg ">

                                            <div class="col-12 col-lg-5 d-flex justify-content-center ">
                                                <img src="<?php echo $food["path"] ?>" class="bd2 col-9 col-lg-11 " style="height:240px; width:300px;" />
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <span class=" text-black fs-4" id="food"> <?php echo $food["name"] ?></span><br>
                                                <i class="bi bi-star-fill colour3"></i>
                                                <i class="bi bi-star-fill colour3"></i>
                                                <i class="bi bi-star-fill colour3"></i>
                                                <i class="bi bi-star-fill colour3"></i>
                                                <i class="bi bi-star-fill colour3"></i>
                                                <span class="text-black" id="id1"><?php echo $food["id"] ?></span><br>
                                                <label class=" visually-hidden" id="email"><?php echo $food["users_email"]; ?></label>
                                                <br><br>

                                                <span class=" fw-bold text-black-50">Category : </span><br>

                                                <span class=" text-black fw-bold">Qty :</span>
                                                <span class=" fw-bold"><?php echo $food["qty"] ?></span><br>
                                                <span class=" fw-bold">Price:- Rs: <?php echo $food["price"] ?>.00</span><br>
                                                <span class=" fw-bold">Delivery Cost:-</span>
                                                <span class=" fw-bold"><?php echo $ship ?></span>
                                                <div class="col-12 mt-5 ">
                                                    <div class="row d-flex justify-content-center">

                                                        <button class="btn btn-danger   col-lg-5 " onclick="deleteFromCart();">Delete From Cart</button>&nbsp;&nbsp;

                                                    </div>

                                                </div>



                                            </div>
                                            <div class="col-lg-12  ">
                                                <hr class="co-1" />
                                                <div class="row">
                                                    <div class="col-lg-3 col-4  d-flex justify-content-center">
                                                        <span class="fs-5 fw-bold">Requested Total </span> <i class=" rounded-circle bg-light fs-5 bi bi-currency-dollar"></i>
                                                    </div>
                                                    <div class="col-lg-9 col-8  d-flex justify-content-end">
                                                        <?php


                                                        $itemPrice = $itemPrice +  $food["price"] * $food["qty"];
                                                        $total =  $itemPrice + $ship;
                                                        $shipTotal = $shipTotal + $ship
                                                        ?>
                                                        <span class="fs-5 fw-bold">Rs: <?php echo  $food["price"] * $food["qty"] +  $ship ?>.00</span>

                                                    </div>
                                                </div>
                                                <hr class="co-1" />
                                            </div>
                                        </div>

                                    <?php
                                    }

                                    ?>
                                </div>
                            <?php
                            }

                            ?>

                            <hr />



                        </div>


                        <!-- dakunu pathe div 2ka -->
                        <div class="col-10 col-lg-3 mt-2 ">
                            <div class="row">
                                <div class="col-12 mt-2 mb-2 shadow-lg rounded-4">
                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <span class="fs-4 fw-bold  ">Summary</span>

                                        </div>
                                        <hr class="co-1" />
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6">
                                                    <span class="fs-6 fw-bold">Items ( <?php echo $n ?> items)</span>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <span class=" fw-bold">Rs: <?php echo $itemPrice ?>.00</span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12 mt-3 mb-2">
                                            <div class="row">
                                                <div class="col-6">
                                                    <span class="fs-6 fw-bold">Delivery</span>
                                                </div>
                                                <div class="col-6 text-end">

                                                    <span class=" fw-bold">Rs: <?php echo $shipTotal ?>.00 </span>
                                                </div>


                                            </div>

                                        </div>
                                        <hr class="co-1" />

                                        <div class="col-12 mt-3 mb-2">
                                            <div class="row">
                                                <div class="col-6">
                                                    <span class="fs-3 fw-bold">Total</span>
                                                </div>
                                                <div class="col-6 text-end">
                                                    <span class=" visually-hidden" id="total"><?php echo $shipTotal + $itemPrice ?></span>
                                                    <span class=" fs-3 fw-bold">Rs: <?php echo $shipTotal + $itemPrice ?>.00 </span>

                                                </div>


                                            </div>

                                        </div>
                                        <hr class="co-1" />

                                        <div class="col-12 d-flex justify-content-center">
                                            <?php

                                            if ($f == 0) {
                                            ?>
                                                <button class="fs-5 fw-bold col-5 cartbutton mt-2 mb-4" onclick="checkOut();" disabled>Check Out</button>
                                            <?php
                                            } else {
                                            ?>
                                                <button class=" fs-5 fw-bold col-5 cartbutton mt-2 mb-4" onclick="checkOut();">Check Out</button>
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

                    <div class="col-12">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10 d-flex justify-content-center" style="height: 200px;">
                                <div class="row align-items-center">
                                    <span class=" fs-1 fw-bold co-1">Please Update Your Profile First ! And ComeBack...</span>
                                </div>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>

                <?php



            }
                ?>




                <hr class=" text-black" />


                



                </div>
                <?php include "footer.php"; ?>

        </div>



        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>


</body>

</html>