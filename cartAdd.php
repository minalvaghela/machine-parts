<?php
session_start();
include "db_connect.php";
$name = $_SESSION['user_name'];
$cid = $_GET['cid'];

$sql = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `cart` WHERE `user_id` = '$name' AND `product_id` = '$cid'"));
if($sql > 0)
{
    $sql1 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `cart` WHERE `user_id` = '$name' AND `product_id` = '$cid'"));
    $qty = $sql1['qty']+1;
    $add = mysqli_query($conn,"UPDATE `cart` SET `qty`='$qty' WHERE `user_id` = '$name' AND `product_id` = '$cid'");
    if($add)
    {
        echo "Product qty Addedd!";
    }
}
else
{
    // $sql1 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `cart` WHERE `user_id` = '$name' AND `product_id` = '$cid'"));
    // $qty = $sql1['qty'];
    $add = mysqli_query($conn,"INSERT INTO `cart`(`user_id`, `product_id`, `qty`) VALUES ('$name','$cid','1')");
    if($add)
    {
        echo "Product Addedd!";
    }
}
?>