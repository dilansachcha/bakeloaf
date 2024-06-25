<?php

require "connection.php";

if (isset($_POST["email"])) {

    $email = $_POST["email"];
    $id = $_POST["id1"];

    $rs =  Database::search("SELECT * FROM `cart` WHERE `users_email`='" . $email . "'");
    $n = $rs->num_rows;

    $data = $rs->fetch_assoc();

    if ($data["users_email"] == $email & $data["food_id"] == $id) {

        Database::iud("DELETE FROM `cart` WHERE `users_email` = '" . $email . "' AND `food_id`= '" . $id . "'  ");
        echo ("success");
    } else {
        echo ("something went wrong");
    }
} else {
    echo ("Please login first.");
}
