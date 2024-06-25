<?php

require "connection.php";

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>easyFoods</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/bakeloaf.png" />

</head>

<body class="body">

    <div class=" container-fluid vh-100">
        <div class="row ">
            <div class="col-12 image11  h-100 "></div>
            <div class="col-lg-12 image111 d-flex justify-content-center h-100 ">
                <div class="row align-items-center">
                    <div class="col-12 ">
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-center  g-3">
                                <div class="col-lg-2 col-4 image2"></div>
                            </div>
                            <span class=" text-center h4 text-white">Welcome Admin</span>

                            <div class=" col-lg-12 mt-3">
                                <div class="row ">
                                    <div class="col-lg-3 col-1  "></div>
                                    <div class="col-lg-6 col-10">
                                        <div class="row">
                                            <div class="col-12  ">
                                                <span class="h4 fw-bold co-1 d-flex justify-content-center">Sign In to your Account</span>
                                            </div>

                                            <div class="spinner-wraper d-none  mt-2" id="spinner">
                                                <div class="row">

                                                    <div role="status">
                                                        <div class="spinner-grow text-primary"></div>
                                                        <div class="spinner-grow text-secondary"></div>
                                                        <div class="spinner-grow text-success"></div>
                                                        <div class="spinner-grow text-warning"></div>
                                                    </div>

                                                </div>

                                            </div>

                                            <?php

                                            $email = "";
                                            $password = "";

                                            if (isset($_COOKIE["email"])) {
                                                $email = $_COOKIE["email"];
                                            }

                                            if (isset($_COOKIE["password"])) {
                                                $password = $_COOKIE["password"];
                                            }

                                            ?>


                                            <div class="col-12 mt-4">
                                                <div class="row">

                                                    <div class="col-lg-12 g-2">
                                                        <label class="co-1 mb-1">Enter Your Email</label>
                                                        <input class=" form-control text-center fw-bold" placeholder="Ex:-admin@gmail.com" type="text" id="e">

                                                    </div>

                                                    <div class=" col-12 g-2 form-check form-switch mx-3 mt-3 mb-3 ">
                                                        <input class="form-check-input" type="checkbox" role="switch" onchange="showbutton();">
                                                        <label class="form-check-label fs-6 text-white-50 ">my email is correct</label>
                                                    </div>



                                                    <div class="col-12 col-lg-6 d-grid g-2">
                                                        <button class="btn btn-success disabled" onclick="sendverification();" id="change">Send Verification code</button>
                                                    </div>
                                                    <div class="col-12 col-lg-6 d-grid g-2">
                                                        <a class=" d-grid btn btn-danger" href="index.php">
                                                            new to BakeLoaf? Sign Up</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-3 col-1 "></div>

                                    <!-- modal -->

                                    <!-- modal -->

                                    <div class="modal" tabindex="-1" id="verificationModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fs-4  co-1">BakeLoaf admin verification</h5>

                                                </div>
                                                <div class="modal-body">
                                                    <label class="form-label">Enter Your Verification Code</label>
                                                    <input type="text" class="form-control" id="vcode">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-success" onclick="verify();">Verify</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- modal -->

                                    <!-- modal -->
                                </div>
                            </div>
                            <!-- footer -->

                            <div class="col-12 fixed-bottom d-none d-lg-block">
                                <p class="text-center text-white">&copy; 2024 BakeLoaf || All Rights Reserved</p>
                            </div>

                            <!-- footer -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>