<?php

require "connection.php";

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BakeLoaf | Deliverer SignIn</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/easy_food.png" />

</head>

<body>

    <div class=" container-fluid  vh-100 d-flex  ">
        <div class="row align-content-center">
            <div class="col-12 ">

                <div class=" col-lg-12  ">
                    <div class="row ">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-5">
                            <div class="row">

                                <div class="col-12 d-flex justify-content-center  g-3">
                                    <div class="col-lg-4 col-12 image2 bg-dark rounded-3 mb-3"></div>
                                </div>
                                <span class=" text-center h4 ">Welcome to Sri Lankan biggest online food restaurant.</span>
                                <div class="col-12 mb-5  ">
                                    <span class="h4 fw-bold co-1 d-flex justify-content-center">Deliverer Sign In</span>
                                </div>

                                <?php

                                $email = "";
                                $password = "";

                                if (isset($_COOKIE["email1"])) {
                                    $email = $_COOKIE["email1"];
                                }

                                if (isset($_COOKIE["password1"])) {
                                    $password = $_COOKIE["password1"];
                                }

                                ?>



                                <div class="col-12 mt-5">
                                    <div class="row">
                                        <div class="col-lg-12 g-2">
                                            <label class="co-1">Email</label>
                                            <input type="email" class="form-control " id="email2" value="<?php echo $email; ?>" />
                                        </div>

                                        <div class="col-lg-12 g-2">
                                            <label class="co-1">Password</label>
                                            <input type="password" class="form-control " id="password2" value="<?php echo $password; ?>" />
                                        </div>

                                        <div class="col-6 g-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="rememberme" />
                                                <label class="">Remember Me</label>
                                            </div>
                                        </div>

                                        <div class="col-6 g-2 text-end">
                                            <a href="#" class="link-primary" onclick="delivererforgotPassword();">Forgot Password</a>
                                        </div>

                                        <div class="col-12 col-lg-6 d-grid g-2">
                                            <a class=" btn btn-success" onclick="deliverersignIn();">Sign In</a>
                                        </div>
                                        <div class="col-12 col-lg-6 d-grid g-2">
                                            <a class=" d-grid btn btn-danger" href="diliver_signup.php">
                                                new deliverer? Sign Up</a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class=" d-lg-flex d-none col-lg-6 dimage "></div>
                    </div>

                    <!-- modal -->

                    <div class="modal" tabindex="-1" id="forgotPasswordModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Reset Password</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-3">

                                        <div class="col-6">
                                            <label class="form-label">New Password</label>
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" id="npi" />
                                                <button class="btn btn-outline-secondary" type="button" id="npb" onclick="delivererShowPassword();"><i id="e1" class="bi bi-eye-slash-fill"></i></button>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <label class="form-label">Re-type Password</label>
                                            <div class="input-group mb-3">
                                                <input type="password" class="form-control" id="rnp" />
                                                <button class="btn btn-outline-secondary" type="button" id="rnpb" onclick="delivererShowPassword2();"><i id="e2" class="bi bi-eye-slash-fill"></i></button>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Verification Code</label>
                                            <input type="text" class="form-control" id="vc" />
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="deliverResetpw();">Reset Password</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- modal -->
                    <!-- modal -->

                    <div class="modal" tabindex="-1" id="verificationModal1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title fs-4  co-1">easyfood admin verification</h5>

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


                </div>
            </div>
        </div>
    </div>


    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>