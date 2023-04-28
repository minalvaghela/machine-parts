<?php
include 'db_connect.php';
session_start();
?>
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email']))
{
    $to = $_POST['email'];
    $sql =  mysqli_query($conn,"SELECT * FROM `user_details` WHERE email_id = '$to'");
    $row = mysqli_num_rows($sql);
        if($row == 1)
       {
        $generator = "1234567890";
        $result = "";
        for ($i = 1; $i <= 4; $i++) 
        {
            $result .= substr($generator, rand() % strlen($generator), 1);
        }
        }
        $_SESSION['otpour'] = $result;
        
        $subject="Forgot Password for Surya Enginnering";
        $msg="Your One Time Password is $result";
        $from="From: projectmachine4@gmail.com";
        
        if(mail($to,$subject,$msg,$from))
        {
            echo "OTP SEND SUCCESSFULLTY ON  ".$to;

        }
        else
        {
            echo "0";
        }
    }
