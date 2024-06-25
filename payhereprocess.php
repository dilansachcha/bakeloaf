<?php


$amount = $_POST["total"];
$merchant_id = "1227401";
$order_id = uniqid();
$merchant_secret = "Mzc5MjA4NzU0MDMxNjY2NDQxMzExNjc1NjM2MzYyNjQ1NTA0NzE2";
$currency = "LKR";


$hash = strtoupper(
    md5(
        $merchant_id . 
        $order_id . 
        number_format($amount, 2, '.', '') . 
        $currency .  
        strtoupper(md5($merchant_secret)) 
    ) 
);


$array = [];

$array["amount"] = $amount;
$array["merchant_id"] = $merchant_id;
$array["order_id"] = $order_id;
$array["currency"] = $currency;
$array["hash"] = $hash;


$jsonObj = json_encode($array);

echo $jsonObj;



?>