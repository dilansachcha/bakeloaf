<?php

require "connection.php";

if(isset($_GET["email"])){

    $email = $_GET["email"];


    $data_rs = Database::search("SELECT * FROM `diliverer` WHERE `email` = '".$email."'");
    $n = $data_rs->num_rows;

    if ($n == true) {
        $code = uniqid();

        Database::iud("UPDATE `diliverer` SET `admin_verification_code` = '".$code."' WHERE `email` = '".$email."'");
        echo("success");
    }
}

?>