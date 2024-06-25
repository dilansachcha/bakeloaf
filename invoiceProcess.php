<?php

require "connection.php";

session_start();

if ($_SESSION["u"]["email"]) {

    $total = $_POST["total"];
    $date = $_POST["date"];


    $data_rs = Database::search("SELECT * FROM `pending_orders` INNER JOIN `request_orders_foods` ON 
pending_orders.order_id = request_orders_foods.order_id INNER JOIN `user_has_address` ON 
pending_orders.email = user_has_address.user_email   WHERE `total` = '" . $total . "' AND `date`='" . $date . "'");

    $n = $data_rs->num_rows;

    // for ($v = 0; $v < $n; $v++) {

    $data = $data_rs->fetch_assoc();
    $_SESSION["in"] = $data;
    // }




    echo ("hello");
}
