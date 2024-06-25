<?php

require "connection.php";

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BakeLoaf | Deliverer SignUp</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/easy_food.png" />

</head>

<body>

    <div class=" container-fluid  vh-100 d-flex ">
        <div class="row align-content-center" >
            <div class="col-12">

                <div class=" col-lg-12">
                    <div class="row ">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-6">
                            <div class="row">

                                <div class="col-12 d-flex justify-content-center  g-3">
                                    <div class="col-lg-3 col-12 image2 rounded-3 mb-3"></div>
                                </div>
                                <span class=" text-center h4 ">Be a part of Sri Lanka's Premium Bakery Chain.</span>
                                <div class="col-12  ">
                                    <span class="h4 fw-bold co-1 d-flex justify-content-center">Deliverer Registration</span>
                                </div>


                                <div class="col-12 mt-5">
                                    <div class="row">
                                        <div class="col-lg-6  g-2">
                                            <label class=" co-1">First Name</label>
                                            <input type="text" class="form-control " id="fn" />
                                        </div>

                                        <div class="col-lg-6 g-2">
                                            <label class="co-1">Last Name</label>
                                            <input type="text" class="form-control " id="ln" />
                                        </div>

                                        <div class="col-lg-6 g-2">
                                            <label class="co-1">Password</label>
                                            <input type="password" class="form-control " id="p" />
                                        </div>

                                        <div class="col-lg-6 g-2">
                                            <label class="co-1">Mobile</label>
                                            <input type="text" class="form-control " id="m" />
                                        </div>

                                        <div class="col-lg-6 g-2">
                                            <label class="co-1">Email</label>
                                            <input type="email" class="form-control " id="e" />
                                        </div>

                                        <div class="col-lg-6 g-2">
                                            <label class="co-1">Gender</label>
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
                                            <a href="#" class="btn btn-dark" onclick="signUpDeliver();">Sign Up</a>
                                        </div>
                                        <div class="col-12 col-lg-6 d-grid g-2">
                                            <a class=" d-grid btn btn-success" href="diliver_signin.php">
                                                Already have an account?Sign In</a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class=" d-lg-flex d-none col-lg-5 dimage "></div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="script.js"></script>
</body>

</html>