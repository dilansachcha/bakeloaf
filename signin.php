<?php

require "connection.php";


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SignIn | BakeLoaf</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/bakeloaf.png" />

</head>

<body class="body">

    <div class=" container-fluid vh-100">
        <div class="row ">
            <div class="col-12 image11  h-100 bg-dark"></div>
            <div class="col-lg-12 image111 d-flex justify-content-center h-100 ">
                <div class="row align-items-center">
                    <div class="col-12 ">
                        <div class="row">
                        <span class=" text-center h2 p-0" style="color: wheat; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">You Found The Freshest of 'em All!.</span>
                            <div class="col-lg-12 d-flex justify-content-center  g-3">
                                <div class="col-lg-2 col-4 image2"></div>
                            </div>

                            <div class=" col-lg-12 mt-3">
                                <div class="row ">
                                    <div class="col-lg-4 col-1  "></div>
                                    <div class="col-lg-4 col-10">
                                        <div class="row">
                                            <div class="col-12  ">
                                                <span class="h4 fw-bold co-1 d-flex justify-content-center" style="color: wheat;">Welcome Back to BakeLoaf!</span>
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


                                            <div class="col-12 mt-2">
                                                <div class="row">

                                                    <div class="col-lg-12 g-2">
                                                        <label class="co-1 fw-bold">Email</label>
                                                        <input type="email" class="form-control fw-bold" id="email2" value="<?php echo $email; ?>" />
                                                    </div>

                                                    <div class="col-lg-12 mt-3 g-2">
                                                        <label class="co-1 fw-bold">Password</label>
                                                        <input type="password" class="form-control fw-bold " id="password2" value="<?php echo $password; ?>" />
                                                    </div>

                                                    <div class="col-6 g-2 mt-3">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="1" id="rememberme" />
                                                            <label class=" text-white">Remember Me</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-6 g-2 text-end mt-3">
                                                        <a href="#" class="link-primary fw-bold" onclick="forgotPassword();">Forgot Password</a>
                                                    </div>

                                                    <div class="col-12 col-lg-6 d-grid g-2">
                                                        <a href="#" class=" btn btn-success" onclick="signIn();">Sign In</a>
                                                    </div>
                                                    <div class="col-12 col-lg-6 d-grid g-2">
                                                        <a class=" d-grid btn btn-danger" href="index.php">
                                                            new to easyfood? Sign Up</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-4 col-1 "></div>

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
                                                                <button class="btn btn-outline-secondary" type="button" id="npb" onclick="ShowPassword();"><i id="e1" class="bi bi-eye-slash-fill"></i></button>
                                                            </div>
                                                        </div>

                                                        <div class="col-6">
                                                            <label class="form-label">Re-type Password</label>
                                                            <div class="input-group mb-3">
                                                                <input type="password" class="form-control" id="rnp" />
                                                                <button class="btn btn-outline-secondary" type="button" id="rnpb" onclick="ShowPassword2();"><i id="e2" class="bi bi-eye-slash-fill"></i></button>
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
                                                    <button type="button" class="btn btn-primary" onclick="resetpw();">Reset Password</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
    <script src="bootstrap.js"></script>
</body>

</html>