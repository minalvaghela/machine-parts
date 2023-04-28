<?php
include "db_connect.php";
$name=$_POST['username'];
$pass=$_POST['pas'];

$match=mysqli_query($conn,"select * from user_details where user_id='$name'");
$sql=mysqli_fetch_assoc($match);
 
$pass_mathch=$sql['password'];
if($pass != $pass_mathch)
{
    echo "Invalid Username Or Password";
}

?>
