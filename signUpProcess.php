<?php
session_start();

require "connection.php";

$fname = $_POST["fn"];
$lname = $_POST["ln"];
$password = $_POST["p"];
$mobile = $_POST["m"];
$email = $_POST["e"];
$gender = $_POST["g"];

if (empty($fname)) {
    echo ("Please enter your First Name !!!");
} else if (strlen($fname) > 50) {
    echo ("First Name must have less than 50 characters");
} else if (empty($lname)) {
    echo ("Please enter your Last Name !!!");
} else if (strlen($lname) > 50) {
    echo ("Last Name must have less than 50 characters");
} else if (empty($password)) {
    echo ("Please enter your Password !!!");
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo ("Password must be between 5 - 20 characters");
} else if (empty($mobile)) {
    echo ("Please enter your Mobile !!!");
} else if (strlen($mobile) != 10) {
    echo ("Mobile must have 10 characters");
} else if (!preg_match("/07[0,1,2,3,4,5,6,7,8][0-9]/", $mobile)) {
    echo ("Invalid Mobile !!!");
}else if (empty($email)) {
    echo ("Please enter your Email !!!");
} else if (strlen($email) >= 100) {
    echo ("Email must have less than 100 characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email !!!");
} else {

    $rs = Database::search("SELECT * FROM `users` WHERE `email` = '" . $email . "' OR `mobile` = '" . $mobile . "'");
    $n = $rs->num_rows;

    if ($n > 0) {
        echo ("User with the same Email or Mobile already exists.");
    } else {
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `users` (`fname`,`lname`,`email`,`mobile`,`password`,`gender_id`,`joined_date`,`status`)
        VALUES ('".$fname."','".$lname."','".$email."','".$mobile."','".$password."','".$gender."','".$date."','1')");

        echo "success";
    }
}
