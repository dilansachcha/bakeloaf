<?php

require "connection.php";
session_start();

if (isset($_SESSION["u"])) {

    $email =  $_SESSION["u"]["email"];

    if (isset($_GET["id"])) {

        $id = $_GET["id"];
        $input = $_GET["input"];

        
        $cart_rs = Database::iud("INSERT INTO `cart` (`qty`,`food_id`,`users_email`) VALUES ('".$input."','".$id."','".$email."')");
        echo("success");

    } else {
        echo "something went wrong";
    }
}