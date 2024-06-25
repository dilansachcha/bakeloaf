<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice | BakeLoaf</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/bakeloaf.png" />
</head>

<div class=" container-fluid vh-100">
    <div class="row">
        <?php
        include "header.php";

        ?>

        <div class="col-12 d-flex justify-content-center">
            <div class="col-lg-10  col-12  ">
                <div class="row m-lg-3 m-0  ">
                    <div class="col-12 d-flex justify-content-end mt-1">
                        <button class="btn btn-dark mx-3"><i class="bi bi-printer"></i> Print</button>
                        <a href="#" class="btn btn-danger "><i class="bi bi-file-earmark-richtext"></i> Export As PDF </a>
                    </div>

                    <?php

                    $data = $_SESSION["po"];

                    ?>
                    <div class="col-12 mt-3 border">

                        <div class="row m-lg-2 m-0">


                            <div class="col-12 shadow-lg mt-1" style="border-radius: 20px 20px 20px 0px; background-color: #A67B5B;">

                                <div class="row mt-5 mb-5 ">
                                    <div class="col-lg-3 col-12 text-center d-flex justify-content-center">
                                        <div class="row align-items-center">
                                            <span class=" fs-1 fw-bold text-white">INVOICE</span>
                                        </div>

                                    </div>
                                    <div class="col-lg-4 col-6 mt-lg-0 mt-3">
                                        <div class="row text-white">
                                            <span>077-1855521</span>
                                            <span>dilansachintha44@gmail.com</span>
                                            <span>BakeLoaf.lk</span>
                                        </div>

                                    </div>
                                    <div class="col-lg-5 col-6 d-flex justify-content-center mt-lg-0 mt-3 ">
                                        <div class="row text-white">
                                            <span>44/4,</span>
                                            <span>Rajakeeya Mawatha, Colombo 07,</span>
                                            <span>Sri Lanka.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="row">
                                    <div class="col-2 image2" style="border-radius:0px 0px 20px 20px;  background-color: #A67B5B;"></div>
                                    <div class="col-4">
                                        <div class="row">
                                            <span class=" fs-5 text-black-50 fw-bold">Billed To</span>
                                            <span class=" fs-5"><?php echo $data["name"] ?></span>
                                            <span class=" fs-5"><?php echo $data["address"] ?></span>
                                            <span class=" fs-5"><?php echo $data["city"] ?></span>
                                            <span class=" fs-5"><?php echo $data["postal_code"] ?></span>

                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="row">
                                            <span class=" fs-5 text-black-50 fw-bold">Order ID</span>
                                            <span class=" fs-5"><?php echo $data["order_id"] ?></span>

                                            <div class="col-12 mt-4">
                                                <div class="row">
                                                    <span class=" fs-5 text-black-50 fw-bold">Date Of Issue</span>
                                                    <span class=" fs-5"><?php echo $data["date"] ?></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-12">
                                        <div class="row">
                                            <span class=" fs-5 text-black-50 fw-bold">Invoice Total</span>
                                            <span class=" fs-1  text-danger fw-bold ">Rs: <?php echo $data["total"] ?>.00</span>

                                        </div>
                                    </div>

                                    <hr class=" mt-2 mb-2" />

                                    <div class="col-12">
                                        <div class="row m-4">

                                            <div class="col-lg-3 col-6   ">
                                                <div class="row ">
                                                    <div class="col-12 ">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <span class=" fs-5  text-black-50 ">Items</span>
                                                            </div>
                                                            <div class="col-12 mt-2">
                                                                <?php
                                                                $order_Id = $data["order_id"];
                                                                $data_rs4 = Database::search("SELECT `food_names` FROM `request_orders_foods` WHERE `order_id` = '" . $order_Id . "' ");
                                                                $n = $data_rs4->num_rows;
                                                                for ($w = 0; $w < $n; $w++) {
                                                                    $data4 = $data_rs4->fetch_assoc();
                                                                    $p = $data4["food_names"];

                                                                ?>

                                                                    <span class=" fs-5 "><?php echo $p ?><br></span>

                                                                <?php

                                                                }



                                                                ?>

                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-6   ">
                                                <div class="row ">
                                                    <div class="col-12 ">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <span class=" fs-5  text-black-50">Amount</span>
                                                            </div>
                                                            <div class="col-12 mt-2">
                                                                <span class=" fs-5 ">Rs: <?php echo $data["total"] ?>.00</span>
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-12 mt-lg-0 mt-2  ">
                                                <div class="row " >
                                                    <div class="col-12  ">
                                                        <div class="row  ">
                                                            <div class="col-12">
                                                                <span class=" fs-5  text-black-50">Email</span>
                                                            </div>
                                                            <div class="col-12 mt-2">
                                                                <span class=" fs-5 "><?php echo $data["email"] ?></span>
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-12  ">
                                                <div class="row">
                                                    <div class="col-12  ">
                                                        <div class="row  ">
                                                            <div class="col-12">
                                                                <span class=" fs-5  text-black-50 ">Phone</span>
                                                            </div>
                                                            <div class="col-12 mt-2">
                                                                <span class=" fs-5 "><?php echo $data["mobile"] ?></span>
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                    <hr class=" mt-2 mb-2" />

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-lg-4 col-12">
                                                <span class=" fs-1">Thank you !</span>
                                            </div>

                                        </div>
                                    </div>
                                    <hr class=" mt-2 mb-2" />

                                    <div class="col-12 co-2 rounded-3">
                                        <div class="row m-3">
                                            <span class="fs-5 fw-bold">Notice :</span>
                                            <span class="fs-5 ">can not return purchase foods.</span>
                                        </div>
                                    </div>
                                    <hr class=" mt-2 mb-2" />

                                    <div class="col-12 d-flex justify-content-center">
                                        <span class="fs-5 text-black-50 fw-bold mt-2 mb-2">Invoice was created on a computer and is valid without the Signature and Seal.</span>
                                    </div>
                                    <hr class=" mt-2 mb-2" />

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </div>
</div>

<body>

</body>

</html>