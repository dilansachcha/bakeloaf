<?php



session_start();
require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$email = $_SESSION["po"]["email"];
$total = $_SESSION["po"]["total"];
$orderid = $_SESSION["po"]["order_id"];
$city = $_SESSION["po"]["city"];
$address = $_SESSION["po"]["address"];
$name = $_SESSION["po"]["name"];
$mobile = $_SESSION["po"]["mobile"];
$date = $_SESSION["po"]["date"];





if (isset($_POST["success"])) {

    $email2 = $_POST["email"];

    Database::iud("UPDATE `pending_orders` SET `status`= 'success' WHERE `total` = '" . $total . "' AND `order_id` = '" . $orderid . "' ");


    Database::iud("INSERT INTO `invoice` (`email`,`name`,`address`,`city`,`oid`,`date`,`total`,`mobile`,`status`) VALUES 
                    ('" . $email . "', '" . $name . "','" . $address . "','" . $city . "','" . $orderid . "','" . $date . "','" . $total . "','" . $mobile . "','success')");



    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'dilansachintha44@gmail.com';
    $mail->Password = 'asaumdkkxyfiuwyd';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('dilansachintha44@gmail.com', 'Invoice');
    $mail->addReplyTo('dilansachintha44@gmail.com', 'Invoice');
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = 'BakeLoaf Invoice';
    $bodyContent = '
    <div style="width: 100%; height:100vh;  display:flex; justify-content:center">
    <div style="width: 800px; height:100vh;  display:flex; justify-content:center;">

        <div style="width: 90%; height:100vh;  ">
            <div style="width: 100%; height:10vh; margin-top:10px; border-radius: 20px 20px 20px 2px; display:flex; background-color:aliceblue;    ">

                <div style="width: 25%; height:20vh;  display:flex; align-items:center; justify-content:center;">
                    <span style="font-size: 40px; font-weight:bold; ">Invoice</span>
                </div>

                <div style="width: 25%; height:20vh;  display:flex; align-items:center; justify-content:center;">
                    <div>
                        <span>077-1855521</span>
                        <span>dilansachintha44@gmail.com</span>
                        <span>bakeloaf.lk</span>
                    </div>

                </div>
                <div style="width: 25%; height:20vh; margin-left:140px;  display:flex; align-items:center; justify-content:center;">
                    <div>
                        <span>Rakajeeya Mawatha, Colombo 07</span><br>
                        <span>Sri Lanka</span><br>
                        <span>12 400</span>
                    </div>

                </div>

            </div>

            <div style="width: 100%; height:25vh; margin-top:1px; border-radius: 0px 20px 20px 2px;  display:flex;  ">
                <div style="width: 20%; height:25vh; background-color: black ; margin-top:5px; border-radius: 0px 0px 20px 20px;  ">
                    <img src="https://thumbs2.imgbox.com/18/88/pgXo61kX_t.png" alt="image host" style="width: 130px; height:130px; margin-left:5px; margin-top:5px;">
                </div>
                <div style="width: 25%; height:25vh;  margin-top:5px; border-radius: 0px 0px 20px 20px;   ">
                    <div style="margin-top: 20px; margin-left:20px;">
                        <span>Billed To</span><br>
                        <span>'.$name.'</span><br>
                        <span>'.$address.'</span><br>
                        <span>'.$city.'</span><br>
                        
                    </div>

                </div>
                <div style="width: 25%; height:25vh;  margin-top:5px; border-radius: 0px 0px 20px 20px;   ">
                    <div style="margin-top: 20px; margin-left:20px;">
                        <div>
                            <span>Order ID</span><br>
                            <span>'.$orderid.'</span><br>
                        </div>
                        <div style="margin-top: 20px;">
                            <span>Date Of Issue</span><br>
                            <span>'.$date.'</span><br>
                        </div>
                    </div>

                </div>

                <div style="width: 25%; height:25vh;  margin-top:5px; border-radius: 0px 0px 20px 20px;   ">
                    <div style="margin-top: 20px; margin-left:20px;">
                        <div>
                            <span>Invoice Total</span><br>
                            <span style="font-size: 30px; color:red; ">Rs: '.$total.'.00</span><br>
                        </div>

                    </div>

                </div>

            </div>
            <hr />

            <div style="width: 100%; height:20vh; margin-top:1px; border-radius: 0px 20px 20px 2px;  display:flex;  ">
                <div style="width: 25%; height:25vh;  margin-top:5px;  ">
                    <div style="margin-top: 20px; margin-left:20px;">
                        <span>Order_ID</span><br><br>
                        <span>'.$orderid.'</span><br>

                    </div>
                </div>
                <div style="width: 15%; height:25vh;  margin-top:5px; border-radius: 0px 0px 20px 20px;   ">
                    <div style="margin-top: 20px; margin-left:20px;">
                        <span>Amount</span><br><br>
                        <span>Rs: '.$total.'.00</span><br>

                    </div>

                </div>
                <div style="width: 40%; height:25vh;  margin-top:5px; border-radius: 0px 0px 20px 20px;   ">
                    <div style="margin-top: 20px; margin-left:20px;">
                        <span>Email</span><br><br>
                        <span>'.$email.'</span><br>

                    </div>

                </div>

                <div style="width: 20%; height:25vh;  margin-top:5px; border-radius: 0px 0px 20px 20px;   ">
                    <div style="margin-top: 20px; margin-left:20px;">
                        <span>Phone</span><br><br>
                        <span>'.$mobile.'</span><br>

                    </div>

                </div>

            </div>
            <hr />

            <div style="width: 100%; height:8vh; margin-top:1px; border-radius: 0px 20px 20px 2px;  display:flex;  ">

                <span style="margin-left: 20px; font-size:35px;">Thank You !</span>

            </div>

            <hr />

            <div style="width: 100%; height:8vh; margin-top:1px; border-radius: 0px 20px 20px 2px;  display:flex;  ">
                <div>
                    <span style="margin-left: 20px; font-size:20px;">Notice:</span><br>
                    <span style="margin-left: 20px; ">can not return purchase foods.</span>
                </div>
            </div>
            <hr />





        </div>








    </div>
</div>
    ';
    $mail->Body    = $bodyContent;

    if (!$mail->send()) {
        echo 'Verification code sending failed';
    } else {
        echo 'success';
    }
}