<?php

session_start();

$email = $_SESSION["u"]["email"];

require "connection.php";

if (isset($_GET["oid"])) {

    $order_id = $_GET["oid"];

    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `oid` = '" . $order_id . "'");
    $invoice_num = $invoice_rs->num_rows;

    if ($invoice_num == 1) {

        $invoice_data = $invoice_rs->fetch_assoc();
        $oid = $invoice_data["oid"];

        Database::iud("DELETE FROM `invoice` WHERE  `oid` = '" . $oid . "' AND `email` = '" . $email . "'");
        

        echo ("Delete Complete");
    } else {
        echo ("Cannot find the invoice. Please try again later.");
    }
} else {
    echo ("Something went Wrong.");
}