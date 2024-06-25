<?php

require "connection.php";

session_start();


if(isset($_GET["order_id"])){
    $order_id = $_GET["order_id"];

    $data_rs = Database::search("SELECT * FROM `pending_orders` WHERE `order_id` ='".$order_id."'");
    $n = $data_rs->num_rows;
    $data = $data_rs->fetch_assoc();
    $_SESSION["f"] = $data;

    echo("success");
}