<?php
require "connection.php";

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SignUp | BakeLoaf</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/bakeloaf.png" />

</head>

<body class="body">

    <div class=" container-fluid vh-100">
        <div class="row">
            <div class="col-12 image11 h-100"></div>
            <div class="col-12 image111 h-100  d-flex justify-content-center ">
                <div class="row  align-items-center">
                    <div class="col-12">
                        <div class="row">
                            <span class="co-1 text-center h2 p-0" style="color: wheat; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">You Found The Freshest of 'em All!.</span>
                            <div class="col-12 d-flex justify-content-center">
                                <div class="col-lg-2 col-6 image2"></div>
                            </div>


                            <div class=" col-lg-12  mt-2">
                                <div class="row ">
                                    <div class="col-lg-2 col-1  "></div>
                                    <div class="col-lg-8 col-10">
                                        <div class="row">
                                            <div class="col-12  ">
                                                <span class="h4 fw-bold co-1 d-flex justify-content-center" style="color: wheat;">Create Your BakeLoaf Account NOW!</span>
                                            </div>


                                            <div class="col-12 mt-2">
                                                <div class="row">
                                                    <div class="col-lg-6  g-2">
                                                        <label class="fw-bold  co-1">First Name</label>
                                                        <input type="text" class="form-control " id="fn" />
                                                    </div>

                                                    <div class="col-lg-6 g-2">
                                                        <label class="co-1 fw-bold ">Last Name</label>
                                                        <input type="text" class="form-control " id="ln" />
                                                    </div>

                                                    <div class="col-lg-6 g-2">
                                                        <label class="co-1 fw-bold">Password</label>
                                                        <input type="password" class="form-control " id="p" />
                                                    </div>

                                                    <div class="col-lg-6 g-2">
                                                        <label class="co-1 fw-bold">Mobile</label>
                                                        <input type="text" class="form-control" id="m" />
                                                    </div>

                                                    <div class="col-lg-6 g-2">
                                                        <label class="co-1 fw-bold">Email</label>
                                                        <input type="email" class="form-control " id="e" />
                                                    </div>


                                                    <div class="col-lg-6 g-2">
                                                        <label class="co-1 fw-bold">Gender</label>
                                                        <select class="form-select" id="g">
                                                            <?php

                                                            $rs = Database::search("SELECT * FROM `gender`");
                                                            $n = $rs->num_rows;

                                                            for ($x = 0; $x < $n; $x++) {
                                                                $d = $rs->fetch_assoc();

                                                            ?>

                                                                <option value="<?php echo $d["id"]; ?>"><?php echo $d["name"]; ?></option>

                                                            <?php

                                                            }

                                                            ?>


                                                        </select>
                                                    </div>

                                                    <div class="col-12 col-lg-6 d-grid g-2">
                                                        <button class="btn btn-danger" onclick="signUp();">Sign Up</button>
                                                    </div>
                                                    <div class="col-12 col-lg-6 d-grid g-2">
                                                        <a class=" d-grid btn btn-success" href="signIn.php">
                                                            Already have an account?Sign In</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-2 col-1 "></div>

                                </div>

                            </div>
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

    <script src="script.js"></script>
</body>

</html>