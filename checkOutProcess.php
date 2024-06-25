<?php

session_start();

require "connection.php";

if (isset($_GET["total"])) {


    $orderID = uniqid("101");
    $total =  $_GET["total"];
    $email = $_SESSION["u"]["email"];
    $fname = $_SESSION["u"]["fname"];
    $lname = $_SESSION["u"]["lname"];
    $mobile = $_SESSION["u"]["mobile"];


    $data = Database::search("SELECT * FROM `request_orders` WHERE `order_id` = '" . $orderID . "' AND `user_mobile` = '" . $mobile . "'");
    $n = $data->num_rows;
    $nd = $data->fetch_assoc();

    $cart_rs = Database::search("SELECT `name` FROM `foods` INNER JOIN `cart` ON foods.id = cart.food_id WHERE `users_email` = '" . $email . "'");
    $nr = $cart_rs->num_rows;


    if ($nd == 0) {
        Database::iud("INSERT INTO `request_orders` (`user_email`,`order_id`,`fname`,`lname`,`user_mobile`,`total_price`) VALUES ('" . $email . "','" . $orderID . "','" . $fname . "','" . $lname . "','" . $mobile . "','" . $total . "')");
    } else {
        echo ("already add..");
    }


    for ($x = 0; $x < $nr; $x++) {
        $cart = $cart_rs->fetch_assoc();
        $name = $cart["name"];
        
        Database::search("INSERT INTO `request_orders_foods` (`food_names`,`order_id`) VALUES ('".$name."','".$orderID."')  ");



    }


    echo ("ppp");
} else {
    echo ("Something Went Wrong");
}
