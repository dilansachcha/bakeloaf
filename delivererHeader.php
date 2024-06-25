<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

</head>

<body>

    <div class=" container-fluid">
        <div class="row">

            <div class="col-12 bg-dark">
                <div class="row">
                    <div class="col-1 image3 d-flex justify-content-center "> </div>
                    <div class="col-5 d-flex justify-content-center ">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-start">
                                <span class=" text-white fs-1">BakeLoaf</span>
                            </div>
                            <div class="col-12 ">
                                <span class=" text-white fs-5">Deliverer Home</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-3 d-flex justify-content-center ">
                        <div class="row align-items-center">
                            <div class="col-10">
                                <input class=" form-control" type="date">
                            </div>
                            <div class="col-2">
                                <button class=" btn btn-light">Search</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 ">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center ">
                                <span class=" text-white fs-5 mt-4"><?php echo $_SESSION["d"]["fname"];
                                                                    echo (" ");
                                                                    echo $_SESSION["d"]["lname"]; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <?php

                        if (isset($_SESSION["d"]["email"])) {

                            $email =  $_SESSION["d"]["email"];


                            $data_rs = Database::search("SELECT `path` FROM `deliverer_profile_images` WHERE `deliverer_email` ='" . $email . "'");
                            $data_rs->num_rows;
                            $data = $data_rs->fetch_assoc();


                            if ($data == true) {
                        ?>
                                <img class=" rounded-circle divchange1 mt-2 mb-2" onclick="window.location = 'delivererProfile.php'" src="<?php echo $data["path"] ?>" style="width: 80px; height:80px;">

                            <?php
                            }else{
                                ?>
                                
                                <img class=" rounded-circle divchange1" onclick="window.location = 'delivererProfile.php'" src="resource/new_user.png" style="width: 80px; height:80px;">
                                
                                <?php
                            }
                            ?>


                        <?php
                        } else {
                        ?>
                            
                        <?php
                        }

                        ?>

                    </div>
                </div>





            </div>
        </div>
    </div>



</body>

</html>