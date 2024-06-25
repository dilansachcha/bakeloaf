<!DOCTYPE html>
<html>

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>User Profile | BakeLoaf</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="resource/bakeloaf.png">

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php include "header.php" ?>

            <?php

            if (isset($_SESSION["u"])) {

                $email = $_SESSION["u"]["email"];



                $detail_rs = Database::search("SELECT * FROM `users` INNER JOIN `gender` ON
                gender.id = users.gender_id WHERE `email` = '" . $email . "'");

                $image_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email` = '" . $email . "'");

                $address_rs = Database::search("SELECT * FROM `user_has_address` INNER JOIN `city` ON
                user_has_address.city_id = city.id INNER JOIN `district` ON
                city.district_id = district.id INNER JOIN `province` ON
                district.province_id = province.id WHERE `user_email` = '" . $email . "'");

                $data = $detail_rs->fetch_assoc();
                $image_data = $image_rs->fetch_assoc();
                $address_data = $address_rs->fetch_assoc();

                // echo ($data["line1"]);

            ?>
                <div class="col-12 mt-4 text-center mb-3">
                    <div class="row">

                        <h4 class="fw-bold fs-3">Profile Settings</h4>

                    </div>
                </div>
                <div class="col-12 ">
                    <div class="row">

                        <div class="col-12 bg-body rounded">
                            <div class="row g-2">



                                <div class="col-md-12 d-flex justify-content-center ">
                                    <div class="col-lg-4 col-12 shadow-lg rounded-5  d-flex flex-column align-items-center text-center p-3 py-5">

                                        <?php

                                        if (empty($image_data["path"])) {

                                        ?>

                                            <img src="resource/new_user.png" class="rounded mt-5" style="width: 150px;" id="viewimg" />

                                        <?php

                                        } else {

                                        ?>

                                            <img src="<?php echo $image_data["path"]; ?>" class="rounded mt-5" style="width: 150px;" id="viewimg" />

                                        <?php

                                        }

                                        ?>



                                        <span class="fw-bold"><?php echo $data["fname"];
                                                                echo (" ");
                                                                echo $data["lname"]; ?></span>
                                        <span class="fw-bold text-black-50"><?php echo $data["email"]; ?></span>

                                        <input type="file" class="d-none" id="profileimg" accept="image/*" />
                                        <label for="profileimg" class="btn btn-outline-success mt-5" onclick="changeImage();">Update Profile Image</label>

                                    </div>
                                </div>

                                <div class="col-2"></div>
                                <div class="col-md-8 ">
                                    <div class="p-3 py-5">



                                        <div class="row  g-3">

                                            <div class="col-6">
                                                <label class="form-label text-success">First Name</label>
                                                <input type="text" class="form-control " value="<?php echo $data["fname"]; ?>" id="fname" />
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label text-success">Last Name</label>
                                                <input type="text" class="form-control " value="<?php echo $data["lname"]; ?>" id="lname" />
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label text-success">Mobile</label>
                                                <input type="text" class="form-control " value="<?php echo $data["mobile"]; ?>" id="mobile" />
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label text-success">Registered Date</label>
                                                <input type="text" class="form-control " value="<?php echo $data["joined_date"]; ?>" readonly />
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label text-success">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control " readonly aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?php echo $data["password"]; ?>" />
                                                    <span class="input-group-text bg-success" id="basic-addon2">
                                                        <i class="bi bi-eye-slash-fill text-white"></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label text-success">Gender</label>
                                                <?php
                                                if ($data["gender_id"] == '1') {
                                                ?>
                                                    <input type="text" class="form-control " value="Male" readonly />
                                                <?php
                                                } else {
                                                ?>
                                                    <input type="text" class="form-control " value="Female" readonly />
                                                <?php
                                                }
                                                ?>

                                            </div>

                                            <div class="col-12">
                                                <label class="form-label text-success">Email</label>
                                                <input type="email" class="form-control" value="<?php echo $data["email"]; ?>" readonly />
                                            </div>



                                            <?php

                                            if (!empty($address_data["line1"])) {

                                            ?>

                                                <div class="col-12">
                                                    <label class="form-label text-success">Address Line 01</label>
                                                    <input type="text" class="form-control" value="<?php echo $address_data["line1"]; ?>" id="line1" />
                                                </div>

                                            <?php

                                            } else {

                                            ?>

                                                <div class="col-12">
                                                    <label class="form-label text-success">Address Line 01</label>
                                                    <input type="text" class="form-control" id="line1" />
                                                </div>

                                            <?php

                                            }

                                            ?>

                                            <?php

                                            if (!empty($address_data["line2"])) {

                                            ?>

                                                <div class="col-12">
                                                    <label class="form-label text-success">Address Line 02</label>
                                                    <input type="text" class="form-control " value="<?php echo $address_data["line2"]; ?>" id="line2" />
                                                </div>

                                            <?php

                                            } else {

                                            ?>

                                                <div class="col-12">
                                                    <label class="form-label text-success">Address Line 02</label>
                                                    <input type="text" class="form-control " id="line2" />
                                                </div>

                                            <?php

                                            }

                                            $province_rs = Database::search("SELECT * FROM `province`");
                                            $district_rs = Database::search("SELECT * FROM `district`");
                                            $city_rs = Database::search("SELECT * FROM `city`");

                                            ?>

                                            <div class="col-6">
                                                <label class="form-label text-success">Province</label>
                                                <select class="form-select" id="province">
                                                    <!-- <option value="0">Select Province</option> -->

                                                    <?php

                                                    $province_num = $province_rs->num_rows;
                                                    for ($x = 0; $x < $province_num; $x++) {
                                                        $province_data = $province_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $province_data["id"]; ?>" <?php
                                                                                                            if (!empty($address_data["province_id"])) {
                                                                                                                if ($province_data["id"] == $address_data["province_id"]) {
                                                                                                            ?>selected<?php
                                                                                                                    }
                                                                                                                } ?>><?php echo $province_data["province_name"]; ?></option>

                                                    <?php

                                                    }

                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label text-success">District</label>
                                                <select class="form-select" id="district">
                                                    <!-- <option value="0">Select District</option> -->

                                                    <?php

                                                    $district_num = $district_rs->num_rows;
                                                    for ($x = 0; $x < $district_num; $x++) {
                                                        $district_data = $district_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $district_data["id"]; ?>" <?php

                                                                                                            if (!empty($address_data["district_id"])) {
                                                                                                                if ($district_data["id"] == $address_data["district_id"]) {
                                                                                                            ?>selected<?php
                                                                                                                    }
                                                                                                                } ?>><?php echo $district_data["district_name"]; ?></option>

                                                    <?php

                                                    }

                                                    ?>

                                                </select>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label text-success">City</label>
                                                <select class="form-select" id="city">
                                                    <!-- <option value="0">Select City</option> -->

                                                    <?php

                                                    $city_num = $city_rs->num_rows;
                                                    for ($x = 0; $x < $city_num; $x++) {
                                                        $city_data = $city_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $city_data["id"]; ?>" <?php

                                                                                                        if (!empty($address_data["city_id"])) {
                                                                                                            if ($city_data["id"] == $address_data["city_id"]) {
                                                                                                        ?>selected<?php
                                                                                                                }
                                                                                                            } ?>><?php echo $city_data["city_name"]; ?></option>

                                                    <?php

                                                    }

                                                    ?>
                                                </select>
                                            </div>

                                            <?php

                                            if (!empty($address_data["postal_code"])) {

                                            ?>

                                                <div class="col-6">
                                                    <label class="form-label text-success">Postal Code</label>
                                                    <input type="text" class="form-control" value="<?php echo $address_data["postal_code"]; ?>" id="pcode" />
                                                </div>

                                            <?php

                                            } else {

                                            ?>

                                                <div class="col-6">
                                                    <label class="form-label text-success ">Postal Code</label>
                                                    <input type="text" class="form-control" id="pcode" />
                                                </div>

                                            <?php

                                            }

                                            ?>

                                            <div class="col-12  d-flex justify-content-center mt-5">

                                                <div class="col-lg-4 col-6 d-grid">
                                                    <button class="btn btn-success shadow-lg" onclick="updateProfile();">Update My Profile</button>
                                                </div>

                                            </div>



                                        </div>

                                    </div>
                                </div>
                                <div class="col-2"></div>



                            </div>
                        </div>

                    </div>
                </div>

            <?php

            } else {
                header("Location:http://localhost/bakeloaf/home.php");
            }

            ?>

            <?php include "footer.php" ?>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>

</body>

</html>