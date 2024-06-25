<?php

require "connection.php";

if ($_GET["order_id"]) {
    
    $oid = $_GET["order_id"];
    
    $data_rs = Database::search("SELECT `deliverer_status` FROM `pending_orders` WHERE `order_id` = '".$oid."' ");
    $n = $data_rs->num_rows;

    if($n == true){

        $data = $data_rs->fetch_assoc();
        
        if ($data["deliverer_status"] == 'paid') {
            
            Database::iud("UPDATE `pending_orders` SET `deliverer_status`='cooking' WHERE `order_id` = '".$oid."'");
            echo("cooking");
        }else if ($data["deliverer_status"] == 'cooking') {
            Database::iud("UPDATE `pending_orders` SET `deliverer_status`='packing' WHERE `order_id` = '".$oid."'");
            echo("packing");
        }else if ($data["deliverer_status"] == 'packing') {
            Database::iud("UPDATE `pending_orders` SET `deliverer_status`='ready to deliver' WHERE `order_id` = '".$oid."'");
            echo("ready to deliver");
        }

        

        
    }
}

?>