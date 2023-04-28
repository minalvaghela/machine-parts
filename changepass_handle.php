<?php
include "db_connect.php";
$msg='';
$showerror="false";
if($_SERVER["REQUEST_METHOD"] == "POST")
{   
    $user_name=$_POST['us_name'];
    $oldpass=$_POST['chpass'];
    $new_pass=$_POST['newpass'];
    $confirm_pass=$_POST['confpass'];
    $qupdate = mysqli_query($conn, "update user_details set user_password='$confirm_pass' where user_id='$user_name' ") or die(mysqli_error($conn));
}
else
{
    echo "not valid";
}
    