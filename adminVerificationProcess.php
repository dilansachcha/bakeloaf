<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST["e"])){
    
    $email = $_POST["e"];
    
    $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email` = '".$email."'");
    $admin_num = $admin_rs -> num_rows;

    if($admin_num > 0) {

        $code = uniqid();

        Database::iud("Update `admin` SET `verification_code` = '".$code."' WHERE `email` = '".$email."'");

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'dilansachintha44@gmail.com';
            $mail->Password = 'asaumdkkxyfiuwyd';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('dilansachintha44@gmail.com', 'Admin Verification');
            $mail->addReplyTo('dilansachintha44@gmail.com', 'Admin Verification');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'BakeLoaf admin Login Verification Code';
            $bodyContent = '
            <h3 style = "color:blue">Hi , Admin (Dilan)</h3><br>
            <h2>		
            We have received a request to access your <b>BaeLoaf ADMIN PANEL</b> through your email address. Your verification code is:</h2><br>
            <h1 style = "color:red">'.$code.'</h1>
            ';
            $mail->Body    = $bodyContent;

            if(!$mail -> send()) {
                echo 'Verification code sending failed';
            }else {
                echo 'success';
            }

    }else {
        echo ("You are not a valid user");
    }


}else {
    echo ("Email field should not be empty.");
}

?>