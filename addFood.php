<?php

require "connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Food | BakeLoaf</title>
    <link rel="icon" href="resource/easy_food.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="resource/bakeloaf.png" />
</head>

<body>

    <div class=" container-fluid vh-100">
        <div class="row">

            <div class="col-12 mt-5 mb-5">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6 text-center  divchange6 p-4" onclick="addFoodChange();">
                        <span class=" fs-1 fw-bold">+ ADD FOOD</span>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>

            <div class="col-12 mt-3 border d-none" id="addfood">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-lg-6 col-12 ">
                                <div class="row m-2">
                                    <span class=" fs-4 fw-bold">Category</span>
                                    <select class="form-select mt-3 bg-light " id="category">
                                        <?php

                                        $category_rs = Database::search("SELECT * FROM `category`");
                                        $n = $category_rs->num_rows;

                                        for ($x = 0; $x < $n; $x++) {
                                            $category = $category_rs->fetch_assoc();

                                        ?>

                                            <option value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></option>

                                        <?php

                                        }

                                        ?>
                                    </select>
                                </div>

                            </div>

                            <div class="col-lg-6 col-12 ">
                                <div class="row m-2">
                                    <span class="fs-4 fw-bold">Name</span>
                                    <input class="form-control mt-3 bg-light" type="text" id="name">
                                </div>

                            </div>

                            <div class="col-lg-6 col-12 mt-4 ">
                                <div class="row m-2">
                                    <span class="fs-4 fw-bold">Price</span>
                                    <input class="form-control mt-3 bg-light" placeholder="ex:- 250" type="text" id="price">
                                </div>

                            </div>

                            <div class="col-lg-6 col-12 mt-4 ">
                                <div class="row m-2">
                                    <span class="fs-4 fw-bold">Status</span>
                                    <select class="form-select mt-3 bg-light" id="status">
                                        <?php

                                        $status_rs = Database::search("SELECT * FROM `status`");
                                        $n = $status_rs->num_rows;

                                        for ($x = 0; $x < $n; $x++) {
                                            $status = $status_rs->fetch_assoc();

                                        ?>

                                            <option value="<?php echo $status["name"]; ?>"><?php echo $status["name"]; ?></option>

                                        <?php

                                        }

                                        ?>

                                    </select>
                                </div>

                            </div>

                            <div class="col-lg-12 mt-4 col-12">
                                <div class="row m-2">

                                    <label class="form-label fw-bold" style="font-size: 20px;">Description</label>

                                    <div class="col-12">
                                        <textarea class="form-control" cols="30" rows="5" id="desc"></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6 col-12 mt-4 ">
                                <div class="row m-2">
                                    <span class="fs-4 fw-bold">delivery fee Colombo</span>
                                    <input class="form-control mt-3 bg-light" placeholder="ex:- 50" type="text" id="dfh">
                                </div>

                            </div>

                            <div class="col-lg-6 col-12 mt-4 ">
                                <div class="row m-2">
                                    <span class="fs-4 fw-bold">delivery fee other</span>
                                    <input class="form-control mt-3 bg-light" placeholder="ex:- 100" type="text" id="dfo">
                                </div>

                            </div>

                            <div class="col-12  mt-4 ">
                                <div class="row align-items-center">
                                    <div class="col-12 text-center ">
                                        <label class="fw-bold fs-4 ">Add Food Image</label>
                                    </div>
                                    <div class="col-12 col-lg-12 mt-3">
                                        <div class="row ">
                                            <div class="col-12  border border-primary rounded d-flex justify-content-center">
                                                <img src="resource/addproductimg.svg" class="img-fluid " style="height: 270px;" id="i" />
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-12 mt-3   d-flex justify-content-center">
                                        <input type="file" class="d-none" id="imageuploader" multiple />
                                        <label for="imageuploader" class="col-4 btn btn-primary" onclick="changeProductImage();">Upload Image</label>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 mt-4 mb-5">
                                <div class="row m-2">
                                    <button class="btn btn-success fs-4" onclick="addFood();">Add Food</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>

            <!-- ************************************************************************************************************** -->

            <div class="col-12 mt-5 mb-5">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6 text-center  divchange4 p-4" onclick="addFoodChange1();">
                        <span class=" fs-1 fw-bold">UPDATE FOOD</span>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>

            <div class="col-12 mt-3 border d-none" id="updatefood">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-lg-6 col-12 ">
                                <div class="row m-2">
                                    <span class=" fs-4 fw-bold">Category</span>
                                    <select class="form-select mt-3 bg-light " id="category1">
                                        <?php

                                        $category_rs = Database::search("SELECT * FROM `category`");
                                        $n = $category_rs->num_rows;

                                        for ($x = 0; $x < $n; $x++) {
                                            $category = $category_rs->fetch_assoc();


                                        ?>

                                            <option value="<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></option>


                                        <?php

                                        }

                                        ?>
                                    </select>
                                </div>

                            </div>

                            <div class="col-lg-6 col-12 ">
                                <div class="row m-2">
                                    <span class=" fs-4 fw-bold">Name</span>
                                    <select class="form-select mt-3 bg-light " id="name1">
                                        <?php



                                        $name_rs = Database::search("SELECT `name` FROM `foods` ");
                                        $num = $name_rs->num_rows;

                                        for ($x = 0; $x < $num; $x++) {
                                            $name = $name_rs->fetch_assoc();

                                        ?>

                                            <option value="<?php echo $name["name"]; ?>"><?php echo $name["name"]; ?></option>

                                        <?php

                                        }

                                        ?>
                                    </select>
                                </div>

                            </div>

                            <div class="col-lg-6 col-12 mt-4 ">
                                <div class="row m-2">
                                    <span class="fs-4 fw-bold">Price</span>
                                    <input class="form-control mt-3 bg-light" placeholder="ex:- 250" type="text" id="price1">
                                </div>

                            </div>

                            <div class="col-lg-6 col-12 mt-4 ">
                                <div class="row m-2">
                                    <span class="fs-4 fw-bold">Status</span>
                                    <select class="form-select mt-3 bg-light" id="status1">
                                        <?php

                                        $status_rs = Database::search("SELECT * FROM `status`");
                                        $n = $status_rs->num_rows;

                                        for ($x = 0; $x < $n; $x++) {
                                            $status = $status_rs->fetch_assoc();

                                        ?>

                                            <option value="<?php echo $status["name"]; ?>"><?php echo $status["name"]; ?></option>

                                        <?php

                                        }

                                        ?>

                                    </select>
                                </div>

                            </div>

                            <div class="col-lg-12 mt-4 col-12">
                                <div class="row m-2">

                                    <label class="form-label fw-bold" style="font-size: 20px;">Description</label>

                                    <div class="col-12">
                                        <textarea class="form-control" cols="30" rows="5" id="desc1"></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6 col-12 mt-4 ">
                                <div class="row m-2">
                                    <span class="fs-4 fw-bold">delivery fee horana</span>
                                    <input class="form-control mt-3 bg-light" placeholder="ex:- 250" type="text" id="dfh1">
                                </div>

                            </div>

                            <div class="col-lg-6 col-12 mt-4 ">
                                <div class="row m-2">
                                    <span class="fs-4 fw-bold">delivery fee other</span>
                                    <input class="form-control mt-3 bg-light" placeholder="ex:- 250" type="text" id="dfo1">
                                </div>

                            </div>



                            <div class="col-12 mt-4 mb-5">
                                <div class="row m-2">
                                    <button class="btn btn-success fs-4" onclick="updateFood();">Update Food</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>


            <!-- ************************************************************************************************************** -->

            <div class="col-12 mt-5 mb-5">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6 text-center  divchange5 p-4" onclick="addFoodChange2();">
                        <span class=" fs-1 fw-bold">DELETE FOOD</span>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>

            <div class="col-12 mt-3 border d-none " id="deletefood">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <div class="row">

                            <div class="col-12 bg-success shadow rounded-1 ">
                                <div class="row  text-white">
                                    <div class="col-3 border">
                                        <span class="fs-5">Name</span>
                                    </div>
                                    <div class="col-3 border">
                                        <span class="fs-5">Added Date</span>
                                    </div>
                                    <div class="col-2 border">
                                        <span class="fs-5">Status</span>
                                    </div>
                                    <div class="col-2 border">
                                        <span class="fs-5">Price</span>
                                    </div>
                                    <div class="col-2 border"></div>
                                </div>
                            </div>

                            <div class="col-12 bg-light  mt-4 mb-5">
                                <div class="row">
                                    <?php

                                    $data_rs =  Database::search("SELECT * FROM `foods`");
                                    $nd = $data_rs->num_rows;

                                    for ($i = 0; $i < $nd; $i++) {

                                        $data = $data_rs->fetch_assoc();
                                        $name = $data["name"];
                                    ?>
                                        <div class="col-12 mt-2 mb-2">
                                            <div class="row">
                                                <div class="col-3 d-flex align-items-center">
                                                    <span><?php echo $data["name"] ?></span>
                                                </div>
                                                <div class="col-3 d-flex align-items-center">
                                                    <span><?php echo $data["datetime_added"] ?></span>
                                                </div>
                                                <div class="col-2 d-flex align-items-center">
                                                    <span><?php echo $data["status"] ?></span>
                                                </div>
                                                <div class="col-2 d-flex align-items-center">
                                                    <span>Rs: <?php echo $data["price"] ?>.00</span>
                                                </div>
                                                <div class="col-2 d-flex justify-content-center">
                                                    <button class=" btn btn-danger" onclick="deleteFood('<?php echo $name ?>');">Delete</button>
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
                    <div class="col-1"></div>
                </div>
            </div>



        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>