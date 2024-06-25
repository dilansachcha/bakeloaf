<?php

session_start();

require "connection.php";

if (isset($_GET["id"])) {

    $fid = $_GET["id"];

    $food_rs = Database::search("SELECT * FROM `foods` WHERE `id`='" . $fid . "' ");
    $n = $food_rs->num_rows;

    if ($n == 1) {

        echo "success";
        $data = $food_rs->fetch_assoc();
        $_SESSION["singlefood"] = $data;
    } else {
        echo ("Please Update your Profile first");
    }
}