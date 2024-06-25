<?php

require "connection.php";


if (isset($_POST["email"])) {

    $email =  $_POST["email"];
    $total = $_POST["total"];
    $orderID = $_POST["orderid"];

    $data = Database::search("SELECT * FROM `request_orders` WHERE `user_email` = '" . $email . "'");
    $n = $data->num_rows;


    if ($n == true) {

        Database::iud("DELETE FROM `request_orders` WHERE `user_email` = '" . $email . "'  ");
        Database::iud("DELETE FROM `pending_orders` WHERE `email` = '" . $email . "'");


        Database::iud("DELETE FROM `request_orders_foods` WHERE `order_id`='".$orderID."'");

        echo ("success");
    } else {

        $cart_rs = Database::search("SELECT * FROM `cart` WHERE users_email = '" . $email . "'");
        $nbc = $cart_rs->num_rows;

        if ($nbc == false) {

            Database::iud("DELETE * FROM `pending_orders` WHERE `email` = '" . $email . "'");
            echo ("nathoo");
        }
    }
}