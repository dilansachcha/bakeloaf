<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Breads | BakeLoaf</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/bakeloaf.png" />
</head>

<body>
    <div class=" container-fluid  d-flex justify-content-center align-items-center  ">
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
                                    <a href="home.php" class="btn btn-dark d-grid ">Customer Service</a>
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
            <div class="col-12 d-flex justify-content-start row">
                <span class="text-dark fw-bold">Breads & Rolls</span>
                <span class=" text-dark fw-bold fs-4">ALL RESULTS</span>
            </div>
            <hr class=" text-black" />

            <div class="col-12">
                <div class="row justify-content-center gap-5">

                    <?php

                    $food_rs = Database::search("SELECT * FROM `foods` INNER JOIN `food_images` ON foods.id = food_images.food_id WHERE `category_id`= '1' ");
                    $ft = $food_rs->num_rows;

                    for ($x = 0; $x < $ft; $x++) {
                        $food = $food_rs->fetch_assoc();

                    ?>
                        <div class=" row col-6 col-lg-2 mt-2 mb-2 d-flex divchange" style="width: 20rem; height: 20rem;">
                            <?php
                            if ($food["status"] == 'Available') {
                            ?>
                                <span class="status"><?php echo $food["status"]; ?></span>

                            <?php
                            } else {
                            ?>
                                <span class="status2"><?php echo $food["status"]; ?></span>
                            <?php
                            }


                            ?>

                            <a onclick="singleProductView(<?php echo $food['id']; ?>);"><img src="<?php echo $food["path"] ?>" id="sp1" class=" card-img-top  mt-2 " style="height:180px; border-radius: 10px;" /></a>
                            <span class=" text-success d-flex justify-content-center fs-5 mt-2"><?php echo $food["name"];  ?></span>
                            <span class="text-dark d-flex justify-content-center "><?php echo $food["status"]; ?></span>
                            <span class=" text-danger d-flex justify-content-center fs-4">Rs: <?php echo $food["price"]; ?>.00</span>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>


            <hr class=" text-black" />


            <?php include "footer.php"; ?>



        </div>

    </div>
</body>