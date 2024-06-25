<?php

require "connection.php";


if(isset($_GET["name"])){

   $name = $_GET["name"];

   $data_rs = Database::search("SELECT * FROM `foods` WHERE `name` = '".$name."'");
   $n = $data_rs->num_rows;

   if ($n == true) {

    $data = $data_rs->fetch_assoc();
    $id = $data["id"];

    Database::iud("DELETE FROM `food_images` WHERE `food_id` = '".$id."'");
    Database::iud("DELETE FROM `foods` WHERE `name` = '".$name."'");
    echo('success');

   }else{
    echo("not working");
   }
   
    
}else{
    echo('somthing went wrong');
}

?>