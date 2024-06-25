<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Product View | BakeLoaf</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/easy_food.png" />
</head>

<body>
    <div class="col-12 container-fluid  d-flex justify-content-center align-items-center ">
        <div class="row d-flex justify-content-center  ">
            <?php include "header.php"; ?>
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

            <hr class="co-1 mt-4 mb-5" />



            <div class="col-12 ">

                <?php
                if (isset($_SESSION["u"])) {
                    $email = $_SESSION["u"]["email"];

                ?>
                    <div class="row ">

                        <?php

                        if (isset($_SESSION["singlefood"])) {
                            $data = $_SESSION["singlefood"];
                            $fid = $_SESSION["singlefood"]["id"];
                            $cat = $_SESSION["singlefood"]["category_id"];

                        ?>
                            <div class="col-12 ">
                                <div class="row">
                                    <div class="col-lg-6 col-12  d-flex justify-content-center ">
                                        <div class="row">
                                            <div class="col-lg-1 d-none"></div>
                                            <div class="col-lg-10 col-12  d-flex justify-content-center align-items-center">
                                                <?php

                                                $img_rs = Database::search("SELECT * FROM `food_images` WHERE `food_id` = '" . $fid . "' ");
                                                $n = $img_rs->num_rows;

                                                $fimg = $img_rs->fetch_assoc();
                                                ?>
                                                <img src="<?php echo $fimg["path"];  ?>" class=" shadow-lg" style=" height:300px; width:340px; border-radius: 10px;">
                                            </div>
                                            <div class="col-lg-1 d-none"></div>
                                        </div>

                                    </div>

                                    <div class="col-lg-6 col-12 ">
                                        <div class="row">
                                            <span class=" fs-1 fw-bold"><?php echo $data["name"];  ?></span>
                                            <?php

                                            if ($data["category_id"] == 1) {
                                            ?>
                                                <span class=" fw-bold text-black-50">Category : Breads & Rolls</span>
                                            <?php
                                            } else if ($data["category_id"] == 2) {
                                            ?>
                                                <span class=" fw-bold text-black-50">Category : Cakes & Cupcakes</span>
                                            <?php
                                            } else if ($data["category_id"] == 3) {
                                            ?>
                                                <span class=" fw-bold text-black-50">Category : Pastries & Danishes</span>
                                            <?php
                                            } else if ($data["category_id"] == 4) {
                                            ?>
                                                <span class=" fw-bold text-black-50">Category : Cookies & Bars</span>
                                            <?php
                                            } else if ($data["category_id"] == 5) {
                                            ?>
                                                <span class=" fw-bold text-black-50">Category : Savory Items</span>
                                            <?php
                                            }

                                            ?>





                                            <span class="fs-3 mt-5 fw-bold text-success mb-4">Rs. <?php echo $data["price"];  ?>.00</span>
                                            <span class=" fw-bold fs-5 mb-2">Quantity</span>
                                            <div class="col-12 mt-1 ">
                                                <div class="row">
                                                    <div class="col-lg-3 col-5  d-flex justify-content-start">

                                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                            <button type="button" class="btn btn-outline-success" onclick="qty_dec();"><i class="bi bi-dash fs-5"></i></button>
                                                            <input id="inp" type="text" value="1" style="width: 50px;" class=" text-center"></input>
                                                            <button type="button" class="btn btn-outline-success" onclick="qty_inc();"><i class="bi bi-plus fs-5"></i></button>
                                                        </div>
                                                    </div>

                                                    <div class="col-4 d-flex justify-content-start ">
                                                        <div class="row">
                                                            <button class=" btn btn-success fs-5" onclick="addToCart(<?php echo $data['id']; ?>);">Add to Cart</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>







                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 mt-5 d-flex justify-content-center ">
                                <div class="row">
                                    <div class="col-lg-1 d-none"></div>
                                    <div class="col-lg-10 col-12 shadow-lg rounded-3 ">
                                        <div class="row m-4">
                                            <div class="text-center" style="width: 37%; height: 30px; background-color:rgb(21, 252, 21)">
                                                <span class=" fw-bold fs-5 text-white ">Description</span>
                                            </div>
                                            <div style="width: 100%; height: 2px; background-color:rgb(21, 252, 21);"> </div>

                                            <div class="mt-2">
                                                <span class="fs-5"><?php echo $data["description"];  ?></span><br>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 d-none"></div>
                                </div>
                            </div>



                        <?php
                        }

                        ?>


                        <hr class="co-1 mt-5 mb-3" />





                        <div class="col-12 d-none d-lg-block ">
                            <div class="row m-5 ">


                                <span class="fs-1 fw-bold mb-3">Related Products</span>

                                <div class="wrapper gap-5 ">

                                    <?php

                                    $food_rs = Database::search("SELECT * FROM `foods` INNER JOIN `food_images` ON foods.id = food_images.food_id WHERE `category_id`= '" . $cat . "' ");
                                    $ft = $food_rs->num_rows;

                                    for ($x = 0; $x < $ft; $x++) {
                                        $food = $food_rs->fetch_assoc();

                                        if ($food["id"] ==  $fid) {
                                    ?>
                                            <div class="col-3 mb-3 mt-3 divchange visually-hidden">
                                                <div class="row">

                                                    <a onclick="singleProductView(<?php echo $food['id']; ?>);"><img src="<?php echo $food["path"] ?>" class=" card-img-top" style="height:200px;" /></a>
                                                    <span class="text-success  d-flex justify-content-center fs-5 mt-2"><?php echo $food["name"] ?></span>
                                                    <span class="text-dark d-flex justify-content-center "><?php echo $food["status"] ?></span>
                                                    <span class=" text-danger d-flex justify-content-center fs-4">Rs.<?php echo $food["price"] ?>.00</span>
                                                </div>

                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col-3 mb-3 mt-3 divchange">
                                                <div class="row">
                                                    <a onclick="singleProductView(<?php echo $food['id']; ?>);"><img src="<?php echo $food["path"] ?>" class=" card-img-top" style="height:200px; " /></a>
                                                    <span class="text-success  d-flex justify-content-center fs-5 mt-2"><?php echo $food["name"] ?></span>
                                                    <span class="text-dark d-flex justify-content-center "><?php echo $food["status"] ?></span>
                                                    <span class=" text-danger d-flex justify-content-center fs-4">Rs.<?php echo $food["price"] ?>.00</span>
                                                </div>

                                            </div>
                                        <?php
                                        }
                                        ?>


                                    <?php
                                    }
                                    ?>


                                </div>

                            </div>
                        </div>

                    </div><?php
                        } else {
                            ?>
                    <div class="col-12 d-flex justify-content-center">
                        <span class=" fs-1 fw-bold co-1">Please Sign In First....</span>
                    </div>
                    
                    
                    

                <?php

                
                        }

                ?>




            </div>

            <?php include "footer.php"; ?>
        </div>

    </div>

    <script src="script.js"></script>
</body>

</html>