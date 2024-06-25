<?php

require "connection.php";

session_start();


?>




<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel | easyfoods</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/bakeloaf.png" />
</head>

<body class="image1111">

    <div class=" container-fluid image5  ">
        <div class="row">

            <?php

            if (isset($_SESSION["admin"])) {
                $adminemail = $_SESSION["admin"]["email"];
            ?>

                <div class="col-12 mb-5 ">
                    <div class="row">

                        <div class="col-12  ">
                            <div class="row">
                                <div class="col-lg-5  mt-3 mb-3">
                                    <div class="input-group ">
                                        <button class="btn btn-dark" type="button" id="button-addon1"><i class="bi bi-search"></i></button>
                                        <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                    </div>
                                </div>

                                <div class="col-lg-3 mt-3 mb-3"></div>


                                <div class="col-lg-4 mt-3 mb-3 d-flex justify-content-end">
                                    <button class="btn btn-success mx-2" onclick="window.location = 'signin.php'">Login as a Customer</button>
                                    <button class="btn btn-danger" onclick="window.location = 'adminlogin.php'">Log Out</button>

                                </div>
                            </div>

                        </div>

                        <div class="col-lg-8 col-12">
                            <div class="col-12">
                                <div class="row">



                                    <div class="col-12">
                                        <span class=" text-black fs-3">Hello <?php echo $_SESSION["admin"]["fname"];
                                                                                echo (" ");
                                                                                echo $_SESSION["admin"]["lname"];  ?></span>
                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-3">
                                                <span class=" text-black-50"><?php echo $adminemail ?></span>
                                                <span class=" text-black-50">Welcome back!</span>
                                            </div>
                                            <div class="col-12 col-lg-9  d-flex justify-content-end">
                                                <span class=" text-black me-5 fs-1 fw-bolder">Admin Panel</span>
                                                <button class=" btn btn-light text-black fs-4">filters <i class="bi bi-sliders fs-4 text-black"></i></button>
                                            </div>
                                            <div class="col-1 ">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12  d-flex justify-content-center ">

                                        <div class="col-lg-11 col-12 mb-3 mt-3 c2 " style="border-radius:20px ;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row me-1 ms-1 ">
                                                        <div class="col-4 d-flex justify-content-center   ">
                                                            <div class="col-11  align-items-center mt-3 mb-3 divchange2">
                                                                <div class="row d-flex justify-content-center">
                                                                    <div class="col-10  d-flex justify-content-center">
                                                                        <i class="bi bi-eye fs-2 text-black"></i>
                                                                    </div>
                                                                    <div class="col-10 text-center">
                                                                        <span class=" text-black-50">Customers</span>
                                                                    </div>
                                                                    <div class="col-10 text-center">
                                                                        <?php

                                                                        $user_rs = Database::search("SELECT * FROM `users`");
                                                                        $nu = $user_rs->num_rows;
                                                                        ?>
                                                                        <span class=" text-black fw-bold fs-1"><?php echo $nu ?></span>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>


                                                        <div class="col-4 d-flex justify-content-center  ">
                                                            <div class="col-11  align-items-center mt-3 mb-3 divchange2">
                                                                <div class="row d-flex justify-content-center">
                                                                    <div class="col-10  d-flex justify-content-center ">
                                                                        <i class="bi bi-compass fs-2 text-black"></i>
                                                                    </div>
                                                                    <div class="col-10 text-center">
                                                                        <span class=" text-black-50">Deliverer</span>
                                                                    </div>
                                                                    <div class="col-10 text-center">
                                                                        <?php

                                                                        $diliverer_rs = Database::search("SELECT * FROM `diliverer`");
                                                                        $nd = $diliverer_rs->num_rows;
                                                                        ?>
                                                                        <span class=" text-black fw-bold fs-1"><?php echo $nd ?></span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 d-flex justify-content-center   ">
                                                            <div class="col-11  align-items-center mt-3 mb-3 divchange2">
                                                                <div class="row d-flex justify-content-center">
                                                                    <div class="col-10  d-flex justify-content-center">
                                                                        <i class="bi bi-shop fs-2 text-black"></i>
                                                                    </div>
                                                                    <div class="col-10 text-center">
                                                                        <span class=" text-black-50">Oders</span>
                                                                    </div>
                                                                    <div class="col-10 text-center">
                                                                        <?php

                                                                        $orders_rs = Database::search("SELECT * FROM `pending_orders`");
                                                                        $npo = $orders_rs->num_rows;
                                                                        ?>
                                                                        <span class=" text-black fw-bold fs-1"><?php echo $npo ?></span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        
                                    </div>

                                    



                                    <div class="col-12  d-flex justify-content-center ">

                                        <div class="col-11 mb-3 mt-3 " style="border-radius:20px ;">
                                            <div class="row">
                                                <div class="col-lg-6 col-12 d-grid" onclick="window.location='addFood.php'">
                                                    <div class="col-12 d-flex justify-content-center divchange6" style="border-radius:20px ;">
                                                        <div class="row align-items-center">
                                                            <div class="col-12 d-flex justify-content-center">
                                                                <span class="fs-3 fw-bold p-2 ">Foods</span>
                                                            </div>
                                                            <div class="col-12 d-flex justify-content-center ">
                                                                <div class="col-12 img1"></div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-12 d-grid" onclick="window.location='foodOrderStatusChange.php'">
                                                    <div class="col-12 d-flex justify-content-center divchange4" style="border-radius:20px ;">
                                                        <div class="row align-items-center">
                                                            <div class="col-12 d-flex justify-content-center">
                                                                <span class="fs-3 fw-bold p-2 ">Food Order Status</span>
                                                            </div>
                                                            <div class="col-12 d-flex justify-content-center ">
                                                                <div class="col-12 img3"></div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12  d-flex justify-content-center ">

                                        <div class="col-11 mb-3 mt-3 " style="border-radius:20px ;">
                                            <div class="row">
                                                <div class="col-lg-6 col-12 d-grid " onclick="window.location='allDeliverers.php'">
                                                    <div class="col-12 d-flex justify-content-center divchange3" style="border-radius:20px ;">
                                                        <div class="row align-items-center">
                                                            <div class="col-12 d-flex justify-content-center">
                                                                <span class="fs-3 fw-bold p-2 ">Diliverer Verification</span>
                                                            </div>
                                                            <div class="col-12 d-flex justify-content-center ">
                                                                <div class="col-12 img2"></div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-12 d-grid " onclick="window.location='manageUsersAdminPanel.php'">
                                                    <div class="col-12 d-flex justify-content-center divchange5" style="border-radius:20px ;">
                                                        <div class="row align-items-center">
                                                            <div class="col-12 d-flex justify-content-center">
                                                                <span class="fs-3 fw-bold p-2 ">Manage Users</span>
                                                            </div>
                                                            <div class="col-12 d-flex justify-content-center ">
                                                                <div class="row">
                                                                    <div class="col-12 img4"></div>
                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-12 d-grid mt-4 " onclick="window.location='customerFeedback.php'">
                                                    <div class="col-12 d-flex justify-content-center divchange7" style="border-radius:20px ;">
                                                        <div class="row align-items-center">
                                                            <div class="col-12 d-flex justify-content-center">
                                                                <span class="fs-3 fw-bold p-2 ">Customer Feedbacks</span>
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

                        <div class="col-lg-4 col-12 d-flex justify-content-center ">

                            <div class="row col-10">
                                <div class="row bg-dark mt-5 mb-5 d-flex justify-content-center " style="border-radius:30px ;">



                                    <div class="col-12  d-flex justify-content-center mt-3">
                                        <span class="fs-2 fw-bold text-white">Revenue</span>
                                    </div>

                                    <div class="col-8 mt-3">
                                        <div class="row  divchange3">
                                            <div class="col-4 d-flex justify-content-end align-items-center ">
                                                <i class="bi bi-gear-wide-connected fs-1 text-black"></i>
                                            </div>
                                            <div class="col-8 ">
                                                <div class="col-12 ">
                                                    <?php

                                                    $invoice_rs = Database::search("SELECT * FROM `invoice`");
                                                    $nn = $invoice_rs->num_rows;
                                                    ?>
                                                    <span class="fs-2 text-black"><?php echo $nn ?></span>
                                                </div>

                                                <div class="col-12">
                                                    <span class="text-black">Successfull Orders</span>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-8  mt-3">
                                        <div class="row divchange3">
                                            <div class="col-4 d-flex justify-content-end align-items-center ">
                                                <i class="bi bi-person-circle  fs-1 text-black"></i>
                                            </div>
                                            <div class="col-8 ">
                                                <div class="col-12 ">
                                                    <span class="fs-2 text-black"><?php echo $nu ?></span>
                                                </div>

                                                <div class="col-12">
                                                    <span class="text-black">Customers</span>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-8  mt-3">
                                        <div class="row divchange3">
                                            <div class="col-4 d-flex justify-content-end align-items-center ">
                                                <i class="bi bi-bag-plus-fill fs-1 text-black"></i>
                                            </div>
                                            <div class="col-8 ">
                                                <div class="col-12">
                                                    <?php

                                                    $foods_rs = Database::search("SELECT * FROM `foods`");
                                                    $nf = $foods_rs->num_rows;
                                                    ?>
                                                    <span class="fs-2 text-black"><?php echo $nf ?></span>
                                                </div>

                                                <div class="col-12">

                                                    <span class="text-black">Foods</span>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-8  mt-3">
                                        <div class="row  divchange3">
                                            <div class="col-4 d-flex justify-content-end align-items-center ">
                                                <i class="bi bi-currency-dollar fs-1 text-black"></i>
                                            </div>
                                            <div class="col-8 ">
                                                <div class="row">
                                                    <?php

                                                    $total1 = 0;
                                                    
                                                    $invoicedata_rs = Database::search("SELECT * FROM `invoice`");
                                                    $nv = $invoicedata_rs->num_rows;

                                                    for ($i=0; $i < $nv ; $i++) { 
                                                        $invoice = $invoicedata_rs->fetch_assoc();
                                                        $total = $invoice["total"];

                                                        $total1 = $total1 + $total;
                                                    }
                                                    
                                                    ?>
                                                    <div class="col-12">
                                                        <span class="fs-4 text-black">Rs: <?php echo $total1 ?>.00</span>
                                                    </div>

                                                    <div class="col-12">
                                                        <span class="text-black">Revenue</span>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12  d-flex justify-content-center mt-3">
                                        <span class="fs-2 fw-bold">Statistics</span>
                                    </div>

                                    <div class="col-12 d-flex justify-content-center mt-2 mb-4  ">

                                        <!-- <div class="col-10 adminsss d-flex justify-content-center" style="border-radius:20px ;"></div> -->

                                        <div class="year-stats">
                                            <div class="month-group">
                                                <div class="bar h-75"></div>
                                                <p class="month">Jan</p>
                                            </div>
                                            <div class="month-group">
                                                <div class="bar h-50"></div>
                                                <p class="month">Feb</p>
                                            </div>
                                            <div class="month-group selected">
                                                <div class="bar h-100"></div>
                                                <p class="month">Mar</p>
                                            </div>
                                            <div class="month-group">
                                                <div class="bar h-10"></div>
                                                <p class="month">Apr</p>
                                            </div>
                                            <div class="month-group ">
                                                <div class="bar h-10"></div>
                                                <p class="month">May</p>
                                            </div>
                                            <div class="month-group">
                                                <div class="bar h-10"></div>
                                                <p class="month">Jun</p>
                                            </div>
                                            <div class="month-group">
                                                <div class="bar h-10"></div>
                                                <p class="month">Jul</p>
                                            </div>
                                            <div class="month-group">
                                                <div class="bar h-10"></div>
                                                <p class="month">Aug</p>
                                            </div>
                                            <div class="month-group">
                                                <div class="bar h-10"></div>
                                                <p class="month">Sep</p>
                                            </div>
                                            <div class="month-group">
                                                <div class="bar h-10"></div>
                                                <p class="month">Oct</p>
                                            </div>
                                            <div class="month-group">
                                                <div class="bar h-10"></div>
                                                <p class="month">Nov</p>
                                            </div>
                                            <div class="month-group">
                                                <div class="bar h-10"></div>
                                                <p class="month">Dez</p>
                                            </div>
                                        </div>



                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>


                </div>

            <?php
            } else {

                echo "You are not admin";
                header("location:signIn.php");
            }

            ?>

            <?php include "footer.php" ?>


        </div>
    </div>
    </div>







    </div>
    </div>






    <script src="script.js"></script>

</body>