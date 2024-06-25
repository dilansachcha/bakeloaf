<?php

session_start();
require "connection.php";

$email = $_SESSION["admin"]["email"];

$category = $_POST["ca"];
$name = $_POST["name"];
$price = $_POST["price"];
$status = $_POST["status"];
$dfh = $_POST["dfh"];
$dfo = $_POST["dfo"];
$desc = $_POST["desc"];



if($category == "0") {
    echo("Please select a Category");
}else if ($name == "0") {
    echo ("Please select name");
}else if (empty($price)) {
    echo ("Please add price");
}else if ($status == "0") {
    echo ("Please Select status");
}else if (empty($desc)) {
    echo ("Please Add Discription");
}else if (empty($dfh)) {
    echo ("please Add delivery fee Colombo");
}else if (empty($dfo)) {
    echo ("please Add delivery fee other");
}else {
    
    
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d -> setTimezone($tz);
    $date = $d -> format("Y-m-d H:i:s");


    Database::iud("UPDATE `foods` SET `category_id` = '".$category."' , `status` = '".$status."' , `name` = '".$name."', `price` = '".$price."',
    `description` = '".$desc."' , `datetime_added` = '".$date."', `delivery_fee_colombo` = '".$dfh."', `delivery_fee_other` = '".$dfo."' WHERE `name` ='".$name."' ");

    echo("Food Update successfully");

    

    

    

}

?>
