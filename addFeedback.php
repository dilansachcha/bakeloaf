<?php

session_start();
require "connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add feedback | home</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/bakeloaf.png" />


</head>

<body>

    <div class=" container-fluid vh-100">
        <div class="row">
            <div class="col-12 d-flex justify-content-center vh-100">
                <div class="row align-items-center">
                    <div class="col-12  d-flex justify-content-center">
                        <div class="row">
                            <span class=" fs-1 fw-bold">+ Add Feedback</span>
                        </div>
                    </div>
                    <div class="col-3"></div>
                    <div class="col-6  ">
                        <div class="row">
                            <?php

                            if (isset($_SESSION["f"])) {
                                $email =  $_SESSION["f"]["email"];
                                $order_id = $_SESSION["f"]["order_id"];
                                $demail = $_SESSION["f"]["deliverer_email"];

                            ?>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="form-label fw-bold">Type</label>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="type" id="type1">
                                                        <label class="form-check-label text-success fw-bold" for="type1">
                                                            Positive
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="type" id="type2" checked />
                                                        <label class="form-check-label text-warning fw-bold" for="type2">
                                                            Neutral
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="type" id="type3">
                                                        <label class="form-check-label text-danger fw-bold" for="type3">
                                                            Negative
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="form-label fw-bold">User's email</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" value="<?php echo $email; ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="form-label fw-bold">Order Id</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" class="form-control" value="<?php echo $order_id; ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 mt-2">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="form-label fw-bold">Deliverer Email</label>
                                                </div>
                                                <div class="col-9">
                                                    <input type="text" id="demail" class="form-control" value="<?php echo $demail ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <div class="row">
                                                <div class="col-3">
                                                    <label class="form-label fw-bold">Feedback</label>
                                                </div>
                                                <div class="col-9">
                                                    <textarea cols="50" rows="8" class="form-control" id="feed"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3 mb-3 d-flex justify-content-end">

                                            <button type="button" class="btn btn-secondary mx-3" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="saveFeedback('<?php echo $order_id ?>');">Save Feedback</button>

                                        </div>
                                    </div>
                                </div>


                            <?php

                            } else {
                            }
                            ?>

                        </div>
                    </div>
                    <div class="col-3"></div>

                </div>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>