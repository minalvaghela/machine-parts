<?php
include "db_connect.php";
$uname = $_GET['id'];

$name = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `user_details` WHERE `user_id` = '$uname'"));
if($name > 0)
{
    echo "Please Try With Different Username";
}
?>