<?php

require "connection.php";

if ($_GET["order_id"]) {
    
    $oid = $_GET["order_id"];
    $email = $_GET["email"];
    
    $data_rs = Database::search("SELECT `deliverer_status` FROM `pending_orders` WHERE `order_id` = '".$oid."' ");
    $n = $data_rs->num_rows;

    if($n == true){

        $data = $data_rs->fetch_assoc();
        
        if ($data["deliverer_status"] == 'ready to deliver') {
            
            Database::iud("UPDATE `pending_orders` SET `deliverer_status`='Deliverer Accept' , `deliverer_email` = '".$email."' WHERE `order_id` = '".$oid."'");
            echo("Accept");
        }else{
            echo("something went wrong..");
        }
   
    }
}