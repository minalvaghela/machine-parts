<?php
session_start();
include "db_connect.php";
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pass1']) && isset($_POST['pass2']))
{
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $email = $_POST['email'];
    // echo $otp;
    if($pass1 == $pass2)
    {
        $hash=password_hash($pass1,PASSWORD_DEFAULT);
        $sql1 = mysqli_query($conn,"UPDATE `user_details` SET `user_password`='$hash' WHERE `email_id` = '$email'");
        if($sql1)
        {
            echo '1';
        }
        else
        {
            echo '0';
        }

    }
       
}
?>