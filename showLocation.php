<?php

$da = $_POST["da"];
$city = $_POST["city"];

if(empty($da)){
    echo("Please Enter your address");
}else if(empty($city)){
    echo("Please Enter City");
}else{
    echo ("success");
}


?>