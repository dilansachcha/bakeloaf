<?php

require "connection.php";

if(isset($_GET["email"])){

    $email = $_GET["email"];

    $data_rs = Database::search("SELECT * FROM `users` WHERE `email` = '".$email."'");
    $n = $data_rs->num_rows;

    if ($n == true) {
        
        Database::iud("DELETE FROM `user_has_address` WHERE `user_email` = '".$email."'");
        Database::iud("DELETE FROM `profile_image` WHERE `user_email` = '".$email."'");
        Database::iud("DELETE FROM `users` WHERE `email` = '".$email."'");
        echo("success");
    }

    
}

?>