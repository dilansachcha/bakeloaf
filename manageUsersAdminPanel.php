<?php

require "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Users | Admin Panel</title>

    <link rel="icon" href="resource/easy_food.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <div class=" container-fluid vh-100">
        <div class="row">
            <div class="col-12 d-flex justify-content-center  vh-100">
                <div class="row ">
                    <div class="col-12 d-flex ">
                        <div class="row align-content-center gap-5">
                            
                            <div class="col-12 divchange3 d-flex align-items-center justify-content-center" onclick="customerClick();" style="height: 100px;">
                                <span class=" fs-1">Manage Customers</span>
                            </div>
                            
                            


                            <div class="col-12 d-none" id="user1">
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-10 border">
                                        <div class="row">
                                            <div class="col-3 border">
                                                <span class=" fs-5 fw-bold">Name</span>
                                            </div>
                                            <div class="col-3 border">
                                                <span class=" fs-5 fw-bold">Email</span>
                                            </div>
                                            <div class="col-3 border">
                                                <span class=" fs-5 fw-bold">Joined Date</span>
                                            </div>
                                            <div class="col-3 border">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1"></div>


                                    <div class="col-12 mt-3">
                                        <div class="row">
                                            <?php

                                            $data_rs =  Database::search("SELECT * FROM `users`");
                                            $n = $data_rs->num_rows;

                                            for ($i = 0; $i < $n; $i++) {
                                                $data =  $data_rs->fetch_assoc();
                                                $email = $data["email"];

                                            ?>
                                                <div class="col-1 mt-2 mb-2"></div>
                                                <div class="col-10 mt-2 mb-2 ">
                                                    <div class="row">
                                                        <div class="col-3 d-flex  align-items-center border">
                                                            <span><?php echo $data["fname"];
                                                                    echo (" ");
                                                                    echo $data["lname"] ?></span>
                                                        </div>
                                                        <div class="col-3 d-flex  align-items-center border">
                                                            <span><?php echo $email ?></span>
                                                        </div>
                                                        <div class="col-3 d-flex  align-items-center border">
                                                            <span><?php echo $data["joined_date"] ?></span>
                                                        </div>
                                                        <div class="col-3 d-flex justify-content-center align-items-center border">
                                                            <button class=" btn btn-danger mt-2 mb-2" onclick="blockCustomer('<?php echo  $email ?>');">Block User</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 mt-2 mb-2"></div>


                                            <?php
                                            }

                                            ?>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            
                            <div class="col-12 divchange5  d-flex align-items-center justify-content-center" onclick="delivererClick();" style="height: 100px;">
                                <span class=" fs-1">Manage Deliverers</span>
                            </div>


                            <div class="col-12  d-none " id="user2">
                                <div class="row">
                                    <div class="col-1"></div>
                                    <div class="col-10 border">
                                        <div class="row">
                                            <div class="col-3 border">
                                                <span class=" fs-5 fw-bold">Name</span>
                                            </div>
                                            <div class="col-3 border">
                                                <span class=" fs-5 fw-bold">Email</span>
                                            </div>
                                            <div class="col-3 border">
                                                <span class=" fs-5 fw-bold">Joined Date</span>
                                            </div>
                                            <div class="col-3 border">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1"></div>


                                    <div class="col-12 mt-3 mb-5">
                                        <div class="row">
                                            <?php

                                            $data2_rs =  Database::search("SELECT * FROM `diliverer`");
                                            $n2 = $data2_rs->num_rows;

                                            for ($i = 0; $i < $n2; $i++) {
                                                $data2 =  $data2_rs->fetch_assoc();
                                                $email2 = $data2["email"];

                                            ?>
                                                <div class="col-1 mt-2 mb-2"></div>
                                                <div class="col-10 mt-2 mb-2 ">
                                                    <div class="row">
                                                        <div class="col-3 d-flex  align-items-center border">
                                                            <span><?php echo $data2["fname"];
                                                                    echo (" ");
                                                                    echo $data2["lname"] ?></span>
                                                        </div>
                                                        <div class="col-3 d-flex  align-items-center border">
                                                            <span><?php echo $email2 ?></span>
                                                        </div>
                                                        <div class="col-3 d-flex  align-items-center border">
                                                            <span><?php echo $data2["joined_date"] ?></span>
                                                        </div>
                                                        <div class="col-3 d-flex justify-content-center align-items-center border">
                                                            <button class=" btn btn-danger mt-2 mb-2" onclick="blockDiliverer('<?php echo  $email2 ?>');">Block Deliverer</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 mt-2 mb-2"></div>


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
</body>

</html>