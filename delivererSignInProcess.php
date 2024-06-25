<?php

session_start();

require "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rememberme = $_POST["r"];

if (empty($email)) {
    echo ("Please enter your Email");
} else if (strlen($email) > 100) {
    echo ("Email must have less than 100 characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email");
} else if (empty($password)) {
    echo ("Please enter your Password");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("Password must be between 5 - 20 characters");
} else {

    $rs = Database::search("SELECT * FROM `diliverer` WHERE `email` = '" . $email . "' AND `password` = '" . $password . "'");
    $n = $rs->num_rows;

    if ($n == 1) {


        $d = $rs->fetch_assoc();
        $_SESSION["d"] = $d;

        if ($rememberme == "true") {

            setcookie("email1", $email, time() + (60 * 60 * 24 * 365));
            setcookie("password1", $password, time() + (60 * 60 * 24 * 365));
        } else {

            setcookie("email1", "", -1);
            setcookie("password1", "", -1);
        }

        if ($d["admin_verification_code"] == true) {
               echo("success");
        } else {
            echo ("nathoo");
        }
    } else {
        echo ("Invalid Username or Password");
    }
}
