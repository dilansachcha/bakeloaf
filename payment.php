<?php

require "connection.php";
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Payment | BakeLoaf</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/Ba" />

</head>

<body>


    <div class=" container-fluid vh-100 d-flex justify-content-center">
        <div class="row align-content-center">
            <div class="col-12 ">
                <div class="row ">
                    <?php

                    $email = $_SESSION["u"]["email"];

                    $data = Database::search("SELECT * FROM `request_orders` WHERE `user_email` = '" . $email . "' ORDER BY `requested_at` DESC LIMIT 1");
                    $n = $data->num_rows;
                    $nd = $data->fetch_assoc();


                    if ($nd == 0) {
                    ?>
                        <div class="col-12">
                            <div class="col-12 mt-2 mb-4">
                                <div class="row">
                                    <label class=" fw-bold fs-5">Total Amount :</label>
                                    <div class="col-12">
                                        <input class=" form-control" type="text" id="total" name="totalAmount" value="">
                                    </div>

                                </div>

                            </div>
                            <div class="col-12 mt-2 mb-4">
                                <div class="row">
                                    <div class="col-6 mt-2 mb-4">
                                        <div class="row">
                                            <label class=" fw-bold fs-5">Customer Name :</label>
                                            <div class="col-12">
                                                <input class=" form-control" id="name" type="text" name="customerName" value="">
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-6 mt-2 mb-4">
                                        <div class="row">
                                            <label class=" fw-bold fs-5">Customer Mobile :</label>
                                            <div class="col-12">
                                                <input class=" form-control " type="text" name="customerPhone" id="mobile" value="">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-2 mb-4">
                                <div class="row">
                                    <div class="col-6 mt-2 mb-4">
                                        <div class="row">
                                            <label class=" fw-bold fs-5">Customer Email :</label>
                                            <div class="col-12">
                                                <input class=" form-control" type="text" id="email" name="customerEmail" value="">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>





                            <div class="col-12 mt-2 mb-4">
                                <div class="row">
                                    <label class=" fw-bold fs-5">Delivery Address :</label>
                                    <div class="col-12">
                                        <input class=" form-control" type="text" id="address" name="customerEmail" value="">
                                    </div>

                                </div>

                            </div>

                            <div class="col-12 mt-2 mb-4">
                                <div class="row">
                                    <label class=" fw-bold fs-5">City :</label>
                                    <div class="col-12">
                                        <input class=" form-control" type="text" id="city" name="customerEmail" value="">
                                    </div>

                                </div>

                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <div class="spinner-wraper3 d-none  mt-2" id="spinner3">
                                            <div class="row">

                                                <div role="status">
                                                    <div class="spinner-grow text-primary"></div>
                                                    <div class="spinner-grow text-secondary"></div>
                                                    <div class="spinner-grow text-success"></div>
                                                    <div class="spinner-grow text-warning"></div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="col-12 mt-3 mb-3 text-center">
                                <div class="row">
                                    <div class="col-5 d-flex justify-content-start">
                                        <label class="btn btn-outline-dark rounded-5" onclick="cancelRequest();">Click Here to cancel</label>
                                    </div>
                                    <div class="col-7 d-flex justify-content-start">
                                        <input disabled class="btn btn-warning rounded-5" type="submit" onclick="pendingOrders();" value="Checkout Now">
                                    </div>
                                </div>


                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="col-12">
                            <div class="col-12 mt-2 mb-4">
                                <div class="row">
                                    <label class=" fw-bold fs-5">Total Amount :</label>
                                    <div class="col-12">
                                        <input class=" form-control" type="text" id="total" name="totalAmount" value="<?php echo $nd["total_price"] ?>">
                                    </div>

                                </div>

                            </div>
                            <div class="col-12 mt-2 mb-4">
                                <div class="row">
                                    <div class="col-6 mt-2 mb-4">
                                        <div class="row">
                                            <label class=" fw-bold fs-5">Customer Name :</label>
                                            <div class="col-12">
                                                <input class=" form-control" id="name" type="text" name="customerName" value="<?php echo $nd["fname"];
                                                                                                                                echo (" ");
                                                                                                                                echo $nd["lname"]; ?>">
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-6 mt-2 mb-4">
                                        <div class="row">
                                            <label class=" fw-bold fs-5">Customer Mobile :</label>
                                            <div class="col-12">
                                                <input class=" form-control " type="text" name="customerPhone" id="mobile" value="<?php echo $nd["user_mobile"]; ?>">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mt-2 mb-4">
                                <div class="row">
                                    <div class="col-6 mt-2 mb-4">
                                        <div class="row">
                                            <label class=" fw-bold fs-5">Customer Email :</label>
                                            <div class="col-12">
                                                <input class=" form-control" type="text" id="email" name="customerEmail" value="<?php echo $nd["user_email"]; ?>">
                                            </div>

                                        </div>

                                    </div>


                                    <div class="col-6 mt-2 mb-4">
                                        <div class="row">
                                            <label class=" fw-bold fs-5">Order ID :</label>
                                            <div class="col-12">
                                                <input class=" form-control" type="text" id="orderID" name="customerEmail" value="<?php echo $nd["order_id"]; ?>">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>


                            

                            <div class="col-12 mt-2 mb-4">
                                <div class="row">
                                    <label class=" fw-bold fs-5">Delivery Address :</label>
                                    <div class="col-12">
                                        <input class=" form-control" type="text" id="address" name="customerEmail" value="">
                                    </div>

                                </div>

                            </div>

                            <div class="col-12 mt-2 mb-4">
                                <div class="row">
                                    <label class=" fw-bold fs-5">City :</label>
                                    <div class="col-12">
                                        <input class=" form-control" type="text" id="city" name="customerEmail" value="">
                                    </div>

                                </div>

                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <div class="spinner-wraper3 d-none  mt-2" id="spinner3">
                                            <div class="row">

                                                <div role="status">
                                                    <div class="spinner-grow text-primary"></div>
                                                    <div class="spinner-grow text-secondary"></div>
                                                    <div class="spinner-grow text-success"></div>
                                                    <div class="spinner-grow text-warning"></div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="col-12 mt-3 mb-3 text-center">
                                <div class="row">
                                    <div class="col-5 d-flex justify-content-start">
                                        <label class="btn btn-outline-dark rounded-5" onclick="cancelRequest();">Click Here to cancel</label>
                                    </div>
                                    <div class="col-7 d-flex justify-content-start">
                                        <input class="btn btn-warning rounded-5" type="submit" onclick="pendingOrders();" value="Checkout Now">
                                    </div>
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

    <script src="script.js"></script>
</body>

</html>