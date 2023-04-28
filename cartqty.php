<?php
include_once "db_connect.php";
if(isset($_GET['qty']) && isset($_GET['pid']) && isset($_GET['uid']))
{
$qty=$_GET['qty'];
$id=$_GET['pid'];
$uid=$_GET['uid'];
// echo $uid;
$sql="update cart set qty='$qty' where product_id='$id' and user_id='$uid'";
if($res=mysqli_query($conn,$sql))
{
    $sql1="select * from cart where user_id='$uid'";
    $r1=mysqli_query($conn,$sql1);
    $total=0;
    // echo $r1;
    while($row=mysqli_fetch_assoc($r1))
    {
        $qty=$row['qty'];
        $pid=$row['product_id'];
        $sql2="select price from product where product_id='$pid'";
        $r2=mysqli_query($conn,$sql2);
        $price=mysqli_fetch_array($r2)[0];
        $total += $row['qty']*$price;
    }
    echo $total;
}
}

if(isset($_GET['delid']) && isset($_GET['uid']))
{
    $id = $_GET['delid'];
    $uid=$_GET['uid'];
    $sqldel = mysqli_query($conn,"DELETE FROM `cart` WHERE `user_id` = '$uid' AND `product_id` = '$id'");
    if($sqldel)
    {
        echo "1";
    }
    else
    {
        echo "2";
    }
}
?>