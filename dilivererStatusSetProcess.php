<?php

require "connection.php";
session_start();

if(isset($_GET["option"])){

    $option = $_GET["option"];
    $email = $_GET["email"];

   $data_rs =  Database::search("SELECT * FROM `diliverer` WHERE `email` = '".$email."'");
   $n = $data_rs->num_rows;

   if ($n == true) {
    $data = $data_rs->fetch_assoc();
     if($data["deliverer_status_id"] == 1){
                 
          Database::iud("UPDATE `diliverer` SET `deliverer_status_id` = '2' WHERE `email` = '".$email."'");
          echo("2");
     }else{
          Database::iud("UPDATE `diliverer` SET `deliverer_status_id` = '1' WHERE `email` = '".$email."'");
          echo('1');
     }
     
         
        
   }else{
     echo("you are not a valid user");
   }

    
}