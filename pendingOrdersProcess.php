<?php

require "connection.php";
session_start();

if (isset($_POST["email"])) {

    $email = $_POST["email"];
    $name = $_POST["name"];
    $total = $_POST["total"];
    $mobile = $_POST["mobile"];
    $city = $_POST["city"];
    $address = $_POST["address"];
    $orderID = $_POST["orderid"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");


    $data_rs = Database::search("SELECT * FROM `pending_orders` WHERE `order_id` = '" . $orderID . "'");
    $n = $data_rs->num_rows;

    if ($n == 0) {

        Database::iud("INSERT INTO `pending_orders` (`email`,`name`,`mobile`,`city`,`address`,`total`,`order_id`,`date`) VALUES 
        ('" . $email . "','" . $name . "','" . $mobile . "','" . $city . "','" . $address . "','" . $total . "','" . $orderID . "','" . $date . "') ");

        Database::search("DELETE  FROM `cart` WHERE `users_email` = '" . $email . "'");

        //Database::iud("DELETE FROM `request_orders` WHERE `order_id` = '" . $orderID . "'  ");
    } else {
        echo ("already Added");
    }

    $po_rs = Database::search("SELECT * FROM `pending_orders` INNER JOIN `request_orders_foods` ON 
    pending_orders.order_id = request_orders_foods.order_id INNER JOIN `user_has_address` ON 
    pending_orders.email = user_has_address.user_email   WHERE `total` = '" . $total . "' AND `date`='" . $date . "'");
    $n = $po_rs->num_rows;
    $ndds = $po_rs->fetch_assoc();
    $_SESSION["po"] = $ndds;

    
    


    // // 
    // $data1 = Database::search("SELECT * FROM `request_orders` WHERE `user_email` = '" . $email . "'");
    // $data1n = $data1->num_rows;

    // for ($x = 0; $x < $data1n; $x++) {
    //     $data_rs = $data1->fetch_assoc();
    //     $id = $data_rs["food_names"];

    //     $data2 = Database::search("SELECT * FROM `foods` WHERE `name` = '" . $id . "'");
    //     $data2n = $data2->num_rows;
    //     $data2_rs = $data2->fetch_assoc();
    //     $idid = $data2_rs["name"];


    //     


    //     Database::iud("INSERT INTO `pending_orders` (`email`,`date`,`name`,`mobile`,`city`,`address`,`total`,`food_id`) VALUES ('" . $email . "','" . $date . "','" . $name . "','" . $mobile . "','" . $city . "','" . $address . "','" . $total . "','" . $idid . "') ");
    //     // Database::iud("INSERT INTO `pending_orders2` (`email`,`date`,`name`,`mobile`,`city`,`address`,`total`) VALUES ('" . $email . "','" . $date . "','" . $name . "','" . $mobile . "','" . $city . "','" . $address . "','" . $total . "') ");

    //     


    //     // $po2_rs = Database::search("SELECT * FROM `pending_orders2` WHERE `email` = '".$email."'");
    //     // $n2 = $po2_rs->num_rows;
    //     // $po2 = $po2_rs->fetch_assoc();

    //     // $id2 = $po2["id"];

    //     // Database::iud("INSERT INTO `pending_orders_foods` (`food_name`,`pending_orders2_id`) VALUES ('".$idid."','".$id2."')");
    // }




    echo ("Let's Pay.");
}
