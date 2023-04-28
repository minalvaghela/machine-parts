<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['otp']))
{
    $otp = $_POST['otp'];
    // echo $otp;
    if($_SESSION['otpour'] == $otp)
    {
        
        echo '1';
        // header("location:forgotpass.php?fpas=".true);
    }
    else
    {
        echo '0';
    }   
}
?>