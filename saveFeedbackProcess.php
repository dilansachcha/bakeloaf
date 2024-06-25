<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])) {

    $email = $_SESSION["u"]["email"];
    $type = $_POST["type"];
    $order_id = $_POST["order_id"];
    $feedback = $_POST["feedback"];
    $demail = $_POST["demail"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d -> setTimezone($tz);
    $date = $d -> format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `feedback` (`type`,`feedback`,`date`,`order_id`,`user_email`,`deliverer_email`) VALUES
    ('".$type."','".$feedback."','".$date."','".$order_id."','".$email."','".$demail."')");

    echo ("success");

}

?>