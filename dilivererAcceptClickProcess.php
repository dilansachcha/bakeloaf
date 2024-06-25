<?php

require "connection.php";
session_start();


if (isset($_GET["order_id"])) {

    $order_id = $_GET["order_id"];
   

    $data_rs = Database::search("SELECT * FROM `pending_orders` WHERE `order_id` = '".$order_id."'");
    $n = $data_rs->num_rows;

    if ($n == true) {
        
        $data = $data_rs->fetch_assoc();
        Database::iud("UPDATE `pending_orders` SET `deliverer_status` = 'delivered' WHERE `order_id` ='".$order_id."'");
        echo("success");
    }
}

?>