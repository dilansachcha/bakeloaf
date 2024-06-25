<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home | Bakeloaf</title>



    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/bakeloaf.png" />

</head>

<body style="overflow-x: hidden; background-color: #F0E5D2;">

    <div class="container-fluid vh-100">
        <div class="row">
            <div class="col-12 ">
                <div class="row">
                    <div class="col-12">
                        <div class="row ">
                            <?php include "header.php"; ?>

                            <div class="col-lg-12 d-lg-block d-none d-flex justify-content-center">
                                <div class="col-12 shadow-lg  ">
                                    <div class="row d-flex justify-content-center ">
                                        <video width="960" height="720" autoplay muted loop>
                                            <source src="resource/bakery.mp4" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12  d-flex justify-content-center mt-5 mb-5">
                                <div class="col-lg-8 col-12 shadow-lg">
                                    <div class="input-group input-group-lg">

                                        <!-- <input type="text" placeholder="Search for your favourite dish..." class="form-control" id="basic_search_txt" >
                                        <button class="input-group-text pointer1" id="inputGroup-sizing-lg" onclick="basicSearch(0);"><i class="bi bi-search fs-2 "></i></button> -->

                                        <input type="text" placeholder="Search Foods...." class="form-control" aria-label="Text input with dropdown button" id="basic_search_txt">

                                        <select class="form-select" style="max-width: 200px;" id="basic_search_select">
                                            <option value="0">All Categories</option>

                                            <?php
                                            $category_rs = Database::search("SELECT * FROM `category`");
                                            $category_num = $category_rs->num_rows;

                                            for ($x = 0; $x < $category_num; $x++) {
                                                $category_data = $category_rs->fetch_assoc();

                                            ?>

                                                <option value="<?php echo $category_data["id"]; ?>">
                                                    <?php echo $category_data["name"]; ?>
                                                </option>

                                            <?php

                                            }

                                            ?>

                                        </select>
                                        <button class="input-group-text pointer1" id="inputGroup-sizing-lg" onclick="basicSearch(0);"><i class="bi bi-search fs-2 "></i></button>


                                    </div>
                                </div>
                            </div>
                            <div class="col-12" id="basicSearchResult"></div>




                            <div class="col-12">
                                <div class="row d-flex justify-content-center m-1">

                                    <div class="col-lg-3 col-8 shadow-lg p-2 m-3 rounded-5 text-center bg-light ">
                                        <span class=" fw-bold fs-2">Food Selection</span>
                                    </div>

                                    <div class="col-lg-11 col-12 mb-3 mt-3">
                                        <div class="row">
                                            <div class="col-lg-4 col-12 " style="overflow: hidden;">

                                                <div class="row">
                                                    <div class="col-12 d-flex justify-content-center align-items-center breadpic" onclick="breads();">
                                                        <small class="text-white fw-bold">Breads & Rolls</small>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-8 col-12 " style="overflow: hidden;">
                                                <div class="row">
                                                    <div class="col-12 d-flex justify-content-center align-items-center cakepic" onclick="cakesandcupcakes();">
                                                        <small class="text-white fw-bold">Cakes & Cupcakes</small>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-12  " style="overflow: hidden;">
                                                <div class="row">

                                                    <div class="col-12 d-flex justify-content-center align-items-center danishpic" onclick="danishes();">
                                                        <small class="text-white fw-bold">Pastries & Danishes</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-12  " style="overflow: hidden;">
                                                <div class="row">
                                                    <div class="col-12 bg-danger d-flex justify-content-center align-items-center cookiebarpic" onclick="cookiesandbars();">
                                                        <small class="text-white fw-bold">Cookies & Bars</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-12 " style="overflow: hidden;">
                                                <div class="row">
                                                    <div class="col-12 bg-danger d-flex justify-content-center align-items-center savorypic" onclick="savory();">
                                                        <small class="text-white fw-bold">Savory Items</small>
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
            </div>

            <div class="col-12">
                <div class="row d-flex justify-content-center m-1 pt-5">
                    <div class="col-lg-3 col-8 shadow-lg p-2 m-3 rounded-5 text-center bg-light ">
                        <span class=" fw-bold fs-2">Our Services</span>
                    </div>
                </div>
            </div>



            <div class="col-12 mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-8  mt-5 rounded-5">
                        <div class="col-12 text-center mt-3">
                            <span class="fs-1 fw-bold">Food orders are delivered daily from</span>

                            <div class="col-12 mt-2">
                                <div class="row justify-content-center">
                                    <div class="col-5">
                                        <span class="fs-3">9.00 A.M.</span>-
                                        <img src="resource/icons8-delivery-time-80.png" alt="">-
                                        <span class="fs-3">9.00 P.M.</span>
                                    </div>
                                    <div class="col-12 text-center">
                                        <span class=" fw-bold fs-5">Orders placed after 10.30 p.m. will be delivered the
                                            following day.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-12 mt-5 mb-4 ">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 col-12  text-center shadow-lg mx-5 rounded-5 bg-light">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-12 cooimg "></div>
                                    <span class="fw-bold fs-3 co-1">Safety</span><br>
                                    <div class="col-10">
                                        <span class="fs-5">Stringent protocols are followed in food preparation and
                                            handling</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-12  text-center shadow-lg mx-5 rounded-5 bg-light">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-12 car"></div>
                                    <span class="fw-bold fs-3 co-1">Personalised Delivery</span><br>
                                    <div class="col-10">
                                        <span class="fs-5">Deliveries are made by registered members</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-12  text-center shadow-lg mx-5 rounded-5 bg-light">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-12 star "></div>
                                    <span class="fw-bold fs-3 co-1">Quality</span><br>
                                    <div class="col-10">
                                        <span class="fs-5">Super quality and service</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12  mt-3">
                <div class="row">
                    <div class="col-lg-6 col-12  d-flex align-items-center  shadow-lg   ">
                        <div class="row justify-content-center">
                            <div class="col-10 ">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 ">
                                                <span class="dtext">Be a part of Our Delivery Team!</span>
                                            </div>

                                            <div class="col-12 mt-3 mb-3">
                                                <span class=" fs-4">Got a motor Cycle? wait no more..be a part of Sri Lanka's Premium Baked Goods Chain along with some Attractive Benefits</span>
                                            </div>

                                            <div class="col-12 mt-4 mb-5">
                                                <div class="row">
                                                    <div class="col-6 d-flex justify-content-end">
                                                        <a href="diliver_signup.php" class="btn btn-dark">Become a Bakeloaf Deliverer</a>
                                                    </div>
                                                    <div class="col-6 d-flex justify-content-start">
                                                        <a href="diliver_signin.php" class="btn btn-outline-success">Already a partner? Sign In</a>
                                                    </div>
                                                </div>

                                            </div>
                                            <script type="text/javascript">
                                                (function() {
                                                    var options = {
                                                        whatsapp: "+94771855521",
                                                        call_to_action: "Chat with BakeLoaf",
                                                        position: "right"
                                                    };
                                                    var proto = document.location.protocol,
                                                        host = "getbutton.io",
                                                        url = proto + "//static." + host;
                                                    var s = document.createElement('script');
                                                    s.type = 'text/javascript';
                                                    s.async = true;
                                                    s.src = url + '/widget-send-button/js/init.js';
                                                    s.onload = function() {
                                                        WhWidgetSendButton.init(host, proto, options);
                                                    };
                                                    var x = document.getElementsByTagName('script')[0];
                                                    x.parentNode.insertBefore(s, x);
                                                })();
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-6 d-lg-block d-none">
                        <div class="row">
                            <div class=" col-12 dimage">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "footer.php"; ?>
        </div>

        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
</body>