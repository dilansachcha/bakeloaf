<?php

require "connection.php";

if(isset($_GET["email2"])){

    $email2 = $_GET["email2"];

    $data_rs = Database::search("SELECT * FROM `diliverer` WHERE `email` = '".$email2."'");
    $n = $data_rs->num_rows;

    if ($n == true) {
        Database::iud("DELETE FROM `deliverer_has_address` WHERE `deliverer_email` = '".$email."'");
        Database::iud("DELETE FROM `deliverer_profile_images` WHERE `deliverer_email` = '".$email."'");
        Database::iud("DELETE FROM `diliverer` WHERE `email` = '".$email2."'");
        echo("success");
    }

    
}

?>